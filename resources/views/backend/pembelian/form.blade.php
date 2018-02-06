@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('assets') }}/backend/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('assets') }}/backend/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
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
        <div class="col-md-4 ">

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

                        <div class="form-group {{ $errors->has('suplier_id') ? ' has-error' : '' }}">
                            <label for="suplier_id">Suplier</label>
                            {!! Form::select('suplier_id', \App\Models\Suplier::where('status','1')->pluck('nama','id'), $model->suplier_id,['id'=>'suplier_id','placeholder'=>'','class'=>'form-control select2', 'required']) !!}
                        </div>
                        <div class="form-group {{ $errors->has('tgl') ? ' has-error' : '' }}">
                            <label for="tgl">Tanggal Pembelian</label>
                            {!! Form::text('tgl', $model->tgl, ['id'=>'tgl','placeholder'=>'','class'=>'form-control date-picker', 'required', 'readonly']) !!}
                        </div>
                        <div class="form-group {{ $errors->has('faktur') ? ' has-error' : '' }}">
                            <label for="faktur">Faktur Pembelian</label>
                            {!! Form::text('faktur', $model->faktur, ['id'=>'faktur','placeholder'=>'','class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group {{ $errors->has('total') ? ' has-error' : '' }}">
                            <label for="total">Total Pembelian</label>
                            {!! Form::text('total', $model->total, ['id'=>'total','placeholder'=>'','class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
                            <label for="keterangan">Keterangan</label>
                            {!! Form::text('keterangan', $model->keterangan, ['id'=>'keterangan','placeholder'=>'','class'=>'form-control']) !!}
                        </div>

                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">Simpan</button>
                        <button type="button" class="btn red" onclick="window.location = '{{ route('backend.pembelian.manage') }}';">Back</button>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-8 ">

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
                        @if(!isset($update))
                            <div class="input_fields_wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-circle green add_field_button"><i class="fa fa-plus"></i> Tambah Isian</button>
                                </div>
                            </div>
                                <br><br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Item</label>
                                        {!! Form::select('item_id[]', \App\Models\Item::pluck('nama','id'), null,['placeholder'=>'','class'=>'form-control select2', 'required']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="qty">Qty</label>
                                        {!! Form::number('qty[]', null, ['min'=>0,'class'=>'form-control', 'required']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="qty">Harga</label>
                                        {!! Form::number('harga[]', null, ['min'=>0,'class'=>'form-control', 'required']) !!}
                                    </div>
                                </div>
                            </div>
                            </div>
                        @else

                        @endif


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
<script src="{{ url('assets') }}/backend/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

@endpush

@push('scripts')
    <script>

        $(document).ready(function() {
            $('.select2').select2();
            jQuery().datepicker&&$(".date-picker").datepicker({
                format: 'dd-mm-yyyy',
                orientation:"left",
                autoclose:!0
            });
            $(document).scroll(function(){$(".date-picker").datepicker("place")});

            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="row">' +
                        '<div class="col-md-5">' +
                            '<div class="form-group">' +
                                '<label for="">Item</label>' +
                                '<?php echo Form::select('item_id[]', \App\Models\Item::pluck('nama','id'), null,['placeholder'=>'','class'=>'form-control select2', 'required']); ?>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-md-3">' +
                            '<div class="form-group">' +
                                '<label for="qty">Qty</label>' +
                                '<?php echo Form::number('qty[]', null, ['min'=>0,'class'=>'form-control', 'required']); ?>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-md-3">' +
                            '<div class="form-group">' +
                                '<label for="harga">Harga</label>' +
                                '<?php echo Form::number('harga[]', null, ['min'=>0,'class'=>'form-control', 'required']); ?>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-md-1">' +
                            '<button type="button" class="btn red-soft btn-xs remove_field"><i class="fa fa-trash"></i></button>'+
                        '</div>'+
                        '</div>' ); //add input box
                    $('.select2').select2();
                }
            });
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
            })
        });
    </script>
@endpush