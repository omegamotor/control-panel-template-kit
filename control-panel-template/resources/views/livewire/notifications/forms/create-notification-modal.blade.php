<div>
    <!-- Button trigger modal -->
    <div type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createNotificationModal">
        <i class="fa-solid fa-paper-plane"></i> Wyślij powiadomienie
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createNotificationModal" tabindex="-1" aria-labelledby="createNotificationModalLabel" aria-hidden="true">
        <form wire:submit.prevent="sendNotification">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createNotificationModalLabel">Wyślij powiadomienie</h5>
                        <button type="button" wire:click='cancel()' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputTitle" class="form-label">Tytuł powiadomienia</label>
                            <input wire:model.lazy="title" type="text" class="form-control" id="inputTitle" required>
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputMessage" class="form-label">Treść powiadomienia</label>
                            <input wire:model.lazy="message" type="text" class="form-control" id="inputMessage" required>
                            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputType" class="form-label">Typ powiadomienia</label>
                            <select wire:model.lazy="type" class="form-select form-select-sm" id="inputType">
                                <option value="SUCCESS">SUCCESS</option>
                                <option value="INFO">INFO</option>
                                <option value="WARNING">WARNING</option>
                                <option value="DANGER">DANGER</option>
                            </select>

                            @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <hr>
                        <div class="mt-3">
                            <h4 class="text-gray-500">Podgląd</h4>

                            <div class="toast-container position-relative shadow m-3" style="min-width: 80%">
                                <div class="toast-header bg-primary-subtle ">
                                    <div class="alert-toas-icon me-2">
                                        <div class="{{$bgColor}} rounded py-1 px-2">
                                            <i class="{{$icon}} text-white"></i>
                                        </div>
                                    </div>
                                    <strong class="me-auto">{{$title}}</strong>
                                    <small>14:53</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                        {{$message}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click='cancel()' class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-check"></i> Wyślij</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
