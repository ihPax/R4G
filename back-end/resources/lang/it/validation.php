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

    'accepted'             => "L'attributo ':attribute' deve essere accettato.",
    'active_url'           => "L'attributo ':attribute' non contiene un indirizzo email valido.",
    'after'                => "L'attributo ':attribute' deve essere successivo a :date.",
    'after_or_equal'       => "L'attributo ':attribute' deve essere successivo o uguale a :date.",
    'alpha'                => "L'attributo ':attribute' può contenere solamente lettere.",
    'alpha_dash'           => "L'attributo ':attribute' può contenere solamente lettere, numeri e trattini.",
    'alpha_num'            => "L'attributo ':attribute' può contenere solamente lettere e numeri.",
    'array'                => "L'attributo ':attribute' deve essere un array.",
    'before'               => "L'attributo ':attribute' deve essere una data antecedente a :date.",
    'before_or_equal'      => "L'attributo ':attribute' deve essere una data antecedente o uguale a :date.",
    'between'              => [
        'numeric' => "L'attributo ':attribute' deve essere compreso tra :min e :max.",
        'file'    => "L'attributo ':attribute' deve essere compreso tra :min e :max kilobytes.",
        'string'  => "L'attributo ':attribute' deve essere compreso tra :min and :max caratteri.",
        'array'   => "L'attributo ':attribute' deve essere compreso tra :min and :max elementi.",
    ],
    'boolean'              => "L'attributo ':attribute' deve essere vero o falso.",
    'confirmed'            => "L'attributo ':attribute' non corrisponde.",
    'date'                 => "L'attributo ':attribute' non è una data valida.",
    'date_equals'          => "L'attributo ':attribute' deve essere uguale a :date.",
    'date_format'          => "L'attributo ':attribute' non corrisponde al formato :format.",
    'different'            => "L'attributo ':attribute' e :other devono essere diversi.",
    'digits'               => "L'attributo ':attribute' deve essere lungo :digits caratteri.",
    'digits_between'       => "L'attributo ':attribute' deve essere compreso tra :min e :max caratteri.",
    'dimensions'           => "Le dimensioni immagine di ':attribute' non sono valide",
    'distinct'             => "L'attributo ':attribute' contiene dei valori duplicati",
    'email'                => "L'attributo ':attribute' deve essere un indirizzo email valido.",
    'exists'               => "L'elemento ':attribute' selezionato non è valido.",
    'file'                 => "L'attributo ':attribute' deve essere un file.",
    'filled'               => "L'attributo ':attribute' deve essere valorizzato.",
    'gt'                   => [
        'numeric' => "L'attributo ':attribute' deve essere maggiore di :value.",
        'file'    => "L'attributo ':attribute' deve essere più grande di :value kilobytes.",
        'string'  => "L'attributo ':attribute' deve contenere più di :value caratteri.",
        'array'   => "L'attributo ':attribute' deve contenere più di :value elementi.",
    ],
    'gte'                  => [
        'numeric' => "L'attributo ':attribute' deve essere maggiore o uguale di :value.",
        'file'    => "L'attributo ':attribute' deve essere maggiore o uguale a :value kilobytes.",
        'string'  => "L'attributo ':attribute' deve contenere almeno :value caratteri.",
        'array'   => "L'attributo ':attribute' deve contenere almeno :value elementi.",
    ],
    'image'                => "L'attributo ':attribute' deve essere un'immagine.",
    'in'                   => "L'attributo ':attribute' selezionato non è valido.",
    'in_array'             => "L'attributo ':attribute' non esiste in :other.",
    'integer'              => "L'attributo ':attribute' deve essere un intero.",
    'ip'                   => "L'attributo ':attribute' deve essere un indirizzo IP valido.",
    'ipv4'                 => "L'attributo ':attribute' deve essere un indirizzo IPv4 valido.",
    'ipv6'                 => "L'attributo ':attribute' deve essere un indirizzo IPv6 valido.",
    'json'                 => "L'attributo ':attribute' deve contenere una stringa JSON valida.",
    'lt'                   => [
        'numeric' => "L'attributo ':attribute' deve essere inferiore a :value.",
        'file'    => "L'attributo ':attribute' deve essere più piccolo di :value kilobytes.",
        'string'  => "L'attributo ':attribute' deve contenere meno di :value caratteri.",
        'array'   => "L'attributo ':attribute' deve contenere meno di :value elementi.",
    ],
    'lte'                  => [
        'numeric' => "L'attributo ':attribute' deve essere inferiore o uguale a :value.",
        'file'    => "L'attributo ':attribute' deve essere minore o uguale a :value kilobytes.",
        'string'  => "L'attributo ':attribute' deve contenere non più di :value caratteri.",
        'array'   => "L'attributo ':attribute' deve contenere non più di :value elementi.",
    ],
    'max'                  => [
        'numeric' => "L'attributo ':attribute' non può essere superiore a :max.",
        'file'    => "L'attributo ':attribute' non può essere più grande di :max kilobytes.",
        'string'  => "L'attributo ':attribute' non può essere più lungo di :max caratteri.",
        'array'   => "L'attributo ':attribute' non può contenere più di :max elementi.",
    ],
    'mimes'                => "L'attributo ':attribute' deve contenere un file di tipo: :values.",
    'mimetypes'            => "L'attributo ':attribute' deve contenere un file di tipo: :values.",
    'min'                  => [
        'numeric' => "L'attributo ':attribute' deve essere almeno :min.",
        'file'    => "L'attributo ':attribute' deve essere almeno :min kilobyte.",
        'string'  => "L'attributo ':attribute' deve avere almeno :min caratteri.",
        'array'   => "L'attributo ':attribute' deve avere almeno :min elementi.",
    ],
    'not_in'               => "L'attributo ':attribute' selezionato non è valido.",
    'not_regex'            => "Il formato di ':attribute' non è valido.",
    'numeric'              => "L'attributo ':attribute' deve essere un numero.",
    'present'              => "L'attributo ':attribute' deve essere presente.",
    'regex'                => "Il formato di ':attribute' non è valido.",
    'required'             => "L'attributo ':attribute' è richiesto.",
    'required_if'          => "L'attributo ':attribute' è richiesto quando :other è :value.",
    'required_unless'      => "L'attributo ':attribute' è richiesto salvo che :other sia in :values.",
    'required_with'        => "L'attributo ':attribute' è richiesto quando :values è presente.",
    'required_with_all'    => "L'attributo ':attribute' è richiesto quando sono presenti :values.",
    'required_without'     => "L'attributo ':attribute' è richiesto quando :values non è presente.",
    'required_without_all' => "L'attributo ':attribute' è richiesto quanto nessuno di :values è presente.",
    'same'                 => "L'attributo ':attribute' e :other devono corrispondere.",
    'size'                 => [
        'numeric' => "L'attributo ':attribute' deve essere :size.",
        'file'    => "L'attributo ':attribute' deve essere :size kilobytes.",
        'string'  => "L'attributo ':attribute' deve essere di :size caratteri.",
        'array'   => "L'attributo ':attribute' deve contenere :size elementi.",
    ],
    'starts_with'          => "L'attributo ':attribute' deve cominciare con uno dei seguenti valori: :values",
    'string'               => "L'attributo ':attribute' deve essere una stringa.",
    'timezone'             => "L'attributo ':attribute' deve essere una zona valida.",
    'unique'               => "L'attributo ':attribute' è già in uso.",
    'uploaded'             => "L'upload di ':attribute' è fallito",
    'url'                  => "Il formato di ':attribute' non è valido.",
    'uuid'                 => "L'attributo ':attribute' deve essere un UUID valido.",

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