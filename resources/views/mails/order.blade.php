<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

</body>

</html>
<h2 class="text-blue-800 text-2xl mb-4">Récapitulatif de la commande</h2>
<ul class="mb-4">
    <li>Numéro: {{ $order->number }}</li>
    <li>Date de création: {{ $order->created_at->format('d/m/Y') }}</li>
</ul>
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
        @foreach($order->items as $item)
        <tr>
            <td class="py-3 px-6 border border-gray-200 text-left">
                {{ $item->name }}
            </td>
            <td class="py-3 px-6 border border-gray-200 text-left">
                {{ $item->price }}
            </td>
            <td class="py-3 px-6 border border-gray-200 text-left">
                {{ $item->pivot->quantity }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="flex items-end flex-col mt-4 text-lg">
    <span>Prix HT : {{ $order->getPrice() }} €</span>
    <span class="font-bold">Prix TTC : {{ $order->getPrice(true) }} €</span>
</div>
</body>

</html>