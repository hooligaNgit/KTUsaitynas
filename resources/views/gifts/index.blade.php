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
    <a href="gifts/create">
    <button class="button-27" role="button">Create Gift</button>
    </a>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Unit Price</th>
                <th>Units Owned</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            @foreach($dataTypes as $type)
                @for ($i = 0; $i < sizeof($data); $i++)
                    @if($type["id"] == $data[$i]["attributes"]["type_id"])
                    <tr>
                    <td>{{$data[$i]["attributes"]["name"]}}</td>
                    <td>{{$data[$i]["attributes"]["unit_price"]}}€</td>
                    <td>{{$data[$i]["attributes"]["units_owned"]}}</td>
                    <td>{{$type["attributes"]["name"]}}</td>
                    <td>
                        <div>
                            <a href="gifts/delete/{{$data[$i]["id"]}}">
                                <button class="button-4" role="button">DELETE</button>
                            </a>
                        </div>
                        <div>
                            <a href="gifts/edit/{{$data[$i]["id"]}}">
                                <button class="button-4" role="button">EDIT</button>
                            </a>
                        </div>
                    </td>
                        </tr>
                    @endif
                @endfor
            @endforeach
            </tbody>
        </table>
    </div>
</section>
<x-footer>

</x-footer>
</body>
</html>
