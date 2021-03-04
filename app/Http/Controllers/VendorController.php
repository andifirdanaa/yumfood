<?php

namespace App\Http\Controllers;

use App\Http\Resources\VendorResource;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return VendorResource::collection(Vendor::paginate());
        // $vendor = Vendor::all();
        return response()->json(
        [
            "message"=> "SUCCESS",
            "data"=>$vendor
        ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor = new VendorResource;
        $vendor = $request->name;
        $vendor = $request->logo;
        $vendor = TagResource($request->tags);
        $vendor->save();

        return response()->json(
        [
            "message"=> "SUCCESS",
            "data"=>$vendor
        ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::where('id',$id)->get();

        return response()->json(
        [
            "message"=> "Success" . $id,
            "data"=> $vendor
        ]
        );
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
        $vendor = Vendor::where('id', $id)->first();
        if($vendor){
            $vendor = $request->name;
            $vendor = $request->logo;
            $vendor->save();
            return response()->json(
                [
                    "message"=>"SUCCESS",
                    "data"=> $vendor
                ]
                );
        }
        return response()->json(
                [
                    "message"=>"Failed". $id
                ],400
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendor = Vendor::where('id',$id)->first();
        if($vendor){
            $vendor->delete();
             return response()->json(
                [
                    "message"=>"SUCCESS". $vendor
                ]
        );
        }
        return response()->json(
                [
                    "message"=>"Failed". $id
                ],400
        );
    }
}
