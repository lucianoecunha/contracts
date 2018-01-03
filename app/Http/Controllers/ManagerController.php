<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;
use App\Models\Manager;


class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $managers = Manager::all();
         $sectors = Sector::all();

        return view('managers.index',compact('managers','sectors'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectors = Sector::all();
        $managers = null;

        return view('managers.create', compact('managers', 'sectors'));    
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
            'email' => 'required',
            'sector_id' => 'required'        

        ]);

        Manager::create($request->all());

        return redirect()->route('managers.index')

                        ->with('success','Manager created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $manager = Manager::find($id);
        //$categories = [''=>''] + Category::lists('name', 'id')->all();
        $sector  = $manager->sector()->pluck('name');
        

        return view('managers.show',compact('sector','manager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        $manager = Manager::find($id);
        $sectors = Sector::all('id', 'name');
        

        return view('managers.edit',compact('sectors','manager'));
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
        $manager = Manager::find($id);
        // faz a verficacao do ativo
       /* if(!isset($dataForm['active'])){
            $dataForm['active'] = 0;
        }*/
        
        $update = $manager->update($dataForm);
        
        if($update)
            return redirect()->route('managers.index');
        else 
            return redirect()->route('managers.edit',$id)
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
         $delete = Manager::find($id)->delete();
         if($delete)
        return redirect()->route('managers.index')

                        ->with('success','Manager deleted successfully');
        else
            return redirect()->route('managers.edit',$id)
                    ->with(['errors' => 'não foi possivel apagar o item']);
    }

    public function notify($id)
    {
          $manager = Manager::findOrFail($id);          
          $today = Carbon::today();
          $expireDate = $today->addMonths(6);


          foreach ($managers->contracts as $contract) {

            if($contract->validity==$expireDate)
            {
                return redirect()->route('home')
                    ->with('message', 'Informamos que o Contrato  '.$contract->number.' / '.$contract->year.'  que tem como objeto '.$contract->object.' vence em '.$contract->validity.' Caso seja do interesse da sua secretaria renova-lo. entre em contato com o Setor de Contratos.')
                    ->with('status', 'info');
            }
            else
            {
               return redirect()->route('home')->with('message', 'Sem contrato vencido.');   
            } 

    }
    }
}
