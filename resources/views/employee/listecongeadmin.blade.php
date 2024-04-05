@extends('layout.base')

@section('title', 'Leave Requests Management')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Leave Requests List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                        <tr>
                            <th><strong>Employee</strong></th>
                            <th><strong>Leave Type</strong></th>
                            <th><strong>Start Date</strong></th>
                            <th><strong>End Date</strong></th>
                            <th><strong>Number of Days</strong></th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($demandesConge as $demandeConge)
                            <tr>
                                <td>{{ $demandeConge->employees->prenom }} {{ $demandeConge->employees->nom }}</td>
                                <td>{{ $demandeConge->typeConge->type_conge }}</td>
                                <td>{{ $demandeConge->date_debut }}</td>
                                <td>{{ $demandeConge->date_fin }}</td>
                                <td>{{ $demandeConge->nombre_jour }}</td>
                                <td>
                                    @if($demandeConge->statut=='Pending')
                                        <a href="/valider_demande_conges/{{$demandeConge->id}}" class="btn btn-outline-secondary  ">
                                            <i class="las la-check-circle"></i>
                                        </a>
                                        <a href="/refuser_demande_conges/{{$demandeConge->id}}" class="btn btn-outline-danger ">

                                            <i class="las la-times-circle"></i>
                                        </a>
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
@endsection
