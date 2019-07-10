<?php snippet('header') ?>
<main class="content load" role="main" data-page="<?= $page->slug() ?>">
    <div class="nav-center running-title">
        <?= $page->titre()->kt() ?>
    </div>
    <div class="issue">
        <section class="issue-content">
            <h1 class="article-content-title heading">
               <?= $page->titre()->kt() ?></h1>
            <div class="issue-content-header">
                <?php $image = $page->image('couverture.jpg')->thumb(array('width' => 600));
                if($image): ?>
                <div class="issue-cover">
                    <img src="<?= $image->url() ?>" alt="">
                </div>
                <?php endif ?>
                <div class="issue-presentation">
                    <div class="issue-presentation-content text-large">
                        <?= $page->presentation()->kt() ?>
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
                        <div class="<?php if($item->disponible()->value() == 'oui'): ?>entry-available<?php else: ?>entry<?php endif ?>"> 
                        <?php if($item->disponible()->value() == 'oui'): ?>
                        <a class="item" href="<?= $item->url() ?>"><?php endif ?>
                            <span class="index-pages tab"><?= html($item->pages()) ?></span>
                            <span class="index-title-author"><span class="index-title"><?= $item->titre()->kt() ?></span><span class="index-author"><?= $item->auteur()->kt() ?></span></span><span class="index-available"><?php if($item->disponible()->value() == 'oui') echo html('•') ?></span><span class="index-type"><?= html($item->type()) ?></span>
                        <?php if($item->disponible()->value() == 'oui'): ?>
                        </a>
                        <?php endif ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach ?>
            </div>
    </section>
        
    <section class="issue-footer">
        <div class="issue-credits">
             <em>Direction&nbsp;éditoriale</em> <?= $page->direction_editoriale()->html() ?> / <em>Direction&nbsp;graphique</em> <?= $page->direction_graphique()->html() ?> / <em>Design&nbsp;graphique</em> <?= $page->design_graphique()->html() ?> / <em>Étudiants&nbsp;chercheurs</em> <?= $page->etudiants_chercheurs()->html() ?>
        </div>
    </section>
    
    <section class="index-content issue">
        <div class="index-content-title text-large">Autres numéros</div>
        <div class="index-content-sort">
            <a class="index-issue-single sc" data-sortby="issue">Nº</a>
            <a class="index-issue-title sc" data-sortby="title">Titre</a>
            <a class="index-issue-release sc">Année</a>
        </div>
        <div class="index-content-issues">
            <?php 
            $items = $site->find('numeros')->children()->visible()->not($site->activePage())->flip(); 
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
</div>
<?php snippet('footer') ?>