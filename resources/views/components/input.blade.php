@props([
    'type' => 'text',
    'name',
    'value' => '',
    'required' => false,
    'autofocus' => false,
])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ old($name, $value) }}"
    {{ $required ? 'required' : '' }}
    {{ $autofocus ? 'autofocus' : '' }}
    {{ $attributes->merge(['class' => 'border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }}
/>
