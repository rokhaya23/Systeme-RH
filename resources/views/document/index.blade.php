@extends('layout.base')

@section('title', 'Document')

@section('content')
    <div class="file-body">
        <div class="file-scroll">
            <div class="file-content-inner">
                <h4>Electronic Documents</h4>
                <div class="row row-sm">
                    <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                        <div class="card card-file">
                            <div class="card-file-thumb">
                                <i class="fa fa-file-pdf-o"></i>
                            </div>
                            <div class="card-body">
                                <h6><a href="{{ route('documents.attestation') }}" target="_blank">Work Certificate</a></h6>
                                <span>10.45kb</span>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('documents.attestation') }}" target="_blank">
                                    <button type="button" class="btn btn-rounded btn-warning">
                                        <span class="btn-icon-left text-warning">
                                            <i class="fa fa-eye color-warning"></i>
                                        </span>
                                        View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                        <div class="card card-file">
                            <div class="card-file-thumb">
                                <i class="fa fa-file-pdf-o"></i>
                            </div>
                            <div class="card-body">
                                <h6><a href="{{ route('documents.contrat') }}" target="_blank">Employment Contract</a></h6>
                                <span>10.45kb</span>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('documents.contrat') }}" target="_blank">
                                    <button type="button" class="btn btn-rounded btn-warning">
                                        <span class="btn-icon-left text-warning">
                                            <i class="fa fa-eye color-warning"></i>
                                        </span>
                                        View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                        <div class="card card-file">
                            <div class="card-file-thumb">
                                <i class="fa fa-file-pdf-o"></i>
                            </div>
                            <div class="card-body">
                                <h6><a href="{{ route('documents.conge') }}" target="_blank">Leave Request</a></h6>
                                <span>10.45kb</span>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('documents.conge') }}" target="_blank">
                                    <button type="button" class="btn btn-rounded btn-warning">
                                        <span class="btn-icon-left text-warning">
                                            <i class="fa fa-eye color-warning"></i>
                                        </span>
                                        View
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
