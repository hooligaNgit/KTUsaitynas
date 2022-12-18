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
    <title>Boxes</title>
</head>
<body>
<x-navigation>

</x-navigation>
<section>
    <div class="loader">
        <i class="fa-sharp fa-solid fa-loader"></i>
    </div>
    <div class="main">
    @can('view', \App\Models\box::class)
    <a href="boxes/create">
        <button class="button-27" role="button">Create Box</button>
    </a>
    @endcan
        @can('viewClient', \App\Models\box::class)
        <h1>Currently available boxes</h1>
        @endcan
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Dispatch date</th>
                <th>Delivery date</th>
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
                            <td>{{$data[$i]["attributes"]["status"]}}</td>
                            <td>{{$data[$i]["attributes"]["dispatch_date"]}}</td>
                            <td>{{$data[$i]["attributes"]["delivery_date"]}}</td>
                            <td>
                                @can('view', \App\Models\box::class)
                                <div>
                                    <a href="boxes/delete/{{$data[$i]["id"]}}">
                                        <button class="button-4" role="button">DELETE</button>
                                    </a>
                                </div>
                                <div>
                                    <a href="boxes/edit/{{$data[$i]["id"]}}">
                                        <button class="button-4" role="button">EDIT</button>
                                    </a>
                                </div>
                                <div>
                                    <a href="boxes/addGift/{{$data[$i]["id"]}}">
                                        <button class="button-4" role="button">ADD GIFT</button>
                                    </a>
                                </div>
                                @endcan
                                <div>
                                    <a href="boxes/boxGifts/{{$data[$i]["id"]}}">
                                        <button class="button-4" role="button">VIEW GIFTS</button>
                                    </a>
                                    @can('viewClient', \App\Models\box::class)
                                    @if(App\Http\Controllers\UserController::hasApplied($data[$i]["id"]) == 1)
                                        <a href="boxes/apply/{{$data[$i]["id"]}}">
                                            <button class="button-4" role="button" disabled>APPLIED</button>
                                        </a>
                                    @else
                                        <a href="boxes/apply/{{$data[$i]["id"]}}">
                                            <button class="button-4" role="button">APPLY</button>
                                        </a>
                                    @endif
                                </div>
                                    @endcan
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
