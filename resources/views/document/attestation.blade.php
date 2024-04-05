<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Attestation de travail</title>

</head>
<body>







<div class="small-container">
    <div class="inner-header text-center" style="text-align: center">
        <h2 class="card-title">Attestation de Travail</h2>
    </div>
    <div class="inner-content">
        <p class="lead">Nous, soussignés, Zenix Technologies  , représentée par Rokhaya Beye, agissant en qualité de Directeur Générale, attestons par la présente que :</p>
        <p> @if($user->sexe=='M')  M. @else Mme @endif {{$user->prenom}} {{$user->nom}}, @if($user->sexe=='M')  né @else née @endif le {{date('d F Y',strtotime($user->date_naissance))}} , demeurant au {{$user->adresse}}, a été @if($user->sexe=='M')  employé @else employée @endif au sein de notre entreprise à partir du {{ date('d F Y', $user->create_at) }} dans le departement {{$user->service->titre}}.</p>
        <p>Durant son emploi, @if($user->sexe=='M')  M. @else Mme @endif {{$user->prenom}} {{$user->nom}} a fait preuve de professionnalisme, d'engagement et de compétence dans l'exercice de ses fonctions. Ses responsabilités comprenaient notamment "c'est maintenant que je me rends compte que j'ai pas gerer".</p>
        <p>La présente attestation est délivrée à la demande de @if($user->sexe=='M')  l'interssé @else l'interssée @endif pour servir et valoir ce que de droit.</p>
        <p>Fait à Dakar, le {{date('d F Y')}}.</p>
        <div class="signature">
            <p>Rokhaya Sall President Directeur Géneral</p>
            <p>SIGNATURE</p>

        </div>
    </div>

</div>



</body>
</html>
