@extends('layouts.base')

@section('content')
    <h2 class="text-blue-800 text-2xl mb-4">Information de la commande</h2>
    @if (Auth::user()->orders()->where('status', 'active')->first())
    <ul class="mb-4">
        <li>Numéro: {{ $order->number }}</li>
        <li>Date de création: {{ $order->created_at->format('d/m/Y') }}</li>
    </ul>
    <div class="mb-4">
        <a href="{{ route('orders.checkout', $order) }}" class="text-center text-white uppercase bg-green-500 font-bold p-3 hover:bg-green-300">Payer la commande</a>
        <a href="{{ route('orders.cancell', $order) }}" class="text-center text-white uppercase bg-red-500 font-bold p-3 hover:bg-red-300">Annuler la commande</a>
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
    @else
    Commande annulée ou payée
    @endif
@endsection
