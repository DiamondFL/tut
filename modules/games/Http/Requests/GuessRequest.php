<?php

namespace Game\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuessRequest extends FormRequest
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
            COIN_COL => 'max:' . auth()->user()->coin
        ];
    }

    public function messages()
    {
       return [
           COIN_COL . '.max' => 'Không thể đặt số coin lớn hơn tài sản hiện tại'
       ];
    }
}
