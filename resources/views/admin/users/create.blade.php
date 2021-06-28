@extends('admin.master')

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Add User</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">Add User</li>
            </ol>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername">Username</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="exampleInputFirst-Name" aria-describedby="" placeholder="Enter Name">
                    </div>

                        <div class="form-group">
                            <label for="exampleSelectRole">Role</label>
                            <select class="js-example-placeholder-single js-states form-control" name="role_id" id="exampleFormControlSelect1">
                                @if(Auth::user()->isAdmin())
                                    @foreach($roles as $role)
                                    <option  value="{{ $role->id }}" >{{ $role->name }}</option>
                                    @endforeach
                                    
                                @else
                                    <option  value="2" >Super-User</option>
                                    <option  value="3" >User</option>
                                @endif
                            </select>
                        </div>
                  
                    
                    <div class="form-group">
                        <label for="exampleFormControlAvatar">Avatar</label>
                        <input type="file" class="form-control-file" name="avatar" value="{{ old('avatar') }}" id="avatar">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword_confirm">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="exampleInputPasswordConfirmation" placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(".js-example-placeholder-single").select2({
        placeholder: "Select a state",
        allowClear: true
    });
</script>
@endsection