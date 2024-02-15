jQuery(document).ready(function() {

function set_title_line_width() {
  jQuery(".title__text").each(function() {
    var widthTitleText = jQuery(this).width();
    jQuery(this).parent().find('.title__line').css('width', widthTitleText);
  });
}
set_title_line_width();
jQuery( window ).resize(function(event) {
  set_title_line_width();
});

});//ready
