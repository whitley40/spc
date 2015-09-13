//just some simple jq!

$( ".menu" ).click(function() {
  $( ".menu" ).toggleClass("icon-list");
  $( ".menu" ).toggleClass("icon-cancel");
  $( ".container" ).toggleClass("show-menu");
  $( "body" ).toggleClass("noscroll");
});

//fix my hovers on touch

function fix()
{
    var el = this;
    var par = el.parentNode;
    var next = el.nextSibling;
    par.removeChild(el);
    setTimeout(function() {par.insertBefore(el, next);}, 0)
}


