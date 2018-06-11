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

class JobAlertController extends FrontController
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
        $data = array();

        if ($this->user->user_type_id == 2) {
            $data['messageList'] = Ad::select('ads.id','messages.id as messageId','ads.user_id','ads.title', 'ads.description', 'ads.logo', 'ad_type.name as jobType', 'messages.phone',
            'messages.name as message_name', 'messages.message','messages.email',
            'categories.name as category', 'ads.address', 'messages.created_at')
            ->join('messages', 'messages.ad_id', 'ads.id')
            ->join('categories', 'ads.category_id', 'categories.id')
            ->join('ad_type', 'ads.ad_type_id', 'ad_type.id')
            ->where('ads.active', 1)
            ->where('ads.user_id', $this->user->id)
            ->where('messages.status', 'pending')
            ->inRandomOrder()->simplePaginate(10);
        }else{
            $data['messageList'] = Ad::select('ads.id','messages.id as messageId','ads.user_id','ads.title', 'ads.description', 'ads.logo', 'ad_type.name as jobType', 'messages.phone',
            'messages.name as message_name', 'messages.message','messages.email',
            'categories.name as category', 'ads.address', 'messages.created_at')
            ->join('messages', 'messages.ad_id', 'ads.id')
            ->join('categories', 'ads.category_id', 'categories.id')
            ->join('ad_type', 'ads.ad_type_id', 'ad_type.id')
            ->where('ads.active', 1)
            ->where('messages.email', $this->user->email)
            ->where('messages.status', 'pending')
            ->inRandomOrder()->simplePaginate(10);
        }
        

        return view('candidate.JobAlert', $data);
    }

    public function ShowResume($id){

        $userfilter = User::where('email', $id)->first();
        if (!isset($userfilter)) {
            die();
        }

        $work = WorkExperence::where('u_id', $userfilter->id)->get();
        $data['jobType'] = AdType::all();
        $data['personal'] = PersonalData::where('u_id', $userfilter->id)->first();
        $data['target'] = TargetJobs::where('u_id', $userfilter->id)->first();
        $data['reference'] = References::where('u_id', $userfilter->id)->first();
        $data['accomplish'] = Accomplishments::where('u_id', $userfilter->id)->first();
        $data['address'] = CurrentAddress::where('u_id', $userfilter->id)->first();
        $data['letter'] = CoverLetter::where('u_id', $userfilter->id)->first();
        $data['work'] = json_encode($work);
        $data['education'] = Education::where('u_id', $userfilter->id)->get();
        $data['languages'] = CandidateLanguage::where('u_id', $userfilter->id)->get();
        $data['skills'] = PersonalSkill::where('u_id', $userfilter->id)->get();

        return view('candidate.AddResume',$data);
    }

    public function RemoveMessage($id, $mId){
        if ($this->user->user_type_id == 2) {
           $d = Message::where('ad_id', $id)
            ->where('status', 'pending')
            ->where('id', $mId)
            ->first();

            $d->status = 'remove';

            $update = Message::where('ad_id', $id)
            ->where('status', 'pending')
            ->where('id', $mId)
            ->update($d);
        }else{
            $d = Ad::where('email', $this->user->email)
            ->where('messages.status', 'pending')
            ->where('id', $mId)
            ->first();

            $d->status = 'remove';

            Message::where('email', $this->user->email)
            ->where('id', $mId)
            ->where('status', 'pending')
            ->update($d);
        }
        
        return redirect('/JobAlert');
    }
}
