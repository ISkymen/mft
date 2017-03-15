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
    <div class="main-content">
      <?php if ($page['front_popular']) print render($page['front_popular']); ?>
      <?php if ($page['front_deal']) print render($page['front_deal']); ?>
    </div>
  <?php if ($page['front_trend']) print render($page['front_trend']); ?>
  <?php if ($page['front_carousel']) print render($page['front_carousel']); ?>
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
