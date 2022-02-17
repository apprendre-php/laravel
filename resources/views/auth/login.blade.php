@extends('layouts.base')

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-8">Authentification</h1>
    <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="email">
                Email
            </label>
            <input name="email" class="appearance-none block w-full border border-gray-200 text-gray-800 py-3 px-4 leading-tight focus:outline-none focus:border-gray-600 block mt-1 w-full" id="email" type="text" value="<?= old('email') ?>">
            <?php if($errors->first('email')): ?>
                <span class="text-red-500 text-sm font-semibold"><?= $errors->first('email') ?></span>
            <?php endif; ?>
        </div>
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="password">
                Mot de passe
            </label>
            <input name="password" class="appearance-none block w-full border border-gray-200 text-gray-800 py-3 px-4 leading-tight focus:outline-none focus:border-gray-600 block mt-1 w-full" id="password" type="password" value="<?= old('password') ?>">
            <?php if($errors->first('password')): ?>
                <span class="text-red-500 text-sm font-semibold"><?= $errors->first('password') ?></span>
            <?php endif; ?>
        </div>
        <div class="mt-4">
            <button type="submit" class="text-center w-full text-white uppercase bg-blue-800 font-bold py-3 hover:bg-blue-500">
                Se connecter
            </button>
        </div>
    </form>
@endsection
