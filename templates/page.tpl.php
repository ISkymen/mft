<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>
<div class="header">
    <header class="header__content">
      <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>"
             title="<?php print t('Home'); ?>" rel="home" class="header__logo"
             id="logo"><img src="<?php print $logo; ?>"
                            alt="<?php print t('Home'); ?>"
                            class="header__logo-image"/></a>
      <?php endif; ?>

      <?php if ($site_name || $site_slogan): ?>
          <div class="header__name-and-slogan" id="name-and-slogan">
            <?php if ($site_name): ?>
                <div class="header__site-name" id="site-name">
                    <a href="<?php print $front_page; ?>"
                       title="<?php print t('Home'); ?>"
                       class="header__site-link"
                       rel="home"><span><?php print $site_name; ?></span></a>
                </div>
            <?php endif; ?>

            <?php if ($site_slogan): ?>
                <div class="header__site-slogan"
                     id="site-slogan"><?php print $site_slogan; ?></div>
            <?php endif; ?>
          </div>
      <?php endif; ?>
      <?php print render($page['header']); ?>
      <?php print render($page['header_right']); ?>
    </header>
</div>
<div class="page">
    <div class="navigation">
      <?php print render($page['navigation']); ?>
    </div>
    <div class="header2">
      <?php print render($page['header2']); ?>
    </div>
  <div id="main">
      <?php print $breadcrumb; ?>
	  <div class="afterbread">&nbsp;</div>
    <div id="content" class="column" role="main">
      <?php print render($page['highlighted']); ?>

      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
	  <?php
        $is_first_page = (isset($_GET['page']))? FALSE : TRUE;
        if ($is_first_page) {
          $content_1st = render($page['content_1st']);
          print $content_1st;
        }
      ?>
	  <?php print render($page['content2']); ?>
      <?php print $feed_icons; ?>
    </div>

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_first || $sidebar_second): ?>
      <aside class="sidebars">
        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside>
    <?php endif; ?>

  </div>
</div>
    <div class="footer">
        <footer class="footer__content">
          <?php if ($page['footer_left']) print render($page['footer_left']); ?>
          <?php if ($page['footer']) print render($page['footer']); ?>
          <?php if ($page['footer_right']) print render($page['footer_right']); ?>
        </footer>
        <div class="copyright">Copyright © 2015 - <?php print date('Y') ?> MyFancyCraft</div>
    </div>
<script>
    var listClass = document.getElementById('block-commerce-cart-cart');
    var list = listClass.getElementsByTagName('tr');
    for(var i=0; i <= list.length; i++){
        document.getElementById('edit-edit-delete-'+ i).value = 'X';
    }
</script>

<?php print render($page['bottom']); ?>
