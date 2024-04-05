<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        return view('document.index');
    }
    public function attestation()
    {
        $path = storage_path('app/documents/attestation.pdf');
        return Response::download($path);
    }

    public function conge()
    {
        $path = storage_path('app/documents/demande-conge.pdf');
        return Response::download($path);
    }

    public function contrat()
    {
        $path = storage_path('app/documents/contrat.pdf');
        return Response::download($path);
    }
}
