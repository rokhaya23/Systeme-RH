@extends('template.base')

@section('title', 'My Leave Requests')

@section('content')
    <div class="container mt-lg-5">
        <br><br>
        <div class="card">
            <div class="card-header bg-success-subtle">
                Dashboard
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Type of leave</th>
                        <th>Authorized days</th>
                        <th>Payment Status</th>
                        <th>Days used</th>
                        <th>Days remaining</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gestionConges as $gestionConge)
                        @php
                            $joursUtilises = 0;
                            if(isset($demandesConges)) {
                                foreach($demandesConges as $demandeConge) {
                                    if($demandeConge->idType_conge == $gestionConge->id && $demandeConge->statut == 'Accepted') {
                                        $joursUtilises += $demandeConge->nombre_jour;
                                    }
                                }
                            }
                            $joursRestants = $gestionConge->jours_autorise - $joursUtilises;
                        @endphp
                        <tr>
                            <td>{{ $gestionConge->type_conge }}</td>
                            <td>{{ $gestionConge->jours_autorise }}</td>
                            <td>
                                @if($gestionConge->paiement == 'paid')
                                    <span class="badge badge-success">Paid</span>
                                @else
                                    <span class="badge badge-warning">Unpaid</span>
                                @endif
                            </td>
                            <td>{{ $joursUtilises }}</td>
                            <td>
                                @if(isset($demandesConges) && $joursRestants >= 0)
                                    {{ $joursRestants }}
                                @elseif(isset($demandesConges) && $joursRestants < 0)
                                    <span class="text-danger">Error: Request exceeds the number of authorized days</span>
                                @else
                                    Jours non disponibles
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
