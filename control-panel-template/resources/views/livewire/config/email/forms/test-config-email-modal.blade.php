<div>
    <!-- Button trigger modal -->
    <div type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#sendTestMailConfigModal">
        <i class="fa-solid fa-paper-plane"></i> Wyślij email testowy
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="sendTestMailConfigModal" tabindex="-1" aria-labelledby="sendTestMailConfigModalLabel" aria-hidden="true">
        <form wire:submit.prevent="sendTestEmail">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sendTestMailConfigModalLabel">Edytuj configurację mailingu</h5>
                        <button type="button" wire:click='cancel()' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input wire:model="email" type="email" placeholder="user@gmail.com" class="form-control" id="inputEmail" autocomplete="off" required>
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click='cancel()' class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa-regular fa-paper-plane"></i> Wyślij</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
