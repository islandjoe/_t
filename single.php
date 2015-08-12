<?php

$context = Timber::get_context();
$context[ 'post' ] = $post = Timber::get_post();

Timber::render( 'single.twig', $context );
