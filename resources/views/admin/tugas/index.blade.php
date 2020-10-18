@extends('admin.layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('public/admin/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">{{ $pagename }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">{{ $pagename }}</strong>
                            </div>
                            @if ($message = Session::get('status'))
                            <div class="alert alert-success alert-block">
                                {{ $message }}
                            </div>
                            @endif
                            @if ($message = Session::get('delete'))
                            <div class="alert alert-danger alert-block">
                                {{ $message }}
                            </div>
                            @endif
                            <div class="card-body">
                                <a href="{{ url('admin/tugas/create') }}" class="btn btn-primary mb-3">Tambah</a>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $i=>$row)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $row->nama_tugas }}</td>
                                            <td>{{ $row->id_kategori }}</td>
                                            <td>{{ $row->ket_tugas }}</td>
                                            @if($row->status_tugas == 0)
                                                <td>Belum Selesai</td>
                                            @else
                                                <td>Selesai</td>
                                            @endif
                                            <td>
                                                <div class="text-center" style="font-size: 20px;">
                                                    <a href="{{ route('tugas.edit', $row->id) }}" class="mx-1 badge badge-warning">
                                                        edit
                                                    </a>
                                                    <form action="{{ route('tugas.destroy', $row->id) }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                        <button type="submit" onclick="return confirm('Are you sure to delete?')" class="text-danger badge" style="cursor: pointer;">delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

@endsection

@section('js')
        <script src="{{ asset('public/admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('public/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('public/admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('public/admin/vendors/jszip/dist/jszip.min.js') }}"></script>
        <script src="{{ asset('public/admin/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
        <script src="{{ asset('public/admin/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
        <script src="{{ asset('public/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('public/admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('public/admin/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>
@endsection