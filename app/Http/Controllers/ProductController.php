<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Mockery\Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        return view('admin.flights.index', ['flights' => Flight::orderBy('id', 'DESC')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        return view('admin.flights.create');
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
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        try {
            $flight = new Flight();
            $image = $request->file('thumbnail');
            $imageName = time() . "." . $image->extension();
            $image->move(public_path() . '/images/products/', $imageName);
            $flight->img_url = $imageName;
            $flight->fill($request->all())->save();
        }
        catch (Exception $e){
            return back()->with('success', 'Some Occurred');
        }

        return back()->with('success', 'Flight Created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Flight $product)
    {
        //
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        return view('admin.flights.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Flight $product)
    {
        //
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        try {
            $product->fill($request->all())->update();
        }
        catch(Exception $e){
            return back()->with('success', 'Flight Created');
        }
        return back()->with('success', 'Flight Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Flight $product)
    {
        //
        abort_if(!auth()->user()->hasRole('super-admin'), 403, 'You Do not have permissions.');
        try {
            if (file_exists(public_path() . '/images/products/' . '/' . $product->img_url)) {
                $images = public_path() . '/images/products/' . '/' . $product->img_url;
                unlink($images);
            }
            $product->delete();
        }
        catch(Exception $e){
            return back()->with('success', 'Flight Created');
        }
        return back()->with('success', 'Flight Deleted');
    }
}
