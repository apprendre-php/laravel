@extends('layouts.base')

@section('content')
    <div class="p-8 grid grid-cols-8 gap-4">
        @foreach($items as $item)
        <div class="border border-gray-300">
            <div class="h-32 bg-cover bg-center" style="background-image: url({{ $item->thumbnail }})">&nbsp;</div>
            <div class="p-2">
                <x-a href="{{ route('items.show', $item) }}">{{ $item->name }}</x-a>
            </div>
            <ul class="p-2">
                <li>Prix: {{ $item->price }} €</li>
                <li>Quantité: {{ $item->quantity }}</li>
            </ul>
        </div>
        @endforeach
        <a class="border border-gray-300 flex items-center justify-center text-blue-800 hover:text-blue-500" href="{{ route('items.create') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </a>
    </div>
@endsection
