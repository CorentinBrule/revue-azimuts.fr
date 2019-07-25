<?php snippet('header') ?>
<main class="content load" role="main" data-page="<?= $page->slug() ?>">
    <div class="nav-center home">
         <?php foreach($pages->find('numeros')->children()->visible()->flip() as $issue):
                    $title = $issue->titre()->kt();
                    $number = $issue->numero();
                    $release = $issue->parution();
                ?>
                <div id="caption-<?= $number; ?>" class="home-caption-item">
                    <span class="home-number"><?= $number; ?></span><span class="home-title"><?= $title; ?></span>
                </div>
                <?php endforeach ?>
          <?php foreach($pages->find('archives')->children()->visible()->flip() as $issue):
                     $title = $issue->titre()->kt();
                     $number = $issue->numero();
                     $release = $issue->parution();
                 ?>
                 <div id="caption-<?= $number; ?>" class="home-caption-item">
                    <?php if($title == ""): ?>
                      <span class="home-title"><em>Azimuts</em> n° <?= $number; ?></span>
                    <?php else: ?>
                      <span class="home-number"><?= $number; ?></span><span class="home-title"><?= $title; ?></span>
                    <?php endif ?>
                 </div>
                 <?php endforeach ?>
    </div>
    <div id="home">
      <div id="issues">
            <?php foreach($pages->find('numeros')->children()->visible()->flip() as $issue): ?>
            <div class="home-single">
                <?php $image = $issue->image('image.jpg')->thumb(array('width' => 1800));
                    $title = $issue->titre();
                    $number = $issue->numero();
                    $release = $issue->parution();
                if($image): ?>
                    <a class="item home-single-wrapper" href="<?= $issue->url() ?>" data-n="<?= $number; ?>">
                        <img class="lazy home-single-image" data-src="<?= $image->url() ?>" title="" alt="<?= $title; ?>">
                        <noscript><img class="home-single-image" src="<?= $image->url() ?>" title="" alt="<?= $title; ?>"></noscript>
                        <figcaption><p><span class="home-number"><?= $number; ?></span><span class="home-title"><em><?= $title; ?></em></span><span class="home-release"><?= $release; ?></span></p></figcaption>
                    </a>
                <?php endif ?>
            </div>
        <?php endforeach ?>
    </div>
    <div id="archive">
      <?php foreach($pages->find('archives')->children()->visible()->flip() as $issue): ?>
      <div class="home-multi">
          <?php $image = $issue->image('couverture.jpg')->thumb(array('width' => 800));
              $title = $issue->titre();
              $number = $issue->numero();
              $release = $issue->parution();
          if($image): ?>
              <a class="item home-multi-wrapper" href="<?= $issue->url() ?>" data-n="<?= $number; ?>">
                  <img class="lazy home-multi-image" data-src="<?= $image->url() ?>" title="" alt="<?= $title; ?>">
                  <noscript><img class="home-multi-image" src="<?= $image->url() ?>" title="" alt="<?= $title; ?>"></noscript>
                  <figcaption><p><span class="home-number"><?= $number; ?></span><span class="home-title"><em><?= $title; ?></em></span><span class="home-release"><?= $release; ?></span></p></figcaption>
              </a>
          <?php endif ?>
      </div>
      <?php endforeach ?>
    </div>
  </div>
<?php snippet('footer') ?>
