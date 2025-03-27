@extends('base')

@section('title', 'Gestion des évaluations')
@section('content')
    <form action="" method="POST" class="mt-8">
        <fieldset class="flex flex-col border-2 gap-4 rounded-sm max-w-lg border-gray-300 p-4">
            <div>
                <label>Nom de l'exercice : <input class="mx-2 border-[1px] border-gray-300 p-1 rounded-md" name="name" type="text" value="{{ old('name') }}"></label>
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Points : <input class="mx-2 border-[1px] border-gray-300 p-1 rounded-md" name="max_points" type="number" value="{{ old('max_points') }}"></label>
                @error('max_points')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            @csrf
            <button class="bg-green-500 p-3 rounded-md text-white" type="submit">Créer</button>
        </fieldset>
        
    </form>
    <h1 class="text-3xl font-bold my-4">Listes des évaluations</h1>
    <div class="list-disc flex flex-col gap-2">
        
        @forelse ($evaluations as $evaluation)

            <div class="flex justify-center  flex-col items-center border-[1px] rounded-md py-3 min-w-sm border-gray-300">
                <h3 class="text-3xl mx-3">{{$evaluation->name." /".$evaluation->max_points}}</h3>
                <hr class="border-[1px] border-gray-300 w-full my-4">
                <form action="{{ route('evaluation.delete', ['evaluation' => $evaluation->id]) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button class="bg-red-500 p-2 mx-3 rounded-md text-white" type="submit">Supprimer</button>
                </form>
            </div>
        @empty
            <p>Aucune évaluation n'a été trouvée</p>
        @endforelse
        {{ $evaluations->links() }}
    </div>
@endsection