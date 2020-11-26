jQuery(document).ready( function($) {
    /*
    *  MediaUploader functions
    */
    var mediaUploader;

    $( '#upload-button' ).on( 'click', function(e){
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
            $( '#banner-image' ).val(attachment.url); // Присваиваем значение для поля input
            $( '#banner-picture' ).attr('src', attachment.url);
        });

        mediaUploader.open();
    });

    /*
     * scripts
     */
    change_input_text( $('#banner-input-title'), $('#banner-title') );
    change_input_text( $('#banner-input-tagline'), $('#banner-slogan') );
    change_input_text( $('#banner-input-address'), $('#banner-address') );
    change_input_text( $('#banner-input-prefix'), $('#banner-pref') );
    change_input_text( $('#banner-input-phone-one'), $('#banner-phone-one') );
    change_input_text( $('#banner-input-phone-two'), $('#banner-phone-two') );
    change_input_text( $('#banner-input-mode'), $('#banner-mode') );

    function change_input_text( inputText, changedContentField ){
        inputText.on('input', function() {
            var text = $( this ).val();
            changedContentField.text(text);
        });
    }
});