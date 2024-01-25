<div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Konfiguracja - Mailing</h1>
    </div>

    @livewire('components.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Opcje</h6>
        </div>
        <div class="card-body">
            <h6 class="text-primary font-weight-bold">Wysyłanie wiadomości email:</h6>
            <div class="form-check form-switch">
                <input class="form-check-input ml-0" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                    wire:model='activeSending'
                    wire:click="$toggle('activeSending')"
                    >
                <label class="form-check-label ml-5" for="flexSwitchCheckDefault">
                    {{$activeSending ? "Włączone" : "Wyłączone"}}
                </label>
            </div>

            <div class="d-flex gap-1 mt-3">
                @livewire('config.email.forms.edit-config-email-modal')
                @livewire('config.email.forms.test-config-email-modal')
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mailing</h6>
        </div>
        <div class="card-body">
            @if($conf->configuration_done)
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nazwa</th>
                            <th>Ustawienie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mailer</td>
                            <td>{{$conf->mailer}}</td>
                        </tr>
                        <tr>
                            <td>Host</td>
                            <td>{{$conf->host}}</td>
                        </tr>
                        <tr>
                            <td>Port</td>
                            <td>{{$conf->port}}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>{{$conf->username}}</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>{{$conf->password}}</td>
                        </tr>
                        <tr>
                            <td>Encryption</td>
                            <td>{{$conf->encryption}}</td>
                        </tr>
                        <tr>
                            <td>From address</td>
                            <td>{{$conf->from_address}}</td>
                        </tr>
                        <tr>
                            <td>From name</td>
                            <td>{{$conf->from_name}}</td>
                        </tr>
                    </tbody>
                </table>

            @else
                <div class="alert alert-danger">
                    Mailing nie został skonfigrowany!
                </div>
            @endif
        </div>
    </div>
</div>
