
<x-universal-layout>
    
            {{-- <div class="box-border p-1 border rounded "> --}}
                {{-- <h3 class="text-black font-bold ml-2 my-2 text-[14px]">Kursus Anda</h3> --}}
                <div class="box-border h-40  shadow-lg flex justify-center items-center max-md:justify-center flex-wrap">
                    <div class="mr-5 p-2 flex flex-wrap max-md:justify-center max-md:mr-0  mt-3">
                        <img src="{{ asset('assets/img/img1.png') }}" alt="" width="90px" height="90px" class="rounded">
                        <div class=" h-auto pl-5">
                            <h1 class="text-black font-bold text-[20px]">Web Developer</h1>
                            <p class="text-[#828282] text-[12px]">
                                <img src="assets\admin\icons\users-solid.png" alt="" class="inline mr-2">
                                {{ $member_count }} Mahasiswa Terdaftar</p>
                            <p class="text-[#828282] text-[12px]">
                                <img src="assets\admin\icons\calendar-days-solid.png" alt="" class="inline mr-2">
                                senin-jumat</p>
                            <p class="text-[#828282] text-[12px]">
                                <img src="assets\admin\icons\clock-solid.png" alt="" class="inline mr-2">
                                01.00 - 00.00
                            </p>
                        </div>
                    </div>
                    <div>
                        <x-tombol-universal href="#" class="px-6 h-auto mr-6 max-md:mr-0 mb-5">Daftar Kursus</x-tombol-universal>
                    </div>
                </div>

                <div class="h-auto w-[80vw] p-4 flex mx-auto">
                    <div class="justify-start w-[70%] mr-3">
                        <h1 class="text-[32px] font-bold text-center mb-2 ml-2">Deskripsi</h1>
                        <p class="text-[14px] text-justify ml-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis quam odio eum pariatur, laboriosam ad. Enim quis laudantium delectus saepe nesciunt cumque magnam ipsum, optio quisquam vero facere itaque recusandae. Debitis ipsa velit odit nulla. Esse quibusdam asperiores unde eos corrupti perferendis officia? Quod provident nobis officiis unde iure omnis cupiditate laboriosam voluptatum illo hic earum, quam atque possimus reprehenderit consectetur rem. Quas eum et maiores corporis, nobis magni hic, praesentium nostrum perferendis odit suscipit pariatur quo similique voluptatem repellat quisquam, eaque distinctio ad officiis minima cupiditate sapiente id omnis! Repudiandae sint quam amet odio eum asperiores? Aperiam sed consequuntur quaerat voluptatum deserunt, velit id quos quibusdam odit, minus recusandae aliquam nihil corporis saepe repellendus, nulla excepturi quia obcaecati deleniti nam dolorum adipisci temporibus. Voluptatem provident minima quis aspernatur. Nihil, expedita. Veniam asperiores nemo labore fugiat facere quis cupiditate saepe, porro repellat suscipit consectetur, eos inventore cum quam? Laborum explicabo reiciendis inventore. Cumque dignissimos sit earum doloribus sed, dolor explicabo. Ullam, ab ipsum voluptas soluta suscipit autem assumenda tempore deleniti, eveniet dolore placeat, eligendi maiores recusandae. Sit nam voluptatum quaerat, id non eius in ex vero! Corporis exercitationem atque asperiores soluta maiores harum ipsum hic, consectetur rem quis. Tempore repellendus ex quo sequi vero doloribus fuga. Tempore deleniti ipsa reprehenderit perspiciatis quaerat culpa soluta? Dicta saepe doloribus, beatae architecto repellendus odit consectetur laborum! Id cupiditate repellendus et dolorem, aliquid, tempore, labore ut cum possimus deserunt repudiandae dolorum nihil. Voluptatum voluptatem aliquid voluptatibus eligendi recusandae placeat laudantium exercitationem, adipisci quas ipsam, dolor libero sequi unde repellat? Minima reprehenderit, maxime dignissimos consectetur possimus libero ea culpa accusamus sit nostrum saepe officia facilis nihil non sunt quia voluptate itaque explicabo odio dolore voluptas. Expedita, obcaecati. Maiores aliquam consequuntur accusamus provident culpa delectus possimus, cum nisi nesciunt sed eaque sunt expedita magnam laborum harum? Cumque hic praesentium iusto consequuntur veniam eligendi at corporis quisquam repellendus accusamus illo necessitatibus totam placeat sunt, eum cum repudiandae itaque dignissimos aspernatur? Expedita consequatur temporibus mollitia in sunt, harum repellendus omnis pariatur, blanditiis, rerum nihil unde debitis dolore enim voluptates commodi modi deserunt a necessitatibus. Dolor vero doloremque eum itaque, laudantium, quibusdam temporibus iste corrupti ex voluptas atque minus, quaerat quis error. Vel saepe, mollitia laborum eaque velit animi at optio alias quae architecto est earum blanditiis rerum iure suscipit aliquid officia? Ullam repellendus, unde sit laborum error ducimus exercitationem maiores? Minima eius nemo atque id ratione exercitationem, ducimus qui sunt necessitatibus tempore quo deserunt totam inventore, nihil officia? Nostrum, reiciendis beatae? Quod temporibus nisi ipsum porro deleniti reprehenderit, qui cupiditate facere deserunt fugit rerum in magni veniam doloremque provident quae iusto! Necessitatibus incidunt rem qui culpa unde ut tempora soluta odio nostrum. Exercitationem soluta ducimus eligendi impedit, nulla magni inventore cum quas fuga reprehenderit excepturi laboriosam ipsa id aperiam quo labore ipsam quibusdam accusamus ab non incidunt facere? Distinctio, dignissimos nobis, fuga quaerat provident consectetur recusandae officiis quas tempore perspiciatis fugiat voluptatem est repudiandae placeat voluptatibus, quod iure unde commodi vel possimus voluptas odio quis vero dicta. Minus.</p>
                    </div>

                    <div class="box-border ml-3 w-[30%]">
                        <h1 class="text-[32px] font-bold text-center mb-2 ml-2">Tools</h1>
                        <ol class="list-disc ml-5">
                            <li >VS Code</li>
                            <li >Browser</li>
                            <li >Web Server</li>
                          </ol>
                    </div>
                </div>
            {{-- </div> --}}
</x-universal-layout>

<img src="{{ asset($kursus->image) }}" alt="kenapa" class="w-full h-auto rounded-md object-cover shadow-md"/> <br>
{{ $kursus->judul }} <br>
{{ $kursus->author }} <br>
{{ $kursus->hari }} <br>
{{ $kursus->jam }} <br>
{{ $kursus->description }} <br>