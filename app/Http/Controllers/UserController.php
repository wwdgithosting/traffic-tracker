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
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $AuthUser = Auth::user();
        if ($AuthUser->roles > 1) {
            $data['orgs'] = Organisation::where('id', $AuthUser->company)->get();
            $data['users'] = User::with(['role', 'organizations'])->where('company', $AuthUser->company)->where('id', '!=', $AuthUser->id)->get();
            $data['roles'] = UserRoleMaster::where('id', '>', 2)->get();
        } else {
            $data['orgs'] = Organisation::all();
            $data['users'] = User::with(['role', 'organizations'])->where('roles', '!=', 1)->get();
            $data['roles'] = UserRoleMaster::all();
        }

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
    public function update_profile(Request $request)
    {
        if ($request->isMethod('post')) {
            $index = $request->all();

            $validator = Validator::make(
                $index,
                [
                    'ufirstname' => 'required',
                    'ulastname' => 'required'
                ]
            );


            if ($validator->fails()) {
                return ['status' => false, 'message' => $validator->errors()->first()];
            }

            // try {
            $fileName = '';
            $menu = [
                'firstname' => $request->ufirstname,
                'lastname' => $request->ulastname,
            ];
            if ((isset($request->upassword) && !empty($request->upassword)) && (isset($request->c_password) && !empty($request->c_password))) {
                if ($request->upassword != $request->c_password) {
                    return ['status' => false, 'message' => 'Password and confirm password not matched'];
                } else {
                    $menu['password'] = bcrypt($request->upassword);
                }
            }
            if (!empty($request->file('uavatar'))) {
                $fileName = rand(5, 6) . '_' . time() . '.' . $request->file('uavatar')->getClientOriginalExtension();
                $isUserPictureUploaded = $request->uavatar->move(public_path('uploads/photos'), $fileName);
                if ($isUserPictureUploaded) {
                    $menu['profile_image'] = $fileName;
                } else {
                    return ['status' => false, 'message' => 'error in image upload'];
                }
            }

            $m = User::where('id', $request->uuserid)->update($menu);
            if ($m) {
                return ['status' => true, 'message' => 'User Profile Updated'];
            } else {
                return ['status' => false, 'message' => 'Unable to update record'];
            }
            // } catch (\Throwable $th) {
            //     return ['status' => false, 'message' => 'something went wrong'];
            // }
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
        $user = User::find($id);
        if (!empty($user->profile_image)) {
            $fileUrl = public_path() . "/uploads/photos/" . $user->profile_image;
            //die();
            unlink($fileUrl);
        }
        $user->delete();
        return ['status' => true, 'message' => 'User deleted successfully'];
    }

    public function change_status($id)
    {
        $user = User::find($id);
        if ($user->status) {
            $user->update(['status' => 0]);
            $msg = 'User successfully inactive';
        } else {
            $user->update(['status' => 1]);
            $msg = 'User successfully activate';
        }
        return ['status' => true, 'message' => $msg];
    }
}
