<?php
    function Head($title, $additionalLinks) {
        $base_url = "/";
        $links = "";
        foreach($additionalLinks as $link) {
            $links .= '<link rel="stylesheet" href="' . $link . '" />';
        }
        return <<<HTML
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>$title</title>

                <!--=== CSS ===-->
                <link rel="stylesheet" href="/assets/css/normalize.css">
                $links

                <!-- === BOOTSTRAP === -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

                <!-- === FAVICONS === -->
                <link rel="shortcut icon" href="/assets/icons/iconpg.png" type="image/x-icon">

                <!-- ===== Link Swiper's CSS ===== -->
                <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

                <!-- Fontawesome CDN Link -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css"/>

                <!--=== BoxIcons CSS ===-->
                <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
                <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />

                <!-- FORCE A BASE URL -->
                <base href="$base_url" />
            </head>
        HTML;
    }
?>
