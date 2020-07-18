<?php

namespace App\Http\Controllers;

use App\Influencers;
use App\User;
use Illuminate\Http\Request;

class InfluencersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $influencers = Influencers::latest()->paginate(5);

        return view('admin.influencers.index')->with(array(
            'influencers' => $influencers
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.influencers.create')->with([
            'users'=>$users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'display_name'=>'required'
        ]);

        $filepath = url('/images/profile-placeholder.jpg');
        if($request->file('display_picture')){
            $extension = $request->file('display_picture')->getClientOriginalExtension();
            $dir = public_path('/uploads');
            $filename = time().rand(2,99).".".$extension;
            $request->file('display_picture')->move($dir, $filename);
            $filepath = url('/')."/uploads/".$filename;
        }

        $influencer = new Influencers([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'display_name' => $request->get('display_name'),
            'display_picture' => $filepath,
            'status' => $request->get('status'),
            'user_id' => $request->get('user_id')
        ]);
        $influencer->save();

        return redirect('/admin/influencers')->with('success', 'Influencer saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Influencers  $influencers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $influencer = Influencers::find($id);

        $user = User::find($influencer->user_id);

        return view('admin.influencers.show')->with([
            'influencer'=>$influencer,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Influencers  $influencers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $influencer = Influencers::find($id);

        $users = User::all();

        return view('admin.influencers.edit')->with([
            'influencer'=>$influencer,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Influencers  $influencers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'display_name'=>'required'
        ]);

        $influencer = Influencers::find($id);

        $filepath = url('/images/profile-placeholder.jpg');
        if($request->file('display_picture')){
            $extension = $request->file('display_picture')->getClientOriginalExtension();
            $dir = public_path('/uploads');
            $filename = time().rand(2,99).".".$extension;
            $request->file('display_picture')->move($dir, $filename);
            $filepath = url('/')."/uploads/".$filename;

            if($filepath){

                if($influencer->display_picture){
                    $name = explode("/",$influencer->display_picture);
                    $filename = end($name);
                    $filepath =  public_path()."/uploads/".$filename;
                    unlink($filepath);
                }

                $influencer->display_picture = $filepath;
            }
        }


        $influencer->name =  $request->get('name');
        $influencer->phone = $request->get('phone');
        $influencer->display_name = $request->get('display_name');
        $influencer->status = $request->get('status');
        $influencer->user_id = $request->get('user_id');

        $influencer->save();

        return redirect('/admin/influencers')->with('success', 'Influencer Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Influencers  $influencers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $influencers = Influencers::find($id);
        if($influencers->display_picture){
            $name = explode("/",$influencers->display_picture);
            $filename = end($name);

            $filepath =  public_path()."/uploads/".$filename;
            unlink($filepath);
        }
        $influencers->delete();

        return redirect('/admin/influencers')->with('success', 'Influencer deleted!');
    }
}
