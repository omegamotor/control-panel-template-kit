<div>
    <!-- Button trigger modal -->
    <div type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editPusherConfigModal">
        <i class="fa-solid fa-envelope-open-text"></i> Skonfiguruj pushera
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="editPusherConfigModal" tabindex="-1" aria-labelledby="editPusherConfigModalLabel" aria-hidden="true">
        <form wire:submit.prevent="editPusherConfig">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPusherConfigModalLabel">Edytuj configurację pushera</h5>
                        <button type="button" wire:click='cancel()' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="inputAppId" class="form-label">APP ID</label>
                            <input wire:model="appId" type="text" class="form-control" id="inputAppId" required>
                            @error('appId') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputAppKey" class="form-label">App Key</label>
                            <input wire:model="appKey" type="text" class="form-control" id="inputAppKey" required>
                            @error('appKey') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputAppSecret" class="form-label">App Secret</label>
                            <input wire:model="appSecret" type="text" class="form-control" id="inputAppSecret" required>
                            @error('appSecret') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputHost" class="form-label">Host</label>
                            <input wire:model="host" type="text" class="form-control" id="inputHost">
                            @error('host') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputPort" class="form-label">Port</label>
                            <input wire:model="port" type="text" class="form-control" id="inputPort" required>
                            @error('port') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputScheme" class="form-label">Scheme</label>
                            <input wire:model="scheme" type="text" class="form-control" id="inputScheme" required>
                            @error('scheme') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputAppCluster" class="form-label">App Cluster</label>
                            <input wire:model="appCluster" type="text" class="form-control" id="inputAppCluster" required>
                            @error('appCluster') <span class="text-danger">{{ $message }}</span> @enderror
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
