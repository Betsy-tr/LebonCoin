@extends('layouts.user')
@section('main')

    <div class="py-3">
        <h2 class="font-serif text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Création d'une annonce
        </h2>
    </div>

    <div>
         @include('user.annonce.partials.form')
    </div>


@endsection