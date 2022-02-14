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
            <p class="mb-4"><?= $item->description ?></p>
            <ul>
                <li>Prix: <?= $item->price ?> €</li>
                <li>Quantité: <?= $item->quantity ?></li>
            </ul>
        </div>
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
