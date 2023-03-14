<?php

namespace App\Http\Controllers;

use file;
use Exception;
use Validator;
use App\Models\Feed;
use App\Models\User;
use App\Models\FeedURL;
use App\Models\Partner;
use App\Imports\ImportFeed;
use App\Models\FeedLog;
use App\Models\FeedURLSubID;
use App\Models\Organisation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use Symfony\Component\Console\Input\Input;

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
            $data['organisations'] = Organisation::all();
        } else if ($authUser->roles == 2) {
            $data['organisations'] = Organisation::where('id', $authUser->company)->get();
            $data['patners'] =  Partner::select('id', 'partners_name')->join('organization_partners', function ($join) use ($authUser) {
                $join->on('partners.id', '=', 'organization_partners.partner_id')
                    ->where('organization_partners.status', 1)
                    ->where('organization_partners.org_id', $authUser->company);
            })->get();
        } else {
            $data['organisations'] = Organisation::where('id', $authUser->company)->get();
            $data['patners'] =  Partner::select('id', 'partners_name')->join('organization_partners', function ($join) use ($authUser) {
                $join->on('partners.id', '=', 'organization_partners.partner_id')
                    ->where('organization_partners.status', 1)
                    ->where('organization_partners.org_id', $authUser->company);
            })->where('partners.status', 1)->get();
        }

        if ($authUser->roles == 1) {
            $feeds = Feed::with(['partners', 'organisation'])->paginate(10);
        } else {
            $feeds = Feed::with(['partners', 'organisation'])->where('created_user_id', $authUser->company)->paginate(10);
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


            $feed['name'] = $request->partner;
            $feed['org_id'] = $request->organization_name;
            $feed['feed_title'] = $request->feed_title;
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

    public function get_partners($id)
    {
        // DB::enableQueryLog();
        $partners = Partner::select('id', 'partners_name')->join('organization_partners', function ($join) use ($id) {
            $join->on('partners.id', '=', 'organization_partners.partner_id')
                ->where('organization_partners.org_id', $id);
        })->where('partners.status', 1)->get();
        //  DD(DB::getQueryLog());
        return $partners;
    }

    public function importFeed(Request $request)
    {
        //dd($request->all());
        if ($request->hasFile('upload_csv')) :
            $theArray = Excel::toArray([],  $request->file('upload_csv'));
            if (count($theArray) > 0) {
                $i = 0;
                foreach ($theArray[0] as $key => $value) {
                    if ($i > 0) {
                        $feed = Feed::where('id', $value[17])->get();
                        if (count($feed) == 0) {
                            $feedArray = array(
                                'id' => $value[17],
                                'feed_title' => $value[1],
                                'org_id' => $request->org_name,
                                'name' => $request->partner_import,
                                'limit' => 0,
                                'ip_limit' => 0,
                                'ip' => $value[3],
                                'randomise' => 1,
                                'fallback_feed_url' => $value[12],
                                'status' => 1,
                                'country_code' => $value[4],
                                'keyword' => $value[5],
                                'browser' => $value[6],
                                'device' => $value[7],
                                'os' => $value[8],
                                'os_version' => $value[9],
                                'browser_user_agent' => $value[10],
                                'browser_language' => $value[11],
                                'referrer' => $value[12],
                                'created_user_id' => auth()->user()->id,
                            );
                            $feedId = Feed::create($feedArray);
                            if ($feedId) {
                                $feedURLarr = array('feed_url' => $value[13], 'feeds_id' => $value[17]);
                                $feedURL = FeedURL::create($feedURLarr);
                                if ($feedURL) {
                                    $feedUrl_Sub_Id = array('feed_urls_id' => $feedURL->id, 'feed_id' => $value[17], 'sub_id' => $value[2], 'feed_url_index' => 0, 'limit' => 0);
                                    FeedURLSubID::create($feedUrl_Sub_Id);
                                }
                            }
                        } else {
                            $feedURLarr = array('feed_url' => $value[13], 'feeds_id' => $value[17]);
                            $feedURL = FeedURL::create($feedURLarr);
                            if ($feedURL) {
                                $feedUrl_Sub_Id = array('feed_urls_id' => $feedURL->id, 'feed_id' => $value[17], 'sub_id' => $value[2], 'feed_url_index' => count($feed), 'limit' => 0);
                                FeedURLSubID::create($feedUrl_Sub_Id);
                            }
                        }
                    }

                    $i++;
                }
            }

            //  Excel::import(new ImportFeed, $request->file('upload_csv')->store('files'));
            return redirect()->back()->with([
                'success' => 'File has been Imported!',
            ]);;
        endif;
    }

    public function importFeedLog(Request $request)
    {
        //dd($request->all());
        if ($request->hasFile('upload_csv')) :
            $data['org_id'] = $request->org_name;
            $data['partner_id'] = $request->partner_import;
            Excel::import(new ImportFeed($data), $request->file('upload_csv')->store('files'));

            //  Excel::import(new ImportFeed, $request->file('upload_csv')->store('files'));
            return redirect()->back()->with([
                'success' => 'File has been Imported!',
            ]);;
        endif;
    }

    public function feedLogList(Request $request)
    {
        //return $request->all();
        $authUser = Auth::user();
        if ($authUser->roles == 1) {
            $data['organisations'] = Organisation::all();
        } else if ($authUser->roles == 2) {
            $data['organisations'] = Organisation::where('id', $authUser->company)->get();
            $data['patners'] =  Partner::select('id', 'partners_name')->join('organization_partners', function ($join) use ($authUser) {
                $join->on('partners.id', '=', 'organization_partners.partner_id')
                    ->where('organization_partners.status', 1)
                    ->where('organization_partners.org_id', $authUser->company);
            })->get();
        } else {
            $data['organisations'] = Organisation::where('id', $authUser->company)->get();
            $data['patners'] =  Partner::select('id', 'partners_name')->join('organization_partners', function ($join) use ($authUser) {
                $join->on('partners.id', '=', 'organization_partners.partner_id')
                    ->where('organization_partners.status', 1)
                    ->where('organization_partners.org_id', $authUser->company);
            })->where('partners.status', 1)->get();
        }
        DB::enableQueryLog();
        $logs = FeedLog::with(['user', 'partners', 'organisation'])->orderby('id', 'desc');

        if (isset($request->org_name) && !empty($request->org_name)) {
            $logs = $logs->where('org_id', $request->org_name);
        }

        if (isset($request->partner_import) && !empty($request->partner_import)) {
            $logs = $logs->where('partner_id', $request->partner_import);
        }
        $logs = $logs->paginate(10);;
        //dd(DB::getQueryLog());
        $data['logs'] = $logs;
        return view('feed.feedLog', $data);
    }
}
