<?php

namespace App\Http\Controllers;

use App\Models\Prospecto;
use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

/**
 * Class ProspectoController
 * @package App\Http\Controllers
 */
class ProspectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prospectos = Prospecto::paginate();

        return view('prospecto.index', compact('prospectos'))
            ->with('i', (request()->input('page', 1) - 1) * $prospectos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prospecto = new Prospecto();
       // $prospecto = estatus => 'enviado';
        return view('prospecto.create', compact('prospecto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Prospecto::$rules);
        $prospecto = Prospecto::create($request->all());
        
        $users = Prospecto::select('id')->orderBy('id', 'desc')->first();
        $documento = new Documento();
        $documento->id_prospecto= $users->id;
        // $data = [];
        $image = $request->file('filenames');
        if ($image) {
            foreach($request->file('filenames') as $file)
            {
                $name=$file->getClientOriginalName();
                $documento->nombre_document =$name;
                $documento->ruta_document = $file->move(public_path().'/files/', $name);
                $documento->url_document = $request->root().'/files/'.$name;
                $data[] = $name;  
            }
        }
        $file= new File();
        $documento->status = '1';
        //$documento->filenames = $data;
        $documento->save();
     
        return redirect()->route('prospectos.index')
            ->with('success', 'Prospecto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prospecto = Prospecto::find($id);
        $documentos = DB::table('document')
                    ->select('id','nombre_document','ruta_document','url_document','status')
                    ->where('id_prospecto','=', $id)
                    ->get();
        return view('prospecto.show', compact('prospecto','documentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prospecto = Prospecto::find($id);
        $documentos = DB::table('document')
        ->select('id','nombre_document','ruta_document','url_document','status')
        ->where('id_prospecto','=', $id)
        ->get();
        return view('prospecto.edit', compact('prospecto','documentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Prospecto $prospecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prospecto $prospecto)
    {
        request()->validate(Prospecto::$rules);

        $prospecto->update($request->all());

        return redirect()->route('prospectos.index')
            ->with('success', 'Prospecto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $prospecto = Prospecto::find($id)->delete();

        return redirect()->route('prospectos.index')
            ->with('success', 'Prospecto deleted successfully');
    }
}
