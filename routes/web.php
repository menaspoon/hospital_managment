<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\RecepionController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MedicalExaminationController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\CorporatePremiumsController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BanksController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CompaniesStatusController;
use App\Http\Controllers\FiltterController;
use App\Http\Controllers\DiagnosingController;


use App\Http\Controllers\Stock\ProductsController;
use App\Http\Controllers\Stock\StockController;
use App\Http\Controllers\Stock\ReportStockController;

use App\Http\Controllers\HR\VacationController;
use App\Http\Controllers\HR\PayrollController;
use App\Http\Controllers\HR\UsersController;


use App\Http\Controllers\Surgery\SurgeryController;
use App\Http\Controllers\Surgery\SurgeryDepartmentController;

use App\Http\Controllers\Analytics\AnalyticsDepartmentController;
use App\Http\Controllers\Analytics\AnalyticsController;

use App\Http\Controllers\Emergency\EmergencyDepartmentController;
use App\Http\Controllers\Emergency\EmergencyController;

use App\Http\Controllers\Ray\RayDepartmentController;
use App\Http\Controllers\Ray\RayController;

use App\Http\Controllers\IntensiveCare\IntensiveCareDepartmentController;
use App\Http\Controllers\IntensiveCare\IntensiveCareController;
// الايــــاء
use App\Http\Controllers\Quartering\QuarteringDepartmentController;
use App\Http\Controllers\Quartering\QuarteringController;
// العلاج الطبيعــــــي
use App\Http\Controllers\PhysicalTherapy\PhysicalTherapyController;
use App\Http\Controllers\PhysicalTherapy\PhysicalTherapyDepartmentController;

use App\Http\Controllers\Tools\ToolsController;
use App\Http\Controllers\Tools\ToolsPurchasesController;

