<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CovoiturageController extends Controller
{
    //

    public function create()
    {
    	return view('covoiturage.create');
    }

    public function index()
    {
    	return view('covoiturage.search');
    }

    public function detail()
    {
    	return view('covoiturage.detail');
    }

    public function save(Request $request) {
        $data = $request->all();
        $lastStep = true;
        
        if(isset($data['step'])) {
            switch ($data['step']) {
                case 'depart': {
                  $validated = $request->validate([
                    'depart' => 'required'
                  ]);
                  $lastStep = false;
                  break;  
                }
            }
        }

        var_dump($data);
        exit;
        return response()->json([]);
    }
}
