@extends('layouts.master')

@section('content')


    @include('Include.SearchSection')
    <!-- end intro section -->
    
    <!-- Find Job Section Start -->
    <section class="find-job section">
      <div class="container">
        <h2 class="section-title">Top Jobs</h2>
        <div class="row">
          <div class="col-md-12">
            @foreach($jobsList as $item)

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
                  if (is_file(public_path().'uploads/pictures/logo/logo_'. $item->user_id .'.jpg')) {
                      $adLogo = url('public/uploads/pictures/logo/logo_'. $item->user_id .'.jpg');
                  }
                  if ($adLogo=='') {
                    $adLogo = url('public/images/default-250x200.jpg');
                  }
                 ?>
                <a href="{{ url('DetailJob').'?id='.$item->id }}"><img src="{{ $adLogo }}" class="img ima-responsive img-thumbnail" style="width: 120px" alt=""></a>
              </div>
              <div class="job-list-content">
                <h4><a href="{{ url('DetailJob').'?id='.$item->id }}">{{ $item->title }}</a><span class="full-time">{{ $item->jobType }}</span></h4>
                <p>{{ substr($item->description, 0, 150) }}...</p>
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
                    @if (!Auth::guest())
                    <a href="{{ url('/AddFavorite').'/'.$item->id }}">
                      <div class="icon">
                        <i class="ti-heart"></i>
                      </div>
                    </a>
                    @endif
                    <a href="{{ url('DetailJob').'?id='.$item->id }}" class="btn btn-common btn-rm">More Detail</a>
                  </div>
                </div>
              </div>
            </div>

            @endforeach
            {{ $jobsList->links() }}
          </div>
          <!-- <div class="col-md-12">
            <div class="showing pull-left">
              <a href="#">Showing <span>6-10</span> Of 24 Jobs</a>
            </div>                    
            <ul class="pagination pull-right">              
              <li class="active"><a href="#" class="btn btn-common" ><i class="ti-angle-left"></i> prev</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li class="active"><a href="#" class="btn btn-common">Next <i class="ti-angle-right"></i></a></li>
            </ul>
          </div>
        </div> -->
      </div>
    </section>
    <!-- Find Job Section End -->

    <!-- Category Section Start -->
   
    @include('Include.CategorySection')

    <!-- Category Section End -->  

    <!-- Featured Jobs Section Start -->
    <section class="featured-jobs section">
      <div class="container">
        <h2 class="section-title">
          Featured Jobs
        </h2>
        <div class="row">
          @foreach($lstFeature as $item)
          <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="featured-item">
              <div class="featured-wrap" style="height: 300px;">
                <div class="featured-inner">
                  <figure class="item-thumb">
                    <a class="hover-effect" href="{{ url('DetailJob').'?id='.$item->id }}">
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
                        if (is_file(public_path().'uploads/pictures/logo/logo_'. $item->user_id .'.jpg')) {
                            $adLogo = url('public/uploads/pictures/logo/logo_'. $item->user_id .'.jpg');
                        }
                        if ($adLogo=='') {
                          $adLogo = url('public/images/default-250x200.jpg');
                        }
                         ?>
                      <img src="{{ $adLogo }}" alt="" class="img img-responsive img-thumbnail col-md-12" style="height: 180px">
                    </a>
                  </figure>
                  <div class="item-body">
                    <h3 class="job-title"><a href="job-page.html">{{ substr($item->title, 0 ,20) }}</a></h3>
                    <div class="adderess"><i class="ti-location-pin"></i> {{ substr($item->description, 0, 40) }}..</div>
                  </div>
                </div>
              </div>
              <div class="item-foot">
                <?php 
                $first  = new DateTime();
                $second = new DateTime($item->created_at);

                $diff = $first->diff( $second );
                ?>
                <span><i class="ti-calendar"></i> {{ $diff->format( '%D day %H:%I' ) }} ago</span>
                <!-- <span><i class="ti-time"></i> Full Time</span> -->
                <div class="view-iocn">
                  <a href="{{ url('DetailJob').'?id='.$item->id }}"><i class="ti-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- Featured Jobs Section End -->

    <!-- Start Purchase Section -->
    <section class="section purchase" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row">
          <div class="section-content text-center">
            <h1 class="title-text">
             Looking for a Job
            </h1>
            <p>Join thousand of employers and earn what you deserve!</p>
            <a href="{{ url('/register') }}" class="btn btn-common">Get Started Now</a>
          </div>
        </div>
      </div>
    </section>
    <!-- End Purchase Section -->
     
    <!-- Blog Section -->
    <section id="blog" class="section">
      <!-- Container Starts -->
      <div class="container">
        <h2 class="section-title">
          Latest Jobs
        </h2>
        <div class="row">
          @foreach($lstLatestJob as $item)
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 blog-item">
            <!-- Blog Item Starts -->
            <div class="blog-item-wrapper">
              <div class="blog-item-img">
                <a href="{{ url('DetailJob').'?id='.$item->id }}">
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
                        if (is_file(public_path().'uploads/pictures/logo/logo_'. $item->user_id .'.jpg')) {
                            $adLogo = url('public/uploads/pictures/logo/logo_'. $item->user_id .'.jpg');
                        }
                        if ($adLogo=='') {
                          $adLogo = url('public/images/default-250x200.jpg');
                        }
                         ?>
                      <img src="{{ $adLogo }}" alt="" class="img img-responsive img-thumbnail col-md-12" style="height: 180px">
                </a>                
              </div>
              <div class="blog-item-text" >
                <div class="meta-tags">
                   <?php 
                    $first  = new DateTime();
                    $second = new DateTime($item->created_at);

                    $diff = $first->diff( $second );
                    ?>
                  <span class="date"><i class="ti-calendar"></i> {{ $diff->format( '%D day %H:%I' ) }} ago</span>
                  <span class="comments"><a href="#"><i class="ti-comment-alt"></i> 5 Comments</a></span>
                </div>
                <a href="{{ url('DetailJob').'?id='.$item->id }}">
                  <h3>
                    {{ $item->title }}
                  </h3>
                </a>
                <p>
                {{ substr($item->description, 0 , 40) }}
                </p>
                <a href="{{ url('DetailJob').'?id='.$item->id }}" class="btn btn-common btn-rm">Read More</a>
              </div>
            </div>
            <!-- Blog Item Wrapper Ends-->
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- blog Section End -->

    <!-- Testimonial Section Start -->
    <section id="testimonial" class="section">
      <div class="container">
        <div class="row">
          <div class="touch-slider" class="owl-carousel owl-theme">
            <div class="item active text-center">  
              <img class="img-member" src="public/assets/img/testimonial/img1.jpg" alt=""> 
              <div class="client-info">
               <h2 class="client-name">Jessica <span>(Senior Accountant)</span></h2>
              </div>
              <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project... were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout the project and assured that the owner expectations were met and <br> often exceeded. </p>
            </div>
            <div class="item text-center">
              <img class="img-member" src="public/assets/img/testimonial/img2.jpg" alt=""> 
              <div class="client-info">
               <h2 class="client-name">John Doe <span>(Project Menager)</span></h2>
              </div>
              <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project... were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout the project and assured that the owner expectations were met and <br> often exceeded. </p>
            </div>
            <div class="item text-center">
              <img class="img-member" src="public/assets/img/testimonial/img3.jpg" alt=""> 
              <div class="client-info">
                <h2 class="client-name">Helen <span>(Engineer)</span></h2>
              </div>
              <p><i class="fa fa-quote-left quote-left"></i> The team that was assigned to our project... were extremely professional <i class="fa fa-quote-right quote-right"></i><br> throughout the project and assured that the owner expectations were met and <br> often exceeded. </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Clients Section -->
    <section class="clients section">
      <div class="container">
        <h2 class="section-title">
          Clients & Partners
        </h2>
        <div class="row"> 
          <div id="clients-scroller">
            <div class="items">
              <img src="public/assets/img/clients/img1.png" alt="">
            </div>
            <div class="items">
              <img src="public/assets/img/clients/img2.png" alt="">
            </div>
            <div class="items">
              <img src="public/assets/img/clients/img3.png" alt="">
            </div>
            <div class="items">
              <img src="public/assets/img/clients/img4.png" alt="">
            </div>
            <div class="items">
              <img src="public/assets/img/clients/img5.png" alt="">
            </div>
            <div class="items">
              <img src="public/assets/img/clients/img6.png" alt="">
            </div>
            <div class="items">
              <img src="public/assets/img/clients/img6.png" alt="">
            </div>
            <div class="items">
              <img src="public/assets/img/clients/img6.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Client Section End -->

     <!-- Counter Section Start -->
    <section id="counter">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="counting">
              <div class="icon">
                <i class="ti-briefcase"></i>
              </div>
              <div class="desc">                
                <h2>Jobs</h2>
                <h1 class="counter">{{ $countJob }}</h1>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="counting">
              <div class="icon">
                <i class="ti-user"></i>
              </div>
              <div class="desc">
                <h2>Members</h2>
                <h1 class="counter">{{ $countUser }}</h1>                
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="counting">
              <div class="icon">
                <i class="ti-write"></i>
              </div>
              <div class="desc">
                <h2>Resume</h2>
                <h1 class="counter">700</h1>                
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="counting">
              <div class="icon">
                <i class="ti-heart"></i>
              </div>
              <div class="desc">
                <h2>Company</h2>
                <h1 class="counter">9050</h1>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Counter Section End -->

    <!-- Infobox Section Start -->
  <!--   <section class="infobox section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="info-text">
              <h2>Don't Want To Miss a Thing?</h2>
              <p>Just go to <a href="#">Google Play</a> to download JobBoard Mini</p>
            </div> 
            <a href="#" class="btn btn-border">Google Play</a>           
          </div>
        </div>
      </div>
    </section> -->
    <!-- Infobox Section End -->


@endsection
