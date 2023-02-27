<?php

namespace App\Http\Controllers;

use App\Models\MenuMaster;
use App\Models\UserRoleMaster;
use App\Models\UserRolePermission;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use DB;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Role Management';
        $data['module'] = 'Role';
        $roles = UserRoleMaster::with('permissions')->get();
        if (count($roles) > 0) {
            $i = 0;
            foreach ($roles as $role) {
                if ($role->permissions != array()) {
                    $j = 0;
                    foreach ($role->permissions as $p) {
                        $roles[$i]->permissions[$j]->menu_name = MenuMaster::find($p->menu_id)->menu_name;
                        $j++;
                    }
                }
                $i++;
            }
        }
        $data['roles'] = $roles;
        //$data['menus'] = MenuMaster::first()->roles;
        // dd($data['menus']);
        $data['menues'] = MenuMaster::all();


        return view('roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $index = $request->all();
            // return $request->all();
            $validator = Validator::make($index, [
                'role_name' => 'required',

            ]);
            if ($validator->fails()) {
                return ['status' => false, 'message' => 'field missing'];
            }

            try {
                $menu = [
                    'role_name' => $request->role_name,
                    'status' =>  1,
                ];
                $m = UserRoleMaster::create($menu);
                if ($m->id > 0) {

                    if (count($request->menu_id) > 0) {
                        foreach ($request->menu_id as $id) {
                            $roles = array('user_role_id' => $m->id, 'menu_id' => $id);
                            UserRolePermission::create($roles);
                        }
                    }

                    return ['status' => true, 'message' => 'Record saved'];
                } else {
                    return ['status' => false, 'message' => 'Unable to save record'];
                }
            } catch (\Throwable $th) {
                return ['status' => false, 'message' => 'something went wrong'];
            }
        } else {
            return ['status' => false, 'message' => 'No record found'];
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
        $role = UserRoleMaster::where('id', $id)->first();
        $menues = MenuMaster::all();
        $permissions = UserRolePermission::where('user_role_id', $id)->pluck('menu_id')->toArray();
        if (count($menues) > 0) {
            $i = 0;
            foreach ($menues as $menu) {
                if (in_array($menu->id, $permissions)) {
                    $menues[$i]->is_active = 1;
                } else {
                    $menues[$i]->is_active = 0;
                }
                $i++;
            }
        }
        $data['role'] = $role;
        $data['menues'] = $menues;
        return ['status' => true, 'data' => $data];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $index = $request->all();
            //return $request->all();
            $validator = Validator::make($index, [
                'role_name' => 'required',

            ]);
            if ($validator->fails()) {
                return ['status' => false, 'message' => 'field missing'];
            }

            try {
                $menu = [
                    'role_name' => $request->role_name,
                ];
                $m = UserRoleMaster::where('id', $request->role_id)->update($menu);
                if ($request->role_id > 0) {
                    UserRolePermission::where('user_role_id', $request->role_id)->delete();
                    if (count($request->menu_id) > 0) {
                        foreach ($request->menu_id as $id) {
                            $roles = array('user_role_id' => $request->role_id, 'menu_id' => $id);
                            UserRolePermission::create($roles);
                        }
                    }

                    return ['status' => true, 'message' => 'Record updated'];
                } else {
                    return ['status' => false, 'message' => 'Unable to update record'];
                }
            } catch (\Throwable $th) {
                return ['status' => false, 'message' => 'something went wrong'];
            }
        } else {
            return ['status' => false, 'message' => 'No record found'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return $id;
        $isUserExist = User::where('roles', $id)->count();
        if ($isUserExist > 0) {
            return ['status' => false, 'message' => 'Unable to delete record, User exist'];
        } else {
            $role = UserRoleMaster::find($id);
            $role->delete();
            UserRolePermission::where('user_role_id', $id)->delete();
            return ['status' => false, 'message' => 'Role deleted'];
        }
    }
}
