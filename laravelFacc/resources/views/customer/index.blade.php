@extends('master')
@section('title')
    Danh sách khách hàng
@endsection
@section('content')
    Danh sách khách hàng

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

    <a class="btn btn-info" href="{{ route('customer.create') }}">Create</a>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">EMAOL</th>
                    <th scope="col">IS_ACTIVE</th>
                    <th scope="col">CREATED_AT</th>
                    <th scope="col">UPDATED_AT</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $customer)
                    <tr class="">
                        <td scope="row">{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            @if ($customer->avatar)
                                <img src="{{ Storage::url($customer->avatar) }}" width="100px">
                            @endif
                        </td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            @if ($customer->is_active)
                                <span class="badge bg-primary">Yes</span>
                            @else
                                <span class="badge bg-danger">No</span>
                            @endif
                        </td>
                        <td>{{ $customer->created_at }}</td>
                        <td>{{ $customer->updated_at }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('customer.show', $customer) }}">Show</a>
                            <a class="btn btn-warning" href="{{ route('customer.edit', $customer) }}">Edit</a>

                            <form action="{{ route('customer.destroy', $customer) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Xóa
                                    mềm</button>
                            </form>

                            <form action="{{ route('customer.forceDestroy', $customer) }}" method="post">
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
