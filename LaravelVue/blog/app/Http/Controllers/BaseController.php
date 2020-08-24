<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result, $message) {
        $response=[
            'success'=>true,
            'code'=>200,
            'data'=>$result,
            'message'=>$message
        ];
        return response()->json($response,200);
    }
    public function sendErrors($error, $messageError=[],$code=404){
        $reponse=[
            'success'=>false,
            'message'=>$error,
        ];
        if(!$messageError){
            $reponse['data']=$messageError;
        }
        return response()->json($reponse, $error);
    }
}
