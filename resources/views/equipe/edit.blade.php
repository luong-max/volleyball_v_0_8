@extends('layouts.app')


@section('content')


    <h1>{{__('property.titreModifier')}}: {{ $equipe->nom }}</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form method="post" action="{{ url('equipe/'. $equipe->id) }}" >
        @method('PATCH')
        @csrf


        <div class="form-group mb-3">

            <label for="nom">{{__('property.nomEquipe')}}:</label>
            <input type="text" class="form-control" id="nom" placeholder="Entrer le nom d'équipe" name="nom" value="{{ $equipe->nom }}">

        </div>

        <div class="form-group mb-3">

            <label for="nb_membres">{{__('property.nbMembresAjout')}}:</label>
            <input name="nb_membres" id="nb_membres" class="form-control"></input>

        </div>


        <button type="submit" class="btn btn-primary">{{__('property.sauvegarderEquipe')}}</button>

    </form>

@endsection