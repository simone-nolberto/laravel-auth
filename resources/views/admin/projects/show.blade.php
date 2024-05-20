@extends('layouts.admin')


@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container">
            <h1>{{ $project->title }}</h1>
        </div>

    </header>


    <div class="container py-5">

        <img width="140" src="{{ $project->cover_image }}" alt="">

        <p>{{ $project->description }}</p>

    </div>
@endsection
