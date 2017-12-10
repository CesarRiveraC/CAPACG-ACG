var jq = $.noConflict();

jq(document).ready(main);

var contador = 1;

function main() {
    jq('.ajax-popup-link').magnificPopup({
        type: 'ajax',
        // other options
        callbacks: {
            parseAjax: function (mfpResponse) {
                mfpResponse.data = $(mfpResponse.data).find('#pip');
                console.log('Ajax content loaded:', mfpResponse);
            },
            ajaxContentAdded: function () {
                console.log(this.content);
            }
        }
    });
}