@extends('master')
@section('title')
    Xem chi tiết khách hàng ID: {{ $employee->id }}
@endsection
@section('content')
    <h1>
        Xem chi tiết khách hàng ID: {{ $employee->id }}
    </h1>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Tên trường</th>
                    <th scope="col">Giá trị</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employee->toArray() as $key => $value)
                    <tr class="">
                        <td scope="row">{{ strtoupper($key) }}</td>
                        <td>
                            @php
                                switch ($key) {
                                    case 'profile_picture':
                                        if ($employee->profile_picture) {
                                            $url = Storage::url($value);
                                            echo " <img src='$url' width='100px'> ";
                                        }
                                        break;
                                    case 'is_active':
                                        echo $value
                                            ? ' <span class="badge bg-primary">Active</span>'
                                            : ' <span class="badge bg-danger">Inactive</span>';
                                        break;
                                    default:
                                        echo $value;
                                        break;
                                }
                            @endphp
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
