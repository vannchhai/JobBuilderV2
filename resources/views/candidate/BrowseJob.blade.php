@extends('layouts.master')

@section('content')

      @include('Include.SearchSection')

</div>

 <!-- Page Header Start -->
      
      <!-- Page Header End -->      

      <!-- Job Browse Section Start -->  
      <section class="job-browse section">
        <div class="container">
          <h2>{{ $countJobsSearch }} Found Jobs Avaliable</h2>
          <div class="row">
            <div class="col-md-9 col-sm-8">
              @foreach($listJobs as $item)
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
                  if (is_file(public_path().'/uploads/pictures/logo/logo_'. $item->user_id .'.jpg')) {
                      $adLogo = url('pubilc/uploads/pictures/logo/logo_'. $item->user_id .'.jpg');
                  }
                  if ($adLogo=='') {
                    $adLogo = url('public/images/default-250x200.jpg');
                  }
                 ?>
                  <a href="{{ url('DetailJob').'?id='.$item->id }}"><img src="{{ $adLogo }}" class="img ima-responsive img-thumbnail" style="width: 120px" alt=""></a>
                </div>
                <div class="job-list-content">
                  <h4><a href="{{ url('DetailJob').'?id='.$item->id }}">{{ $item->title }}</a><span class="full-time">{{ $item->jobType }}</span></h4>
                  <p>{{ substr($item->description,0,150)  }}..</p>
                  <div class="job-tag">
                    <div class="pull-left">
                      <div class="meta-tag">
                        <?php 
                        $first  = new DateTime();
                        $second = new DateTime($item->created_at);

                        $diff = $first->diff( $second );
                        ?>
                        <span><a href="{{ url('AdvanceSearch').'?keyword=&cities=all&categories='.$item->category_id }}"><i class="ti-brush"></i>{{ $item->category }}</a></span>
                        <span><i class="ti-location-pin"></i>{{  substr($item->address, 0 , 20) }}</span>
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
                      
                      <a href="{{ url('DetailJob').'?id='.$item->id }}"><div class="btn btn-common btn-rm">More Detail</div></a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
              <!-- Start Pagination -->
              {{ $listJobs->links() }}
              <!-- <ul class="pagination">              
                <li class="active"><a href="#" class="btn btn-common" ><i class="ti-angle-left"></i> prev</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li class="active"><a href="#" class="btn btn-common">Next <i class="ti-angle-right"></i></a></li>
              </ul> -->
              <!-- End Pagination -->
            </div>
            <div class="col-md-3 col-sm-4">
              <aside>
                <div class="sidebar">
                  <div class="inner-box">
                    <h3>Categories</h3>
                    <ul class="cat-list">
                      @foreach($lstCategory as $item)
                      <li>
                        <a href="{{ url('AdvanceSearch').'?keyword=&cities=all&categories='.$item->id }}">{{ $item->name }} <span class="label label-info">{{ $item->countJob }} Jobs</span></a>                 
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="inner-box">
                    <h3>Job Status</h3>
                    <ul class="cat-list">
                      <li>
                        <a href="#">Full Time <span class="num-posts">12,256 Jobs</span></a>                    
                      </li>
                      <li>
                        <a href="#">Part Time <span class="num-posts">6,510 Jobs</span></a>                    
                      </li>
                      <li>
                        <a href="#">Freelancer <span class="num-posts">1,171 Jobs</span></a>                    
                      </li>
                      <li>
                        <a href="#">Internship <span class="num-posts">876 Jobs</span></a>                    
                      </li>
                    </ul>
                  </div>
                  <div class="inner-box">
                    <h3>Locations</h3>
                    <ul class="cat-list">
                      @foreach($selectCities as $item)
                      <li>
                        <a href="{{ url('AdvanceSearch').'?keyword=&cities='.$item->id.'&categories=all' }}">{{ $item->name }} <!-- <span class="num-posts">4,197 Jobs</span> --></a>                    
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </section>
      <!-- Job Browse Section End --> 


@endsection