<!-- @props(['teks']) -->

<a
    {{ $attributes->merge(['class' => 'border border-white px-5 py-2 rounded items-center bg-white border border-transparent rounded-md font-semibold text-xl text-black uppercase tracking-widest hover:text-[#003699] hover:bg-[#F9F9F9] focus:bg-white active:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150', 'href' => 'https://www.google.com']) }}>
    <button>{{ $slot }}</button>
    <!-- <p>{ { $teks } } </p> -->
</a>
