<div class="row p-4 p-5">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'édition client</h3>
            </div>
            <form role="form" wire:submit.prevent="updateUser()">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="editUser.nom" class="form-control
                            @error('editUser.nom') is-invalid @enderror">

                            @error("editUser.nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Prenom</label>
                            <input type="text" wire:model="editUser.prenom" class="form-control
                            @error('editUser.prenom') is-invalid @enderror">

                            @error("editUser.prenom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Genre</label>
                        <select wire:model="editUser.sexe" class="form-control
                            @error('editUser.sexe') is-invalid @enderror">
                            <option value="">---------</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                        @error("editUser.sexe")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="text" wire:model="editUser.email" class="form-control
                        @error('editUser.email') is-invalid @enderror">

                        @error("editUser.email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Telephone 1</label>
                            <input type="text" wire:model="editUser.telephone1" class="form-control
                            @error('editUser.telephone1') is-invalid @enderror">

                            @error("editUser.telephone1")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Telephone 2</label>
                            <input type="text" wire:model="editUser.telephone2" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Piece d'identite</label>
                        <select wire:model="editUser.pieceIdentite" class="form-control
                            @error('editUser.pieceIdentite') is-invalid @enderror">
                            <option value="">---------</option>
                            <option value="CNI">CNI</option>
                            <option value="PASSPORT">PASSPORT</option>
                            <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                        </select>
                        @error("editUser.pieceIdentite")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Numero de piece d'identite</label>
                        <input type="text" wire:model="editUser.numeroPieceIdentite" class="form-control
                        @error('editUser.numeroPieceIdentite') is-invalid @enderror">

                        @error("editUser.numeroPieceIdentite")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                    <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retourner à la liste des clients</button>
                </div>
            </form>                    
        </div>
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-key fa-2x"></i> Authentication</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="" class="btn btn-link" wire:click.prevent="confirmPwdReset">Reinitialise le mot de passe</a>
                                <span>(par defaut: "password")</span>
                            </li>
                        </ul>
                    </div>             
                </div>
            </div>
            
            <div class="col-md-12 mt-4">
                <div class="card card-primary">
                    <div class="card-header d-flex align-content-center">
                        <h3 class="card-title flex-grow-1"><i class="fas fa-fingerprint fa-2x"></i> Roles & Permissions</h3>
                        <button class="btn bg-gradient-success" wire:click="updateRoleAndPermissions"><i class="fas fa-check"></i>Appliquer les modifications</button>
                    </div>
                    <div class="card-body">
                        <div id="accordion">
                            @foreach($rolePermissions["roles"] as $role)
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4 class="card-title flex-grow-1">
                                        <a data-parent="#accordion" href="#" aria-expanded="true">
                                            {{$role["role_nom"]}}
                                        </a>
                                    </h4>
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" wire:model.lazy="rolePermissions.roles.{{ $loop->index }}.active"
                                        @if($role["active"])  checked @endif
                                        id="customSwitch{{ $role['role_id'] }}">
                                        <label class="custom-control-label" for="customSwitch{{ $role['role_id'] }}">{{ $role["active"]? "Active" : "Desactive" }}</label>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            {{-- @json($rolePermissions["roles"]) --}}
                        </div>
                    </div>

                    <div class="p-3">
                        <table class="table table-bordered">
                            <thead>
                                <th>Permissions</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($rolePermissions["permissions"] as $permission)
                                    <tr>
                                        <td>{{ $permission["permission_nom"] }}</td>
                                        <td>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" class="custom-control-input" wire:model.lazy="rolePermissions.permissions.{{ $loop->index }}.active"
                                                @if($permission["active"])  checked @endif
                                                id="customSwitchPermission{{ $permission['permission_id'] }}">
                                                <label class="custom-control-label" for="customSwitchPermission{{ $permission['permission_id'] }}">{{ $permission["active"]? "Active" : "Desactive" }}</label>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            {{-- @json($rolePermissions["permissions"]) --}}
                        </table>
                    </div>          
                </div>
            </div>
        </div>
    </div>
</div>