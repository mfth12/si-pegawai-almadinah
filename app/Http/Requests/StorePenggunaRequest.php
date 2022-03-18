<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenggunaRequest extends FormRequest
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
            'nama' => 'required|max:255',
            'nomer_induk' => 'required|min:3|max:255|unique:penggunas',
            'email' => 'required|email:dns|unique:penggunas',
            'password' => 'required|min:5|max:114'
        ];
    }
}
