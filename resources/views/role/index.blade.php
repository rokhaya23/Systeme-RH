@extends('layout.base')
@section('title', 'Form Role')


@section('content')

            <div class="project-nav">
                <div class="card-action card-tabs  mr-auto mb-md-0 mb-">
                    <ul class="nav nav-tabs style-2">
                        <li class="nav-item">
                            <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">All Role <span class="badge badge-primary shadow-primary">154</span></a>
                        </li>
                    </ul>
                </div>


                <div class="d-flex align-items-center">
                    <a href="#" id="btn-add-contact" data-toggle="modal" data-target="#addContactModal" class="btn btn-primary text-white">+ New Roles</a>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title fs-20">
                                @if(isset($role))
                                    Edit Role
                                @else
                                    Add New Role
                                @endif
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <i class="flaticon-cancel-12 close" data-dismiss="modal"></i>
                            <div class="add-contact-box">
                                <div class="add-contact-content">
                                    @if(isset($role))
                                        <form action="{{ route('roles.update', $role->id) }}" method="post">
                                            @method('PATCH')
                                            @else
                                                <form action="{{ route('roles.store') }}" method="post">
                                                    @endif

                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="text-black font-w500">Name</label>
                                                        <div class="contact-name">
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', isset($role) ? $role->name : '') }}">
                                                            @if ($errors->has('name'))
                                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="permissions" class="col-md-4 col-form-label text-md-end text-start">Permissions</label>
                                                        <div class="col-md-6">
                                                            <select class="form-select @error('permissions') is-invalid @enderror" multiple aria-label="Permissions" id="permissions" name="permissions[]" style="height: 210px;">
                                                                @forelse ($permissions as $permission)
                                                                    <option value="{{ $permission->id }}" {{ in_array($permission->id, old('permissions') ?? (isset($role) ? $role->permissions->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
                                                                        {{ $permission->name }}
                                                                    </option>
                                                                @empty
                                                                    <!-- Handle case where there are no permissions -->
                                                                @endforelse
                                                            </select>
                                                            @if ($errors->has('permissions'))
                                                                <span class="text-danger">{{ $errors->first('permissions') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </form>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="@if(isset($role)) Update Role @else Add Role @endif">

                            <button class="btn btn-danger" data-dismiss="modal"> <i class="flaticon-delete-1"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="tab-content">
                <div class="tab-pane fade show active" id="navpills-1">
                    <div class="row dz-scroll  loadmore-content searchable-items list" id="allContactListContent">
                        <div class="items items-header-section"></div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Role</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md">
                                            <thead>
                                            <tr>
                                                <th style="width:50px;">
                                                    <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                        <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                                        <label class="custom-control-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th><strong>NAME</strong></th>
                                                <th><strong></strong></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $role->name }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                            @if ($role->name != 'Administrateur')
                                                                @if ($role->name != Auth::user()->hasRole($role->name))
                                                                    <a href="{{ route('roles.destroy', $role->id) }}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                                @endif
                                                            @endif
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

                    </div>
                </div>
            </div>
@endsection
