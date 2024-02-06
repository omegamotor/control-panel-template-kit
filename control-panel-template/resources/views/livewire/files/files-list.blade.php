<div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pliki</h1>
    </div>

    @livewire('components.disk-space')
    @livewire('components.alert')
    @livewire('files.forms.upload-file-modal', ['breadcrumbs' => $breadcrumbs])

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">Pliki</h6>
            <div class="d-flex justify-content-between gap-1 my-2">
                @livewire('files.forms.create-directory-modal', ['breadcrumbs' => $breadcrumbs])
                <div class="showType">
                    <div class="btn-group" role="group">
                        <button type="button" title="Lista" wire:click="changeShowType('list')" class="btn btn-sm btn-outline-primary @if($showType == 'list') active @endif">
                            <i class="fa-solid fa-list"></i>
                        </button>
                        <button type="button" title="Siatka" wire:click="changeShowType('grid')" class="btn btn-sm btn-outline-primary @if($showType == 'grid') active @endif">
                            <i class="fa-solid fa-grip"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div aria-label="breadcrumb m-2">
                <ol class="breadcrumb bg-primary ">
                    <li class="breadcrumb-item text-white">
                        <a href="#" wire:click='backToMainFolder()' class="text-white">
                            <i class="fa-solid fa-house"></i>
                        </a>
                    </li>
                    @foreach ($breadcrumbs as $breadcrumb)
                        <li class="breadcrumb-item">
                            <a href="#" wire:click="backToSelectFolder('{{$loop->index}}')" class="text-white">{{$breadcrumb}}</a>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
        <div class="card-body">
            <div class="files-box files-box-{{$showType}}">
                @foreach ($directories as $directory)
                    <div class="file" wire:click="openFolder('{{$directory}}')">
                        <div class="file__icon folder-icon"><i class="fa-solid fa-folder"></i></div>
                        <div class="file__title">{{$directory}}</div>
                        <div class="file__date" style="opacity: 0 !important"> </div>
                        <div class="file__delete-btn" wire:click="deleteDirectory('{{$directory}}')" wire:click.stop title="Usuń">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>
                    </div>
                @endforeach

                @foreach ($filesWithData as $file)
                    <div class="file">
                        <a href="{{ asset('storage/'. implode('/', $this->breadcrumbs) . '/' . $file['name']) }}" target="blank">
                            <div class="file__icon file-icon">
                                @if(explode(".", $file['name'])[1] == 'png' || explode(".", $file['name'])[1] == 'jpg' )
                                    <img src="{{ asset('storage/'. implode('/', $this->breadcrumbs) . '/' . $file['name']) }}" style="height:32px; width:auto;" alt="Avatar">
                                @else
                                    <i class="fa-solid fa-file"></i>
                                @endif
                            </div>
                        </a>
                        <div class="file__title">{{$file['name']}}</div>
                        <div class="file__date">
                            Waga {{$file['size']}} MB<br>
                            Dodano {{$file['created_at']}}
                        </div>
                        <div class="file__delete-btn" wire:click="deleteFile('{{$file['name']}}')" title="Usuń">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
