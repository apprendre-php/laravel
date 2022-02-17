@extends('layouts.base')

@section('content')
    <h2 class="text-blue-800 text-2xl mb-4">Information de l'utilisateur</h2>
    <ul class="mb-4">
        <li>Nom: {{ $user->name }}</li>
        <li>Email: {{ $user->email }}</li>
    </ul>
    <h2 class="text-blue-800 text-2xl mb-4">Commandes de l'utilisateur</h2>
    <table class="w-full">
        <thead>
        <tr class="border border-gray-200 bg-gray-200 text-gray-600 uppercase text-sm">
            <th class="py-3 px-6">Numéro de commande</th>
            <th class="py-3 px-6">Date de création</th>
            <th class="py-3 px-6">Nombre d'articles</th>
            <th class="py-3 px-6">Prix</th>
            <th class="py-3 px-6">Statut</th>
        </tr>
        </thead>
        <tbody class="bg-white text-sm md:text-base">
        @foreach($user->orders as $order)
        <tr>
            <td class="py-3 px-6 border border-gray-200 text-left">
                <x-a href="{{ route('orders.show', $order) }}">{{ $order->number }}</x-a>
            </td>
            <td class="py-3 px-6 border border-gray-200 text-left">
                {{ $order->created_at->format('d/m/Y') }}
            </td>
            <td class="py-3 px-6 border border-gray-200 text-left">
                {{ $order->countTotalItems() }}
            </td>
            <td class="py-3 px-6 border border-gray-200 text-left">
                {{ $order->getPrice() }} €
            </td>
            <td class="py-3 px-6 border border-gray-200 text-left">
                {{ $order->status }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
