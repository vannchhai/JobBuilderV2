<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;
use App\Models\Resume;
use App\Models\Category;
use App\Models\Ad;
use App\Models\Gender;
use App\Models\UserType;
use App\Models\User;
use App\Models\CompanyProfile;
use App\Models\PersonalData;
use App\Models\CoverLetter;
use App\Models\Message;
use App\Models\TargetJobs;
use App\Models\PersonalSkill;
use App\Models\References;
use App\Models\Accomplishments;
use App\Models\CurrentAddress;
use App\Models\CandidateLanguage;
use App\Models\WorkExperence;
use App\Models\Education;
use App\Models\AdType;
use Illuminate\Support\Facades\File;

class AddResumeController extends FrontController
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
        // CV Data 
        $work = WorkExperence::where('u_id', $this->user->id)->get();
        $data['jobType'] = AdType::all();
        $data['personal'] = PersonalData::where('u_id', $this->user->id)->first();
        $data['target'] = TargetJobs::where('u_id', $this->user->id)->first();
        $data['reference'] = References::where('u_id', $this->user->id)->first();
        $data['accomplish'] = Accomplishments::where('u_id', $this->user->id)->first();
        $data['address'] = CurrentAddress::where('u_id', $this->user->id)->first();
        $data['letter'] = CoverLetter::where('u_id', $this->user->id)->first();
        $data['work'] = json_encode($work);
        $data['education'] = Education::where('u_id', $this->user->id)->get();
        $data['languages'] = CandidateLanguage::where('u_id', $this->user->id)->get();
        $data['skills'] = PersonalSkill::where('u_id', $this->user->id)->get();

        return view('candidate.AddResume',$data);
    }


    public function AddResume(Request $request){
        
        //object type
        $username = $request->username;
        $email = $request->useremail;
        $userdate = $request->userdate;
        $nationality = $request->nationality;
        $gender = $request->gender;
        $phone = $request->phone;
        $desiredsalary = $request->desiredsalary;
        $location = $request->location;
        $contracttype = $request->contracttype;
        $areainterest = $request->areainterest;
        $no = $request->no;
        $zip = $request->zip;
        $streetData = $request->streetData;
        $commune = $request->commune;
        $fb = $request->fb;
        $linkedin = $request->linkedin;
        $acctitle = $request->acctitle;
        $accdate = $request->accdate;
        $accdescription = $request->accdescription;
        $rename = $request->rename;
        $reposition = $request->reposition;
        $redescription = $request->redescription;

        // json type
        $experience = $request->experience;
        $education = $request->education;
        $education = $request->education;
        $skill = $request->skill;
        $languages = $request->languages;
        
        $uid = $this->user->id;

        $dataInformation = array(
            'u_id' => $uid,
            'u_name' => $username,
            'u_date' => $userdate,
            'u_phone' => $phone,
            'u_email' => $email,
            'u_nationality' => $nationality,
            'u_sex' => $gender
        );

        $dataTaget = array(
            'u_id' => $uid,
            't_desired_salary' => $desiredsalary,
            't_location' => $location,
            't_contract_type' => $contracttype,
            't_area_interest' => $areainterest,
        );

        $dataContact = array(
            'u_id' => $uid,
            'a_no' => $no,
            'a_zip' => $zip,
            'a_street' => $streetData,
            'a_commune' => $commune,
            'a_linkedin' => $linkedin,
            'a_facebook' => $fb
        );

        $dataAccom = array(
            'u_id' => $uid,
            'a_title' => $uid,
            'a_date' => $accdate,
            'a_description' => $accdescription
        );

        $dataReference = array(
            'u_id' => $uid,
            'r_name' => $rename,
            'r_position' => $reposition,
            'r_email' => $redescription,
            'r_phone' => '',
        );

        $personalCheck = PersonalData::where('u_id', $this->user->id)->first();
        $targetCheck = TargetJobs::where('u_id', $this->user->id)->first();
        $referenceCheck = References::where('u_id', $this->user->id)->first();
        $accomplishCheck = Accomplishments::where('u_id', $this->user->id)->first();
        $addressCheck = CurrentAddress::where('u_id', $this->user->id)->first();
        $educationCheck = Education::where('u_id', $this->user->id)->get();
        $languagesCheck = CandidateLanguage::where('u_id', $this->user->id)->get();
        $skillsCheck = PersonalSkill::where('u_id', $this->user->id)->get();

        // Upload Logo
        if ($request->hasFile('profileImage')) {
            $destination_path = 'uploads/pictures/';
            $prefix_filename =  'profile/';
            $full_destination_path = public_path() . '/' . $destination_path . $prefix_filename;

            // Process file request
            $file = $request->file('profileImage');
            if ($file->isValid()) {
             try {
                 // Create destination path if not exists
                 if (!File::exists($full_destination_path)) {
                     File::makeDirectory($full_destination_path, 0755, true);
                 }

                 // Build the new filename
                 $filename_gen =  'profile_'. $uid .'.jpg';

                 // Save Resume on the server
                 $file->move($full_destination_path, $filename_gen);

                } catch (\Exception $e) {
                 flash()->error($e->getMessage());
                }
            }
        }

        if (!isset($personalCheck)) {
            $insertPersonal = new PersonalData($dataInformation);
            $insertPersonal->save();
        }else{
            PersonalData::where('u_id', $uid)->update($dataInformation);
        }

        if (!isset($targetCheck)) {
            $insertTarget = new TargetJobs($dataTaget);
            $insertTarget->save();
            
        }else{
            TargetJobs::where('u_id', $uid)->update($dataTaget);

        }

        if (!isset($referenceCheck)) {
            $insertReference = new References($dataReference);
            $insertReference->save();
            
        }else{
            References::where('u_id', $uid)->update($dataReference);
            
        }

        if (!isset($accomplishCheck)) {
            $insertAccom = new Accomplishments($dataAccom);
            $insertAccom->save();
            
        }else{
            Accomplishments::where('u_id', $uid)->update($dataAccom);
            
        }

        if (!isset($addressCheck)) {
            $insertAddress = new CurrentAddress($dataContact);
            $insertAddress->save();
            
        }else{
            CurrentAddress::where('u_id', $uid)->update($dataContact);
            
        }

        $ex = json_decode($experience);
        $edu = json_decode($education);
        $sk = json_decode($skill);
        $lan = json_decode($languages);

        // condition
        if (isset($ex)) {
            foreach ($ex as $key) {
                $dataInsertExperence = array(
                    'u_id' => $uid,
                    'ex_title' => $key->ex_title,
                    'ex_company_name' => $key->ex_company_name,
                    'ex_company_type' => $key->ex_company_type,
                    'ex_job_role' => $key->ex_job_role,
                    'ex_career_level' => $key->ex_career_level,
                    'ex_contract_type' => $key->ex_contract_type,
                    'ex_start_date' => $key->ex_start_date,
                    'ex_end_date' => $key->ex_end_date
                );
                $workCheck = WorkExperence::where('ex_id', $key->ex_id)->first();

                if (!isset($workCheck)) {
                    $insertEx = new WorkExperence($dataInsertExperence);
                    $insertEx->save();
                }else{

                    WorkExperence::where('ex_id', $key->ex_id)->update($dataInsertExperence);
                }
            }
        }

        // education
        if (isset($edu)) {
            foreach ($edu as $key) {
                $dataInsert = array(
                    'u_id' => $uid,
                    'e_school' => $key->e_school,
                    'e_level' => $key->e_level,
                    'e_sdate' => $key->e_sdate,
                    'e_edate' => $key->e_edate,
                    'e_field_study' => $key->e_field_study,
                    'e_grade' => $key->e_grade
                );
                $check = Education::where('e_id', $key->e_id)->first();

                if (!isset($check)) {
                    $insert = new Education($dataInsert);
                    $insert->save();
                }else{

                    Education::where('e_id', $key->e_id)->update($dataInsert);
                }
            }
        }

        // skill
        if (isset($sk)) {
            foreach ($sk as $key) {
                $dataInsert = array(
                    'u_id' => $uid,
                    'p_title' => $key->p_title,
                    'p_level' => $key->p_level,
                    'p_duration' => $key->p_duration,
                    'p_description' => $key->p_description
                );
                $check = PersonalSkill::where('p_id', $key->p_id)->first();

                if (!isset($check)) {
                    $insert = new PersonalSkill($dataInsert);
                    $insert->save();
                }else{

                    PersonalSkill::where('p_id', $key->p_id)->update($dataInsert);
                }
            }
        }

        // language
        if (isset($lan)) {
            foreach ($lan as $key) {
                $dataInsert = array(
                    'u_id' => $uid,
                    'l_title' => $key->l_title,
                    'l_level' => $key->l_level,
                    'l_description' => $key->l_description,
                );
                $check = CandidateLanguage::where('l_id', $key->l_id)->first();

                if (!isset($check)) {
                    $insert = new CandidateLanguage($dataInsert);
                    $insert->save();
                }else{

                    CandidateLanguage::where('l_id', $key->l_id)->update($dataInsert);
                }
            }
        }

        
        return redirect('/AddResume');
    }

}
