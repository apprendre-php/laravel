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
        <div class="p-2">
            <a class="underline text-blue-800 hover:text-blue-500" href="<?= route('items.show', $item) ?>"><?= $item->name ?></a>
        </div>
        <ul class="p-2">
            <li>Prix: <?= $item->price ?> €</li>
            <li>Quantité: <?= $item->quantity ?></li>
        </ul>
    </div>
    <?php endforeach; ?>
    <a class="border border-gray-300 flex items-center justify-center text-blue-800 hover:text-blue-500" href="<?= route('items.create') ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </a>
</div>
</body>
</html>
