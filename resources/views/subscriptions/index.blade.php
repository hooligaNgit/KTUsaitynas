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
    <link rel="stylesheet" type="text/css" href="{{ url('/css/loader.css') }}"/>
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet" type="text/css" />
    <title>View Queries</title>
</head>
<body>
<x-navigation>

</x-navigation>
<section>
    <div class="loader">
        <i class="fa-sharp fa-solid fa-loader"></i>
    </div>
    <div class="main">
    <h1>MY subscriptions</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
            @for ($i = 0; $i < sizeof($data["attributes"]["box"]); $i++)
                <tr>
                    <td>{{$data["attributes"]["box"][$i]["name"]}}</td>
                    <td>{{$data["attributes"]["box"][$i]["status"]}}</td>
                    <td>
                        @if($data["attributes"]["box"][$i]["status"] == "Delivered")
                        <div>
                            <a href="boxes/cancel/{{$data["attributes"]["box"][$i]["id"]}}">
                                <button class="button-4" role="button" disabled>Delivered</button>
                            </a>
                        </div>
                        @else
                            <div>
                                <a href="boxes/cancel/{{$data["attributes"]["box"][$i]["id"]}}">
                                    <button class="button-4" role="button">Cancel</button>
                                </a>
                            </div>
                        @endif
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
    </div>
</section>
<x-footer>

</x-footer>
</body>
<script type="text/javascript" src="{{ URL::asset('js/loader.js') }}"></script>
</html>
