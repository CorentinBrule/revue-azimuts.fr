<section id="<?= $data->slug() ?>" class="subpart">
    <h2 class="subheading"><?= $data->titre() ?></h2>
    <div class="about-infos-column">
        <div class="about-infos-column-content right">
                <?= $data->infos_abonnement_1()->kt() ?>
            </div>
        <div class="about-infos-column-content left">
                <?= $data->infos_abonnement_2()->kt() ?>
        </div>
    </div>
</section>
