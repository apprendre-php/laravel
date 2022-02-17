@extends('layouts.base')

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-8">Enregistrement</h1>
    <form method="post" action="{{ route('register.store') }}">
        @csrf
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="name">
                Nom
            </label>
            <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
        </div>
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="email">
                Email
            </label>
            <x-input id="email" type="email" name="email" :value="old('email')" required />
        </div>
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="password">
                Mot de passe
            </label>
            <x-input id="password" type="password" name="password" :value="old('password')" required />
        </div>
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="password_confirmation">
                Confirmation
            </label>
            <x-input id="password_confirmation" type="password" name="password_confirmation" :value="old('password_confirmation')" required />
        </div>
        <div class="mt-4">
            <button type="submit" class="text-center w-full text-white uppercase bg-blue-800 font-bold py-3 hover:bg-blue-500">
                Enregistrer
            </button>
        </div>
    </form>
@endsection
