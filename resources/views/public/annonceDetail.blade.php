<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaBonneAffaire</title>
    @vite('resources/css/app.css')
</head>
    
<body>

    @include('public.partials.navbar')

    <div class="pl-44 py-4">

        <div class="text-center max-w-sm bg-white border border-blue-500 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div>
                <img
                    class="object-cover object-center transform overflow-hidden duration-300 hover:scale-105 hover:shadow-lg"
                    src="{{Storage::url($annonce->image)}}"
                    alt=""
                />
            </div>

            <a href="{{route('user.annonce.favorisAdd', $annonce->id)}}" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>
            </a>
              
    
            <div class="p-5">
        
                <h5 class="mb-2 text-2xl font-serif tracking-tight text-blue-500 dark:text-white">{{$annonce->name}}</h5>
        
                <p class="mb-3 font-serif text-gray-700 dark:text-gray-400">{{$annonce->description}}</p>

                <p class="mb-3 font-serif text-blue-700 dark:text-gray-400">{{$annonce->prix}}€ </p>

                <p class="mb-3 font-serif text-gray-700 dark:text-gray-400">CATEGORIE : {{$annonce->categorie->name}}</p>

            
        
            </div>
        </div>
    </div>
</body>