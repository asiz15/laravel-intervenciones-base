<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiario;

class BeneficiarioController extends Controller
{

    public function index()
    {
        return Beneficiario::select(['id','nombres', 'apellidos', 'dni'])
        ->with('ciudad:id,nombre')
        ->with('categoria:id,nombre')
        ->get();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
