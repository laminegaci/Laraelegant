@extends('admin.master')

@section('content')

<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Users</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
            <a href="{{ route('users.create') }}"><button type="button" class="btn btn-success d-none d-lg-block m-l-15"> Add new</button></a>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic Table</h4>
                <div class="table-responsive">
                    <table id="myTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>

                                <th>Email</th>
                                <th>Role</th>
                                <th>avatar</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>

                                <td>{{ $user->email }}</td>
                                <td><span class="label label-info">{{ $user->role }}</span></td>
                                <td>{{ $user->avatar }}</td>

                                <td>
                                    <a href="{{ route('users.show', '1') }}"><span class="label label-success">show</span></a>
                                    <a href="{{ route('users.show', '1') }}"><span class="label label-warning">update</span></a>
                                    <a href="{{ route('users.show', '1') }}"><span class="label label-danger">delete</span></a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->

@endsection

@section('scripts')

@if(Session::has('success'))
<script>
    //sweetalert
    swal({
        title: "Good job!",
        text: "{{ Session::get('success') }}",
        icon: "success",
    });
</script>
@endif
<script>
    //datatable
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

@endsection