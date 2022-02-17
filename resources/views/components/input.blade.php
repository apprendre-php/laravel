@props(['name'])

<input name="{{ $name }}"
    {!! $attributes->merge(['class' => 'appearance-none block w-full border border-gray-200 text-gray-800 py-3 px-4 leading-tight focus:outline-none focus:border-gray-600']) !!}
/>
@error($name)
    <span class="text-red-500 text-sm font-semibold">{{ $message }}</span>
@enderror
