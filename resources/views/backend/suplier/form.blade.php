@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('page_css')
@endpush

@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Satuan
                <small>Kelola</small>
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
            <a href="{{ route('backend.suplier.manage') }}">Suplier</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Form</span>
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
                        <span class="caption-subject bold uppercase"> Form Suplier</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    {!! Form::open(['route' => isset($update) ? ['backend.suplier.update', $model->id] : 'backend.suplier.store', 'files' => true]) !!}
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


                        <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="penerima">Nama Suplier</label>
                            {!! Form::text('nama', $model->nama, ['id'=>'nama','placeholder'=>'','class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="alamat">Alamat</label>
                            {!! Form::text('alamat', $model->alamat, ['id'=>'alamat','placeholder'=>'','class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="telp">Telp</label>
                            {!! Form::text('telp', $model->telp, ['id'=>'telp','placeholder'=>'','class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status">Status</label>
                            {!! Form::select('status', ['1'=>'Aktif','0'=>'Tidak Aktif'], $model->status,['id'=>'status','placeholder'=>'','class'=>'form-control', 'required']) !!}
                        </div>


                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">Simpan</button>
                        <button type="button" class="btn red" onclick="window.location = '{{ route('backend.suplier.manage') }}';">Back</button>
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
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
@endpush

@push('scripts')
<script>
    jQuery(document).ready(function(){
        jQuery().datepicker&&$(".date-picker").datepicker({
            format: 'dd-mm-yyyy',
            orientation:"left",
            autoclose:!0
        });
        $(document).scroll(function(){$(".date-picker").datepicker("place")});
    });

</script>
@endpush