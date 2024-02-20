<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Harmonogram {{$schedule->title}}</title>
    <link rel="stylesheet" href="{{ base_path('resources/scss/pdf.css') }}">

</head>
<body>
    <h2 class="pdf-title">Harmonogram {{$schedule->title}}</h2>

    <div style="text-align: center">
        @if($schedule->weeks)
            @foreach ($schedule->weeks as $week)
                <div class="page-break-avoid" style="margin:5px;">
                    <table cellspacing="0">
                        <thead>
                            <tr>
                                <th colspan="2" class="table-title">
                                    Tydzień nr {{$week->week_number}}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($week->workShifts as $workShift)
                                <tr>
                                    <td class="border-right">
                                        {{$weekDays[$loop->index]}}
                                    </td>
                                    <td>
                                        <div>
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
                                        <div>
                                            @if ($workShift->is_work_day)
                                                {{$workShift->getStartTime()}} - {{$workShift->getEndTime()}}
                                            @endif
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
</body>
</html>
