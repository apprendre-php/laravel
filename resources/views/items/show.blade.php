@extends('layouts.base')

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-8">{{ $item->name }}</h1>
    <div class="flex">
        <img class="w-40" src="{{ $item->thumbnail }}"/>
        <div class="p-8">
            <div class="mb-4 text-gray-500">{{ $item->description }}</div>
            <ul>
                <li>{{ $item->quantity }} unités en stock</li>
            </ul>
        </div>
        @auth
            <div class="bg-blue-100 p-4">
                <div class="text-center font-bold text-4xl text-blue-800">{{ $item->price }} €</div>
                <div>
                    <form action="{{ route('orders.addItem', $item) }}" method="post">
                        @csrf
                        <div class="flex items-center mb-4">
                            <label class="mr-4" for="quantity">Quantité:</label>
                            <input name="quantity" class="appearance-none block w-full border border-gray-200 text-gray-800 py-3 px-4 leading-tight focus:outline-none focus:border-gray-600 block mt-1 w-full" id="quantity" type="number" value="1">
                        </div>
                        <button type="submit" class="text-center w-full rounded-xl p-2 text-white uppercase bg-yellow-500 font-bold py-3 hover:bg-yellow-300">
                            Ajouter au panier
                        </button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
    <div class="mt-4 w-1/3 flex justify-between">
        <a href="{{ route('items.edit', $item) }}" class="block w-1/2 mr-4 text-center text-white uppercase bg-blue-800 font-bold p-3 hover:bg-blue-500">Editer</a>
        <form class="block w-1/2" action="{{ route('items.destroy', $item) }}" method="post">
            @csrf
            {{ method_field('delete') }}
            <button type="submit" class="text-center w-full text-white uppercase bg-red-800 font-bold p-3 hover:bg-red-500">
                Supprimer
            </button>
        </form>
    </div>
@endsection
