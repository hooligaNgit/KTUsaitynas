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
    <form class="form-style-9" action="{{ route('storeGiftToBox') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$dataBox["id"]}}">
        <h1>Adding gift to "{{$dataBox["attributes"]["name"]}}" box</h1>
        <ul>
            <li>
                <select id="name" name="name" class="field-style field-full align-none">
                    @foreach($data as $gift)
                        <option value={{$gift["id"]}}>{{$gift["attributes"]["name"]}}</option>
                    @endforeach
                </select>
            </li>
            <li>
                <input type="submit" value="Add Gift" />
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
