<?php

namespace App\Http\Controllers;

use App\Agents;
use App\Influencers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agents::latest()->paginate(5);

        return view('admin.agents.index')->with(array(
            'agents' => $agents
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.agents.create')->with([
            'roles'=>$roles
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
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);

        $filepath = url('/images/profile-placeholder.jpg');
        if($request->file('display_picture')){
            $extension = $request->file('display_picture')->getClientOriginalExtension();
            $dir = public_path('/uploads');
            $filename = time().rand(2,99).".".$extension;
            $request->file('display_picture')->move($dir, $filename);
            $filepath = url('/')."/uploads/".$filename;
        }

        $agent = new Agents([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'display_picture' => $filepath,
            'role' => $request->get('role'),
            'user_token' => "",
        ]);
        $agent->save();

        return redirect('/admin/agents')->with('success', 'Agent saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = Agents::find($id);

        return view('admin.agents.show')->with([
            'agent'=>$agent,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agents::find($id);

        $roles = Role::all();

        return view('admin.agents.edit')->with([
            'agent'=>$agent,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required'
        ]);

        $agent = Agents::find($id);

        $filepath = url('/images/profile-placeholder.jpg');
        if($request->file('display_picture')){
            $extension = $request->file('display_picture')->getClientOriginalExtension();
            $dir = public_path('/uploads');
            $filename = time().rand(2,99).".".$extension;
            $request->file('display_picture')->move($dir, $filename);
            $filepath = url('/')."/uploads/".$filename;

            if($agent->display_picture != $filepath){
                $name = explode("/",$agent->display_picture);
                $filename = end($name);
                $removingfilepath =  public_path()."/uploads/".$filename;
                unlink($removingfilepath);
            }

            $agent->display_picture = $filepath;
        }


        $agent->name =  $request->get('name');
        $agent->email = $request->get('email');
        $agent->role = $request->get('role');

        $agent->save();

        return redirect('/admin/agents')->with('success', 'Agent Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agents::find($id);
        if($agent->display_picture){
            $name = explode("/",$agent->display_picture);
            $filename = end($name);

            $filepath =  public_path()."/uploads/".$filename;
            unlink($filepath);
        }
        $agent->delete();

        return redirect('/admin/agents')->with('success', 'Agent deleted!');
    }
}
