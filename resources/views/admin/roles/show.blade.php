@extends('admin.master')

@section('content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Profile</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                <li class="breadcrumb-item active">{{ Auth::user()->name }}</li>
            </ol>

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> <img src="{{ asset('_admin/'.$user->avatar) }}" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                        @if (auth()->user()->isAdmin())
                            <div>
                                <h6 class="card-subtitle">Admin</h6>
                            </div>
                        @else
                            <h6 class="card-subtitle">User</h6>
                        @endif
                    {{-- <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i>
                                <font class="font-medium">254</font>
                            </a></div>
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i>
                                <font class="font-medium">54</font>
                            </a></div>
                    </div> --}}
                </center>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
                <form class="form-horizontal form-material" method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    {{-- <div class="form-group">
                       
                            <input type="hidden" name="id" placeholder="{{$user->id}}" value="{{ $user->id }}" class="form-control form-control-line">

                    </div> --}}
                    <div class="form-group">
                        <label for="example-name" class="col-md-12">Full Name</label>
                        <div class="col-md-12">
                            <input type="text" name="name" placeholder="{{$user->name}}" value="{{ $user->name }}" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" name="email"  placeholder="{{$user->email}}" value="{{ $user->email }}" class="form-control form-control-line" id="example-email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-Role" class="col-md-12">Role</label>
                        <div class="col-md-12">
                            <select class="form-control" name="role" id="exampleFormControlSelect1">
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                            </select>
                        </div>
                        
                    </div>
                    {{-- <div class="form-group">
                        <label class="col-md-12">Password</label>
                        <div class="col-md-12">
                            <input type="password" value="password" class="form-control form-control-line">
                        </div>
                    </div> --}}
                    {{-- <div class="form-group">
                        <label for="example-phone"  class="col-md-12">Phone No</label>
                        <div class="col-md-12">
                            <input type="text" name="phone-number"  placeholder="/" class="form-control form-control-line">
                        </div>
                    </div> --}}
                  
                    {{-- <div class="form-group">
                        <label class="col-sm-12">Select Country</label>
                        <div class="col-sm-12">
                            <select class="form-control form-control-line">
                                <option>London</option>
                                <option>India</option>
                                <option>Usa</option>
                                <option>Canada</option>
                                <option>Thailand</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection