jQuery(document).ready(function() {

jQuery(".ip-responsive-table__wrap").each(function() {
  let titles = new Array();
  jQuery(this).find('thead th').each(function() {
    titles.push( jQuery( this ).text() );
  });
  jQuery(this).find('tbody tr').each(function() {
    let count = 0;
      // console.log( this );
    jQuery(this).find('td').each(function() {
      jQuery(this).attr("data-label", titles[count]);
      // console.log( this );
      // console.log( count );
      count++;
    });
  });
  // console.log(titles);
  // console.log(titles.length);
});//table

});//ready
