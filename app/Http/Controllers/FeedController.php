<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Models\Feed;
use App\Models\User;
use App\Models\FeedURL;
use App\Models\Partner;
use App\Models\FeedURLSubID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authUser = Auth::user();
        if ($authUser->roles == 1) {
            $patners = Partner::get();
        } else if ($authUser->roles == 2) {
            $patners = Partner::where('org_id', $authUser->company)->get();
        } else {
            $patners = Partner::where('org_id', $authUser->company)->get();
        }
        $data['patners'] = $patners;
        if ($authUser->roles == 1) {
            $feeds = Feed::with('patners')->paginate(10);
        } else {
            $feeds = Feed::with('patners')->where('created_user_id', $authUser->company)->paginate(10);
        }
        // $i = 0;
        // foreach ($feeds as $feed) {
        //     $feeds[$i]->feed_url = FeedURL::with('sub_ids')->where('feeds_id', $feed->id)->get();
        //     $i++;
        // }
        if ($request->ajax()) {
            return view('feed.table', compact('feeds'));
        }

        return view('feed.index', $data, compact('feeds'));
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
        $input = $request->all();
        //return $request->server('HTTP_USER_AGENT');
        $feed_urls = $request->feeds;
        $feeds_urls = array();
        $sid = array();
        $i = 0;
        DB::BeginTransaction();
        try {


            $feed['name'] = $request->name;
            $feed['limit'] = $request->limit;
            $feed['ip_limit'] = $request->ip_limit;
            $feed['sid_limit'] = $request->sid_limit;
            $feed['feed_url_waterfall'] = $request->feed_url_waterfall;
            $feed['randomise'] = $request->randomise;
            $feed['latency_test'] = $request->latency_test;
            $feed['fallback_feed_url'] = $request->fallback_feed_url;
            $feed['notes'] = $request->notes;
            $feed['ip'] = $request->ip();
            $feed['browser_user_agent'] = $request->server('HTTP_USER_AGENT');
            $feed['browser_language'] = $request->browser_language;
            $feed['os'] = $request->os;
            $feed['device'] = $request->device;
            $feed['browser'] = $request->browser;
            $feed['status'] = 1;
            $feed['created_user_id'] = auth()->user()->company;
            // return $feed;
            if ($request->feed_id > 0) {

                $sfeed = Feed::where('id', $request->feed_id)->update($feed);
                if ($sfeed > 0) {
                    $feed_urls = $request->feeds;
                    FeedURL::where('feeds_id', $request->feed_id)->delete();
                    FeedURLSubID::where('feed_id', $request->feed_id)->delete();
                    foreach ($feed_urls as $feed_Url) {
                        $sub_ID = $feed_Url['sub_id'];
                        $feedURLData['feeds_id'] = $request->feed_id;
                        $feedURLData['feed_url'] = $feed_Url['urls'];
                        $feedURLData['limit'] = $feed_Url['limit'];
                        $urlID = FeedURL::create($feedURLData);
                        if ($urlID->id > 0) {
                            foreach ($sub_ID as $id) {
                                $sub_ID_obj = $id['subObj'][0];
                                $feedUrl_Sub_Id['feed_urls_id'] = $urlID->id;
                                $feedUrl_Sub_Id['feed_id'] = $request->feed_id;
                                $feedUrl_Sub_Id['sub_id'] = $id['sub_id'];
                                $feedUrl_Sub_Id['feed_url_index'] = $sub_ID_obj['feed_url_index'];
                                $feedUrl_Sub_Id['limit'] = $sub_ID_obj['limit'];
                                FeedURLSubID::create($feedUrl_Sub_Id);
                            }
                        }
                    }
                    DB::commit();
                    return ['status' => true, 'message' => 'Feed added successfully'];
                } else {
                    return ['status' => false, 'message' => 'Unable to add feed'];
                }
            } else {
                $sfeed = Feed::create($feed);
                if ($sfeed->id > 0) {
                    $feed_urls = $request->feeds;
                    foreach ($feed_urls as $feed_Url) {
                        $sub_ID = $feed_Url['sub_id'];
                        $feedURLData['feeds_id'] = $sfeed->id;
                        $feedURLData['feed_url'] = $feed_Url['urls'];
                        $feedURLData['limit'] = $feed_Url['limit'];
                        $urlID = FeedURL::create($feedURLData);
                        if ($urlID->id > 0) {
                            foreach ($sub_ID as $id) {
                                $sub_ID_obj = $id['subObj'][0];
                                $feedUrl_Sub_Id['feed_urls_id'] = $urlID->id;
                                $feedUrl_Sub_Id['feed_id'] = $sfeed->id;
                                $feedUrl_Sub_Id['sub_id'] = $id['sub_id'];
                                $feedUrl_Sub_Id['feed_url_index'] = $sub_ID_obj['feed_url_index'];
                                $feedUrl_Sub_Id['limit'] = $sub_ID_obj['limit'];
                                FeedURLSubID::create($feedUrl_Sub_Id);
                            }
                        }
                    }
                    DB::commit();
                    return ['status' => true, 'message' => 'Feed added successfully'];
                } else {
                    return ['status' => false, 'message' => 'Unable to add feed'];
                }
            }
        } catch (Exception $e) {
            DB::rollBack();
            logger($e->getMessage() . '--' . $e->getLine() . '--' . $e->getFile());
            return ['status' => false, 'message' => 'Something went wrong'];
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
        $feedURL = FeedURL::with('sub_ids')->where('feeds_id', $id)->get();
        return json_encode($feedURL);
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
        FeedURL::where('feeds_id', $id)->delete();
        FeedURLSubID::where('feed_id', $id)->delete();
        Feed::where('id')->delete();
        return ['status' => true, 'message' => 'Record Deleted'];
    }
}
