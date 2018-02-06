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
            <a href="{{ route('backend.penjualan.manage') }}">Penjualan</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Form</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        {!! Form::open(['route' => isset($update) ? ['backend.penjualan.update', $model->id] : 'backend.penjualan.store', 'files' => true]) !!}
        <div class="col-md-7 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Form Penjualan</span>
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

                        <div class="form-group {{ $errors->has('keterangan') ? ' has-error' : '' }}">
                            <label for="keterangan">Keterangan</label>
                            {!! Form::textArea('keterangan', $model->keterangan, ['id'=>'keterangan','placeholder'=>'','class'=>'form-control','rows'=>'5']) !!}
                        </div>

                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">Simpan</button>
                        <button type="button" class="btn red" onclick="window.location = '{{ route('backend.penjualan.manage') }}';">Back</button>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-5 ">

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
                                        <button type="button" class="btn btn-circle green add_field_button"><i class="fa fa-plus"></i> Tambah Item</button>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered m-n" cellspacing="0">
                                            <tbody id="tbody">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                       <h4 id="txt_total"> Total : 0 </h4>
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

    <div id="responsive" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Select2 Demo In Modal</h4>
                </div>
                <div class="modal-body">
                    <form action="#" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-md-4">Items</label>
                            <div class="col-md-8">
                                <div class="input-group select2-bootstrap-prepend">
                                    {!! Form::select('item_id', \App\Models\Item::pluck('nama','id'), null,['id'=>'item_id','placeholder'=>'','class'=>'form-control select2-allow-clear', 'required']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Qty</label>
                            <div class="col-md-8">
                                <div class="input-group select2-bootstrap-append">
                                    {!! Form::number('qty', null, ['id'=>'qty','min'=>0,'class'=>'form-control', 'required']) !!}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Tutup</button>
                    <button type="button" class="btn green" id="btn_tambah_item">Tambah Item</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
@endpush

@push('scripts')
    <script src="{{ url('assets') }}/backend/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <script>
        var _token = $("input[name='_token']").val();
        jQuery(document).ready(function(){
            jQuery().datepicker&&$(".date-picker").datepicker({
                format: 'dd-mm-yyyy',
                orientation:"left",
                autoclose:!0
            });
            $(document).scroll(function(){$(".date-picker").datepicker("place")});

            $(".add_field_button").click(function(){
                $('#responsive').modal('show');
            });

            $("#btn_tambah_item").click(function(){
                var item_id = $("#item_id").val();
                var qty = $("#qty").val();
                if(item_id == ""){
                    alert('Silakan pilih item');
                    return false;
                }
                if(qty == ""){
                    alert('Silakan masukan qty yang diinginkan');
                    return false;
                }
                $.ajax({
                    url: "<?= route('backend.penjualan.add_item') ?>",
                    type:'POST',
                    data: {_token:_token, item_id:item_id, qty:qty},
                    success: function(data) {
                        if(data.status == '0'){
                            alert('Stock yang tersisa hanya '+data.stock);
                            return false;
                        }
                        if(data.status == '1'){
                            $('#tbody').append('<tr>' +
                                '<td>' +
                                '<h4>'+ data.item.nama +'</h4>' +
                                '<h4><small>Harga: '+ data.item.harga +'</small></h4>' +
                                '<h4><small>Qty: '+ data.qty +'</small></h4>' +
                                '<h4><small>Total: '+  data.item.harga*data.qty +'</small></h4>' +
                                '</td>' +
                                '</tr>');

                            $("#txt_total").empty().html('Total : ' + data.total);
                            $('#responsive').modal('hide');
                        }
                    }
                });
            });
        });
    </script>
@endpush