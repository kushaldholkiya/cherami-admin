<?php

namespace App\Http\Controllers;

use App\Influencers;
use App\Organizations;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organizations::latest()->paginate(5);

        return view('admin.organizations.index')->with(array(
            'organizations' => $organizations
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organizations.create');
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
            'api_key'=>'required'
        ]);

        $organization = new Organizations([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'api_key' => $request->get('api_key'),
            'is_default' => 1,
        ]);
        $organization->save();

        return redirect('/admin/organizations')->with('success', 'Organization saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organizations  $organizations
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organizations::where('phone', $id)->get();
        $organization = $organization[0];

        return view('admin.organizations.show')->with([
            'organization'=>$organization
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organizations  $organizations
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organization = Organizations::where('phone', $id)->get();
        $organization = $organization[0];

        return view('admin.organizations.edit')->with([
            'organization'=>$organization,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organizations  $organizations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'api_key'=>'required'
        ]);

        $organization = Organizations::where('phone', $id)->get();
        $organization = $organization[0];

        if($organization){
            DB::table('phone_numbers')
                ->where('phone', $id)
                ->update([
                    'name' => $request->get('name'),
                    'phone' => $request->get('phone'),
                    'api_key' => $request->get('api_key'),
            ]);
        }

        return redirect('/admin/organizations')->with('success', 'Organization Updated !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organizations  $organizations
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organization = Organizations::where('phone', $id)->get();
        $organization = $organization[0];

        if($organization){
            DB::table('phone_numbers')
                ->where('phone', $id)
                ->delete();
        }

        return redirect('/admin/organizations')->with('success', 'Organization deleted!');

    }
}
