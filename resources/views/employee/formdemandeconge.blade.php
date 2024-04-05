@extends('layout.base')

@section('title', 'Leave Request Management')

@section('content')
    <div class="project-nav">
        <div class="card-action card-tabs  mr-auto mb-md-0 mb-3">
            <ul class="nav nav-tabs style-2">
                <li class="nav-item">
                    <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">All Leave <span class="badge badge-primary shadow-primary">154</span></a>
                </li>
            </ul>
        </div>


        <div class="d-flex align-items-center">
            <a href="javascript:void(0);" id="btn-add-leave" data-toggle="modal" data-target="#addLeaveModal" class="btn btn-primary text-white">+ New Leave</a>
        </div>
    </div>
    <!-- Modal creation employee-->
    <div class="modal fade" id="addLeaveModal" tabindex="-1" role="dialog" aria-labelledby="addLeaveModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="leaveModalTitle">Add Leave</h5>
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
                            <form method="post" action="{{ route('listes.store')}}" enctype="multipart/form-data">
                                @csrf
                                @method('post')

                                <!-- Employé -->
                                <div class="mb-3 row">
                                    <label for="idEmployee" class="col-md-4 col-form-label text-md-end text-start">Employee</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="idEmployee" name="idEmployee" required>
                                            @foreach ($employees as $employee)
                                                @if (Auth::user()->hasRole('Utilisateur Interne') && $employee->id == Auth::user()->id)
                                                    <!-- Si l'utilisateur est un utilisateur interne, afficher uniquement son propre nom -->
                                                    <option value="{{ $employee->id }}" selected>
                                                        {{ $employee->prenom }} {{ $employee->nom }}
                                                    </option>
                                                @elseif (!Auth::user()->hasRole('Utilisateur Interne'))
                                                    <!-- Si l'utilisateur n'est pas un utilisateur interne, afficher tous les noms des employés -->
                                                    <option value="{{ $employee->id }}" {{ $employee->id == $demandeConge->idEmployee ? 'selected' : '' }}>
                                                        {{ $employee->prenom }} {{ $employee->nom }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <!-- Type de congé -->
                                <div class="mb-3 row">
                                    <label for="idType_conge" class="col-md-4 col-form-label text-md-end text-start">Leave Type</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="idType_conge" name="idType_conge" required>
                                            @foreach ($typesConge as $typeConge)
                                                <option value="{{ $typeConge->id }}" {{ $typeConge->id == $demandeConge->idType_conge ? 'selected' : '' }}>
                                                    {{ $typeConge->type_conge }} <!-- Remplacez type_conge par le nom de la colonne correspondant au type de congé -->
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Date de début -->
                                <div class="mb-3 row">
                                    <label for="date_debut" class="col-md-4 col-form-label text-md-end text-start">Start Date</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control @error('date_debut') is-invalid @enderror" id="date_debut" name="date_debut" value="{{ old('date_debut', $demandeConge->date_debut ?? '') }}" required>
                                        @error('date_debut')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Date de fin -->
                                <div class="mb-3 row">
                                    <label for="date_fin" class="col-md-4 col-form-label text-md-end text-start">End Date</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control @error('date_fin') is-invalid @enderror" id="date_fin" name="date_fin" value="{{ old('date_debut', $demandeConge->date_fin ?? '') }}" required>
                                        @error('date_fin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Nombre de jours -->
                                <div class="mb-3 row">
                                    <label for="nombre_jour" class="col-md-4 col-form-label text-md-end text-start">Number of Days</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control @error('nombre_jour') is-invalid @enderror" id="nombre_jour" name="nombre_jour" value="{{ $demandeConge->nombre_jour ?? ''}}" required>
                                        @error('nombre_jour')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                @if (Auth::user()->hasRole('Administrateur'))
                                    <!-- Statut -->
                                    <div class="mb-3 row">
                                        <label for="statut" class="col-md-4 col-form-label text-md-end text-start">Status</label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="statut" name="statut" required >
                                                <option value="Pending" {{ $demandeConge->statut == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Accepted" {{ $demandeConge->statut == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                                <option value="Rejected" {{ $demandeConge->statut == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                <!-- Téléphone -->
                                <div class="mb-3 row">
                                    <label for="telephone" class="col-md-4 col-form-label text-md-end text-start">Telephone</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ $demandeConge->telephone }}" required>
                                        @error('telephone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                            <th><strong>Employee Name</strong></th>
                            <th><strong>Leave Type</strong></th>
                            <th><strong>Start Date</strong></th>
                            <th><strong>End Date</strong></th>
                            <th><strong>Number of Days</strong></th>
                            <th><strong>Status</strong></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($demandesConge as $demande)
                            <tr>
                                <td>{{ $demande->id }}</td>
                                <td>{{ $demande->employees->nom }} {{ $demande->employees->prenom }}</td>
                                <td>{{ $demande->typeConge->type_conge }}</td>
                                <td>{{ $demande->date_debut }}</td>
                                <td>{{ $demande->date_fin }}</td>
                                <td>{{ $demande->nombre_jour }}</td>
                                <td>
                                <span class="badge
                                    @if($demande->statut === 'Accepted')
                                        light badge-success
                                    @elseif($demande->statut === 'Rejected')
                                        light badge-danger
                                    @else
                                        light badge-warning
                                    @endif">
                                    {{ $demande->statut }}
                                </span>
                                <td>
                                    @if($demande->statut !== 'Accepted')
                                        <div class="d-flex">
                                            <a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want to delete this leave request?');"><i class="fa fa-trash"></i></a>
                                        </div>
                                    @endif
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
        // Fonction pour pré-remplir le champ du téléphone en fonction de l'employé sélectionné
        function prefillPhone() {
            var employeeId = document.getElementById("idEmployee").value;
            // Effectuez une requête AJAX pour récupérer le numéro de téléphone de l'employé en fonction de son ID
            // Par exemple :
            fetch('/getPhoneNumber/' + employeeId)
                .then(response => response.json())
                .then(data => {
                    document.getElementById("telephone").value = data.phoneNumber;
                });
        }

        // Écouteur d'événement pour le changement de sélection de l'employé
        document.getElementById("idEmployee").addEventListener("change", prefillPhone);

        // Appel initial de la fonction prefillPhone() pour pré-remplir le champ du téléphone si un employé est déjà sélectionné
        prefillPhone();

        function calculateDays() {
            var startDate = new Date(document.getElementById("date_debut").value);
            var endDate = new Date(document.getElementById("date_fin").value);
            var timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            document.getElementById("nombre_jour").value = diffDays;
        }

        // Écouteur d'événement pour le changement de la date de début
        document.getElementById("date_debut").addEventListener("change", calculateDays);

        // Écouteur d'événement pour le changement de la date de fin
        document.getElementById("date_fin").addEventListener("change", calculateDays);

        // Appel initial de la fonction calculateDays() pour mettre à jour le nombre de jours si les dates sont déjà remplies
        calculateDays();
    </script>
@endsection
