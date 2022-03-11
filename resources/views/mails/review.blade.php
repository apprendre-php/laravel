<h1>Récapitulatif de votre commande</h1>

@foreach($order->items as $item)

<ul>
    <li>Nom de l'article : {{ $item->name }}</li>
    <li>Quantité : {{ $item->pivot->quantity }}</li>
    <li>Prix total HT : {{ $item->price * $item->pivot->quantity }}</li>
    <li>Prix TTC : {{ ($item->price * $item->pivot->quantity)*1.2 }}</li>
</ul>


@endforeach