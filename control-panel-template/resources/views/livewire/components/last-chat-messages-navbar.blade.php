@php
    use Carbon\Carbon;
@endphp

<div>
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            @if($notReadedCount > 0)
                <span class="badge badge-danger badge-counter">{{$notReadedCount}}</span>
            @endif
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
                Centrum wiadomości
            </h6>

            @foreach ($messages as $message)
                <a class="dropdown-item d-flex align-items-center" href="{{route('chats.view', ['userId' => $message->author_id])}}">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="{{url('images/sb-admin-2/undraw_profile_1.svg')}}"
                            alt="...">
                        {{-- <div class="status-indicator bg-success"></div> --}}
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">
                            {{$message->message}}
                        </div>
                        <div class="small text-gray-500">
                            {{$message->author->name}} ·
                            @php
                                $created_at = Carbon::parse($message->created_at)->ago();
                            @endphp
                            {{$created_at}}
                        </div>
                    </div>
                </a>
            @endforeach

            {{-- <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="{{url('images/sb-admin-2/undraw_profile_2.svg')}}"
                        alt="...">
                    <div class="status-indicator"></div>
                </div>
                <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how
                        would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="{{url('images/sb-admin-2/undraw_profile_3.svg')}}"
                        alt="...">
                    <div class="status-indicator bg-warning"></div>
                </div>
                <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with
                        the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                        alt="...">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                        told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                </div>
            </a> --}}
            <a class="dropdown-item text-center small text-gray-500" href="{{route('chats.view')}}">Więcej wiadomości</a>
        </div>
    </li>
</div>
