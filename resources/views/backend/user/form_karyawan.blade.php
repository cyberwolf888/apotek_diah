@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
@endpush

@push('page_css')

@endpush

@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Karyawan
                <small>Add New Data</small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('backend.dashboard') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('backend.user.karyawan.manage') }}">Karyawan</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Add New Data</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Form Karyawan</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    {!! Form::open(['route' => isset($update) ? ['backend.user.karyawan.update', $model->id] : 'backend.user.karyawan.store', 'files' => true]) !!}
                    <div class="form-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-block alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                <h4 class="alert-heading">Ooppss ada error.</h4>
                                @foreach ($errors->all() as $error)
                                    <p><i class="fa fa-close font-red-mint"></i>&nbsp;{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="nama">Nama Lengkap</label>
                            {!! Form::text('name', $model->name, ['id'=>'name','placeholder'=>'','class'=>'form-control', 'required']) !!}
                        </div>

                        <div class="form-group {{ $errors->has('telp') ? ' has-error' : '' }}">
                            <label for="merek">Nomer Telp</label>
                            {!! Form::text('telp', $model->telp, ['id'=>'telp','placeholder'=>'','class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email</label>
                            {!! Form::email('email', $model->email, ['id'=>'email','placeholder'=>'','class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address">Alamat</label>
                            {!! Form::text('address', $model->address, ['id'=>'address','placeholder'=>'','class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            {!! Form::password('password', ['id'=>'password','placeholder'=>'','class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation">Password Confirmation</label>
                            {!! Form::password('password_confirmation', ['id'=>'password_confirmation','placeholder'=>'','class'=>'form-control', 'required']) !!}

                        </div>

                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status">Status</label>
                            {!! Form::select('status', ['1'=>'Aktif','0'=>'Tidak Aktif'], $model->isActive,['id'=>'status','placeholder'=>'','class'=>'form-control', 'required']) !!}

                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">Simpan</button>
                        <button type="button" class="btn red" onclick="window.location = '{{ route('backend.user.karyawan.manage') }}';">Back</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endpush

@push('scripts')
@endpush