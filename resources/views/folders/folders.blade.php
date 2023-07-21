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
            <h1 class="h3 text-gray-800">{{request()->routeIs('folders.show') ? $folder->name: __('All Folders')}}</h1>
             <div>
                 <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-folder-modal">
                     <i class="fas fa-plus"></i> Add New Folder
                 </button>

                 @if(request()->routeIs('folders.show'))
                     <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add-file-modal">
                         <i class="fas fa-plus"></i> Upload File
                     </button>
                     <a href="{{url()->previous()}}" type="button" class="btn btn-sm btn-success">
                         <i class="fas fa-arrow"></i> Back
                     </a>
                 @endif
             </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                @foreach($errors as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                    @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($folders as $folder)
                            <tr>
                                <td class="d-flex text-center flex-grow-1 justify-content-center">
                                    <div>
                                        <div class="deleteUser mx-2" data-user-id="{{$folder->id}}">
                                            <form method="POST" action="{{ route('folders.destroy', $folder->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger deleteButton" hidden data-user-id="{{$folder->id}}"><i class="fas fa-trash text-white"></i></button>
                                            </form>
                                            <button class="btn btn-danger"><i class="fas fa-trash text-white"></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td><a href="{{route('folders.show', $folder->id)}}"><i class="fa fa-folder"></i> &nbsp;{{$folder->name}}</a></td>
                                <td>{{$folder->created_at}}</td>
                            </tr>
                        @endforeach
                        @foreach ($files as $file)
                            <tr>
                                <td class="d-flex text-center flex-grow-1 justify-content-center">
                                    <div>
                                        <div class="deleteUser mx-2" data-user-id="{{$file->id}}">
                                            <form method="POST" action="{{ route('files.destroy', $file->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger deleteButton" hidden data-user-id="{{$file->id}}"><i class="fas fa-trash text-white"></i></button>
                                            </form>
                                            <button class="btn btn-danger"><i class="fas fa-trash text-white"></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td> <a href="{{$file->file}}" target="_blank"><i class="fa fa-file"></i> &nbsp; {{$file->name}}</a></td>
                                <td>{{$file->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('folders.add-folder-modal')
    @include('folders.add-file-modal')
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
                if (t.value) {
                    $(".deleteButton[data-user-id=" + userId + "]").click();
                }
            });
        })
    </script>
@endsection