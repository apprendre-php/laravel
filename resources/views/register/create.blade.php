@extends('layouts.base')

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-8">Enregistrement</h1>
    <form method="post" action="{{ route('register.store') }}">
        @csrf
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="name">
                Nom
            </label>
            <input name="name" class="appearance-none block w-full border border-gray-200 text-gray-800 py-3 px-4 leading-tight focus:outline-none focus:border-gray-600 block mt-1 w-full" id="name" type="text" value="<?= old('name') ?>">
            <?php if($errors->first('name')): ?>
                <span class="text-red-500 text-sm font-semibold"><?= $errors->first('name') ?></span>
            <?php endif; ?>
        </div>
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
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="password_confirmation">
                Confirmation
            </label>
            <input name="password_confirmation" class="appearance-none block w-full border border-gray-200 text-gray-800 py-3 px-4 leading-tight focus:outline-none focus:border-gray-600 block mt-1 w-full" id="password_confirmation" type="password" value="<?= old('password_confirmation') ?>">
        </div>
        <div class="mt-4">
            <button type="submit" class="text-center w-full text-white uppercase bg-blue-800 font-bold py-3 hover:bg-blue-500">
                Enregistrer
            </button>
        </div>
    </form>
@endsection
