<div class="mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Miejsce na dysku
                    </div>
                    <div class="col">
                        <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{100 - number_format(($freeDiskSpace / $totalDiskSpace) * 100, 2)}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="h5 mb-0 mr-3 mt-2 font-weight-bold text-gray-800">
                        {{$freeDiskSpace}} GB / {{$totalDiskSpace}} GB
                    </div>
                </div>
                <div class="col-auto mr-2">
                    <i class="fa-solid fa-hard-drive fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
