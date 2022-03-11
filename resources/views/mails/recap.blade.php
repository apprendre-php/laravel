<h2>Recap de votre commande</h2>

<p>
    @foreach($order->items as $item)

        Nom : {{ $item->name }}

        Prix : {{ $item->price }} €

        Quantité : {{ $item->pivot->quantity }}

    @endforeach

        Total HT : {{ $item->price * $item->pivot->quantity }} €
        Total TTC : {{ $item->price * $item->pivot->quantity * 1.2 }} €
</p>