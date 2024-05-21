@extends('layouts.admin')


@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container">
            <h1>Update your project</h1>
        </div>

    </header>


    <div class="container py-5">

        @include('partials.validation-message')


        <form action="{{ route('admin.projects.update', $project) }}" method="post">

            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" name="author" id="author" aria-describedby="authorHelper"
                    placeholder="Your post author" value="{{ $project->author }}" />
                <small id="helpId" class="form-text text-muted">Type the author here</small>

                @error('author')
                    <div class="text-dange py-2">

                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="project_title" class="form-label">Project Title</label>
                <input type="text" class="form-control" name="project_title" id="project_title"
                    aria-describedby="project_titleHelper" value="{{ $project->project_title }}"
                    placeholder="Your post project_title" />
                <small id="helpId" class="form-text text-muted">Type the project_title of the your project</small>

                @error('project_title')
                    <div class="text-dange py-2">

                        {{ $message }}
                    </div>
                @enderror
            </div>



            <div class="mb-3">
                <label for="cover_image" class="form-label">cover_image</label>
                <input type="text" class="form-control" name="cover_image" id="cover_image"
                    aria-describedby="cover_imageHelper" value="{{ $project->cover_image }}"
                    placeholder="Your post cover_image" />
                <small id="helpId" class="form-text text-muted">Add an image here</small>

                @error('cover_image')
                    <div class="text-dange py-2">

                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="description" class="form-label"></label>
                <textarea class="form-control" name="description" id="description" rows="5">{{ $project->description }}</textarea>
                <small id="helpId" class="form-text text-muted">Add a brief description of your project</small>

                @error('description')
                    <div class="text-dange py-2">

                        {{ $message }}
                    </div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">
                Update
            </button>


        </form>


    </div>
@endsection
