<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="jquery/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="nb-container">
    <div class="nb">
        <div class="logo">
            <a href="/">Hololive x Rakuspa</a>
        </div>
        <div class="navigation">
            <li><a href="{{route('home')}}">Home</a></li> 
            <li><a href="{{route('productPage')}}">Products</a></li>
            <li><a href="{{route('cartPage')}}"><i class="fa-solid fa-cart-shopping"></i></a></li>
            @if (!Auth::check())
                <li><a href="{{route('login')}}" class="login-btn">Login</a></li>
            @endif
            @auth
            @if (Auth::user()->role == 'member')
                <li><a href="">{{Auth::user()->name}}</a></li>
                <form action="/logout" method="GET" class="logout-btn">
                    <input type="submit" value="Logout">
                </form>
            @endif
            @if (Auth::user()->role == 'admin')
                <li><a href="/admin">Admin Page</a></li>
                <form action="/logout" method="GET" class="logout-btn">
                    <input type="submit" value="Logout">
                </form>
            @endif
            @endif
        </div>
    </div>
</div>
<div>
    @yield('content')
    



</div>
</body>
</html>