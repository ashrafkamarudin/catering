<?php

return [
    'role_structure' => [
        'admin' => [
            'package'       => 'c,r,u,d',
            'order'         => 'r,u',
            'sales'         => 'r',
            'customer'      => 'c,r,u,d',
            'user'          => 'c,r,u,d',
            'roles'         => 'c,r,u,d',
            'permission'    => 'c,r,u,d'
        ],
        'staff' => [
            'customer'      => 'c,r,u',
            'package'       => 'c,r,u',
            'order'         => 'r,u'
        ],
        'customer' => [
            'order'         => 'c'
        ],
    ],
    'permission_structure' => [

    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
