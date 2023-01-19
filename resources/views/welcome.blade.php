@extends('layouts.app')


@section('content')

<section class="home_page d-flex align-items-center">
    <div class="container text-center px-5">
        <div class="box border rounded-3 py-5">
            <h1 class="text-center text-uppercase">that's my personal portfolio</h1>
            <p>I'm Mattia and this is my personal page with all my projects</p>
            <a class="btn btn-danger btn-sm" href="{{route('admin.projects.index')}}">Check it out</a>
        </div>
    </div>
</section>


@endsection