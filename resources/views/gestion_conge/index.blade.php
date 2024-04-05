@extends('layout.base')

@section('title', 'List of Leaves')

@section('content')
    <div class="project-nav">
        <div class="card-action card-tabs  mr-auto mb-md-0 mb-3">
            <ul class="nav nav-tabs style-2">
                <li class="nav-item">
                    <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">All Leave Category <span class="badge badge-primary shadow-primary">154</span></a>
                </li>
            </ul>
        </div>


        <div class="d-flex align-items-center">
            <a href="javascript:void(0);" id="btn-add-contact" data-toggle="modal" data-target="#addContactModal" class="btn btn-primary text-white">+ Add a Category</a>
        </div>
    </div>
    <!-- Modal creation employee-->
    <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeModalTitle">Add Leave</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('conges.store') }}" enctype="multipart/form-data">
                                @csrf
                                    @method('POST')

                                <div class="mb-3 row">
                                    <label for="type_conge" class="col-md-4 col-form-label text-md-end text-start">Leave Type</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('type_conge') is-invalid @enderror" id="type_conge" name="type_conge" value="{{ $conge->type_conge }}" required>
                                        @if ($errors->has('type_conge'))
                                            <span class="text-danger">{{ $errors->first('type_conge') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="paiement" class="col-md-4 col-form-label text-md-end text-start">Payment</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="paiement" name="paiement" required>
                                            <option value="paid" {{ old('paiement', $conge->paiement) === 'paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="unpaid" {{ old('paiement', $conge->paiement) === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                        </select>
                                        @if ($errors->has('paiement'))
                                            <span class="text-danger">{{ $errors->first('paiement') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="jours_autorise" class="col-md-4 col-form-label text-md-end text-start">Allowed Days</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control @error('jours_autorise') is-invalid @enderror" id="jours_autorise" name="jours_autorise" value="{{ $conge->jours_autorise }}" required>
                                        @if ($errors->has('jours_autorise'))
                                            <span class="text-danger">{{ $errors->first('jours_autorise') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" data-dismiss="modal"> <i class="flaticon-delete-1"></i> Close</button>
                                    <button id="btn-add" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Listes demande de congé -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Leave List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                        <tr>
                            <th><strong>ROLL NO.</strong></th>
                            <th><strong>Leave Type</strong></th>
                            <th><strong>Payment</strong></th>
                            <th><strong>Allowed Days</strong></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($conges as $conge)
                            <tr>
                                <td>{{ $conge->id }}</td>
                                <td>{{ $conge->type_conge }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-circle {{ $conge->paiement === 'paid' ? 'text-success' : 'text-warning' }} mr-1"></i>
                                        <span>{{ $conge->paiement }}</span>
                                    </div>
                                </td>

                                <td>{{ $conge->jours_autorise }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want to delete this leave?');"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
