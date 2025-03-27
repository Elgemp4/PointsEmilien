@extends('base')

@section('title', 'Liste des evaluations')
@section('content')
    <h1 class="text-3xl font-bold my-4">Listes des évaluations</h1>
    <div class="flex flex-wrap gap-4">
        @forelse ($evaluations as $evaluation)
            <div class="border-[1px] w-44  p-4 border-gray-300 rounded-md">
                <h3 class="text-2xl text-center">{{ $evaluation->name }}</h3>
                <hr class="my-4">
                <a class="flex bg-blue-400 justify-center p-4 rounded-md text-white" href="{{ route('evaluation.show', ["evaluation" => $evaluation]) }}">Évaluer</a>
            </div>
        @empty
            <p>Aucune évaluation</p>
        @endforelse
        {{ $evaluations->links() }}
    </div>
@endsection