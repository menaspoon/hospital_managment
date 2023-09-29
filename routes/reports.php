<?php

use App\Http\Controllers\Reports\AnalyticsReportController;
use App\Http\Controllers\Reports\RayReportController;
use App\Http\Controllers\Reports\EmergencyReportController;
use App\Http\Controllers\Reports\QuarteringReportController;
use App\Http\Controllers\Reports\intensiveCareReportController;
use App\Http\Controllers\Reports\PhysicalTherapyReportController;
use App\Http\Controllers\Reports\MedicalExaminationReportController;


Route::group(["middleware" => "auth"], function () {

    
    // التحاليل
    Route::get('report.analytics.public', [AnalyticsReportController::class, 'public']);
    Route::get('report.analytics.company', [AnalyticsReportController::class, 'company']);
    Route::get('report.analytics.company.status', [AnalyticsReportController::class, 'company_with_status']);
    Route::get('report.analytics.employees', [AnalyticsReportController::class, 'employees']);
    Route::get('report.analytics.employees.status', [AnalyticsReportController::class, 'employees_with_status']);


    // الاشعــــة
    Route::get('report.ray.public', [RayReportController::class, 'public']);
    Route::get('report.ray.company', [RayReportController::class, 'company']);
    Route::get('report.ray.company.status', [RayReportController::class, 'company_with_status']);
    Route::get('report.ray.employees', [RayReportController::class, 'employees']);
    Route::get('report.ray.employees.status', [RayReportController::class, 'employees_with_status']);


    // الفحوصـــــأت
    Route::get('report.medical.examination.public', [MedicalExaminationReportController::class, 'public']);
    Route::get('report.medical.examination.company', [MedicalExaminationReportController::class, 'company']);
    Route::get('report.medical.examination.company.status', [MedicalExaminationReportController::class, 'company_with_status']);
    Route::get('report.medical.examination.employees', [MedicalExaminationReportController::class, 'employees']);
    Route::get('report.medical.examination.employees.status', [MedicalExaminationReportController::class, 'employees_with_status']);
    Route::get('report.medical.examination.status', [MedicalExaminationReportController::class, 'status']);

    // الطــــــــوائ
    Route::get('report.emergency.public', [EmergencyReportController::class, 'public']);
    Route::get('report.emergency.company', [EmergencyReportController::class, 'company']);
    Route::get('report.emergency.company.status', [EmergencyReportController::class, 'company_with_status']);
    Route::get('report.emergency.employees', [EmergencyReportController::class, 'employees']);
    Route::get('report.emergency.employees.status', [EmergencyReportController::class, 'employees_with_status']);
    Route::get('report.emergency.status', [EmergencyReportController::class, 'status']);


    // العناية المركزة
    Route::get('report.intensive.care.public', [intensiveCareReportController::class, 'public']);
    Route::get('report.intensive.care.company', [intensiveCareReportController::class, 'company']);
    Route::get('report.intensive.care.company.status', [intensiveCareReportController::class, 'company_with_status']);
    Route::get('report.intensive.care.employees', [intensiveCareReportController::class, 'employees']);
    Route::get('report.intensive.care.employees.status', [intensiveCareReportController::class, 'employees_with_status']);
    Route::get('report.intensive.care.status', [intensiveCareReportController::class, 'status']);

    
    // العناية المركزة
    Route::get('report.physical.therapy.public', [PhysicalTherapyReportController::class, 'public']);
    Route::get('report.physical.therapy.company', [PhysicalTherapyReportController::class, 'company']);
    Route::get('report.physical.therapy.company.status', [PhysicalTherapyReportController::class, 'company_with_status']);
    Route::get('report.physical.therapy.employees', [PhysicalTherapyReportController::class, 'employees']);
    Route::get('report.physical.therapy.employees.status', [PhysicalTherapyReportController::class, 'employees_with_status']);
    Route::get('report.physical.therapy.status', [PhysicalTherapyReportController::class, 'status']);

    
    // الايـــــــواء
    Route::get('report.quartering.public', [QuarteringReportController::class, 'public']);
    Route::get('report.quartering.company', [QuarteringReportController::class, 'company']);
    Route::get('report.quartering.company.status', [PhysicalThQuarteringReportControllererapyReportController::class, 'company_with_status']);
    Route::get('report.quartering.employees', [QuarteringReportController::class, 'employees']);
    Route::get('report.quartering.employees.status', [QuarteringReportController::class, 'employees_with_status']);
    Route::get('report.quartering.status', [QuarteringReportController::class, 'status']);

    
    
});