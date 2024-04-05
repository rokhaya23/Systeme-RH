@extends('layout.base')

@section('title', 'Profil')

@section('content')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <span>Profil</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profil</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                    </div>
                    <div class="profile-info">
                        <div class="profile-photo">
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</h4>
                                <p>{{ Auth::user()->departement }} / {{ Auth::user()->poste }}</p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c8a0ada4a4a788ada5a9a1a4e6aba7a5">{{ Auth::user()->email }}</a></h4>
                                <p>Email</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-statistics">
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="m-b-0">150</h3><span>Follower</span>
                                        </div>
                                        <div class="col">
                                            <h3 class="m-b-0">140</h3><span>Place Stay</span>
                                        </div>
                                        <div class="col">
                                            <h3 class="m-b-0">45</h3><span>Reviews</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="post-details">
                        <h3 class="mb-2 text-black">Information Employee</h3>
                        <ul class="mb-4 post-meta d-flex flex-wrap">
                            <li class="post-author mr-3">{{ Auth::user()->getRoleNames()->implode(', ') }} </li>
                        </ul>
                        <p class="post-comment"><i class="fa fa-comments-o"></i> Date d'embauche: {{ Auth::user()->date_embauche }} </p>
                        <p class="post-comment"><i class="fa fa-comments-o"></i> Salaire: {{ Auth::user()->salaire }} </p>
                        <p class="post-comment"><i class="fa fa-comments-o"></i> Date de naissance: {{ Auth::user()->date_naissance }} </p>
                        <p class="post-comment"><i class="fa fa-comments-o"></i> Adresse: {{ Auth::user()->adresse }} </p>
                        <p class="post-comment"><i class="fa fa-comments-o"></i> Téléphone: {{ Auth::user()->telephone }} </p>
                        <p class="post-comment"><i class="fa fa-comments-o"></i> Sexe: {{ Auth::user()->sexe }} </p>
                        <p class="post-comment"><i class="fa fa-comments-o"></i> Banque: {{ Auth::user()->banque }} </p>
                        <p class="post-comment"><i class="fa fa-comments-o"></i> Numéro de compte: {{ Auth::user()->numero_compte }} </p>
                        <p class="post-comment"><i class="fa fa-comments-o"></i> CNI: {{ Auth::user()->CNI }} </p>
                        <p class="post-comment"><i class="fa fa-comments-o"></i> Département: {{ Auth::user()->departement }} </p>
                        <p class="post-comment"><i class="fa fa-comments-o"></i> Situation matrimoniale: {{ Auth::user()->situation_matrimonial }} </p>
                        @if(Auth::user()->language)
                            <p class="post-comment"><i class="fa fa-comments-o"></i> Langue(s): {{ implode(', ', Auth::user()->language) }} </p>
                        @endif


                        <div class="profile-skills mt-5 mb-5">
                            <h4 class="text-primary mb-2">Skills</h4>
                            <a href="javascript:void(0)" class="btn btn-primary light btn-xs mb-1">Dashboard</a>
                            <a href="javascript:void(0)" class="btn btn-primary light btn-xs mb-1">Photoshop</a>
                            <a href="javascript:void(0)" class="btn btn-primary light btn-xs mb-1">Bootstrap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
