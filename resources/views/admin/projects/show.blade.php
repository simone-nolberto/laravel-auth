@extends('layouts.admin')


@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container">
            <h1>{{ $project->project_title }}</h1>
        </div>

    </header>


    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <img class="card-img-top" src="{{ $project->cover_image }}"
                    alt="image describing the following{{ $project->project_title }}">
            </div>
            <div class="col">

                <div class="container my-5 d-flex justify-content-between">
                    <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}"><i
                            class="fa-solid fa-pen"></i>EDIT</a>
                    <!-- Modal trigger button -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#modalId-{{ $project->id }}">
                        DELETE
                    </button>

                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static"
                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $project->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId-{{ $project->id }}">
                                        Attention! Are you sure you want to delete "{{ $project->project_title }}" ?
                                    </h5>

                                </div>
                                <div class="modal-body">
                                    Attention! You're deleting this record, operation is irreversible!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="post">
                                        @csrf

                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash">DELETE</i>
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body bg-white">
                        <h2 class="card-title"> {{ $project->title }} </h2>
                        <p class="card-text">
                            {{ $project->description }}
                        </p>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <span><strong>Author:{{ $project->author }} </strong></span>
                        <span><strong>Created at:{{ $project->created_at }} </strong></span>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
