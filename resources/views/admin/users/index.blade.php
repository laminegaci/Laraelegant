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
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Users</a></li>
            </ol>
            @can('users_create')
            <a href="{{ route('users.create') }}"><button type="button" class="btn btn-success d-none d-lg-block m-l-15"> Add new</button></a>
            @else
            <a href="{{ route('users.create') }}"><button type="button" class="btn btn-success d-none d-lg-block m-l-15" disabled> Add new</button></a>
            @endcan
            
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
                                <input type="hidden" class="serdelete_val_id" value="{{ $user->id }}">
                                <td>{{ $user->id }}</td>
                                <td class="serdelete_name_user">{{ $user->name }}</td>

                                <td>{{ $user->email }}</td>
                                <td><span class="label label-info">
                                @foreach ($user->roles as $role)
                                    {{ $role->name }}
                                @endforeach    
                                </span></td>
                                <td><img src="{{ asset('storage/'.$user->avatar) }}" alt="user_avatar" class="img-circle" width="30"></td>

                                <td>
                                    <a href="{{ route('users.show', $user->id ) }}"><span class="label label-success">show</span></a>
                                    {{-- <a href="{{ route('users.show', '1') }}"><span class="label label-warning">update</span></a> --}}
                                    {{-- <a href="{{ route('users.destroy', $user->id) }}" ><span class="label label-danger">deleteos</span></a> --}}
                                    <a href="" onclick="event.preventDefault();">
                                       
                                            <button class="servideletebtn" type="submit" style="border: none;background:transparent;color:red;">
                                                <i class="fas fa-trash"></i>
                                            </button>   

                                    </a>
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
@if(Session::has('success_store'))
<script>
    //sweetalert
    swal({
        title: "Good job!",
        text: "{{ Session::get('success_store') }}",
        icon: "success",
    });
</script>
@endif
@if(Session::has('success_update'))
<script>
    //sweetalert
    swal({
        title: "Good job!",
        text: "{{ Session::get('success_update') }}",
        icon: "success",
    });
</script>
@endif
@if(Session::has('success_destroy'))
<script>
    //sweetalert
    swal({
        title: "Good job!",
        text: "{{ Session::get('success_destroy') }}",
        icon: "success",
    });
</script>
@endif
<script>
    //datatable
    $(document).ready(function() {
        $('#myTable').DataTable();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.servideletebtn').click(function (e) {
            e.preventDefault();
            var delete_id = $(this).closest("tr").find('.serdelete_val_id').val();
            var delete_user = $(this).closest("tr").find('.serdelete_name_user').text();
            //alert(delete_id);
            swal({
                title: "Are you sure ?",
                text: "You want to delete "+ delete_user,
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var data = {
                            "_token": $('input[name="csrf-token"]').val(),
                            "id": delete_id,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: '/admin/users/'+delete_id,
                            data: data,
                            success: function (response) {
                                swal(response.status, {
                                    icon: "success",
                                })
                                .then((result) => {
                                    location.reload();
                                }); 
                            }
                        });
                            
                    } 
                });           
        });
    });
</script>

@endsection