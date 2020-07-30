<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Validator;

class MailformRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() == 'form/confirm' || $this->path() == 'form/complete')
        {
            return true;
        } else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {       
        return [
            'name_sei' => 'required|max:12',
            'name_mei' => 'required|max:12',
            'kana_sei' => 'required|katakana|max:12',
            'kana_mei' => 'required|katakana|max:12',
            'zip' => 'required_zip|zip',
            'prefecture' => 'required_pref|integer|between:1,47',
            'address' => 'required|max:90',
            'building' => 'sometimes|max:90',
            'email' => 'required|email',
            'tel' => '|tel',
            'q1' => 'required|integer|between:1,5',
            'q2' => 'required|q2',
            'q3' => 'required|max:400',
            'check_policy' => 'required'
        ];
    }


    // エラーメッセージのカスタマイズ
    public function messages()
    {
        return [
            'name_sei.required' => 'お名前(姓)を入力してください。',
            'name_sei.max' => 'お名前(姓)は12文字以内で入力してください。',
            'name_mei.required' => 'お名前(名)を入力してください。',
            'name_mei.max' => 'お名前(名)は12文字以内で入力してください。',
            'kana_sei.required' => 'フリガナ(姓)を入力してください。',
            'kana_sei.katakana' => 'フリガナ(姓)はカタカナで入力してください。',
            'kana_sei.max' => 'フリガナ(姓)は12文字以内で入力してください。',
            'kana_mei.required' => 'フリガナ(名)を入力してください。',
            'kana_mei.katakana' => 'フリガナ(名)はカタカナで入力してください。',
            'kana_mei.max' => 'フリガナ(名)は12文字以内で入力してください。',
            'zip.required_zip' => '郵便番号を入力してください。',
            'zip.zip' => '郵便番号を正しく入力してください。',
            'prefecture.required_pref' => '都道府県を選択してください。',
            'prefecture.integer' => '都道府県を正しく選択してください。',
            'prefecture.between' => '都道府県を正しく選択してください。',
            'address.required' => '市区町村番地を入力してください。',
            'address.max' => '市区町村番地は90文字以内で入力してください。',
            'building.max' => '建物名・号室は90文字以内で入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスを正しく入力してください。',
            'tel.required_tel' => '電話番号を入力してください。',
            'tel.tel' => '電話番号を正しく入力してください。',
            'q1.required' => '選択してください。',
            'q1.integer' => '正しく選択してください。',
            'q1.between' => '正しく選択してください。',
            'q2.required' => '選択してください。',
            'q2.q2' => '正しく選択してください。',
            'q3.required' => '入力してください。',
            'q3.max' => '400文字以内で入力してください。',
            'check_policy.required' => '選択してください。',
        ];
    }
}
