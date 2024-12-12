<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.suppliers.index', [
            "suppliers" => Supplier::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|min:5|max:255|unique:suppliers',
            'address' => 'required|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:suppliers',
            'email' => 'required|email:dns|unique:suppliers',
        ]);

        Supplier::create($validatedData);

        return redirect()->route('suppliers.index')->with('success', 'New Supplier has been Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return view('dashboard.suppliers.view', [
            "supplier" => $supplier
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('dashboard.suppliers.edit',[
            'supplier' => $supplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $rules = [
            'company_name' => 'required|min:5|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email:dns',
        ];

        if($request->company_name != $supplier->company_name){
            $rules['company_name'] = 'required|min:5|max:255|unique:suppliers';
        }

        if($request->phone != $supplier->phone){
            $rules['phone'] = 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:suppliers';
        }

        if($request->email != $supplier->email){
            $rules['email'] = 'required|email:dns|unique:suppliers';
        }

        $validatedData = $request->validate($rules);

        Supplier::where('id', $supplier->id)
                        ->update($validatedData);

        return redirect('/dashboard/suppliers')->with('success', 'Supplier has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        Supplier::destroy($supplier->id);

        return redirect('/dashboard/suppliers')->with('success', 'Supplier Has been Deleted!');
    }
}
