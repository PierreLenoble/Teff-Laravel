bgWidth = 1307;
bgHeight = 976;

window.onscroll = scroll;
window.onresize = resize;

window.onload = function () {
    test();
    resize();
};

function getBackgroundSize2() {
    var windowWidth = window.innerWidth;
    var windowHeight = window.innerHeight;

    width = windowWidth;
    height = Math.round(bgHeight * (windowWidth / bgWidth)) + 1;
    if (height < windowHeight) {
        height = windowHeight;
        width = Math.round(bgWidth * (windowHeight / bgHeight)) + 1;
    }

    return [height, width];
}

function resize2() {
    var size = getBackgroundSize();
    document.body.style.backgroundSize = size[1] + "px " + size[0] + "px";
}

function scroll2() {
    var bgSize = getBackgroundSize();
    var bgHeight = bgSize[0];
    var winHeight = window.innerHeight;
    var bodyHeight = Math.max(document.body.scrollHeight, document.body.offsetHeight);
    var scrollTop = Math.max(document.documentElement.scrollTop, document.body.scrollTop);
    var hiddenBgSize = bgHeight - winHeight;
    var percentTop = (scrollTop) / (bodyHeight - winHeight);

    var top = hiddenBgSize * percentTop;
    document.body.style.backgroundPosition = "0px -" + top + "px";
}