@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <a class="btn btn-primary btn-sm d-block mt-3" href="{{route('admin.projects.index')}}">View Projects</a>
                    <a class="btn btn-primary btn-sm d-block mt-3" href="{{route('admin.types.index')}}">View Projects by type</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection