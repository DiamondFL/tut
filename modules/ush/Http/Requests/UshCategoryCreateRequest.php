<?php

namespace Ush\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UshCategoryCreateRequest extends FormRequest
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
            'name' => 'required|unique:' . USH_SUB_CATEGORIES_TB
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
