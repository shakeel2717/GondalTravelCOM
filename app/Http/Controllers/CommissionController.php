<?php

namespace App\Http\Controllers;

use App\Models\AdminCollection;
use App\Models\Commission;
use Illuminate\Http\Request;
use Mockery\Exception;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        return view('admin.commission.index',['commissions' => Commission::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('admin.commission.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $commission = new Commission();
        $commission->fill($request->all())->save();
        return redirect()->back()->with('success','Commission Added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commission $commission)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Commission $commission)
    {
        //
        return view('admin.commission.edit',['commission' => $commission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Commission $commission)
    {
        //
        // $commission->fill($request->all())->update();
        // return redirect()->back()->with('success','Commission Updated');
    $comm = Commission::where('id',$commission->id)->first();
    $comm->commission_percentage = $request->commission;
    $comm->commission_value = $request->value;
    $comm->status = $request->select;
    $comm->save();
    return redirect()->back()->with('success','Commission Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Commission $commission)
    {
        //
        $commission->delete();
        return redirect()->back()->with('success','Commission Deleted');

    }


}
