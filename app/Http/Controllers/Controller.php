<?php

namespace BCS\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use League\Fractal\TransformerAbstract;
use Optimus\Bruno\LaravelController as BaseController;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            throw new ValidationHttpException($validator->errors());
        }
    }

    protected function apiResponseSucces($data, TransformerAbstract $transformer = null, $key = 'data')
    {
        if ($transformer) {
            $data = $transformer->transform($data);
        }

        return response()->json([
            $key => $data
        ]);
    }

    protected function apiResponseError($message = 'Bad request', $status_code = 400)
    {
        return response()->json([
                'message' => $message,
                'status_code' => $status_code
                ], $status_code);
//        return response()->json([
//            'error' => [
//                'message' => $message,
//                'status' => $status_code
//            ]],
//            $status_code);
    }
}
