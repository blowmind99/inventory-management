<?php

namespace App\Http\Controllers;

use App\Models\Inventori;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InventoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = DB::table('users')->where('id', auth::user()->id)->first();
        $inventori = Inventori::all();
        return view('partials.feature.inventori', compact('user', 'inventori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = DB::table('users')->where('id', auth::user()->id)->first();
        return view('partials.crud.inv_create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            DB::beginTransaction();
            Inventori::insert([
                'code'              => $request->code,
                'name'              => $request->name,
                'price'             => $request->price,
                'stock'             => $request->stock,
                'latest_stock'      => $request->stock,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);
            DB::commit();
            $messageSuccess = 'Add Data Success';

            return redirect('/dashboard/inventori')->with('message', $messageSuccess);
        }catch(Exception $e){
            DB::rollBack();
            $messageError = 'Add Data Failed';
            return redirect()->back()->with('error', $messageError);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventori $inventori)
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
        $data = Inventori::findorFail($id);
        return view('partials.crud.inv_edit', compact('data', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try{
            DB::beginTransaction();
            $inventori = Inventori::findorFail($id);
            $inventori->update([
                'code' => $request->code,
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            DB::commit();
            $message = "Success Update Data";
            return back()->with('message', $message);
        } catch (Exception $e){
            DB::rollBack();
            $error = "Failed Update Data";
            return back()->with('error', $error);
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
            $data = Inventori::find($id);
            $data->delete();
            DB::commit();
            $messageSuccess = 'Delete Data Success';

            return back()->with('message', $messageSuccess);
        }catch(Exception $e){
            DB::rollBack();
            $messageFailed = 'Delete Data Failed';

            return back()->with('error', $messageFailed);
        }
        
    }

    public function test(){
        $inventori = Inventori::all();
        dd($inventori);
    }
    private function decodeHash($hashedId)
    {
        // Your custom logic to decode the hashed ID
        // Example: reverse the process of encoding
        return base64_decode($hashedId);
    }

    public function get_price(Request $request){
        $itemId = $request->id;
        $item =    Inventori::find($itemId);

        if($item){
            return response()->json(['price' => $item->price]);
        }

        return response()->json(['price' => null]);
    }
}
