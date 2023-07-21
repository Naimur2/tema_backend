@extends('layouts.master')
@section('styles')
<link href="{{ asset('admin/vendor/datatables/dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/js/swal/sweetalert2.min.css') }}" rel="stylesheet">
<style>
    .dataTables_wrapper td,
    .dataTables_wrapper th {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between my-2">
        <h1 class="h3 text-gray-800">All Users</h1>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>
    <div class="card shadow mb-4">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Shirt Size</th>
                            <th>Company Name</th>
                            <th>Arrival Date</th>
                            <th>Departure Date</th>
                            <th>Bed Preference</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($appUsers); $i++) <tr>
                            <td class="d-flex text-center flex-grow-1 justify-content-center">
                                <div>
                                    <div class="deleteUser mx-2" data-user-id="{{$appUsers[$i]->id}}">
                                        <form method="POST" action="{{ route('users.destroy', $appUsers[$i]->id)}}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger deleteButton" hidden data-user-id="{{$appUsers[$i]->id}}"><i class="fas fa-trash text-white"></i></button>
                                        </form>
                                        <button class="btn btn-danger"><i class="fas fa-trash text-white"></i></button>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{route('users.edit', $appUsers[$i]->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt text-white"></i></a>
                                </div>
                            </td>
                            <td>{{$appUsers[$i]->first_name}}</td>
                            <td>{{$appUsers[$i]->last_name}}</td>
                            <td>{{$appUsers[$i]->username}}</td>
                            <td>{{$appUsers[$i]->email}}</td>
                            <td>{{$appUsers[$i]->mobile_number}}</td>
                            <td>{{$appUsers[$i]->first_name}}</td>
                            <td>{{$appUsers[$i]->last_name}}</td>
                            <td>{{$appUsers[$i]->shirt_size}}</td>
                            <td>{{$appUsers[$i]->company_name}}</td>
                            <td>{{$appUsers[$i]->arrival_date}}</td>
                            <td>{{$appUsers[$i]->departure_date}}</td>
                            <td>{{$appUsers[$i]->bed_preference}}</td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('admin/vendor/datatables/dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/swal/sweetalert2.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
<script>
    $(".deleteUser").on('click', (e) => {
    let userId = $(e.currentTarget).data('user-id')
    Swal.fire({ 
        title: "Are you sure?", 
        text: "You won't be able to revert this!", 
        icon: "warning", 
        showCancelButton: !0, 
        confirmButtonColor: "#1cbb8c", 
        cancelButtonColor: "#ff3d60", 
        confirmButtonText: "Yes, delete it!" 
    }).then(function (t) {
        if(t.value){
            $(".deleteButton[data-user-id=" + userId + "]").click();
        }
    });
})
</script>
@endsection