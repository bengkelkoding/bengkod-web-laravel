<!-- @props(['teks']) -->

<a {{ $attributes->merge(['class' => 'ml-5 border border-white px-5 py-1 rounded', 'href' => 'https://www.google.com']) }}>
    <button>{{ $slot }}</button>
    <!-- <p>{ { $teks } } </p> -->
</a>