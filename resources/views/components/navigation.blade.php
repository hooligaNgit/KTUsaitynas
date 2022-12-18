<link rel="stylesheet" type="text/css" href="{{ url('/css/navigation.css') }}"/>
<header>
    <nav class="navbar">
        <a href="/boxes" class="nav-branding">DIPIDI</a>

        <ul class="nav-menu">

            <li class="nav-item">
                <a href="/boxes" class="nav-link">Boxes</a>
            </li>
            @can('view', \App\Models\box::class)
            <li class="nav-item">
                <a href="/gifts" class="nav-link">Gifts</a>
            </li>
            <li class="nav-item">
                <a href="/types" class="nav-link">Types</a>
            </li>
            @endcan
            @can('viewClient', \App\Models\box::class)
            <li class="nav-item">
                <a href="/subscriptions" class="nav-link">Subscriptions</a>
            </li>
            @endcan
            <li class="nav-item">
                <a href="/logout" id="profile-button"><img src="{{url('/power.svg')}}">
                    </a>
            </li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</header>
<script type="text/javascript" src="{{ URL::asset('js/navigation.js') }}"></script>
