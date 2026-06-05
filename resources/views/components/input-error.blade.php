@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-danger font-11 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li><small>{{ $message }}</small></li>
        @endforeach
    </ul>
@endif
