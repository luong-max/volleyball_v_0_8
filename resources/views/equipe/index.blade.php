@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-10">
            <h2>{{__('property.blogLaravel')}}</h2>
        </div>

        <div class="col-lg-2">
            <a class="btn btn-success" href="{{ url('equipe/create') }}">{{__('property.ajoutEquipe')}}</a>
        </div>

    </div>

    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif

    <div class="container">
        <div class="row">
            @foreach ($equipes as $index => $equipe)
            <div class="col-md-4">
                <div class="card card-body">
                    <a href="{{ url('equipe/'. $equipe->id) }}">
                    <h2>
                            {{ $equipe->nom }}
                        </h2>
                    </a>
                <p>{{__('property.membres')}}: {{ $equipe->nb_membres }} | {{__('property.date')}}: {{ $equipe->created_at }}</p>
                <a href="{{ url('equipe/'. $equipe->id) }}" class="btn btn-outline-primary">{{__('property.savoirPlus')}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="bg-light p-5 rounded">
        @auth
        <h1>Home page</h1>
        <p class="lead">Only authenticated users can access this section.</p>
        <a href="{{ route('dashboard.index') }}" class="btn btn-lg btn-warning me-2">Go to Dashboard</a>
        <a class="btn btn-lg btn-primary" href="https://codeanddeploy.com" role="button">View more tutorials here &raquo;</a>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
    
@endsection