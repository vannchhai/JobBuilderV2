<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="Jobs builder">
    
    <title>The Jobs Builder</title>    

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/assets/img/job-favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}" type="text/css">    
    <link rel="stylesheet" href="{{ asset('public/assets/css/jasny-bootstrap.min.css') }}" type="text/css">  
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap-select.min.css') }}" type="text/css">  
    <!-- Material CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/material-kit.css') }}" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/font-awesome.min.css') }}" type="text/css"> 
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/themify-icons.css') }}"> 

    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/extras/animate.css') }}" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('public/assets/extras/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/assets/extras/owl.theme.css') }}" type="text/css">
    <!-- Rev Slider CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/extras/settings.css') }}" type="text/css"> 
    <!-- Slicknav js -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/slicknav.css') }}" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/main.css') }}" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}" type="text/css">

    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/colors/red.css') }}" media="screen" />
    <script type="text/javascript" src="{{ asset('public/assets/js/jquery-min.js') }}"></script>      
    
  </head>

  <body>  
      <!-- Header Section Start -->
      <div class="header">    
        <!-- Start intro section -->
        <section id="intro" class="section-intro">
          <div class="logo-menu">
            <nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="50">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand logo" href="{{ url('/')}}"><img src="public/assets/img/logo.png" alt="" style="width: 200px;height:70px;margin-top: -12px;"></a>
                </div>

                <div class="collapse navbar-collapse" id="navbar">              
                <!-- Start Navigation List -->
                <ul class="nav navbar-nav">
                  <li>
                    <a class="active" href="/">
                    Home 
                    </a>
                  </li>
                  <li>
                    <a href="#">
                    Candidates <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown">
                      <li>
                        <a href="{{ url('/AdvanceSearch') }}">
                        Search Jobs
                        </a>
                      </li>
                      <!-- <li>
                        <a href="{{ url('/BrowseCategory') }}">
                        Browse Categories
                        </a>
                      </li> -->
                      @if (!Auth::guest())
                        @if (auth::user()->user_type_id == 3)
                          <li>
                            <a href="{{ url('/AddResume') }}">
                            Add Resume
                            </a>
                          </li>
                          <li>
                            <a href="{{ url('/GetFavorite') }}">
                            Favorite
                            </a>
                          </li>
                          <li>
                            <a href="{{ url('/JobAlert') }}">
                            Job Alerts
                            </a>
                          </li>
                          @endif
                      @endif
                    </ul>
                  </li>
                  <li>
                    <a href="#">
                    Employers <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown">
                      <li>
                        <a href="{{ url('/AdvanceSearch') }}">
                        Search Jobs
                        </a>
                      </li>
                       @if (!Auth::guest())
                        @if (auth::user()->user_type_id == 2)
                          <li>
                            <a href="{{ url('/AddJob') }}">
                            POST Job
                            </a>
                          </li>
                          <li>
                            <a href="{{ url('/CompanyProfile') }}">
                            Company Profile
                            </a>
                          </li>
                          <li>
                            <a href="{{ url('/ManageJobsPost') }}">
                            Manage Posted Job
                            </a>
                          </li>
                          <li>
                            <a href="{{ url('/BrowseResume') }}">
                            Browse Resumes
                            </a>
                          </li>
                        @endif
                      @endif
                    </ul>
                  </li>
                  <li>
                    <a href="{{ url('/About') }}">
                    Pages <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown">
                      <li>
                        <a href="{{ url('/About') }}">
                        About
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('/Privacy') }}">
                        Privacy Policy
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('/FAQ') }}">
                        FAQ
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('/Contact') }}">
                        Contact
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
                <ul class="nav navbar-nav navbar-right float-right">
                  <!-- <li class="left"><a href="{{ url('/PostJob') }}"><i class="ti-pencil-alt"></i> Post A Job</a></li>
                  <li class="right"><a href="{{ url('login') }}"><i class="ti-lock"></i>  Log In</a></li> -->
                  @guest
                      <li><a class="nav-link left" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                      <li><a class="nav-link right" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                  @else
                      <li class="nav-link left"><h4 style="margin-top: 10px">{{ Auth::user()->name }} </h4></li>
                      <li class="nav-link right">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </li>
                  @endguest
                </ul>
              </div>                           
            </div>
            <!-- Mobile Menu Start -->
            <ul class="wpb-mobile-menu">
              <li>
                <a class="active" href="{{ url('/') }}">Home</a>                   
              </li>
              <li>
                <a href="{{ url('/About') }}">Pages</a>
                <ul>
                  <li><a href="{{ url('/About') }}">About</a></li>
                  <li><a href="{{ url('/Privacy') }}">Privacy Policy</a></li>
                  <li><a href="{{ url('/FAQ') }}">FAQ</a></li>
                  <li><a href="{{ url('/Contact') }}">Contact</a></li>
                </ul>
              </li>
              <li>
                <a href="#">For Candidates</a>
                <ul>
                  <li>
                        <a href="{{ url('/AdvanceSerach') }}">
                        Browse Jobs
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('/BrowseCategory') }}">
                        Browse Categories
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('/AddResume') }}">
                        Add Resume
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('/GetFavorite') }}">
                        Favorite
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('/JobAlert') }}">
                        Job Alerts
                        </a>
                      </li>
                </ul>
              </li>
              <li>
                <a href="#">For Employers</a>
                <ul>
                 <li>
                        <a href="{{ url('/AddJob') }}">
                        Add Job
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('/ManageJob') }}">
                        Manage Jobs
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('/ManageResume') }}">
                        Manage Applications
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('/BrowseResume') }}">
                        Browse Resumes
                        </a>
                      </li>
                </ul>
              </li> 
              <li class="btn-m"><a href="{{ url('/PostJob') }}"><i class="ti-pencil-alt"></i> Post A Job</a></li>
              <li class="btn-m"><a href="{{ url('/login') }}"><i class="ti-lock"></i>  Log In</a></li>          
            </ul>
            <!-- Mobile Menu End --> 
          </nav>

          <!-- Off Canvas Navigation -->
          <div class="navmenu navmenu-default navmenu-fixed-left offcanvas"> 
          <!--- Off Canvas Side Menu -->
            <div class="close" data-toggle="offcanvas" data-target=".navmenu">
                <i class="ti-close"></i>
            </div>
              <h3 class="title-menu">All Pages</h3>
              <ul class="nav navmenu-nav">
                <li><a href="index.html">Home</a></li>
                <li><a href="index-02.html">Home Page 2</a></li>
                <li><a href="index-03.html">Home Page 3</a></li>
                <li><a href="index-04.html">Home Page 4</a></li>
                <li><a href="about.html">About us</a></li>            
                <li><a href="job-page.html">Job Page</a></li>             
                <li><a href="job-details.html">Job Details</a></li>    
                <li><a href="resume.html">Resume Page</a></li> 
                <li><a href="privacy-policy.html">Privacy Policy</a></li>
                <li><a href="pricing.html">Pricing Tables</a></li>
                <li><a href="browse-jobs.html">Browse Jobs</a></li>
                <li><a href="browse-categories.html">Browse Categories</a></li>
                <li><a href="add-resume.html">Add Resume</a></li>
                <li><a href="manage-resumes.html">Manage Resumes</a></li> 
                <li><a href="job-alerts.html">Job Alerts</a></li> 
                <li><a href="post-job.html">Add Job</a></li>  
                <li><a href="manage-jobs.html">Manage Jobs</a></li>
                <li><a href="manage-applications.html">Manage Applications</a></li>
                <li><a href="browse-resumes.html">Browse Resumes</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="faq.html">Faq</a></li>
                <li><a href="{{ url('login') }}">Login</a></li>
            </ul><!--- End Menu -->
          </div> <!--- End Off Canvas Side Menu -->
          <!-- <div class="tbtn wow pulse" id="menu" data-wow-iteration="infinite" data-wow-duration="500ms" data-toggle="offcanvas" data-target=".navmenu">
            <p><i class="ti-files"></i> All Pages</p>
          </div> -->
      </div>
      <!-- Header Section End -->    


      <!-- Content Yeild -->

      @yield('content')

      <!-- End Content -->
    <!-- Infobox Section End -->

    <!-- Footer Section Start -->
    <footer>
        <!-- Footer Area Start -->
        <section class="footer-Content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="widget">
                <h3 class="block-title"><img src="public/assets/img/logo.png" class="img-responsive" alt="Footer Logo"></h3>
                <div class="textwidget">
                  <p>Through our dedicated team of internationally-trained experts, we combine state-of-the-art technology, data analysis and a comprehensive network of partners to find the right person for your business.</p>
                </div>
              </div>
            </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget">
                            <h3 class="block-title">Quick Links</h3>
                            <ul class="menu">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Support</a></li>
                  <li><a href="#">License</a></li>
                  <li><a href="#">Terms & Conditions</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
                        </div>
                    </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="widget">
                  <h3 class="block-title">The Jobs Builder Infomation</h3>
                  <ul class="menu">
                  <li><a href="#">Website: www.thejobsbuilder.com</a></li>
                  <li><a href="#">CONTACT THE JOBS BUILDER</a></li>
                  <li><a href="#">Address: #E13, Street Betong, Chom Chao District, Posenchhey Commune, Phnom Penh City, Cambodia</a></li>
                  <li><a href="#">Email: info@thejobsbuilder.com</a></li>
                  <li><a href="#">Tel: (+855) 078 777 447, 069 999 744, 088 6444 464</a></li>
                </ul>
              </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="widget">
                            <h3 class="block-title">Follow Us</h3>
                <div class="bottom-social-icons social-icon">  
                  <a class="twitter" href="#"><i class="ti-twitter-alt"></i></a>
                  <a class="facebook" href="#"><i class="ti-facebook"></i></a>                   
                  <a class="youtube" href="#"><i class="ti-youtube"></i></a>
                  <a class="dribble" href="#"><i class="ti-dribbble"></i></a>
                  <a class="linkedin" href="#"><i class="ti-linkedin"></i></a>
                </div>  
                <p>Thejobsbuilder.com is a professional Job site and most used resource for job advertisement opportunities in Cambodia.</p>
                <form class="subscribe-box">
                  <input type="text" placeholder="Your email">
                  <input type="submit" class="btn-system" value="Send">
                </form> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer area End -->
        
        <!-- Copyright Start  -->
        <div id="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
              <div class="site-info text-center">
               Shared by <i class="fa fa-love"></i><a href="{{ url('/') }}">The Jobs Builder Team</a>
              </div>   
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

    </footer>
    <!-- Footer Section End -->  
    
    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="ti-arrow-up"></i>
    </a>

    <div id="loading">
      <div id="loading-center">
        <div id="loading-center-absolute">
          <div class="object" id="object_one"></div>
          <div class="object" id="object_two"></div>
          <div class="object" id="object_three"></div>
          <div class="object" id="object_four"></div>
          <div class="object" id="object_five"></div>
          <div class="object" id="object_six"></div>
          <div class="object" id="object_seven"></div>
          <div class="object" id="object_eight"></div>
        </div>
      </div>
    </div>
        
    <!-- Main JS  -->
    <script type="text/javascript" src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>    
    <script type="text/javascript" src="{{ asset('public/assets/js/material.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/material-kit.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/jquery.parallax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/jquery.slicknav.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/jquery.counterup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/jasny-bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/form-validator.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/contact-form-script.js') }}"></script>    
    <script type="text/javascript" src="{{ asset('public/assets/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/jquery.themepunch.tools.min.js') }}"></script>
    @section('javascript')
  </body>
</html>