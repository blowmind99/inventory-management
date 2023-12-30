<?php

namespace App\Http\Controllers;

use App\Models\Inventori;
use App\Models\Sales;
use App\Models\SalesDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = DB::table('users')->where('id', auth::user()->id)->first();
        $sales = Sales::all();
        return view('partials.feature.sales', compact('user', 'sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = DB::table('users')->where('id', auth::user()->id)->first();
        $inventory = Inventori::where('latest_stock', '>', 0)
                                ->whereNotNull('stock')
                                ->get();

        if($inventory->isEmpty() ){
            return back()->with('error', 'Cannot make sales because inventory is empty');
        }else{
            return view('partials.crud.sls_create', compact('user', 'inventory'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            DB::beginTransaction();
            $dataInventori = Inventori::where('id', $request->inventori_id)->first();
            $qty = $request->qty;

            if($qty > $dataInventori->stock ){
                return back()->with('error', "The Total Sales Quantity Exceeds Stock!");
            }else{

                if(intval($request->price) >= intval($dataInventori->price)){
                    $sales = new Sales();
                    $sales->number = $request->number;
                    $sales->users_id = Auth::user()->id;
                    $sales->date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
                    $sales->save();

                    $salesDetail = new SalesDetail();
                    $salesDetail->sales_id = $sales->id;
                    $salesDetail->inventori_id = $request->inventori_id;
                    $salesDetail->qty = $request->qty;
                    $salesDetail->price = $request->price;
                    $salesDetail->save();

                    $inventory                 = Inventori::where('id', $salesDetail->inventori_id)->first();
                    $finalStock                = intval($inventory->stock) - intval($salesDetail->qty);
                    $inventory->latest_stock   = strval($finalStock);
                    $inventory->save();
                    DB::commit();
                    return back()->with('message', 'Add Data Sale Success');
                }else{
                    return back()->with('error', "The total sales price is less than the price of the goods in inventory!");
                }
                
            }

        }catch (Exception $e){
            DB::rollBack();
            return back()->with('error', "Error Add Data");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = DB::table('users')->where('id', auth::user()->id)->first();
        $id = decrypt($id);
        $dataSales      = Sales::findorFail($id)->first();
        $dataDetails    = SalesDetail::findorFail($dataSales->id)->first();
        $inventory      = Inventori::all();
        
        return view('partials.crud.sls_edit', compact('user','dataSales', 'dataDetails','inventory' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try {
            DB::beginTransaction();
            $dataSales = Sales::where('id', $request->id)->first();
            $dataInventori = Inventori::where('id', $dataSales->id)->first();
            $qty = $request->qty;

            if($qty > $dataInventori->stock ){
                return back()->with('error', "The Total Sales Quantity Exceeds Stock!");
            }else{

                if(intval($request->price) >= intval($dataInventori->price)){
                    $sales = Sales::find($request->id);
                    $sales->number = $request->number;
                    $sales->users_id = Auth::user()->id;
                    $sales->date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
                    $sales->update();

                    $salesDetail = SalesDetail::where('sales_id', $request->id)->first();
                    $salesDetail->inventori_id = $request->inventori_id;
                    $salesDetail->qty = $request->qty;
                    $salesDetail->price = $request->price;
                    $salesDetail->update();

                    $inventory                 = Inventori::where('id', $salesDetail->inventori_id)->first();
                    $finalStock                = intval($inventory->stock) - intval($salesDetail->qty);
                    $inventory->latest_stock   = strval($finalStock);
                    $inventory->stock          = strval($inventory->stock);
                    $inventory->update();
                    
                    DB::commit();
                    return back()->with('message', 'Edit Data Sale Success');
                }else{
                    return back()->with('error', "The total sales price is less than the price of the goods in inventory!");
                }
                
            }

        }catch (Exception $e){
            DB::rollBack();
            dd($e->getMessage(), $e->getLine());
            return back()->with('error', "Error Add Data");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            DB::beginTransaction();
            $dataSales = Sales::find($id)->first();
            $dataSalesDetail = SalesDetail::where('sales_id', $dataSales->id)->first();
            $dataInventori  = Inventori::where('id', $dataSalesDetail->inventori_id)->first();
            $dataInventori->latest_stock = $dataInventori->stock;
            $dataInventori->update();
            $dataSales->delete();
            $dataSalesDetail->delete();

            DB::commit();
            $messageSuccess = 'Delete Data Success';
            return redirect()->back()->with('message', $messageSuccess);
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            $messageFailed = 'Delete Data Failed';

            return back()->with('error', $messageFailed);
        }

    }
}
