@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div id="pageContent">
            <div class="row">
                <div class="col-12">
                    <h3>Send Notifications</h3>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{session('success')}}
                                </div>
                            @endif
                            <form action="{{route('notifications.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="title" name="title" required>
                                        @error('title')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="title" class="form-label">Message <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="title" name="message"></textarea>
                                        @error('message')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>


                                </div>

                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary px-5" type="submit">
                                        Send Notification
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection