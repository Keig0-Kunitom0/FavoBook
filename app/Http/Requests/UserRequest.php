<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    
    public function rules()
    {
        return [
            'nickname' => 'required|max:15|',
            'email' => 'required|string|email|max:255|' . Rule::unique('users')->ignore(Auth::id()),
            'self_introduction' => 'string|max:200|nullable',
        ];
    }

    public function attributes()
    {
        return [
            'nickname' => 'ニックネーム',
            'email' => 'メールアドレス',
            'self_introduction' => '自己紹介文',
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => 'ニックネームを入力してください。',
            'nickname.max' => 'ニックネームは15文字以内です。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスの形式に誤りがあります。' ,
            'email.max' => 'メールアドレスを入力してください。',
            'self_introduction.max' => '自己紹介文は200文字以内です。',
        ];
    }
}
