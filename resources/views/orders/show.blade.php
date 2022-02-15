<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Digital Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
</head>
<body class="antialiased">
<header class="bg-blue-800 text-white p-4 flex items-center" style="font-family: 'Carter One', cursive;">
    <a class="font-bold text-3xl flex-grow" href="/">My Digital Shop</a>
    <a class="underline mr-4" href="<?= route('users.index') ?>">Utilisateurs</a>
    <?php if (Auth::check()) : ?>
    <div class="mr-4"><?= Auth::user()->name ?></div>
    <form action="<?= route('logout') ?>" method="post">
        <?= csrf_field() ?>
        <button class="underline">Se déconnecter</button>
    </form>
    <?php else : ?>
    <a class="underline mr-4" href="<?= route('register.create') ?>">S'enregistrer</a>
    <a class="underline" href="<?= route('login') ?>">Se connecter</a>
    <?php endif; ?>
</header>
<div class="p-4">
    <h2 class="text-blue-800 text-2xl mb-4">Information de la commande</h2>
    <ul class="mb-4">
        <li>Numéro: <?= $order->number ?></li>
        <li>Date de création: <?= $order->created_at->format('d/m/Y') ?></li>
    </ul>
    <div class="mb-4 w-1/3">
        <a href="{{ route('orders.checkout', $order) }}" class="text-center text-white uppercase bg-yellow-500 font-bold py-3 hover:bg-yellow-300">Payer la commande</a>
    </div>
    <h2 class="text-blue-800 text-2xl mb-4">Liste des articles</h2>
    <table class="w-full">
        <thead>
        <tr class="border border-gray-200 bg-gray-200 text-gray-600 uppercase text-sm">
            <th class="py-3 px-6">Dénomination</th>
            <th class="py-3 px-6">Prix</th>
            <th class="py-3 px-6">Quantité</th>
        </tr>
        </thead>
        <tbody class="bg-white text-sm md:text-base">
        <?php foreach($order->items as $item): ?>
        <tr>
            <td class="py-3 px-6 border border-gray-200 text-left">
                <?= $item->name ?>
            </td>
            <td class="py-3 px-6 border border-gray-200 text-left">
                <?= $item->price ?>
            </td>
            <td class="py-3 px-6 border border-gray-200 text-left">
                <?= $item->pivot->quantity ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
