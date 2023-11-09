<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    //
    public function index()
    {
        $equipes  = Equipe::all();
        return view('equipe.index',compact('equipes'));
    }

    public function create()
    {
        return view('equipe.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nom'=> 'required',
            'nb_membres' => 'required'
        ]);


        $equipe = new Equipe([
            'nom' => $request->get('nom'),
            'nb_membres' => $request->get('nb_membres')
        ]);


        $equipe->save();
        return redirect('/')->with('success', 'equipe Ajouté avec succès');

    }

    public function show($id)
    {

        $equipe = Equipe::findOrFail($id);
        return view('equipe.show', compact('equipe'));

    }

    public function edit($id)
    {

        $equipe = Equipe::findOrFail($id);

        return view('equipe.edit', compact('equipe'));

    }

    public function update(Request $request, $id)
    {

        $request->validate([

            'nom'=> 'required',
            'nb_membres' => 'required'

        ]);




        $equipe = Equipe::findOrFail($id);
        $equipe->nom = $request->get('nom');
        $equipe->nb_membres = $request->get('nb_membres');
        $equipe->update();

        return redirect('/')->with('success', 'equipe Modifié avec succès');

    }

    public function destroy($id)
    {

        $equipe = Equipe::findOrFail($id);
        $equipe->delete();

        return redirect('/')->with('success', 'equipe Supprimé avec succès');

    }
}
