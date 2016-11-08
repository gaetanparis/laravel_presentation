<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('category')->get();

        return view('ad.new_ad', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            DB::table('ad')->insert(
                ['title' => $request->title,
                    'type' => $request->type,
                    'message'=>$request->message,
                    'category_id'=>$request->category,
                    'price'=>$request->price,
                    'precision'=>$request->precision,
                    'user_id'=>Auth::user()->id]
            );
        }catch(\Exception $e){
            return view('ad.new_ad_error');
        }

        return view('ad.new_ad_success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = DB::table('ad')->where('id', $id)->first();
        $user = DB::table('users')->where('id', $ad->user_id)->first();
        $category = DB::table('category')->where('id_category', $ad->category_id)->first();
        return view('ad.ad_details', ['ad' => $ad, 'user'=>$user, 'category'=>$category]);
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
