@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tài khoản</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Table tài khoản</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a href="{{ route('user.create') }}">
                                            <button type="submit" class="btn btn-default">

                                                <i class="far fa-plus-square"></i>
                                                <span style="padding-left: 5px">
                                                    Thêm tài khoản</span>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (!empty($data[0]))
                                    <table class="table table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Giới tính</th>
                                                <th>Số điện thoại</th>
                                                <th>Ngày sinh</th>
                                                <th>Ảnh đại diện</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $stt = ($data->currentPage() - 1) * $data->perPage();
                                        @endphp
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ ++$stt }}</td>
                                                    <td>{{ $item->userDetail->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->userDetail->gender == 0 ? 'Nữ' : 'Nam' }}</td>
                                                    <td>{{ $item->userDetail->number_phone }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($item->userDetail->birthday)) }}</td>
                                                    <td><img height="150px" src="Avatar/{{ $item->userDetail->avatar }}"
                                                            alt=""></td>
                                                    <td>
                                                        <div
                                                            style="display: flex; justify-content: space-around; align-items: center;">
                                                            <a href="{{ route('user.edit', $item->id) }}"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <form action="{{ route('user.destroy', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    style="background: transparent; border:0px; padding: 0px; margin:0px;">
                                                                    <i class="fas fa-trash"
                                                                        style="color: rgb(255, 0, 0);"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer clearfix" style="display: flex; justify-content: flex-end;">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
