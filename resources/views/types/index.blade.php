<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/table.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/button.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/createbutton.css') }}"/>
    <title>View Queries</title>
</head>
<body>
<x-navigation>

</x-navigation>
<section>
    <a href="types/create">
        <button class="button-27" role="button">Create Type</button>
    </a>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>ID</th>
                <th>Actions</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            @for ($i = 0; $i < sizeof($data); $i++)
                <tr>
                    <td>{{$data[$i]["attributes"]["name"]}}</td>
                    <td>{{$data[$i]["id"]}}</td>
                    <td>
                        <div>
                            <a href="types/delete/{{$data[$i]["id"]}}">
                                <button class="button-4" role="button">DELETE</button>
                            </a>
                        </div>
                        <div>
                            <a href="types/edit/{{$data[$i]["id"]}}">
                                <button class="button-4" role="button">EDIT</button>
                            </a>
                        </div>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
</section>
<x-footer>

</x-footer>
</body>
</html>
