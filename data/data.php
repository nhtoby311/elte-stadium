<?php

$teams = [
    1 => [
        'id' => 1,
        'name' => 'MTK Budapest',
        'banner' => './assets/MTK/banner.png',
        'logo' => './assets/MTK/logo.png',
        'short_name' => 'MTK',
        'city' => 'Budapest',
        'founded' => '1888',
        'owner' => 'Tamás Deutsch',
        'coach' => 'Gergo Vida',
        'website' => 'mtkbudapest.hu',
        'score' => 420,
        'players' => [
            1 => [
                'id' => 1,
                'name' => 'Juhász Eszter',
                'age' => 22,
                'city' => 'Mogyorod',
                'position' => 'Right Wing',
                'number' => 31,
                'image' => './assets/MTK/juhi.png',
            ],
            2 => [
                'id' => 2,
                'name' => 'Pál Tamara',
                'age' => 22,
                'city' => 'Budapest',
                'position' => 'Leader',
                'number' => 14,
                'image' => './assets/default.png',
            ],
            3 => [
                'id' => 3,
                'name' => 'Győri Barbara',
                'age' => 22,
                'city' => 'Budapest',
                'position' => 'Goalkeeper',
                'number' => 54,
                'image' => './assets/default.png',
            ],
            4 => [
                'id' => 4,
                'name' => 'Sallai Nikolett',
                'age' => 22,
                'city' => 'Budapest',
                'position' => 'Left Wing',
                'number' => 11,
                'image' => './assets/default.png',
            ],
            5 => [
                'id' => 5,
                'name' => 'Dakos Noémi',
                'age' => 22,
                'city' => 'Budapest',
                'position' => 'Left Wing',
                'number' => 39,
                'image' => './assets/default.png',
            ],

        ],
        'recent_activities' => [
            1 => [
                'id' => 1,
                'image' => './assets/MTK/juhi.png',
                'description' => 'Juhasz Eszter has played surprisingly! Scored 2 goals in the last match',
                'time' => '1h'
            ],
            2 => [
                'id' => 2,
                'image' => './assets/MTK/logo.png',
                'description' => 'MTK Budapest has moved on to the 1st position in the top team with 420 points',
                'time' => '2h'
            ],
            3 => [
                'id' => 3,
                'image' => './assets/default.png',
                'description' => 'Coach has shared his opinion on the Chelsea match last week',
                'time' => '5h'
            ],
        ],
        'comments' => [
            1 => [
                'id' => 1,
                'userid' => 1,
                'description' => 'The one and only sport team I enjoy watching! MTK Budapest always has a special place in my heart <3',
                'vote' => 20,
                'time' => '1h',
            ],
            2 => [
                'id' => 2,
                'userid' => 2,
                'description' => 'Good Game! Especially number 31, well-played! No one could ever see that coming ;)',
                'vote' => 12,
                'time' => '2h',
            ],
            3 => [
                'id' => 3,
                'userid' => 3,
                'description' => 'Hajra MTK!',
                'vote' => 2,
                'time' => '2h',
            ],

        ]
    ],

    2 => [
        'id' => 2,
        'name' => 'Chelsea F.C',
        'banner' => './assets/Chelsea/banner.png',
        'logo' => './assets/Chelsea/logo.png',
        'short_name' => 'Chealsea',
        'city' => 'Chelsea',
        'founded' => '1905',
        'owner' => 'Roman Abramovich',
        'coach' => 'Thomas Tuchel',
        'website' => 'chelseafc.com',
        'score' => 216,
        'players' => [
            1 => [
                'id' => 1,
                'name' => 'Some Dude',
                'age' => 25,
                'city' => 'Chelsea',
                'position' => 'Right Wing',
                'number' => 23,
                'image' => './assets/Chelsea/1.png',
            ],
            2 => [
                'id' => 2,
                'name' => 'Romelu Lukaku',
                'age' => 28,
                'city' => 'Antwerp',
                'position' => 'Right Wing',
                'number' => 9,
                'image' => './assets/default.png',
            ],

        ],
        'recent_activities' => [
            1 => [
                'id' => 1,
                'image' => './assets/Chelsea/logo.png',
                'description' => 'Chelsea cruise through to Carabao Cup final after Var overturns two Tottenham penalties and goal',
                'time' => '1h'
            ],
            2 => [
                'id' => 2,
                'image' => './assets/Chelsea/logo.png',
                'description' => '7 Blues nominated for the EA SPORTS Team of the Year!',
                'time' => '2h'
            ],
        ],
        'comments' => [
            1 => [
                'id' => 1,
                'userid' => 1,
                'description' => 'Lets go Blue Lion!',
                'vote' => 20,
                'time' => '1h',
            ],

        ]
    ],


    3 => [
        'id' => 3,
        'name' => 'Natus Vincere',
        'banner' => './assets/Navi/banner.png',
        'logo' => './assets/Navi/logo.png',
        'short_name' => 'Navi',
        'city' => 'Kyiv',
        'founded' => '2012',
        'owner' => 'Yevhen Zolotarov',
        'coach' => 'B1ad3',
        'website' => 'navi.gg',
        'score' => 311,
        'players' => [
            1 => [
                'id' => 1,
                'name' => 'S1mple',
                'age' => 24,
                'city' => 'Kyiv',
                'position' => 'AWPer',
                'number' => 12,
                'image' => './assets/Navi/simple.png',
            ],
            2 => [
                'id' => 2,
                'name' => 'Dendi',
                'age' => 32,
                'city' => 'Lviv',
                'position' => 'Mid Lane',
                'number' => 10,
                'image' => './assets/Navi/dendi.png',
            ],

        ],
        'recent_activities' => [
            1 => [
                'id' => 1,
                'image' => './assets/Navi/logo.png',
                'description' => 'Navi wins the first major in 2021! Mark a chapter in CSGO history',
                'time' => '1h'
            ],
            2 => [
                'id' => 2,
                'image' => './assets/default.png',
                'description' => 'Boobl4m will not participate on next league due to his injured from previous league',
                'time' => '2h'
            ],
        ],
        'comments' => [
            1 => [
                'id' => 1,
                'userid' => 3,
                'description' => '#PrayforBoobl4m #Feelsbadman',
                'vote' => 16,
                'time' => '1h',
            ],

        ]
    ],

    4 => [
        'id' => 4,
        'name' => 'Manchester United',
        'banner' => './assets/MU/banner.png',
        'logo' => './assets/MU/logo.png',
        'short_name' => 'MU',
        'city' => 'Manchester',
        'founded' => '2012',
        'owner' => 'Richard Arnold',
        'coach' => 'Ralf Rangnick',
        'website' => 'manutd.com',
        'score' => 162,
        'players' => [
            1 => [
                'id' => 1,
                'name' => 'Wayne Rooney',
                'age' => 36,
                'city' => 'Liverpool',
                'position' => 'Forward',
                'number' => 32,
                'image' => './assets/MU/1.png',
            ],
        ],
        'recent_activities' => [
            1 => [
                'id' => 1,
                'image' => './assets/MU/logo.png',
                'description' => 'AFCON 2021: CONTRASTING STARTS FOR REDS DUO',
                'time' => '1h'
            ],
            2 => [
                'id' => 2,
                'image' => './assets/MU/1.png',
                'description' => 'Wayne Rooney mocked by fans as he charges £450 for tickets',
                'time' => '2h'
            ],
            3 => [
                'id' => 3,
                'image' => './assets/MU/logo.png',
                'description' => 'Access all arena: MU 1 - 0 Aston Villa',
                'time' => '2h'
            ],
        ],
        'comments' => [
            1 => [
                'id' => 1,
                'userid' => 3,
                'description' => 'I did not enjoy my last time at the match in person. The stadium is quite big but dont have proper instruction to seat or gates. It took me and my brother 20 minutes to find the seats. The walk path between seats is really small so once you sit down, you stay there for the rest of the match',
                'vote' => 4,
                'time' => '1h',
            ],

        ]
    ],

    5 => [
        'id' => 5,
        'name' => 'Real Mandrid',
        'banner' => './assets/RealMadrid/banner.png',
        'logo' => './assets/RealMadrid/logo.png',
        'short_name' => 'RA',
        'city' => 'Madrid',
        'founded' => '1902',
        'owner' => 'Florentino Pérez',
        'coach' => 'Carlo Ancelotti',
        'website' => 'realmadrid.com',
        'score' => 128,
        'players' => [
            1 => [
                'id' => 1,
                'name' => 'Gareth Bale',
                'age' => 32,
                'city' => 'Cardiff',
                'position' => 'Forward',
                'number' => 18,
                'image' => './assets/RealMadrid/bale.png',
            ],
        ],
        'recent_activities' => [
            1 => [
                'id' => 1,
                'image' => './assets/RealMadrid/logo.png',
                'description' => 'Lost Cr7 = GG',
                'time' => '1h'
            ],
        ],
        'comments' => [
            1 => [
                'id' => 1,
                'userid' => 3,
                'description' => 'lol!',
                'vote' => 4,
                'time' => '1h',
            ],

        ]
    ],
];



