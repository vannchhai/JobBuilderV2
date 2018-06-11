<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;
use App\Models\SavedAd;
use App\Models\Message;
use App\Models\Category;
use App\Models\AdType;
use App\Models\Ad;
use App\Models\CompanyProfile;
use App\Models\SalaryType;

class ManageApplicationController extends FrontController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['listManageJob'] = Ad::select('ads.id','ads.title', 'ads.description', 'ads.logo', 'ad_type.name as jobType', 'categories.name as category', 'ads.address', 'ads.created_at')
        ->join('categories', 'ads.category_id', 'categories.id')
        ->join('ad_type', 'ads.ad_type_id', 'ad_type.id')
        ->where('ads.user_id', $this->user->id)
        ->where('ads.active', 1)
        ->simplePaginate(15);

        return view('employer.ManageJob', $data);
    }

    public function RemoveJob($id){
        $update = Ad::where('id', $id)
        ->where('user_id', $this->user->id)
        ->first();

        $update->active = 0;

        $update->update();
        
        return redirect('/ManageJobsPost');
    }

    public function EditJob($id){

        $data['jobsUpdate'] = Ad::where('active', 1)
        ->where('id', $id)
        ->where('user_id', $this->user->id)
        ->first();


        $data['category'] = Category::where('active', 1)->get();
        $data['type'] = AdType::where('active', 1)->get();
        $data['salaryType'] = SalaryType::where('active', 1)->where('translation_lang', 'en')->get();

        return view('employer.AddJob', $data);
    }

    public function UpdateJobs(Request $request){
        $company = CompanyProfile::where('user_id',$this->user->id)->first();
        $data = array(
            'id' => $request->id,
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

        $insert = Ad::where('id', $request->id)->where('user_id', $this->user->id);
        $insert->update($data);

        return redirect('/ManageJobsPost');
    }
}
