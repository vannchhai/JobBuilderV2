
@extends('admin.share.layout')

@section('content')


 <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Dashboard</h1>
                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">
                                <div class="row">

                                    <div class="col-md-3 col-sm-5 col-xs-12">

                                        <div class="r1_graph1 db_box">
                                            <span class='bold'>98.95%</span>
                                            <span class='pull-right'><small>SERVER UP</small></span>
                                            <div class="clearfix"></div>
                                            <span class="db_dynamicbar">Loading...</span>
                                        </div>


                                        <div class="r1_graph2 db_box">
                                            <span class='bold'>2332</span>
                                            <span class='pull-right'><small>USERS ONLINE</small></span>
                                            <div class="clearfix"></div>
                                            <span class="db_linesparkline">Loading...</span>
                                        </div>


                                        <div class="r1_graph3 db_box hidden-xs">
                                            <span class='bold'>342/123</span>
                                            <span class='pull-right'><small>ORDERS / SALES</small></span>
                                            <div class="clearfix"></div>
                                            <span class="db_compositebar">Loading...</span>
                                        </div>

                                    </div>



                                    <div class="col-md-6 col-sm-7 col-xs-12">
                                        <div class="r1_maingraph db_box">
                                            <span class='pull-left'>
                                                <i class='icon-purple fa fa-square icon-xs'></i>&nbsp;<small>PAGE VIEWS</small>&nbsp; &nbsp;<i class='fa fa-square icon-xs icon-primary'></i>&nbsp;<small>UNIQUE VISITORS</small>
                                            </span>
                                            <span class='pull-right switch'>
                                                <i class='icon-default fa fa-line-chart icon-xs'></i>&nbsp; &nbsp;<i class='icon-secondary fa fa-bar-chart icon-xs'></i>&nbsp; &nbsp;<i class='icon-secondary fa fa-area-chart icon-xs'></i>
                                            </span>

                                            <div id="db_morris_line_graph" style="height:272px;width:95%;"></div>
                                            <div id="db_morris_area_graph" style="height:272px;width:90%;display:none;"></div>
                                            <div id="db_morris_bar_graph" style="height:272px;width:90%;display:none;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="r1_graph4 db_box">
                                            <span class=''>
                                                <i class='icon-purple fa fa-square icon-xs icon-1'></i>&nbsp;<small>CPU USAGE</small>
                                            </span>
                                            <canvas width='180' height='90' id="gauge-meter"></canvas>
                                            <h4 id='gauge-meter-text'></h4>
                                        </div>
                                        <div class="r1_graph5 db_box col-xs-6">
                                            <span class=''><i class='icon-purple fa fa-square icon-xs icon-1'></i>&nbsp;<small>LONDON</small>&nbsp; &nbsp;<i class='fa fa-square icon-xs icon-2'></i>&nbsp;<small>PARIS</small></span>
                                            <div style="width:120px;height:120px;margin: 0 auto;">
                                                <span class="db_easypiechart1 easypiechart" data-percent="66"><span class="percent" style='line-height:120px;'></span></span>
                                            </div>
                                        </div>

                                    </div>

                                </div> <!-- End .row -->


                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <div class="wid-vectormap">
                                            <h4>Visitor's Statistics</h4>
                                            <div class="row">
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <figure>
                                                        <div id="db-world-map-markers" style="width: 100%; height: 300px"></div>        
                                                    </figure>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12 map_progress">
                                                    <h4>Unique Visitors</h4>
                                                    <span class='text-muted'><small>Last Week Rise by 62%</small></span>
                                                    <div class="progress"><div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div></div>
                                                    <br>
                                                    <h4>Registrations</h4>
                                                    <span class='text-muted'><small>Up by 57% last 7 days</small></span>
                                                    <div class="progress"><div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%"></div></div>
                                                    <br>
                                                    <h4>Direct Sales</h4>
                                                    <span class='text-muted'><small>Last Month Rise by 22%</small></span>
                                                    <div class="progress"><div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100" style="width: 22%"></div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>      

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="r2_graph1 db_box">



                                            <form id="rickshaw_side_panel">
                                                <section><div id="legend"></div></section>
                                                <section>
                                                    <div id="renderer_form" class="toggler">
                                                        <select name="renderer">
                                                            <option value="area" selected>Area</option>
                                                            <option value="bar">Bar</option>
                                                            <option value="line">Line</option>
                                                            <option value="scatterplot">Scatter</option>
                                                        </select>
                                                    </div>
                                                </section>
                                                <section>
                                                    <div id="offset_form">
                                                        <label for="stack">
                                                            <input type="radio" name="offset" id="stack" value="zero" checked>
                                                            <span>stack</span>
                                                        </label>
                                                        <label for="stream">
                                                            <input type="radio" name="offset" id="stream" value="wiggle">
                                                            <span>stream</span>
                                                        </label>
                                                        <label for="pct">
                                                            <input type="radio" name="offset" id="pct" value="expand">
                                                            <span>pct</span>
                                                        </label>
                                                        <label for="value">
                                                            <input type="radio" name="offset" id="value" value="value">
                                                            <span>value</span>
                                                        </label>
                                                    </div>
                                                    <div id="interpolation_form">
                                                        <label for="cardinal">
                                                            <input type="radio" name="interpolation" id="cardinal" value="cardinal" checked>
                                                            <span>cardinal</span>
                                                        </label>
                                                        <label for="linear">
                                                            <input type="radio" name="interpolation" id="linear" value="linear">
                                                            <span>linear</span>
                                                        </label>
                                                        <label for="step">
                                                            <input type="radio" name="interpolation" id="step" value="step-after">
                                                            <span>step</span>
                                                        </label>
                                                    </div>
                                                </section>
                                            </form>

                                            <div id="chart_container" class="rickshaw_ext">
                                                <div id="chart"></div>
                                                <div id="timeline"></div>
                                            </div>

                                            <div id='rickshaw_side_panel' class="rickshaw_sliders">
                                                <section>
                                                    <h5>Smoothing</h5>
                                                    <div id="smoother"></div>
                                                </section>
                                                <section>
                                                    <h5>Preview Range</h5>
                                                    <div id="preview" class="rickshaw_ext_preview"></div>
                                                </section>
                                            </div>

                                        </div>
                                        <!-- 
                                                                        <div class="r2_counter1 db_box">
                                                                                counter 1
                                                                        </div>
                                        
                                                                        <div class="r2_counter2 db_box">
                                                                                counter 2
                                                                        </div> -->

                                    </div>      

                                </div> <!-- End .row -->





                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-thumbs-up icon-md icon-rounded icon-primary'></i>
                                            <div class="stats">
                                                <h4><strong>45%</strong></h4>
                                                <span>New Orders</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-shopping-cart icon-md icon-rounded icon-orange'></i>
                                            <div class="stats">
                                                <h4><strong>243</strong></h4>
                                                <span>New Products</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-dollar icon-md icon-rounded icon-purple'></i>
                                            <div class="stats">
                                                <h4><strong>$3424</strong></h4>
                                                <span>Profit Today</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-users icon-md icon-rounded icon-warning'></i>
                                            <div class="stats">
                                                <h4><strong>1433</strong></h4>
                                                <span>New Users</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End .row -->    



                                <div class="row">
                                    <div class="col-md-5 col-sm-12 col-xs-12">
                                        <div class="r3_notification db_box">
                                            <h4>Notifications</h4>

                                            <ul class="list-unstyled notification-widget">


                                                <li class="unread status-available">
                                                    <a href="javascript:;">
                                                        <div class="user-img">
                                                            <img src="public/assets/Admin/data/profile/avatar-1.png" alt="user-image" class="img-circle img-inline">
                                                        </div>
                                                        <div>
                                                            <span class="name">
                                                                <strong>Clarine Vassar</strong>
                                                                <span class="time small">- 15 mins ago</span>
                                                                <span class="profile-status available pull-right"></span>
                                                            </span>
                                                            <span class="desc small">
                                                                Sometimes it takes a lifetime to win a battle.
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>


                                                <li class=" status-away">
                                                    <a href="javascript:;">
                                                        <div class="user-img">
                                                            <img src="public/assets/Admin/data/profile/avatar-2.png" alt="user-image" class="img-circle img-inline">
                                                        </div>
                                                        <div>
                                                            <span class="name">
                                                                <strong>Brooks Latshaw</strong>
                                                                <span class="time small">- 45 mins ago</span>
                                                                <span class="profile-status away pull-right"></span>
                                                            </span>
                                                            <span class="desc small">
                                                                Sometimes it takes a lifetime to win a battle.
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>


                                                <li class=" status-busy">
                                                    <a href="javascript:;">
                                                        <div class="user-img">
                                                            <img src="public/assets/Admin/data/profile/avatar-3.png" alt="user-image" class="img-circle img-inline">
                                                        </div>
                                                        <div>
                                                            <span class="name">
                                                                <strong>Clementina Brodeur</strong>
                                                                <span class="time small">- 1 hour ago</span>
                                                                <span class="profile-status busy pull-right"></span>
                                                            </span>
                                                            <span class="desc small">
                                                                Sometimes it takes a lifetime to win a battle.
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>


                                                <li class=" status-offline">
                                                    <a href="javascript:;">
                                                        <div class="user-img">
                                                            <img src="public/assets/Admin/data/profile/avatar-4.png" alt="user-image" class="img-circle img-inline">
                                                        </div>
                                                        <div>
                                                            <span class="name">
                                                                <strong>Carri Busey</strong>
                                                                <span class="time small">- 5 hours ago</span>
                                                                <span class="profile-status offline pull-right"></span>
                                                            </span>
                                                            <span class="desc small">
                                                                Sometimes it takes a lifetime to win a battle.
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>


                                                <li class=" status-offline">
                                                    <a href="javascript:;">
                                                        <div class="user-img">
                                                            <img src="public/assets/Admin/data/profile/avatar-5.png" alt="user-image" class="img-circle img-inline">
                                                        </div>
                                                        <div>
                                                            <span class="name">
                                                                <strong>Melissa Dock</strong>
                                                                <span class="time small">- Yesterday</span>
                                                                <span class="profile-status offline pull-right"></span>
                                                            </span>
                                                            <span class="desc small">
                                                                Sometimes it takes a lifetime to win a battle.
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>


                                                <li class=" status-available">
                                                    <a href="javascript:;">
                                                        <div class="user-img">
                                                            <img src="public/assets/Admin/data/profile/avatar-1.png" alt="user-image" class="img-circle img-inline">
                                                        </div>
                                                        <div>
                                                            <span class="name">
                                                                <strong>Verdell Rea</strong>
                                                                <span class="time small">- 14th Mar</span>
                                                                <span class="profile-status available pull-right"></span>
                                                            </span>
                                                            <span class="desc small">
                                                                Sometimes it takes a lifetime to win a battle.
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>


                                                <li class=" status-busy">
                                                    <a href="javascript:;">
                                                        <div class="user-img">
                                                            <img src="public/assets/Admin/data/profile/avatar-2.png" alt="user-image" class="img-circle img-inline">
                                                        </div>
                                                        <div>
                                                            <span class="name">
                                                                <strong>Linette Lheureux</strong>
                                                                <span class="time small">- 16th Mar</span>
                                                                <span class="profile-status busy pull-right"></span>
                                                            </span>
                                                            <span class="desc small">
                                                                Sometimes it takes a lifetime to win a battle.
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>


                                                <li class=" status-away">
                                                    <a href="javascript:;">
                                                        <div class="user-img">
                                                            <img src="public/assets/Admin/data/profile/avatar-3.png" alt="user-image" class="img-circle img-inline">
                                                        </div>
                                                        <div>
                                                            <span class="name">
                                                                <strong>Araceli Boatright</strong>
                                                                <span class="time small">- 16th Mar</span>
                                                                <span class="profile-status away pull-right"></span>
                                                            </span>
                                                            <span class="desc small">
                                                                Sometimes it takes a lifetime to win a battle.
                                                            </span>
                                                        </div>
                                                    </a>
                                                </li>


                                            </ul>

                                        </div>
                                    </div>      

                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="r3_weather">
                                            <div class="wid-weather wid-weather-small">
                                                <div class="">

                                                    <div class="location">
                                                        <h3>California, USA</h3>
                                                        <span>Today, 12<sup>th</sup> March 2015</span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="degree">
                                                        <i class='fa fa-cloud icon-lg text-white'></i><span>Now</span><h3>24°</h3>
                                                        <div class="clearfix"></div>
                                                        <h4 class="text-white text-center">Hot & Sunny</h4>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="weekdays bg-white">
                                                        <ul class="list-unstyled">
                                                            <li><span class='day'>Sunday</span><i class='fa fa-cloud icon-xs'></i><span class='temp'>23° - 27°</span></li>
                                                            <li><span class='day'>Monday</span><i class='fa fa-cloud icon-xs'></i><span class='temp'>21° - 26°</span></li>
                                                            <li><span class='day'>Tuesday</span><i class='fa fa-cloud icon-xs'></i><span class='temp'>24° - 28°</span></li>
                                                            <li><span class='day'>Wednesday</span><i class='fa fa-cloud icon-xs'></i><span class='temp'>25° - 26°</span></li>
                                                            <li><span class='day'>Thursday</span><i class='fa fa-cloud icon-xs'></i><span class='temp'>22° - 25°</span></li>
                                                            <li><span class='day'>Friday</span><i class='fa fa-cloud icon-xs'></i><span class='temp'>21° - 28°</span></li>
                                                            <li><span class='day'>Satday</span><i class='fa fa-cloud icon-xs'></i><span class='temp'>23° - 29°</span></li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>      

                                    <div class="col-md-4 col-sm-6 col-xs-12">

                                        <div class="ultra-widget ultra-todo-task bg-primary">
                                            <div class="wid-task-header">
                                                <div class="wid-icon">
                                                    <i class="fa fa-tasks"></i>
                                                </div>
                                                <div class="wid-text">
                                                    <h4>To do Tasks</h4>
                                                    <span>Wed, <small>11<sup>th</sup> March 2015</small></span>
                                                </div>
                                            </div>
                                            <div class="wid-all-tasks">

                                                <ul class="list-unstyled">

                                                    <li class="checked">
                                                        <input type="checkbox" id="task-1" class="icheck-minimal-white todo-task" checked>
                                                        <label class="icheck-label form-label" for="task-1">Office Projects</label>
                                                    </li> 
                                                    <li>
                                                        <input type="checkbox" id="task-2" class="icheck-minimal-white todo-task" >
                                                        <label class="icheck-label form-label" for="task-2">Generate Invoice</label>
                                                    </li>  

                                                    <li>
                                                        <input type="checkbox" id="task-3" class="icheck-minimal-white todo-task" >
                                                        <label class="icheck-label form-label" for="task-3">Ecommerce Theme</label>
                                                    </li> 
                                                    <li>
                                                        <input type="checkbox" id="task-4" class="icheck-minimal-white todo-task" >
                                                        <label class="icheck-label form-label" for="task-4">PHP and jQuery</label>
                                                    </li> 
                                                    <li>
                                                        <input type="checkbox" id="task-5" class="icheck-minimal-white todo-task" >
                                                        <label class="icheck-label form-label" for="task-5">Allocate&nbsp;Resource</label>
                                                    </li> 
                                                </ul>

                                            </div>
                                            <div class="wid-add-task">
                                                <input type="text" class="form-control" placeholder="Add task" />
                                            </div>
                                        </div>


                                    </div>      

                                </div> <!-- End .row -->


                            </div>
                        </section></div>



                </section>
            </section>


