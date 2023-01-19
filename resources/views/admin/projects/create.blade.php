@extends('layouts.app')


@section('content')

<section class="py-5">

    <div class="container">
        @include('partials.error')
        <form action="{{route('admin.projects.store')}}" method="post" class="card p-3" enctype="multipart/form-data">
            @csrf

            <!-- choose a title -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="insert a name" aria-describedby="helpId">
                <small id="helpId" class="text-muted">insert a project name</small>
            </div>

            <!-- choose a cover image -->
            <div class="mb-3">
                <label for="cover_img" class="form-label">cover_img</label>
                <input type="file" name="cover_img" id="cover_img" class="form-control @error('cover_img') is-invalid @enderror" placeholder="insert a name" aria-describedby="helpId">
                <small id="helpId" class="text-muted">insert a cover image</small>
            </div>

            <!-- select type -->
            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select form-select-md @error('type_id') 'is-invalid' @enderror " name="type_id" id="type_id">
                    <option disabled>Select one</option>

                    @foreach($types as $type)
                    <option value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected' : ''}}>{{$type->name}}</option>
                    @endforeach

                </select>
            </div>

            <!-- select technologies -->
            <div class="mb-3">
                <label for="technologies" class="form-label">Technologies</label>
                <select multiple class="form-select form-select-md" name="technologies[]" id="technologies">
                    <option disabled>Select one</option>

                    @forelse($technologies as $technology)

                    @if($errors->any())

                    <option value="{{$technology->id}}" {{in_array($technology->id,old('technologies',[])) ? 'selected' : ''}}>{{$technology->name}}</option>
                    @else
                    <option value="{{$technology->id}}">{{$technology->name}}</option>
                    @endif
                    @empty
                    <option disabled value="">Sorry, no technologies in the system!</option>
                    @endforelse
                </select>
            </div>


            <!-- write a description -->
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="insert a description" aria-describedby="helpId">
                <small id="helpId" class="text-muted">insert a project description</small>
            </div>

            <!-- write project language -->
            <div class="mb-3">
                <label for="language" class="form-label">language</label>
                <input type="text" name="language" id="language" class="form-control @error('language') is-invalid @enderror" placeholder="insert a language url" aria-describedby="helpId">
                <small id="helpId" class="text-muted">insert a project language </small>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</section>


@endsection