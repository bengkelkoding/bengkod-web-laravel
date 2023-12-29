@php
use Carbon\Carbon;

$currentTime = Carbon::now('Asia/Jakarta');
$hour = $currentTime->hour;

if ($hour >= 5 && $hour < 12) {
    $selamat = "Pagi";
} elseif ($hour >= 12 && $hour < 15) {
    $selamat = "Siang";
} elseif ($hour >= 15 && $hour < 18) {
    $selamat = "Sore";
} else {
    $selamat = "Malam";
}
@endphp

<x-app-layout>
    <div class="box-content container mx-auto rounded-lg my-10 p-4 bg-gradient-to-l from-blue-500 to-cyan-500 mb-2">
        <div class="text-center text-white py-20">
            <h1 class="text-4xl text-white font-semibold">Selamat {{ $selamat }}, {{ auth()->user()->name }}!</h1>
            <p class="mt-3 text-lg">Jika kamu tidak sanggup menahan lelahnya belajar, Maka bersiaplah menahan perihnya kebodohan.</p>
            <p class="text-lg">~ Imam Syafi’i ~</p>
        </div>
    </div>
    <div class="container mx-auto flex justify-center gap-4 mt-5">
        <div class="bg-white rounded-md p-4 w-max h-max">
            <div class="w-max">
                <h3 class="text-black font-semibold text-lg mb-2 text-center">Kursus</h3>
                <div class="border p-3 flex items-center rounded-md hover:shadow-md transition duration-150 ease-in-out gap-4">
                    <img src="{{ asset($course->image) }}" alt="" width="90px" height="90px" class="rounded max-md:my-3">
                    <div class="h-auto max-md:pl-2">
                        <h1 class="text-black font-bold text-[20px] max-md:my-2">{{ $course->title }}</h1>
                        <a href="{{ env('APP_URL_QUARTO').$course->url }}" target="_blank" class="px-6 border border-primary-color bg-primary-color mt-4 py-1 rounded-md text-white hover:text-primary-color flex justify-center items-center text-[14px] hover:bg-primary-color/80 focus:bg-primary-color/80 active:bg-primary-color/80 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Belajar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md text-center h-max p-4 w-[50%]">
            <p class="text-black font-bold mb-2 text-lg">Penugasan</p>
            <div class="overflow-auto rounded-lg border">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">No.</th>
                            <th class="w-40 p-3 text-sm font-semibold tracking-wide text-left">Details</th>
                            <th class="w-28 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Waktu Dibuka</th>
                            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Deadline</th>
                            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left">Nilai</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @php
                            $no = 1;
                        @endphp
                        @forelse($assignments as $as)
                        @php
                            $start_time = \Carbon\Carbon::parse($as->start_time)
                                            ->locale('id')->isoFormat('dddd, D MMMM Y, HH:mm');
                            $deadline = \Carbon\Carbon::parse($as->deadline)
                                            ->locale('id')->isoFormat('dddd, D MMMM Y, HH:mm');
                        @endphp
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                {{ $no }}
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <a href="{{ route('task-detail', $as->id) }}" class="font-bold text-blue-500 hover:underline">{{ $as->title }}</a>
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                @php
                                    $user_task = $as->classroom->classManagements->where('id_classroom', $as->id_classroom)->where('id_student', auth()->user()->id)->first()->student->where('id', auth()->user()->id)->first();
                                @endphp
                                @isset($user_task->task)
                                    @php
                                        $task_mhs = $user_task->task->where('id_student', auth()->user()->id)->where('id_assignment', $as->id)->first();
                                    @endphp
                                    @if($task_mhs !== null)
                                        @if($task_mhs->task_file === null)
                                        <span
                                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">Belum Submit</span>
                                        @elseif($task_mhs->status === 0)
                                        <span
                                            class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">Belum Submit</span>
                                        @elseif($task_mhs->status === 1)
                                        <span
                                            class="p-1.5 text-xs font-medium uppercase tracking-wider ttext-green-800 bg-green-200 rounded-lg bg-opacity-50">Submit</span>
                                        @endif
                                    @else
                                    <span
                                    class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 rounded-lg bg-opacity-50">Belum Upload</span>
                                    @endif
                                @else
                                    <span
                                    class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 rounded-lg bg-opacity-50">Belum Upload</span>
                                @endisset
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                {{ $start_time }}
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                {{ $deadline }}
                            </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                @isset($user_task->task)
                                    @if($task_mhs !== null)
                                        @if($task_mhs->final_score=== null)
                                        Belum dinilai
                                        @else
                                        {{ $task_mhs->final_score}}
                                        @endif
                                    @else
                                    Belum upload
                                    @endif
                                @else
                                Belum upload
                                @endisset
                            </td>
                        </tr>
                        @php
                            $no++;
                        @endphp
                        @empty
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap text-center" colspan="6">Belum ada tugas</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Mobile View --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:hidden">
                @php
                    $no = 1;
                @endphp
                @forelse($assignments as $as)
                @php
                    $start_time = \Carbon\Carbon::parse($as->start_time)->locale('id')->isoFormat('dddd, D MMMM Y, HH:mm');
                    $deadline = \Carbon\Carbon::parse($as->deadline)->locale('id')->isoFormat('dddd, D MMMM Y, HH:mm');
                @endphp

                <div class="bg-white space-y-3 p-4 rounded-lg shadow">
                    <p>{{ $no }}</p>
                    <div class="flex items-center space-x-2 text-sm">
                        <div class="text-gray-500">{{ $start_time }}</div>
                        <div>
                            @php
                                $user_task = $as->classroom->classManagements->where('id_classroom', $as->id_classroom)->where('id_student', auth()->user()->id)->first()->student->where('id', auth()->user()->id)->first();
                            @endphp
                            @isset($user_task->task)
                                @php
                                    $task_mhs = $user_task->task->where('id_student', auth()->user()->id)->where('id_assignment', $as->id)->first();
                                @endphp
                                @if($task_mhs === null)
                                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 rounded-lg bg-opacity-50">Belum Upload</span>
                                @elseif($task_mhs->task_file === null)
                                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">Belum Submit</span>
                                @elseif($task_mhs->status === 0)
                                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-yellow-800 bg-yellow-200 rounded-lg bg-opacity-50">Belum Submit</span>
                                @elseif($task_mhs->status === 1)
                                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">Submit</span>
                                @endif
                            @else
                                <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-red-800 bg-red-200 rounded-lg bg-opacity-50">Belum Upload</span>
                            @endisset
                        </div>
                    </div>
                    <div class="text-sm text-gray-700">
                        <a href="{{ route('task-detail', $as->id) }}" class="text-blue-500 font-bold hover:underline">{{ $as->title }}</a>
                    </div>
                    <div class="text-sm font-medium text-black">
                        @isset($user_task->task)
                            @if($task_mhs === null)
                                Belum Upload
                            @elseif($task_mhs->final_score === null)
                                Belum dinilai
                            @else
                                {{ $task_mhs->final_score }}
                            @endif
                        @else
                            Belum Upload
                        @endisset
                    </div>
                </div>

            @php
                $no++;
            @endphp
        @empty
            <div class="bg-white p-4 rounded-lg shadow text-center">Belum ada tugas</div>
        @endforelse
        </div>
        </div>
        <div class="bg-white rounded-md h-max flex flex-col justify-center items-center p-4">
            <h3 class="text-black font-bold mb-2 text-lg">Nilai Akhir</h3>
            <div class="border-box w-[125px] h-[86px] bg-[#00C1361A] flex justify-center items-center rounded">
                @php $value = 0; @endphp
                @forelse($studentTask as $task)
                    @php $value += $task->final_score; @endphp
                @empty
                    @php $value += 0; @endphp
                @endforelse
                @if(!$studentTask->isEmpty())
                <h1 class="text-[#00C136] text-[40px] font-bold">{{ round(($value) / $studentTask->count()) }}</h1>
                @else
                <h1 class="text-[#00C136] text-[40px] font-bold">-</h1>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>