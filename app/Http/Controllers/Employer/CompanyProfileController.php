<?php

namespace App\Http\Controllers\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;
use App\Models\CompanyProfile;
use App\Models\User;
use App\Models\Category;
use App\Models\City;
use Illuminate\Support\Facades\File;


class CompanyProfileController extends FrontController
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
        $data['companyType'] = Category::where('active', 1)->get();
        $data['city'] = City::where('active', 1)->get();
        $data['company'] = CompanyProfile::where('user_id', $this->user->id)->first();

        return view('employer.Company', $data);
    }

    public function CompanyName(Request $request)
    {
        $data = array(
            'company_name' => $request->companyName,
            'user_id' => $this->user->id
        );

        $insert = new CompanyProfile($data);
        $insert->save();
        return $this->index();
    }

    public  function UpdateCompany(Request $request)
    {
        $company_id = $request->input('id');

        $c = CompanyProfile::where('id', $company_id);
        $c->delete();

        // Upload Logo
        if ($request->hasFile('logoCompany')) {
            $destination_path = 'uploads/pictures/';
            $prefix_filename =  'logo/';
            $full_destination_path = public_path() . '/' . $destination_path . $prefix_filename;

            // Process file request
            $file = $request->file('logoCompany');

            if ($file->isValid()) {
                 // Create destination path if not exists
                 if (!File::exists($full_destination_path)) {
                     File::makeDirectory($full_destination_path, 0755, true);
                 }

                 // Build the new filename
                 $filename_gen =  'logo_'. $this->user->id .'.jpg';
                 
                 // Save Resume on the server
                 $file->move($full_destination_path, $filename_gen);
            }
        }

        $companyInfo = array(
            'company_name'          => $request->input('company_name'),
            'country_code'          => 1,
            'user_id'               => $this->user->id,
            'company_slogan'          => $request->input('slogan'),
            'company_hiring'          => $request->input('hiring'),
            'company_no_emp'          => $request->input('noEmp'),
            'company_type'          => $request->input('type'),
            'company_description'   => $request->input('description'),
            'company_about'   => $request->input('about'),
            'company_website'       => $request->input('website'),
            'company_phone'         => $request->input('phone'),
            'company_mission'         => $request->input('mission'),
            'company_address'       => $request->input('loc_search'),
            'company_no'       => $request->input('no'),
            'company_zip'       => $request->input('zip'),
            'company_street'       => $request->input('street'),
            'company_commune'       => $request->input('commune'),
            'company_email'         => $request->input('com-email'),
            'company_facebook'         => $request->input('com-facebook'),
            'company_twitter'         => $request->input('com-twitter'),
            'company_linkedin'         => $request->input('com-linkedin'),
            'city_id'               => 1,
            'lat'                   => 12212.12,
            'lan'                   => 1212.12,
            'ip_addr'               => '122.2.22.2',
            'active'                => 1
            );

        $company = new CompanyProfile($companyInfo);
        $company->save();
        return redirect('/CompanyProfile');
    }
}
