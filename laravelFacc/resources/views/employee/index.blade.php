@extends('master')
@section('title')
    Danh sách nhân viên
@endsection
@section('content')
    Danh sách nhân viên

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

    <a class="btn btn-info" href="{{ route('employee.create') }}">Create</a>
    <div class="table-responsive">
        <table class="table table-secondary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FIRST NAME</th>
                    <th scope="col">LAST NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">DATE_OF_BIRTH</th>
                    <th scope="col">HIRE_DATE</th>
                    <th scope="col">SALARY</th>
                    <th scope="col">IS_ACTIVE</th>
                    <th scope="col">DEPARTMENT_ID</th>
                    <th scope="col">MANAGER_ID</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">UPDATED_AT</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $employee)
                    <tr class="">
                        <td scope="row">{{ $employee->id }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>    
                        <td>{{ $employee->date_of_birth }}</td>
                        <td>{{ $employee->hire_date }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>
                            @if ($employee->is_active)
                                <span class="badge bg-primary">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $employee->department_id }}</td>
                        <td>{{ $employee->manager_id }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>
                            @if ($employee->profile_picture)
                                <img src="{{ Storage::url($employee->profile_picture) }}" width="100px">
                            @endif
                        </td>
                        <td>{{ $employee->created_at }}</td>
                        <td>{{ $employee->updated_at }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('employee.show', $employee) }}">Show</a>
                            <a class="btn btn-warning" href="{{ route('employee.edit', $employee) }}">Edit</a>

                            <form action="{{ route('employee.destroy', $employee) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Xóa
                                    mềm</button>
                            </form>

                            <form action="{{ route('employee.forceDestroy', $employee) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark" onclick="return confirm('Are you sure?')">Xóa
                                    cứng</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{ $data->links() }}
    </div>
@endsection
