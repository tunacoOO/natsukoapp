<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use RakutenRws_Client;

class RakutenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $client = new RakutenRws_Client();
        define('RAKUTEN_APPLICATION_ID', config('app.rakuten_id'));
        $client->setApplicationId(RAKUTEN_APPLICATION_ID);
        
        
        if (!empty($request->input('keyword'))) {
            $response = $client->execute('TravelKeywordHotelSearch', array(
                //入力パラメーターはバーコード
                'keyword' => $request->input('keyword'),
                'hits' => '5',
                
            ));

            if ($response->isOk()) {
                #dd($response);
                $hotels = array();
                foreach ($response as $hotel) {
                    $hotels[] = array(
                        'hotelName' => $hotel[0]['hotelBasicInfo']['hotelName'],
                        'address1' => $hotel[0]['hotelBasicInfo']['address1'],
                        'address2' => $hotel[0]['hotelBasicInfo']['address2'],
                        'hotelInformationUrl' => $hotel[0]['hotelBasicInfo']['hotelInformationUrl'],
                        );
                }
            }
            else {
            echo 'Error:'.$response->getMessage();
            }

            return view('rakuten.search')->with(['hotels' => $hotels]);
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
        //
    }
}
