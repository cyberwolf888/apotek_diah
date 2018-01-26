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
            <h1>Pembelian
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
            <a href="{{ route('backend.pembelian.manage') }}">Pembelian</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Form</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        {!! Form::open(['route' => isset($update) ? ['backend.pembelian.update', $model->id] : 'backend.pembelian.store', 'files' => true]) !!}
        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Form Pembelian</span>
                    </div>
                </div>

                <div class="portlet-body form">

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

                        <div class="form-group form-md-line-input {{ $errors->has('suplier_id') ? ' has-error' : '' }}">
                            {!! Form::select('suplier_id', \App\Models\Suplier::where('status','1')->pluck('nama','id'), $model->suplier_id,['id'=>'suplier_id','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="suplier_id">Suplier</label>
                        </div>
                        <div class="form-group form-md-line-input {{ $errors->has('faktur') ? ' has-error' : '' }}">
                            {!! Form::text('faktur', $model->faktur, ['id'=>'faktur','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="faktur">Faktur Pembelian</label>
                        </div>
                        <div class="form-group form-md-line-input {{ $errors->has('total') ? ' has-error' : '' }}">
                            {!! Form::text('total', $model->total, ['id'=>'total','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="total">Total Pembelian</label>
                        </div>
                        <div class="form-group form-md-line-input {{ $errors->has('keterangan') ? ' has-error' : '' }}">
                            {!! Form::text('keterangan', $model->keterangan, ['id'=>'keterangan','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="keterangan">Keterangan</label>
                        </div>

                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">Simpan</button>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Detail Pembelian</span>
                    </div>
                </div>

                <div class="portlet-body form">

                    <div class="form-body">



                    </div>

                </div>
            </div>

        </div>
        </form>
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