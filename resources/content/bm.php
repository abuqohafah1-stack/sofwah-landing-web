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
        'ornament'      => 'ضِيافة عربية',
        'headline'      => 'Bukan sekadar tempat makan. Tempat untuk orang yang kita sayang.',
        'subline'       => 'Rasa Arab yang hangat, suasana mesra keluarga, dan setiap hidangan yang buat setiap moment jadi lebih bermakna.',
        'cta_primary'   => 'Order Sekarang',
        'cta_secondary' => 'Cari Cawangan Terdekat',
        'trust'         => [
            'rating'    => '4.9',
            'rating_label' => 'rating Google',
            'branches'  => '6 cawangan di Kedah',
            'customers' => 'Ribuan keluarga setia',
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
                'key'       => 'mendy',
                'name'      => 'Nasi Arab Mendy',
                'arabic'    => 'مندي',
                'badge'     => 'Hero Sofwah',
                'image'     => null, // pro photo >10MB — export via Drive API (Phase 5 pipeline)
                'apa'       => 'Nasi Arab harum yang dimasak perlahan bersama rempah dan daging pilihan.',
                'istimewa'  => 'Aroma dan rasa Mendy yang autentik — hidangan yang menjadi nama Sofwah.',
                'suka'      => 'Setiap suapan terasa istimewa, bukan nasi biasa.',
                'emosi'     => 'Kenangan rasa yang melekat — sebab utama pelanggan kembali.',
            ],
            [
                'key'       => 'lamb',
                'name'      => 'Grilled Lamb Mashwi',
                'arabic'    => 'لحم مشوي',
                'badge'     => null,
                'image'     => null,
                'apa'       => 'Daging kambing panggang yang lembut, disaluti rempah Arab yang kaya.',
                'istimewa'  => 'Empuk sehingga senang ditanggalkan dari tulang, wangi bara panggangan.',
                'suka'      => 'Untuk mereka yang mahu sesuatu yang istimewa dan mewah.',
                'emosi'     => 'Rasa raikan — hidangan untuk hari yang bermakna.',
            ],
            [
                'key'       => 'sharing',
                'name'      => 'As Sofwah Family Platter',
                'arabic'    => 'طبق العائلة',
                'badge'     => null,
                'image'     => null,
                'apa'       => 'Platter besar untuk dikongsi — gabungan nasi Arab, panggangan dan lauk pilihan.',
                'istimewa'  => 'Cukup untuk seisi keluarga, satu hidangan yang menyatukan meja.',
                'suka'      => 'Tak perlu fikir nak pesan apa — satu platter, semua puas.',
                'emosi'     => 'Kebersamaan keluarga — makan dari pinggan yang sama.',
            ],
            [
                'key'       => 'salsa',
                'name'      => 'Sofwah Special Salsa',
                'arabic'    => 'صلصة صفوة',
                'badge'     => null,
                'image'     => null,
                'apa'       => 'Salsa istimewa Sofwah — pedas segar yang mengangkat setiap hidangan panggangan.',
                'istimewa'  => 'Resipi sendiri yang jadi tanda kenal ramai pelanggan.',
                'suka'      => 'Sekali cuba, tercari-cari — pelengkap setiap suapan.',
                'emosi'     => 'Detail kecil yang buat rasa jadi tak dilupakan.',
            ],
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
