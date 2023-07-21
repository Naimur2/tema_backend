@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div id="pageContent">
            <div class="row">
                <div class="col-12">
                    <h3>CREATE USER</h3>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                        @error('first_name')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                        @error('last_name')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="username" name="username" value="{{ old('username') }}" required>
                                        @error('username')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control form-control-user" id="password" name="password" required>
                                        @error('password')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" required>
                                        @error('password_confirmation')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="mobile_number" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" required>
                                        @error('mobile_number')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="shirt_size" class="form-label">Shirt Size</label>
                                        <select class="form-control form-select" id="shirt_size" name="shirt_size">
                                            <option value="" selected>Select shirt size</option>
                                            <option value="S" {{ old('shirt_size') == 'S' ? 'selected' : '' }}>S</option>
                                            <option value="M" {{ old('shirt_size') == 'M' ? 'selected' : '' }}>M</option>
                                            <option value="L" {{ old('shirt_size') == 'L' ? 'selected' : '' }}>L</option>
                                            <option value="XL" {{ old('shirt_size') == 'XL' ? 'selected' : '' }}>XL</option>
                                            <option value="2XL" {{ old('shirt_size') == '2XL' ? 'selected' : '' }}>2XL</option>
                                        </select>
                                        @error('shirt_size')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="image_path" class="form-label">Image</label>
                                        <input type="file" class="form-control form-control-user" id="image_path" name="image_path" required>
                                        @error('image_path')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="company_name" class="form-label">Company Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-user" id="company_name" name="company_name" value="{{ old('company_name') }}" required>
                                        @error('company_name')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="arrival_date" class="form-label">Arrival Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control form-control-user" id="arrival_date" name="arrival_date" value="{{ old('arrival_date') }}" required>
                                        @error('arrival_date')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="departure_date" class="form-label">Departure Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control form-control-user" id="departure_date" name="departure_date" value="{{ old('departure_date') }}" required>
                                        @error('departure_date')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="bed_preference" class="form-label">Bed Preference <span class="text-danger">*</span></label>
                                        <select class="form-control form-select" id="bed_preference" name="bed_preference">
                                            <option value="" selected>Select bed preference</option>
                                            <option value="1" {{ old('bed_preference') == '1' ? 'selected' : '' }}>Double</option>
                                            <option value="0" {{ old('bed_preference') == '0' ? 'selected' : '' }}>Single</option>
                                        </select>
                                        @error('bed_preference')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="team_id" class="form-label">Team <span class="text-danger">*</span></label>
                                        <select class="form-control form-select" id="team_id" name="team_id">
                                            <option value="" selected>Select Team from List</option>
                                            @for ($i = 0; $i < count($teams); $i++)
                                                <option value="{{$teams[$i]->id}}" {{ old('team_id') == $teams[$i]->id ? 'selected' : '' }}>{{$teams[$i]->name}}</option>
                                            @endfor
                                        </select>
                                        @error('team_id')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
                                        </div>
                                        @enderror

                                    </div>
                                    <div class="col-6">
                                        <label for="is_active" class="form-label">User Status <span class="text-danger">*</span></label>
                                        <select class="form-control form-select" id="is_active" name="is_active">
                                            <option value="1" selected>Active</option>
                                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Non-Active</option>
                                        </select>
                                        @error('is_active')
                                        <div class="text-danger is-invalid">
                                            {{$message}}
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