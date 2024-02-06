<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista użytkowników</title>
</head>
<body>
    <h2 class="pdf-title">Lista użytkowników</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nazwa użytkownika</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="page-break"></div> --}}
</body>
</html>

<style>
    .pagenum:before {content: counter(page);}
    body {font-family: DejaVu Sans;}
    .page-break {page-break-after: always;}

    .pdf-title{
        font-size: 20px;
        margin-bottom: 28px !important;
        line-height: 1.2;
    }

    table{width: 100%;}
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
    }
</style>
