@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>{{ $equipe->nom }}</h1>
            <p class="lead">{{ $equipe->content }}</p>

            <div class="buttons">
                <a href="{{ url('equipe/'. $equipe->id .'/edit') }}" class="btn btn-info">{{__('property.modifier')}}</a>
                <form action="{{ url('equipe/'. $equipe->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{__('property.supprimer')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>


@endsection