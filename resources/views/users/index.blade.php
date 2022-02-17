@extends('layouts.base')

@section('content')
    <table class="w-full">
        <thead>
        <tr class="border border-gray-200 bg-gray-200 text-gray-600 uppercase text-sm">
            <th class="py-3 px-6">Nom</th>
            <th class="py-3 px-6">Email</th>
        </tr>
        </thead>
        <tbody class="bg-white text-sm md:text-base">
        @foreach($users as $user)
        <tr>
            <td class="py-3 px-6 border border-gray-200 text-left">
                <a class="underline text-blue-800 hover:text-blue-500" href="<?= route('users.show', $user) ?>"><?= $user->name ?></a>
            </td>
            <td class="py-3 px-6 border border-gray-200 text-left">
                {{ $user->email }}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
