<div>
    <!-- Button trigger modal -->
    <div type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
        <i class="fa-solid fa-user-plus"></i> Dodaj użytkownika
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <form wire:submit.prevent="register">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUserModalLabel">Dodaj użytkownika</h5>
                        <button type="button" wire:click='cancel()' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="inputName" class="form-label">Nazwa użytkownika</label>
                            <input wire:model="name" type="text" class="form-control" id="inputName" required>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input wire:model="email" type="email" class="form-control" id="inputEmail" required>
                            @error('email') <span class="text-danger"> {{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Hasło:</label>
                            <input wire:model="password" type="password" id="password" class="form-control" name="password" required>
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Potwierdź Hasło:</label>
                            <input
                                wire:model="password_confirmation"
                                type="password"
                                id="password_confirmation"
                                class="form-control"
                                name="password_confirmation"
                                required
                            >
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click='cancel()' class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-check"></i> Dodaj</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- <script>
        document.addEventListener('livewire:init', function () {
            Livewire.on('closeModal', function () {
                let myModal = new bootstrap.Modal(document.getElementById('createUserModal'));
                myModal.hide();

                let modalBackdrops = $('.modal-backdrop');

                // Iteruj przez znalezione obiekty
                // modalBackdrops.each(function() {
                //     // Sprawdź, czy obiekt posiada klasę show
                //     if ($(this).hasClass('show')) {
                //         // Usuń klasę show
                //         $(this).removeClass('show');
                //     }
                // });
                // Znajdź wszystkie obiekty z klasą modal-backdrop, które nie mają atrybutu id
                let modalBackdropsWithoutId = $('.modal-backdrop:not([id])');

                // Usuń znalezione obiekty
                modalBackdropsWithoutId.remove();
            });
        });
    </script> --}}
</div>
