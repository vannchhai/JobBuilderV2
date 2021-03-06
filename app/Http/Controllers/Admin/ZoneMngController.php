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
use App\Models\Continent;
use Illuminate\Support\Facades\File;

class ZoneMngController extends Controller
{
    public function index(){
    	$data['continent'] = Continent::where('active', 1)
    	->paginate(15);
    	return view('admin.zone', $data);
    }
}
