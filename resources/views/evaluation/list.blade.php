@extends('base')

@section('title', 'Liste des evaluations')
@section('content')
    <h1 class="text-3xl font-bold my-4">Listes des évaluations</h1>
    <div class="flex flex-wrap gap-4">
        @foreach ($evaluations as $evaluation)
            <div class="border-[1px] w-44  p-4 border-gray-300 rounded-md">
                <h3 class="text-2xl text-center">{{ $evaluation->name }}</h3>
                <hr class="my-4">
                <a class="flex bg-blue-400 justify-center p-4 rounded-md text-white" href="{{ route('evaluation.show', ["id" => $evaluation->id]) }}">Évaluer</a>
            </div>
        @endforeach
        {{ $evaluations->links() }}
    </div>
@endsection

{{-- <form class="border-[1px] border-gray-300 rounded-md">
                <h3 class="text-2xl font-bold text-center">{{ $evaluation->name}}</h3>
                <label class="flex justify-center">Note : <input class="w-16 border-[1px] border-gray-300 rounded-md text-center" type="number"> / {{ $evaluation->max_points}}</label>
                <button class="bg-green-500 p-3 rounded-md text-white" type="submit">Enregistrer</button>
            </form> --}}