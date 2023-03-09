<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\Partner;
use App\Models\organization_partner;
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
        $user = auth()->user();

        if ($user->roles == 1) {
            $data['orgs'] = Organisation::all();
            $data['partners'] = Partner::with(['organisations' => function ($query) {
                $query->select('id', 'org_name', 'organisations.status');
            }])->get();
        } else {
            $data['orgs'] = Organisation::where('id', $user->company)->get();
            $data['partners'] = Partner::with(['organisations' => function ($query) use ($user) {
                $query->select('id', 'org_name', 'organisations.status');
                $query->where('org_id', $user->company);
            }])->get();
        }



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
            $request->all();
            $validator = Validator::make($index, [
                'partners_name' => 'required',
                'org_id' => 'required',

            ]);
            if ($validator->fails()) {
                return ['status' => false, 'message' => 'field missing'];
            }

            //try {
            $menu = [
                'partners_name' => $request->partners_name,
                'org_id' => implode(',', $request->org_id),
                'status' =>  1,
            ];
            // return $menu;
            if ($request->partners_id == 0) {
                $m = Partner::create($menu);
                if ($m->id > 0) {
                    if (count($request->org_id) > 0) {
                        foreach ($request->org_id as $org_id) {
                            $po['org_id'] = $org_id;
                            $po['partner_id'] = $m->id;

                            organization_partner::create($po);
                        }
                    }
                    return ['status' => true, 'message' => 'Record saved'];
                } else {
                    return ['status' => false, 'message' => 'Unable to save record'];
                }
            } else {
                $m = Partner::where('id', $request->partners_id)->update($menu);
                if ($m) {
                    $orgs = organization_partner::where('partner_id', $request->partners_id)->pluck('org_id');
                    if (count($request->org_id) > 0) {
                        if (count($orgs) > 0) {

                            foreach ($orgs as $org_id) {
                                if (!in_array($org_id, $request->org_id)) {
                                    $po['org_id'] = $org_id;
                                    $po['partner_id'] = $request->partners_id;
                                    organization_partner::create($po);
                                }
                            }
                        } else {
                            foreach ($request->org_id as $org_id) {
                                $po['org_id'] = $org_id;
                                $po['partner_id'] = $request->partners_id;

                                organization_partner::create($po);
                            }
                        }
                    } else {

                        if (count($request->org_id) > 0) {
                            foreach ($request->org_id as $org_id) {
                                $po['org_id'] = $org_id;
                                $po['partner_id'] = $request->partners_id;

                                organization_partner::create($po);
                            }
                        }
                    }
                    return ['status' => true, 'message' => 'Record Updated'];
                } else {
                    return ['status' => false, 'message' => 'Unable to update record'];
                }
            }
            // } catch (\Throwable $th) {
            //     return ['status' => false, 'message' => 'something went wrong'];
            // }
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
