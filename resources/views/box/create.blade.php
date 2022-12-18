<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adding Queries</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/table.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/form.css') }}"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</head>
<body>
<x-navigation>

</x-navigation>
@include('flash-message')
<section>
    <form class="form-style-9" action="{{ route('storeBox') }}" method="post">
        @csrf
        <ul>
            <li>
                <input type="text" name="name" class="field-style field-full align-none" placeholder="Name" required/>
            </li>
            <li>
                <select id="status" name="status" class="field-style field-full align-none">
                    <option value="Not Ready">Not Ready</option>
                    <option value="Ready">Ready</option>
                    <option value="Dispatched">Dispatched</option>
                    <option value="Delivered">Delivered</option>
                </select>
            </li>
            <li>

                <input type="date" name="dispatch_date" class="field-style field-split align-left" placeholder="Dispatch Date" required/>
                <input type="date" name="delivery_date" class="field-style field-split align-right" placeholder="Delivery Date" required/>
            </li>
            <li>
                <input type="submit" value="Create Box" />
                <a href="/boxes">
                    <input type="button" value="Return Back"/>
                </a>
            </li>
        </ul>
    </form>
</section>
<x-footer>

</x-footer>
</body>
</html>
