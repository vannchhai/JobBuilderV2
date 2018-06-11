<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ad;
use App\Models\Category;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->user = null;
        // From Laravel 5.3.4 or above
		$this->middleware(function ($request, $next)
		{
            $this->getCategoryList();
            $this->getFeatureJob();
            $this->getLatestJob();
            $this->countJob();
            $this->countUser();
            $this->listCategoryOption();
            $this->listCititesOption();
            $this->checkUser();
			return $next($request);
		});
    }

    /**
     * Check if User is logged
     *
     * @return bool
     */
    public function checkUser()
    {
        if (Auth::check()) {
            $this->user = Auth::user();
            view()->share('user', $this->user);
            $this->userLevel = 'user';
            return $this->user;
        }
        
        return false;
    }

    public function getCategoryList(){
        $data = array();
        $data = DB::select('SELECT job_categories.*, (SELECT COUNT(*) from job_ads where job_ads.category_id = job_categories.id) as countJob FROM `job_categories`');

        view()->share('lstCategory', $data);
    }

    public function getFeatureJob(){
        $data = Ad::where('active', 1)->inRandomOrder()->simplePaginate(8);
        view()->share('lstFeature', $data);
    }

    public function getLatestJob(){
        $data = Ad::where('active', 1)->orderBy('created_at', 'DESC')->simplePaginate(4);
        view()->share('lstLatestJob', $data);
    }

    public  function countJob()
    {
        $data = Ad::where('active', 1)->get();
        view()->share('countJob', sizeof($data));
    }

    public function countUser()
    {
        $data = User::where('active', 1)->get();
        view()->share('countUser', sizeof($data));
    }

    public function listCategoryOption()
    {
        $data = Category::where('active', 1)->get();
        view()->share('selectCategory', $data);
    }

    public function listCititesOption()
    {
        $data = City::where('active', 1)->get();
        view()->share('selectCities', $data);
    }
}
