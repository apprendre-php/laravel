@extends('layouts.base')

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-8">Création d'un article</h1>
    <form method="post" action="{{ route('items.store') }}">
        @csrf
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="name">
                Nom
            </label>
            <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
        </div>
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="thumbnail">
                Miniature
            </label>
            <x-input id="thumbnail" type="text" name="thumbnail" :value="old('thumbnail')" required />
        </div>
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="price">
                Prix
            </label>
            <x-input id="price" type="text" name="price" :value="old('price')" required />
        </div>
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="quantity">
                Quantité
            </label>
            <x-input id="quantity" type="text" name="quantity" :value="old('quantity')" required />
        </div>
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="description">
                Description
            </label>
            <x-input id="description" type="text" name="description" :value="old('description')" required />
        </div>
        <div class="mt-4">
            <button type="submit" class="text-center w-full text-white uppercase bg-blue-800 font-bold py-3 hover:bg-blue-500">
                Enregistrer
            </button>
        </div>
    </form>
@endsection
