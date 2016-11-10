<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::where("user_id", Auth::user()->id)->get();


        return view('ad.my_ads', ['ads' => $ads]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where("isActive", 1)->orderBy('name','asc')->get();

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
            $ad = Ad::find($request->ad_id);
            $ad->title          =  $request->title;
            $ad->type           =  $request->type;
            $ad->message        =  $request->message;
            $ad->category_id    =  $request->category;
            $ad->price          =  $request->price;
            $ad->precision      =  $request->precision;
            $ad->save();
        }catch(\Exception $e){
            var_dump($e);
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
        $ad = Ad::where('id',$id)->first();
        $user = User::where('id', $ad->user_id)->first();
        $category = Category::where('id_category', $ad->category_id)->first();
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

        $ad = Ad::where('id',$id)->first();
        $categories = Category::where("isActive", 1)->orderBy('name','asc')->get();
        $photos = Photo::where("ad_id", $id)->get();

        return view('ad.edit_ad', ['ad' => $ad, 'categories'=>$categories, "photos"=>$photos]);

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_ad(Request $request)
    {

        try {
            $imageName = date("Ymdhis").Auth::user()->id . '.' .$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(
                base_path() . '/public/medias/', $imageName
            );

            $ad = new Ad();
            $ad->title          =  $request->title;
            $ad->type           =  $request->type;
            $ad->message        =  $request->message;
            $ad->category_id    =  $request->category;
            $ad->price          =  $request->price;
            $ad->precision      =  $request->precision;
            $ad->user_id        =  Auth::user()->id;
            $ad->save();

            $last_id = $ad->id;

            $photo = new Photo();
            $photo->ad_id       = $last_id;
            $photo->photo       = $imageName;
            $photo->description =  $request->description;
            $photo->save();


        }catch(\Exception $e){
            var_dump($e);
            return view('ad.new_ad_error');
        }

        return view('ad.new_ad_success');

    }





}
