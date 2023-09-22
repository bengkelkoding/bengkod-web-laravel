<x-app-layout>
    <x-slot name="header">
        Bengkel Koding
    </x-slot>

    <x-header />

    <div class="mx-48 max-md:mx-4 flex flex-col max-lg:justify-center max-lg:items-center border rounded-md p-10">
        <h3 class="text-black font-bold text-[14px] max-md:w-full max-md:text-center max-md:ml-0">Detail Penugasan</h3>
        <div class="mt-7 h-auto shadow-lg flex justify-between items-center max-lg:justify-center flex-wrap rounded-md">
            <div class="p-9 max-md:mr-0 max-md:p-0 h-auto pl-5 max-md:pl-2">
                <h1 class="text-black font-bold text-[20px] max-md:my-2 mb-4">{{ $assignment->judul }}</h1>
                <table class="">
                    <tr>
                        <td class="pr-5">Deskripsi</td>
                        <td class="pr-3">:</td>
                        <td class="max-w-[500px]">{{ $assignment->deskripsi }} Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis fugit eaque ab modi possimus deleniti ipsum laborum, deserunt temporibus optio iste eos est totam quos impedit ad nemo nihil fuga? Blanditiis, nisi odio nemo animi optio ad atque doloribus, ullam non molestiae aperiam quisquam impedit, asperiores dolor. Obcaecati, repudiandae modi. Incidunt blanditiis vitae, ratione fugiat sit voluptatibus ipsum voluptate, dolore, hic aspernatur temporibus totam nostrum ut? Explicabo tempora necessitatibus maxime totam accusantium distinctio fugiat at, animi, corrupti possimus soluta vel! Voluptatem error ipsam, cupiditate a, exercitationem corrupti totam necessitatibus pariatur quo tempora tenetur. Soluta accusantium deleniti quibusdam, neque nesciunt accusamus. </td>
                    </tr>
                    <tr>
                        <td class="pr-5">File</td>
                        <td class="pr-3">:</td>
                        <td class="min-w-[500px]">{{ $assignment->file_soal }}</td>
                    </tr>
                    <tr>
                        <td class="pr-5">Waktu Mulai</td>
                        <td class="pr-3">:</td>
                        <td class="min-w-[500px]">{{ $assignment->waktu_mulai }}</td>
                    </tr>
                    <tr>
                        <td class="pr-5">Waktu Selesai</td>
                        <td class="pr-3">:</td>
                        <td class="min-w-[500px]">{{ $assignment->deadline }}</td>
                    </tr>
                </table>
            </div>
            <div>
                <p>tempat kump</p>
            </div>
        </div>
    </div>

    <pre>
        
        
        
        
        
    </pre>

</x-app-layout>