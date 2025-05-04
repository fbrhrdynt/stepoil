<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Wellinfo;
use App\Models\AdditionalModel;
use App\Models\CuttingsByPassed;
use App\Models\DailyWaste;
use App\Models\Desanders;
use App\Models\Desilters;
use App\Models\Details;
use App\Models\RetortWorksheet;
use App\Models\Personnel;
use PDF;

class PdfReportController extends Controller
{
    public function generateWithChart(Request $request, $project_id, $wellinfo_id)
    {
        $project = Project::findOrFail($project_id);
        $wellinfo = Wellinfo::with('project')->findOrFail($wellinfo_id);
        $additional = AdditionalModel::where('id_wellinfo', $wellinfo_id)->first();
        $cuttings = CuttingsByPassed::where('id_wellinfo', $wellinfo_id)->first();
        $dailyWaste = DailyWaste::where('id_wellinfo', $wellinfo_id)->first();
        $desanders = Desanders::where('id_wellinfo', $wellinfo_id)->first();
        $desilters = Desilters::where('id_wellinfo', $wellinfo_id)->first();
        $details = Details::where('id_wellinfo', $wellinfo_id)->first();
        $retorts = RetortWorksheet::where('id_wellinfo', $wellinfo_id)->first();
        $personnel = Personnel::where('id_wellinfo', $wellinfo_id)->first();
    
        // Mapping Fluid Type Logic
        $fluidTypeMapping = [
            'WB-SW' => ['name' => 'Sea Water', 'categories1' => 'MBT (lb/bbl)', 'categories2' => '% Base Fluid'],
            'WB-WB' => ['name' => 'Water Base', 'categories1' => 'MBT (lb/bbl)', 'categories2' => '% Base Fluid'],
            'WB-WBH' => ['name' => 'Water Base HPWBM', 'categories1' => 'MBT (lb/bbl)', 'categories2' => '% Base Fluid'],
            'OBM-LT' => ['name' => 'LT-Oil Base', 'categories1' => 'E-Stability (Volt)', 'categories2' => 'Oil / Water Ratio'],
            'OBM-SB' => ['name' => 'Synthetic Base', 'categories1' => 'E-Stability (Volt)', 'categories2' => 'Oil / Water Ratio'],
            'OBM-EN' => ['name' => 'Enviromul', 'categories1' => 'E-Stability (Volt)', 'categories2' => 'Oil / Water Ratio'],
        ];

        $fluidTypeInfo = $fluidTypeMapping[$details->fluidtype] ?? null;

        if ($fluidTypeInfo) {
            $fluidtype = $fluidTypeInfo['name'];
            $categories1 = $fluidTypeInfo['categories1'];
            $categories2 = $fluidTypeInfo['categories2'];
            $hasil = $details->basefluid ?? $details->categories1 ?? '';
        } else {
            $fluidtype = '';
            $categories1 = '';
            $categories2 = '';
            $hasil = '';
        }

        $rescategories1 = empty($details->categories1) ? ' -' : $hasil;
        $rescategories2 = empty($details->categories2) ? ' -' : $details->categories2;

        $tempunit = $details->tempunit === 'degc' ? '°C' : ($details->tempunit === 'degf' ? '°F' : '');

        $chartBase64 = $request->input('chartBase64', null);

        $pdf = PDF::loadView('reports.sample1', compact(
            'project',
            'wellinfo',
            'additional',
            'cuttings',
            'dailyWaste',
            'desanders',
            'desilters',
            'details',
            'retorts',
            'chartBase64',
            'fluidtype',
            'categories1',
            'categories2',
            'rescategories1',
            'rescategories2',
            'tempunit',
            'personnel'
        ));

        $filename = "report-$project_id-$wellinfo_id.pdf";

        return $request->has('download')
            ? $pdf->download($filename)
            : $pdf->stream($filename);
    }

    public function generateDownload($project_id, $wellinfo_id)
    {
        $project = Project::findOrFail($project_id);
        $wellinfo = Wellinfo::with('project')->findOrFail($wellinfo_id);
        $additional = AdditionalModel::where('id_wellinfo', $wellinfo_id)->first();
        $cuttings = CuttingsByPassed::where('id_wellinfo', $wellinfo_id)->first();
        $dailyWaste = DailyWaste::where('id_wellinfo', $wellinfo_id)->first();
        $desanders = Desanders::where('id_wellinfo', $wellinfo_id)->first();
        $desilters = Desilters::where('id_wellinfo', $wellinfo_id)->first();
        $details = Details::where('id_wellinfo', $wellinfo_id)->first();
        $retorts = RetortWorksheet::where('id_wellinfo', $wellinfo_id)->first();
        $personnel = Personnel::where('id_wellinfo', $wellinfo_id)->first();

        // Mapping Fluid Type Logic
        $fluidTypeMapping = [
            'WB-SW' => ['name' => 'Sea Water', 'categories1' => 'MBT (lb/bbl)', 'categories2' => '% Base Fluid'],
            'WB-WB' => ['name' => 'Water Base', 'categories1' => 'MBT (lb/bbl)', 'categories2' => '% Base Fluid'],
            'WB-WBH' => ['name' => 'Water Base HPWBM', 'categories1' => 'MBT (lb/bbl)', 'categories2' => '% Base Fluid'],
            'OBM-LT' => ['name' => 'LT-Oil Base', 'categories1' => 'E-Stability (Volt)', 'categories2' => 'Oil / Water Ratio'],
            'OBM-SB' => ['name' => 'Synthetic Base', 'categories1' => 'E-Stability (Volt)', 'categories2' => 'Oil / Water Ratio'],
            'OBM-EN' => ['name' => 'Enviromul', 'categories1' => 'E-Stability (Volt)', 'categories2' => 'Oil / Water Ratio'],
        ];

        $fluidTypeInfo = $fluidTypeMapping[$details->fluidtype] ?? null;

        if ($fluidTypeInfo) {
            $fluidtype = $fluidTypeInfo['name'];
            $categories1 = $fluidTypeInfo['categories1'];
            $categories2 = $fluidTypeInfo['categories2'];
            $hasil = $details->basefluid ?? $details->categories1 ?? '';
        } else {
            $fluidtype = '';
            $categories1 = '';
            $categories2 = '';
            $hasil = '';
        }

        $rescategories1 = empty($details->categories1) ? ' -' : $hasil;
        $rescategories2 = empty($details->categories2) ? ' -' : $details->categories2;

        $tempunit = $details->tempunit === 'degc' ? '°C' : ($details->tempunit === 'degf' ? '°F' : '');

        $chartBase64 = null;

        $pdf = PDF::loadView('reports.sample1', compact(
            'project',
            'wellinfo',
            'additional',
            'cuttings',
            'dailyWaste',
            'desanders',
            'desilters',
            'details',
            'retorts',
            'chartBase64',
            'fluidtype',
            'categories1',
            'categories2',
            'rescategories1',
            'rescategories2',
            'tempunit',
            'personnel'
        ));

        $filename = "report-$project_id-$wellinfo_id.pdf";
        return $pdf->download($filename);
    }
}
