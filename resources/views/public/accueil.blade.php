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
    
    <div class="py-4">
        @include('public.partials.navbar')
    </div>
    
    <div class="rounded-md border border-[#3F83F8] text-black font-serif space-y-2 space-x-2 w-80">
        {{ $annonces->links() }}
    </div>


    <div class="px-10 py-4">
        
            
        <ul class="flex flex-wrap text-sm font-serif text-center text-gray-500 dark:text-gray-400">
            @forelse ( $categories as $itemCategorie )
                <li class="mr-2">
                    <a href="{{route('public.accueil.categorie', $itemCategorie->id)}}" class="inline-block px-4 py-3 text-white bg-blue-500 rounded-lg active" aria-current="page">{{$itemCategorie->name}}</a>
                </li>
                @empty   
            @endforelse    
        </ul>

    </div>
    


    <div class="grid grid-cols-2 px-10 py-6">
                
                @forelse ( $annonces as $itemAnnonce)
               @include('public.partials.card')
                @empty
                <h1 class="text-9xl font-extrabold text-black justify-center tracking-widest">ANNONCES</h1>
                
                    <div class="bg-[#FF6A3D] px-16 text-2xl font-serif rounded rotate-12 absolute">
                        PAS D'ANNONCES
                       </div>
                
                @endforelse
              
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
