<a {{ $attributes->merge(['class'=>'bg-[#114D91] mt-4 py-1 rounded-md text-white flex justify-center items-center text-xl font', 'href'=>'/']) }}>
    <button>{{ $slot }}</button>
</a>