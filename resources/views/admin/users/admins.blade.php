@extends('dashboard.admin')

@section('content')
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Admins</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{url('')}}" class="text-white">Home</a></li>
                                <li>Admins</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            @include('partials.alerts')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <div>
                                    <h3 class="title">Admins Lists <a href="{{route('users.create')}}" class="btn btn-success float-right">Add New</a></h3>

                                </div>
                            </div>
                            <div class="form-content">
                                <div class="table-form table-responsive">
                                    <table class="table" id="collector_table">
                                        <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Country</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Joined At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 1;?>
                                        @foreach($users as $user)
                                            <tr>
                                                <th scope="row">{{$count++}}</th>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->country}}</td>
                                                <td>{{$user->city}}</td>
                                                <td>
                                                    {{$user->created_at->format('d-M-Y')}}
                                                </td>
                                                <td>
                                                    <div style="display: flex">
                                                        <a href="{{route('users.edit', $user)}}"
                                                           class="theme-btn theme-btn-small mr-2"><i
                                                                class="fa fa-pen"></i></a>
                                                        <form action="{{route('users.destroy', $user)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="theme-btn theme-btn-danger ml-2"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                <!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div><!-- end dashboard-content-wrap -->

@endsection
