@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300 font-bold uppercase mb-2']) }}>
    {{ $value ?? $slot }}
</label>
