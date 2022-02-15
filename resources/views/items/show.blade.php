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
<div class="p-8">
    <h1 class="text-3xl font-bold text-blue-800 mb-8"><?= $item->name ?></h1>
    <div class="flex">
        <img class="w-40" src="<?= $item->thumbnail ?>"/>
        <div class="p-8">
            <div class="mb-4 text-gray-500"><?= $item->description ?></div>
            <ul>
                <li><?= $item->quantity ?> unités en stock</li>
            </ul>
        </div>
        <?php if (Auth::check()): ?>
        <div class="bg-blue-100 p-4">
            <div class="text-center font-bold text-4xl text-blue-800"><?= $item->price ?> €</div>
            <div>
                <form action="<?= route('orders.addItem', $item) ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="flex items-center mb-4">
                        <label class="mr-4" for="quantity">Quantité:</label>
                        <input name="quantity" class="appearance-none block w-full border border-gray-200 text-gray-800 py-3 px-4 leading-tight focus:outline-none focus:border-gray-600 block mt-1 w-full" id="quantity" type="number" value="1">
                    </div>
                    <button type="submit" class="text-center w-full rounded-xl p-2 text-white uppercase bg-yellow-500 font-bold py-3 hover:bg-yellow-300">
                        Ajouter au panier
                    </button>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="mt-4 w-1/3">
        <form action="<?= route('items.destroy', $item) ?>" method="post">
            <?= csrf_field() ?>
            <?= method_field('delete') ?>
            <button type="submit" class="text-center w-full text-white uppercase bg-red-800 font-bold py-3 hover:bg-red-500">
                Supprimer
            </button>
        </form>
    </div>
</div>
</body>
</html>
