@extends('layouts.master')

@section('content')
</div>



<div class="page-header" style="background: url(public/assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Post A Job</h2>
<ol class="breadcrumb">
<li><a href="#"><i class="ti-home"></i> Home</a></li>
<li class="current">Post A Job</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<section id="content">
<div class="container">
<div class="row"> 
<div class="col-sm-12 col-md-9 col-md-offset-2">

<div class="page-ads box">
<form class="form-ad" action="{{ isset($jobsUpdate) ? url('/UpdateJobs') : url('/PostJobs') }}" method="post">
	@csrf
	<input type="hidden" name="id" value="{{ isset($jobsUpdate) ? $jobsUpdate->id : '' }}">
	<div class="form-group">
		<label class="control-label">Job Title</label>
		<input type="text" class="form-control" placeholder="Title" required="true" name="title" value="{{ isset($jobsUpdate) ? $jobsUpdate->title : '' }}">
	</div>

	<div class="form-group">
		<label class="control-label">Category</label>
		<div class="search-category-container">
			<label class="styled-select">
				<select class="dropdown-product selectpicker" required="true" name="category">
				<option>All Categories</option>
				@foreach($category as $key)
					<option value="{{ $key->id }}" {{ isset($jobsUpdate) ? $jobsUpdate->category_id == $key->id ? 'selected': '' : ''}}>{{ $key->name }}</option>
				@endforeach
				</select>
			</label>
		</div>
	</div>


	<div class="form-group">
		<label class="control-label">Job Type</label>
		<div class="search-category-container">
			<label class="styled-select">
				<select class="dropdown-product selectpicker" required="true" name="type">
				<option>All Type</option>
				@foreach($type as $key)
					<option value="{{ $key->id }}" {{ isset($jobsUpdate) ? $jobsUpdate->ad_type_id == $key->id ? 'selected': '' : ''}}>{{ $key->name }}</option>
				@endforeach
				</select>
			</label>
		</div>
	</div>

	<div class="form-group">
	<label class="control-label">Closing Date <span>(optional)</span></label>
	<input type="date" class="form-control" placeholder="yyyy-mm-dd" name="closingDate" value="{{ isset($jobsUpdate) ? $jobsUpdate->start_date : '' }}">
	<p class="note">Deadline for new applicants.</p>
	</div>


	<div class="form-group">
		<label class="control-label">Contact Name (HR)</label>
		<input type="text" class="form-control" placeholder="Contact Name" required="true" name="contactName" value="{{ isset($jobsUpdate) ? $jobsUpdate->contact_name : '' }}">
	</div>

	<div class="form-group">
		<label class="control-label">Min Salary</label>
		<input type="number" class="form-control" placeholder="Min Salary" required="true" name="minSalary" name="contactName" value="{{ isset($jobsUpdate) ? $jobsUpdate->salary_min : '' }}">
	</div>

	<div class="form-group">
		<label class="control-label">Max Salary</label>
		<input type="number" class="form-control" placeholder="Max Salary" required="true" name="maxSalary" name="contactName" value="{{ isset($jobsUpdate) ? $jobsUpdate->salary_max : '' }}">
	</div>

	<div class="form-group">
		<label class="control-label">Salary Type</label>
		<div class="search-category-container">
			<label class="styled-select">
				<select class="dropdown-product selectpicker" required="true" name="salaryType">
				@foreach($salaryType as $key)
					<option value="{{ $key->id }}" {{ isset($jobsUpdate) ? $jobsUpdate->salary_type_id == $key->id ? 'selected': '' : ''}}>Per {{ $key->name }}</option>
				@endforeach
				</select>
			</label>
		</div>
	</div>


	<div class="form-group">
		<label class="control-label">Job Description</label>
		<textarea class="form-control" rows="10" required="true" name="description">{{ isset($jobsUpdate) ? $jobsUpdate->description : '' }}</textarea>
	</div>

	<div class="form-group">
		<label class="control-label">Job Requirement</label>
		<textarea class="form-control" rows="10" required="true" name="requirement">{{ isset($jobsUpdate) ? $jobsUpdate->requirement : '' }}</textarea>
	</div>
	
	<button id="signup_btn" type="submit" class="navbar-btn nav-button bounceInRight login animated" style="width:100%!important"> Public Job</button>
</form>
</div>
</div>
</div>
</div>
</section>



@endsection