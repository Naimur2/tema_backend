@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div id="pageContent">
        <div class="row">
            <div class="col-12">
                <h3>EDIT EVENT</h3>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{ '/events/'. $event->id}}" method="POST" enctype="multipart/form-data">
                            {{method_field('PUT')}}
                            @csrf
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" id="name" name="name" required value="{{ $event->name }}">
                                    @error('name')
                                    <div class="text-danger is-invalid">
                                        Name is required
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="team_id" class="form-label">Team <span class="text-danger">*</span></label>
                                    <select class="form-control form-select" id="team_id" name="team_id">
                                        <option value="" selected>Select Team from List</option>
                                        @for ($i = 0; $i < count($teams); $i++)
                                            <option value="{{$teams[$i]->id}}" {{$teams[$i]->id == $event->team_id ? "selected" : "" }}>{{$teams[$i]->name}}</option>
                                        @endfor
                                    </select>
                                    @error('team_id')
                                    <div class="text-danger is-invalid">
                                        Team is required
                                    </div>
                                    @enderror
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="starting_date" class="form-label">Starting Date <span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control form-control-user" id="starting_date" name="starting_date" placeholder="" required value="{{ date("Y-m-d\TH:i", strtotime($event->starting_date)) }}">
                                    @error('starting_date')
                                    <div class="text-danger is-invalid">
                                        Starting Date is required
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="ending_date" class="form-label">Ending Date <span class="text-danger">*</span></label>
                                    <input type="datetime-local" class="form-control form-control-user" id="ending_date" name="ending_date" placeholder="" required value="{{ date("Y-m-d\TH:i", strtotime($event->ending_date)) }}">
                                    @error('ending_date')
                                    <div class="text-danger is-invalid">
                                        Ending Date is required
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