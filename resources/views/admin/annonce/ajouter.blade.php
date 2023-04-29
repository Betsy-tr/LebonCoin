@extends('layouts.admin')
@section('main')

    <div class="py-3">
        <h2 class="font-serif text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{!empty($actu)?'Modification d\'une annonce':'Création d\'une annonce'}}
        </h2>
    </div>

    <div>
         @include('admin.annonce.partials.form')
    </div>


@endsection
