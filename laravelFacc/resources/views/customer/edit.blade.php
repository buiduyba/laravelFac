@extends('master')
@section('title')
    Cập nhật khách hàng: {{ $customer->name }}
@endsection
@section('content')
    <h1>
        Cập nhật khách hàng: {{ $customer->name }}
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
        <form method="POST" action="{{ route('customer.update', $customer) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label for="name" class="col-4 col-form-label">Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="name" id="name" value="{{ $customer->name }}"
                        placeholder="Name" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="address" class="col-4 col-form-label">Address</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="address" id="address"
                        value="{{ $customer->address }}" placeholder="Address" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="phone" class="col-4 col-form-label">Phone</label>
                <div class="col-8">
                    <input type="phone" class="form-control" name="phone" id="phone" value="{{ $customer->phone }}"
                        placeholder="Phone" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" id="email" value="{{ $customer->email }}"
                        placeholder="email" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="is_active" class="col-4 col-form-label">Is Active</label>
                <div class="col-8">
                    <input type="checkbox" class="form-checkbox" @checked($customer->is_active) value="1"
                        name="is_active" id="is_active" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="avatar" class="col-4 col-form-label">Avatar</label>
                <div class="col-8">
                    <input type="file" class="form-control" name="avatar" id="avatar" />

                    @if ($customer->avatar)
                        <img src="{{ Storage::url($customer->avatar) }}" width="100px">
                    @endif
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
