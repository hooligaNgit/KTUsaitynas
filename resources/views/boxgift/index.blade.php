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
    <h1>Gifts inside "{{$data["attributes"]["name"]}}" box</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Gift Name</th>
                @can('view', \App\Models\box::class)
                <th>Actions</th>
                @endcan
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            @for ($i = 0; $i < sizeof($data["attributes"]["gift"]); $i++)
                <tr>
                    <td>{{$data["attributes"]["gift"][$i]["name"]}}</td>
                    @can('view', \App\Models\box::class)
                    <td>
                        <div>
                            <a href="{{route('deleteGiftFromBox',["gift_id"=>$data["attributes"]["gift"][$i]["id"], "box_id" =>$data["id"]])}}">
                                <button class="button-4" role="button">DELETE GIFT</button>
                            </a>
                        </div>
                    </td>
                    @endcan
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
