<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Employees;
use App\Models\Category;
use App\Models\HR\User;
use App\Models\MedicalExamination\MedicalExamination;
use App\Models\Recepion;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $acount = User::where("id", Auth::id())->first();

        $companies  = Companies::where("hospital", $acount->hospital)->count();
        $employees  = Employees::where("hospital", $acount->hospital)->count();
        $category  = Category::where("hospital", $acount->hospital)->count();
        $medical_examination  = MedicalExamination::where("hospital", $acount->hospital)->count();
        $doctor  = User::where("hospital", $acount->hospital)->where("acount", "doctor")->count();


        $MedicalExamination  = MedicalExamination::get();
        $recepion_insurance  = Recepion::
        join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
        ->join("companies", "companies.id", "=", "employees.company")
        ->join("category", "category.id", "=", "recepion.category")
        ->join("medical_examination", "medical_examination.id", "=", "recepion.medical_examination")
        //->join("users", "users.id", "=", "recepion.doctor")
        ->select("recepion.*", "employees.name as emp_name", "companies.name as company_name",  "category.name as category_name", "medical_examination.name as medical_examination_name", "medical_examination.price as price")
        ->where([["recepion.hospital", $acount->hospital], ["type", "insurance"]])->get();
        
        return view("home", compact("doctor", "companies", "employees", "category", "medical_examination"));
    }
}
