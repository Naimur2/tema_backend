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
        <h1 class="h3 text-gray-800">All Teams</h1>
        <a href="{{ route('teams.create') }}" class="btn btn-sm btn-primary">
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
                            <th>Color</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($teams); $i++) <tr>
                            <td class="text-center">
                                <div class="d-flex justify-content-center flex-grow-1">
                                    <div class="deleteTeam  mx-2" data-request-id="{{$teams[$i]->id}}">
                                        <form method="POST" action="{{ route('teams.destroy', $teams[$i]->id)}}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger deleteButton" hidden data-team-id="{{$teams[$i]->id}}"><i class="fas fa-trash text-white"></i></button>
                                        </form>
                                        <button class="btn btn-danger"><i class="fas fa-trash text-white"></i></button>
                                    </div>
                                    <div>
                                        <a href="{{route('teams.edit', $teams[$i]->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt text-white"></i></a>
                                    </div>
                                </div>
                            </td>
                            <td>{{$teams[$i]->name}}</td>
                            <td><span class="badge badge-pill" style="background-color: {{$teams[$i]->color}}; color: {{$teams[$i]->color}};">.</span></td>
                            <td>{{$teams[$i]->score}}</td>
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
    $(".deleteTeam").on('click', (e) => {
    let teamId = $(e.currentTarget).data('team-id')
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
            $(".deleteButton[data-team-id=" + teamId + "]").click();
        }
    });
})
</script>
@endsection