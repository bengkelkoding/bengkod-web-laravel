<a {{ $attributes->merge(['class'=>'border border-primary-color bg-primary-color mt-4 py-1 rounded-md text-white hover:text-primary-color flex justify-center items-center text-[14px] hover:bg-white focus:bg-white active:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150', 'href'=>'/']) }}>
    <button>{{ $slot }}</button>
</a>