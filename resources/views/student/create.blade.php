@extends('base')

@section('title', 'Gestion d\'étudiant')
@section('content')
    <form action="" method="POST" class="mt-8">
        <fieldset class="flex flex-col border-2 gap-4 rounded-sm max-w-lg border-gray-300 p-4">
            <div>
                <label>Prénom : <input class="mx-2 border-[1px] border-gray-300 p-1 rounded-md" name="firstname" type="text" value="{{ old('firstname') }}"></label>
                @error('firstname')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label>Nom de famille : <input class="mx-2 border-[1px] border-gray-300 p-1 rounded-md" name="lastname" type="text" value="{{ old('lastname') }}"></label>
                @error('lastname')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            @csrf
            <button class="bg-green-500 p-3 rounded-md text-white" type="submit">Créer</button>
        </fieldset>
        
    </form>
    <h1 class="text-3xl font-bold my-4">Listes des étudiants</h1>
    <div class="list-disc flex flex-col gap-2">
        
        @forelse ($students as $student)

            <div class="flex justify-center  flex-col items-center border-[1px] rounded-md py-3 min-w-sm border-gray-300">
                <h3 class="text-3xl mx-3">{{$student->firstname." ".$student->lastname}}</h3>
                <hr class="border-[1px] border-gray-300 w-full my-4">
                <form action="{{ route('student.delete', ['student' => $student->id]) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button class="bg-red-500 p-2 mx-3 rounded-md text-white" type="submit">Supprimer</button>
                </form>
            </div>
        @empty
            <p>Aucune évaluation n'a été trouvée</p>
        @endforelse
        {{ $students->links() }}
    </div>
@endsection