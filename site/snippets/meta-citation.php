<!-- meta données spécifiques -->
<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/">
<link rel="schema.DCTERMS" href="http://purl.org/dc/terms/">
<?php if($page->template() == 'article'): ?>
  <!-- DC articles -->
  <meta name="DC.type" content="journalArticle">
  <meta name="DC.creator" content="<?= $page->auteur()->html() ?>">
  <meta name="DC.title" content="<?= $page->titre()->html() ?>">
  <meta name="DC.date" content="<?= $page->parent()->parution()->html() ?>">
  <meta name="DC.relation.isPartOf" content="urn:ISSN:<?= $page->parent()->issn()->html() ?>">
  <meta name="DC.format" content="html">
  <?php if ($page->parent()->editeur()): ?>
      <meta name="DC.publisher" content="<?= $page->parent()->editeur() ?>">
      <meta name="citation_publisher" content="<?= $page->parent()->editeur() ?>">
  <?php else: ?>
      <meta name="DC.publisher" content="ESADSE/Cité du Design">
      <meta name="citation_publisher" content="ESADSE/Cité du Design">
  <?php endif; ?>
  <!-- OG article -->
  <meta property="og:type" content="journalArticle">
  <meta name="og:article:published_time" content="<?= $page->parent()->parution()->html() ?>">
  <meta name="og:article:published" content="<?= $page->parent()->parution()->html() ?>">
  <!--- citation article -->
  <meta name="citation_journal_title" content="Azimuts">
  <meta name="citation_issn" content="<?= $page->parent()->issn()->html() ?>">
  <meta name="citation_issue" content="<?= $page->parent()->numero()->html() ?>">
  <?php if(preg_match_all("/(\d+)-(\d+)/", $page->pages()->html(),$matches)):?>
    <meta name="citation_firstpage" content="<?= $matches[1][0] ?>">
    <meta name="citation_lastpage" content="<?= $matches[2][0] ?>">
  <?php endif; ?>
<?php elseif($page->template() == 'numero'): ?>
  <meta property="og:type" content="book">
  <meta property="DC.type" content="book">
  <meta name="DC.date" content="<?= $page->parent()->parution()->html() ?>">

  <?php if ($page->parent()->editeur()): ?>
      <meta name="DC.publisher" content="<?= $page->parent()->editeur() ?>">
      <meta name="citation_publisher" content="<?= $page->parent()->editeur() ?>">
  <?php else: ?>
      <meta name="DC.publisher" content="ESADSE/Cité du Design">
      <meta name="citation_publisher" content="ESADSE/Cité du Design">
  <?php endif; ?>
<?php else: ?>
  <meta property="og:type" content="website">
<?php endif ?>
