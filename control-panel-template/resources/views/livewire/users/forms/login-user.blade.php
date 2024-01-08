<div style="margin: auto; min-height: 100vh; display: flex;" >
    <div class="shadow p-4 rounded m-auto" style="min-width:390px">
        <div class="bg-body-tertiary text-center p-2 border mb-3">
            <img src="{{url('images/logo-ControlPanel.png')}}" alt="" class="">
        </div>
        <form wire:submit.prevent="login">
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input wire:model="email" type="email" class="form-control" id="inputEmail" :value="old('email')" required>
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Hasło</label>
                <input wire:model="password" type="password" class="form-control" id="inputPassword" required>
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            {{-- <div class="mb-3 form-check">
                <input wire:model="remember" type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Zapamiętaj mnie</label>
            </div> --}}
            <div class="text-end">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="small mx-2">Zapomniałeś hasła?</a>
                @endif
                <button type="submit" class="btn btn-primary">Zaloguj się</button>
            </div>
        </form>
    </div>
</div>
