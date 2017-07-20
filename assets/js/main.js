
(function() {
    'use strict';
    var container = document.querySelector('#cardShow');
    var langRo = document.querySelector('#langRo');
    langRo.addEventListener('click', function() {
    'use strict';
    var data = {
        message: 'Ti-ai setat limba în Română. Reîmprospătare conținut...'
    };
    container.MaterialSnackbar.showSnackbar(data);
  });
}());

(function() {
    'use strict';
    var container = document.querySelector('#cardShow');
    var langEn = document.querySelector('#langEn');
    langEn.addEventListener('click', function() {
    'use strict';
    var data = {
        message: 'You have set your language to English. Refreshing content...'
    };
    container.MaterialSnackbar.showSnackbar(data);
  });
}());

function detectIE() {
  var ua = window.navigator.userAgent;

  var msie = ua.indexOf('MSIE ');
  if (msie > 0) {
    // IE 10 or older => return version number
    return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
  }

  var trident = ua.indexOf('Trident/');
  if (trident > 0) {
    // IE 11 => return version number
    var rv = ua.indexOf('rv:');
    return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
  }

  var edge = ua.indexOf('Edge/');
  if (edge > 0) {
    // Edge (IE 12+) => return version number
    return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
  }

  return false;
}