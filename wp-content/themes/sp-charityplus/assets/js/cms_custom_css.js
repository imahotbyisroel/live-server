jQuery(document).ready(function(a){"use strict";var b=a('<style  type="text/css" class="cms-custtom-css-style"></style>').appendTo("head");a(".cms-custom-css").each(function(){var c=a(this),d=c.attr("id");if("undefined"!=typeof cms_custom_css_object[d]){var e=cms_custom_css_object[d].css;b.append(e)}})});