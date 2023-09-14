<!-- @props(['teks']) -->

<a {{ $attributes->merge(['class' => 'border border-white px-5 py-2 rounded items-center bg-[#114D91] border border-transparent rounded-md font-semibold text-xl text-white uppercase tracking-widest hover:text-[#114D91] hover:bg-white focus:bg-white active:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150', 'href' => 'https://www.google.com']) }}>
    <button>{{ $slot }}</button>
    <!-- <p>{ { $teks } } </p> -->
</a>