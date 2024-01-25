<div>
    {{-- Modals --}}
    @livewire('users.forms.delete-user-modal')
    @livewire('users.forms.edit-user-modal')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Lista użytkowników</h1>
    </div>

    @livewire('components.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Opcje</h6>
        </div>
        <div class="card-body">
            <div class="my-3 d-flex" style="align-items: baseline">
                <label for="searchBy" class="form-label form-label-sm mr-2" >Szukaj: </label>
                <input wire:model.live="searchBy" class="form-control form-control-sm mr-2" style="width: 150px;" type="text" placeholder="szukaj">

                <label for="userSortBy" class="form-label mr-2">Sortuj: </label>
                <select wire:model.lazy="sortBy" class="form-select form-select-sm mr-2" id="userSortBy">
                    <option value="ASC">A-Z</option>
                    <option value="DESC">Z-A</option>
                </select>

                <label for="userPerPage" class="form-label mr-2">Pokaż: </label>
                <select wire:model.lazy="perPage" class="form-select form-select-sm mr-2" id="userPerPage">
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="150">150</option>
                    <option value="0">Wszystko</option>
                </select>
            </div>

            <div class="d-flex gap-1">
                @livewire('users.forms.create-user-modal')
                {{-- <div class="btn btn-sm btn-danger disabled" disabled><i class="fa-solid fa-trash-can"></i> Usuń zaznaczone</div>
                <div class="btn btn-sm btn-secondary disabled" disabled><i class="fa-solid fa-envelope-open-text"></i> Wyślij nowe hasła</div> --}}
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lista użytkowników</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($users) > 0)
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                {{-- <th style="width: 40px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkAllUsers">
                                    </div>
                                </th> --}}
                                <th>Nazwa</th>
                                <th>Email</th>
                                <th>Opcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr wire:key="{{ $user->id }}">
                                    {{-- <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="checkUser{{$user->id}}">
                                        </div>
                                    </td> --}}
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" wire:click='openModal({{$user}}, "edit")' data-bs-toggle="modal" data-bs-target="#editUserModal"  title="Edytuj" >
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        @if (auth()->user()->id == $user->id)
                                            <button type="button" class="btn btn-sm btn-danger disabled" title="Usuń" disabled>
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-danger" wire:click='openModal({{$user}}, "delete")' data-bs-toggle="modal" data-bs-target="#deleteUserModal" title="Usuń">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        @endif

                                        <button type="button" class="btn btn-sm btn-secondary" wire:click='sendNewPassword({{$user}})' title="Wygeneruj nowe hasło">
                                            <i class="fa-solid fa-envelope-open-text"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                @else
                    @livewire('components.no-data-content')
                @endif
            </div>
        </div>
    </div>
</div>
