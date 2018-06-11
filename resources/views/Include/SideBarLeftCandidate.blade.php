<div class="col-md-4 col-sm-4 col-xs-12">
	<div class="right-sideabr">
		<div class="inner-box">
		<h4 class="text-info">Manage Account</h4>
		@if(!Auth::guest())

		<ul class="lest item">
            @if (auth::user()->user_type_id == 3)
			<!-- Candidate -->
			<li><a href="{{ url('/AddResume') }}">Manage Resume</a></li>
			<!-- End Candidate -->
			@endif

			<!-- section Candidate and Employer -->
			<li><a href="{{ url('/GetFavorite') }}">Favorite Jobs</a></li>
			<li><a href="{{ url('/JobAlert') }}">Notifications <span class="notinumber">0</span></a></li>
			<!-- end section Candidate and Employer -->

		</ul>
		<h4 class="text-info">Manage Job</h4>
		<ul class="lest item">
			<!-- section Candidate and Employer -->
			<li><a href="{{ url('/PenddingJob') }}">Pedding Jobs</a></li>
			<!-- End section Candidate and Employer -->

            @if (auth::user()->user_type_id == 2)
			<!-- Employer -->
			<li><a href="{{ url('/AddJob') }}">POST Jobs</a></li>
			<li><a href="{{ url('/ManageJobsPost') }}">Manage Jobs</a></li>
			<!-- End Employer -->
			@endif
		</ul>
		<ul class="lest">
            @if (auth::user()->user_type_id == 2)
			<!-- Employer -->
			<li><a href="{{ url('/CompanyProfile') }}">Company Profile</a></li>
			<!-- End Employer -->
			@endif

			<!-- section Candidate and Employer -->
			<li><a href="#">Account Setting</a></li>
			<!-- end section Candidate and Employer -->
		</ul>
		@endif
		</div>
	</div>
</div>