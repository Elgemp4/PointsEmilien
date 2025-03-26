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
    <ul class="list-disc flex flex-col gap-2">
        @foreach ($students as $student)
            <li>{{$student->firstname." ".$student->lastname}}</li>
        @endforeach
        {{ $students->links() }}
    </ul>
@endsection