
@props(['active' => false])

@php
    $defaultClasses = 'block text-left px-3 text-xs leading-6 hover:bg-blue-300 focus:bg-blue-300 hover:text-white focus:text-white';

    if ($active) {
        $defaultClasses .= ' bg-blue-300 text-white';
    }
@endphp
<a {{ $attributes(['class' => $defaultClasses]) }}>
    {{ $slot }}
</a>