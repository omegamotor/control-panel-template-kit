<div>
    @if ($type)
        <div class="alert alert-{{$classType}} alert-dismissible fade show mt-3" role="alert">
            <strong><i class="fa-solid {{$icon}}"></i> {{$type}}: </strong><br>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
