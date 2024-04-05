@extends('layout.base')

@section('title', 'List of Employee')

@section('content')
    <div class="project-nav">
        <div class="card-action card-tabs  mr-auto mb-md-0 mb-3">
            <ul class="nav nav-tabs style-2">
                <li class="nav-item">
                    <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">All Employee <span class="badge badge-primary shadow-primary">154</span></a>
                </li>
            </ul>
        </div>


        <div class="d-flex align-items-center">
            <a href="javascript:void(0);" id="btn-add-contact" data-toggle="modal" data-target="#addContactModal" class="btn btn-primary text-white">+ New Employee</a>
        </div>
    </div>
    <!-- Modal creation employee-->
    <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeModalTitle">Add Employee</h5>
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
                            <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="prenom">First Name</label>
                                        <input type="text" class="form-control" name="prenom" id="prenom" required>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="nom">Last Name</label>
                                        <input type="text" class="form-control" name="nom" id="nom" required>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <fieldset class="form-group">
                                            <legend>Gender</legend>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="sexe" value="M">Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="sexe" value="F">Female
                                                </label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="date_naissance">Date Of Birth</label>
                                        <input type="date" class="form-control" name="date_naissance" id="date_naissance" required>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="adresse">Address</label>
                                        <textarea class="form-control" name="adresse" id="adresse" rows="2"></textarea>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="telephone">Phone</label>
                                        <input type="text" class="form-control" name="telephone" id="telephone" required>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <fieldset class="form-group">
                                            <legend>Marital Status</legend>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="situation_matrimonial" id="divorced" value="divorced">
                                                <label class="form-check-label" for="divorced">Divorced</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="situation_matrimonial" id="widowed" value="widowed">
                                                <label class="form-check-label" for="widowed">Widowed</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="situation_matrimonial" id="never_married" value="never_married">
                                                <label class="form-check-label" for="never_married">Never married</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="situation_matrimonial" id="married" value="married">
                                                <label class="form-check-label" for="married">Married</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="CNI">CNI</label>
                                        <input type="text" class="form-control" name="CNI" id="CNI" required>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="departement">Department</label>
                                        <select class="form-control" name="departement" id="departement">
                                            <option value="">----- Choose a department -----</option>
                                            <option value="Finance">Finance</option>
                                            <option value="Ressources Humaines">Ressources Humaines</option>
                                            <option value="Développement">Développement</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Ventes">Ventes</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <fieldset class="form-group">
                                            <legend>Language</legend>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="language[]" value="english">English
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="language[]" value="french">French
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="language[]" value="espaniol">Espaniol
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="language[]" value="other">Other
                                                </label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="salaire">Salary</label>
                                        <input type="text" class="form-control" name="salaire" id="salaire" required>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="poste">Poste</label>
                                        <input type="text" class="form-control" name="poste" id="poste" required>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="date_embauche">Hiring Date</label>
                                        <input type="date" class="form-control" name="date_embauche" id="date_embauche" required>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="banque">Bank</label>
                                        <select class="form-control" name="banque" id="banque">
                                            <option value="">----- Choose a bank -----</option>
                                            <option value="SGBS">SGBS</option>
                                            <option value="Banque Islamique">Banque Islamique</option>
                                            <option value="BOA">Banque Of Africa</option>
                                            <option value="Orabank">Orabank</option>
                                            <option value="CBAO">CBAO</option>
                                            <option value="BICIS">BICIS</option>
                                            <option value="Coris Bank">Coris Bank</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-md-6 mb-3">
                                        <label for="numero_compte">Account Number</label>
                                        <input type="text" class="form-control" name="numero_compte" id="numero_compte">
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="roles" class="col-md-4 col-form-label text-md-end text-start">Roles</label>
                                        <div class="col-md-6">
                                            <select class="form-select @error('roles') is-invalid @enderror" multiple aria-label="Roles" id="roles" name="roles[]">
                                                @forelse ($roles as $role)
                                                    @unless($role == 'Administrateur' && !Auth::user()->hasRole('Administrateur'))
                                                        <option value="{{ $role->name }}" {{ in_array($role->name, old('roles') ?? $employee->roles->pluck('name')->toArray()) ? 'selected' : '' }}>
                                                            {{ $role->name }}
                                                        </option>
                                                    @endunless
                                                @empty
                                                @endforelse
                                            </select>
                                            @if ($errors->has('roles'))
                                                <span class="text-danger">{{ $errors->first('roles') }}</span>
                                            @endif
                                        </div>
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
    <!-- Modal d'édition d'employé -->
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEmployeeModalTitle">Edit Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire pour l'édition de l'employé -->
                    @foreach($employees as $employee)
                        <form id="editEmployeeForm" method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                            <div class="form-group row">
                                <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                                <div class="col-md-6">
                                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ $employee->prenom ?? '' }}" required autocomplete="prenom" autofocus>
                                    @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $employee->nom ?? '' }}" required autocomplete="nom" autofocus>
                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="sexe" value="M" {{ old('sexe', $employee->sexe) == 'M' ? 'checked' : '' }}>Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="sexe" value="F" {{ old('sexe', $employee->sexe) == 'F' ? 'checked' : '' }}>Female
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Date Of Birth -->
                            <div class="form-group row">
                                <label for="date_naissance" class="col-md-4 col-form-label text-md-right">Date Of Birth</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="date_naissance" id="date_naissance" value="{{ old('date_naissance', $employee->date_naissance) }}" required>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="form-group row">
                                <label for="adresse" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="adresse" id="adresse" rows="2">{{ old('adresse', $employee->adresse) }}</textarea>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="form-group row">
                                <label for="telephone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="telephone" id="telephone" value="{{old('telephone', $employee->telephone) }}" required>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $employee->email ?? '' }}" required>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>

                            <!-- Marital Status -->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Marital Status</label>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="situation_matrimonial" id="divorced" value="divorced" {{ $employee->situation_matrimonial == 'divorced' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="divorced">Divorced</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="situation_matrimonial" id="widowed" value="widowed" {{ $employee->situation_matrimonial == 'widowed' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="widowed">Widowed</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="situation_matrimonial" id="never_married" value="never_married" {{ $employee->situation_matrimonial == 'never_married' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="never_married">Never married</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="situation_matrimonial" id="married" value="married" {{ $employee->situation_matrimonial == 'married' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="married">Married</label>
                                    </div>
                                </div>
                            </div>

                            <!-- CNI -->
                            <div class="form-group row">
                                <label for="CNI" class="col-md-4 col-form-label text-md-right">CNI</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="CNI" id="CNI" value="{{old('CNI', $employee->CNI) }}" required>
                                </div>
                            </div>

                            <!-- Photo -->
                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">Photo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
                                </div>
                            </div>

                            <!-- Department -->
                            <div class="form-group row">
                                <label for="departement" class="col-md-4 col-form-label text-md-right">Department</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="departement" id="departement">
                                        <option value="">----- Choose a department -----</option>
                                        <option value="Finance" {{ $employee->departement == 'Finance' ? 'selected' : '' }}>Finance</option>
                                        <option value="Ressources Humaines" {{ $employee->departement == 'Ressources Humaines' ? 'selected' : '' }}>Ressources Humaines</option>
                                        <option value="Développement" {{ $employee->departement == 'Développement' ? 'selected' : '' }}>Développement</option>
                                        <option value="Marketing" {{ $employee->departement == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                        <option value="Ventes" {{ $employee->departement == 'Ventes' ? 'selected' : '' }}>Ventes</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Language -->
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <p>Language</p>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="language[]" value="English" {{ !empty($employeeLanguages ?? []) && in_array('English', $employeeLanguages ?? []) ? 'checked' : '' }}>English
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="language[]" value="French" {{ !empty($employeeLanguages ?? []) && in_array('French', $employeeLanguages ?? []) ? 'checked' : '' }}>French
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="language[]" value="Espaniol" {{ !empty($employeeLanguages ?? []) && in_array('Espaniol', $employeeLanguages ?? []) ? 'checked' : '' }}>Espaniol
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="language[]" value="Other...." {{ !empty($employeeLanguages ?? []) && in_array('Other....', $employeeLanguages ?? []) ? 'checked' : '' }}>Other....
                                        </label>
                                    </div>
                                </fieldset>
                                <br><br>
                            </div>


                            <!-- Salary -->
                            <div class="form-group row">
                                <label for="salaire" class="col-md-4 col-form-label text-md-right">Salary</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="salaire" id="salaire" value="{{old('salaire', $employee->salaire) }}" required>
                                </div>
                            </div>

                            <!-- Poste -->
                            <div class="form-group row">
                                <label for="poste" class="col-md-4 col-form-label text-md-right">Poste</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="poste" id="poste" value="{{old('poste', $employee->poste) }}" required>
                                </div>
                            </div>

                            <!-- Hiring Date -->
                            <div class="form-group row">
                                <label for="date_embauche" class="col-md-4 col-form-label text-md-right">Hiring Date</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="date_embauche" id="date_embauche" value="{{old('date_embauche', $employee->date_embauche) }}" required>
                                </div>
                            </div>

                            <!-- Bank -->
                            <div class="form-group row">
                                <label for="banque" class="col-md-4 col-form-label text-md-right">Bank</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="banque" id="banque">
                                        <option value="">----- Choose a bank -----</option>
                                        <option value="SGBS" {{ $employee->banque == 'SGBS' ? 'selected' : '' }}>SGBS</option>
                                        <option value="Banque Islamique" {{ $employee->banque == 'Banque Islamique' ? 'selected' : '' }}>Banque Islamique</option>
                                        <option value="BOA" {{ $employee->banque == 'BOA' ? 'selected' : '' }}>Banque Of Africa</option>
                                        <option value="Orabank" {{ $employee->banque == 'Orabank' ? 'selected' : '' }}>Orabank</option>
                                        <option value="CBAO" {{ $employee->banque == 'CBAO' ? 'selected' : '' }}>CBAO</option>
                                        <option value="BICIS" {{ $employee->banque == 'BICIS' ? 'selected' : '' }}>BICIS</option>
                                        <option value="Coris Bank" {{ $employee->banque == 'Coris Bank' ? 'selected' : '' }}>Coris Bank</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Account Number -->
                            <div class="form-group row">
                                <label for="numero_compte" class="col-md-4 col-form-label text-md-right">Account Number</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="numero_compte" id="numero_compte" value="{{old('numero_compte', $employee->numero_compte) }}">
                                </div>
                            </div>

                            <!-- Roles -->
                            <div class="form-group row">
                                <label for="roles" class="col-md-4 col-form-label text-md-end text-start">Roles</label>
                                <div class="col-md-6">
                                    <select class="form-select @error('roles') is-invalid @enderror" multiple aria-label="Roles" id="roles" name="roles[]">
                                        @forelse ($roles as $role)
                                            @unless($role == 'Administrateur' && !Auth::user()->hasRole('Administrateur'))
                                                <option value="{{ $role->name }}" {{ in_array($role->name, old('roles') ?? $employee->roles->pluck('name')->toArray()) ? 'selected' : '' }}>
                                                    {{ $role->name }}
                                                </option>
                                            @endunless
                                        @empty
                                        @endforelse
                                    </select>
                                    @if ($errors->has('roles'))
                                        <span class="text-danger">{{ $errors->first('roles') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- List Employee -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="navpills-1">
            <div class="row dz-scroll loadmore-content searchable-items list" id="allContactListContent">
                @foreach($employees as $employe)
                    <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
                        <div class="card contact-bx item-content">
                            <div class="card-header border-0">
                                <div class="action-dropdown">
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item edit" data-toggle="modal" data-target="#editEmployeeModal" href="{{ route('employees.edit', $employe->id) }}">Edit</a>
                                            <a class="dropdown-item delete" href="javascript:void(0);">Delete</a>                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body user-profile">
                                <div class="image-bx">
                                    <img src="{{ asset('storage/' . $employe->photo) }}" data-src="{{ asset('storage/' . $employe->photo) }}" alt="" class="rounded-circle">
                                    <span class="active"></span>
                                </div>
                                <div class="media-body user-meta-info">
                                    <h6 class="fs-20 font-w500 my-1"><a href="{{ route('profile.show') }}" class="text-black user-name" data-name="{{ $employe->prenom }} {{ $employe->nom }}">{{ $employe->prenom }} {{ $employe->nom }}</a></h6>
                                    <p class="fs-14 mb-3 user-work" data-occupation="{{ $employe->poste }}">{{ $employe->poste }}</p>
                                    <ul>
                                        <li><a href="tel:{{ $employe->telephone }}"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
                                        <li><a href="mailto:{{ $employe->email }}"><i class="las la-sms"></i></a></li>
                                        <li><a href="javascript:void(0);"><i class="fa fa-video-camera" aria-hidden="true"></i></a></li>
                                    </ul>
                                        <a href="{{ route('profile.show') }}" class="btn btn-primary btn-sm">View Profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
