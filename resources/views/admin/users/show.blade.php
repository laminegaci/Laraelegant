@extends('admin.master')

@section('content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">User Profile</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">{{$user->name}} </li>
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
                <center class="m-t-30"> <img src="{{ asset('storage/'.$user->avatar) }}" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10">{{ $user->name }}</h4>                     
                        <div>
                            <h6 class="card-subtitle">
                                {{ Auth::user()->roleById($user->id) }}
                            </h6>
                        </div>
                        @if(Auth::user()->isAdmin($user->id) or Auth::user()->actuallyLogedIn($user->id))
                            <form action="{{ route('users.updateavatar', $user->id) }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group" >
                                {{-- <label for="exampleFormControlFile1">Update Avatar</label> --}}
                                <input id="avatar" type="file" name="avatar" class="form-control-file @error('avatar') is-invalid @enderror" id="exampleFormControlFile1">
                                    
                                @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                <input type="submit" class="form-control-file" id="exampleFormControlFile1" value="update avatar">
                                </div>
                            </form>
                        @endif
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
                    @if(Auth::user()->isAdmin($user->id) or Auth::user()->actuallyLogedIn($user->id))
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
                        @if(Auth::user()->isAdmin($user->id))
                            <div class="form-group">
                                <label for="example-Role" class="col-md-12">Role</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="role_id" id="exampleFormControlSelect1">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }} " {{ Auth::user()->roleById($user->id) == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>                        
                            </div>
                        @else
                            <div class="form-group">
                                <label for="example-Role" class="col-md-12">Role</label>
                                <div class="col-md-12">
                                    <select disabled class="form-control" name="role_id" id="exampleFormControlSelect1">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }} " {{ Auth::user()->roleById($user->id) == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>                        
                            </div>
                        @endif
                    @else
                        <div class="form-group">
                            <label for="example-name" class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input disabled type="text" name="name" placeholder="{{$user->name}}" value="{{ $user->name }}" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input disabled type="email" name="email"  placeholder="{{$user->email}}" value="{{ $user->email }}" class="form-control form-control-line" id="example-email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-Role" class="col-md-12">Role</label>
                            <div class="col-md-12">
                                <select disabled class="form-control" name="role_id" id="exampleFormControlSelect1">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }} " {{ Auth::user()->roleById($user->id) == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>                        
                        </div>
                    @endif

                    @if(Auth::user()->isAdmin($user->id) or Auth::user()->actuallyLogedIn($user->id))
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                    @else
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success prevent_link" disabled>Update Profile</button>
                                </div>
                            </div>
                    @endif
                    
                </form>
            </div>
        </div>
        <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
                <form class="form-horizontal form-material" method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="example-name" class="col-md-12">Current Password</label>
                        <div class="col-md-12">
                            @if(Auth::user()->isAdmin($user->id) or Auth::user()->actuallyLogedIn($user->id))
                            <input type="text" name="name" placeholder="" class="form-control form-control-line">
                            @else
                            <input type="text" name="name" placeholder="" class="form-control form-control-line" disabled>
                            @endif                       
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">New Password</label>
                        <div class="col-md-12">
                            @if(Auth::user()->isAdmin($user->id) or Auth::user()->actuallyLogedIn($user->id))
                            <input type="email" name="email"  placeholder=""  class="form-control form-control-line" id="example-email">
                            @else
                            <input type="email" name="email"  placeholder=""  class="form-control form-control-line" id="example-email" disabled>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Confirm Password</label>
                        <div class="col-md-12">
                            @if(Auth::user()->isAdmin($user->id) or Auth::user()->actuallyLogedIn($user->id))
                            <input type="email" name="email"  placeholder=""  class="form-control form-control-line" id="example-email">
                            @else
                            <input type="email" name="email"  placeholder=""  class="form-control form-control-line" id="example-email" disabled>
                            @endif                            
                        </div>
                    </div>

                    @if(Auth::user()->isAdmin($user->id) or Auth::user()->actuallyLogedIn($user->id))
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Update Password</button>
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success prevent_link" disabled>Update Password</button>
                            </div>
                        </div>
                    @endif
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

@section('scripts')

@if(Session::has('success_updateavatar'))
<script>
    //sweetalert
    swal({
        title: "Good job!",
        text: "{{ Session::get('success_updateavatar') }}",
        icon: "success",
    });
</script>
@endif

@endsection