@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h1 class="text-center text-uppercase">project view</h1>

    <!-- Create button -->
    <a href="{{route('admin.projects.create')}}" class="btn btn-primary my-3 "><i class="fa-solid fa-plus"></i></a>

    @include('partials.message')
    <div class="table-responsive ">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">image</th>
                    <th scope="col">title </th>
                    <th scope="col">description </th>
                    <th scope="col">actions </th>

                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr class="">
                    <td scope="row">{{$project->id}}</td>
                    <td scope="row">
                        @if($project->cover_img)
                        <img width="100" src="{{asset('storage/' . $project->cover_img)}}" alt="">
                        @else
                        <div>No images available</div>
                        @endif
                    </td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->description}}</td>
                    <td class="d-flex flex-column align-items-center justify-content-center">
                        <a class="btn btn-primary btn-sm" href="{{route('admin.projects.edit',$project->id)}}"><i class="fa-solid fa-pencil"></i></a>
                        <a class="btn btn-primary btn-sm my-2" href="{{route('admin.projects.show',$project->id)}}"><i class="fa-solid fa-eye"></i></a>

                        <!-- Modal trigger button -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#project-{{$project->id}}">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="project-{{$project->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-{{$project->id}}">Delete {{$project->title}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete this project permanently?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{route('admin.projects.destroy',$project->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Confirm</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </td>
                </tr>
                @empty
                <tr>
                    Ops! No projects available yet!
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</div>
</section>


@endsection