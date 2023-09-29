@extends('master')
@section('content')




<style>
.reports a {
    text-decoration: none;
    background: #fff;
    padding: 10px;
    margin-bottom: 25px;
    display: block;
    border: 1px solid #dee2e6;
        color: #000;
}

.reports a i {
    margin-left: 13px;
    font-size: 20px;
}
</style>

<div class="reports">
    <div class="row">
        <div class="col-md-4">
            <h4>تقارير عامة</h4> <br>
            <a href="reports.public"><i class="fal fa-file-chart-line"></i> تقرير عام </a>
            <a href="reports.company"> <i class="fal fa-file-chart-line"></i> تقرير الشركة</a>
            <a href="reports.employees"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين </a>
            <a href="reports.money"> <i class="fal fa-file-chart-line"></i> تقارير القيمة </a>
        </div>
        <div class="col-md-4">
            <h4>تقارير التحاليــــــــل</h4> <br>
            <a href="report.analytics.public"> <i class="fal fa-file-chart-line"></i> تقرير عام للتحاليل</a>
            <a href="report.analytics.company"> <i class="fal fa-file-chart-line"></i> تقرير الشركة</a>
            <a href="report.analytics.company.status"> <i class="fal fa-file-chart-line"></i> تقرير الشركة مع الحالة</a>
            <a href="report.analytics.employees"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين </a>
            <a href="report.analytics.employees.status"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين  مع الحالة</a>
        </div>
        <div class="col-md-3">
            <h4>تقارير الاشعــــــــة</h4> <br>
            <a href="report.ray.public"> <i class="fal fa-file-chart-line"></i> تقرير عام للاشعة</a>
            <a href="report.ray.company"> <i class="fal fa-file-chart-line"></i> تقرير الشركة</a>
            <a href="report.ray.company.status"> <i class="fal fa-file-chart-line"></i> تقرير الشركة مع الحالة</a>
            <a href="report.ray.employees"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين </a>
            <a href="report.ray.employees.status"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين  مع الحالة</a>
        </div>
        <div class="col-md-3">
            <h4>تقارير الفحوصات</h4> <br>
            <a href="report.medical.examination.public"> <i class="fal fa-file-chart-line"></i> تقرير عام للفحوصات</a>
            <a href="report.medical.examination.status"> <i class="fal fa-file-chart-line"></i> تقرير  الفحوصات مع الحالة</a>
            <a href="report.medical.examination.company"> <i class="fal fa-file-chart-line"></i> تقرير الشركة للفحوصات</a>
            <a href="report.medical.examination.company.status"> <i class="fal fa-file-chart-line"></i> تقرير الشركة مع الحالة للفحوصات</a>
            <a href="report.medical.examination.employees"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين للفحوصات</a>
            <a href="report.medical.examination.employees.status"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين  مع الحالة للفحوصات</a>
        </div>
        <div class="col-md-3">
            <h4>تقارير الطـــــــوارئ</h4> <br> 
            <a href="report.emergency.public"> <i class="fal fa-file-chart-line"></i> تقرير عام للطـــــــوارئ</a>
            <a href="report.emergency.status"> <i class="fal fa-file-chart-line"></i> تقرير  الطـــــــوارئ مع الحالة</a>
            <a href="report.emergency.company"> <i class="fal fa-file-chart-line"></i> تقرير الشركة للطـــــــوارئ</a>
            <a href="report.emergency.company.status"> <i class="fal fa-file-chart-line"></i> تقرير الشركة مع للطـــــــوارئ</a>
            <a href="report.emergency.employees"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين للطـــــــوارئ</a>
            <a href="report.emergency.employees.status"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين  مع الحالة للطـــــــوارئ</a>
        </div>
        <div class="col-md-3">
            <h4>العناية المركزة </h4> <br> 
            <a href="report.intensive.care.public"> <i class="fal fa-file-chart-line"></i> تقرير عام للعناية المركزة</a>
            <a href="report.intensive.care.status"> <i class="fal fa-file-chart-line"></i> تقرير  العناية المركزة  مع الحالة</a>
            <a href="report.intensive.care.company"> <i class="fal fa-file-chart-line"></i> تقرير شركات التامين للعناية المركزة </a>
            <a href="report.intensive.care.company.status"> <i class="fal fa-file-chart-line"></i> تقرير شركات التامين مع الحالة للعناية المركزة</a>
            <a href="report.intensive.care.employees"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين مع العناية المركزة</a>
            <a href="report.intensive.care.employees.status"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين  مع الحالة للطـــــــوارئ</a>
        </div>
        <div class="col-md-3">
            <h4> العلاج الطبيعـــي </h4> <br> 
            <a href="report.physical.therapy.public"> <i class="fal fa-file-chart-line"></i> تقرير عام للعناية المركزة</a>
            <a href="report.physical.therapy.status"> <i class="fal fa-file-chart-line"></i> تقرير  العناية المركزة  مع الحالة</a>
            <a href="report.physical.therapy.company"> <i class="fal fa-file-chart-line"></i> تقرير شركات التامين للعناية المركزة </a>
            <a href="report.physical.therapy.company.status"> <i class="fal fa-file-chart-line"></i> تقرير شركات التامين مع الحالة للعناية المركزة</a>
            <a href="report.physical.therapy.employees"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين مع العناية المركزة</a>
            <a href="report.physical.therapy.employees.status"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين  مع الحالة للطـــــــوارئ</a>
        </div>
        <div class="col-md-3">
            <h4> الايــــــواء </h4> <br> 
            <a href="report.quartering.public"> <i class="fal fa-file-chart-line"></i> تقرير عام للعناية المركزة</a>
            <a href="report.quartering.status"> <i class="fal fa-file-chart-line"></i> تقرير  العناية المركزة  مع الحالة</a>
            <a href="report.quartering.company"> <i class="fal fa-file-chart-line"></i> تقرير شركات التامين للعناية المركزة </a>
            <a href="report.quartering.company.status"> <i class="fal fa-file-chart-line"></i> تقرير شركات التامين مع الحالة للعناية المركزة</a>
            <a href="report.quartering.employees"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين مع العناية المركزة</a>
            <a href="report.quartering.employees.status"> <i class="fal fa-file-chart-line"></i> تقارير الموظفين  مع الحالة للطـــــــوارئ</a>
        </div>
    </div>
</div>







@endsection