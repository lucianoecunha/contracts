<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Contract;
use App\Models\Manager;
use App\Models\Sector;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Mail\ManagersNotification;
use Mail;


class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::all();


        return view('contracts.index',compact('contracts'))

        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function add_contract_manager(Request $request)
    {

        $managers = Manager::all();
        $errors = [];

        request()->validate([

            'id' => 'required',            
            'manager_id' => 'required'               

        ]);


        $contract = Contract::find($request->id);

        $exists = $contract->managers->contains($request->manager_id);

        if(!$exists)

        {
         $contract->managers()->attach($request->manager_id);
         return view('contracts.show',compact('contract'));
     }

     else 
     {
        $errors  =  collect(['manager_id' => 'servidor ja e gestor desse contrato']);
        return  back()->withInput($request->all())->withErrors($errors);
    }


}

    public function remove_contract_manager(Request $request)
    {

        $contract = Contract::find($request->id);

        $contract->managers()->detach($request->manager_id);

        return view('contracts.show',compact('contract'));
    }

    public function get_datatable()
    {

        $contracts = Contract::select(['id', 'year', 'number', 'object', 'parts', 'validity']);

        return Datatables::of($contracts)
        ->addColumn('action', function ($contracts) {
            return '<a href="contracts/'.$contracts->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        })
        ->editColumn('id', 'ID: {{$id}}')
        ->make(true);


           // return Datatables::of(Contract::query())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $contracts = null;


      return view('contracts.create', compact('contracts'));
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

            'year' => 'required',
            'number' => 'required',
            'parts' => 'required',
            'object' => 'required',
            'kindofservice' => 'required',
            'source' => 'required',
            'signature' => 'required|date_format:d/m/Y',
            'validity' => 'required|date_format:d/m/Y',
            'value' => 'required'               

        ]);

        Contract::create($request->all());

        return redirect()->route('contracts.index')

        ->with('success','contract created successfully');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $contract = Contract::find($id);
        // $managers = $contract->managers()->pluck('name');

     return view('contracts.show',compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $contract = Contract::find($id);
     $managers = Manager::all('id', 'name');

     return view('contracts.edit',compact('contract','managers'));
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




     request()->validate([

        'year' => 'required',
        'number' => 'required',
        'parts' => 'required',
        'object' => 'required',
        'kindofservice' => 'required',
        'source' => 'required',
        'signature' => 'required|date_format:d/m/Y',
        'validity' => 'required|date_format:d/m/Y',
        'value' => 'required'               

    ]);



     $dataForm = $request->all();

     $dataForm['signature'] = (new \DateTime($dataForm['signature']))->format('Y-m-d');

     $dataForm['validity'] = (new \DateTime($dataForm['validity']))->format('Y-m-d');

    

        // recupera o item
     $contract = Contract::find($id);
        // faz a verficacao do ativo
       /* if(!isset($dataForm['active'])){
            $dataForm['active'] = 0;
        }*/

        $update = $contract->update($dataForm);
        
        if($update)
            return redirect()->route('contracts.index');
        else 
            return redirect()->route('contracts.edit',$id)
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
        $delete = Contract::find($id)->delete();
        if($delete)
            return redirect()->route('contracts.index')

        ->with('success','contracts deleted successfully');
        else
            return redirect()->route('contracts.edit',$id)
        ->with(['errors' => 'não foi possivel apagar o item']);
    }

    public function notifyExpirity()
    {
        $today = Carbon::now();        

        $sixthMonth = $today->addMonth(6)->toDateString();
        $contracts = Contract::all();



        foreach ($contracts as $contract) {

            $managers = $contract->managers()->get();

            if($contract->validity ==  $sixthMonth)
            {


                foreach ($managers as $manager) 
                {

                   $subject = "Vencimento de Contrato.";
                   $text = "Entre em contato com o setor de contratos.";
                   $manager =  (object) $manager;
                   
                   Mail::to($manager)->send(new ManagersNotification($manager,$contract,$subject,$text));


                }
            }


                
        }



    }

   
}
