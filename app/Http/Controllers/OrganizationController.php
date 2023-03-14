<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisation;
use Validator;
use DB;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['orgs'] = Organisation::all();
        return view('organization.index', $data);
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
                'org_name' => 'required',
                'org_email' => 'required',

            ]);
            if ($validator->fails()) {
                return ['status' => false, 'message' => 'field missing'];
            }

            try {
                $menu = [
                    'org_name' => $request->org_name,
                    'email' => $request->org_email,
                    'address' => $request->org_addr ?? '',
                    'status' =>  1,
                ];
                // return $menu;
                if ($request->org_id == 0) {
                    $m = Organisation::create($menu);
                    if ($m->id > 0) {

                        return ['status' => true, 'message' => 'Record saved'];
                    } else {
                        return ['status' => false, 'message' => 'Unable to save record'];
                    }
                } else {
                    $m = Organisation::where('id', $request->org_id)->update($menu);
                    if ($m) {

                        return ['status' => true, 'message' => 'Record Updated'];
                    } else {
                        return ['status' => false, 'message' => 'Unable to update record'];
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
        $org = Organisation::find($id);
        $org->delete();
        return ['status' => true, 'message' => 'Record deleted'];
    }

    public function change_status($id)
    {
        $org = Organisation::where(['id' => $id]);
        if ($org->status) {
            $org->update(['status' => 0]);
            $msg = 'Organization successfully inactive';
        } else {
            $org->update(['status' => 1]);
            $msg = 'Organization successfully activate';
        }
        return ['status' => true, 'message' => $msg];
    }
}
