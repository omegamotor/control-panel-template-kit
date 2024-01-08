<div style="margin: auto; min-height: 100vh; display: flex;" >
    <div class="shadow p-4 rounded m-auto" style="min-width:390px">
        <div class="bg-body-tertiary text-center p-2 border mb-3">
            <img src="{{url('images/logo-ControlPanel.png')}}" alt="" class="">
        </div>
        <form wire:submit.prevent="register">
            <div class="mb-3">
                <label for="inputName" class="form-label">Nazwa użytkownika</label>
                <input wire:model="name" type="text" class="form-control" id="inputName" required>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input wire:model="email" type="email" class="form-control" id="inputEmail" required>
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Hasło:</label>
                <input wire:model="password" type="password" id="password" class="form-control" name="password" required>
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Potwierdź Hasło:</label>
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required>
            </div>

            <div class="text-end">
                <a href="{{ route('users.login') }}" class="small mx-2">Masz konto? Zaloguj się</a>
                <button type="submit" class="btn btn-primary">Zarejestruj</button>
            </div>
        </form>
    </div>
</div>
