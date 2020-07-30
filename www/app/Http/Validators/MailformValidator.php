<?php

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class MailformValidator extends Validator
{
	// フリガナ katakana
	public function validateKatakana($attribute, $value, $parameters)
	{
		if(! preg_match('/^[ァ-ヶー]+$/u', $value)){
			return false;
		}	
		return true;
	}

	// prefecture 空チェック(値が0の場合は空)
	public function validateRequiredPref($attribute, $value, $parameters){
		if($value == null){
			return false;
		}else if($value == '0'){
			return false;
		}
		return true;
	}

	// zip 空チェック
	public function validateRequiredZip($attribute, $value, $parameters){
		foreach($value as $v){
			if($v == null){
				return false;
			}
		}
		return true;
	}

	// zip 3桁-4桁 数値チェック
	public function validateZip($attribute, $value, $parameters)
	{
		if(! preg_match("/^[0-9]{3}$/",$value[1])){
			return false;
		}
		if(! preg_match("/^[0-9]{4}$/",$value[2])){
			return false;
		}
		return true;
	}

	// tel 空チェック
	public function validateRequiredTel($attribute, $value, $parameters){
		foreach($value as $v){
			if($v == null){
				return false;
			}
		}
		return true;
	}

	// tel 桁、数値チェック
	public function validateTel($attribute, $value, $parameters)
	{
		$tel = $value[1].$value[2].$value[3];
		if(! preg_match("/^[0][\d-]{9,12}$/", $tel)){
			return false;
		}
		return true;
	}

	// 正常な数字かチェック
	public function validateQ2($attribute, $value, $parameters)
	{
		foreach($value as $v){
			if(! preg_match("/[1-7]/", $v)){
				return false;
			}
		}
		
		return true;
	}
}