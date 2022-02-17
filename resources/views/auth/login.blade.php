@extends('layouts.base')

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-8">Authentification</h1>
    <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="email">
                Email
            </label>
            <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
        </div>
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="password">
                Mot de passe
            </label>
            <x-input id="password" type="password" name="password" required/>
        </div>
        <div class="mt-4">
            <button type="submit" class="text-center w-full text-white uppercase bg-blue-800 font-bold py-3 hover:bg-blue-500">
                Se connecter
            </button>
        </div>
    </form>
@endsection
