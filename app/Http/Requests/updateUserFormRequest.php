<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateUserFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->id;

        return [
            'name' => 'required|string|max:25|min:3',
            'email' => [
                'required',
                'email',
                "unique:users,email,{$id},id"
            ],
            'password' => [
                'required',
                'min:6',
                'max:8'
            ]
        ];
    }
}
