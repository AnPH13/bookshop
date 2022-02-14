@php
$list = config('table.list.invoice');
@endphp
@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Home</h1>
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
                                <h3 class="card-title">Table invoice</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a href="{{ route('invoice.create') }}">
                                            <button type="submit" class="btn btn-default">

                                                <i class="far fa-plus-square"></i>
                                                <span style="padding-left: 5px">
                                                    Thêm invoice</span>
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
                                                @foreach ($translate['name-colum'] as $item)
                                                    <th>{{ $item }}</th>
                                                @endforeach
                                                @foreach ($translate['foreign'] as $item)
                                                    <th>{{ $item }}</th>
                                                @endforeach
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
                                                    @foreach ($translate['name-colum'] as $key => $value)
                                                        @if ($key == 'status')
                                                            <td>{{ $list['status'][$item->$key] }}</td>
                                                        @elseif($key == 'payment_methods')
                                                            <td>{{ $list['payment_methods'][$item->$key] }}</td>
                                                        @else
                                                            <td>{{ $item->$key }}</td>
                                                        @endif
                                                    @endforeach
                                                    @foreach ($translate['foreign'] as $key => $value)
                                                        <td>{{ $item->user->$key }}</td>
                                                    @endforeach
                                                    <td>
                                                        <div
                                                            style="display: flex; justify-content: space-around; align-items: center;">
                                                            <a href="{{ route('invoice-detail.show', $item->id) }}">xem chi tiết</a>
                                                            <a href="{{ route('invoice.edit', $item->id) }}"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <form action="{{ route('invoice.destroy', $item->id) }}"
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