<div>
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
                <input wire:model.lazy="searchBy" class="form-control form-control-sm mr-2" style="width: 150px;" type="text" placeholder="szukaj">

                <label for="userSortBy" class="form-label mr-2">Sortuj: </label>
                <select wire:model.lazy="sortBy" class="form-select form-select-sm mr-2" id="userSortBy">
                    <option value="ASC">A-Z</option>
                    <option value="DESC">Z-A</option>
                </select>

                <label for="userPerPage" class="form-label mr-2">Pokaż: </label>
                <select wire:model.lazy="perPage" class="form-select form-select-sm mr-2" id="userPerPage">
                    <option value="2">2</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="150">150</option>
                    <option value="0">Wszystko</option>
                </select>
            </div>

            @livewire('users.forms.create-user-modal')

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
                                <th style="width: 40px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkAllUsers">
                                    </div>
                                </th>
                                <th>Nazwa</th>
                                <th>Email</th>
                                <th>Opcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="checkUser{{$user->id}}">
                                        </div>
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <div class="btn btn-sm btn-primary" title="Edytuj">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </div>
                                        <div class="btn btn-sm btn-danger" title="Usuń">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
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

    <script>
        Livewire.on('refreshList', function () {
            window.livewire.emit('refreshList');
        });
    </script>
</div>
