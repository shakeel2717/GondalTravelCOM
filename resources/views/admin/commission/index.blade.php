@extends('dashboard.admin')

@section('content')
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30 text-white">Commissions</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list text-right">
                            <ul class="list-items">
                                <li><a href="{{url('')}}" class="text-white">Home</a></li>
                                <li>Commissions</li>
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
                                <h3 class="sec__title font-size-30 text-dark">Commissions
                                    <!--<a href="{{route('commissions.create')}}" class="btn btn-primary ml-2 float-right">Add New</a>-->
                                </h3>
                            </div>
                            <div class="form-content">
                                <div class="table-form table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Commission Percentage</th>
                                             <th scope="col">Commission Value</th>
                                              <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 0;?>
                                        @foreach($commissions as $commission)
                                            <tr>
                                                <th scope="row">{{$count}}</th>
                                                <td> {{$commission->commission_percentage}} %</td>
                                                  <td> {{$commission->commission_value}} </td>
                                                   
                                                    @if($commission->status=='0')
                                                    <td><b>Commission Percentage Applied</b></td>
                                                    @elseif($commission->status=='1')
                                                      <td><b>Commission Value Applied</b></td>
                                                    @endif
                                                    
                                                    
                                                   
                                                <td>
                                                <div style="display: flex">
                                                    <a href="{{route('commissions.edit', $commission)}}"
                                                       class="theme-btn theme-btn-small mr-2"><i
                                                            class="fa fa-pen"></i></a>
                                                    <!--<form action="{{route('commissions.destroy', $commission)}}"-->
                                                    <!--      method="POST">-->
                                                    <!--    @csrf-->
                                                    <!--    @method('DELETE')-->
                                                    <!--    <button type="submit"-->
                                                    <!--            class="theme-btn theme-btn-danger ml-2"><i-->
                                                    <!--            class="fa fa-trash"></i></button>-->
                                                    <!--</form>-->
                                                </div>
                                                </td>
                                            </tr>
                                            <?php $count++;?>
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
