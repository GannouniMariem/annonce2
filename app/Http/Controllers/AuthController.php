<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    use GeneralTrait;
    
    public function login(Request $request)
    {

        try {

            //validation

            $rules = [
                'email' => 'required',
                'password' => 'required'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            //login

            $credentials = $request->only(['email', 'password']);

            /** @var MyGurdClass $guard */

            $guard = Auth::guard('admin-api');
            $token = $guard->attempt($credentials);
            
            if (!$token){
                return $this->returnError('E001', 'Login ou mot de passe invalide');
            }
            
            return $this->returnData('token', $token, "login succsessfully");



            //return token (jwt)

        } catch (\Exception $e) {

            return $this->returnError($e->getCode(), $e->getMessage());
        }
    }}
