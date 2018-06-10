<?php return [
    'plugin' => [
        'name' => 'OTLT (One True Lookup Table)',
        'description' => 'Allows to work with One True Lookup Table. Use with caution, as OTLT is usually considered poor database design.'
    ],
    'navigation' => [
        'otlt' => 'OTLT',
    ],
    'permissions' => [
        'access_lookup_module' => 'Access One True Lookup Table Module',
        'manage_lookupvalues' => 'Manage Lookup Values'
    ],
    'models' => [
        'loopkup_value' => [
            'singular' => 'Lookup Value',
            'plural' => 'Lookup Values'
        ]
    ],
    'columns' => [
        'id' => 'ID',
        'name' => 'Name',
        'extra' => 'Extra',
        'is_published' => 'Published',
        'user_name' => 'Author',
        'created_at' => 'Created at',
        'updated_at' => 'Last update'
    ],
    'fields' => [
        'name' => [
            'label' => 'Name'
        ],
        'extra' => [
            'label' => 'Extra'
        ],
        'is_published' => [
            'label' => 'Published',
            'comment' => 'Determine if the lookup value should be included in system dropdowns'
        ]
    ],
    'scopes' => [
        'published' => 'Published'
    ],
    'views' => [
        'create' => 'Create',
        'update' => 'Update'
    ]
];