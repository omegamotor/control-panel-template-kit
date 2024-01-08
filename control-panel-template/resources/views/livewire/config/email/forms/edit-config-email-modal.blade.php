<div>
    <!-- Button trigger modal -->
    <div type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editMailConfigModal">
        <i class="fa-solid fa-envelope-open-text"></i> Skonfiguruj mailing
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="editMailConfigModal" tabindex="-1" aria-labelledby="editMailConfigModalLabel" aria-hidden="true">
        <form wire:submit.prevent="editMailConfig">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editMailConfigModalLabel">Edytuj configurację mailingu</h5>
                        <button type="button" wire:click='cancel()' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="inputMailer" class="form-label">Mailer</label>
                            <input wire:model="mailer" type="text" class="form-control" id="inputMailer" required>
                            @error('mailer') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputHost" class="form-label">Host</label>
                            <input wire:model="host" type="text" class="form-control" id="inputHost" required>
                            @error('host') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputPort" class="form-label">Port</label>
                            <input wire:model="port" type="text" class="form-control" id="inputPort" required>
                            @error('port') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputUsername" class="form-label">Username</label>
                            <input wire:model="username" type="text" class="form-control" id="inputUsername" required>
                            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input wire:model="password" type="password" class="form-control" id="inputPassword" required>
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputEncryption" class="form-label">Encryption</label>
                            <input wire:model="encryption" type="text" class="form-control" id="inputEncryption" required>
                            @error('encryption') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputFromAddress" class="form-label">From address</label>
                            <input wire:model="fromAddress" type="text" class="form-control" id="inputFromAddress" required>
                            @error('fromAddress') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputFromName" class="form-label">From name</label>
                            <input wire:model="fromName" type="text" class="form-control" id="inputFromName" required>
                            @error('fromName') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click='cancel()' class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-check"></i> Zapisz</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
