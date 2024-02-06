@php
    use Carbon\Carbon;
@endphp

<div>
    {{-- Modals - without btns in it --}}
    {{-- @livewire('users.forms.delete-user-modal')
    @livewire('users.forms.edit-user-modal') --}}

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Powiadomienia</h1>
    </div>

    @livewire('components.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Opcje</h6>
        </div>
        <div class="card-body">
            <div class="my-3 d-flex flex-wrap" style="align-items: baseline">
                <label for="searchBy" class="form-label form-label-sm mr-2" >Szukaj: </label>
                <input wire:model.live="searchBy" class="form-control form-control-sm mr-2" style="width: 150px;" type="text" placeholder="szukaj">

                <label for="notificationSortBy" class="form-label mr-2">Sortuj: </label>
                <select wire:model.lazy="sortBy" class="form-select form-select-sm mr-2" id="notificationSortBy">
                    <option value="DESC">Najnowsze</option>
                    <option value="ASC">Najstarsze</option>
                </select>

                <label for="notificationPerPage" class="form-label mr-2">Pokaż: </label>
                <select wire:model.lazy="perPage" class="form-select form-select-sm mr-2" id="notificationPerPage">
                    <option value="5">5</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="150">150</option>
                    <option value="0">Wszystko</option>
                </select>

                <label for="notificationTypeShow" class="form-label mr-2">Pokaż: </label>
                <select wire:model.lazy="typeShow" class="form-select form-select-sm mr-2" id="notificationTypeShow">
                    <option value="new">Nowe</option>
                    <option value="readed">Przeczytane</option>
                    <option value="all">Wszystkie</option>
                </select>
            </div>

            <div class="d-flex gap-1">
                @livewire('notifications.forms.create-notification-modal')
                {{-- <div class="btn btn-sm btn-secondary" wire:click='pusherTest()'><i class="fa-solid fa-bell"></i> Testowe powaidomienie</div> --}}
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Powiadomienia</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($notifications) > 0)
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Typ</th>
                                <th>Treść</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notifications as $notification)
                                <tr wire:key="{{ $notification->id }}" class="border-left-{{ strtolower($notification->type)}}">
                                    <td style="width: 50px">
                                        <livewire:components.alert-icon wire:key="{{ $notification->id }}" :type="$notification->type">
                                    </td>
                                    <td class="notification-message-container" @if(!$notification->is_readed) style="background-color: #0d6efd30;" @endif>
                                        <div class="small text-gray-500">
                                            @php
                                                $formattedDate = Carbon::parse($notification->created_at)->isoFormat('D MMMM H:mm');
                                            @endphp
                                            {{$formattedDate}}
                                        </div>
                                        <span class="font-weight-bold">
                                            {{$notification->title}} @if($notification->author) - {{$notification->author->name}} @endif
                                        </span>
                                        <p class="notification-message-content" id="notification-message-content-{{$notification->id}}">
                                            {{$notification->message}}
                                        </p>

                                        <div class="flex gap-2 mt-3">
                                            @if(!$notification->is_readed)
                                                <button type="button" class="btn btn-sm btn-success" title="Przeczytane" wire:click='setAsReaded({{$notification->id}})'>
                                                    Przeczytane <i class="fa-solid fa-check"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-sm btn-secondary" id="expand-button-message-{{$notification->id}}" onclick="toggleMessage({{$notification->id}})" title="Pokaż całą treść">
                                                Więcej <i class="fa-solid fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $notifications->links() }}
                @else
                    @livewire('components.no-data-content')
                @endif
            </div>
        </div>
    </div>

    <script>
        function toggleMessage(id) {
            let messageContent = $("#notification-message-content-" + id);
            messageContent.toggleClass('expanded');

            let expandButton = $("#expand-button-message-" + id);
            expandButton.toggleClass('btn-outline-secondary');
            expandButton.toggleClass('btn-secondary');

            if(expandButton.hasClass('btn-secondary')){
                expandButton.html('Więcej <i class="fa-solid fa-caret-down"></i>');
            }else{
                expandButton.html('Mniej <i class="fa-solid fa-caret-up"></i>');
            }
        }
    </script>
</div>
