<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <form wire:submit.prevent="deleteUser">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteUserModalLabel">Usuń użytkownika</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click='clear'></button>
                    </div>
                    <div class="modal-body">
                        @if ($user)
                            <p>Czy na pewno chcesz usunąć użytkownika?</p>
                            Nazwa Użytkownika:<br>
                            <h5><strong>{{$user['name']}}</strong></h5><br>
                            Email:<br>
                            <h5><strong>{{$user['email']}}</strong></h5><br>
                        @else
                            <livewire:components.loading >
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click='clear' class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-trash-can"></i> Usuń</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
