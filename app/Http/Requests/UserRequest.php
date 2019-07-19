<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Route;

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
    public function rules(Request $request)
    {
        return [
            'username'  => 'required|min:2|max:32',
            'password'  => 'required|min:6|max:32',
            'email'     => 'required|email|unique:users,email',
        ];
    }

    public function messages()
    {
        return [
            'username.required'     => "Vui lòng nhập tên đăng nhập",
            'username.min'          => "Tên phải nhiều ít nhất 2 ký tự",
            'username.max'          => "Tên phải tối đa 32 ký tự",
            'email.required'        => "Vui lòng nhập email",
            'email.email'           => "Email của bạn chưa đúng",
            'email.unique'          => "Email của bạn đã tồn tại",
            'password.required'     => "Vui lòng nhập mật khẩu",
            'password.min'          => "Mật khẩu phải ít nhất 6 ký tự",
            'password.max'          => "Mật khẩu phải tối đa 32 ký tự",
        ];
    }
}
