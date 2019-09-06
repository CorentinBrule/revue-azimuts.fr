<?php snippet('header') ?>

<main class="content load" data-page="<?php echo $page->slug() ?>">
    <div class="numeros">
        <section class="index-content issue">
          <?php snippet('numeros-index') ?>
        <section class="numeros-infos">
            <?= $page->texte()->kt()  ?>
        </section>
    </div>
</main>
    <?php snippet('footer') ?>
