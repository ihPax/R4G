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

    'accepted'             => "Il campo ':attribute' deve essere accettato.",
    'active_url'           => "Il campo ':attribute' non contiene un indirizzo email valido.",
    'after'                => "Il campo ':attribute' deve essere successivo a :date.",
    'after_or_equal'       => "Il campo ':attribute' deve essere successivo o uguale a :date.",
    'alpha'                => "Il campo ':attribute' può contenere solamente lettere.",
    'alpha_dash'           => "Il campo ':attribute' può contenere solamente lettere, numeri e trattini.",
    'alpha_num'            => "Il campo ':attribute' può contenere solamente lettere e numeri.",
    'array'                => "Il campo ':attribute' deve essere un array.",
    'before'               => "Il campo ':attribute' deve essere una data antecedente a :date.",
    'before_or_equal'      => "Il campo ':attribute' deve essere una data antecedente o uguale a :date.",
    'between'              => [
        'numeric' => "Il campo ':attribute' deve essere compreso tra :min e :max.",
        'file'    => "Il campo ':attribute' deve essere compreso tra :min e :max kilobytes.",
        'string'  => "Il campo ':attribute' deve essere compreso tra :min and :max caratteri.",
        'array'   => "Il campo ':attribute' deve essere compreso tra :min and :max elementi.",
    ],
    'boolean'              => "Il campo ':attribute' deve essere vero o falso.",
    'confirmed'            => "Il campo ':attribute' non corrisponde.",
    'date'                 => "Il campo ':attribute' non è una data valida.",
    'date_equals'          => "Il campo ':attribute' deve essere uguale a :date.",
    'date_format'          => "Il campo ':attribute' non corrisponde al formato :format.",
    'different'            => "Il campo ':attribute' e :other devono essere diversi.",
    'digits'               => "Il campo ':attribute' deve essere lungo :digits caratteri.",
    'digits_between'       => "Il campo ':attribute' deve essere compreso tra :min e :max caratteri.",
    'dimensions'           => "Le dimensioni immagine di ':attribute' non sono valide",
    'distinct'             => "Il campo ':attribute' contiene dei valori duplicati",
    'email'                => "Il campo ':attribute' deve essere un indirizzo email valido.",
    'exists'               => "L'elemento ':attribute' selezionato non è valido.",
    'file'                 => "Il campo ':attribute' deve essere un file.",
    'filled'               => "Il campo ':attribute' deve essere valorizzato.",
    'gt'                   => [
        'numeric' => "Il campo ':attribute' deve essere maggiore di :value.",
        'file'    => "Il campo ':attribute' deve essere più grande di :value kilobytes.",
        'string'  => "Il campo ':attribute' deve contenere più di :value caratteri.",
        'array'   => "Il campo ':attribute' deve contenere più di :value elementi.",
    ],
    'gte'                  => [
        'numeric' => "Il campo ':attribute' deve essere maggiore o uguale di :value.",
        'file'    => "Il campo ':attribute' deve essere maggiore o uguale a :value kilobytes.",
        'string'  => "Il campo ':attribute' deve contenere almeno :value caratteri.",
        'array'   => "Il campo ':attribute' deve contenere almeno :value elementi.",
    ],
    'image'                => "Il campo ':attribute' deve essere un'immagine.",
    'in'                   => "Il campo ':attribute' selezionato non è valido.",
    'in_array'             => "Il campo ':attribute' non esiste in :other.",
    'integer'              => "Il campo ':attribute' deve essere un intero.",
    'ip'                   => "Il campo ':attribute' deve essere un indirizzo IP valido.",
    'ipv4'                 => "Il campo ':attribute' deve essere un indirizzo IPv4 valido.",
    'ipv6'                 => "Il campo ':attribute' deve essere un indirizzo IPv6 valido.",
    'json'                 => "Il campo ':attribute' deve contenere una stringa JSON valida.",
    'lt'                   => [
        'numeric' => "Il campo ':attribute' deve essere inferiore a :value.",
        'file'    => "Il campo ':attribute' deve essere più piccolo di :value kilobytes.",
        'string'  => "Il campo ':attribute' deve contenere meno di :value caratteri.",
        'array'   => "Il campo ':attribute' deve contenere meno di :value elementi.",
    ],
    'lte'                  => [
        'numeric' => "Il campo ':attribute' deve essere inferiore o uguale a :value.",
        'file'    => "Il campo ':attribute' deve essere minore o uguale a :value kilobytes.",
        'string'  => "Il campo ':attribute' deve contenere non più di :value caratteri.",
        'array'   => "Il campo ':attribute' deve contenere non più di :value elementi.",
    ],
    'max'                  => [
        'numeric' => "Il campo ':attribute' non può essere superiore a :max.",
        'file'    => "Il campo ':attribute' non può essere più grande di :max kilobytes.",
        'string'  => "Il campo ':attribute' non può essere più lungo di :max caratteri.",
        'array'   => "Il campo ':attribute' non può contenere più di :max elementi.",
    ],
    'mimes'                => "Il campo ':attribute' deve contenere un file di tipo: :values.",
    'mimetypes'            => "Il campo ':attribute' deve contenere un file di tipo: :values.",
    'min'                  => [
        'numeric' => "Il campo ':attribute' deve essere almeno :min.",
        'file'    => "Il campo ':attribute' deve essere almeno :min kilobyte.",
        'string'  => "Il campo ':attribute' deve avere almeno :min caratteri.",
        'array'   => "Il campo ':attribute' deve avere almeno :min elementi.",
    ],
    'not_in'               => "Il campo ':attribute' selezionato non è valido.",
    'not_regex'            => "Il formato di ':attribute' non è valido.",
    'numeric'              => "Il campo ':attribute' deve essere un numero.",
    'present'              => "Il campo ':attribute' deve essere presente.",
    'regex'                => "Il formato di ':attribute' non è valido.",
    'required'             => "Il campo ':attribute' è richiesto.",
    'required_if'          => "Il campo ':attribute' è richiesto quando :other è :value.",
    'required_unless'      => "Il campo ':attribute' è richiesto salvo che :other sia in :values.",
    'required_with'        => "Il campo ':attribute' è richiesto quando :values è presente.",
    'required_with_all'    => "Il campo ':attribute' è richiesto quando sono presenti :values.",
    'required_without'     => "Il campo ':attribute' è richiesto quando :values non è presente.",
    'required_without_all' => "Il campo ':attribute' è richiesto quanto nessuno di :values è presente.",
    'same'                 => "Il campo ':attribute' e :other devono corrispondere.",
    'size'                 => [
        'numeric' => "Il campo ':attribute' deve essere :size.",
        'file'    => "Il campo ':attribute' deve essere :size kilobytes.",
        'string'  => "Il campo ':attribute' deve essere di :size caratteri.",
        'array'   => "Il campo ':attribute' deve contenere :size elementi.",
    ],
    'starts_with'          => "Il campo ':attribute' deve cominciare con uno dei seguenti valori: :values",
    'string'               => "Il campo ':attribute' deve essere una stringa.",
    'timezone'             => "Il campo ':attribute' deve essere una zona valida.",
    'unique'               => "':attribute' è già in uso.",
    'uploaded'             => "L'upload di ':attribute' è fallito",
    'url'                  => "Il formato di ':attribute' non è valido.",
    'uuid'                 => "Il campo ':attribute' deve essere un UUID valido.",

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name'     => 'nome',
        'surname'  => 'cognome',
        'birthday' => 'data di nascita',
    ],
    'values' => [
        'birthday' => [
            'yesterday' => 'ieri',
            'today' => 'oggi',
            'tomorrow' => 'domani'
        ]
    ],
];