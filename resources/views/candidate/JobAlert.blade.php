@extends('layouts.master')

@section('content')
</div>


<div class="page-header" style="background: url(assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Notifications</h2>
<ol class="breadcrumb">
<li><a href="#"><i class="ti-home"></i> Home</a></li>
<li class="current">Notifications</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<div id="content">
<div class="container">
<div class="row">
		
		<!-- Section Left Side Bar Candidate -->
		@Include('Include.SideBarLeftCandidate')
		<!-- End Section -->

		
<div class="col-md-8 col-sm-8 col-xs-12">
<div class="job-alerts-item">
<h3 class="alerts-title">Notifications</h3>
<div class="alerts-list">
<div class="row">
<div class="col-md-3">
<p>Job</p> 
</div>
<div class="col-md-3">
<p>Email</p>
</div>
<div class="col-md-3">
<p>Message</p>
</div>
<div class="col-md-3">
<p>Action</p>
</div>
</div>
</div>


@foreach($messageList as $item)
<div class="alerts-content">
	<div class="row">
		<div class="col-md-3">
			<a href="{{ url('DetailJob').'?id='.$item->id }}"><h3>{{ $item->title }}</h3></a>
			<span class="location"><i class="ti-location-pin"></i> {{ substr($item->address, 0, 20) }}...</span>
		</div>
		<div class="col-md-3">
			<p>{{ $item->email }}</p>
			<span>{{ $item->phone }}</span>
		</div>
		<div class="col-md-3">
			<p>{{ substr($item->message,0,40) }}...</p>
		</div>
		<div class="col-md-1">
            <a href="{{ url('AddResume').'/'.$item->email }}" class="btn btn-common btn-rm"><i class="ti-eye"></i></a>
		</div>
		<div class="col-md-2">
			@if (auth::user()->user_type_id == 2)
            <a href="{{ url('RemoveMessage').'/'.$item->id.'/'.$item->messageId }}" class="btn btn-common btn-rm"><i class="ti-trash"></i></a>
            @endif
		</div>
	</div>
</div>
@endforeach


</div>
</div>
</div>
</div>
</div>


@endsection