<?php

/*
|--------------------------------------------------------------------------
| SOFWAH-WEB · Organisation chart + open positions (from the Sofwah Org Chart)
|--------------------------------------------------------------------------
| 'photo' = path under public/ once the real headshot is provided; null shows
| a branded initials avatar. All roles are treated as OPEN for hiring.
*/

return [
    'leadership' => [
        ['name' => 'Abu Qohafah',         'role' => 'Founder & CEO',                    'tier' => 1, 'photo' => 'images/team/abu.jpg'],
        ['name' => 'Nur Afiqah',          'role' => 'Co-Founder & General Manager',     'tier' => 1, 'photo' => 'images/team/afiqah.jpg'],
        ['name' => 'Nur Azira',           'role' => 'Finance & Account Manager',        'tier' => 2, 'photo' => 'images/team/azira.jpg'],
        ['name' => 'NurKaisah Firzanah',  'role' => 'Human Resources Generalist',       'tier' => 2, 'photo' => 'images/team/nurkaisah.jpg'],
        ['name' => 'Mazliatul Farain',    'role' => 'Company Secretary',                'tier' => 2, 'photo' => 'images/team/farain.jpg'],
        ['name' => 'Nur Syaidatul Akmar', 'role' => 'Marketing, Brand & CX Manager',    'tier' => 2, 'photo' => 'images/team/syaidatul.jpg'],
        ['name' => 'Muhammad Hakeem',     'role' => 'Operational & Sales Manager',      'tier' => 2, 'photo' => 'images/team/hakeem.jpg'],
    ],

    'departments' => [
        [
            'key' => 'finance', 'name_bm' => 'Kewangan & Akaun', 'name_en' => 'Finance & Account',
            'lead' => 'Nur Azira',
            'roles' => ['Account Executive', 'Admin Accountant'],
        ],
        [
            'key' => 'hr', 'name_bm' => 'Sumber Manusia', 'name_en' => 'Human Resources',
            'lead' => 'NurKaisah Firzanah',
            'roles' => ['People & Talent Executive', 'HR Executive'],
        ],
        [
            'key' => 'admin', 'name_bm' => 'Setiausaha & Admin', 'name_en' => 'Secretary & Admin',
            'lead' => 'Mazliatul Farain',
            'roles' => ['Senior Admin Executive', 'Admin Executive'],
        ],
        [
            'key' => 'mbcx', 'name_bm' => 'Marketing, Brand & CX', 'name_en' => 'Marketing, Brand & CX',
            'lead' => 'Nur Syaidatul Akmar',
            'roles' => ['Brand & CX Executive', 'Social Media Manager', 'Content Creator', 'Creative Team'],
        ],
        [
            'key' => 'ops', 'name_bm' => 'Operasi & Servis', 'name_en' => 'Operations & Service',
            'lead' => 'Muhammad Hakeem',
            'roles' => ['Branch Manager', 'Head Chef', 'Captain', 'Back House', 'Front House'],
        ],
    ],
];
