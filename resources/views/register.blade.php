<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/register.css') }}"/>
    <script type="text/javascript" src="{{ URL::asset('js/login.js') }}"></script>
</head>
<body>
                <form class="space-y-4 md:space-y-6" action="{{route('apiRegister')}}" method="post">
                    @csrf
                    <div class="page">
                        <div class="container">
                            <div class="left">
                                <div class="login">Register</div>
                                <div class="eula">
                                    <p class="">
                                        I have an account <a href="/login" >Sign in</a>
                                    </p>
                                </div>
                            </div>
                            <div class="right">
                                <svg viewBox="0 0 320 300">
                                    <defs>
                                        <linearGradient
                                            inkscape:collect="always"
                                            id="linearGradient"
                                            x1="13"
                                            y1="193.49992"
                                            x2="307"
                                            y2="193.49992"
                                            gradientUnits="userSpaceOnUse">
                                            <stop
                                                style="stop-color:#ff00ff;"
                                                offset="0"
                                                id="stop876" />
                                            <stop
                                                style="stop-color:#ff0000;"
                                                offset="1"
                                                id="stop878" />
                                        </linearGradient>
                                    </defs>
                                    <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
                                </svg>
                                <div class="form">
                                    <label for="name">Name</label>
                                    <input type="name" id="name" name="name">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password">
                                    <label for="password">Repeat password</label>
                                    <input type="password" id="repeat_password" name="repeat_password">
                                    <input type="submit" id="submit" value="Submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
