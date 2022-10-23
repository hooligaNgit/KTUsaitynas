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
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}"/>
</head>
<body>
<div class="alert-success hidden">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    Success
</div>
<div class="alert-warning hidden">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    Warning
</div>
{{--@include('flash-message')--}}
<div class="main-block">
    <form action="#">
        <div class="info">
            <input type="text" name="name" class="name" placeholder="Name">
            <input type="text" name="name" class="units_owned" placeholder="Units Owned">
            <input type="text" name="name" class="unit_price" placeholder="Unit Price">
            <select>
                <option value="number" disabled selected>Gift Type</option>
                <option value="4" class="type_id">4</option>
            </select>
        </div>
    </form>
    <button class="btn btn-info" id="belekas">Submit</button>
</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
