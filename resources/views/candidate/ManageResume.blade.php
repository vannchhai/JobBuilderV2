@extends('layouts.master')

@section('content')
</div>



<div class="page-header" style="background: url(public/assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">
<h2 class="product-title">Favorite Job</h2>
<ol class="breadcrumb">
<li><a href="#"><i class="ti-home"></i> Home</a></li>
<li class="current">Favorite Job</li>
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
	<div class="job-alerts-item candidates">
	<h3 class="alerts-title">Favorite Job</h3>

	@foreach($listFavorite as $item)

            <div class="job-list">
              <div class="thumb">
                <?php 

                $adLogo = '';
                  if (!empty($item->logo)) {
                    if (is_file(public_path() . $item->logo)) {
                      $adLogo = url('public/'.$item->logo);
                    }
                    if ($adLogo=='') {
                      if (is_file(public_path() . '/'. $item->logo)) {
                        $adLogo = url('public/'.$item->logo);
                      }
                    }
                  }
                  if ($adLogo=='') {
                    $adLogo = url('public/images/default-250x200.jpg');
                  }
                 ?>
                <a href="{{ url('DetailJob').'?id='.$item->id }}"><img src="{{ $adLogo }}" class="img ima-responsive img-thumbnail" style="width: 120px" alt=""></a>
              </div>
              <div class="job-list-content">
                <h4><a href="{{ url('DetailJob').'?id='.$item->id }}">{{ $item->title }}</a><span class="full-time">{{ $item->jobType }}</span></h4>
                <p>{{ substr($item->description, 0, 70) }}...</p>
                <div class="job-tag">
                  <div class="pull-left">
                    <div class="meta-tag">
                      <span><a href="browse-categories.html"><i class="ti-brush"></i>{{ $item->category }}</a></span>
                      <span><i class="ti-location-pin"></i>{{ substr($item->address, 0 , 20) }}</span>
                      <?php 
                      $first  = new DateTime();
                      $second = new DateTime($item->created_at);

                      $diff = $first->diff( $second );
                      ?>
                      <span><i class="ti-time"></i>{{ $diff->format( '%D day %H:%I' ) }} ago</span>
                    </div>
                  </div>
                  <div class="pull-right">
                    <a href="{{ url('RemoveFavorite').'/'.$item->id }}" class="btn btn-common btn-rm">Remove</a>
                  </div>
                </div>
              </div>
            </div>

            @endforeach
            {{ $listFavorite->links() }}

	</div>



  
</div>
</div>
</div>
</div>



@endsection