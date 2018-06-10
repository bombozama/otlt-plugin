<?php return [
    'plugin' => [
        'name' => 'OTLT (One True Lookup Table)',
        'description' => 'Permite operar con un solo "lookup table" para múltiples datos del tipo atributo-valor. Precaución!! se considera una mala práctica de modelamiento de datos.'
    ],
    'navigation' => [
        'otlt' => 'OTLT'
    ],
    'permissions' => [
        'access_lookup_module' => 'Acceder al módulo de OTLT',
        'manage_lookupvalues' => 'Gestionar Atributos (requerido para operar con OTLT)'
    ],
    'models' => [
        'loopkupvalue' => [
            'singular' => 'Atributo',
            'plural' => 'Atributos'
        ]
    ],
    'columns' => [
        'id' => 'ID',
        'name' => 'Nombre',
        'extra' => 'Extra',
        'is_published' => 'Publicado',
        'user_name' => 'Creador',
        'created_at' => 'Fecha de creación',
        'updated_at' => 'Última actualización'
    ],
    'fields' => [
        'name' => [
            'label' => 'Nombre'
        ],
        'extra' => [
            'label' => 'Atributo adicional'
        ],
        'is_published' => [
            'label' => 'Publicado',
            'comment' => 'Seleccione si el elemento se debe mostrarse o no en el sistema'
        ]
    ],
    'scopes' => [
        'published' => 'Publicado'
    ],
    'views' => [
        'create' => 'Crear',
        'update' => 'Actualizar'
    ]
];