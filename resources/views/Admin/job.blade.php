
@extends('admin.share.layout')

@section('content')


 <!-- START CONTENT -->
        <section id="main-content" class=" ">
            <section class="wrapper main-wrapper" style=''>
                <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Job Management</h1>
                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">
                                <a href="#" class="btn btn-info pull-right">Create New</a>
                                <table class="table table-hover">
                                   <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Company</th>
                                            <th>Title</th>
                                            <th>Salary</th>
                                            <th>EndDate</th>
                                            <th>Image</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php $i = 1; ?>
                                       @foreach($ad as $item)
                                         <tr>
                                            <th>{{ $i++ }}</th>
                                            <th class="text-nowrap">{{ $item->company_name }}</th>
                                            <th class="text-nowrap">{{ $item->title }}</th>
                                            <th class="text-nowrap">{{ $item->salary_min }} - {{ $item->salary_max }}</th>
                                            <th class="text-nowrap">{{ $item->start_date }}</th>
                                            <th class="text-nowrap">Image</th>
                                            <th class="text-nowrap">{{ $item->contact_phone }}</th>
                                            <th class="text-nowrap">
                                                <a href="#" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </th>
                                        </tr>
                                       @endforeach
                                   </tbody>
                                </table>

                                {{ $ad->links() }}
                            </div>
                        </section>
                    </div>
            </section>
        </section>

@endsection
