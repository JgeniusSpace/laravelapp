<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => 'bail|required|unique:menus',
            'icon' => 'required',
            'url' => 'required',
//            'heightlight_url' => 'required',
            'sort' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '菜单名称不能为空',
            'name.unique' => '菜单名称重复',
            'icon.required' => '菜单图标不能为空',
            'url.required' => '菜单链接不能为空',
//            'heightlight_url.required' => '菜单高亮不能为空',
            'sort.required' => '菜单排序不能为空',
        ];
    }
}
