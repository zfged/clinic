let path=window.location.pathname;
let path_array=path.split("/");
path = path_array[1];
$(`.top-menu a`).removeClass("color-button");
$(`.top-menu a[href="/${path}"]`).addClass("color-button");

$(".left .clients-list").niceScroll({
    cursorcolor:"darkblue",
    cursorwidth:"10px"
});
$(".right").niceScroll({
    cursorcolor:"darkblue",
    cursorwidth:"10px"
});
$(".scroll").niceScroll({
    cursorcolor:"darkblue",
    cursorwidth:"10px"
});