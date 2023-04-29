<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    
            <div class="p-5">
        
                <h5 class="mb-2 text-2xl font-serif tracking-tight text-blue-500 dark:text-white">{{$annonce->name}}</h5>
        
                <p class="mb-3 font-serif text-gray-700 dark:text-gray-400">{{$annonce->description}}</p>

                <p class="mb-3 font-serif text-blue-700 dark:text-gray-400">{{$annonce->prix}}€ </p>

                <p class="mb-3 font-serif text-gray-700 dark:text-gray-400">CATEGORIE : {{$annonce->categorie->name}}</p>

            
        
            </div>
        </div>
    </div>
</body>