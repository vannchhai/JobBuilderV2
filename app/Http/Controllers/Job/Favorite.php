<?php

namespace App\Http\Controllers\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\FrontController;
use App\Models\SavedAd;
use App\Models\Message;
use App\Models\Ad;


class Favorite extends FrontController
{
    //
    public function Add($id)
    {
    	
    	$data = array(
    		'user_id' =>  $this->user->id,
    		'ad_id' => $id
    	);

    	$insert = new SavedAd($data);
    	$insert->save();

    	return $this->Get();
    }

    public function Get(){
    	$data['listFavorite'] = SavedAd::select('ads.id','ads.title', 'ads.description', 'ads.logo', 'ad_type.name as jobType', 'categories.name as category', 'ads.address', 'ads.created_at')
    	->join('ads', 'ads.id', 'saved_ads.ad_id')
    	->join('categories', 'ads.category_id', 'categories.id')
        ->join('ad_type', 'ads.ad_type_id', 'ad_type.id')
    	->where('saved_ads.user_id', $this->user->id)
        ->where('ads.active', 1)
    	->simplePaginate(15);


    	return view('candidate.ManageResume', $data);
    }

    public function Remove($id){
    	$condition = array(
    		'user_id' => $this->user->id,
    		'ad_id' => $id
    	);
    	SavedAd::where($condition)->delete();
    	return $this->Get();
    }

    public function ApplyJobs(Request $request)
    {
    	$data = array(
    		'ad_id' => $request->adId,
    		'message' => $request->message,
    		'name' => $this->user->name,
    		'email' => $this->user->email,
    		'phone' => $this->user->phone
    	);

    	$insert = new Message($data);
    	$insert->save();
    	return redirect('/PenddingJob');
    }

    public function PenddingJob()
    {
    	$data['listPending'] = Ad::select('ads.id','ads.title', 'ads.description', 'ads.logo', 'ad_type.name as jobType', 'categories.name as category', 'ads.address', 'ads.created_at')
        ->join('categories', 'ads.category_id', 'categories.id')
        ->join('ad_type', 'ads.ad_type_id', 'ad_type.id')
        ->join('messages', 'ads.id', 'messages.ad_id')
        ->where('messages.email', $this->user->email)
        ->where('messages.status', 'pending')
        ->where('ads.active', 1)
        ->simplePaginate(15);


        return view('candidate.PendingJob', $data);
    }

    public function RemovePending($id)
    {
        $find = Message::where('ad_id', $id)
            ->where('email',$this->user->email)
            ->where('status', 'pending')
            ->first();

        $find->status = 'remove';
        $find->update();

        return redirect('/PenddingJob');

    }
}
