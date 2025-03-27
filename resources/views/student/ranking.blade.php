@extends('base')

@section('title', 'Gestion d\'étudiant')
@section('content')    
    <h1 class="text-3xl font-bold my-4">Classement des étudiants</h1>
    <div class="w-full max-w-lg grid grid-cols-3 items-end ">
        <div>
            <div class="text-center">{{isset($students[2]) ? $students[2]['student']['firstname']." ".$students[2]['student']['lastname']." (".$students[2]['total_points'].")" : ""}}</div>
            <div class="bg-gray-400 h-14 flex justify-center items-center border-[1px] border-slate-500 p-3 text-3xl">🥉</div>
        </div>
        <div>
            <div class="text-center">{{isset($students[0]) ? $students[0]['student']['firstname']." ".$students[0]['student']['lastname']." (".$students[0]['total_points'].")" : ""}}</div>
            <div class="bg-gray-400 h-36 flex justify-center items-center border-[1px] border-slate-500 p-3 text-3xl">🥇</div>
        </div>
        <div>
            <div class="text-center">{{isset($students[1]) ? $students[1]['student']['firstname']." ".$students[1]['student']['lastname']." (".$students[1]['total_points'].")" : ""}}</div>
            <div class="bg-gray-400 h-24 flex justify-center items-center border-[1px] border-slate-500 p-3 text-3xl">🥈</div>
        </div>
    </div>
    <hr class="border-[1px] border-gray-200 my-4 w-full">
    <ol start="4" class="w-lg list-decimal flex flex-col gap-2">
        @php
            $index = 0;
        @endphp
        @for ($i = 3; $i < count($students); $i++)
            @php
                $student = $students[$i];
            @endphp
            <li>
                <div class="flex justify-between w-full">
                    <span>{{$student['student']['firstname']." ".$student['student']['lastname']}}</span>
                    <span>{{ $student['total_points']}} points</span>
                </div>
            </li>
        @endfor
    </ol>
@endsection