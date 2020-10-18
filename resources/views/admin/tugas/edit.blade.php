@extends('admin.layout.master')
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
                    <li><a href="#">Forms</a></li>
                    <li class="active">{{ $pagename }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row">

            <!--/.col-->
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <strong>{{ $pagename }}</strong>
                    </div>
                    <div class="card-body card-block">

                        <form action="{{ route('tugas.update', $data->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="nama_tugas" placeholder="Text" class="form-control" value="{{ $data->nama_tugas }}"></div>
                            </div>
                          
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Kategori</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="kategori_tugas" id="select" class="form-control">

                                        @foreach($data_kategori as $kategori)
                                            <option value="{{ $kategori->id }}"
                                                @if($kategori->id == $data->id)
                                                    selected
                                                @endif
                                            >
                                            {{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Keterangan</label></div>
                                <div class="col-12 col-md-9"><textarea name="ket_tugas" id="textarea-input" rows="9" placeholder="Text..." class="form-control">{{ $data->ket_tugas }}</textarea></div>
                            </div>
                              
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="radio">
                                            <label for="radio1" class="form-check-label ">
                                                <input type="radio" id="radio1" name="status_tugas" value="0"  class="form-check-input" {{ $data->status_tugas == 0?'checked':'' }}>Belum Selesai
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radio2" class="form-check-label ">
                                                <input type="radio" id="radio2" name="status_tugas" value="1" class="form-check-input" {{ $data->status_tugas == 1?'checked':'' }}>Selesai
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>
                   
                </div>

            </div>
        </div>                                           
    </div><!-- .animated -->
</div><!-- .content -->

@endsection

@section('js')
    <script src="{{ asset('public/admin/vendors/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/admin/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js') }}"></script>
@endsection