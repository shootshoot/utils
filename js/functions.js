/**
 * Get a unique id
 */
function uID () { 
	return new Date().getTime();
}

/**
 * IIFE
 */
(function(w, d){
	
})(window, document)


/**
 * Better placeholder, need jquery
 * remove the placeholder when input or textarea has focus
 * restore the placeholder if the value is empty
 */
$('form input[type="text"], form textarea')
	.bind('focus', function(){
            if ($(this).val() == '') {
                $(this).attr('placeholder', '');
                $(this).prop('placeholder', '');
            }
        })
        .bind('focusout', function(){
            if ($(this).val() == '') {
                $(this).attr('placeholder', $(this).data('placeholder'));
                $(this).prop('placeholder', $(this).data('placeholder'));
            }
        })
;
