<?php

c::set('K2-PERSONAL', '88c5294833420ae1ea38683e3865d2b7');
c::set( 'sitemap.ignore.templates', array('droits', 'equipes', 'diffusion', 'abonnement', 'presentation') );
c::set( 'sitemap.include.images', false );
c::set( 'sitemap.important.templates', array('home', 'articles', 'numeros', 'a-propos', 'numero') );
c::set([
  'typography.space.collapse'             => false,
  'typography.hyphenation'                => false,
  'typography.dashes.style'               => 'en',
  'typography.dashes.spacing'             => false,
  'typography.class.caps'                 => 'sc',
  'typography.dewidow'                    => true,
  'typography.dewidow.maxlength'          => '12',
  'typography.dewidow.maxpull'            => '12',
  'typography.wordspacing.singlecharacter'=> false,
  'typography.style.quotes.initial'       => false,
  'typography.widget'                     => false,
  'typography.fractions'                  => false,
  'typography.math'                       => false
]);
c::set('markdown.extra', true);
c::set('debug', true);
c::set('thumbs.filename','{safeName}-{width}.{extension}');
c::set('thumbs.destination', function($thumb) {

    $destination = new Obj();

    // Create filename (copied from /kirby/toolkit/lib/thumb.php)
    $destination->filename = str::template($thumb->options['filename'], array(
        'extension'    => $thumb->source->extension(),
        'name'         => $thumb->source->name(),
        'filename'     => $thumb->source->filename(),
        'safeName'     => f::safeName($thumb->source->name()),
        'safeFilename' => f::safeName($thumb->source->name()) . '.' . $thumb->extension(),
        'width'        => $thumb->options['width'],
        'height'       => $thumb->options['height'],
        'hash'         => md5($thumb->source->root() . $thumb->settingsIdentifier()),
      ));

    // Thumbnail foldername
    $t = 'img_web';

    // Recalc URL
    $urlPath = str_replace($thumb->source->filename(), "", $thumb->url()) . $t;
    $destination->url  = $urlPath . '/' . $destination->filename;

    // Create Outputdirectory if it doesn't exist
    $outputFolder = new Folder($thumb->dir() . DS . $t);
    if (!$outputFolder->exists())
        $outputFolder->make(true);

    $destination->root = $outputFolder . DS . $destination->filename;

    return $destination;

});