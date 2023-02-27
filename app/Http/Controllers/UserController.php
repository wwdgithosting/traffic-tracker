<?php

namespace App\Http\Controllers;

use App\Models\MenuMaster;
use App\Models\UserRoleMaster;
use App\Models\UserRolePermission;
use App\Models\User;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Validator;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orgs'] = Organisation::all();
        $data['users'] = User::with(['role', 'organizations'])->where('roles', '!=', 1)->get();
        $data['roles'] = UserRoleMaster::all();
        return view('user.index', $data);
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
            if ($request->userid > 0) {
                $validator = Validator::make($index, [
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'email' => 'required|email|unique:users,email,' . $request->userid,
                    'company' => 'required',
                    'roles' => 'required',

                ]);
            } else {
                $validator = Validator::make($index, [
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'company' => 'required',
                    'roles' => 'required',

                ]);
            }

            if ($validator->fails()) {
                return ['status' => false, 'message' => $validator->errors()->first()];
            }

            try {
                $fileName = '';

                $menu = [
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'company' => $request->company,
                    'roles' => $request->roles,
                    'password' => bcrypt('secret')
                ];
                if (!empty($request->file('avatar'))) {
                    $fileName = rand(5, 6) . '_' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
                    $isUserPictureUploaded = $request->avatar->move(public_path('uploads/photos'), $fileName);
                    if ($isUserPictureUploaded) {
                        $menu['profile_image'] = $fileName;
                    } else {
                        return ['status' => false, 'message' => 'error in image upload'];
                    }
                }
                if ($request->userid > 0) {
                    $m = User::where('id', $request->userid)->update($menu);
                    if ($m) {
                        return ['status' => true, 'message' => 'Record Updated'];
                    } else {
                        return ['status' => false, 'message' => 'Unable to update record'];
                    }
                } else {
                    $m = User::create($menu);
                    if ($m->id > 0) {
                        return ['status' => true, 'message' => 'Record saved'];
                    } else {
                        return ['status' => false, 'message' => 'Unable to save record'];
                    }
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
        $user = User::find($id);
        if (!empty($user->profile_image)) {
            $fileUrl = public_path() . "/uploads/photos/" . $user->profile_image;
            //die();
            unlink($fileUrl);
        }
        $user->delete();
        return ['status' => true, 'message' => 'User deleted successfully'];
    }
}
