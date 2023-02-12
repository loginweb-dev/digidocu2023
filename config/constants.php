<?php
return [
    'STATUS' => [
        "PENDING" => 'PENDIENTE',
        "ACTIVE" => 'ACTIVO',
        "BLOCK" => 'INACTIVO',
        "REJECT" => 'RECHAZADO',
        "APPROVED" => 'APPROVADO',
    ],
    'GLOBAL_PERMISSIONS' => [ //permission is = permission=>label of permission
        'USERS' => [
            'create users' => 'create',
            'read users' => 'read',
            'update users' => 'update',
            'delete users' => 'delete',
            'user manage permission' => 'permission management',
        ],
        'TAGS' => [
            'create tags' => 'create',
            'read tags' => 'read',
            'update tags' => 'update',
            'delete tags' => 'delete',
        ],
        'DOCUMENTS' => [
            'create documents' => 'Crear',
            'read documents' => 'leer',
            'update documents' => 'acttualizar',
            'delete documents' => 'eliminar',
            'verify documents' => 'verificar',
        ]
    ],
    'TAG_LEVEL_PERMISSIONS' => [
        'read documents in tag ' => 'leer',
        'create documents in tag ' => 'crear',
        'update documents in tag ' => 'acttualizar',
        'delete documents in tag ' => 'eliminar',
        'verify documents in tag ' => 'verificar',
    ],
    'DOCUMENT_LEVEL_PERMISSIONS' => [
        'read document ' => 'leer',
        'update document ' => 'editar',
        'delete document ' => 'eliminar',
        'verify document ' => 'verificar',
    ]
];
