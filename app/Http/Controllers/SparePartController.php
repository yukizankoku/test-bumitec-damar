<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use App\Http\Requests\StoreSparePartRequest;
use App\Http\Requests\UpdateSparePartRequest;
use App\Models\Category;
use App\Models\Supplier;

class SparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.spareparts.index', [
            "spareparts" => SparePart::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.spareparts.create', [
            "suppliers" => Supplier::all(),
            "categories" => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSparePartRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'code' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:5|unique:spare_parts',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required|min:10|max:255',
            'supplier_id' => 'required',
            'category_id' => 'required',
        ]);

        SparePart::create($validatedData);

        return redirect()->route('spareparts.index')->with('success', 'New Sparepart has been Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SparePart $sparePart)
    {
        return view('dashboard.spareparts.view', [
            "sparepart" => $sparePart->with('supplier', 'category')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SparePart $sparePart)
    {
        return view('dashboard.spareparts.edit',[
            "sparepart" => $sparePart,
            "suppliers" => Supplier::all(),
            "categories" => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSparePartRequest $request, SparePart $sparePart)
    {
        $rules = [
            'name' => 'required|min:5|max:255',
            'code' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:5',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required|min:10|max:255',
            'supplier_id' => 'required',
            'category_id' => 'required',
        ];

        if($request->code != $sparePart->code){
            $rules['code'] = 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:5|unique:spare_parts';
        }

        $validatedData = $request->validate($rules);

        SparePart::where('id', $sparePart->id)
                        ->update($validatedData);

        return redirect('/dashboard/spareparts')->with('success', 'Spareparts has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SparePart $sparePart)
    {
        SparePart::destroy($sparePart->id);

        return redirect('/dashboard/spareparts')->with('success', 'Sparepart Has been Deleted!');
    }
}
