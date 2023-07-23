<?php

namespace App\Traits;

trait ApiResponseHandler
{

    public function getCurrentLang()
    {
        return app()->getLocale();
    }

    public function returnError($msg)
    {
        return response()->json([
            'status' => 400,
            'message' => $msg
        ]);
    }

    public function notAuthorized($msg): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 403,
            'message' => $msg
        ]);
    }


    public function returnSuccessMessage($msg = "")
    {
        return response()->json([
            'status' => 200,
            'message' => $msg,
        ]);
    }

    public function returnData($key, $value, $msg = "")
    {
        return response()->json([
            'status' => 200,
            'message' => $msg,
            $key => $value
        ]);
    }



    public function returnValidationError($validator)
    {
        return $this->returnError($validator->errors()->first());
    }


    public function returnCodeAccordingToInput($validator)
    {
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getErrorCode($inputs[0]);
        return $code;
    }

}
