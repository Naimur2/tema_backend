@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div id="pageContent">
        <div class="row">
            <div class="col-12">
                <h3>EDIT TEAM</h3>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ '/teams/'. $team->id}}" method="POST" enctype="multipart/form-data">
                            {{method_field('PUT')}}
                            @csrf
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" id="name" name="name" required value="{{ $team->name }}">
                                    @error('name')
                                    <div class="text-danger is-invalid">
                                        Name is required
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-5">
                                    <label for="score" class="form-label">Score <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control form-control-user" id="score" name="score" required value="{{ $team->score }}">
                                    @error('score')
                                    <div class="text-danger is-invalid">
                                        Score is required
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-1">
                                    <label for="color" class="form-label">Color <span class="text-danger">*</span></label>
                                    <input type="color" class="form-control form-control-user" id="color" name="color" required value="{{ $team->color }}">
                                    @error('color')
                                    <div class="text-danger is-invalid">
                                        Color is required
                                    </div>
                                    @enderror
                                </div>
                                
                                
                            </div>

                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary px-5" type="submit">
                                    Save
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