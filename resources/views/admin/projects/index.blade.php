@extends('layouts.app')

@section('content')
    <div class="container h-100">
        <div class="table-container my-4 p-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Client name</th>
                        <th scope="col">Technologies</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th>{{ $project->id }}</th>
                            <td>{{ $project->name }} <span class="badge text-bg-info">{{ $project->type->name }}</span></td>
                            <td>{{ $project->client_name }}</td>
                            <td>
                                @forelse ($project->technologies as $technology)
                                    <span class="badge text-bg-warning">{{ $technology->name }}</span>
                                @empty
                                    -- NO DATA FOUND --
                                @endforelse
                            </td>
                            <td class="">
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success"><i
                                        class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-warning"><i
                                        class="fa-solid fa-trash"></i></a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger"><i class="fa-solid fa-trash" title="delete"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $projects->links() }}
    </div>
@endsection
