@extends('layouts.base')

@section('content')
    @if ($orderCart)
        <h2 class="text-blue-800 text-2xl mb-4">Information de la commande</h2>
        <ul class="mb-4">
            <li>Numéro: {{ $orderCart->number }}</li>
            <li>Date de création: {{ $orderCart->created_at->format('d/m/Y') }}</li>
        </ul>
        <div class="mb-4 w-1/3">
            <a href="{{ route('orders.checkout', $orderCart) }}" class="text-center text-white uppercase bg-yellow-500 font-bold py-3 hover:bg-yellow-300">Payer la commande</a>
            <a href="{{ route('cart.cancelled', $orderCart) }}" class="text-center text-white uppercase bg-red-500 font-bold py-3 hover:bg-yellow-300">Annuler la commande</a>
        </div>
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
            @foreach($orderCart->items as $item)
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
    @else
        <h2>Il n'y a aucune commande !!!!!!!!!!!!!!!!!!!</h2>
        <a href="{{ route('items.index') }}">Retourner à la page d'accueil -></a>
    @endif
@endsection
