<a {{ $attributes->merge(['class'=>'bg-[#114D91] mt-4 py-1 rounded-md text-white flex justify-center items-center text-[14px] hover:bg-cyan-500 focus:bg-white active:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150', 'href'=>'/']) }}>
    <button>{{ $slot }}</button>
</a>