<!-- END CONTENT -->
            <div class="page-chatapi hideit">

                <div class="search-bar">
                    <input type="text" placeholder="Search" class="form-control">
                </div>

                <div class="chat-wrapper">
                    <h4 class="group-head">Groups</h4>
                    <ul class="group-list list-unstyled">
                        <li class="group-row">
                            <div class="group-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                            <div class="group-info">
                                <h4><a href="#">Work</a></h4>
                            </div>
                        </li>
                        <li class="group-row">
                            <div class="group-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                            <div class="group-info">
                                <h4><a href="#">Friends</a></h4>
                            </div>
                        </li>

                    </ul>


                    <h4 class="group-head">Favourites</h4>
                    <ul class="contact-list">

                        <li class="user-row" id='chat_user_1' data-user-id='1'>
                            <div class="user-img">
                                <a href="#"><img src="public/assets/Admin/data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clarine Vassar</a></h4>
                                <span class="status available" data-status="available"> Available</span>
                            </div>
                            <div class="user-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_2' data-user-id='2'>
                            <div class="user-img">
                                <a href="#"><img src="public/assets/Admin/data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Brooks Latshaw</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_3' data-user-id='3'>
                            <div class="user-img">
                                <a href="#"><img src="public/assets/Admin/data/profile/avatar-3.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clementina Brodeur</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>

                    </ul>


                    <h4 class="group-head">More Contacts</h4>
                    <ul class="contact-list">

                        <li class="user-row" id='chat_user_4' data-user-id='4'>
                            <div class="user-img">
                                <a href="#"><img src="public/assets/Admin/data/profile/avatar-4.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Carri Busey</a></h4>
                                <span class="status offline" data-status="offline"> Offline</span>
                            </div>
                            <div class="user-status offline">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_5' data-user-id='5'>
                            <div class="user-img">
                                <a href="#"><img src="public/assets/Admin/data/profile/avatar-5.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Melissa Dock</a></h4>
                                <span class="status offline" data-status="offline"> Offline</span>
                            </div>
                            <div class="user-status offline">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_6' data-user-id='6'>
                            <div class="user-img">
                                <a href="#"><img src="public/assets/Admin/data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Verdell Rea</a></h4>
                                <span class="status available" data-status="available"> Available</span>
                            </div>
                            <div class="user-status available">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_7' data-user-id='7'>
                            <div class="user-img">
                                <a href="#"><img src="public/assets/Admin/data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Linette Lheureux</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_8' data-user-id='8'>
                            <div class="user-img">
                                <a href="#"><img src="public/assets/Admin/data/profile/avatar-3.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Araceli Boatright</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_9' data-user-id='9'>
                            <div class="user-img">
                                <a href="#"><img src="public/assets/Admin/data/profile/avatar-4.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Clay Peskin</a></h4>
                                <span class="status busy" data-status="busy"> Busy</span>
                            </div>
                            <div class="user-status busy">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_10' data-user-id='10'>
                            <div class="user-img">
                                <a href="#"><img src="public/assets/Admin/data/profile/avatar-5.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Loni Tindall</a></h4>
                                <span class="status away" data-status="away"> Away</span>
                            </div>
                            <div class="user-status away">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_11' data-user-id='11'>
                            <div class="user-img">
                                <a href="#"><img src="public/assets/Admin/data/profile/avatar-1.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Tanisha Kimbro</a></h4>
                                <span class="status idle" data-status="idle"> Idle</span>
                            </div>
                            <div class="user-status idle">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>
                        <li class="user-row" id='chat_user_12' data-user-id='12'>
                            <div class="user-img">
                                <a href="#"><img src="public/assets/Admin/data/profile/avatar-2.png" alt=""></a>
                            </div>
                            <div class="user-info">
                                <h4><a href="#">Jovita Tisdale</a></h4>
                                <span class="status idle" data-status="idle"> Idle</span>
                            </div>
                            <div class="user-status idle">
                                <i class="fa fa-circle"></i>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>


@endsection
@section('javascript')
    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="public/assets/Admin/assets/plugins/rickshaw-chart/vendor/d3.v3.js" type="text/javascript"></script> <script src="public/assets/Admin/assets/plugins/jquery-ui/smoothness/jquery-ui.min.js" type="text/javascript"></script> <script src="public/assets/Admin/assets/plugins/rickshaw-chart/js/Rickshaw.All.js"></script><script src="public/assets/Admin/assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script><script src="public/assets/Admin/assets/plugins/easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script><script src="public/assets/Admin/assets/plugins/morris-chart/js/raphael-min.js" type="text/javascript"></script><script src="public/assets/Admin/assets/plugins/morris-chart/js/morris.min.js" type="text/javascript"></script><script src="public/assets/Admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.1.min.js" type="text/javascript"></script><script src="public/assets/Admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script><script src="public/assets/Admin/assets/plugins/gauge/gauge.min.js" type="text/javascript"></script><script src="public/assets/Admin/assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><script src="public/assets/Admin/assets/js/dashboard.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
@stop

 