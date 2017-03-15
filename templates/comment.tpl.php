<?php
/**
 * @file
 * Returns the HTML for comments.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728216
 */
?>
<article class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <header>
    <p class="submitted">
      <?php print $picture; ?>
      <?php
	  $comment_author_query = "SELECT name FROM {comment} WHERE cid='" . $comment->cid . "';";
	  $comment_author_result = db_query($comment_author_query)->fetchField();
      print t('Submitted by !username on !datetime',
      array('!username' => $comment_author_result, '!datetime' => '<time>' . $created . '</time>'));
    ?>
    <?php 
    if (user_access('administer comments')){
        if ($comment->uid == '0'){
            $comment_host_query = "SELECT hostname FROM {comment} WHERE cid='" . $comment->cid . "';";
            if ($comment_host_result = db_query($comment_host_query)->fetchField()){
                echo ' | IP: '. $comment_host_result;
                }
            }
    }
    ?>
    </p>

    <?php if ($new): ?>
      <mark class="new"><?php print $new; ?></mark>
    <?php endif; ?>

    <?php if ($status == 'comment-unpublished'): ?>
      <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
    <?php endif; ?>
  </header>

  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['links']);
    print render($content);
  ?>

  <?php if ($signature): ?>
    <footer class="user-signature clearfix">
      <?php print $signature; ?>
    </footer>
  <?php endif; ?>

  <?php print render($content['links']) ?>
</article>
