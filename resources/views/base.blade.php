<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    @vite("resources/css/app.css")
</head>
<body>
    <nav class="bg-blue-500 p-8">
        <ul class="flex gap-10 text-white">
            <li><a class="transition-all hover:text-red-500 text-xl" href="{{ route('student.create') }}">Étudiants</a></li>
            <li><a class="transition-all hover:text-red-500 text-xl" href="{{ route('evaluation.create') }}">Evaluations</a></li>
            <li><a class="transition-all hover:text-red-500 text-xl" href="{{ route('student.note') }}">Noter</a></li>
            <li><a class="transition-all hover:text-red-500 text-xl" href="{{ route('student.ranking') }}">Classement</a></li>  
        </ul>
    </nav>
    <div class="flex flex-col  items-center">
        @yield("content")

    </div>
</body>
</html>