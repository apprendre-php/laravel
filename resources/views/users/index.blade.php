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
    <table class="w-full">
        <thead>
        <tr class="border border-gray-200 bg-gray-200 text-gray-600 uppercase text-sm">
            <th class="py-3 px-6">Nom</th>
            <th class="py-3 px-6">Email</th>
        </tr>
        </thead>
        <tbody class="bg-white text-sm md:text-base">
        <?php foreach($users as $user): ?>
        <tr>
            <td class="py-3 px-6 border border-gray-200 text-left">
                <?= $user->name ?>
            </td>
            <td class="py-3 px-6 border border-gray-200 text-left">
                <?= $user->email ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
