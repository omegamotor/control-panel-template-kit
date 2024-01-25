<div>
    {{-- @if ($type)
        <div class="alert alert-{{$classType}} alert-dismissible fade show mt-3" role="alert">
            <strong><i class="fa-solid {{$icon}}"></i> {{$type}}: </strong><br>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}


    @if (session()->has('message') && session()->has('alert-type'))
        @if (session()->get('alert-type') === 'ERROR')
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong><i class="fa-solid fa-triangle-exclamation mr-1"></i>BŁĄD: </strong>
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session()->get('alert-type') === 'SUCCESS')
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong><i class="fa-solid fa-check mr-1"></i>SUKCES: </strong>
                {{ session()->get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endif
</div>
