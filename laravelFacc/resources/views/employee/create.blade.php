@extends('master')
@section('title')
   Thêm mới nhân viên
@endsection
@section('content')
    <h1>
        Thêm mới nhân viên
    </h1>

    @if (session()->has('success') && !session()->get('succcess'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    @if (session()->has('success') && session()->get('succcess'))
        <div class="alert alert-info">
            Thao tác thành công
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 row">
                <label for="first_name" class="col-4 col-form-label">First Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="first_name" id="first_name"
                        value="{{ old('first_name') }}" placeholder="First Name" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="last_name" class="col-4 col-form-label">Last Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="last_name" id="last_name"
                        value="{{ old('last_name') }}" placeholder="Last Name" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" id="email"
                        value="{{ old('email') }}" placeholder="Email" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="phone" class="col-4 col-form-label">Phone</label>
                <div class="col-8">
                    <input type="phone" class="form-control" name="phone" id="phone"
                        value="{{ old('phone') }}" placeholder="Phone" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="date_of_birth" class="col-4 col-form-label">Date</label>
                <div class="col-8">
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                        value="{{ old('date_of_birth') }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="hire_date" class="col-4 col-form-label">Hire Date</label>
                <div class="col-8">
                    <input type="date" class="form-control" name="hire_date" id="hire_date"
                        value="{{ old('hire_date') }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="salary" class="col-4 col-form-label">Salary</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="salary" id="salary"
                        value="{{ old('salary') }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="is_active" class="col-4 col-form-label">Is Active</label>
                <div class="col-8">
                    <input type="checkbox" class="form-checkbox" value="1"
                        name="is_active" id="is_active" />
                </div>
            </div>

            <div class="mb-3">
                <label for="department_id" class="col-4 col-form-label">Department_id</label>
                <select class="form-select form-select-lg" name="department_id" id="department_id">
                    <option selected>Select one</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            
            <div class="mb-3 row">
                <label for="manager_id" class="col-4 col-form-label">Manager_id</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="manager_id" id="manager_id"
                        value="{{ old('manager_id') }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="address" class="col-4 col-form-label">Address</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="address" id="address"
                        value="{{ old('address') }}" placeholder="Address" />
                </div>
            </div>


            <div class="mb-3 row">
                <label for="profile_picture" class="col-4 col-form-label">Avatar</label>
                <div class="col-8">
                    <input type="file" class="form-control" name="profile_picture" id="profile_picture" />
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
