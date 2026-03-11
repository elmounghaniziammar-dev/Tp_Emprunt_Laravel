<?php

namespace App\Http\Controllers;

use App\Models\loans;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoansController extends Controller
{
    //Lister tous les emprunts
    public function index(){
        $loans= loans::all();
        return response()->json($loans,200);
    }
    //Enregistrer un nouvel emprunt
    public function store(Request $request){
        $validatedData = $request->validate([
        'borrower_name'  => 'required|string',
        'borrower_email' => 'required|email',
        'book_title'     => 'required|string',
        'borrowed_at'    => 'required|date',
        'due_date'       => 'required|date',
    ]);
        $loan = loans::create($validatedData);
        return response()->json($loan,201);
    }
    //Afficher un emprunt spécifique
    public function show($id){
        $loan=loans::findOrFail($id);// renvoie 404,si non trouvé
        return response()->json($loan,200);
    }
    //Modifier les infos d'un emprunt
    public function update(Request $request,$id){
        $loan=loans::findOrFail($id);
        $loan->update($request->all());
        return response()->json($loan,200);
    }
    // supprimer un element 
    public function destroy($id){
        $loan=loans::findOrFail($id);
        $loan->delete();
        return Response()->json($loan,204);
    }
    // Marquer un emprunt comme rendu
    public function markAsReturned($id){
        $loan=loans::findOrFail($id);
        $loan->update([
            'returned' => true,
            'status' => 'returned'
        ]);
        return response()->json($loan, 200);
    }
}   
