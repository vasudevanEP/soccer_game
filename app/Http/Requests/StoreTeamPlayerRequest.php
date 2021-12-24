<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamPlayerRequest extends FormRequest
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
            'firstName' => [
                'required',
            ],
            'lastName' => [
                'required'
            ],
            'playerImage' => [
                'mimes:jpg,png,jpeg',
                'max:2048'
            ],
            'team_id' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'team_id.required' => 'Team is required.',
        ];
    }
}
