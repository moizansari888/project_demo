<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRequest;
use App\Photos;
use App\Role;
use \App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::all();
        return view('admin.users.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $user = $request->all();
        //return redirect('/admin/user');

        if($file = $request->file('photo_id'))
        {
            $name1 = $file->getClientOriginalName();
            $file->move('images', $name1);
            //name will present in Photos Table as well as in Photos Controller fillable
            $photo = Photos::create(['name'=>$name1]);
            $user['photo_id'] = $photo->id;
        }
        $user['password'] = bcrypt($request->password);
        return $request->all();
//        User::create($user);
//        return redirect('/admin/user');
        //return $request->all();
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
        $user = User::findorfail($id);

        $role = Role::all();

        return view('admin.users.edit',compact('user','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        //
        if(trim($request->password == ''))
        {
            $input = $request->except('password');
        }
        else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }
        $users = User::findorfail($id);

        if($file = $request->file('photo_id'))
        {
            $name2 = $file->getClientOriginalName();
            $file->move('images',$name2);
            $photo1 = Photos::create(['name'=>$name2]);
            $input['photo_id'] = $photo1->id;
        }
        $users->update($input);
        return redirect('/admin/user');
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
        $user = User::findorfail($id);

        if($user->role->name == 'admin')
        {
            session()->flash('admin','Cant Delete The Admin');
            return redirect()->back();
        }
        else{
            unlink(public_path().$user->photo->name);
            $user->delete();
            session()->flash('delete_user','User is Deleted');
            return redirect('/admin/user');
        }
        //$user->delete();

    }
}
