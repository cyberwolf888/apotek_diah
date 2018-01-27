@extends('layouts.backend')

@push('plugin_css')
@endpush

@push('page_css')
@endpush

@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Service
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
            <a href="{{ route('backend.pembelian.manage') }}">Pembelian</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Detail Pembelian</span>
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
                        <span class="caption-subject bold uppercase"> Detail Pembelian</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <table class="table table-bordered m-n" cellspacing="0">
                        <tbody>
                        <tr>
                            <td>
                                <h4><small>Nama Suplier</small></h4>
                                <h4>{{ $model->suplier->nama }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Tgl Pembelian</small></h4>
                                <h4>{{ date('d/m/Y',strtotime($model->tgl)) }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>No Faktur</small></h4>
                                <h4>{{ $model->faktur }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Total</small></h4>
                                <h4>{{ number_format($model->total,0,',','.') }}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4><small>Keterangan</small></h4>
                                <h4>{{ $model->keterangan }}</h4>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Detail Item </span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <table class="table table-bordered m-n" cellspacing="0">
                        <tbody>
                        @foreach($model->detail as $detail)
                        <tr>
                            <td>
                                <h4><small>{{ $detail->item->nama }}</small></h4>
                                <h4>{{ $detail->qty }}</h4>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->

@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush