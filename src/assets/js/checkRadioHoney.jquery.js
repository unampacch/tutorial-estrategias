// the semi-colon before function invocation is a safety net against concatenated
// scripts and/or other plugins which may not be closed properly.
;( function( $, window, document, undefined ) {

	"use strict";

		// undefined is used here as the undefined global variable in ECMAScript 3 is
		// mutable (ie. it can be changed by someone else). undefined isn't really being
		// passed in so we can ensure the value of it is truly undefined. In ES5, undefined
		// can no longer be modified.

		// window and document are passed through as local variables rather than global
		// as this (slightly) quickens the resolution process and can be more efficiently
		// minified (especially when both are regularly referenced in your plugin).

		// Create the defaults once
		var pluginName = "checkRadioHoney",
			defaults = {
				propertyName: "value",
			};

		// The actual plugin constructor
		function Plugin ( element, options ) {
			this.element = element;

			// jQuery has an extend method which merges the contents of two or
			// more objects, storing the result in the first object. The first object
			// is generally empty as we don't want to alter the default options for
			// future instances of the plugin
			this.settings = $.extend( {}, defaults, options );
			this._defaults = defaults;
			this._name = pluginName;
			this.init();
		}

		// Avoid Plugin.prototype conflicts
		$.extend( Plugin.prototype, {
			init: function() {

				// Place initialization logic here
				// You already have access to the DOM element and
				// the options via the instance, e.g. this.element
				// and this.settings
				// you can add more functions like the one below and
				// call them like the example below
				//this.yourOtherFunction( "jQuery Boilerplate" );

                var elementos = $(".pagina", this.element);
                var ultimo    = elementos.hide().first().fadeIn(300);
                var terminar  = $("#terminar", this.element).hide();
                var progress  = $(".progress-bar");
                var avanceCuest = 12.5;
                var contador = 1;

                progress.css('width', avanceCuest + '%');


                $("#avanzar",this.element).on( "click", function() {

                    var nradios = ($("[type=radio]", ultimo ).length) / 2;
                    var nradiosCheck = $("[type=radio]:checked", ultimo).length;

                    if(nradios == nradiosCheck){
                        ultimo.hide();
                        ultimo = ultimo.next().fadeIn(300);
                        contador++;
                        avanceCuest = avanceCuest + 12.5;
                        progress.css('width', avanceCuest + '%');

                        if(contador == 8){
                            $(this).hide();
                            terminar.show();
                        }
                    }else{
                        $('#HoneyError').modal('show');
                    }
                });

                $(this.element).on( "submit", function(event){
                    event.preventDefault();

                    var datastring = $("#preview_form").serialize();
                    $.ajax({
                       type: "PUT",
                       url: "/bloques/aprender/cuestionario-honey-alonso",
                       data: $(this.element).serialize(),
                       /*success: function(data) {
                            alert('Data send');
                       }*/
                    }).done(function () {
                        console.log('SUCCESS');
                    }).fail(function (msg) {
                        console.log('FAIL');
                    }).always(function (msg) {
                        console.log('ALWAYS');
                    });
                });

			},
            getRadioButton: function(element) {
                var name = $(element).attr("name");
                return $("[type=radio]", element).length;
            },
            getRadioButtonChecked: function(element) {
                var name = $(element).attr("name");
                return $("[type=radio]:checked", element).length;
            },
			yourOtherFunction: function( text ) {
				// some logic
				$( this.element ).text( text );
			}
		} );

		// A really lightweight plugin wrapper around the constructor,
		// preventing against multiple instantiations
		$.fn[ pluginName ] = function( options ) {
			return this.each( function() {
				if ( !$.data( this, "plugin_" + pluginName ) ) {
					$.data( this, "plugin_" +
						pluginName, new Plugin( this, options ) );
				}
			} );
		};

} )( jQuery, window, document );
