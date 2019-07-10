<section id="<?= $data->slug() ?>" class="subpart">
    <div class="subheading"><?= $data->titre() ?></div>
    <div class="about-infos-column">
        <div class="about-infos-column-content right">
                <?= $data->infos_abonnement_1()->kt() ?>
            </div>
        <div class="about-infos-column-content left">
                <?= $data->infos_abonnement_2()->kt() ?>
        </div>
    </div>
</section>