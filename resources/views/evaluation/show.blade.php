@extends('base')

@section('title', 'Liste des evaluations')
@section('content')
    <h1 class="text-3xl font-bold my-4 mb-10">Attribuer des notes pour {{ $evaluation->name }}</h1>
    <div class="flex flex-wrap gap-4">
        @forelse ($students as $student)
            @php
                //Getting the points of the user
                $points = \App\Models\StudentEvaluation::where(['evaluation_id' => $evaluation->id, 'student_id' => $student->id])->first()?->points;
            @endphp

            <form action="/student/{{ $student->id }}/evaluate/{{ $evaluation->id }}" method="POST" class="border-[1px] border-gray-300 rounded-md w-90 p-4">
                <h3 class="text-2xl font-bold text-center">{{ $student->firstname }} {{ $student->lastname }}</h3>
                <hr class="my-6">
                <div class="flex justify-between items-center">
                    <label class="text-xl" >Note : <input name="points" value="{{ $points }}" min="0" max="{{ $evaluation->max_points }}" class="w-16 border-[1px] border-gray-300 rounded-md text-center" type="number"> / {{ $evaluation->max_points}}</label>
                    <button class="bg-green-500 p-3 rounded-md text-white" type="submit">Enregistrer</button>
                </div>
                @csrf
            </form>

        @empty
            <p>Aucun étudiant à évaluer</p>
        @endforelse
        {{ $students->links() }}
    </div>
@endsection

