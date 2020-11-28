"use strict";

jQuery(document).ready( function($) {
    /*
    *  MediaUploader functions
    */

    uploadMedia('#upload-button', '#banner-image', '#banner-picture');
    uploadMedia('#upload-favicon-button', '#value-favicon', '#favicon');
    uploadMedia('#upload-header-logo-button', '#value-header-logo', '#header-logo');
    uploadMedia('#upload-footer-logo-button', '#value-footer-logo', '#footer-logo');

    function uploadMedia( idClickButton, idAssignValueInputField, idChangePicture ){
        $( idClickButton ).on( 'click', function(e){
            var mediaUploader;
            e.preventDefault(); //security command
            if( mediaUploader ) {
                mediaUploader.open();
                return;
            }

            mediaUploader = wp.media.frames.file_frame = wp.media({
                multiple: false
            });

            mediaUploader.on('select', function() {
                attachment = mediaUploader.state().get('selection').first().toJSON();
                $( idAssignValueInputField ).val(attachment.url); // Присваиваем значение для поля input
                $( idChangePicture ).attr('src', attachment.url); // Меняем изображение в верстке
            });

            mediaUploader.open();
        });
    }


    /*
     * scripts
     */
    change_input_text( $('#banner-input-title'), $('#banner-title') );
    change_input_text( $('#banner-input-tagline'), $('#banner-slogan') );
    change_input_text( $('#banner-input-address'), $('.output-address') );
    change_input_text( $('#banner-input-prefix'), $('.output-pref') );
    change_input_text( $('#banner-input-phone-one'), $('.output-phone-one') );
    change_input_text( $('#banner-input-phone-two'), $('.output-phone-two') );
    change_input_text( $('#banner-input-mode'), $('.output-mode') );
    change_input_text( $('#footer-input-hour-mode'), $('#footer-hour-mode') );
    change_input_text( $('#footer-input-title'), $('.footer-title') );

    function change_input_text( inputText, changedContentField ){
        inputText.on('input', function() {
            var text = $( this ).val();
            changedContentField.text(text);
        });
    }
});