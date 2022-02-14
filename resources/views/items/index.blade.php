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
<div class="p-8 grid grid-cols-8 gap-4">
    <?php foreach($items as $item): ?>
    <div class="border border-gray-300">
        <div class="h-32 bg-cover bg-center" style="background-image: url(<?= $item->thumbnail ?>)">&nbsp;</div>
        <div class="p-2"><?= $item->name ?></div>
        <ul class="p-2">
            <li>Prix: <?= $item->price ?> €</li>
            <li>Quantité: <?= $item->quantity ?></li>
        </ul>
    </div>
    <?php endforeach; ?>
</div>
</body>
</html>
