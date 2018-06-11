@extends('layouts.master')

@section('content')
</div>



<div class="page-header" style="background: url(public/assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Company Profile</h2>
<ol class="breadcrumb">
<li><a href="#"><i class="ti-home"></i> Home</a></li>
<li class="current">Company Profile</li>
</ol>
</div>
</div>
</div>
</div>
</div>


<section id="content">
	<div class="container">
		<div class="row">


			<!-- Section Left Side Bar Candidate -->
			@Include('Include.SideBarLeftCandidate')
			<!-- End Section -->


			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="page-ads box">
			 			@if(isset($company))
                        <div class="<?php echo ($errors->has('pass')) ? 'in' : ''; ?>" id="collapseB2">
                            <form method="POST" action="{{ url('/UpdateCompany')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="panel-body">
                                    <div class="form-horizontal">
                                            <div class="company-profile">
                                                <input type="text" value="{{ $company->id }}" name="id" hidden/>
                                                <!-- <img align="left" class="fb-image-lg" src="{{asset('/images/1.jpg')}}" alt="Profile image example"> -->
                                                <?php
                                                    $adLogo = '';
                                                    // Logo setting
									                if (isset($company)) {
									                  $adLogo = url('public/uploads/pictures/logo/logo_' . $user->id .'.jpg');
									                }
                                                    ?>

                                                <center>
                                                	<img src="{{ $adLogo }}" id="default-img" class="" style="width: 150px" onerror="imgError(this);"/>	
                  									<input type="file" id="loadFile" name='logoCompany'/>

                                                </center>
                                                <hr>

                                                <div class="fb-profile-text">
                                                    <input type="text" value="{{ $company->company_name }}" class="form-control" name="company_name" placeholder="Company Name" required/>
                                                    <p id="s4-slogan"><input type="text" value="{{ $company->company_slogan }}" class="form-control" name="slogan" placeholder="Slogan Timeline" required/></p>
                                                </div>
                                                <hr>
                                                <div class="form-group required">
                                                    <label class="col-md-3 control-label">Hiring Now: </label>
                                                    <div class="col-md-7">
                                                            <select class="form-control" name="hiring" >
                                                                <option value="1" {{ $company->company_hiring == 1 ? 'selected' : '' }}>Yes</option>
                                                                <option value="0" {{ $company->company_hiring == 0 ? 'selected' : '' }}>No</option>
                                                            </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">Staff Member: </label>
                                                    <div class="col-md-7">
                                                        <input type="number" class="form-control" value="{{ $company->company_no_emp }}" name="noEmp"/>
                                                        </div>
                                                </div>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">Company Type: </label>
                                                    <div class="col-md-7">
                                                        <select name="type" id="search_category" class="form-control" name="type">
                                                           	@foreach($companyType as $item)
                                                           		<option value="{{ $item->name }}" {{ $item->name == $company->company_type ? 'selected' : '' }}>{{ $item->name }}</option>
                                                           	@endforeach
                                                        </select>
                                                        </div>
                                                </div>
                                                <hr>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">Website: </label>
                                                    <div class="col-md-7">
                                                        <input type="text" value="{{ $company->company_website }}" class="form-control" name="website"/>
                                                    </div>
                                                </div>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">Company Email: </label>
                                                    <div class="col-md-7">
                                                        <input type="email" value="{{ $company->company_email }}" class="form-control" name="com-email"/>
                                                    </div>
                                                </div>
                                                
                                                  <div class="form-group required">
                                                    <label class="col-md-3 control-label">Company Facebook Contact: </label>
                                                    <div class="col-md-7">
                                                        <input type="text" value="{{ $company->company_facebook }}" class="form-control" name="com-facebook"/>
                                                    </div>
                                                </div>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">Company Linkedin Contact: </label>
                                                    <div class="col-md-7">
                                                        <input type="text" value="{{ $company->company_linkedin }}" class="form-control" name="com-linkedin"/>
                                                    </div>
                                                </div>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">Company Twitter Contact: </label>
                                                    <div class="col-md-7">
                                                        <input type="text" value="{{ $company->company_twitter }}" class="form-control" name="com-twitter"/>
                                                    </div>
                                                </div>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">Phone Number: </label>
                                                    <div class="col-md-7">
                                                        <input type="text" value="{{ $company->company_phone }}" class="form-control" name="phone"/>
                                                    </div>
                                                </div>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">City/Province: </label>
                                                    <div class="col-md-7">
                                                        <select name="loc_search" class="form-control" name="loc_search">
                                                            @foreach($city as $item)
                                                            	<option value="{{ $item->name }}" {{ $item->name == $company->company_address ? 'selected' : '' }}>{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">Zip: </label>
                                                    <div class="col-md-7">
                                                        <input type="text" value="{{ $company->company_zip }}" class="form-control" name="zip"/>
                                                    </div>
                                                </div>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">No.: </label>
                                                    <div class="col-md-7">
                                                        <input type="text" value="{{ $company->company_no }}" class="form-control" name="no"/>
                                                    </div>
                                                </div>
                                                   <div class="form-group required">
                                                    <label class="col-md-3 control-label">Street : </label>
                                                    <div class="col-md-7">
                                                        <input type="text" value="{{ $company->company_street }}" class="form-control" name="street"/>
                                                    </div>
                                                </div>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">Commune : </label>
                                                    <div class="col-md-7">
                                                        <input type="text" value="{{ $company->company_commune }}" class="form-control" name="commune"/>
                                                    </div>
                                                </div>
                                                <hr>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">About: </label>
                                                    <div class="col-md-7">
                                                        <textarea class="form-control" style="height:10em;" name="about"> {{ $company->company_about }} </textarea>
                                                    </div>
                                                </div>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">Mission: </label>
                                                    <div class="col-md-7">
                                                        <textarea class="form-control" style="height:10em;" name="mission">{{ $company->company_mission }}</textarea>
                                                    </div>
                                                </div>
                                                 <div class="form-group required">
                                                    <label class="col-md-3 control-label">Description: </label>
                                                    <div class="col-md-7">
                                                        <textarea class="form-control" style="height:10em;" name="description">{{ $company->company_description }}</textarea>
                                                    </div>
                                                </div>
                                                <hr>
                                                <button id="signup_btn" type="submit" class="navbar-btn nav-button bounceInRight login animated" style="width:100%!important"> Update {{ $company->company_name }} </button>
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @else

                         <center>
                             <div class="">
                                <div class="">
                                    <br><br>
                                    <i class="fa fa-paper-plane text-success fa-3x"></i>
                                  <h2>បង្កើតក្រុមហ៊ុនសម្រាប់ស្វែងរកបុគ្គលិកឆ្នើមរបស់អ្នក</h2>
                                  <p>
                                    ស្លាកសញ្ញារបស់ក្រុមហ៊ុន: ធ្វើអោយមានការទាក់ទាញចំណាប់អារម្មណ៏ពីអ្នកស្វែងរកការងារដោយដាក់បង្ហាញស្លាកសញ្ញាក្រុមហ៊ុនរបស់អ្នកនៅលើគេហទំព័រដើម។
                                  </p>
                                </div>
                                <br><br>
                                <form method="post" action="{{ url('/CompanyName') }}">
                                	@csrf
                                	<input type="text" name="companyName" class="form-control" placeholder="Company Name" required="true">
                                	<button type="submit" class="btn btn-info btn-lg">Create Your Company</button>
                                </form>
                                <br>
                                <br>
                             </div>
                        </center>

                        @endif
	                </div>
				</div>
			</div>
		</div>
	</div>
</section>


<script type="text/javascript">
	$(document).ready(function(){
		$('#loadFile').hide();
        $('#default-img').click(function(){
            $('#loadFile').click();
        });
        $('#loadFile').change(function(e){
            var output = document.getElementById('default-img');
            output.src = URL.createObjectURL(e.target.files[0]);
        });
		
	});
	function imgError(image) {
	    image.onerror = "";
	    image.src = "<?php echo url('public/images/default-250x200.jpg'); ?>";
	    return true;
	 }
</script>
<style type="text/css">
		#default-img{
			cursor: pointer!important;
		}
		.table-append{
			width: 100%; 
			border: 1px solid #ddd;
			border-radius: 20px;
		}
		td, th{
			padding-left: 10px
		}
		.btn-delete{
			cursor: pointer;
			margin: 5px;
		}
		#default-img:hover{
			opacity: 0.5;
    		filter: alpha(opacity=50);
		}
</style>

@endsection