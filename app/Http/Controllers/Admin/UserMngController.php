<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

class UserMngController extends Controller
{
    public function index(){
    	$data['usr'] = User::select('users.name as userName', 'users.*', 'user_type.*')
    	->join('user_type', 'user_type.id', 'users.user_type_id')
    	->where('users.active', 1)
    	->where('user_type_id', '!=', 1)
    	->paginate(15);
    	return view('admin.user', $data);
    }
}
