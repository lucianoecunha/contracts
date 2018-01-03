<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DatatablesController extends Controller
{

	public function ContractsIndex()
	{
		return view('datatables.index');
	}

/**
 * Process datatables ajax request.
 *
 * @return \Illuminate\Http\JsonResponse
 */
	public function ContractsData()
	{
		return Datatables::of(Contracts::query())->make(true);
	}

}
