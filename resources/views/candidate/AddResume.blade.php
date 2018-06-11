@extends('layouts.master')

@section('content')
</div>



<div class="page-header" style="background: url(public/assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Create Resume</h2>
<ol class="breadcrumb">
<li><a href="#"><i class="ti-home"></i> Home</a></li>
<li class="current">Resumes</li>
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

				
				<form class="form-ad" method="post" accept="{{ url('/') }}" enctype="multipart/form-data">
    				 @csrf

					<div class="col-md-12">
					 <?php
			              	$profile = '';
			                // Logo setting
			                if (isset($personal)) {
			                  $profile = url('public/uploads/pictures/profile/profile_' . $personal->u_id .'.jpg');
			                }
			                
			                // Default picture
			                // if (!file_exists($profile)) {
			                //     $profile = url('/images/default-250x200.jpg');
			                // }
		                ?>
					<img src="{{ $profile }}" id="default-img" class="img img-responsive img-thumnail pull-right" style="width: 150px" onerror="imgError(this);"/>	
                  	<input type="file" id="loadFile" name='profileImage'/>

					</div>
					<div class="divider"><h3>Personal information</h3></div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label" for="textarea">Name</label>
							<input type="text" class="form-control" name="username" placeholder="Name" value="{{ isset($personal->u_name) ? $personal->u_name : $user->name }}" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
						<div class="form-group">
							<label class="control-label" for="textarea"></label>
							<label class="control-label" for="textarea">Email</label>
							<input type="email" class="form-control" name="useremail" placeholder="Your@domain.com" value="{{ isset($personal->u_email) ? $personal->u_email : $user->email }}" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
						<div class="form-group">
							<label class="control-label" for="textarea">Date Of Birth</label>
							<input type="date" class="form-control" name="userdate" placeholder="Date Of Birth" value="{{ isset($personal->u_date) ? $personal->u_date : '' }}" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
						
					</div>

					<div class="col-md-6">
						
						<div class="form-group">
							<label class="control-label" for="textarea">Nationality</label>
							 <input type="text" class="form-control" placeholder="nationality" value="{{ isset($personal->u_nationality) ? $personal->u_nationality : '' }}" name="nationality" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
						<div class="form-group">
							<label class="control-label" for="textarea">Gender</label>
							<select class="form-control" name="gender" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
								<option {{ isset($personal->u_sex) ? ($personal->u_sex == '' ? 'selected' : '') : ''}}>Other</option>
								<option {{ isset($personal->u_sex) ? ($personal->u_sex == 'Male' ? 'selected' : '') : ''}}>Male</option>
								<option {{ isset($personal->u_sex) ? ($personal->u_sex == 'Female' ? 'selected' : '') : ''}}>Female</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label" for="textarea">Phone</label>
							<input type="number" class="form-control" placeholder="Phone Number" value="{{ isset($personal->u_phone) ? $personal->u_phone : '' }}" name="phone" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>

					</div>
					
				<div class="divider"><h3>Target Job</h3>
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label" for="textarea">Desired Salary</label>
						<input type="text" class="form-control" placeholder="Desired Salary" value="{{ isset($target->t_desired_salary) ? $target->t_desired_salary : '' }}" name="desiredsalary" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
						<div class="form-group">
						<label class="control-label" for="textarea">Location</label>
						<input type="text" class="form-control" placeholder="Location" name="location" value="{{ isset($target->t_location) ? $target->t_location : '' }}" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label" for="textarea">Contract Type</label>
						<select class="form-control" name="contracttype" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
							@foreach($jobType as $item)
							<option {{ isset( $target->t_contract_type) ? ($target->t_contract_type == $item->name ? 'selected' : '') : ''}}>{{ $item->name }}</option>
							@endforeach
						</select>
						</div>
						<div class="form-group">
						<label class="control-label" for="textarea">Area Interest</label>
						<input type="text" class="form-control" placeholder="Area Interest" value="{{ isset($target->t_area_interest) ? $target->t_area_interest : '' }}" name="areainterest" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
					</div>
				</div>


				<div class="divider"><h3>Current Contact</h3>
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label" for="textarea">No.</label>
						<input type="text" class="form-control" placeholder="No." value="{{ isset($address->a_no ) ?  $address->a_no: '' }}" name="no" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
						<div class="form-group">
						<label class="control-label" for="textarea">Zip/Code</label>
						<input type="text" class="form-control" placeholder="Optional" value="{{ isset($address->a_zip ) ?  $address->a_zip: '' }}" name="zip" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label" for="textarea">Street</label>
							<input type="text" class="form-control" placeholder="Optional" value="{{ isset($address->a_street ) ?  $address->a_street: '' }}" name="streetData" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
						<div class="form-group">
						<label class="control-label" for="textarea">Commune</label>
						<input type="text" class="form-control" placeholder="Optional" value="{{ isset($address->a_commune ) ?  $address->a_commune: '' }}" name="commune" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label" for="textarea">Linked Facebook</label>
							<input type="text" class="form-control" placeholder="Optional" value="{{ isset($address->a_facebook ) ?  $address->a_facebook: '' }}" name="fb" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
						<div class="form-group">
							<label class="control-label" for="textarea">Linkedin</label>
							<input type="text" class="form-control" placeholder="Optional" value="{{ isset($address->a_linkedin ) ?  $address->a_linkedin: '' }}" name="linkedin" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
					</div>
				</div>

				<div class="divider"><h3>Accomplishments</h3>
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label" for="textarea">Title.</label>
						<input type="text" class="form-control" placeholder="required" value="{{ isset($accomplish->a_title ) ?  $accomplish->a_title: '' }}" name="acctitle" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label" for="textarea">Date</label>
						<input type="date" class="form-control" placeholder="required" value="{{ isset($accomplish->a_date ) ?  $accomplish->a_date: '' }}" name="accdate" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label" for="textarea">Description</label>
							<textarea rows="6" class="form-control" placeholder="Optional" name="accdescription" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>{{ isset($accomplish->a_description ) ?  $accomplish->a_description: '' }}</textarea>
						</div>
					</div>
				</div>

				<div class="divider"><h3>Reference</h3>
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label" for="textarea">Name.</label>
						<input type="text" class="form-control" name="rename" placeholder="required" value="{{ isset($reference->r_name ) ?  $reference->r_name: '' }}" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label class="control-label" for="textarea">Position</label>
						<input type="text" class="form-control" name="reposition" placeholder="required" value="{{ isset($reference->r_position ) ?  $reference->r_position: '' }}" required="true" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label" for="textarea">Description</label>
							<textarea rows="6" class="form-control" name="redescription" placeholder="Optional" {{ auth::user()->user_type_id == 2 ? 'disabled': '' }}>{{ isset($reference->r_email ) ?  $reference->r_email: '' }}</textarea>
						</div>
					</div>
				</div>



				<div class="divider"><h3>Work Experience</h3></div>
				<div class="add-post-btn">
					<input type="hidden" name="experience" id="hiddenValueWork" value="{{ isset($work) ? $work : ''}}" >
					<div class="">
						<span id="appendWorkExperience"></span>
					</div>
					<hr>
					<div class="pull-left">
						@if (auth::user()->user_type_id == 3)
						<p id="experience" class="btn-added"><i class="ti-plus"></i> Add New Experience</p>
						@endif
					</div>
				</div>


				<div class="divider"><h3>Education</h3></div>
				<div class="add-post-btn">
					<input type="hidden" name="education" id="hiddenValueEducation" value="{{ isset($education) ? $education : ''}}">
					<div>
						<span id="appendEducation"></span>
					</div>
					<hr>

					<div class="pull-left">
						@if (auth::user()->user_type_id == 3)
						<p class="btn-added" id="education"><i class="ti-plus"></i> Add New Education</p>
						@endif
					</div>
				</div>

				<div class="divider"><h3>Personal Skill</h3></div>
				<div class="add-post-btn">
					<input type="hidden" name="skill" id="hiddenValueSkill" value="{{ isset($skills) ? $skills : ''}}">
					<div>
						<span id="appendSkill"></span>
					</div>
					<hr>
					<div class="pull-left">
						@if (auth::user()->user_type_id == 3)
						<p id="skill" class="btn-added"><i class="ti-plus"></i> Add New Skill</p>
						@endif
					</div>
				</div>

				<div class="divider"><h3>Languages</h3></div>
				<div class="add-post-btn">
					<input type="hidden" name="languages" id="hiddenValueLanguage" value="{{ isset($languages) ? $languages : ''}}">
					<div>
						<span id="appendLanguage"></span>
					</div>
					<hr>
					<div class="pull-left">
						@if (auth::user()->user_type_id == 3)
						<p id="languages" class="btn-added"><i class="ti-plus"></i> Add New Languages</p>
						@endif
					</div>
				</div>
				@if (auth::user()->user_type_id == 3)
				<button class="btn btn-common" type="submit">Save</button>
				@endif
				</form>


			</div>
		</div>
	</div>

	<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title" id="titleModel"></h4>
		      </div>
		      <div class="modal-body">
		        	<div class="row" id="showFormHTML">
		        		


		        	</div>
		      </div>
		      <hr>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-info" data-dismiss="modal" id="savePOST">Save</button>
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
</section>


	<script type="text/javascript">
		
		$(document).ready(function(){
			var title = '';
			var listWork = [];
			var listEducation = [];
			var listPersonal = [];
			var listLanguage = [];
			
			$('#experience').click(function(e){
				title = 'Add Experience';

				var html = '';

				html += makeHTML('Title', 'text');
				html += makeHTML('Company_Name', 'text');
				html += makeHTML('Start_Date', 'date');
				html += makeHTML('End_Date', 'date');
				html += makeHTML('Company_Type', 'text');
				html += makeHTML('Position', 'text');
				html += makeHTML('Career_Level', 'text');
				html += makeHTML('Contract_Type', 'text');

				$('#showFormHTML').html(html);
				$('#titleModel').text(title);
				$('#myModal').modal('show');
			});


			$('#education').click(function(){
				title = 'Add Education';

				var html = '';

				html += makeHTML('School_Univercity', 'text');
				html += makeHTML('Degree_Level', 'text');
				html += makeHTML('Start_Date', 'date');
				html += makeHTML('End_Date', 'date');
				html += makeHTML('Field_Study', 'text');
				html += makeHTML('Grade', 'text');

				$('#showFormHTML').html(html);
				$('#titleModel').text(title);
				$('#myModal').modal('show');
			});

			$('#skill').click(function(){
				title = 'Add Skill';

				var html = '';

				html += makeHTML('Skill', 'text');
				html += makeHTML('Level', 'text');
				html += makeHTML('Year_Experience', 'number');
				html += makeHTML('Noted', 'text');

				$('#showFormHTML').html(html);
				$('#titleModel').text(title);
				$('#myModal').modal('show');
			});

			$('#languages').click(function(){
				title = 'Add Languages';

				var html = '';

				html += makeHTML('Languages', 'text');
				html += makeHTML('Level', 'text');
				html += makeHTML('Noted', 'text');

				$('#showFormHTML').html(html);
				$('#titleModel').text(title);
				$('#myModal').modal('show');
			});

			// render html experent
			var modelEx = $('#hiddenValueWork').val();
			var modelEdu = $('#hiddenValueEducation').val();
			var modelSkill = $('#hiddenValueSkill').val();
			var modelLan = $('#hiddenValueLanguage').val();

			if (modelEx != '') {
				var exLn = JSON.parse(modelEx);
				for (var i = 0; i < exLn.length; i++) {
					listWork.push(exLn[i]);
					var htmlEx = appendHTMLWorkExperence(exLn[i]);
					$('#appendWorkExperience').append(htmlEx);
				}
				
			}

			if (modelEdu != '') {
				var exLn = JSON.parse(modelEdu);
				for (var i = 0; i < exLn.length; i++) {
					listEducation.push(exLn[i]);
					var htmlEx = appendHTMLEducation(exLn[i]);
					$('#appendEducation').append(htmlEx);
				}
				
			}

			if (modelSkill != '') {
				var exLn = JSON.parse(modelSkill);
				for (var i = 0; i < exLn.length; i++) {
					listPersonal.push(exLn[i]);
					var htmlEx = appendHTMLSkill(exLn[i]);
					$('#appendSkill').append(htmlEx);
				}
				
			}

			if (modelLan != '') {
				var exLn = JSON.parse(modelLan);
				for (var i = 0; i < exLn.length; i++) {
					listLanguage.push(exLn[i]);
					var htmlEx = appendHTMLLanguage(exLn[i]);
					$('#appendLanguage').append(htmlEx);
				}
				
			}

			$('#savePOST').click(function(){
				var model ;
				switch	(title){
					case 'Add Experience':
						model = {
							ex_id : 1,
							ex_title : $('#val_Title').val(),
							ex_company_name : $('#val_Company_Name').val(),
							ex_start_date : $('#val_Start_Date').val(),
							ex_end_date : $('#val_End_Date').val(),
							ex_company_type : $('#val_Company_Type').val(),
							ex_job_role : $('#val_Position').val(),
							ex_career_level : $('#val_Career_Level').val(),
							ex_contract_type : $('#val_Contract_Type').val()
						};
						listWork.push(model);
						var html = appendHTMLWorkExperence(model);
						$('#appendWorkExperience').append(html);
					break;

					case 'Add Education':
						model = {
							e_id: 1,
							e_school : $('#val_School_Univercity').val(),
							e_level : $('#val_Degree_Level').val(),
							e_sdate : $('#val_Start_Date').val(),
							e_edate : $('#val_End_Date').val(),
							e_field_study : $('#val_Field_Study').val(),
							e_grade : $('#val_Grade').val()
						};

						listEducation.push(model);
						var html = appendHTMLEducation(model);
						$('#appendEducation').append(html);

					break;

					case 'Add Skill':
						model = {
							p_id: 1,
							p_title : $('#val_Skill').val(),
							p_level : $('#val_Level').val(),
							p_duration : $('#val_Year_Experience').val(),
							p_description : $('#val_Noted').val()
						};
						listPersonal.push(model);
						var html = appendHTMLSkill(model);
						$('#appendSkill').append(html);
					break;

					case 'Add Languages':
						model = {
							l_id: 1,
							l_title : $('#val_Languages').val(),
							l_level : $('#val_Level').val(),
							l_description : $('#val_Noted').val()
						};
						listLanguage.push(model);
						var html = appendHTMLLanguage(model);
						$('#appendLanguage').append(html);
					break;
				}

				$('#hiddenValueWork').val(JSON.stringify(listWork));
				$('#hiddenValueEducation').val(JSON.stringify(listEducation));
				$('#hiddenValueLanguage').val(JSON.stringify(listLanguage));
				$('#hiddenValueSkill').val(JSON.stringify(listPersonal));
			});

			function makeHTML(title, type){
				var html = '<div class="col-md-6"><div class="form-group"><label class="control-label" for="textarea">'+title+'</label><input type="'+type+'" id="val_'+title+'" class="form-control" placeholder="'+title+'"></div></div>';
				return html;
			}

			function appendHTMLWorkExperence(model){
				var html = '<table class="table-append"><tr><th>'+ (listWork.length + 1) +'. Title:</th><td>'+model.ex_title+'</td><th>Company: </th><td>'+model.ex_company_name+'</td><th>Company Type</th><td>'+model.ex_company_type+'</td><th>Contract Type</th><td>'+model.ex_contract_type+' <span class="pull-right btn-delete"><i class="ti-trash"></i></span></td></tr><tr><th>Start Date:</th><td>'+model.ex_start_date+'</td><th>End Date:</th><td>'+model.ex_end_date+'</td><th>Position:</th><td>'+model.ex_job_role+'</td><th>Career level:</th><td>'+model.ex_career_level+'</td></tr></table>';
				return html;
			}

			function appendHTMLEducation(model){
				var html = '<table class="table-append"><tr><th>School/University: </th><td>'+model.e_school+'</td><th>Level: </th><td>'+model.e_level+'</td><th>FieldStudy: </th><td>'+model.e_field_study+' <span class="pull-right btn-delete"><i class="ti-trash"></i></span></td></tr><tr><th>Start Date: </th><td>'+model.e_sdate+'</td><th>End Date: </th><td>'+model.e_edate+'</td><th>Grade: </th><td>'+model.e_grade+'</td></tr></table>';
					return html;
			}

			function appendHTMLSkill(model){
				var html = '<table class="table-append"><tr><th>Skill: </th><td>'+model.p_title+'</td><th>Level: </th><td>'+model.p_level+'</td><th>Year Experience: </th><td>'+model.p_duration+' <span class="pull-right btn-delete"><i class="ti-trash"></i></span></td></tr><tr><th>Description: </th><td>'+model.p_description+'</td></tr></table>';
					return html;
			}

			function appendHTMLLanguage(model){
				var html = '<table class="table-append"><tr><th>Languages: </th><td>'+model.l_title+'</td><th>Level: </th><td>'+model.l_level+' <span class="pull-right btn-delete"><i class="ti-trash"></i></span></td><tr><th>Description: </th><td>'+model.l_description+'</td></tr></table>';

				return html;
			}

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
		    image.src = "<?php echo url('/images/default-250x200.jpg'); ?>";
		    return true;
		 }
	</script>

	<style type="text/css">
		.btn-added,#default-img{
			cursor: pointer;
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


