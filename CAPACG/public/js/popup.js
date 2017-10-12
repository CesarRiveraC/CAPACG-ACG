var jq = $.noConflict();

jq(document).ready(main);

var contador = 1;

function main () {
   jq('.test-popup-link').magnificPopup({
    type: 'image'
 // other options
});
} 