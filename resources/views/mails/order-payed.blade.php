<h2>Vous venez d'acheter :</h2>

<table>
    <thead>
        <th>Nom</th>
        <th>Quantité</th>
        <th>Prix HT</th>
        <th>Prix TTC</th>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->pivot->quantity }}</td>
                <td>{{ $item->pivot->quantity*$item->price }}</td>
                <td>{{ $item->pivot->quantity*$item->price*1.2 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
