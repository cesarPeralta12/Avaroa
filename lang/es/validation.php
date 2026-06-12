<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Mensajes de validación AVAROA (es)
    |--------------------------------------------------------------------------
    | Mensajes claros y específicos por regla, según el documento de cambios.
    | NO usar mensajes genéricos como "Validation Error".
    */

    'accepted'             => 'Debes aceptar :attribute para continuar.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => ':attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => ':attribute solo puede contener letras.',
    'alpha_dash'           => ':attribute solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num'            => ':attribute solo puede contener letras y números.',
    'array'                => ':attribute debe ser una lista.',
    'before'               => ':attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => ':attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => ':attribute debe estar entre :min y :max.',
        'file'    => ':attribute debe pesar entre :min y :max kilobytes.',
        'string'  => ':attribute debe tener entre :min y :max caracteres.',
        'array'   => ':attribute debe tener entre :min y :max elementos.',
    ],
    'boolean'              => 'El valor de :attribute debe ser verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no coincide.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_equals'          => ':attribute debe ser igual a :date.',
    'date_format'          => ':attribute no corresponde al formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe tener :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => 'Las dimensiones de la imagen :attribute no son válidas.',
    'distinct'             => ':attribute tiene un valor duplicado.',
    'email'                => 'La dirección de correo ingresada no es válida.',
    'ends_with'            => ':attribute debe terminar en uno de los siguientes valores: :values.',
    'exists'               => ':attribute no existe en nuestros registros.',
    'file'                 => ':attribute debe ser un archivo.',
    'filled'               => 'Este campo es obligatorio.',
    'gt'                   => [
        'numeric' => ':attribute debe ser mayor a :value.',
        'file'    => ':attribute debe pesar más de :value kilobytes.',
        'string'  => ':attribute debe tener más de :value caracteres.',
        'array'   => ':attribute debe tener más de :value elementos.',
    ],
    'gte'                  => [
        'numeric' => ':attribute debe ser mayor o igual a :value.',
        'file'    => ':attribute debe pesar al menos :value kilobytes.',
        'string'  => ':attribute debe tener al menos :value caracteres.',
        'array'   => ':attribute debe tener al menos :value elementos.',
    ],
    'image'                => 'El archivo debe ser una imagen válida.',
    'in'                   => ':attribute no es válido.',
    'in_array'             => ':attribute no existe en :other.',
    'integer'              => ':attribute debe ser un número entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'ipv4'                 => ':attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => ':attribute debe ser una dirección IPv6 válida.',
    'json'                 => ':attribute debe ser un JSON válido.',
    'lt'                   => [
        'numeric' => ':attribute debe ser menor a :value.',
        'file'    => ':attribute debe pesar menos de :value kilobytes.',
        'string'  => ':attribute debe tener menos de :value caracteres.',
        'array'   => ':attribute debe tener menos de :value elementos.',
    ],
    'lte'                  => [
        'numeric' => ':attribute debe ser menor o igual a :value.',
        'file'    => ':attribute debe pesar como máximo :value kilobytes.',
        'string'  => ':attribute debe tener como máximo :value caracteres.',
        'array'   => ':attribute no debe tener más de :value elementos.',
    ],
    'max'                  => [
        'numeric' => ':attribute no debe ser mayor a :max.',
        'file'    => 'El archivo excede el tamaño máximo permitido (:max KB).',
        'string'  => ':attribute no debe tener más de :max caracteres.',
        'array'   => ':attribute no debe tener más de :max elementos.',
    ],
    'mimes'                => 'El archivo debe ser una imagen válida (:values).',
    'mimetypes'            => 'El archivo debe ser de tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute debe ser al menos :min.',
        'file'    => 'El archivo debe pesar al menos :min KB.',
        'string'  => ':attribute debe tener al menos :min caracteres.',
        'array'   => ':attribute debe tener al menos :min elementos.',
    ],
    'not_in'               => ':attribute no es válido.',
    'not_regex'            => 'El formato de :attribute no es válido.',
    'numeric'              => ':attribute debe ser un número.',
    'present'              => 'Este campo es obligatorio.',
    'regex'                => 'El formato de :attribute no es válido.',
    'required'             => 'Este campo es obligatorio.',
    'required_if'          => 'Este campo es obligatorio cuando :other es :value.',
    'required_unless'      => 'Este campo es obligatorio a menos que :other esté en :values.',
    'required_with'        => 'Este campo es obligatorio cuando :values está presente.',
    'required_with_all'    => 'Este campo es obligatorio cuando :values están presentes.',
    'required_without'     => 'Este campo es obligatorio cuando :values no está presente.',
    'required_without_all' => 'Este campo es obligatorio cuando ninguno de :values está presente.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => ':attribute debe ser :size.',
        'file'    => ':attribute debe pesar :size KB.',
        'string'  => ':attribute debe tener :size caracteres.',
        'array'   => ':attribute debe contener :size elementos.',
    ],
    'starts_with'          => ':attribute debe empezar por uno de los siguientes valores: :values.',
    'string'               => ':attribute debe ser una cadena de texto.',
    'timezone'             => ':attribute debe ser una zona horaria válida.',
    'unique'               => ':attribute ya está registrado.',
    'uploaded'             => 'No pudimos subir :attribute. Intenta de nuevo.',
    'url'                  => 'El formato de :attribute no es válido.',
    'uuid'                 => ':attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Mensajes personalizados por atributo + regla
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'email' => [
            'unique'   => 'Este correo ya está registrado. Por favor, intenta con otro correo.',
            'email'    => 'La dirección de correo ingresada no es válida.',
            'required' => 'El correo electrónico es obligatorio.',
        ],
        'password' => [
            'min'      => 'La contraseña debe tener al menos :min caracteres.',
            'required' => 'La contraseña es obligatoria.',
            'confirmed'=> 'Las contraseñas no coinciden.',
        ],
        'phone' => [
            'required' => 'El número de teléfono es obligatorio.',
            'regex'    => 'El número de teléfono no es válido.',
            'unique'   => 'Este número de teléfono ya está registrado.',
        ],
        'whatsapp_number' => [
            'required' => 'El número de WhatsApp es obligatorio.',
            'regex'    => 'El número de WhatsApp no es válido.',
        ],
        'otp' => [
            'required' => 'El código de verificación es obligatorio.',
            'digits'   => 'El código de verificación es incorrecto.',
        ],
        'verification_code' => [
            'required' => 'El código de verificación es obligatorio.',
            'digits'   => 'El código de verificación es incorrecto.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Nombres legibles de atributos
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'email'                 => 'el correo',
        'password'              => 'la contraseña',
        'password_confirmation' => 'la confirmación de contraseña',
        'phone'                 => 'el número de teléfono',
        'whatsapp_number'       => 'el número de WhatsApp',
        'name'                  => 'el nombre',
        'first_name'            => 'el nombre',
        'last_name'             => 'el apellido',
        'otp'                   => 'el código de verificación',
        'verification_code'     => 'el código de verificación',
        'license_plate'         => 'la placa',
        'vehicle_type'          => 'el tipo de vehículo',
        'vehicle_model'         => 'el modelo del vehículo',
        'vehicle_year'          => 'el año del vehículo',
        'vehicle_color'         => 'el color del vehículo',
        'id_card_front'         => 'la foto frontal del documento',
        'id_card_back'          => 'la foto posterior del documento',
        'document'              => 'el documento',
    ],
];
