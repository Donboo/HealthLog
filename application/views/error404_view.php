<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Stocarea dosarului medical. Online.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>HealthLog</title>

        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="red">
        <meta name="apple-mobile-web-app-title" content="HealthLog">
        <meta name="msapplication-TileColor" content="#D54444">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/styles.css"); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.4.2/dialog-polyfill.min.css">

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="healthlog mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <header class="hHeader mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
                <div class="mdl-layout__header-row">
                    <a class="mdl-layout-title" href="<?php echo base_url(); ?>">HEALTHLOG</a>
                    <div class="mdl-layout-spacer"></div>
                </div>
            </header>
            <h2 class="center mdl-card__title-text" style="margin:auto;margin-top: 25vh;font-size: 15ch;">404</h2>
            <h2 id="404second" class="center mdl-card__title-text" style="margin:auto;font-weight: 300;"><?php echo translate("Nu am găsit ceea ce căutai.", "We haven't found what were you looking for."); ?></h2>
            <a class="center" style="text-decoration: none;" href="<?= base_url(); ?>"><?php echo translate("Prima pagină...", "First page..."); ?></a>
        </div>
    </body>
</html>