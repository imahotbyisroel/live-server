jQuery(document).ready(function ($) {
    /*START WOO*/
    //Product List / Grid Toggle
    var activeClass = 'toggle-active';
    var gridClass = 'grid-layout';
    var listClass = 'list-layout';
    var shortwrap = $('.product-listing-wrap ul.products');

    jQuery('.toggleList').click(function () {
        if (!getCookie('pr_layout') || getCookie('pr_layout') == 'grid') {
            $('.toggleList').addClass(activeClass);
            $('.toggleGrid').removeClass(activeClass);
            $('.product-listing-wrap .product-image').addClass('col-md-4');
            $('.product-listing-wrap .product-info').addClass('col-md-8');
            shortwrap.fadeOut(300, function () {
                $(this).removeClass(gridClass).addClass(listClass).
                        fadeIn(300);
                setCookie('pr_layout', 'list', '3', '/');
            });
        }
        return false;
    });

    $('.toggleGrid').click(function () {
        if (!getCookie('pr_layout') || getCookie('pr_layout') == 'list') {
            $('.toggleGrid').addClass(activeClass);
            $('.toggleList').removeClass(activeClass);
            $('.product-listing-wrap .product-image').removeClass('col-md-4');
            $('.product-listing-wrap .product-info').removeClass('col-md-8');
            shortwrap.fadeOut(300, function () {
                $(this).removeClass(listClass).addClass(gridClass).fadeIn(300);
                setCookie('pr_layout', 'grid', '3', '/');
            });
            return false;
        }
    });
    // ONLOAD
    if (getCookie('pr_layout') == 'grid') {
        shortwrap.removeClass('list-layout').addClass('grid-layout');
        $('.toggleGrid').addClass(activeClass);
    } else if (getCookie('pr_layout') == 'list') {
        shortwrap.removeClass('grid-layout').addClass('list-layout');
        $('.toggleList').addClass(activeClass);
        $('.product-listing-wrap .product-image').addClass('col-md-4');
        $('.product-listing-wrap .product-info').addClass('col-md-8');
    } else {
        $('.toggleGrid').addClass(activeClass);
    }
    //END WOO
    //DEMO STORE NOTICE
    if ($('.woocommerce-page .demo_store').length > 0) {
        notice_height = $('.demo_store').outerHeight();
        $('#top-bar').css('margin-top', notice_height);
    }

});
function getCookie(w) {
    cName = "";
    pCOOKIES = new Array();
    pCOOKIES = document.cookie.split('; ');
    for (bb = 0; bb < pCOOKIES.length; bb++) {
        NmeVal = new Array();
        NmeVal = pCOOKIES[bb].split('=');
        if (NmeVal[0] == w) {
            cName = unescape(NmeVal[1]);
        }
    }

    return cName;
}
function setCookie(name, value, expires, path, domain, secure) {
    cookieStr = name + "=" + escape(value) + "; ";
    if (expires) {
        expires = this.setExpiration(expires);
        cookieStr += "expires=" + expires + "; ";
    }
    if (path) {
        cookieStr += "path=" + path + "; ";
    }
    if (domain) {
        cookieStr += "domain=" + domain + "; ";
    }
    if (secure) {
        cookieStr += "secure; ";
    }

    document.cookie = cookieStr;
}
function setExpiration(cookieLife) {
    var today = new Date();
    var expr = new Date(today.getTime() + cookieLife * 24 * 60 * 60 * 1000);
    return  expr.toGMTString();
}


