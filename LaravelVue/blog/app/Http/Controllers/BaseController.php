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
//        echo "<pre>";
//        var_dump(response()->json($response,200));   Cách hiển thị Json cho dễ nhìn
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
