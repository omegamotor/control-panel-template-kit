<div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Konfiguracja - Pusher (Wiadomości)</h1>
    </div>

    @livewire('components.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Opcje</h6>
        </div>
        <div class="card-body">
            <div class="d-flex gap-1 mt-3">
                @livewire('config.pusher.forms.edit-config-pusher-modal')
                <div type="button" wire:click='sendTestNotification' class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-paper-plane"></i> Wyślij powiadomienie testowe
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pusher</h6>
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
                            <td>App ID</td>
                            <td>{{$conf->app_id}}</td>
                        </tr>
                        <tr>
                            <td>APP KEY</td>
                            <td>{{$conf->app_key}}</td>
                        </tr>
                        <tr>
                            <td>APP SECRET</td>
                            <td>{{$conf->app_secret}}</td>
                        </tr>
                        <tr>
                            <td>HOST</td>
                            <td>{{$conf->host}}</td>
                        </tr>
                        <tr>
                            <td>PORT</td>
                            <td>{{$conf->port}}</td>
                        </tr>
                        <tr>
                            <td>SCHEME</td>
                            <td>{{$conf->scheme}}</td>
                        </tr>
                        <tr>
                            <td>APP CLUSTER</td>
                            <td>{{$conf->app_cluster}}</td>
                        </tr>
                    </tbody>
                </table>

            @else
                <div class="alert alert-danger">
                    Pusher nie został skonfigrowany!
                </div>
            @endif
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Przytatne informacje</h6>
        </div>
        <div class="card-body">
            <div class="d-flex gap-1 mt-3">
                <b>Pusher - <a href="https://pusher.com">Dokumentacja</a></b>
            </div>
        </div>
    </div>
</div>
