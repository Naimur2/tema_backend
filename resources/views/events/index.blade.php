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
        <h1 class="h3 text-gray-800">All Events</h1>
        <a href="{{ route('events.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Team</th>
                            <th>Starting Date</th>
                            <th>Ending Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($events); $i++) <tr>
                            <td class=" d-flex text-center flex-grow-1 justify-content-center">
                                <div class="mx-1">
                                    <div class="deleteResource" data-resource-id="{{$events[$i]->id}}">
                                        <form method="POST" action="{{ route('events.destroy', $events[$i]->id)}}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger deleteButton" hidden data-resource-id="{{$events[$i]->id}}"><i class="fas fa-trash text-white"></i></button>
                                        </form>
                                        <button class="btn btn-danger"><i class="fas fa-trash text-white"></i></button>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{route('events.edit', $events[$i]->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt text-white"></i></a>
                                </div>
                            </td>
                            <td>{{$events[$i]->name}}</td>
                            <td>{{$events[$i]->team->name}}</td>
                            <td>{{$events[$i]->starting_date}}</td>
                            <td>{{$events[$i]->ending_date}}</td>
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
    $(".deleteResource").on('click', (e) => {
    let resourceId = $(e.currentTarget).data('resource-id')
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
            $(".deleteButton[data-resource-id=" + resourceId + "]").click();
        }
        Swal.close();
    });
})
</script>
@endsection