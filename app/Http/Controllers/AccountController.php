<?php

namespace App\Http\Controllers;
use DataTables;
use App\Models\XUser;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Wellinfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class AccountController extends Controller
{
    public function index()
    {
        $projects = Project::select('id_project', 'operator_name', 'drillingrig')->get();
        return view('pages.accounts.index', compact('projects'));
    }

    public function checkUsername(Request $request)
    {
        $username = $request->input('kode_login');
        $userId = $request->input('id'); // dari form edit
    
        $exists = \App\Models\XUser::where('kode_login', $username)
            ->when($userId, fn($query) => $query->where('id_user', '!=', $userId))
            ->exists();
    
        return response()->json(['exists' => $exists]);
    }
    
    public function getAccounts(Request $request)
    {
        if ($request->ajax()) {
            $accounts = XUser::with('project');
    
            return DataTables::of($accounts)
                ->addIndexColumn()
                ->addColumn('project_name', function ($row) {
                    return ($row->level === 'MASTER' || $row->level === 'Supervisor')
                        ? '<span class="text-gray-500 italic">All Projects</span>'
                        : ($row->project->operator_name ?? '-');
                })
                ->editColumn('status', function ($row) {
                    if ($row->status === 'Y') {
                        return '<span class="inline-block px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 border border-green-400 rounded">Active</span>';
                    } else {
                        return '<span class="inline-block px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 border border-red-400 rounded">Inactive</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return view('pages.accounts.actions', compact('row'))->render();
                })
                ->rawColumns(['status', 'project_name', 'action']) // penting!
                ->make(true);
        }
    
        return abort(403);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|unique:xusers,employee_id',
            'employee_name' => 'required',
            'email' => 'nullable|email',
            'kode_login' => 'required|unique:xusers,kode_login',
            'pass_login' => 'required|min:6',
            'level' => 'required',
            'id_project' => 'nullable|integer',
        ]);
    
        XUser::create([
            'employee_id' => $request->employee_id,
            'employee_name' => $request->employee_name,
            'email' => $request->email,
            'kode_login' => $request->kode_login,
            'pass_login' => bcrypt($request->pass_login),
            'level' => $request->level,
            'id_project' => $request->id_project,
            'status' => 'Y'
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Account has been added successfully.'
        ]);
    }
    
    public function edit($id)
    {
        $user = XUser::findOrFail($id);
        $projects = Project::all();
    
        return view('pages.accounts.edit', compact('user', 'projects'));
    }
    
    public function update(Request $request, $id)
    {
        try {
            $user = XUser::findOrFail($id);
    
            $request->validate([
                'employee_name' => 'required|string|max:255',
                'email' => 'nullable|email',
                'level' => 'required|in:Supervisor,Operator,Staff',
                'id_project' => 'nullable|integer',
                'pass_login' => 'nullable|min:6',
            ]);
    
            $user->employee_id = $request->employee_id;
            $user->employee_name = $request->employee_name;
            $user->email = $request->email;
            $user->kode_login = $request->kode_login;
            $user->level = $request->level;
            $user->id_project = $request->id_project;
            $user->status = $request->status ?? 'Y';
    
            if ($request->filled('pass_login')) {
                $user->pass_login = bcrypt($request->pass_login);
            }
    
            $user->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Account has been updated successfully.'
            ]);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    
    public function toggleStatus(Request $request, $id)
    {
        $user = XUser::findOrFail($id);
        $user->status = $user->status === 'Y' ? 'N' : 'Y';
        $user->save();
    
        return response()->json([
            'success' => true,
            'message' => 'Account status updated to ' . ($user->status === 'Y' ? 'Active' : 'Inactive') . '.'
        ]);
    }
    
    public function destroy($id)
    {
        \Log::info("Attempting to delete user with ID: $id");
    
        $user = XUser::findOrFail($id);
        $user->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Account has been deleted successfully.'
        ]);
    }
    
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $user = XUser::where('kode_login', $request->kode_login)
                    ->where('status', 'Y')
                    ->first();
    
        if ($user && \Hash::check($request->pass_login, $user->pass_login)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
    
        return back()->withErrors([
            'login_error' => 'Invalid credentials or inactive user account.'
        ]);
    }
    
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        //$user = session('user');
        $user = Auth::user();
        $totalProjects = Project::count();
        $activeUsers = XUser::where('status', 'Y')->count();
    
        if (in_array($user->level, ['MASTER', 'Supervisor'])) {
            $reportCount = Wellinfo::count();
        } else {
            $reportCount = Wellinfo::where('id_project', $user->id_project)->count();
        }
    
        return view('pages.dashboard', compact('totalProjects', 'activeUsers', 'reportCount'));
    }


}
