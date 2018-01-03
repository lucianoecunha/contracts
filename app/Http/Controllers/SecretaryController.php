<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secretary;


class SecretaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response



     */


    public function index()
    {
        

        $secretaries = Secretary::simplePaginate(15);

        return view('secretaries.index',compact('secretaries'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secretaries.create');
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

        ]);

        Secretary::create($request->all());

        return redirect()->route('secretaries.index')

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
               $secretary = Secretary::find($id);

        return view('secretaries.show',compact('secretary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $secretary = Secretary::find($id);

        return view('secretaries.edit',compact('secretary'));
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

            'name' => 'required',
            

        ]);

        Secretary::find($id)->update($request->all());

        return redirect()->route('secretaries.index')

                        ->with('success','Secretary updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                Secretary::find($id)->delete();

        return redirect()->route('secretaries.index')

                        ->with('success','Secretary deleted successfully');
    }
}