use App\Http\Controllers\Pharmacy\PharmacyController;
use App\Http\Controllers\Pharmacy\InvoiceBuyingMedicinesController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/login.employees', [App\Http\Controllers\Auth\LoginEmployeesController::class, 'login']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(["middleware" => "auth"], function () {





    
    //Route::get('report.analytics.company', [AnalyticsReportController::class, 'company']);
    //Route::get('reports.analytics.company.with.status', [FiltterController::class, 'company_with_status'])->name('reports.analytics.company.with.status');



    
    Route::get('diagnosing/{member}', [DiagnosingController::class, 'index']);
    Route::post('store.diagnosing', [DiagnosingController::class, 'store']);

    
    Route::get('public.delete', [PublicController::class, 'delete']);

    
    Route::get('products', [ProductsController::class, 'index']);
    Route::post('store.product', [ProductsController::class, 'store'])->name("store.product");
    Route::get('ajax.get.product', [ProductsController::class, 'edit']);
    Route::post('update.product', [ProductsController::class, 'update']);


    Route::get('stock', [StockController::class, 'index']);
    Route::post('transformation.product', [StockController::class, 'transformation']);
    Route::post('receive.product', [StockController::class, 'receiveProdact']);
    
    Route::get('report.stock', [ReportStockController::class, 'public']);

    

    // الحجـــــوزات
    Route::get('booking', [BookingController::class, 'index']);
    Route::get('booking.details/{id}', [BookingController::class, 'details']);

    // الشـــــــركات
    Route::get('companies.status/{company}', [CompaniesStatusController::class, 'index']);
    Route::post('store.companies.status', [CompaniesStatusController::class, 'store'])->name("store.companies.status");
    Route::get('ajax.get.approve.status.company', [CompaniesStatusController::class, 'edit']);
    Route::post('update.companies.status', [CompaniesStatusController::class, 'update'])->name("update.companies.status");

    
    // المستشـــــفيات
    Route::get('hospital', [HospitalController::class, 'index']);
    Route::post('store.hospital', [HospitalController::class, 'store'])->name("store.hospital");
    Route::get('ajax.get.hospital', [HospitalController::class, 'edit']);
    Route::post('update.hospital', [HospitalController::class, 'update'])->name("update.hospital");
    Route::get('edit.hospital', [HospitalController::class, 'edit_hospital']);
    
    // الشركــــــــات
    Route::get('all.companies', [CompaniesController::class, 'index']);
    Route::get('companies', [CompaniesController::class, 'index']);
    Route::post('store.company', [CompaniesController::class, 'store'])->name("store.company");
    Route::get('ajax.get.employees.campany', [CompaniesController::class, 'get_employees_campany'])->name("ajax.get.employees.campany");
    
    // اقســـاط الشركات
    Route::get('corporate.premiums/{company}', [CorporatePremiumsController::class, 'index']);
    Route::post('store.corporate.premiums', [CorporatePremiumsController::class, 'store'])->name("store.corporate.premiums");
    

    // الموردين
    Route::get('supplier', [SupplierController::class, 'index']);
    Route::post('store.supplier', [SupplierController::class, 'store'])->name("store.supplier");
    Route::get('ajax.get.supplier', [SupplierController::class, 'edit']);
    Route::post('update.supplier', [SupplierController::class, 'update'])->name("update.supplier");
    
    // الخزينة
    Route::get('banks', [BanksController::class, 'index']);
    Route::post('store.bank', [BanksController::class, 'store'])->name("store.bank");
    Route::get('ajax.get.bank', [BanksController::class, 'edit']);
    Route::post('update.bank', [BanksController::class, 'update'])->name("update.bank");


    // موظفين الشركات
    Route::get('employees/{company}', [EmployeesController::class, 'index']);
    Route::post('store.employees', [EmployeesController::class, 'store'])->name("store.employees");
    Route::get('ajax.get.edit.employees', [EmployeesController::class, 'edit']);
    Route::post('update.employees', [EmployeesController::class, 'update'])->name("update.employees");

    
    // اقســـــام المستشفي 
    Route::get('categories', [CategoriesController::class, 'index']);
    Route::post('store.category', [CategoriesController::class, 'store'])->name("store.category");
    Route::get('ajax.get.category', [CategoriesController::class, 'edit']);
    Route::post('update.category', [CategoriesController::class, 'update'])->name("update.category");

    // كشف المستشفي 
    Route::get('medical.examination/{category}', [MedicalExaminationController::class, 'index']);
    Route::post('store.medical.examination', [MedicalExaminationController::class, 'store'])->name("store.medical.examination");    
    Route::get('ajax.get.medical.examination', [MedicalExaminationController::class, 'edit']);
    Route::post('update.medical.examination', [MedicalExaminationController::class, 'update'])->name("update.medical.examination");


    // حسابات الموظفين
    Route::get('acounts/{acounts}', [UsersController::class, 'index']);
    Route::post('store.acount', [UsersController::class, 'store'])->name("store.acount");
    Route::get('edit.acount', [UsersController::class, 'edit']);
    Route::post('update.acount', [UsersController::class, 'update'])->name("update.acount");
    Route::get('delete.user.acount/{id}', [UsersController::class, 'delete']);
    
    // الاستقبـال
    Route::get('recepion', [RecepionController::class, 'index']);
    Route::post('store.recepion', [RecepionController::class, 'store'])->name("store.recepion");
    Route::post('store.single.recepion', [RecepionController::class, 'store_single_recepion'])->name("store.single.recepion");
    Route::get('examination/{id}', [RecepionController::class, 'examination']);
    Route::get('query.insurance.number', [RecepionController::class, 'query_insurance_number']);
    Route::get('ajax.get.medical.examination', [RecepionController::class, 'get_medical_examination']);
    

    Route::get('my.examination.doctor', [DoctorController::class, 'index']);

 
    // الاعدادات
    Route::get('settings', [SettingsController::class, 'index']);
    Route::post('update.settings', [SettingsController::class, 'update'])->name('update.settings');

    // التقارير
    Route::get('reports', [FiltterController::class, 'index']);
    Route::get('reports.public', [FiltterController::class, 'public'])->name('reports.public');
    Route::get('reports.company', [FiltterController::class, 'company'])->name('reports.company');
    Route::get('reports.company.with.status', [FiltterController::class, 'company_with_status'])->name('reports.company.with.status');
    Route::get('reports.employees', [FiltterController::class, 'employees'])->name('reports.employees');
    Route::get('reports.employees.with.status', [FiltterController::class, 'employees_with_status'])->name('reports.employees.with.status');
    Route::get('reports.money', [FiltterController::class, 'money'])->name('reports.money');


    // الاشعارات
    Route::get('notifications', [NotificationsController::class, 'index']);

    // الرسائل
    Route::get('chat/{sender}/{user}', [MessengerController::class, 'index']);
    Route::get('all.message', [MessengerController::class, 'all']);
    Route::get('get.chat', [MessengerController::class, 'allMessage']);
    Route::get('send.message', [MessengerController::class, 'store']);


    
    Route::get('pharmacy', [PharmacyController::class, 'index']);
    Route::post('store.prodact.pharmacy', [PharmacyController::class, 'store'])->name("store.prodact.pharmacy");
    Route::get('ajax.get.pharmacy', [PharmacyController::class, 'edit']);
    Route::post('update.prodact.pharmacy', [PharmacyController::class, 'update'])->name("update.prodact.pharmacy");

    // شراء الادوية للصيدلية
    Route::get('buying.medicines.pharmacy', [InvoiceBuyingMedicinesController::class, 'index']);
    Route::get('new.buying.medicines.pharmacy', [InvoiceBuyingMedicinesController::class, 'create']);
    Route::post('store.buying.medicines.pharmacy', [InvoiceBuyingMedicinesController::class, 'store'])->name("store.buying.medicines.pharmacy");
    Route::get('invoice.detales.buying.medicines.pharmacy/{id}', [InvoiceBuyingMedicinesController::class, 'invoice_detales']);
     

    // الصيدلية
    Route::get('new.purchases.pharmacy', [PharmacyController::class, 'purchases']);
    Route::post('store.purchases.pharmacy', [PharmacyController::class, 'store_purchases'])->name("store.purchases.pharmacy");
     
    
    // اقســـــام الطوارئ 
    Route::get('emergency.department', [EmergencyDepartmentController::class, 'index']);
    Route::post('store.emergency.department', [EmergencyDepartmentController::class, 'store'])->name("store.emergency.department");
    Route::get('ajax.get.emergency.department', [EmergencyDepartmentController::class, 'edit']);
    Route::post('update.emergency.department', [EmergencyDepartmentController::class, 'update'])->name("update.emergency.department");

    //  الطوارئ 
    Route::get('emergency/{category}', [EmergencyController::class, 'index']);
    Route::post('store.emergency', [EmergencyController::class, 'store'])->name("store.emergency");
    Route::get('ajax.get.emergency', [EmergencyController::class, 'edit']);
    Route::post('update.emergency', [EmergencyController::class, 'update'])->name("update.emergency");


    // اقســـــام  الاشعة 
    Route::get('ray.department', [RayDepartmentController::class, 'index']);
    Route::post('store.ray.department', [RayDepartmentController::class, 'store'])->name("store.ray.department");
    Route::get('ajax.get.ray.department', [RayDepartmentController::class, 'edit']);
    Route::post('update.ray.department', [RayDepartmentController::class, 'update'])->name("update.ray.department");

    //   الاشعة 
    Route::get('ray/{category}', [RayController::class, 'index']);
    Route::post('store.ray', [RayController::class, 'store'])->name("store.ray");
    Route::get('ajax.get.ray', [RayController::class, 'edit']);
    Route::post('update.ray', [RayController::class, 'update'])->name("update.ray");

    // اقســـــام  العلاج الطبيعي 
    Route::get('physical.therapy.department', [PhysicalTherapyDepartmentController::class, 'index']);
    Route::post('store.physical.therapy.department', [PhysicalTherapyDepartmentController::class, 'store'])->name("store.physical.therapy.department");
    Route::get('ajax.get.physical.therapy.department', [PhysicalTherapyDepartmentController::class, 'edit']);
    Route::post('update.physical.therapy.department', [PhysicalTherapyDepartmentController::class, 'update'])->name("update.physical.therapy.department");

    //  العلاج الطبيعي  
    Route::get('physical.therapy/{category}', [PhysicalTherapyController::class, 'index']);
    Route::post('store.physical.therapy', [PhysicalTherapyController::class, 'store'])->name("store.physical.therapy");
    Route::get('ajax.get.physical.therapy', [PhysicalTherapyController::class, 'edit']);
    Route::post('update.physical.therapy', [PhysicalTherapyController::class, 'update'])->name("update.physical.therapy");

    
    
    
    // اقســـــام العناية المركزة 
    Route::get('intensive.care.department', [IntensiveCareDepartmentController::class, 'index']);
    Route::post('store.intensive.care.department', [IntensiveCareDepartmentController::class, 'store'])->name("store.intensive.care.department");
    Route::get('ajax.get.intensive.care.department', [IntensiveCareDepartmentController::class, 'edit']);
    Route::post('update.intensive.care.department', [IntensiveCareDepartmentController::class, 'update'])->name("update.intensive.care.department");

    //  العناية المركزة 
    Route::get('intensive.care/{category}', [IntensiveCareController::class, 'index']);
    Route::post('store.intensive.care', [IntensiveCareController::class, 'store'])->name("store.intensive.care");
    Route::get('ajax.get.intensive.care', [IntensiveCareController::class, 'edit']);
    Route::post('update.intensive.care', [IntensiveCareController::class, 'update'])->name("update.intensive.care");
    
    // اقســـــام العناية المركزة 
    Route::get('quartering.department', [QuarteringDepartmentController::class, 'index']);
    Route::post('store.quartering.department', [QuarteringDepartmentController::class, 'store'])->name("store.quartering.department");
    Route::get('ajax.get.quartering.department', [QuarteringDepartmentController::class, 'edit']);
    Route::post('update.quartering.department', [QuarteringDepartmentController::class, 'update'])->name("update.quartering.department");

    //  العناية المركزة 
    Route::get('quartering/{category}', [QuarteringController::class, 'index']);
    Route::post('store.quartering', [QuarteringController::class, 'store'])->name("store.quartering");
    Route::get('ajax.get.quartering', [QuarteringController::class, 'edit']);
    Route::post('update.quartering', [QuarteringController::class, 'update'])->name("update.quartering");


    // اقســـــام التحاليل 
    Route::get('analytics.department', [AnalyticsDepartmentController::class, 'index']);
    Route::post('store.analytics.department', [AnalyticsDepartmentController::class, 'store'])->name("store.analytics.department");
    Route::get('ajax.get.analytics.department', [AnalyticsDepartmentController::class, 'edit']);
    Route::post('update.analytics.department', [AnalyticsDepartmentController::class, 'update'])->name("update.analytics.department");

    //  التحاليل 
    Route::get('analytics/{category}', [AnalyticsController::class, 'index']);
    Route::post('store.analytics', [AnalyticsController::class, 'store'])->name("store.analytics");
    Route::get('ajax.get.analytics', [AnalyticsController::class, 'edit']);
    Route::post('update.analytics', [AnalyticsController::class, 'update'])->name("update.analytics");

    // اقســـــام العمليات 
    Route::get('surgery.department', [SurgeryDepartmentController::class, 'index']);
    Route::post('store.surgery.department', [SurgeryDepartmentController::class, 'store'])->name("store.surgery.department");
    Route::get('ajax.get.surgery.department', [SurgeryDepartmentController::class, 'edit']);
    Route::post('update.surgery.department', [SurgeryDepartmentController::class, 'update'])->name("update.surgery.department");

    // العمليات
    Route::get('surgery', [SurgeryController::class, 'index']);
    Route::post('store.surgery', [SurgeryController::class, 'store'])->name("store.surgery");
    Route::get('ajax.get.surgery', [SurgeryController::class, 'edit']);
    Route::post('update.surgery', [SurgeryController::class, 'update'])->name("update.surgery");


    // الحضور والغياب
    Route::get('officer.absence/{acounts}', [AbsenceController::class, 'index']);
    Route::get('oficer.absence', [AbsenceController::class, 'index']);
    Route::get('user.store.plus', [AbsenceController::class, 'plus']);
    Route::get('user.store.minus', [AbsenceController::class, 'minus']);
    Route::get('user.store.departure', [AbsenceController::class, 'departure']);
    Route::get('user.store.vacation', [AbsenceController::class, 'vacation']);
    Route::get('user.store.overtime', [AbsenceController::class, 'overtime']);
    Route::get('absence.fillter', [AbsenceController::class, 'absence_fillter'])->name('absence.fillter');
    














    // الاجــــازات
    Route::get('vacation', [VacationController::class, 'index']);
    Route::get('my-vacation', [VacationController::class, 'my']);
    Route::post('store.vacation', [VacationController::class, 'store'])->name("store.vacation");
    Route::get('ajax.get.vacation', [VacationController::class, 'edit']);
    Route::post('update.vacation', [VacationController::class, 'update'])->name("update.vacation");


    // الرواتب 
    Route::get('payroll', [PayrollController::class, 'index']);
    Route::post('store.payroll', [PayrollController::class, 'store']);
    Route::get('ajax.get.payroll', [PayrollController::class, 'edit']);
    Route::post('update.payroll', [PayrollController::class, 'update']);











    Route::get('tools', [ToolsController::class, 'index']);
    Route::post('store.tools', [ToolsController::class, 'store'])->name("store.tools");
    Route::get('ajax.get.tools', [ToolsController::class, 'edit']);
    Route::post('update.tools', [ToolsController::class, 'update'])->name("update.tools");
    Route::post('store.extraction.tool', [ToolsController::class, 'update'])->name("store.extraction.tool");
    
    Route::get('purchases.tools', [ToolsPurchasesController::class, 'index']);
    Route::get('create.purchases.tools', [ToolsPurchasesController::class, 'create']);
    Route::post('store.purchases.tools', [ToolsPurchasesController::class, 'store'])->name("store.purchases.tools");
    Route::get('details.purchases.tools', [ToolsPurchasesController::class, 'invoice_detales']);
    



    // تسجيل الخروج
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

});
