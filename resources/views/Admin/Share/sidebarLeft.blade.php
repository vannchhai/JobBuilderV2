<!-- SIDEBAR - START -->
            <div class="page-sidebar ">

                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 

                    <!-- USER INFO - START -->
                    <div class="profile-info row">

                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                            <a href="ui-profile.html">
                                <img src="public/assets/Admin/data/profile/profile.png" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                                <a href="ui-profile.html">{{ Auth::user()->name }}</a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h3>

                            <p class="profile-title">Web Developer</p>

                        </div>

                    </div>
                    <!-- USER INFO - END -->



                    <ul class='wraplist'>	


                        <li class="open"> 
                            <a href="{{ url('/dashobard') }}">
                                <i class="fa fa-dashboard"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-suitcase"></i>
                                <span class="title">User Configuration</span>
                                <span class="arrow "></span><span class="label label-orange">NEW</span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="{{ url('/userTypeMng') }}" >User Type</a>
                                </li>
                                <li>
                                    <a class="" href="{{ url('/userMng') }}">User Register</a>
                                </li>
                            </ul>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-suitcase"></i>
                                <span class="title">Jobs Post</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="{{ url('/jobType') }}" >Jobs Type</a>
                                </li>
                                <li>
                                    <a class="" href="{{ url('/jobCategory') }}" >Jobs Category</a>
                                </li>
                                <li>
                                    <a class="" href="{{ url('/job') }}" >Jobs</a>
                                </li>
                            </ul>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Location</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="{{ url('/zone') }}" >Zone</a>
                                </li>
                                <li>
                                    <a class="" href="{{ url('/country') }}" >Country</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-bar-chart"></i>
                                <span class="title">Company Profile</span>
                                <span class="arrow "></span><span class="label label-orange">HOT</span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="{{ url('/company') }}" >Company Register</a>
                                </li>
                                <li>
                                    <a class="" href="{{ url('/company') }}" >Resume</a>
                                </li>
                            </ul>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-gift"></i>
                                <span class="title">Pages</span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu" >
                                <li>
                                    <a class="" href="{{ url('/privacy') }}" >Privacy</a>
                                </li>
                                <li>
                                    <a class="" href="{{ url('/termOfuse') }}" >Term of Use</a>
                                </li>
                                <li>
                                    <a class="" href="{{ url('/faq') }}" >FAQ</a>
                                </li>
                                <li>
                                    <a class="" href="{{ url('/contact') }}" >Contact Us</a>
                                </li>
                                <li>
                                    <a class="" href="{{ url('/about') }}" >About</a>
                                </li>
                            </ul>
                        </li>
                        <li class=""> 
                            <a href="{{ url('/advertise') }}">
                                <i class="fa fa-lock"></i>
                                <span class="title">Advertise</span>
                            </a>
                        </li>
                        <li class=""> 
                            <a href="{{ url('/setting') }}">
                                <i class="fa fa-table"></i>
                                <span class="title">Setting</span>
                            </a>
                        </li>
                        <li class=""> 
                            <a href="{{ url('/account') }}">
                                <i class="fa fa-envelope"></i>
                                <span class="title">Account</span>
                            </a>
                        </li>
                        <li class=""> 
                            <a href="{{ url('/help') }}">
                                <i class="fa fa-map-marker"></i>
                                <span class="title">Help</span>
                            </a>
                        </li>
                        <li class=""> 
                            <a href="javascript:;">
                                <i class="fa fa-columns"></i>
                                <span class="title">Log Out</span>
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- MAIN MENU - END -->



                <div class="project-info">

                    <div class="block1">
                        <div class="data">
                            <span class='title'>New&nbsp;User</span>
                            <span class='total'>2,345</span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_orders">...</span>
                        </div>
                    </div>

                    <div class="block2">
                        <div class="data">
                            <span class='title'>Visitors</span>
                            <span class='total'>345</span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_visitors">...</span>
                        </div>
                    </div>

                </div>



            </div>
            <!--  SIDEBAR - END -->