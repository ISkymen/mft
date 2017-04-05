jQuery(document).ready(function($){
             $('.node-type-product-display #content img').attr('alt', $('#page-title').text());


    if (!(document.documentMode < 9)) {
      $('.view-trending-categories .view-content .mf-category').each(function () {
        var src = $(this).find('img').attr('src');
        $(this).find('.mf-category__image').css('background-image', 'url(' + src + ')');
        $(this).find('img').remove();
      });
    }

});

