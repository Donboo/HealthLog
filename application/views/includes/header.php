<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Cu HealthLog, stocarea dosarului medical nu a fost niciodată mai simplă! Autentifică-te folosind datele cardului de sănătate!">
    <meta name="keywords" content="dosar medical online,healthlog">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HealthLog - Dosar medical online</title>

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

                <?php if(session("loggedInfo", "CardCode")): ?>
                <ul id="hMenu">
                    <li>
                        <a href="javascript:void(0);" style="color: #fff;text-decoration: none;font-size: 7vw;" class="icon" onclick="responsive()">&#9776;</a>
                    </li>
                    <li>
                        <a style="color:#F5F5F5;margin-left:6px;text-decoration:none;" href="<?php echo base_url(); ?>"><?= session("loggedInfo", "Name"); ?></a>
                    </li>
                    <li>
                        <a style="margin-left:4px;" href="<?php echo base_url("logout"); ?>" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                            <i class="material-icons">power_settings_new</i>
                        </a>
                    </li>
                    <div class="mdl-tooltip" data-mdl-for="hdrbtn">
                        <?= translate("Deconectare", "Log off"); ?>
                    </div>
                    <?php if(session("loggedInfo", "AccountType") == 1): ?>
                    <li> 
                        <a href="<?= base_url("medic"); ?>" style="color:#F5F5F5;margin-left:6px;text-decoration:none;">
                            Panou medic
                        </a>
                    </li>
                    <?php endif; ?>
                 </ul>
                 <?php endif; ?>
            </div>
        </header>
        <main class="mdl-layout__content mdl-color--grey-100">
        <?php if($this->session->flashdata('success') || $this->session->flashdata('error')): ?>
                <?php if($this->session->flashdata('success')): ?>
                <div class="mdl-components__warning" style="margin-top: 2%;">
                    <?= $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>
            
                <?php if($this->session->flashdata('error')): ?>
                <div class="mdl-components__warning" style="margin-top: 2%;background-color:#E45D5D;">
                    <?= $this->session->flashdata('error'); ?>
                </div>
                <?php endif; ?>
        <?php endif; ?>