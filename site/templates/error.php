<?php snippet('header') ?>
<main class="content load" data-page="<?php echo $page->slug() ?>">
    <div class="error">
        <section class="subpart">
            <div id="error" class="subheading"><?php echo $page->titre()->kt() ?></div>
            <div class="about-presentation text-large"><?php echo $page->texte()->kt() ?>
            </div>
        </section>
    </div>
<?php snippet('footer') ?>
