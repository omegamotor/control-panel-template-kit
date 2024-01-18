@php
    use Carbon\Carbon;
@endphp

<div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Komunikator</h1>
    </div>

    @livewire('components.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Opcje</h6>
        </div>
        <div class="card-body">
            {{-- <div class="my-3 d-flex" style="align-items: baseline">
                <label for="searchBy" class="form-label form-label-sm mr-2" >Szukaj: </label>
                <input wire:model.live="searchBy" class="form-control form-control-sm mr-2" style="width: 150px;" type="text" placeholder="szukaj">

                <label for="userSortBy" class="form-label mr-2">Sortuj: </label>
                <select wire:model.lazy="sortBy" class="form-select form-select-sm mr-2" id="userSortBy">
                    <option value="ASC">A-Z</option>
                    <option value="DESC">Z-A</option>
                </select>

                <label for="userPerPage" class="form-label mr-2">Pokaż: </label>
                <select wire:model.lazy="perPage" class="form-select form-select-sm mr-2" id="userPerPage">
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="150">150</option>
                    <option value="0">Wszystko</option>
                </select>
            </div> --}}

            <div class="d-flex gap-1">
                {{-- @livewire('users.forms.create-user-modal') --}}
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rozmowy</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <section class="discussions">

                    @foreach ($users as $user)
                        <div class="discussion @if($activeUser && ($user->id == $activeUser->id)) message-active @endif" wire:click='setActiveUserTo({{$user->id}})'>
                            <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                                {{-- <div class="online"></div> --}}
                            </div>
                            <div class="desc-contact">
                                <p class="name">{{$user->name}}</p>
                                {{-- <p class="message">9 pm at the bar if possible 😳</p> --}}
                            </div>
                            {{-- <div class="timer">12 sec</div> --}}
                        </div>
                    @endforeach
                </section>


                <section class="chat">
                    <div class="header-chat mb-1">
                        <i class="icon fa fa-user-o" aria-hidden="true"></i>
                        <p class="name"> @if($activeUser) {{$activeUser->name}} @endif</p>
                        <i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>
                    </div>
                    <div id="chat-messages-box" class="messages-chat">
                        @php
                            $previousMessageAuthorId = null;
                            // $previousMessageFromAuthor = false;
                            $nextMessage = null;
                            $nextMessageFromAuthor = false;
                        @endphp

                        @foreach ($messages as $message)
                            @if ($message->author_id != Auth::id())
                                @if ($previousMessageAuthorId && $previousMessageAuthorId != Auth::id())
                                    <div class="message text-only">
                                        <p class="text"> {{$message->message}}</p>
                                    </div>
                                @else
                                    <div class="message">
                                        <div class="photo" style="background-image: url(https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80);">
                                            {{-- <div class="online"></div> --}}
                                        </div>
                                        <p class="text"> {{$message->message}} </p>
                                    </div>
                                @endif
                                @php
                                    $formattedDate = Carbon::parse($message->created_at)->isoFormat('D MMMM H:mm');

                                    if(count($messages) > $loop->index + 1){
                                        $nextMessage = $messages[$loop->index + 1];
                                        if($nextMessage->author_id == Auth::id()){
                                            $nextMessageFromAuthor = true;
                                        }else{
                                            $nextMessageFromAuthor = false;
                                        }
                                    }
                                @endphp


                                <p class="time @if( !$nextMessageFromAuthor && !$loop->last) d-none @endif"> {{ $formattedDate }}</p>
                                <div class="" style="clear:both"></div>
                            @else
                                @if ($previousMessageAuthorId && $previousMessageAuthorId != $activeUser->id)
                                    <div class="message text-only">
                                        <div class="response">
                                            <p class="text"> {{$message->message}}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="message text-only">
                                        <div class="response">
                                            <p class="text"> {{$message->message}}</p>
                                        </div>
                                    </div>
                                @endif
                                @php
                                    $formattedDate = Carbon::parse($message->created_at)->isoFormat('D MMMM H:mm');

                                    if(count($messages) > $loop->index + 1){
                                        $nextMessage = $messages[$loop->index + 1];
                                        if($nextMessage->author_id == Auth::id()){
                                            $nextMessageFromAuthor = true;
                                        }else{
                                            $nextMessageFromAuthor = false;
                                        }
                                    }
                                @endphp
                                <p class="time response-time @if($nextMessageFromAuthor && !$loop->last) d-none @endif"> {{ $formattedDate }}</p>
                                <div class="" style="clear:both"></div>
                            @endif

                            @php $previousMessageAuthorId = $message->author_id; @endphp
                        @endforeach

                    </div>
                    <div >
                        <form wire:submit.prevent="sendMessage" class="footer-chat">
                            <input type="text" class="write-message" wire:model="newMessage" placeholder="Wpisz swoją wiadomość">
                            @error('newMessage') <span class="text-danger">{{ $message }}</span> @enderror

                            @if($activeUser)
                                <button class="clickable btn btn-primary px-4" type="submit">
                                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                </button>
                            @else
                                <button class="clickable btn btn-primary disabled px-4" disabled>
                                    <i class="fa fa-paper-plane-o" aria-hidden="true" ></i>
                                </button>
                            @endif
                        </form>
                    </div>
                </section>
            </div>

        </div>
    </div>

</div>


@script
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;

        var pusher = new Pusher('6242c773ae3d51a19892', {
            cluster: 'eu'
        });

        // Chat Notifications
        var channel = pusher.subscribe('chat-channel');
        channel.bind('message', function(data) {

            if(parseInt(data.receiver_id) === parseInt(userId)){
                let time = new Date().toLocaleString('pl-PL', { hour: 'numeric', minute: '2-digit', hour12: false });
            };
        });


        // Listen for events dispatched from Livewire components...
        Livewire.on('go-to-last-messages', async () => {
            function delay(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }

            await delay(1);
            let chatMessagesBox = $('#chat-messages-box'); // Replace 'yourDivId' with the actual ID of your div

            // Check if the div has an overflow
            if (chatMessagesBox[0].scrollHeight > chatMessagesBox.innerHeight()) {
                // Scroll to the bottom of the div
                chatMessagesBox.scrollTop(chatMessagesBox[0].scrollHeight);
            }
        })

    </script>
@endscript
