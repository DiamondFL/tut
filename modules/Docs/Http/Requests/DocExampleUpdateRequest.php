<?php

namespace Docs\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocExampleUpdateRequest extends FormRequest
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
            TITLE_COL => "required",
            INTRO_COL => "required",
            CONTENT_COL => "required"
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
