<?php snippet('header') ?>
<main class="content load" data-page="<?= $page->slug() ?>">
    <div class="nav-center running-title">
        <?= $page->titre()->kt() ?>
    </div>
    <div class="article">
        <section class="article-content-header">
            <h1 class="article-content-title heading">
                <?= $page->titre()->ktr() ?></h1>
            <h2 class="article-content-author heading">
                <?= $page->auteur()->ktr() ?></h2>
            <?php if(!$page->informations()->empty()): ?>
            <div class="article-content-infos">
                <?= $page->informations()->kt() ?>
            </div>
            <?php endif ?>
        </section>
        <?php if($page->introduction()->exist()): ?>
        <section class=article-introduction-text>
            <?= $page->introduction()->kt() ?>
        </section>
        <?php endif ?>
        <section class="article-content-text <?= $page->slug() ?> text-large">
            <?= $page->texte()->kt() ?>
        </section>

        <section class="article-infos">
            <div class="article-infos-content">
                <div class="article-infos-content-title">Citer cet article</div>
                <div class="article-infos-content-reference">
                  <span>« <?= $page->titre()->ktr() ?> », </span>
                  <p>
                    <?= $page->auteur()->html() ?>, <em>Azimuts</em>, nº&thinsp;<?= $page->parent()->numero()->html() ?>, <em><?= $page->parent()->titre()->html() ?></em>, <?= $page->parent()->parution()->html() ?>, <span class="sc">ESADSE</span>/Cité&#8239;du&#8239;Design, p.&#8239;<?= $page->pages()->citationPages() ?>.
                  </p>
                </div>
            </div>
            <?php if(!$page->biographie()->empty()): ?>
            <div class="article-infos-content">
                <div class="article-infos-content-title">Biographie</div>
                <?= $page->biographie()->kt()  ?>
            </div>
            <?php endif ?>
            <?php if(!$page->bibliographie()->empty()): ?>
            <div class="article-infos-content">
                <div class="article-infos-content-title">Bibliographie</div>
                <?= $page->bibliographie()->kt()  ?>
            </div>
            <?php endif ?>
            <?php if(!$page->autres_informations()->empty()): ?>
            <div class="article-infos-content">
                <div class="article-infos-content-title">Autres informations</div>
                <?= $page->autres_informations()->kt()  ?>
            </div>
            <?php endif ?>
            <?php
            $currentauthor = $page->auteur();
            $items = $pages->find('numeros')->children()->children()->not($site->activePage())->flip()->filterBy('auteur', $currentauthor, ','); ?>

            <?php
            $data = $pages->find('numeros')->children()->children()->not($site->activePage())->flip()->filterBy('auteur', $currentauthor, ',');
            $valuearray = array();
            foreach($data as $article) {
              $valuearray[] = array(
                'article' => (string)$article->titre(),
              );
            }?>
            <?php if(!empty($valuearray[0])): ?>
            <div class="article-infos-content related">
                <h4 class="article-infos-content-title">Du même auteur</h4>
                <ul>
                <?php foreach($items as $item): ?>
                  <div class="article-infos-content-reference">
                    <li>
                    <?php if($item->disponible()->value() == 'oui'): ?>
                      <a class="item " href="<?= $item->url() ?>">
                    <?php endif ?>
                    <?= $item->titre()->kt() ?>,
                    nº&thinsp;<?= $item->parent()->numero()->html() ?>,
                        <em><?= $item->parent()->titre()->kt() ?></em>, p.&#8239;<?= $item->pages()->citationPages() ?>.
                    </span>
                    <?php if($item->disponible()->value() == 'oui'): ?>
                      </a>
                    <?php endif ?>
                    </li>
                  </div>
                <?php endforeach ?>
                </ul>
                </div>
            <?php endif ?>
            <?php if(!$page->credits()->empty()): ?>
            <div class="article-infos-content">
                <div class="article-infos-content-title">Crédits</div>
                <?= $page->credits()->kt()  ?>
            </div>
            <?php endif ?>
        </section>

        <section class="article-footer">
            <div class="article-footer-wrapper" ></div>
            <div class="pagin tab"></div>
            <div class="article-end">
                <div class="article-end-summary"><a class="item"  href="<?= $page->parent()->url() ?>">Sommaire nº&thinsp;<?= $page->parent()->numero()->title()  ?></a></div>
                <div class="article-end-top">Haut de page</div>
            </div>
        </section>
        <section class="article-gallery">
            <button class="article-gallery-close">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M18,0.8L17.2,0L9.1,8.2L0.8,0L0,0.8l8.2,8.2L0,17.2L0.8,18l8.2-8.1l8.1,8.1l0.8-0.8L9.9,9.1L18,0.8z"></path></svg>
            </button>
            <div class="article-gallery-slideshow"></div>
            <div class="article-gallery-counter tab"></div>
        </section>
        <section class="article-end-mobile">
            <div class="article-end-summary"><a class="item"  href="<?= $page->parent()->url() ?>">Sommaire nº&thinsp;<?= $page->parent()->numero()->title()  ?></a></div>
            <div class="article-end-top">Haut de page</div>
        </section>
    </div>
</main>
        <?php snippet('footer') ?>
