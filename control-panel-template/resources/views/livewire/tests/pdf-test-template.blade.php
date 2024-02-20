<div>
    <h2 class="pdf-title">Lista użytkowników</h2>
    {{-- <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nazwa użytkownika</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usersP as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    <h2 class="pdf-title">Harmonogram {{$schedule->title}}</h2>

    <div class="schedule-weeks-table-div-pdf flex-container" style="text-align: center">
        @if($schedule->weeks)
            @foreach ($schedule->weeks as $week)
                <div class="flex-item page-break-avoid" style="display:inline-block; margin:5px;">
                    <table class="table mb-3" id="dataTable"  cellspacing="0">
                        <thead class="">
                            <tr>
                                <th colspan="2" class="week-table__th">
                                    Tydzień nr {{$week->week_number}}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($week->workShifts as $workShift)
                                <tr>
                                    <td class="w-sm border-right text-center">
                                        {{$weekDays[$loop->index]}}
                                    </td>
                                    <td class="w-sm text-center">
                                        <div class="calendar-current-day-day-title" >
                                            @if ($workShift->is_work_day)
                                                @if(intval($workShift->getStartTime()) > 7)
                                                    <i class="fa-solid fa-sun text-warning"></i> Dniówka
                                                @else
                                                    <i class="fa-solid fa-moon text-secondary"></i> Nocka
                                                @endif
                                            @else
                                                <i class="fa-solid fa-house text-success"></i> Wolne
                                            @endif
                                        </div>
                                        <div class="calendar-current-day-day-title">
                                            @if ($workShift->is_work_day) {{$workShift->getStartTime()}} - {{$workShift->getEndTime()}} @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            @endforeach
        @endif
    </div>

    {{-- <div class="page-break"></div> --}}


    <style scoped>

        body {
            font-family: DejaVu Sans;
            font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .page-break {
            page-break-after: always;
        }

        .pdf-title{
            font-size: 20px;
            margin-bottom: 48px !important;
            font-weight: 500;
            line-height: 1.2;
        }

        table{
            color: #212529;
            width: 100%;
        }

        th{padding: 12px;}

        td{
            padding: 12px;
            color: #777;
            font-weight: 400;
            padding-bottom: 20px;
            padding-top: 20px;
            font-weight: 300;
            border: none;
        }

        tr{
            border-bottom: 1px solid gray;
        }


        .table-responsive{
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #fff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 1rem;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 300;
            box-sizing: border-box;
            display: block;
            width: 100%;
            overflow-x: auto;
        }
        /* .pagenum:before {content: counter(page);}
    body {font-family: DejaVu Sans !important;}
    .page-break {page-break-after: always;}

    .pdf-title{
        font-size: 20px;
        margin-bottom: 28px !important;
        line-height: 1.2;
    }
    .grid-container {
        display: grid;
        gap: 10px;
    }

    .week-table__th{
        background-color: blanchedalmond;
    }

    .w-sm{
        width: 84px;
        height: 54px;
    }

    .mb-3{
        margin-bottom: 10px;
    }

    table{
        border-spacing: 0;
        font-size: 12px;
    }

    tr{
        border: 1px solid black;
    }

    .border-right{
        border-right: 1px solid black;
    }



    .text-center{
        text-align: center;
    }

    .page-break-avoid{
        page-break-inside: avoid;

    }

    .schedule-weeks-table-div-pdf{
        /* display: flex !important; */
        /* flex-wrap: wrap !important; */
        /* gap: 1rem !important; */
        /* justify-content: space-evenly !important; */
        /* margin-top: 115px; */
        /* padding: 50px; */
        /* margin: 115px auto 0 auto; */
        /* width: calc(168px * 3); */
    /* } */

    /* .w-half {
        width: 50%;
    }

    .border{
        border: 1px solid black;
    } */

/*

    th{padding: 12px;}

    td{
        padding: 12px;
        color: #777;
        font-weight: 400;
        padding-bottom: 10px;
        padding-top: 10px;
        font-weight: 300;
        border: none;
        text-align: end;
    }

    .table-responsive{
        font-weight: 300;
        font-size: 1rem;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        box-sizing: border-box;
        display: block;
        width: 100%;
    } */
    </style>

</div>


