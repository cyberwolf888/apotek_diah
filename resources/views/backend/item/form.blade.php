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
            <h1>Item
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
            <a href="{{ route('backend.item.manage') }}">Item</a>
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
                        <span class="caption-subject bold uppercase"> Form Item</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    {!! Form::open(['route' => isset($update) ? ['backend.item.update', $model->id] : 'backend.item.store', 'files' => true]) !!}
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

                        <div class="form-group last">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    @if(isset($update))
                                    <img src="{{ url('assets/img/items/'.$model->gambar) }}" alt="" /> </div>
                                    @else
                                    <img src="{{ url('assets') }}/backend/global/img/no_image.png" alt="" /> </div>
                                    @endif
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Select image </span>
                                                        <span class="fileinput-exists"> Change </span>
                                                        <input type="file" name="image"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input {{ $errors->has('nama') ? ' has-error' : '' }}">
                            {!! Form::text('nama', $model->nama, ['id'=>'nama','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="nama">Nama Item</label>
                        </div>
                        <div class="form-group form-md-line-input {{ $errors->has('satuan_id') ? ' has-error' : '' }}">
                            {!! Form::select('satuan_id', \App\Models\Satuan::where('status','1')->pluck('nama','id'), $model->satuan_id,['id'=>'satuan_id','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="satuan_id">Satuan</label>
                        </div>
                        <div class="form-group form-md-line-input {{ $errors->has('stock') ? ' has-error' : '' }}">
                            {!! Form::number('stock', $model->stock, ['id'=>'stock','placeholder'=>'','class'=>'form-control', 'min'=>0, 'required']) !!}
                            <label for="stock">Stock</label>
                        </div>
                        <div class="form-group form-md-line-input {{ $errors->has('harga') ? ' has-error' : '' }}">
                            {!! Form::number('harga', $model->harga, ['id'=>'harga','placeholder'=>'','class'=>'form-control', 'min'=>0, 'required']) !!}
                            <label for="harga">Harga</label>
                        </div>
                        <div class="form-group form-md-line-input {{ $errors->has('jenis') ? ' has-error' : '' }}">
                            {!! Form::select('jenis', ['1'=>'Obat','0'=>'Peralatan Medis'], $model->jenis,['id'=>'jenis','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="jenis">Jenis</label>
                        </div>



                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">Simpan</button>
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