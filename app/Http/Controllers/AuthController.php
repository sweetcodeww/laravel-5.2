<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller {

	public function restAuth(Request $params){
		$rule = array(
			'email' => 'email|required',
			'password' => 'required'
			);
		$validator = Validator::make($params->all(),$rule);
		if($validator->fails()){
			return array(
				'ex' => 2,
				'error' => $validator->errors()->all()
				);
		}else{
			$account = $params->only('email','password');
			if(Auth::validate($account)){
				return array(
					'ex' => 0,
					'msg' => 'Login success !'
					);
			}else{
				return array(
					'ex' => 1,
					'msg' => 'Login failed !'
					);
			}
		}
	}
}