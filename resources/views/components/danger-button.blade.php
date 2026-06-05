<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-block w-100 btn-danger uppercase']) }}>
    {{ $slot }}
</button>
