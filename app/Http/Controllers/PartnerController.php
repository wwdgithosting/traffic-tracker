<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\Partner;
use Validator;
use DB;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orgs'] = Organisation::all();
        $data['partners'] = Partner::with('organization')->get();
        return view('partners.index', $data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $index = $request->all();
            // return $request->all();
            $validator = Validator::make($index, [
                'partners_name' => 'required',
                'org_id' => 'required',

            ]);
            if ($validator->fails()) {
                return ['status' => false, 'message' => 'field missing'];
            }

            try {
                $menu = [
                    'partners_name' => $request->partners_name,
                    'org_id' => $request->org_id,
                    'status' =>  1,
                ];
                // return $menu;
                if ($request->partners_id == 0) {
                    $m = Partner::create($menu);
                    if ($m->id > 0) {

                        return ['status' => true, 'message' => 'Record saved'];
                    } else {
                        return ['status' => false, 'message' => 'Unable to save record'];
                    }
                } else {
                    $m = Partner::where('id', $request->partners_id)->update($menu);
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
        $org = Partner::find($id);
        $org->delete();
        return ['status' => true, 'message' => 'Record deleted'];
    }
}
