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
</head>
<body>
<x-navigation>

</x-navigation>
@include('flash-message')
<section>
    <form class="form-style-9" action="{{ route('storeGift') }}" method="post">
        @csrf
        <ul>
            <li>
                <input type="text" name="name" class="field-style field-full align-none" placeholder="Name" required/>
            </li>
            <li>
                <input type="number" step="0.01" name="unit_price" class="field-style field-split align-left" placeholder="Unit Price" required/>
                <input type="number" name="units_owned" class="field-style field-split align-right" placeholder="Units Owned" required/>
            </li>
            <li>
                <select id="type_id" name="type_id" class="field-style field-full align-none">
                    @foreach($data as $type)
                    <option value={{$type["id"]}}>{{$type["attributes"]["name"]}}</option>
                    @endforeach
                </select>
            </li>
            <li>
                <input type="submit" value="Create Gift" />
                <a href="/gifts">
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
