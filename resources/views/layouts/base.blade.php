<?php
    use App\Models\Order;
    use Illuminate\Support\Facades\Auth;
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Digital Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
</head>
<body class="antialiased">
    <header class="bg-blue-800 text-white p-4 flex items-center" style="font-family: 'Carter One', cursive;">
        <a class="font-bold text-3xl flex-grow" href="/laravel/public/">My Digital Shop</a>
        <a class="underline mr-4" href="{{ route('users.index') }}">Utilisateurs</a>
        @auth
        <?php 
            $user = Auth::user();
            $order = Order::where('user_id',$user->id)->where('status','active')->first();
            if($order){
                $nbItem = $order->countTotalItems();
            }
            else{
                $nbItem = 0;
            }
        ?>
            <a class="underline mr-4" href="{{ route('cart.show') }}">Panier ({{ $nbItem }})</a>
            <div class="mr-4">{{ Auth::user()->name }}</div>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="underline">Se déconnecter</button>
            </form>
        @else
            <a class="underline mr-4" href="{{ route('register.create') }}">S'enregistrer</a>
            <a class="underline" href="{{ route('login') }}">Se connecter</a>
        @endauth
    </header>
    @if (session()->has('alert'))
        <x-alert :type="session()->get('alert')['type']" :message="session()->get('alert')['message']"/>
    @endif
    <div class="p-4">
        @yield('content')
    </div>
</body>
</html>
