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
<header class="text-center bg-blue-800 text-white font-bold text-3xl py-4" style="font-family: 'Carter One', cursive;">
    <a href="/">My Digital Shop</a>
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
</div>
</body>
</html>
