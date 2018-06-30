<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\AdType;
use Illuminate\Support\Facades\Auth;
use Redirect;



class HomeController extends FrontController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data['jobsList'] = Ad::select('ads.id','ads.user_id','ads.title', 'ads.description', 'ads.logo', 'ad_type.name as jobType', 'categories.name as category', 'ads.address', 'ads.created_at')
        ->join('categories', 'ads.category_id', 'categories.id')
        ->join('ad_type', 'ads.ad_type_id', 'ad_type.id')
        ->where('ads.active', 1)
        ->inRandomOrder()->simplePaginate(5);


        return view('welcome', $data);


    }


    public function checkRole(){
        $auth = Auth::user();

        if (isset($auth)) {
            
            if ($auth->user_type_id == 1 && $auth->is_admin == true) {
                //admin
                return Redirect::to('/dashobard');
                
            }else if($auth->user_type_id == 2){
                //employer
                return Redirect::to('/CompanyProfile');

            }else if($auth->user_type_id == 3){
                //candidate
                return Redirect::to('/AddResume');

            }else{
                return Redirect::to('/home');
                
            }
        }
    }

    public function AdvanceSearch()
    {
        $dataA = array();
        if (isset($_GET['keyword'])) {
            $key = $_GET['keyword'];
            $cities = $_GET['cities'];
            $categories = $_GET['categories'];

            $data = Ad::select('ads.id','ads.title','ads.logo', 'ads.description','categories.id as category_id', 'ad_type.name as jobType', 'categories.name as category','ads.user_id', 'ads.address', 'ads.created_at')
                ->join('categories', 'ads.category_id', 'categories.id')
                ->join('ad_type', 'ads.ad_type_id', 'ad_type.id')
                ->where('ads.title', 'like', '%' . $key . '%')
                ->where('ads.active', 1);
                // ->orWhere('ads.description', 'like', '%' . $key . '%');


            if ($cities != 'all') {
                    $dataA = $data->where('ads.city_id', $cities);
                    $datas['countJobsSearch'] = sizeof($dataA->get());
                    $datas['listJobs'] = $dataA->simplePaginate(20);

            }else if($categories != 'all'){
                    $dataA = $data->where('ads.category_id', $categories);
                    $datas['countJobsSearch'] = sizeof($dataA->get());
                    $datas['listJobs'] = $dataA->simplePaginate(20);

            }else{
                $dataA = $data;
                $datas['countJobsSearch'] = sizeof($data->get());
                $datas['listJobs'] = $dataA->simplePaginate(20);
            }
        }else{
            $data = Ad::select('ads.id','ads.title','ads.user_id','ads.logo', 'ads.description','categories.id  as category_id', 'ad_type.name as jobType', 'categories.name as category', 'ads.address', 'ads.created_at')
                ->join('categories', 'ads.category_id', 'categories.id')
                ->join('ad_type', 'ads.ad_type_id', 'ad_type.id');
            $datas['countJobsSearch'] = sizeof(Ad::where('active', 1)->get());
            $datas['listJobs'] = $data->simplePaginate(20);
        }
        
        return view('candidate.BrowseJob', $datas);
    }

    public function DetailJob()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data['detailJob'] = Ad::select(
                'ads.id','ads.title', 'ads.description', 'ad_type.name as jobType', 
                'ads.user_id',
                'categories.name as category', 'ads.address',
                'ads.company_name', 'ads.company_website',
                'ads.requirement','ads.company_description',
                'ads.contact_phone','ads.contact_email',
                'ads.contact_name','ads.logo',
                'ads.salary_min', 'ads.salary_max', 'ads.created_at')
                    ->join('categories', 'ads.category_id', 'categories.id')
                    ->join('ad_type', 'ads.ad_type_id', 'ad_type.id')
                    ->where('ads.id', $id)
                    ->where('ads.active', 1)
                    ->first();


            $data['featureJobsDetail'] = Ad::inRandomOrder()->take(1)->first();
            return view('job.JobDetail', $data);
        }else{
            die();
        }
        
    }
}
