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
                        <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="nama_kategori" placeholder="Text" value="{{ old('nama_kategori') }}" class="form-control @error('nama_kategori') is-invalid @enderror">
                                @error('nama_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                
                            </div>
                            
                            <div class="row form-group {{ $errors->has('status_kategori') ? ' has-error' : '' }}">
                                <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="radio">
                                            <label for="radio1" class="form-check-label ">
                                                <input type="radio" id="radio1" name="status_kategori" value="0" class="form-check-input">Non Aktif
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="radio2" class="form-check-label ">
                                                <input type="radio" id="radio2" name="status_kategori" value="1" class="form-check-input">Aktif
                                            </label>
                                        </div>
                                        @if ($errors->has('status_kategori'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('status_kategori') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Simpan
                                </button>
                                <a class="btn btn-danger btn-sm" href="{{ url()->previous() }}">
                                    <i class="fa fa-ban"></i> Cancel
                                </a>
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