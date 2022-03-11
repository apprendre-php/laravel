<div>

    Objects achetée : {{ foreach($order->items as $item){ 
        echo 'Vous avez commandé un ' . $item->name . 'en quantitée de ' . $order->quantity . ' pour le prix de ' .  $item->price . ' unité';
    } }}

    Le prix HT : {{ foreach($order->items as $item) { <!-- Calcul du prix total de chaque objet en fonction du prix et de la quantitée. -->
        $priceHT = $order->price + $order->quantity <!-- echo du prix HT -->
        $priceHT = 
    }
    }}

    Le prix TTC : XXX <!-- Le prix HT * 1.20 soit  {{ $prixTTC = $prixHT * 1.20 }} -->

</div>