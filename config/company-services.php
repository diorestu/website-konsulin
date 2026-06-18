<?php

return [
    'items' => [
        'services.laporan_keuangan' => [
            'label' => 'Laporan Keuangan',
            'title' => 'Jasa Pembuatan Laporan Keuangan',
            'description' => 'Kami menyediakan laporan keuangan akurat dan sesuai standar akuntansi untuk membantu Anda memantau bisnis dan membuat keputusan yang tepat.',
            'image' => 'frontend-assets/img/services/1_laporan_keuangan.jpg',
            'route' => 'services.laporan_keuangan',
            'items' => ['UMKM', 'Perusahaan Menengah', 'dan lainnya'],
            'related' => [
                'services.model_usaha',
                'services.pelaporan_pajak',
                'services.npwp',
            ],
        ],

        'services.model_usaha' => [
            'label' => 'Model Bisnis',
            'title' => 'Perancangan Model Bisnis',
            'description' => 'Kami membantu Anda merancang model bisnis yang efektif dan berkelanjutan untuk mendukung pertumbuhan usaha jangka panjang.',
            'image' => 'frontend-assets/img/services/2_business_planning.jpg',
            'route' => 'services.model_usaha',
            'items' => ['Business Model', 'Business Fundraising', 'dan lainnya'],
            'related' => [
                'services.laporan_keuangan',
                'services.branding',
                'services.pelaporan_pajak',
            ],
        ],

        'services.pelaporan_pajak' => [
            'label' => 'Pelaporan Pajak',
            'title' => 'Pengurusan Pelaporan Pajak',
            'description' => 'Layanan pengurusan pelaporan pajak yang tepat waktu dan sesuai regulasi agar kewajiban perpajakan Anda lebih mudah.',
            'image' => 'frontend-assets/img/services/3_tax.jpg',
            'route' => 'services.pelaporan_pajak',
            'items' => ['Pajak Perorangan', 'Pajak Badan Usaha', 'dan lainnya'],
            'related' => [
                'services.npwp',
                'services.laporan_keuangan',
                'services.model_usaha',
            ],
        ],

        'services.pendirian_pt' => [
            'label' => 'Legalitas Usaha',
            'title' => 'Pendirian Badan Usaha',
            'description' => 'Kami membantu proses pendirian badan usaha agar legalitas bisnis Anda terpenuhi sesuai peraturan yang berlaku.',
            'image' => 'frontend-assets/img/services/4_legalitas.jpg',
            'route' => 'services.pendirian_pt',
            'items' => ['Pengecekan Nama Usaha', 'Sertifikat Kemenkumham', 'dan lainnya'],
            'related' => [
                'services.npwp',
                'services.pelaporan_pajak',
                'services.laporan_keuangan',
            ],
        ],

        'services.npwp' => [
            'label' => 'Dokumen Usaha',
            'title' => 'Pengurusan Dokumen',
            'description' => 'Layanan pengurusan dokumen perpajakan dan administrasi usaha secara cepat, praktis, dan profesional.',
            'image' => 'frontend-assets/img/services/5_npwp.jpg',
            'route' => 'services.npwp',
            'items' => ['NPWP Pribadi', 'NPWP Badan Usaha', 'dan lainnya'],
            'related' => [
                'services.pelaporan_pajak',
                'services.pendirian_pt',
                'services.laporan_keuangan',
            ],
        ],

        'services.branding' => [
            'label' => 'Branding Usaha',
            'title' => 'Branding Perusahaan',
            'description' => 'Kami membantu membangun identitas merek yang kuat dan profesional untuk meningkatkan daya tarik bisnis Anda.',
            'image' => 'frontend-assets/img/services/7_branding.jpg',
            'route' => 'services.branding',
            'items' => ['Logo', 'Website', 'dan lainnya'],
            'related' => [
                'services.model_usaha',
                'services.laporan_keuangan',
                'services.pelaporan_pajak',
            ],
        ],
        'services.business_advisory' => [
            'label' => 'Business Advisory',
            'title' => 'Business Advisory',
            'description' => ' Membantu pelaku usaha, UMKM, startup, maupun perusahaan dalam menyusun strategi, memperbaiki proses operasional, mengelola keuangan, serta mengambil keputusan bisnis yang lebih tepat dan terukur.',
            'image' => 'frontend-assets/img/services/7_branding.jpg',
            'route' => 'services.branding',
            'items' => ['Logo', 'Website', 'dan lainnya'],
            'related' => [
                'services.laporan_keuangan',
                'services.pendirian_pt',
                'services.pelaporan_pajak',
            ],
        ],
    ],
];