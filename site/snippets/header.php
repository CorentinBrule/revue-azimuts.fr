<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>
        <?= $site->title()->html() ?><?php if($page->template() == 'numero'): ?>&ensp;<?= $page->numero()->html() ?>&ensp;<?= $page->titre()->html() ?><?php endif ?><?php if($page->template() == 'article'): ?>&ensp;<?= $page->parent()->numero()->html() ?>&ensp;<?= html::decode($page->titre()->kt()) ?><?php endif ?><?php $templates = ['a-propos', 'numeros', 'articles']; if(in_array($page->template(), $templates)): ?>&ensp;<?= $page->titre()->html() ?><?php endif ?>
    </title>
    <meta name="title" content="<?php if($page->template() == 'numero'): ?><?= $site->title()->html() ?> <?= $page->numero()->html() ?>, <?= $page->titre()->html() ?><?php endif ?><?php if($page->template() == 'article'): ?><?= html::decode($page->titre()->kt()) ?><?php endif ?><?php $templates = ['a-propos', 'numeros', 'articles', 'home']; if(in_array($page->template(), $templates)): ?><?= $site->title()->html() ?><?php endif ?>">
    <meta name="description" content="<?= $site->description()->html() ?>">
    <link rel="canonical" href="<?= $site->title()->html() ?>">
    <?php if($page->template() == 'article'): ?>
        <?php if($page->hasImages()): ?>
        <?php $image = $page->images()->first()->thumb(array('width' => 800)); ?>
        <?php else: ?>
        <?php $image = $page->parent()->image('image.jpg')->thumb(array('width' => 800)); ?>
        <?php endif ?>
    <?php elseif($page->template() == 'numero'): ?>
        <?php $image = $page->image('couverture.jpg')->thumb(array('width' => 800)); ?>
    <?php elseif($page->template() == 'archive'): ?>
        <?php $image = $page->image('couverture.jpg')->thumb(array('width' => 800)); ?>
    <?php else: ?>
        <?php $image = $pages->find('numeros')->children()->last()->image('image.jpg')->thumb(array('width' => 800)); ?>
    <?php endif ?>
    <meta itemprop="name" content="<?= $site->title()->html() ?>">
    <meta itemprop="description" content="<?= $site->description()->html() ?>">
    <meta itemprop="image" content="<?= $image->url() ?>">
    <meta property="og:url" content="<?= $site->url() ?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= $site->title() ?>">
    <meta property="og:title" content="<?php if($page->template() == 'numero'): ?><?= $site->title()->html() ?> <?= $page->numero()->html() ?>, <?= $page->titre()->html() ?><?php endif ?><?php if($page->template() == 'article'): ?><?= html::decode($page->titre()->kt()) ?><?php endif ?><?php $templates = ['a-propos', 'numeros', 'articles', 'home']; if(in_array($page->template(), $templates)): ?><?= $site->title()->html() ?><?php endif ?>">
    <meta property="og:description" content="<?= $site->description()->html() ?>">
    <meta property="og:image" content="<?= $image->url() ?>">
    <meta property="og:image:secure_url" content="<?= $image->url() ?>">
    <meta property="og:locale" content="fr_FR">
    <meta name="twitter:site" content="<?= $site->title() ?>">
    <meta name="twitter:creator" content="<?= $site->title() ?>">
    <meta name="twitter:url" content="<?= $site->url() ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php if($page->template() == 'numero'): ?><?= $site->title()->html() ?> <?= $page->numero()->html() ?>, <?= $page->titre()->html() ?><?php endif ?><?php if($page->template() == 'article'): ?><?= html::decode($page->titre()->kt()) ?><?php endif ?><?php $templates = ['a-propos', 'numeros', 'articles', 'home']; if(in_array($page->template(), $templates)): ?><?= $site->title()->html() ?><?php endif ?>">
    <meta name="twitter:description" content="<?= $site->description()->html() ?>">
    <meta name="twitter:image" content="<?= $image->url() ?>">

    <noscript><?= css('assets/css/app-noscript.css?v=1.11') ?></noscript>
    <!--<?= css('assets/css/app.min.css?v=1.11') ?>-->
    <?= css('assets/css/app.css?v=1.11') ?>
    <?= css('assets/css/custom-articles.css?v=1') ?>
    <noscript><?= css('assets/css/app-noscript.css?v=1.11') ?></noscript>

    <link rel="apple-touch-icon" sizes="57x57" href="<?= $site->url() ?>/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= $site->url() ?>/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $site->url() ?>/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $site->url() ?>/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $site->url() ?>/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $site->url() ?>/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $site->url() ?>/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $site->url() ?>/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $site->url() ?>/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= $site->url() ?>/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $site->url() ?>/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $site->url() ?>/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $site->url() ?>/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= $site->url() ?>/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= $site->url() ?>/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <header class="nav-wrapper" role="banner">
        <div class="pagetitle"></div>
        <div class="nav-bar">
            <p class="site-title sc"><a class="item" href="<?= url() ?>" rel="home"><?= $site->title()->html() ?></a></p>
            <noscript><em id="noscript-message">no script version</em></noscript>
            <div class="nav-left">
                <?php if($page->template() == 'article'): ?>
                <span class="ajax-nav-left">
                    <a class="item" href="<?= $page->parent()->url() ?>"><?= $page->parent()->numero()->html()  ?></a>
                </span>
                <?php endif ?>

                <?php if($page->template() == 'numero'): ?>
                <span class="ajax-nav-left">
                    <?= $page->numero()->html()  ?>
                </span>
                <?php endif ?>
                <?php if($page->template() == 'archive'): ?>
                <span class="ajax-nav-left">
                    <?= $page->numero()->html()  ?>
                </span>
                <?php endif ?>
            </div>
        <nav class="main-nav sc" role="navigation">
            <?php foreach($pages->visible() as $p): ?>
                  <li><a class="item menu-items menu-item-<?= $p->slug() ?> nav-mobile<?php e($p->isOpen(), ' active') ?>" href="<?= $p->url() ?>" data-page="<?= $p->slug() ?>"><?= $p->titre()->html() ?></a></li>
            <?php endforeach ?>
        </nav>
        <div class="nav-icon-wrapper">
            <button class="nav-icon" role="navigation">
                <svg class="nav-icon-closed" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15"><path d="M0,7h18v1H0V7z M0,14h18v1H0V14z M0,0h18v1H0V0z"></path></svg>
                <svg class="nav-icon-opened" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M18,0.8L17.2,0L9.1,8.2L0.8,0L0,0.8l8.2,8.2L0,17.2L0.8,18l8.2-8.1l8.1,8.1l0.8-0.8L9.9,9.1L18,0.8z"></path></svg>
            </button>
            </div>
        </div>
    </header>

    <div class="site">
