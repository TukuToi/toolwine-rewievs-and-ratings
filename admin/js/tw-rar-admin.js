(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$( document ).on( 'click', '#tw_rar_insert_fields_id', function( e ) {
        e.preventDefault();
        var output = 	`
<!-- Rename the labels as you like. Remove fields as you like. Add Fields as you like -->
<!-- This form may hold as well other fields --> \n
    <!-- An exaple rating field --> \n
	<label>rating1</label>\n
	<fieldset class="starability-basic">\n
		<input type="radio" id="no-rate" class="input-no-rate" name="rate1" value="0" aria-label="No rating." />\n
		<input type="radio" id="rating1-rate1" name="rate1" value="1" />\n
		<label for="rating1-rate1" title=""></label>\n
		<input type="radio" id="rating1-rate2" name="rate1" value="2" />\n
		<label for="rating1-rate2" title=""></label>\n
		<input type="radio" id="rating1-rate3" name="rate1" value="3" />\n
		<label for="rating1-rate3" title=""></label>\n
		<input type="radio" id="rating1-rate4" name="rate1" value="4" />\n
		<label for="rating1-rate4" title=""></label>\n
		<input type="radio" id="rating1-rate5" name="rate1" value="5" checked/>\n
		<label for="rating1-rate5" title=""></label>\n
	</fieldset>\n
	<!-- Another exaple rating field --> \n
	<label>rating2</label>\n
	<fieldset class="starability-basic">\n
		<input type="radio" id="no-rate" class="input-no-rate" name="rate2" value="0" aria-label="No rating." />\n
		<input type="radio" id="rating2-rate1" name="rate2" value="1" />\n
		<label for="rating2-rate1" title=""></label>\n
		<input type="radio" id="rating2-rate2" name="rate2" value="2" />\n
		<label for="rating2-rate2" title=""></label>\n
		<input type="radio" id="rating2-rate3" name="rate2" value="3" />\n
		<label for="rating2-rate3" title=""></label>\n
		<input type="radio" id="rating2-rate4" name="rate2" value="4" />\n
		<label for="rating2-rate4" title=""></label>\n
		<input type="radio" id="rating2-rate5" name="rate2" value="5" checked/>\n
		<label for="rating2-rate5" title=""></label>\n
	</fieldset>\n
	<!-- Insert more fields like above shown according your registerd rating fields... --> \n
	<!-- This is a special field the Plugin supports, to store a single "Recommend" rating... --> \n
	<label>rating_racc</label>\n
	<fieldset class="starability-basic">\n
		<input type="radio" id="no-rate" class="input-no-rate" name="rate_racc" value="0" aria-label="No rating." />\n
		<input type="radio" id="rating_racc-rate1" name="rate_racc" value="1" />\n
		<label for="rating_racc-rate1" title=""></label>\n
		<input type="radio" id="rating_racc-rate2" name="rate_racc" value="2" />\n
		<label for="rating_racc-rate2" title=""></label>\n
		<input type="radio" id="rating_racc-rate3" name="rate_racc" value="3" />\n
		<label for="rating_racc-rate3" title=""></label>\n
		<input type="radio" id="rating_racc-rate4" name="rate_racc" value="4" />\n
		<label for="rating_racc-rate4" title=""></label>\n
		<input type="radio" id="rating_racc-rate5" name="rate_racc" value="5" checked/>\n
		<label for="rating_racc-rate5" title=""></label>\n
	</fieldset>
	<!-- End of special field to store a single "Recommend" rating... --> \n
<!-- End of the Rating Fields. Remember you can add as many fields as you have registered... --> \n
	`;
	    icl_editor.insert( output )
        
    });

	
})( jQuery );
