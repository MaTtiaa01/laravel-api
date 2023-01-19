@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h1 class="text-center text-uppercase">project view</h1>

    <!-- Create button -->
    <a href="{{route('admin.projects.create')}}" class="btn btn-primary my-3 "><i class="fa-solid fa-plus"></i></a>

    @include('partials.message')

    <div class="row row-cols-2 row-cols-md-4 g-4">

        @forelse($projects as $project)
        <div class="col">
            <div class="card p-3">
                <div class="project_name">
                    <strong>Project name:</strong>
                    {{$project->title}}
                </div>

                <div class="type">
                    <strong>Project Type:</strong>
                    {{$types[$project->type_id]->name}}
                </div>
            </div>
        </div>
        @empty
        <div class="col">
            ops! no projects available yet!
        </div>
        @endforelse

    </div>


</div>
</section>


@endsection