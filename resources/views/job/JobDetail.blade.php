@extends('layouts.master')

@section('content')

</div>

<div class="page-header" style="background: url(public/assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Job Details</h2>
<ol class="breadcrumb">
<li><a href="#"><i class="ti-home"></i> Home</a></li>
<li class="current">Job Details</li>
</ol>
</div>
</div>
</div>
</div>
</div>

<?php 

$adLogo = '';
  if (!empty($detailJob->logo)) {
    if (is_file(public_path() . $detailJob->logo)) {
      $adLogo = url('public/'.$detailJob->logo);
    }
    if ($adLogo=='') {
      if (is_file(public_path() . '/'. $detailJob->logo)) {
        $adLogo = url('public/'.$detailJob->logo);
      }
    }
  }
  if (is_file(public_path().'pictures/logo/logo_'. $detailJob->user_id .'.jpg')) {
      $adLogo = url('public/uploads/pictures/logo/logo_'. $detailJob->user_id .'.jpg');
  }
  if ($adLogo=='') {
    $adLogo = url('public/images/default-250x200.jpg');
  }
 ?>

<section class="job-detail section">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="header-detail">
<div class="header-content pull-left">
<h2><a href="#">{{ $detailJob->title }}</a></h2>
<p><span>Date Posted: {{ $detailJob->created_at }}</span></p>
<p>Monthly Salary: <strong class="price">${{ $detailJob->salary_min }} - ${{ $detailJob->salary_max }}</strong></p>
</div>



<div class="detail-company pull-right text-right" style="width:40%">
<div class="img-thum">
<img class="img-responsive img-thumbnail pull-right" src="{{ $adLogo }}" style="width: 160px; margin-left: 20px;" alt="">
</div>
<div class="name">
<h4>{{ $detailJob->company_name }}</h4>
<h5><a href="\\{{ $detailJob->company_website}}">{{ $detailJob->company_website}}</a> </h5>
<!-- <p>8 Current jobs openings</p> -->
</div>
</div>



<div class="clearfix">
<div class="meta">
<span><a class="btn btn-border btn-sm" href="#"><i class="ti-email"></i> Email</a></span>
<span><a class="btn btn-border btn-sm" href="#"><i class="ti-info-alt"></i> Job Aleart</a></span>
<span><a class="btn btn-border btn-sm" href="#"><i class="ti-save"></i> Save This job</a></span>
 <span><a class="btn btn-border btn-sm" href="#"><i class="ti-alert"></i> Report Abuse</a></span>
</div>
</div>
</div>
</div>
<div class="col-md-8 col-sm-12 col-xs-12">
<div class="content-area">
<div class="clearfix">
<div class="box">
<h3>Job Description</h3>
<!-- <textarea class="form-control">{{ $detailJob->description}}</textarea> -->

{!! nl2br($detailJob->description) !!}

<hr>

<h3>Requirements</h3>

{!! nl2br($detailJob->requirement) !!}

<hr>

<h3>About Company</h3>

{!! nl2br($detailJob->company_description) !!}


<hr>
@if (!Auth::guest())
   @if (auth::user()->user_type_id == 3)

    <button type="button" class="btn btn-common btn-sm" data-toggle="modal" data-target="#myModal">Apply this Job</button>

  @endif
@endif
</div>
</div>
</div>


</div>
<div class="col-md-4 col-sm-12 col-xs-12">
<aside>
<div class="sidebar">
<div class="box">
<h2 class="small-title">Contact Us</h2>
<ul class="detail-list">
<li>
<a href="#"><b>Job Id:</b></a>
<span class="type-posts">TJB-{{$detailJob->id}}</span>
</li>
<li>

<li><b>Company Name:</b> <span class="type-posts">{{ $detailJob->company_name }}</span></li>
<li><b>Contact Name:</b> <span class="type-posts">{{ $detailJob->contact_name }}</span></li>
<li><b>Contact Phone:</b> <span class="type-posts">{{ $detailJob->contact_phone }}</span></li>
<li><b>Contact Email:</b> <span class="type-posts">{{ $detailJob->contact_email }}</span></li>
<b>Location</b>
<span class="type-posts">{{ $detailJob->address }}</span>
</li>
</ul>
</div>
<div class="box">
<h2 class="small-title">Featured Jobs</h2>
<div class="thumb">
<a href="{{ url('DetailJob').'?id='.$featureJobsDetail->id }}"><img src="public/assets/img/jobs/features-img-1.jpg" alt="img"></a>
</div>
<div class="text-box">
<h4><a href="{{ url('DetailJob').'?id='.$featureJobsDetail->id }}">{{ $featureJobsDetail->title }}</a></h4>
<p>{!! substr($featureJobsDetail->description ,0, 150) !!}...</p>
<!-- <a href="#" class="text"><i class="fa fa-map-marker"></i>Moorgate, London</a> -->
<a href="#" class="text"><i class="fa fa-calendar"></i>{{ $featureJobsDetail->start_date }} </a>
<strong class="price"><i class="fa fa-money"></i>${{ $featureJobsDetail->salary_min }} - ${{ $featureJobsDetail->salary_max }}</strong>
</div>
</div>
<!-- <div class="sidebar-jobs box">
<h2 class="small-title">Jobs Gallery</h2>
<ul>
<li>
<a href="#">General Compliance Officer</a>
<span><i class="fa fa-map-marker"></i>Arlington, VA </span>
<span><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </span>
</li>
<li>
<a href="#">Medical Transcrption</a>
<span><i class="fa fa-map-marker"></i>San Francisco, CA</span>
<span><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </span>
</li>
<li> 
<a href="#">Support Coordinator</a>
<span><i class="fa fa-map-marker"></i>Moorgate, London</span>
<span><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </span>
</li>
<li>
<a href="#">General Compliance Officer</a>
<span><i class="fa fa-map-marker"></i>Arlington, VA </span>
<span><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </span>
</li>
<li>
<a href="#">Medical Transcrption</a>
<span><i class="fa fa-map-marker"></i>San Francisco, CA</span>
<span><i class="fa fa-calendar"></i>Dec 22, 2017 - Mar 17, 2018 </span>
</li>
</ul>
</div> -->
</div>
</aside>
</div>
</div>
</div>
</section>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Apply Job for {{ $detailJob->title }}</h4>
      </div>
      <form method="post" action="{{ url('/ApplyJobs') }}">
        @csrf

        <div class="modal-body">
        <div class="form-group">
            <label class="control-label" for="textarea">Compose Message here*</label>
            <input type="hidden" name="adId" value="{{ $detailJob->id }}">
            <textarea class="form-control" name="message" required="true" rows="10"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info">Send</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>

  </div>
</div>


@endsection