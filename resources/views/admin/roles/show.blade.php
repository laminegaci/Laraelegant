@extends('admin.master')

@section('content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{ $role->name }} Role</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active"><span class="label label-info">{{$role->name}}</span></li>
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
            <div class="roles card-body">
                <center class="m-t-30">
                    <!-- <img src="{{ asset('_admin/images/') }}" class="img-circle" alt="image" width="150" /> -->
                    <h4 class="card-title m-t-10">{{ $role->name }}</h4>
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
                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="example-name" class="col-md-12">Full Name</label>
                        <div class="col-md-12">
                            <input type="text" name="name" placeholder="{{$role->name}}" value="{{ $role->name }}" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectRole" class="col-md-12">Permissions</label>
                        <div class="col-md-12">
                            <select class="js-example-basic-multiple js-states form-control" multiple="multiple" name="permissions_id[]" id="exampleFormControlSelect1">
                                @foreach($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Update Role</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
                <ul>
                    <h3>Pemissions for the role <span class="label label-info">{{$role->name}}</span></h3>
                    @foreach ($role_permissions as $permission)
                        <li>{{$permission->name}}</li>
                    @endforeach
                </ul>   
            </div>
        </div>
        <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
                <ul>
                    <h3>Users have the role of <span class="label label-info">{{$role->name}}</span></h3>
                    @foreach ($role_users as $user)
                        <li>{{$user->name}}</li>
                    @endforeach
                </ul>
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
<script>
    $(".js-example-basic-multiple").select2({
        placeholder: "Select a permission",
        allowClear: true
    });
</script>
@endsection