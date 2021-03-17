<?php snippet('header') ?>
<main class="content load" data-page="<?= $page->slug() ?>">
    <div aria-hidden="true" class="nav-center home">
         <?php foreach($pages->find('numeros')->children()->visible()->flip() as $issue):
                    $title = $issue->titre();
                    $titleMD = $title->kirbytextRaw();
                    $number = $issue->numero();
                    $release = $issue->parution();
                ?>
                <div id="caption-<?= $number; ?>" class="home-caption-item">
                    <span class="home-number"><?= $number; ?></span><span class="home-title"><?= $titleMD; ?></span>
                </div>
                <?php endforeach ?>
          <?php foreach($pages->find('archives')->children()->visible()->flip() as $issue):
                     $title = $issue->titre();
                     $titleMD = $title->kirbytextRaw();
                     $number = $issue->numero();
                     $release = $issue->parution();
                 ?>
                 <div id="caption-<?= $number; ?>" class="home-caption-item">
                    <?php if($title == ""): ?>
                      <span class="home-title"><em>Azimuts</em> n° <?= $number; ?></span>
                    <?php else: ?>
                      <span class="home-number"><?= $number; ?></span><span class="home-title"><?= $titleMD; ?></span>
                    <?php endif ?>
                 </div>
                 <?php endforeach ?>
    </div>
    <div id="home">
      <div id="issues">
            <?php foreach($pages->find('numeros')->children()->visible()->flip() as $issue): ?>
            <div class="home-single">
                    <?php $image = $issue->image('image.jpg')->thumb(array('width' => 1300));
                    $title = $issue->titre();
                    $titleMD = $title->kirbytextRaw();
                    $number = $issue->numero();
                    $release = $issue->parution();
                    $message = $issue->message();
                    $placeholder = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3C/svg%3E";
                if($image): ?>
                    <a class="item home-single-wrapper" href="<?= $issue->url() ?>" data-n="<?= $number; ?>">
                        <img class="lazy home-single-image" data-src="<?= $image->url() ?>" src="<?= $placeholder ?>" title="" alt="<?= $title; ?>"/>
                        <noscript><img class="home-single-image" src="<?= $image->url() ?>" title="" alt="<?= $title; ?>"/></noscript>
                        <figcaption><p><span class="home-number"><?= $number; ?></span><span class="home-title"><em><?= $titleMD; ?></em></span><span class="home-release"><?= $release; ?></span></p></figcaption>
                        <?php if($message): ?><div class="home-message"><p><?= $message; ?></p></div><?php endif ?>
                    </a>
                <?php endif ?>
            </div>
            <?php endforeach ?>
        </div>
        <div id="archive">
          <?php foreach($pages->find('archives')->children()->visible()->flip() as $issue): ?>
          <div class="home-multi">
              <?php $image = $issue->image('couverture.jpg')->thumb(array('width' => 600));
                  $title = $issue->titre();
                  $titleMD = $title->kirbytextRaw();
                  $number = $issue->numero();
                  $release = $issue->parution();
                  $placeholder = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 2 3'%3E%3C/svg%3E";
              if($image): ?>
                  <a class="item home-multi-wrapper" href="<?= $issue->url() ?>" data-n="<?= $number; ?>">
                      <img class="lazy-delay home-multi-image" data-src="<?= $image->url() ?>" src="<?= $placeholder ?>" title="" alt="<?= $title; ?>">
                      <noscript><img class="home-multi-image" src="<?= $image->url() ?>" title="" alt="<?= $title; ?>"></noscript>
                      <?php if($title == ""): ?>
                        <figcaption><p><em class="home-number">Azimuts <span class="home-number-mobile">n°&#8239;<?= $number; ?></span></em><span class="home-release"><?= $release; ?></span></p></figcaption>
                      <?php else: ?>
                        <figcaption><p><span class="home-number"><?= $number; ?></span><span class="home-title"><em><?= $titleMD; ?></em></span><span class="home-release"><?= $release; ?></span></p></figcaption>
                      <?php endif ?>
                  </a>
              <?php endif ?>
          </div>
          <?php endforeach ?>
        </div>
    </main>
<?php snippet('footer') ?>
