<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageMngController extends Controller
{
    public function faq(){
    	return view('admin.faq');
    }

    public function setting(){
    	return view('admin.setting');
    }

    public function privacy(){
    	return view('admin.privacy');
    }

    public function termOfuse(){
    	return view('admin.termOfuse');
    }

    public function contact(){
    	return view('admin.contact');
    }

    public function about(){
    	return view('admin.about');
    }

    public function help(){
    	return view('admin.help');
    }
}
