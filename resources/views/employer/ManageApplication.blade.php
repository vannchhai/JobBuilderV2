@extends('layouts.master')

@section('content')

</div>



<div class="page-header" style="background: url(assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Manage Application</h2>
<ol class="breadcrumb">
<li><a href="#"><i class="ti-home"></i> Home</a></li>
<li class="current">Manage Application</li>
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

				</div>
			</div>
		</div>
	</div>
</section>

@endsection