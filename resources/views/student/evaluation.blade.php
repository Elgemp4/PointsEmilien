@extends('base')

@section('title', 'Gestion d\'étudiant')
@section('content')    
    <h1 class="text-3xl font-bold my-4">Listes des étudiants</h1>
    <ul class="list-disc flex flex-col gap-2">
        @foreach ($students as $student)
            <li>{{$student->firstname." ".$student->lastname}}</li>
        @endforeach
        {{ $students->links() }}
    </ul>
@endsection