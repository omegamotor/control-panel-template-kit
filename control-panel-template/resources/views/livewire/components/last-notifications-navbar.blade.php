
@php
    use Carbon\Carbon;
@endphp

<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Notifications -->
        @if($notReadedCount > 0)
            <span class="badge badge-danger badge-counter">{{$notReadedCount}}+</span>
        @endif
    </a>
    <!-- Dropdown - Notifications -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Centrum powiadomień
        </h6>

        @foreach ($notifications as $notification)
            <a class="dropdown-item d-flex align-items-center" href="{{route('notifications.list')}}">
                <div class="mr-3">
                    <livewire:components.alert-icon wire:key="{{ $notification->id }}" :type="$notification->type">
                </div>
                <div>
                    <div class="small text-gray-500">
                        @php
                            $formattedDate = Carbon::parse($notification->created_at)->isoFormat('D MMMM H:mm');
                        @endphp
                        {{$formattedDate}}
                    </div>
                    <span @if(!$notification->is_readed) class="font-weight-bold" @endif>
                        {{$notification->title}}
                    </span>
                </div>
            </a>
        @endforeach

        <a class="dropdown-item text-center small text-gray-500" href="{{route('notifications.list')}}">Zobacz wszystkie powiadomienia</a>
    </div>
</li>
