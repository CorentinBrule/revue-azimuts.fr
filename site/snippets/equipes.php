<section id="<?= $data->slug() ?>" class="subpart">
    <h2 class="subheading"><?= $data->titre() ?></h2>
    <div class="equipes">
        <h3 class="subsubheading"><em>Direction éditoriale</em></h3>
        <?php foreach($data->direction_editoriale()->toStructure() as $teachers): ?>
        <div class="equipes-content">
          <div class="equipes-content-year tab"><?= $teachers->annees()->kt() ?></div>
          <div class="equipes-content-hidden"><?= $teachers->enseignants()->kt() ?></div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="equipes">
        <h3 class="subsubheading"><em>Étudiants chercheurs</em></h3>
        <?php foreach($data->etudiants_chercheurs()->toStructure() as $students): ?>
        <div class="equipes-content">
          <div class="equipes-content-year tab"><?= $students->annee()->kt() ?></div>
          <div class="equipes-content-hidden"><?= $students->etudiants()->kt() ?></div>
        </div>
      <?php endforeach ?>
    </div>
</section>
