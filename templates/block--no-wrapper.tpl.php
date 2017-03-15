<?php
/**
 * @file
 * Returns the HTML for a block with bare minimum HTML.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728250
 */
?>

<?php print render($title_prefix); ?>
<?php if ($title): ?>
  <div<?php print $title_attributes; ?>><?php print $title; ?></div>
<?php endif; ?>
<?php print render($title_suffix); ?>

<?php print $content; ?>
