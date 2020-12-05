<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AssetController extends BaseController
{
    public function getAssetNames(Request $request) {

      $ids = $request->all();
      //turn string into array
      $assetIds = json_decode($ids['ids'],true);
      $assetNames = DB::table('invTypes')->select('typeName')->whereIn('typeID', $assetIds)->get();
      return response()->json($assetNames);
    }
}
