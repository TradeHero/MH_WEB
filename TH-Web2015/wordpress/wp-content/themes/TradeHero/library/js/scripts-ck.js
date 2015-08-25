/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/// IE8 ployfill for GetComputed Style (for Responsive Script below)
window.getComputedStyle||(window.getComputedStyle=function(e,t){this.el=e;this.getPropertyValue=function(t){var n=/(\-([a-z]){1})/g;t=="float"&&(t="styleFloat");n.test(t)&&(t=t.replace(n,function(){return arguments[2].toUpperCase()}));return e.currentStyle[t]?e.currentStyle[t]:null};return this});jQuery(document).ready(function(e){var t=e(window).width();t<481;t>481;t>=768&&e(".comment img[data-gravatar]").each(function(){e(this).attr("src",e(this).attr("data-gravatar"))});t>1030});(function(e){function c(){n.setAttribute("content",s);o=!0}function h(){n.setAttribute("content",i);o=!1}function p(t){l=t.accelerationIncludingGravity;u=Math.abs(l.x);a=Math.abs(l.y);f=Math.abs(l.z);!e.orientation&&(u>7||(f>6&&a<8||f<8&&a>6)&&u>5)?o&&h():o||c()}if(!(/iPhone|iPad|iPod/.test(navigator.platform)&&navigator.userAgent.indexOf("AppleWebKit")>-1))return;var t=e.document;if(!t.querySelector)return;var n=t.querySelector("meta[name=viewport]"),r=n&&n.getAttribute("content"),i=r+",maximum-scale=1",s=r+",maximum-scale=10",o=!0,u,a,f,l;if(!n)return;e.addEventListener("orientationchange",c,!1);e.addEventListener("devicemotion",p,!1)})(this);(function(e,t,n){var r=function(e){return e.trim?e.trim():e.replace(/^\s+|\s+$/g,"")},i=function(e,t){return(" "+e.className+" ").indexOf(" "+t+" ")!==-1},s=function(e,t){i(e,t)||(e.className=e.className===""?t:e.className+" "+t)},o=function(e,t){e.className=r((" "+e.className+" ").replace(" "+t+" "," "))},u=function(e,t){if(e)do{if(e.id===t)return!0;if(e.nodeType===9)break}while(e=e.parentNode);return!1},a=t.documentElement,f=e.Modernizr.prefixed("transform"),l=e.Modernizr.prefixed("transition"),c=function(){var e={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",msTransition:"MSTransitionEnd",transition:"transitionend"};return e.hasOwnProperty(l)?e[l]:!1}();e.App=function(){var n=!1,r={},f=t.getElementById("inner-wrap"),h=!1,p="js-nav";r.init=function(){if(n)return;n=!0;var d=function(e){e&&e.target===f&&t.removeEventListener(c,d,!1);h=!1};r.closeNav=function(){if(h){var n=c&&l?parseFloat(e.getComputedStyle(f,"")[l+"Duration"]):0;n>0?t.addEventListener(c,d,!1):d(null)}o(a,p)};r.openNav=function(){if(h)return;s(a,p);h=!0};r.toggleNav=function(e){h&&i(a,p)?r.closeNav():r.openNav();e&&e.preventDefault()};t.getElementById("nav-open-btn").addEventListener("click",r.toggleNav,!1);t.getElementById("nav-close-btn").addEventListener("click",r.toggleNav,!1);t.addEventListener("click",function(e){if(h&&!u(e.target,"nav")){e.preventDefault();r.closeNav()}},!0);s(a,"js-ready")};return r}();e.addEventListener&&e.addEventListener("DOMContentLoaded",e.App.init,!1)})(window,window.document);(function(){var e=$("#fix"),t=e.offset();$(window).scroll(function(){$(this).scrollTop()>t.top+10&&e.css("position")=="static"?e.addClass("fixed"):$(this).scrollTop()<=t.top&&e.hasClass("fixed")&&e.removeClass("fixed")})});

/* Tracking of onClick event */
	$(document).ready(function() {
 
    $(".jetpack-image-container a").each(function() {
        var href = $(this).attr("href");
        var target = $(this).attr("target");
        var text = $(this).text();
        $(this).click(function(event) { // when someone clicks these links
            event.preventDefault(); // don't open the link yet
            _gaq.push(["_trackEvent", "Links", "BannerClick", href, , false]); // create a custom event
            setTimeout(function() { // now wait 300 milliseconds...
                window.open(href,(!target?"_self":target)); // ...and open the link as usual
            },300);
        });
    )};
 
	});