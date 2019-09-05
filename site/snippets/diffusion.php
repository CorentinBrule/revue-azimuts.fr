<section id="<?= $data->slug() ?>" class="subpart">
    <h2 class="subheading"><?= $data->titre() ?></h2>
    <div class="diffusion-content-intro">
        <?= $data->commander()->kt() ?>
    </div>
    <div class="diffusion-content">
        <?= $data->librairies()->kt() ?>
    </div>
</section>
