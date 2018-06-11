<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;
use App\Models\Category;
use App\Models\AdType;
use App\Models\Ad;
use App\Models\SalaryType;
use App\Models\CompanyProfile;


class AddJobController extends FrontController
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category'] = Category::where('active', 1)->get();
        $data['type'] = AdType::where('active', 1)->get();
        $data['salaryType'] = SalaryType::where('active', 1)->where('translation_lang', 'en')->get();

        return view('employer.AddJob', $data);
    }

    public function PostJobs(Request $request)
    {
        $company = CompanyProfile::where('user_id',$this->user->id)->first();

        if (!isset($company)) {
           if ($company->company_name == '' && $company->contact_email == '' && $company->contact_phone == '' && $company->contact_name == '') {
               return redirect('/CompanyProfile');
           }
        }
        $data = array(
            'user_id' => $this->user->id,
            'category_id' => $request->category,
            'ad_type_id' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'requirement' => $request->requirement,
            'salary_min' => $request->minSalary,
            'salary_max' => $request->maxSalary,
            'negotiable' => 1,
            'start_date' => $request->closingDate,
            'salary_type_id' => $request->salaryType,
            'contact_name' => $request->contactName,

            'country_code' => 'KH',
            'company_name' => $company->company_name,
            'company_description' => $company->company_description,
            'company_website' => $company->company_website,
            'logo' => $company->logo,
            'contact_email' => $company->company_email,
            'contact_phone' => $company->company_phone,
            'address' => $company->company_address,
            'city_id' => $company->city_id,
            'active' => 1
        );

        $insert = new Ad($data);
        $insert->save();

        return redirect('/ManageJobsPost');
    }
}
