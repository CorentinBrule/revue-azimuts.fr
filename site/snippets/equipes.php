<section id="<?= $data->slug() ?>" class="subpart">
    <div class="subheading"><?= $data->titre() ?></div>
    <div class="equipes">
        <div class="subsubheading"><em>Direction éditoriale</em></div>
        <?php foreach($data->direction_editoriale()->toStructure() as $teachers): ?>
        <div class="equipes-content">
          <div class="equipes-content-year tab"><?= $teachers->annees()->kt() ?></div>
          <div class="equipes-content-hidden"><?= $teachers->enseignants()->kt() ?></div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="equipes">
        <div class="subsubheading"><em>Étudiants chercheurs</em></div>
        <?php foreach($data->etudiants_chercheurs()->toStructure() as $students): ?>
        <div class="equipes-content">
          <div class="equipes-content-year tab"><?= $students->annee()->kt() ?></div>
          <div class="equipes-content-hidden"><?= $students->etudiants()->kt() ?></div>
        </div>
      <?php endforeach ?>
    </div>
</section>