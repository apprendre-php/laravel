@extends('layouts.base')

@section('content')
    <h1 class="text-3xl font-bold text-blue-800 mb-8">Création d'un article</h1>
    <form method="post" action="{{ route('items.store') }}">
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
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="thumbnail">
                Miniature
            </label>
            <input name="thumbnail" class="appearance-none block w-full border border-gray-200 text-gray-800 py-3 px-4 leading-tight focus:outline-none focus:border-gray-600 block mt-1 w-full" id="thumbnail" type="text" value="<?= old('thumbnail') ?>">
            <?php if($errors->first('thumbnail')): ?>
                <span class="text-red-500 text-sm font-semibold"><?= $errors->first('thumbnail') ?></span>
            <?php endif; ?>
        </div>
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="price">
                Prix
            </label>
            <input name="price" class="appearance-none block w-full border border-gray-200 text-gray-800 py-3 px-4 leading-tight focus:outline-none focus:border-gray-600 block mt-1 w-full" id="price" type="text" value="<?= old('price') ?>">
            <?php if($errors->first('price')): ?>
                <span class="text-red-500 text-sm font-semibold"><?= $errors->first('price') ?></span>
            <?php endif; ?>
        </div>
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="quantity">
                Quantité
            </label>
            <input name="quantity" class="appearance-none block w-full border border-gray-200 text-gray-800 py-3 px-4 leading-tight focus:outline-none focus:border-gray-600 block mt-1 w-full" id="quantity" type="text" value="<?= old('quantity') ?>">
            <?php if($errors->first('quantity')): ?>
                <span class="text-red-500 text-sm font-semibold"><?= $errors->first('quantity') ?></span>
            <?php endif; ?>
        </div>
        <div class="mt-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="description">
                Description
            </label>
            <input name="description" class="appearance-none block w-full border border-gray-200 text-gray-800 py-3 px-4 leading-tight focus:outline-none focus:border-gray-600 block mt-1 w-full" id="description" type="text" value="<?= old('description') ?>">
            <?php if($errors->first('description')): ?>
                <span class="text-red-500 text-sm font-semibold"><?= $errors->first('description') ?></span>
            <?php endif; ?>
        </div>
        <div class="mt-4">
            <button type="submit" class="text-center w-full text-white uppercase bg-blue-800 font-bold py-3 hover:bg-blue-500">
                Enregistrer
            </button>
        </div>
    </form>
@endsection
