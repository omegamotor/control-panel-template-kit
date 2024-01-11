<div id="toast-notification-container" class="toast-container position-fixed bottom-0 end-0 p-3">

</div>


@script
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;

        var pusher = new Pusher('6242c773ae3d51a19892', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('alert-channel');
        channel.bind('alert', function(data) {
            // Livewire.dispatch('newNotification', {data: data});

            let bgColor;
            let icon;
            let time = new Date().toLocaleString('pl-PL', { hour: 'numeric', minute: '2-digit', hour12: false });

            if(data.type == 'SUCCESS'){
                icon = 'fa-solid fa-circle-check';
                bgColor = 'bg-success';
            }else if(data.type == 'INFO'){
                icon = 'fa-solid fa-circle-info';
                bgColor = 'bg-primary';
            }
            else if(data.type == 'WARNING'){
                icon = 'fa-solid fa-triangle-exclamation';
                bgColor = 'bg-warning';
            }
            else if(data.type == 'DANGER'){
                icon = 'fa-solid fa-triangle-exclamation';
                bgColor = 'bg-danger';
            }
            else if(data.type == 'ERROR'){
                icon = 'fa-solid fa-triangle-exclamation';
                bgColor = 'bg-danger';
            }
            else{
                icon = 'fa-regular fa-circle-question';
                bgColor = 'bg-secondary';
            }

            let toastDiv = `
                    <div class="toast-header bg-primary-subtle">
                        <div class="alert-toas-icon me-2">
                            <div class="${bgColor} rounded py-1 px-2">
                                <i class="${icon} text-white"></i>
                            </div>
                        </div>

                        <strong class="me-auto">${data.title}</strong>
                        <small>${time}</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                            ${data.message}
                    </div>
            `;

            let newToast = $('<div>', {
                class: 'toast show',
                role: 'alert',
                    'aria-live': 'assertive',
                    'aria-atomic': 'true',
                html: toastDiv
            });

            // Dodajemy nowy div z toastem do istniejącego kontenera
            $('#toast-notification-container').append(newToast);
        });
    </script>
@endscript
