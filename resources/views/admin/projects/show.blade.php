@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbo text-center my-5">
        <img width="200" src="{{asset('storage/' . $project->cover_img)}}" alt="">
    </div>
    <h1>{{$project->title}}</h1>
    <p>{{$project->description}}</p>


    <!--technologies  -->

    @if(count($project->technologies) > 0)

    <span><strong>Technologies used:</strong> </span>
    @foreach($project->technologies as $tech)
    <span>#{{$tech->name}} </span>
    @endforeach

    @else

    <span>There are no technologies associated with this project</span>
    @endif

</div>
@endsection