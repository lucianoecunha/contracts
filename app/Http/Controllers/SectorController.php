<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Secretary;
use App\Http\SecretaryController;
use Illuminate\Http\Request;


class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $sectors = Sector::all();

          //$secretary = $sectors->secretary();

       //$secretary = $sector->secretary->toarray();
      // $secretary = Sector::select('id','name')

       // $secretary = Secretary::all();
        $sectors = Sector::all();

        return view('sectors.index',compact('sectors','secretary'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secretaries = Secretary::all();
        $sector = null;

        return view('sectors.create', compact('secretaries', 'sector'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            'name' => 'required',
            'secretary_id' => 'required'         

        ]);

        Sector::create($request->all());

        return redirect()->route('sectors.index')

                        ->with('success','Secretary created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sector = Sector::find($id);
        //$categories = [''=>''] + Category::lists('name', 'id')->all();
        $secretary  = $sector->secretary()->pluck('name');
        

        return view('sectors.show',compact('sector','secretary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $sector = Sector::find($id);
         $secretaries = Secretary::all('id','name');

        //$secretaries = [''=>''] + Secretary::pluck('id','name')->all();


        return view('sectors.edit',compact('sector','secretaries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
       

        // recupera o item
        $sector = Sector::find($id);
        // faz a verficacao do ativo
       /* if(!isset($dataForm['active'])){
            $dataForm['active'] = 0;
        }*/
        
        $update = $sector->update($dataForm);
        
        if($update)
            return redirect()->route('sectors.index');
        else 
            return redirect()->route('sectors.edit',$id)
                    ->with(['errors' => 'não foi possivel atualizar o item']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $delete = Sector::find($id)->delete();
         if($delete)
        return redirect()->route('sectors.index')

                        ->with('success','Sector deleted successfully');
        else
            return redirect()->route('sectors.edit',$id)
                    ->with(['errors' => 'não foi possivel apagar o item']);
    }
}
