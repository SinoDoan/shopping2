<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTrait;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use DeleteModelTrait;
    private $user;
    private $role;
    public function  __construct (User $user, Role $role){
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        $users = $this->user->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
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
            DB::beginTransaction();
            $user = $this->user->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('messages: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
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
        $roles = $this->role->all();
        $userEdit = $this->user->find($id);
        $roleOfUser = $userEdit->roles;
//        dd($roleOfUser);
        return view('admin.user.edit', compact('roles','userEdit', 'roleOfUser'));
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
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('messages: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  delete($id)
    {
        return $this->DeleteModel($id, $this->user);
    }
    public function destroy($id)
    {
        //
    }
}
