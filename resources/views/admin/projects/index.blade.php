@extends('layouts.admin')


@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h1>Projects</h1>

            <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Add</a>
        </div>

    </header>


    <div class="container py-5">

        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cover Image</th>
                        <th scope="col">Author</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td>
                                <img width="140" src="{{ $project->cover_image }}" alt="">
                            </td>
                            <td>{{ $project->author }}</td>
                            <td>{{ $project->project_title }}</td>
                            <td>{{ $project->slug }}</td>
                            <td>

                                <a class="btn btn-dark" href="{{ route('admin.projects.show', $project) }}">View</a>

                                <a class="btn btn-dark" href="{{ route('admin.projects.edit', $project) }}">Edit</a>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $project->id }}">
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $project->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-{{ $project->id }}">
                                                    Attention! Are you sure you want to delete
                                                    "{{ $project->project_title }}" ?
                                                </h5>

                                            </div>
                                            <div class="modal-body">
                                                Attention! You're deleting this record, operation is irreversible!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                                    method="post">
                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash">Delete</i>
                                                    </button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>

                        </tr>

                    @empty
                    @endforelse

                </tbody>


            </table>
        </div>


    </div>
@endsection
