<?php

namespace App\Http\Controllers;

use App\Models\MenuMaster;
use App\Models\UserRoleMaster;
use Illuminate\Http\Request;
use Validator;
use DB;

class MenuItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['module'] = 'Menu';
        $menues = MenuMaster::with('roles')->get();
        if (count($menues) > 0) {
            $m = 0;
            foreach ($menues as $key => $value) {
                $roles = $value->roles;
                $r = 0;
                foreach ($roles as $key1 => $value1) {
                    $menues[$m]->roles[$r]->role_name = UserRoleMaster::find($value1->user_role_id)->role_name;
                    $r++;
                }

                $m++;
            }
        }
        $data['menues'] =  $menues;
        return view('menu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        if ($request->isMethod('post')) {
            $index = $request->all();
            $validator = Validator::make($index, [
                'title' => 'required',
                'url' => 'required',
            ]);
            if ($validator->fails()) {
                return ['status' => false, 'message' => 'field missing'];
            }

            try {
                $menu = [
                    'menu_name' => $request->title,
                    'url' => $request->url,
                    'status' => ($request->is_active) ? 1 : 0,
                ];
                $m = MenuMaster::create($menu);
                if ($m->id > 0) {

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
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return $request->all();
        if ($request->isMethod('post')) {
            $index = $request->all();
            $validator = Validator::make($index, [
                'title' => 'required',
                'url' => 'required',
            ]);
            if ($validator->fails()) {
                return ['status' => false, 'message' => 'field missing'];
            }

            try {
                $menu = [
                    'menu_name' => $request->title,
                    'url' => $request->url,
                    'status' => ($request->is_active) ? 1 : 0,
                ];
                $m = MenuMaster::where('id', $request->id)->update($menu);

                // return $m;
                if ($m > 0) {

                    //die();

                    return ['status' => true, 'message' => 'Record updated'];
                } else {
                    return ['status' => false, 'message' => 'Unable to update record'];
                }
            } catch (\Throwable $th) {

                return ['status' => false, 'message' => 'Something went wrong'];
            }
        } else {
            return ['status' => false, 'message' => 'No data post'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            MenuMaster::where('id', $id)->delete();

            return ['status' => true, 'message' => 'Record deleted'];
        } catch (\Throwable $th) {
            return ['status' => false, 'message' => 'something went wrong'];
        }
    }

    public function status_change($id)
    {
        $user = MenuMaster::find($id);
        if (is_object($user)) {
            if ($user->status == 1) {
                $user->update(['status' => 0]);
                $msg = 'Inactive';
            } else {
                $user->update(['status' => 1]);
                $msg = 'Activated';
            }

            return back()->with([
                'success' => 'Menu ' . $msg . ' successfully',
            ]);
        }
    }

    /*public function add_previledges($id)
    {

        $menues = MenuMaster::with(['operation'])->get();
        DB::enableQueryLog();
        // $prev = UserWisePreviledge::where('user_id', $id)->select('menu_id', 'mode_id')->get();
        if (count($menues) > 0) {
            $i = 0;
            foreach ($menues as $menu) {
                $operations = $menu->operation;
                $menues[$i]->is_active = UserWisePreviledge::where(['user_id' => $id, 'menu_id' => $menu->id])->count();
                $mode = UserWisePreviledge::where(['user_id' => $id, 'menu_id' => $menu->id])->select('mode_id')->first();
                //return $mode->mode_id;
                if (count($operations) > 0 && is_object($mode)) {
                    $o = 0;
                    foreach ($operations as $operstion) {

                        if (in_array($operstion->id, explode(',', $mode->mode_id))) {
                            $menues[$i]->operation[$o]->is_active = 1;
                        } else {
                            $menues[$i]->operation[$o]->is_active = 0;
                        }
                        //dd(DB::getQueryLog());
                        $o++;
                    }
                }
                $i++;
            }
        }

        return $menues;
    }*/
}
