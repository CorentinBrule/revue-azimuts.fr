<?php snippet('header') ?>
<p>coucou</p>
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
                        <?= $page->pages()->html() ?>,
                        <?php if(!$page->editeur()->exists()): ?>
                          <span class="sc">ESADSE</span>/Cité du design,
                        <?php elseif ($page->editeur()->html()=="IRDD"): ?>
                          <span class="sc">IRDD</span> (Istitut Régional pour le Développement du Design),
                        <?php else: ?>
                          <?= $page->editeur()->html() ?>,
                        <?php endif ?>
                        <?= $page->parution()->html() ?>,
                        <?php if($page->prix()->html()!=""): ?>
                          <?= $page->prix()->html() ?>,
                        <?php endif ?>
                        <?php if($page->issn()->html()!=""): ?>
                          <span class="sc">ISSN</span>:&#8239;<?= $page->issn()->html() ?>
                        <?php endif ?>
                        <?php if($page->isbn()->html()!=""): ?>
                          <span class="sc">ISBN</span>:&#8239;<?= $page->isbn()->html() ?>
                        <?php endif ?>
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
                <!--<span class="sort index-type sc">Type</span>-->
            </div>
            <div class="index-content-articles">
                <?php
                $items = $page->children()->visible();
                foreach($items as $item): ?>
                      <div class="<?php if($item->disponible()->value() == 'oui'): ?>entry-available<?php else: ?>entry<?php endif ?>">
                      <?php if($item->disponible()->value() == 'oui'): ?>
                      <a class="item" href="<?= $item->url() ?>"><?php endif ?>
                          <span class="index-pages tab"><?= html($item->pages()) ?></span>
                          <span class="index-title-author">
                            <span class="index-title"><?= $item->titre()->kt() ?></span>
                            <span class="index-author"><?= $item->auteur()->kt() ?></span>
                          </span>
                          <span class="index-available">
                            <?php if($item->disponible()->value() == 'oui') echo html('•') ?>
                          </span>
                          <span class="index-type"><?= html($item->type()) ?></span>
                      <?php if($item->disponible()->value() == 'oui'): ?>
                      </a>
                      <?php endif ?>
                      </div>
                <?php endforeach ?>
            </div>
    </section>

    <section class="issue-footer">
        <div class="issue-credits">
             <?php if($page->direction_editoriale()->html()!=""): ?><em>Direction&nbsp;éditoriale /</em><?= $page->direction_editoriale()->html() ?><?php endif ?>
             <?php if($page->direction_graphique()->html()!=""): ?><em>Direction&nbsp;graphique /</em> <?= $page->direction_graphique()->html() ?><?php endif ?>
             <?php if($page->design_graphique()->html()!=""): ?><em>Design&nbsp;graphique</em> /<?= $page->design_graphique()->html() ?><?php endif ?>
             <?php if($page->etudiants_chercheurs()->html()!=""): ?><em>Étudiants&nbsp;chercheurs</em><?= $page->etudiants_chercheurs()->html() ?><?php endif ?>
        </div>
    </section>

    <section class="index-content issue">
        <div class="index-content-title text-large">Autres numéros</div>
          <?php snippet('numeros-index') ?>
        </div>
    </section>
</div>
<?php snippet('footer') ?>
