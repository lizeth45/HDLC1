<?php
    define("BASE_URL", "/");

    function Head($title) {
        return <<<HTML
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title><?= $title ?></title>

                <!--=== CSS ===-->
                <link rel="stylesheet" href="/assets/css/style-IUPaciente.css">
                <link rel="shortcut icon" href="/assets/icons/iconpg.png" type="image/x-icon">
                <link rel="stylesheet" href="/assets/css/normalize.css">

                <!-- ===== Link Swiper's CSS ===== -->
                <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

                <!-- Fontawesome CDN Link -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css"/>

                <!--=== BoxIcons CSS ===-->
                <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
                <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />

                <!-- FORCE A BASE URL -->
                <base href="<?= BASE_URL ?>" />
            </head>
        HTML;
    }
?>
