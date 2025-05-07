<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WellinfoController;
use App\Http\Controllers\DesandersController;
use App\Http\Controllers\DesiltersController;
use App\Http\Controllers\RetortController;
use App\Http\Controllers\CuttingsByPassedController;
use App\Http\Controllers\DailyWasteController;
use App\Http\Controllers\PdfReportController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PmCategoryController;
use App\Http\Controllers\PmDataController;

use App\Http\Controllers\AssetListController;
use App\Http\Controllers\PmDetailCategoryController;
use App\Http\Controllers\PmDetailController;
use App\Http\Controllers\InspectionCategoryController;
use App\Http\Controllers\InspectionDetailController;


use App\Models\Project;
use App\Models\RetortWorksheet;

// Route bebas login
Route::get('/login', [AccountController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AccountController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AccountController::class, 'logout'])->name('logout');
Route::get('/assets/select', [AssetListController::class, 'select'])->name('assets.select');

// Route yang membutuhkan login
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AccountController::class, 'dashboard'])->name('dashboard');

    Route::get('/accounts/data', [AccountController::class, 'getAccounts'])->name('accounts.data');
    Route::resource('accounts', AccountController::class)->except(['show']);
    Route::get('/accounts/check-username', [AccountController::class, 'checkUsername'])->name('accounts.checkUsername');
    Route::put('/accounts/{id}/toggle-status', [AccountController::class, 'toggleStatus'])->name('accounts.toggleStatus');

    Route::get('/projects/data', [ProjectController::class, 'getProjects'])->name('projects.data');
    Route::resource('projects', ProjectController::class);
    Route::get('/projects/details/{project_id}', [WellinfoController::class, 'index'])->name('projects.details');
    Route::get('/wellinfo/data/{project_id}', [WellinfoController::class, 'getWellinfoData'])->name('wellinfo.data');

    Route::get('/projects/details/{project_id}/{wellinfo_id}', [WellinfoController::class, 'show'])->name('wellinfo.show');
    Route::get('/projects/details/{project_id}/{wellinfo_id}/edit-first', [WellInfoController::class, 'editFirst'])->name('wellinfo.editfirst');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/update', [WellInfoController::class, 'updateFirst'])->name('wellinfo.updatefirst');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/edit-well', [WellInfoController::class, 'editWell'])->name('wellinfo.editwell');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/updatewell', [WellInfoController::class, 'updateWell'])->name('wellinfo.updatewell');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/edit-amp', [WellInfoController::class, 'editAMP'])->name('wellinfo.editamp');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/updateamp', [WellInfoController::class, 'updateAMP'])->name('wellinfo.updateamp');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/shakers', [WellInfoController::class, 'shakers'])->name('wellinfo.shakers');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/update-shakers', [WellInfoController::class, 'updateShakers'])->name('wellinfo.updateShakers');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/centrifuge-1', [WellInfoController::class, 'centrifuge1'])->name('wellinfo.centrifuge1');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/centrifuge-1', [WellInfoController::class, 'updateCentrifuge1'])->name('wellinfo.updateCentrifuge1');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/centrifuge-2', [WellInfoController::class, 'centrifuge2'])->name('wellinfo.centrifuge2');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/centrifuge-2', [WellInfoController::class, 'updateCentrifuge2'])->name('wellinfo.updateCentrifuge2');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/centrifuge-3', [WellInfoController::class, 'centrifuge3'])->name('wellinfo.centrifuge3');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/centrifuge-3', [WellInfoController::class, 'updateCentrifuge3'])->name('wellinfo.updateCentrifuge3');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/cdu-1', [WellInfoController::class, 'cdu1'])->name('wellinfo.cdu1');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/cdu-1', [WellInfoController::class, 'updateCDU1'])->name('wellinfo.updateCDU1');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/cdu-2', [WellInfoController::class, 'cdu2'])->name('wellinfo.cdu2');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/cdu-2', [WellInfoController::class, 'updateCDU2'])->name('wellinfo.updateCDU2');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/desanders', [DesandersController::class, 'show'])->name('wellinfo.desanders');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/desanders', [DesandersController::class, 'update'])->name('wellinfo.updateDesanders');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/desilters', [DesiltersController::class, 'show'])->name('wellinfo.desilters');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/desilters', [DesiltersController::class, 'update'])->name('wellinfo.updateDesilters');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/retort', [RetortController::class, 'show'])->name('wellinfo.retort');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/retort', [RetortController::class, 'updateRetort'])->name('wellinfo.updateRetort');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/bypassed', [CuttingsByPassedController::class, 'show'])->name('wellinfo.cuttingsbypassed');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/bypassed', [CuttingsByPassedController::class, 'updateBypassed'])->name('wellinfo.updateBypassed');

    Route::get('/projects/details/{project_id}/{wellinfo_id}/daily-waste', [DailyWasteController::class, 'show'])->name('wellinfo.daily-waste');
    Route::put('/projects/details/{project_id}/{wellinfo_id}/daily-waste', [DailyWasteController::class, 'update'])->name('wellinfo.daily-waste.update');

    Route::get('/projects/details/{project_id}/copy/{id_wellinfo}', [WellinfoController::class, 'copyLastReportWithProject'])->name('wellinfo.copyWithProject');

    Route::prefix('wellinfo')->group(function () {
        Route::get('/', [WellinfoController::class, 'index'])->name('wellinfo.index');
        Route::get('/lock/{id}', [WellinfoController::class, 'lock']);
        Route::get('/unlock/{id}', [WellinfoController::class, 'unlock']);
        Route::get('/delete/{id}', [WellinfoController::class, 'destroy']);
        Route::get('/copy-lastreport/{id}', [WellinfoController::class, 'copyLastReport']);
    });

    Route::get('/projects/details/{project_id}/{wellinfo_id}/personnel', [PersonnelController::class, 'show'])->name('personnel.show');
    Route::post('/projects/details/{project_id}/{wellinfo_id}/updatePersonnel', [PersonnelController::class, 'update'])->name('personnel.update');

    // Route POST untuk Print (dengan Chart Base64)
    Route::post('/projects/details/{project_id}/{wellinfo_id}/print', [PdfReportController::class, 'generateWithChart'])->name('pdf.generateWithChart');


    Route::prefix('pm-admin')->group(function () {
        Route::get('/', [PmCategoryController::class, 'index'])->name('pm.index');
        Route::get('/add-category', [PmCategoryController::class, 'create'])->name('pm.create');
        Route::post('/store-category', [PmCategoryController::class, 'store'])->name('pm.store');
        Route::get('/{category}/edit', [PmCategoryController::class, 'edit'])->name('pm.edit');
        Route::put('/{category}/update', [PmCategoryController::class, 'update'])->name('pm.update');
        Route::get('/{category}/delete', [PmCategoryController::class, 'destroy'])->name('pm.delete'); 

        // Data per kategori
        Route::get('/{category}/show', [PmDataController::class, 'index'])->name('pm.data.index');
        Route::post('/{category}/store-data', [PmDataController::class, 'store'])->name('pm.data.store');
        Route::get('/{category}/{data}/edit', [PmDataController::class, 'edit'])->name('pm.data.edit');
        Route::put('/{category}/{data}/update', [PmDataController::class, 'update'])->name('pm.data.update');
        Route::delete('/{category}/{data}/delete', [PmDataController::class, 'destroy'])->name('pm.data.delete');
        Route::get('/{category}/files-data', [PmDataController::class, 'getData'])->name('pm.data.getData');
        Route::get('/{category}/{data}/download', [PmDataController::class, 'download'])->name('pm.data.download')->middleware('auth');
    });

    Route::get('/assets-category', [PmCategoryController::class, 'index'])->name('pm.create');
    Route::resource('assets', AssetListController::class);

    Route::resource('pm-category', PmDetailCategoryController::class);
    Route::resource('inspection-category', InspectionCategoryController::class);
    Route::get('/pm-detail-categories/select', [PmDetailCategoryController::class, 'select'])->name('pm-detail-category.select');

    Route::get('/assets/{asset}/pm/{pmDetail}', [PmDetailController::class, 'showPmByAsset'])->name('pmdetail.byasset');
    // Tampilkan semua inspection category untuk 1 asset
    Route::get('/assets/{asset}/inspection', [InspectionDetailController::class, 'listInspectionByAsset'])->name('inspection.list');
    
    Route::post('/inspection-details', [\App\Http\Controllers\InspectionDetailController::class, 'store']);
    Route::get('/inspection-data', [InspectionDetailController::class, 'dataIndex'])->name('inspection.data.index');
    Route::get('/inspection-data/list', [InspectionDetailController::class, 'getAllData'])->name('inspection.data.list');
    
    Route::get('/preventive-category', [PmDetailCategoryController::class, 'index'])->name('preventive.maintenance.index');
    Route::get('/preventive-maintenance/data', [PmDetailCategoryController::class, 'getData'])->name('preventive.maintenance.data');

    Route::get('/preventive-maintenance', [App\Http\Controllers\PmCategoryController::class, 'maintenanceView'])->name('preventive.maintenance');

    Route::get('/preventive-data', [PmDetailController::class, 'index'])->name('preventive.data');
    Route::get('/preventive-data/list', [PmDetailController::class, 'getList'])->name('preventive.data.list');
    Route::post('/preventive-data/store', [PmDetailController::class, 'store'])->name('preventive.data.store');
    Route::get('/preventive-data/{id}/edit', [PmDetailController::class, 'edit'])->name('preventive.data.edit');
    Route::put('/preventive-data/{id}', [PmDetailController::class, 'update'])->name('preventive.data.update');
    Route::delete('/preventive-data/{id}', [PmDetailController::class, 'destroy'])->name('preventive.data.delete');
    Route::get('/assets/{id}/pm', [AssetListController::class, 'getPmDetails'])->name('assets.pm');
    Route::get('/wellinfo/download-summary/{project_id}', [WellinfoController::class, 'downloadSummary'])->name('wellinfo.downloadSummary');    

});
