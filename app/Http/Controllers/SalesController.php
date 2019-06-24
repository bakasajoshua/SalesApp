<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Commission;
use App\CommissionRate;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user_id=auth()->user()->id;
        $this->validate($request,[
            'product'=>'required',
            'price'=>'required',
        ]);
        $sale = new Sale;
        $sale->user_id= auth()->user()->id;
        $sale->product= $request->input('product');
        $sale->price= $request->input('price');
        $sale->save();
        
        
        // Get supervisor and/or manager
        // $users=User::all();
        $user=auth()->user();
        // $user_id=auth()->user()->id;
        // $usertype=User::find($user_id);
        // $user->parent;
        // $user->parent->parent;

        // Calculate commissions
        $rate1=CommissionRate::find(1)->rate;
        $rate2=CommissionRate::find(2)->rate;
        $rate3=CommissionRate::find(3)->rate;
        $commission = new Commission;
        $commission->user_id= $user->id;
        $commission->sale_id= $sale->id;
        $commission->value=$rate3*($request->input('price'));
        $commission->save();
       
        if ($user->user_type_id==3) {
            $commission2 = new Commission;
            $commission2->user_id= $user->parent->id;
            $commission2->sale_id= $sale->id;
            $commission2->value=$rate2*($request->input('price'));
            $commission2->save();


            $commission1 = new Commission;
            $commission1->user_id= $user->parent->parent->id;
            $commission1->sale_id= $sale->id;
            $commission1->value=$rate1*($request->input('price'));
            $commission1->save();
        } 
        elseif ($user->user_type_id==2) {
            $commission3 = new Commission;
            $commission3->user_id= $user->parent->id;
            $commission3->sale_id= $sale->id;
            $commission3->value=$rate2*($request->input('price'));
            $commission3->save();
            
        }
        // Save sales
        
        // Save the commissoins
        
       
        
        
        return redirect('sales/create')->with('success', 'Sales Successfully submited');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
