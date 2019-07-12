<?php snippet('header') ?>
<main class="content load" role="main" data-page="<?php echo $page->slug() ?>">
    <div class="numeros">
        <section class="index-content issue">
            <div class="index-content-sort">
                <a class="index-issue-single sc" data-sortby="issue">Nº</a>
                <a class="index-issue-title sc" data-sortby="title">Titre</a>
                <a class="index-issue-release sc">Année</a>
            </div>
            <div class="index-content-issues">
                <?php
                $items = $site->find('archives')->children()->visible()->not($site->activePage())->flip();
                foreach($items as $item):?>
                <div class="entry-available">
                    <a class="item" href="<?= $item->url() ?>">
                        <span class="index-issue-single tab"><?= html($item->numero()) ?></span>
                        <span class="index-issue-title"><?= $item->titre()->kt() ?></span>
                        <span class="index-issue-release tab"><?= html($item->parution()) ?></span>
                    </a>
                </div>
                <?php endforeach ?>
            </div>
        </section>
        <section class="numeros-infos">
            <?= $page->texte()->kt()  ?>
        </section>
    </div>
</main>
    <?php snippet('footer') ?>
