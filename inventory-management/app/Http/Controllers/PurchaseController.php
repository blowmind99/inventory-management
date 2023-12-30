<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Inventori;
use App\Models\PurchaseDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = DB::table('users')->where('id', auth::user()->id)->first();
        $purchase = Purchase::all();
        return view('partials.feature.purchase', compact('user', 'purchase'));
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
            return view('partials.crud.prchs_create', compact('user', 'inventory'));
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
                return back()->with('error', "The Total Purchase Quantity Exceeds Stock!");
            }else{

                if(intval($request->price) >= intval($dataInventori->price)){
                    $purchase = new Purchase();
                    $purchase->number = $request->number;
                    $purchase->users_id = Auth::user()->id;
                    $purchase->date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
                    $purchase->save();

                    $purchaseDetail = new PurchaseDetail();
                    $purchaseDetail->purchase_id = $purchase->id;
                    $purchaseDetail->inventori_id = $request->inventori_id;
                    $purchaseDetail->qty = $request->qty;
                    $purchaseDetail->price = $request->price;
                    $purchaseDetail->save();

                    $inventory                 = Inventori::where('id', $purchaseDetail->inventori_id)->first();
                    $finalStock                = intval($inventory->stock) - intval($purchaseDetail->qty);
                    $inventory->latest_stock   = strval($finalStock);
                    $inventory->save();
                    DB::commit();
                    return back()->with('message', 'Add Data Purchase Success');
                }else{
                    return back()->with('error', "The total purchase price is less than the price of the goods in inventory!");
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
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user           = DB::table('users')->where('id', auth::user()->id)->first();
        $id             = decrypt($id);
        $dataPurchase   = Purchase::findorFail($id)->first();
        $dataDetails    = PurchaseDetail::findorFail($dataPurchase->id)->first();
        $inventory      = Inventori::all();
        
        return view('partials.crud.prchs_edit', compact('user','dataPurchase', 'dataDetails','inventory' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
        try {
            DB::beginTransaction();
            $dataPurchase = Purchase::where('id', $request->id)->first();
            $dataInventori = Inventori::where('id', $dataPurchase->id)->first();
            $qty = $request->qty;

            if($qty > $dataInventori->stock ){
                return back()->with('error', "The Total Sales Quantity Exceeds Stock!");
            }else{

                if(intval($request->price) >= intval($dataInventori->price)){
                    $purchase = Purchase::find($request->id);
                    $purchase->number = $request->number;
                    $purchase->users_id = Auth::user()->id;
                    $purchase->date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
                    $purchase->update();

                    $purchaseDetail = PurchaseDetail::where('purchase_id', $request->id)->first();
                    $purchaseDetail->inventori_id = $request->inventori_id;
                    $purchaseDetail->qty = $request->qty;
                    $purchaseDetail->price = $request->price;
                    $purchaseDetail->update();

                    $inventory                 = Inventori::where('id', $purchaseDetail->inventori_id)->first();
                    $finalStock                = intval($inventory->stock) - intval($purchaseDetail->qty);
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
            $dataPurchase = Purchase::find($id)->first();
            $dataPurchaseDetail = PurchaseDetail::where('purchase_id', $dataPurchase->id)->first();
            $dataInventori  = Inventori::where('id', $dataPurchaseDetail->inventori_id)->first();
            $dataInventori->latest_stock = $dataInventori->stock;
            $dataInventori->update();
            $dataPurchase->delete();
            $dataPurchaseDetail->delete();

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
