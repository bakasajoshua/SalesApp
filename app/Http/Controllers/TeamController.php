<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Team_member;
use App\User;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users=User::whereNull('user_type_id')->get();
        return view('team/index')->with('users', $users);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        $team = new Team;
        $team->name= $request->input('name');
        $team->save();
        $user = auth()->user();
        $team_id = Team::orderby('created_at', 'desc')->first()->team_id;
        $team_members = new Team_member;
        $team_members->team_id=Team::all()->last()->id;
        $team_members->user_id=$user->id;
        $team_members->save();
        
        return redirect('team')->with('success', 'Team successfully created');
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
        $user=User::find($id);
        return view('team.edit')->with('user', $user);
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
        $this->validate($request,[
            'user_type_id'=>'required',
        ]);
        $user=auth()->user();   
        $team_member=Team_member::where('user_id', $user->id)->orderBy('id', 'desc')->first();
        $team_id=$team_member->team_id;
        $users = User::find($id);
        $team_members = new Team_member;
        $team_members->team_id=$team_id;
        $team_members->user_id=$users->id;
        $team_members->save();
        $users->user_type_id= $request->input('user_type_id');
        $users->parent_id=$user->id;
        $users->save();
        return redirect('team')->with('success', 'Team member successfully added');
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
