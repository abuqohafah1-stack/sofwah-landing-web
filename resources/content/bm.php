<?php

/*
|--------------------------------------------------------------------------
| SOFWAH-WEB · Content (Bahasa Melayu — primary)
|--------------------------------------------------------------------------
| Single source of truth for BM copy. Mirror every key in en.php.
| Voice: hangat · yakin · mesra keluarga · Muslim-friendly · sedikit premium.
| Copy follows the PESONA formula (situasi → masalah → keinginan → solusi
| Sofwah → pencetus deria → bukti sosial → soft CTA).
*/

return [

    'meta' => [
        'title'       => 'Sofwah Arabic Grill — Hidangan Arab untuk Moment Keluarga Bermakna',
        'description' => 'Nasi Arab Mendy, Arabic Grill Platter dan hidangan panggang Arab yang autentik di suasana mesra keluarga. 6 cawangan di Kedah. Rasa Arab yang hangat untuk orang yang anda sayang.',
    ],

    'nav' => [
        'menu'     => 'Menu',
        'story'    => 'Cerita Kami',
        'branches' => 'Cawangan',
        'order'    => 'Order Sekarang',
    ],

    'hero' => [
        'ornament'      => 'ضِيافة عربية أصيلة',
        'badge'         => 'Restoran Arab #1 di Kedah · Sejak 2018',
        'headline'      => 'Bukan Sekadar Makan. Ini Pengalaman Arab Yang Sebenar.',
        'subline'       => 'Nasi Arab Mendy yang harum, panggangan istimewa, dan suasana mesra keluarga — dihidangkan kepada ribuan keluarga Malaysia sejak 2018.',
        'cta_primary'   => 'Order Sekarang',
        'cta_secondary' => 'Cari Cawangan Terdekat',
        'image_caption' => 'Nasi Arab Mendy · Signature Sofwah',
        'stats'         => [
            ['value' => '4.9★',    'label' => 'Rating Google'],
            ['value' => '10,000+', 'label' => 'Pelanggan Gembira'],
            ['value' => '6',       'label' => 'Cawangan Kedah'],
        ],
    ],

    // Signature Dining — RASA / Desire. Cinematic sensory band. Cipta lapar.
    'dining' => [
        'eyebrow' => 'Signature Dining',
        'heading' => 'Aroma yang menarik anda masuk sebelum sempat baca menu.',
        'body'    => 'Bara panggangan, rempah Arab yang mendalam, nasi Mendy yang harum — di Sofwah, makan bukan sekadar mengenyangkan. Ia satu pengalaman yang anda ingat lama selepas pinggan kosong.',
        'senses'  => [
            ['label' => 'Aroma',   'text' => 'Wangi rempah Arab & asap panggangan yang mengundang selera.'],
            ['label' => 'Tekstur', 'text' => 'Daging lembut, grill marks sempurna, nasi Mendy yang gebu.'],
            ['label' => 'Suasana', 'text' => 'Lampu hangat, ambience Arab, meja yang menyatukan keluarga.'],
        ],
    ],

    // Why Sofwah — Trust. Before → After. Neutralize fears with proof.
    'why' => [
        'eyebrow' => 'Kenapa Sofwah',
        'before'  => 'Kebanyakan restoran hidang makanan sahaja.',
        'after'   => 'Sofwah hidang pengalaman keluarga Arab yang bermakna.',
        'body'    => 'Kami faham — bila anda bawa keluarga atau belanja parents, anda mahu tempat yang selesa, bersih, dan boleh dipercayai. Itu yang kami jaga setiap hari.',
        'proof'   => [
            ['title' => 'Autentik & sesuai selera',  'text' => 'Rempah Arab yang mendalam, tapi mesra untuk lidah keluarga Malaysia.'],
            ['title' => 'Bersih & profesional',       'text' => 'Ruang makan yang kemas, SOP yang konsisten di setiap cawangan.'],
            ['title' => 'Mesra keluarga & parents',   'text' => 'Tempat duduk selesa, suasana tenang — sesuai bawa anak dan orang tua.'],
            ['title' => 'Halal & dipercayai',         'text' => 'Hidangan Arab halal yang anda boleh makan dengan tenang hati.'],
        ],
    ],

    // Signature Menu — Craving. Storytelling per hidangan, bukan senarai bahan.
    'menu' => [
        'eyebrow' => 'Signature Menu',
        'heading' => 'Setiap hidangan ada ceritanya.',
        'body'    => 'Kami tak jual makanan. Kami hidangkan moment — hidangan yang buat keluarga berhenti bersembang, dan mula menikmati.',
        'more_label' => 'Lagi hidangan signature',
        'labels'  => [
            'istimewa' => 'Kenapa istimewa',
            'suka'     => 'Kenapa pelanggan suka',
            'emosi'    => 'Emosi yang dicipta',
            'order'    => 'Order Sekarang',
        ],
        'dishes'  => [
            [
                'key'       => 'mendy',
                'name'      => 'Nasi Arab Mendy',
                'arabic'    => 'مندي',
                'badge'     => 'Hero Sofwah',
                'image'     => 'images/menu-ai/mendy-mix.jpg',
                'apa'       => 'Nasi Arab harum dimasak perlahan bersama rempah pilihan, dihidang dengan kambing & ayam panggang dan gulungan asap yang mengundang selera.',
                'istimewa'  => 'Aroma dan rasa Mendy yang autentik — hidangan yang menjadi nama Sofwah.',
                'suka'      => 'Setiap suapan terasa istimewa, bukan nasi biasa.',
                'emosi'     => 'Kenangan rasa yang melekat — sebab utama pelanggan kembali.',
            ],
            [
                'key'       => 'platter',
                'name'      => 'Arabic Grill Platter',
                'arabic'    => 'مشاوي عربية',
                'badge'     => 'Paling Sesuai Dikongsi',
                'image'     => 'images/menu/grill-platter.jpg',
                'apa'       => 'Platter panggangan Arab — cucuk daging & ayam, sayap bersalut, roti, salad segar dan dua dip istimewa.',
                'istimewa'  => 'Dipanggang atas bara dengan rempah Arab yang meresap sampai ke tengah.',
                'suka'      => 'Satu pinggan, satu meja, semua orang menikmati bersama.',
                'emosi'     => 'Rasa kebersamaan — hidangan yang dibuat untuk dikongsi.',
            ],
            [
                'key'       => 'chicken',
                'name'      => 'Arabiata Chicken Grill',
                'arabic'    => 'دجاج مشوي',
                'badge'     => null,
                'image'     => 'images/menu/chicken-grill.jpg',
                'apa'       => 'Ayam panggang sepenuhnya, berair di dalam, garing beraroma di luar, dengan sos lada hitam istimewa.',
                'istimewa'  => 'Diperap dengan rempah Arab, dipanggang sehingga grill marks sempurna.',
                'suka'      => 'Comfort food yang tak pernah mengecewakan — sedap, mengenyangkan, berbaloi.',
                'emosi'     => 'Selesa dan puas — rasa yang buat anda datang lagi.',
            ],
            [
                'key'       => 'ayam-mendy',
                'name'      => 'Nasi Arab Ayam Mendy',
                'arabic'    => 'مندي دجاج',
                'badge'     => null,
                'image'     => 'images/menu-ai/mendy-ayam.jpg',
                'apa'       => 'Ayam panggang lembut di atas nasi Mendy beraroma, dengan dip garlik dan salad segar.',
                'istimewa'  => 'Kombinasi ayam berperisa dan nasi Arab yang harum — kegemaran ramai.',
                'suka'      => 'Pilihan selamat yang semua orang suka, dewasa dan kanak-kanak.',
                'emosi'     => 'Puas dan mengenyangkan — nilai yang berbaloi.',
            ],
            [
                'key'       => 'sharing',
                'name'      => 'As Sofwah Family Platter',
                'arabic'    => 'طبق العائلة',
                'badge'     => 'Untuk Keluarga',
                'image'     => 'images/menu-ai/family-platter.jpg',
                'apa'       => 'Platter besar untuk dikongsi — nasi Arab, kambing panggang, kuah dan lauk pilihan.',
                'istimewa'  => 'Cukup untuk seisi keluarga, satu hidangan yang menyatukan meja.',
                'suka'      => 'Tak perlu fikir nak pesan apa — satu platter, semua puas.',
                'emosi'     => 'Kebersamaan keluarga — makan dari pinggan yang sama.',
            ],
            [
                'key'       => 'shish',
                'name'      => 'Shish Tawook',
                'arabic'    => 'شيش طاووق',
                'badge'     => null,
                'image'     => 'images/menu-ai/shish-tawook.jpg',
                'apa'       => 'Cucuk ayam panggang bara yang berperisa, dengan sayur panggang, roti dan dip garlik.',
                'istimewa'  => 'Panggang atas bara sehingga wangi dan berwarna cantik.',
                'suka'      => 'Ringan tapi memuaskan — sesuai untuk semua.',
                'emosi'     => 'Nikmat panggangan Arab yang tulen.',
            ],
            [
                'key' => 'grilled-lamb', 'name' => 'Sawabiq Lahmah', 'arabic' => 'لحم مشوي', 'badge' => null,
                'image' => 'images/menu-ai/grilled-lamb.jpg',
                'apa' => 'Daging kambing panggang yang lembut dan berperisa, dengan roti dan dip istimewa.',
            ],
            [
                'key' => 'kuftah-beef', 'name' => 'Kuftah Beef', 'arabic' => 'كفتة لحم', 'badge' => null,
                'image' => 'images/menu-ai/kuftah-beef.jpg',
                'apa' => 'Cucuk kufta daging berperisa, dipanggang atas bara sehingga wangi.',
            ],
            [
                'key' => 'shawarma', 'name' => 'Shawarma Platter', 'arabic' => 'شاورما', 'badge' => null,
                'image' => 'images/menu-ai/shawarma.jpg',
                'apa' => 'Shawarma gulung berisi daging panggang, sayur segar dan sos istimewa.',
            ],
            [
                'key' => 'al-firdaus', 'name' => 'Al-Firdaus Platter', 'arabic' => 'طبق الفردوس', 'badge' => 'Set Premium',
                'image' => 'images/menu-ai/al-firdaus.jpg',
                'apa' => 'Platter premium untuk dikongsi — gabungan nasi Arab dan panggangan pilihan.',
            ],
            [
                'key' => 'beef-daqooz', 'name' => 'Beef Daqooz', 'arabic' => 'دقوس لحم', 'badge' => null,
                'image' => 'images/menu-ai/beef-daqooz.jpg',
                'apa' => 'Daging lembu masak Daqooz yang kaya rempah, hidangan istimewa Arab.',
            ],
            [
                'key' => 'meatball', 'name' => 'Arabiata Meatball', 'arabic' => 'كرات اللحم', 'badge' => null,
                'image' => 'images/menu-ai/meatball.jpg',
                'apa' => 'Bebola daging berperisa dalam sos Arab, sedap dimakan dengan roti atau nasi.',
            ],
        ],
    ],

    // Trust Stack — pensijilan rasmi + ameniti (naikkan emosi percaya)
    'trust_stack' => [
        'eyebrow' => 'Dipercayai & Disahkan',
        'heading' => 'Sebab ribuan keluarga yakin dengan Sofwah.',
        'body'    => 'Pensijilan rasmi dan ameniti yang menjaga keselesaan seisi keluarga anda.',
        'badges'  => [
            ['img' => 'halal',         'label' => 'Sijil Halal JAKIM'],
            ['img' => 'bess',          'label' => 'BeSS · Bersih Selamat Sihat (KKM)'],
            ['img' => 'sahabat-zakat', 'label' => 'Sahabat Zakat Kedah'],
            ['img' => 'main-supplier', 'label' => 'Bekalan BiSMI · Segar Halal'],
            ['img' => 'cashless',      'label' => 'DuitNow · Bayaran Cashless'],
        ],
        'amenities' => ['Halal', 'Mesra Keluarga', 'Berhawa Dingin', 'Surau', 'Parking Mudah'],
    ],

    // Stats band — big highlighted count-up numbers (social proof)
    'stats_band' => [
        'eyebrow' => 'Angka Yang Bercerita',
        'heading' => 'Dipercayai. Diulangi. Dikongsi.',
        'since'   => 'Melayani keluarga Malaysia sejak 2018.',
        'items'   => [
            ['value' => '10000', 'suffix' => '+', 'label' => 'Pelanggan gembira'],
            ['value' => '8973',  'suffix' => '',  'label' => 'Review Google'],
            ['value' => '4.9',   'suffix' => '★', 'label' => 'Purata rating'],
            ['value' => '6',     'suffix' => '',  'label' => 'Cawangan di Kedah'],
        ],
    ],

    // Social — handles for the social proof strip
    'social' => [
        'eyebrow' => 'Ikuti Sofwah',
        'heading' => 'Sertai ribuan yang kongsi moment mereka.',
        'body'    => 'Tag kami &amp; lihat komuniti Sofwah di media sosial.',
        'handle'  => '@sofwah_arabicgrill',
        'links'   => [
            ['label' => 'Facebook', 'url' => 'https://www.facebook.com/sofwah_arabicgrill'],
            ['label' => 'TikTok',   'url' => 'https://www.tiktok.com/@sofwah_arabicgrill'],
            ['label' => 'Menu Penuh', 'url' => 'https://heyzine.com/flip-book/b1dccc4f35.html'],
        ],
    ],

    // Wall of Love — REVIEW / Trust. Real Google ratings; live review text in Phase 4.
    'reviews' => [
        'eyebrow'        => 'Wall of Love',
        'heading'        => 'Ribuan keluarga dah rasa. Ini kata mereka.',
        'body'           => 'Rating Google yang tinggi di setiap cawangan — bukan kami yang cakap, tapi pelanggan sendiri.',
        'avg'            => '4.9',
        'avg_label'      => 'purata rating Google',
        'branches_label' => 'merentasi 6 cawangan',
        'accolade'       => '“Top Nasi Arab in Town” — seperti yang tersenarai di Google.',
        'google_label'   => 'Baca di Google',
        'samples_note'   => 'Contoh paparan — teks review Google sebenar dimuat automatik dalam Phase 4.',
        'samples'        => [
            ['name' => 'Pelanggan Google', 'branch' => 'Jitra',        'rating' => 5, 'text' => 'Nasi Arab paling sedap kawasan ni. Portion besar, servis pantas, tempat bersih.'],
            ['name' => 'Pelanggan Google', 'branch' => 'Alor Setar',    'rating' => 5, 'text' => 'Bawa parents makan sini, semua puas hati. Suasana selesa untuk keluarga.'],
            ['name' => 'Pelanggan Google', 'branch' => 'Kuala Nerang',  'rating' => 5, 'text' => 'Grill platter memang menang, salsa dia special. Mesti datang lagi.'],
        ],
    ],

    // Brand Story — emotional connection
    'story' => [
        'eyebrow' => 'Cerita Kami',
        'heading' => 'Sofwah wujud untuk satu sebab.',
        'body_1'  => 'Kami percaya hidangan Arab bukan sekadar makanan — ia cara untuk menyatukan keluarga, meraikan orang tersayang, dan mencipta memori. Itu yang buat kami mula.',
        'body_2'  => 'Dari beberapa buah meja kepada enam cawangan, kami bina Sofwah dengan disiplin, sistem, dan niat yang jelas: hidangan Arab autentik, halal dan berkualiti, di tempat yang setiap keluarga rasa dialu-alukan. Pertumbuhan yang dijaga dengan barakah.',
    ],

    // Branch Experience — REACH (bento). Facts live in resources/content/branches.php.
    'branches' => [
        'eyebrow'        => 'Cawangan',
        'heading'        => '6 cawangan di Kedah. Ada satu dekat dengan anda.',
        'body'           => 'Datang rasa sendiri, atau order terus melalui WhatsApp cawangan terdekat.',
        'order_label'    => 'Order WhatsApp',
        'navigate_label' => 'Navigate',
        'rating_suffix'  => 'di Google',
        'hours_label'    => 'Buka',
        'highlights'     => [
            'gurun'              => 'Rasa Arab yang hangat di Gurun.',
            'kuala-nerang'       => 'Hidangan Mendy autentik di Kuala Nerang.',
            'sungai-petani'      => 'Tempat keluarga berkumpul di Sungai Petani.',
            'alor-setar-pegawai' => 'Di Jalan Pegawai, Alor Setar.',
            'jitra'              => '“Top Nasi Arab in Jitra” di Google.',
            'alor-setar-aman'    => 'Di Aman Central — sambil membeli-belah.',
        ],
    ],

    // Family Dining — emotion over transaction
    'family' => [
        'eyebrow' => 'Family Dining',
        'heading' => 'Tempat memori tercipta.',
        'body'    => 'Hari jadi, belanja parents, kumpul kawan, atau sekadar makan malam keluarga — di Sofwah, setiap perhimpunan jadi lebih bermakna.',
        'cta'     => 'Tempah / Raikan Bersama',
    ],

    // FAQ — Confidence (feeds FAQPage schema in Phase 5)
    'faq' => [
        'eyebrow' => 'Soalan Lazim',
        'heading' => 'Perkara yang selalu ditanya.',
        'items'   => [
            ['q' => 'Adakah makanan Sofwah halal?', 'a' => 'Ya. Semua hidangan Sofwah Arabic Grill adalah halal — anda boleh makan dengan tenang hati bersama keluarga.'],
            ['q' => 'Boleh order untuk kumpulan besar atau majlis?', 'a' => 'Boleh. Hubungi cawangan terdekat melalui WhatsApp untuk order kumpulan, set keluarga, atau aturan majlis.'],
            ['q' => 'Ada penghantaran (delivery)?', 'a' => 'Order boleh dibuat terus melalui WhatsApp cawangan. Tanya cawangan terdekat mengenai pilihan penghantaran yang ada.'],
            ['q' => 'Sesuai untuk bawa anak dan orang tua?', 'a' => 'Sangat sesuai. Ruang makan kami selesa dan mesra keluarga — direka untuk semua peringkat umur.'],
            ['q' => 'Ada tempat letak kereta?', 'a' => 'Kebanyakan cawangan mempunyai akses parking yang mudah. Semak lokasi cawangan pilihan anda di Google Maps.'],
            ['q' => 'Boleh tempah untuk raikan hari jadi?', 'a' => 'Boleh. Beritahu cawangan terdekat awal-awal supaya kami boleh bantu buat moment anda lebih istimewa.'],
        ],
    ],

    // Reservation / enquiry lead capture (Livewire ReservationForm → DB + WhatsApp)
    'reserve' => [
        'eyebrow'       => 'Tempah / Raikan',
        'heading'       => 'Raikan bersama Sofwah.',
        'body'          => 'Isi butiran ringkas — kami sambung terus di WhatsApp cawangan pilihan anda.',
        'name'          => 'Nama',
        'phone'         => 'No. telefon',
        'branch'        => 'Cawangan',
        'choose_branch' => 'Pilih cawangan',
        'date'          => 'Tarikh (pilihan)',
        'pax'           => 'Bilangan orang (pilihan)',
        'message'       => 'Cerita sikit — majlis, hari jadi, dll. (pilihan)',
        'submit'        => 'Hantar & buka WhatsApp',
        'sending'       => 'Sebentar…',
        'privacy'       => 'Butiran anda hanya digunakan untuk menghubungi anda tentang tempahan ini.',
    ],

    // Final conversion band
    'final' => [
        'eyebrow'    => 'Jom Sofwah',
        'heading'    => 'Rasa Arab yang buat keluarga rasa istimewa.',
        'body'       => 'Order sekarang di WhatsApp cawangan terdekat, atau datang rasa sendiri.',
        'cta_order'  => 'Order Sekarang',
        'cta_branch' => 'Cari Cawangan Terdekat',
    ],

    // Sticky mobile order sheet (branch picker → WhatsApp)
    'order_sheet' => [
        'order'    => 'Order Sekarang',
        'branches' => 'Cari Cawangan',
        'title'    => 'Pilih cawangan untuk order',
        'subtitle' => 'Kami sambung terus di WhatsApp cawangan.',
        'nearest'  => 'Guna lokasi saya',
    ],

    'sticky' => [
        'order'    => 'Order Sekarang',
        'branches' => 'Cari Cawangan',
    ],

    'footer' => [
        'tagline'   => 'Rasa Arab yang hangat untuk moment keluarga yang bermakna.',
        'rights'    => 'Sofwah Arabiata (M) Sdn. Bhd. Hak cipta terpelihara.',
    ],
];
