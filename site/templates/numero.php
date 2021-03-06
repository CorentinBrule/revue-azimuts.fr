<?php snippet('header') ?>
<main class="content load" data-page="<?= $page->slug() ?>">
    <div class="nav-center running-title">
        <?= $page->titre()->kt() ?>
    </div>
    <div class="issue">
        <section class="issue-content">
            <h1 class="article-content-title heading">
               <?= $page->titre()->ktr() ?></h1>
            <div class="issue-content-header">
                <?php $image = $page->image('couverture.jpg')->thumb(array('width' => 600));
                if($image): ?>
                <div class="issue-cover">
                    <img src="<?= $image->url() ?>" alt="Couverture du numéro <?= $page->numero() ?>">
                </div>
                <?php endif ?>
                <div class="issue-presentation">
                    <div class="issue-presentation-content text-large">
                        <?= $page->presentation()->kt() ?>
                        <?php $message = $page->message(); if($message): ?><br><p class="message"><?= $message; ?></p><?php endif ?>
                    </div>
                    <div class="issue-content-infos">
                        <?= $page->pages()->html() ?>, <span class="sc">ESADSE</span>/Cité du design, <?= $page->parution()->html() ?>, <?= $page->prix()->html() ?>, <span class="sc">ISSN</span>:&#8239;<?= $page->issn()->html() ?>
                    </div>

                </div>
            </div>
         </section>

         <section class="index-content">
            <div class="index-content-sort">
                <span class="sort index-pages sc">Pages</span>
                <span class="sort index-title sc">Titre</span>
                <span class="sort index-author sc">Auteur</span>
                <span class="sort index-available sc">Lire</span>
                <span class="sort index-type sc">Type</span>
            </div>
            <div class="index-content-articles">
                <?php
                $sections = $page->children()->visible()->groupBy('section', false);
                foreach($sections as $section => $items): ?>
                    <div class="section <?= str::slug($section) ?>"><div class="section-title"><?= $section ?></div>
                        <?php foreach($items as $item) : ?>
                        <li class="<?php if($item->disponible()->value() == 'oui'): ?>entry-available<?php else: ?>entry<?php endif ?>">
                        <?php if($item->disponible()->value() == 'oui'): ?>
                        <a class="item" href="<?= $item->url() ?>"><?php endif ?>
                            <span class="index-pages tab"><?= $item->pages()->citationPages() ?></span>
                            <span class="index-title-author"><span class="index-title"><?= $item->titre()->ktr() ?></span><span class="index-author"><?= $item->auteur()->ktr() ?></span></span><span class="index-available"><?php if($item->disponible()->value() == 'oui') echo html('•') ?></span><span class="index-type"><?= html($item->type()) ?></span>
                        <?php if($item->disponible()->value() == 'oui'): ?>
                        </a>
                        <?php endif ?>
                      </li>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach ?>
            </div>

    </section>

    <section class="issue-footer">
        <div class="issue-credits">
             <em>Direction&nbsp;éditoriale</em> <?= $page->direction_editoriale()->html() ?> / <?php if($page->direction_graphique() != ""): ?><em>Direction&nbsp;graphique</em> <?= $page->direction_graphique()->html() ?> / <?php endif ?><em>Design&nbsp;graphique</em> <?= $page->design_graphique()->html() ?> / <em>Étudiant·e·s&nbsp;chercheu·se·r·s</em> <?= $page->etudiants_chercheurs()->html() ?>
        </div>
    </section>

    <section class="index-content issue">
        <div class="index-content-title text-large">Autres numéros</div>
        <?php snippet('numeros-index') ?>
    </section>
  </div>
</main>
<?php snippet('footer') ?>
