<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Queries</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left dark:text-black">
        <thead class="text-xs uppercase dark:bg-gray-600 dark:text-white">
        <tr>
            <th scope="col" class="py-3 px-6 text-center text-2xl">
                Gift Name
            </th>
            <th scope="col" class="py-3 px-6 text-center text-2xl">
                Unit price
            </th>
            <th scope="col" class="py-3 px-6 text-center text-2xl">
                Units owned
            </th>
            <th scope="col" class="py-3 px-6 text-center text-2xl">
                Actions
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr class="bg-white border-b dark:bg-gray-300 dark:border-gray-600 dark:hover:bg-gray-100">
                <th scope="row"
                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-black text-center">
                    {{$item->name}}
                </th>
                <td class="py-4 px-6 text-center">
                    €{{$item->unit_price}}
                </td>
                <td class="py-4 px-6 text-center">
                    {{$item->units_owned}}
                </td>
                <td class="py-4 px-6 text-center">
                    <x-button>
                        <a class="btn btn--delete">Delete</a>
                    </x-button>
                    <x-button>
                        <a href="gifts/edit/{{$item->id}}" class="btn btn-primary btn-xs">Edit</a>
                    </x-button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{$data->links()}}
    </div>
</div>
<script>
    var items=({!! json_encode($data) !!});
</script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
