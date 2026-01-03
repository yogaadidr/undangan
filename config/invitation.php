<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Invitation Settings
    |--------------------------------------------------------------------------
    |
    | Here you may configure your invitation settings.
    |
    */
    'couples' => [
        'groom' => [
            'nickname' => 'Yoga',
            'name' => 'Yoga Adi Dharma',
            'parent' => 'Putra dari Bapak Sugiyono & Ibu Kadarwati',
            'image' => 'images/couple/groom.jpg',
        ],
        'bride' => [
            'nickname' => 'Tazkia',
            'name' => 'Tazkia Annisa',
            'parent' => 'Putri dari Bapak Hadi Nur Aris & Ibu Sri Widajati',
            'image' => 'images/couple/bride.jpg',
        ],
    ],
    'story' => 'Kisah cinta Tazkia dan Yoga berawal dari pertemuan sederhana yang kini menjadi abadi. Seperti angin yang membawa awan bertemu di langit biru, takdir mempertemukan kami untuk saling melengkapi.',
    'event_date' => '2026-01-17 08:00:00',
    'events' => [
        'akad' => [
            "name" => "Akad Nikah",
            "day" => "Sabtu",
            "date" => "17",
            "month" => "Januari",
            "year" => "2026",
            "time" => "08.00 - 09.00",
            "address" => "Rumah Mempelai Wanita Dersalam RT 02 RW 04, Bae, Kudus",
            "map" => "https://maps.app.goo.gl/9z9wv3g93zKE3kdP6"
        ],
        'resepsi' => [
            "name" => "Resepsi Pernikahan",
            "day" => "Sabtu",
            "date" => "17",
            "month" => "Januari",
            "year" => "2026",
            "time" => "11.00 - 13.30",
            "address" => "Gedung Kawedanan Kudus, Baekrajan, Bae, Kec. Bae, Kabupaten Kudus, Jawa Tengah",
            "map" => "https://maps.app.goo.gl/ZgefsRbgArqsARMH8"
        ]
    ],
    'session' => [
        1 => "11.00 - 12.30",
        2 => "12.00 - 13.30",
        3 => "11.00 - 13.30"
    ],
    'sides' => [
        'CPW' => 'Calon Pengantin Wanita',
        'CPP' => 'Calon Pengantin Pria',
    ],
    'banks' => [
        [
            'code' => 'BCA',
            'name' => 'Bank Central Asia (BCA)',
            'image' => 'https://vectorseek.com/wp-content/uploads/2023/09/Bca-Bank-Central-Asia-Logo-Vector.svg-.png'
        ],
        [
            'code' => 'BNI',
            'name' => 'Bank Negara Indonesia (BNI)',
            'image' => 'https://www.pinclipart.com/picdir/big/105-1051729_bank-negara-indonesia-logo-bank-bni-transparan-clipart.png'
        ],
        [
            'code' => 'BRI',
            'name' => 'Bank Rakyat Indonesia (BRI)',
            'image' => 'https://www.freelogovectors.net/wp-content/uploads/2023/02/bri-logo-freelogovectors.net_.png'
        ],
        [
            'code' => 'Mandiri',
            'name' => 'Bank Mandiri',
            'image' => 'https://www.vhv.rs/dpng/d/551-5517794_bank-mandiri-png-transparent-png.png'
        ]
    ]

];