$upcoming_matches = [
    1 => [
        'id' => 1,
        'leauge' => 'ELTE Liga',
        'home' => [
            'id' => 1,
            'vs' => 2,
            'date' => '2022-01-24',
            'time' => '13:00',
            'location' => 'Puskas Arena'
        ],
        'away' => [
            'id' => 2,
            'vs' => 1,
            'date' => '2022-01-25',
            'time' => '18:00',
            'location' => 'ELTE Stadium'
        ],
    ],


    2 => [
        'id' => 2,
        'leauge' => 'Premeire Leauge',
        'home' => [
            'id' => 2,
            'vs' => 4,
            'date' => '2022-01-27',
            'time' => '13:00',
            'location' => 'Puskas Arena'
        ],
        'away' => [
            'id' => 4,
            'vs' => 2,
            'date' => '2022-11-27',
            'time' => '14:00',
            'location' => 'ELTE Stadium'
        ],
    ],

];




$matches = [
    1 => [
        'id' => 1,
        'leauge' => 'OTP Liga',
        'home' => [
            'id' => 1,
            'vs' => 3,
            'score' => '2 - 3',
            'date' => '2022-01-13',
            'time' => '13:00',
            'location' => 'Puskas Arena',
            'winner' => 3
        ],
        'away' => [
            'id' => 3,
            'vs' => 1,
            'score' => '2 - 3',
            'date' => '2022-01-10',
            'time' => '13:00',
            'location' => 'ELTE Stadium',
            'winner' => 1
        ],
    ],

    2 => [
        'id' => 2,
        'leauge' => 'OTP Leauge',
        'home' => [
            'id' => 3,
            'vs' => 4,
            'score' => '6 - 9',
            'date' => '2022-01-07',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => 4
        ],
        'away' => [
            'id' => 4,
            'vs' => 3,
            'score' => '1 - 3',
            'date' => '2022-01-06',
            'time' => '13:00',
            'location' => 'ELTE Stadium',
            'winner' => 3
        ],
    ],

    3 => [
        'id' => 3,
        'leauge' => 'OTP Leauge',
        'home' => [
            'id' => 2,
            'vs' => 4,
            'score' => '0 - 3',
            'date' => '2022-01-03',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => 4
        ],
        'away' => [
            'id' => 4,
            'vs' => 2,
            'score' => '2 - 2',
            'date' => '2022-01-02',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => -1
        ],
    ],

    4 => [
        'id' => 4,
        'leauge' => 'Premeire Leauge',
        'home' => [
            'id' => 1,
            'vs' => 5,
            'score' => '8 - 3',
            'date' => '2022-01-03',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => 1
        ],
        'away' => [
            'id' => 5,
            'vs' => 1,
            'score' => '2 - 2',
            'date' => '2022-01-02',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => -1
        ],
    ],

    5 => [
        'id' => 5,
        'leauge' => 'Premeire Leauge',
        'home' => [
            'id' => 2,
            'vs' => 5,
            'score' => '8 - 3',
            'date' => '2022-01-03',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => 2
        ],
        'away' => [
            'id' => 5,
            'vs' => 2,
            'score' => '3 - 4',
            'date' => '2022-01-02',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => 2
        ],
    ],

    6 => [
        'id' => 6,
        'leauge' => 'Premeire Leauge',
        'home' => [
            'id' => 4,
            'vs' => 1,
            'score' => '10 - 3',
            'date' => '2022-01-03',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => 4
        ],
        'away' => [
            'id' => 1,
            'vs' => 4,
            'score' => '9 - 9',
            'date' => '2022-01-02',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => -1
        ],
    ],

    7 => [
        'id' => 7,
        'leauge' => 'Premeire Leauge',
        'home' => [
            'id' => 3,
            'vs' => 4,
            'score' => '1 - 8',
            'date' => '2022-01-03',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => 4
        ],
        'away' => [
            'id' => 4,
            'vs' => 3,
            'score' => '9 - 9',
            'date' => '2022-01-02',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => -1
        ],
    ],

    8 => [
        'id' => 8,
        'leauge' => 'Premeire Leauge',
        'home' => [
            'id' => 2,
            'vs' => 1,
            'score' => '1 - 8',
            'date' => '2022-01-03',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => 1
        ],
        'away' => [
            'id' => 1,
            'vs' => 2,
            'score' => '9 - 9',
            'date' => '2022-01-02',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => -1
        ],
    ],

    8 => [
        'id' => 8,
        'leauge' => 'Premeire Leauge',
        'home' => [
            'id' => 4,
            'vs' => 5,
            'score' => '1 - 8',
            'date' => '2022-01-03',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => 5
        ],
        'away' => [
            'id' => 5,
            'vs' => 4,
            'score' => '9 - 9',
            'date' => '2022-01-02',
            'time' => '13:00',
            'location' => 'Groupama Arena',
            'winner' => -1
        ],
    ],



];




?>