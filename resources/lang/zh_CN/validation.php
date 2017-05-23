<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute 必须接受。',
    'active_url'           => ':attribute 不是正确的 URL。',
    'after'                => ':attribute 必须晚于 :date。',
    'after_or_equal'       => ':attribute 必须等于或晚于 :date。',
    'alpha'                => ':attribute 只能包含字母。',
    'alpha_dash'           => ':attribute 只能包含字母、数字和短横线。',
    'alpha_num'            => ':attribute 只能包含字母和数字。',
    'array'                => ':attribute 必须是一个数组。',
    'before'               => ':attribute 必须早于 :date。',
    'before_or_equal'      => ':attribute 必须早于或等于 :date。',
    'between'              => [
        'numeric' => ':attribute 必须在 :min 和 :max 之间。',
        'file'    => ':attribute 必须在 :min 和 :max kb之间。',
        'string'  => ':attribute 必须在 :min 和 :max 个字符之间。',
        'array'   => ':attribute 必须包含 :min 到 :max 个项目。',
    ],
    'boolean'              => ':attribute 必须是 true 或 false。',
    'confirmed'            => ':attribute 不匹配。',
    'date'                 => ':attribute 不是正确的日期。',
    'date_format'          => ':attribute 不匹配以下格式： :format。',
    'different'            => ':attribute 和 :other 必须不同。',
    'digits'               => ':attribute 必须为 :digits 位数。',
    'digits_between'       => ':attribute 必须在 :min 至 :max 位数之间。',
    'dimensions'           => ':attribute 图像尺寸无效。',
    'distinct'             => ':attribute 字段值有重复。',
    'email'                => ':attribute 必须是正确的email地址。',
    'exists'               => '选定的 :attribute 无效。',
    'file'                 => ':attribute 必须是一个文件。',
    'filled'               => ':attribute 必须有一个值。',
    'image'                => ':attribute 必须是一个图片。',
    'in'                   => '选定的 :attribute 无效。',
    'in_array'             => ':attribute 字段在 :other 中不存在。',
    'integer'              => ':attribute 必须是整数。',
    'ip'                   => ':attribute 必须是有效的 IP 地址。',
    'ipv4'                 => ':attribute 必须是有效的 IPv4 地址。',
    'ipv6'                 => ':attribute 必须是有效的 IPv6 地址。',
    'json'                 => ':attribute 必须是有效的 JSON 字符串。',
    'max'                  => [
        'numeric' => ':attribute 不可大于 :max。',
        'file'    => ':attribute 不可大于 :max kb。',
        'string'  => ':attribute 不可大于 :max 字符。',
        'array'   => ':attribute 不可多于 :max 个项目。',
    ],
    'mimes'                => ':attribute 必须是以下类型的文件： :values。',
    'mimetypes'            => ':attribute 必须是以下类型的文件： :values。',
    'min'                  => [
        'numeric' => ':attribute 必须不小于 :min。',
        'file'    => ':attribute 必须不小于 :min kb。',
        'string'  => ':attribute 必须不小于 :min 字符。',
        'array'   => ':attribute 必须不少于 :min 个项目。',
    ],
    'not_in'               => '选定的 :attribute 无效。',
    'numeric'              => ':attribute 必须为数字。',
    'present'              => ':attribute 必须存在。',
    'regex'                => ':attribute 格式无效。',
    'required'             => ':attribute 为必填项。',
    'required_if'          => '当 :other 的值为 :value 时，:attribute 必填。',
    'required_unless'      => ':attribute 为必填项，除非 :other 存在于 :values。',
    'required_with'        => '当 :values 存在时，:attribute 为必填项。',
    'required_with_all'    => '当 :values 存在时，:attribute 为必填项。',
    'required_without'     => '当 :values 不存在时，:attribute 为必填项。',
    'required_without_all' => '当 :values 都不存在时，:attribute 为必填项。',
    'same'                 => ':attribute 和 :other 必须匹配。',
    'size'                 => [
        'numeric' => ':attribute 必须为 :size。',
        'file'    => ':attribute 必须为 :size kb。',
        'string'  => ':attribute 必须为 :size 字符。',
        'array'   => ':attribute 必须包含 :size 个项目。',
    ],
    'string'               => ':attribute 必须为字符串。',
    'timezone'             => ':attribute 必须是有效时区。',
    'unique'               => ':attribute 已经存在。',
    'uploaded'             => ':attribute 无法上传。',
    'url'                  => ':attribute 格式无效。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
