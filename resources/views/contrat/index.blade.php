@extends('layout.base')

@section('title', 'List of Contracts')

@section('content')
    <div class="project-nav">
        <div class="card-action card-tabs  mr-auto mb-md-0 mb-3">
            <ul class="nav nav-tabs style-2">
                <li class="nav-item">
                    <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">All Contract <span class="badge badge-primary shadow-primary">154</span></a>
                </li>
            </ul>
        </div>


        <div class="d-flex align-items-center">
            <a href="javascript:void(0);" id="btn-add-contract" data-toggle="modal" data-target="#addContractModal" class="btn btn-primary text-white">+ New Contract</a>
        </div>
    </div>
    <!-- Modal creation employee-->
    <div class="modal fade" id="addContractModal" tabindex="-1" role="dialog" aria-labelledby="addContractModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeModalTitle">Add Contract</h5>
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
                            <form method="post" action="{{ route('contrats.store') }}" enctype="multipart/form-data">
                                @csrf
                                @method('post')

                                <div class="form-group">
                                    <label for="employee">Employee:</label>
                                    <select class="form-control" id="employee" name="idEmployee">
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ $employee->id == $contrat->idEmployee ? 'selected' : '' }}>{{ $employee->prenom }} {{ $employee->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="type_contrat">Contract Type:</label>
                                    <select class="form-control" id="type_contrat" name="type_contrat">
                                        <option>----choose contract----</option>
                                        <option value="CDD" {{ $contrat->type_contrat === 'CDD' ? 'selected' : '' }}>CDD</option>
                                        <option value="CDI" {{ $contrat->type_contrat === 'CDI' ? 'selected' : '' }}>CDI</option>
                                        <!-- Ajoutez d'autres options au besoin -->
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="date_debut">Start Date:</label>
                                    <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ $contrat->date_debut }}">
                                </div>

                                <div class="form-group">
                                    <label for="date_fin">End Date:</label>
                                    <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ $contrat->date_fin }}" {{ $contrat->type_contrat === 'CDI' ? 'disabled' : '' }}>
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

    <!-- Listes contract -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Contract List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                        <tr>
                            <th><strong>Employee</strong></th>
                            <th><strong>Contract Type</strong></th>
                            <th><strong>Start Date</strong></th>
                            <th><strong>End Date</strong></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contrats as $contract)
                            <tr>
                                <td>{{ $contract->employee->nom }} {{ $contract->employee->prenom }}</td>
                                <td>{{ $contract->type_contrat }}</td>
                                <td>{{ $contract->date_debut }}</td>
                                <td>{{ $contract->date_fin }}</td>
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

    <script>
        // JavaScript code to prefill the start date field with the employee's date d'embauche
        document.getElementById('employee').addEventListener('change', function() {
            var selectedEmployee = this.value;
            var employeeDateEmbauche = {!! json_encode($employees->pluck('date_embauche', 'id')->toArray()) !!}[selectedEmployee];
            if (employeeDateEmbauche) {
                document.getElementById('date_debut').value = employeeDateEmbauche;
            }
        });

        document.getElementById('type_contrat').addEventListener('change', function() {
            var typeContrat = this.value;
            var dateFinField = document.getElementById('date_fin');
            if (typeContrat === 'CDI') {
                dateFinField.value = ''; // Clear the value
                dateFinField.disabled = true;
            } else {
                dateFinField.disabled = false;
            }
        });
    </script>
@endsection
