<?php snippet('header') ?>
<main class="content load" data-page="<?= $page->slug() ?>">
    <div class="nav-center">
        <input id="search" class="nav-search-input" type="text" placeholder="Rechercher" role="research">
    </div>
    <div class="index">
        <section class="index-content">
            <div class="index-content-sort">
                <a href="#" class="sort index-issue selected sc" data-sortby="issue" data-sortdir="DESC">Nº</a>
                <a href="#" class="sort index-title sc" data-sortby="title" data-sortdir="ASC">Titre</a>
                <a href="#" class="sort index-author sc" data-sortby="author" data-sortdir="ASC">Auteur</a>
                <a href="#" class="sort index-available sc" data-sortby="available" data-sortdir="ASC">Lire</a>
                <a href="#" class="sort index-type sc" data-sortby="type" data-sortdir="ASC">Type</a>
            </div>
            <ul class="index-content-articles">

            <?php
            $items = $site->find('numeros')->children()->children()->visible()->flip();
            foreach($items as $item):?>
              <?php if($item->section() != 'Éditorial'): ?>
              <li class="<?php if($item->disponible()->value() == 'oui'): ?>entry-available<?php else: ?>entry<?php endif ?> entry-item" data-issue="<?= str::slug($item->parent()->numero()) ?>" data-title="<?= str::slug($item->titre()) ?>" data-author="<?= str::slug($item->auteur()) ?>" data-available="<?php if($item->disponible()->value() == 'oui'): ?>A<?php else: ?>Z<?php endif ?>" data-type="<?= str::slug($item->type())?>">
                  <?php if($item->disponible()->value() == 'oui'): ?>
                  <a class="item" href="<?= $item->url() ?>">
                  <?php endif ?>
                    <?php if($item->disponible()->value() == 'non' || $item->disponible()->exist() == false || $item->disponible()->value() == ''): ?><a class="index-issue tab" href="<?= $item->parent()->url() ?>"><?php endif ?>
                      <span class="index-issue tab"><?= $item->parent()->numero()->html() ?></span>
                    <?php if($item->disponible()->value() == 'non' || $item->disponible()->exist() == false || $item->disponible()->value() == ''): ?></a><?php endif ?>
                      <span class="index-title-author"><span class="index-title"><?= $item->titre()->kt() ?></span><span class="index-author"><?= $item->auteur()->kt() ?></span></span><span class="index-available"><?php if($item->disponible()->value() == 'oui') echo html('•') ?></span><span class="index-type"><?= $item->type()->html() ?></span>
                  <?php if($item->disponible()->value() == 'oui'): ?>
                  </a>
                  <?php endif ?>
              </li>
              <?php endif ?>
            <?php endforeach ?>
            <div id="button-next-issues" class="input-label" for="show-button">
                <span>Anciens numéros</span>
            </div>
            <!-- <input type=radio id="show-button" name="group">-->
            <noscript id="archive-index-unload">
            <?php
            $items = $site->find('archives')->children()->children()->visible()->flip();
            foreach($items as $item):?>
              <?php if($item->section() != 'Éditorial' && $item->parent()->type() != 'Catalogue'): ?>
              <li class="archive <?php if($item->disponible()->value() == 'oui'): ?>entry-available<?php else: ?>entry<?php endif ?> entry-item" data-issue="<?= str::slug($item->parent()->numero()) ?>" data-title="<?= str::slug($item->titre()) ?>" data-author="<?= str::slug($item->auteur()) ?>" data-available="<?php if($item->disponible()->value() == 'oui'): ?>A<?php else: ?>Z<?php endif ?>" data-type="<?= str::slug($item->type())?>">
                  <?php if($item->disponible()->value() == 'oui'): ?>
                  <a class="item" href="<?= $item->url() ?>">
                  <?php endif ?>
                      <span class="index-issue tab"><?= html($item->parent()->numero()->htlm()) ?></span>
                      <span class="index-title-author"><span class="index-title"><?= $item->titre()->kt() ?></span><span class="index-author"><?= $item->auteur()->kt() ?></span></span><span class="index-available"><?php if($item->disponible()->value() == 'oui') echo html('•') ?></span><span class="index-type"><?= $item->type()->html() ?></span>
                  <?php if($item->disponible()->value() == 'oui'): ?>
                  </a>
                  <?php endif ?>
              </li>
              <?php endif ?>
            <?php endforeach ?>
          </noscript>

          </ul>
        </section>
    </div>
</main>
<?php snippet('footer') ?>
