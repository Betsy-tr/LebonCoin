@extends('layouts.user')
@section('main')

<div class="py-3">
    <h2 class="font-serif text-2xl text-gray-800 dark:text-gray-200 leading-tight">
        ANNONCES 
    </h2>
</div>

<div class="relative py-10 overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="font-serif text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    IMAGES
                </th>

                <th scope="col" class="px-6 py-3">
                    TITRES
                </th>

                <th class="font-serif text-xs text-gray-700 uppercase dark:text-gray-400" scope="col" class="px-6 py-3">
                    CATEGORIES
                </th>
                <th class="font-serif text-xs text-gray-700 uppercase dark:text-gray-400" scope="col" class="px-6 py-3">
                    ACTION
                </th>

                
            </tr>
        </thead>
        <tbody>
            @forelse ($annonces as $itemAnnonce )
            <tr>
                
                <th class="flex gap-3 px-6 py-4"> 
                <div class="relative h-10 w-10">
                <img class="h-full w-full object-cover object-center" src="{{Storage::url($itemAnnonce->image)}}" alt="" />
                </div>
                </th>

                <th scope="col" class="px-6 py-3 font-serif">
                    {{$itemAnnonce->name}}
                </th>

                <th scope="col" class="px-3 py-3 font-serif">
                    {{$itemAnnonce->categorie->name}}
                </th>
                
                <td class="px-6 py-4">

                <a href="{{route('user.annonce.edit', $itemAnnonce->id)}}" class="font-serif text-blue-600 dark:text-blue-500 hover:underline ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                    </svg>
                  </a>

                </td>

                <td class="px-6 py-4">
                    
                    <a href="{{route('user.annonce.delete', $itemAnnonce->id)}}" class="font-serif text-blue-600 dark:text-blue-500 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                          </svg>      
                    </a>

                   

                </td>

            </tr>  
            @empty
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
            
        </tbody>
    </table>
</div>


@endsection
