<div class="box-content w-100% p-4 bg-gradient-to-l from-cyan-500 to-blue-500 mb-2">
    <div class="grid lg:grid-cols-12 gap-4 md:grid-rows ">
        <div class="box-content xl:col-span-7 md:col-span-12 h-auto mb-[40px] mx-24 max-md:mx-12">
            <h1 class="text-white font-bold text-[32px] mt-7">Selamat pagi, {{ auth()->user()->name }}!</h1>
            <p class="text-white mt-2 text-[16px]">Jika kamu tidak sanggup menahan lelahnya belajar, <br>Maka bersiaplah menahan perihnya kebodohan.</p>
            <p class="text-white">~ Imam Syafi’i</p>
        </div>
        @if(!empty($contactAssistants))
        <div class=" xl:col-span-5 xs:col-span-12 mx-24 max-md:mx-12 mt-4">
        <h3 class="text-white font-bold mx-2 my-2 text-md max-md:w-full text-center max-md:ml-0">Kontak Asisten</h3>
            <div class="box-border p-2 border rounded-md">

                <div class="relative overflow-x-auto">
                    <table class="w-full text-xs text-left">
                        <thead class="text-xs text-gray-50">
                            <tr class="border-b">
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    No. Telp
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-gray-100">
                                <th scope="row" class="px-3 py-3 whitespace-nowrap ">
                                    {{$contactAssistants->name}}
                                </th>
                                <td class="px-3 py-3">
                                    {{$contactAssistants->phone_number}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        @endif

    </div>


</div>
