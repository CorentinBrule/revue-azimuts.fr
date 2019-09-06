<?php snippet('header') ?>

<div class="nav-center" role="navigation">
    <?php foreach($page->children()->visible() as $p): ?>
        <a href="#<?= $p->slug() ?>" class="secondary-nav" href="<?= $p->url() ?>" ><?= $p->titre()->html() ?></a>
    <?php endforeach ?>
</div>

<main class="content load <?= $page->slug() ?>" data-page="<?= $page->slug() ?>">

    <div id="about-content">
        <?php foreach($page->children()->visible() as $section) {
          snippet($section->uid(), array('data' => $section));
        } ?>
    </div>
    <div id="credits" class="text-small">
        <?= $site->credits()->kt() ?>
    </div>

<?php snippet('footer') ?>
