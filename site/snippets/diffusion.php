<section id="<?= $data->slug() ?>" class="subpart">
    <div class="subheading"><?= $data->titre() ?></div>
    <div class="diffusion-content-intro">
        <?= $data->commander()->kt() ?>
    </div>
    <div class="diffusion-content">
        <?= $data->librairies()->kt() ?>
    </div>
</section>