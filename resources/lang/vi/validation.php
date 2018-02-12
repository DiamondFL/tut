<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain default error messages used by
    | validator class. Some of these rules have multiple versions such
    | as size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute must be accepted.',
    'active_url'           => ':attribute is not a valid URL.',
    'after'                => ':attribute must be a date after :date.',
    'alpha'                => ':attribute may only contain letters.',
    'alpha_dash'           => ':attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => ':attribute may only contain letters and numbers.',
    'array'                => ':attribute must be an array.',
    'before'               => ':attribute must be a date before :date.',
    'between'              => [
        'numeric' => ':attribute must be between :min and :max.',
        'file'    => ':attribute must be between :min and :max kilobytes.',
        'string'  => ':attribute must be between :min and :max characters.',
        'array'   => ':attribute must have between :min and :max phần tử.',
    ],
    'boolean'              => ':attribute phải là giá trị đúng hoặc sai.',
    'confirmed'            => ':attribute confirmation does not match.',
    'date'                 => ':attribute chưa phải là một ngày tháng.',
    'date_format'          => ':attribute does not match format :format.',
    'different'            => ':attribute and :other must be different.',
    'digits'               => ':attribute must be :digits digits.',
    'digits_between'       => ':attribute must be between :min and :max digits.',
    'distinct'             => ':attribute field has a duplicate value.',
    'email'                => ':attribute phải là một địa chỉ email.',
    'exists'               => 'lựa chọn :attribute chưa đúng.',
    'filled'               => ':attribute field is required.',
    'image'                => ':attribute must be an image.',
    'in'                   => 'lựa chọn :attribute chưa đúng.',
    'in_array'             => ':attribute field does not exist in :other.',
    'integer'              => ':attribute must be an integer.',
    'ip'                   => ':attribute must be a valid IP address.',
    'json'                 => ':attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file'    => ':attribute không được lớn hơn :max kilobytes.',
        'string'  => ':attribute không được lớn hơn :max kí tự.',
        'array'   => ':attribute không được lớn hơn :max phần tử.',
    ],
    'mimes'                => ':attribute phải là một tập tin thuộc các loại: :values.',
    'min'                  => [
        'numeric' => ':attribute không được nhỏ hơn :min.',
        'file'    => ':attribute không được nhỏ hơn :min kilobytes.',
        'string'  => ':attribute không được nhỏ hơn :min kí tự.',
        'array'   => ':attribute không được nhỏ hơn :min phần tử.',
    ],
    'not_in'               => 'lựa chọn :attribute chưa đúng.',
    'numeric'              => ':attribute phải là một số.',
    'present'              => ':attribute field must be present.',
    'regex'                => ':attribute định dạng sai.',
    'required'             => ':attribute không được để trống.',
    'required_if'          => ':attribute field is required when :other is :value.',
    'required_unless'      => ':attribute field is required unless :other is in :values.',
    'required_with'        => ':attribute field is required when :values is present.',
    'required_with_all'    => ':attribute field is required when :values is present.',
    'required_without'     => ':attribute field is required when :values is not present.',
    'required_without_all' => ':attribute field is required when none of :values are present.',
    'same'                 => ':attribute and :other must match.',
    'size'                 => [
        'numeric' => ':attribute must be :size.',
        'file'    => ':attribute must be :size kilobytes.',
        'string'  => ':attribute must be :size characters.',
        'array'   => ':attribute must contain :size phần tử.',
    ],
    'string'               => ':attribute must be a string.',
    'timezone'             => ':attribute must be a valid zone.',
    'unique'               => ':attribute đã tồn tại.',
    'url'                  => ':attribute định dạng chưa đúng.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
