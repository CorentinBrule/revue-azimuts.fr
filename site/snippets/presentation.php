<section id="<?= $data->slug() ?>" class="subpart">
    <div class="about-presentation text-large">
        <?= $data->presentation()->kt() ?></div>
    <div class="about-infos-column">
        <div class="about-infos-column-content right"><?= $data->infos_1()->kt() ?></div><div class="about-infos-column-content left"><?= $data->infos_2()->kt() ?></div>
    </div>
</section>
