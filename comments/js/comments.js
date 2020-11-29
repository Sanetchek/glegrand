"use strict";

jQuery(document).ready( function($) {

    var addComment = {
        moveForm: function( commId, parentId, respondId, postId ) {
            var div, element, style, cssHidden,
                t           = this,
                comm        = t.I( commId ),
                respond     = t.I( respondId ),
                cancel      = t.I( 'cancel-comment-reply-link' ),
                parent      = t.I( 'comment_parent' ),
                post        = t.I( 'comment_post_ID' ),
                commentForm = respond.getElementsByTagName( 'form' )[0];

            if ( ! comm || ! respond || ! cancel || ! parent || ! commentForm ) {
                return;
            }

            t.respondId = respondId;
            postId = postId || false;

            if ( ! t.I( 'wp-temp-form-div' ) ) {
                div = document.createElement( 'div' );
                div.id = 'wp-temp-form-div';
                div = respond.cloneNode(true);
                div.style.display = '';
                respond.parentNode.insertBefore( div, respond );
            }

            comm.parentNode.insertBefore( respond, comm.nextSibling );
            if ( post && postId ) {
                post.value = postId;
            }
            parent.value = parentId;
            //cancel.style.display = '';

            cancel.onclick = function() {
                var t       = addComment,
                    temp    = t.I( 'wp-temp-form-div' ),
                    respond = t.I( t.respondId );

                if ( ! temp || ! respond ) {
                    return;
                }

                t.I( 'comment_parent' ).value = '0';
                temp.parentNode.insertBefore( respond, temp );
                temp.parentNode.removeChild( temp );
                this.style.display = 'none';
                this.onclick = null;
                return false;
            };

            /*
             * Set initial focus to the first form focusable element.
             * Try/catch used just to avoid errors in IE 7- which return visibility
             * 'inherit' when the visibility value is inherited from an ancestor.
             */
            try {
                for ( var i = 0; i < commentForm.elements.length; i++ ) {
                    element = commentForm.elements[i];
                    cssHidden = false;

                    // Modern browsers.
                    if ( 'getComputedStyle' in window ) {
                        style = window.getComputedStyle( element );
                        // IE 8.
                    } else if ( document.documentElement.currentStyle ) {
                        style = element.currentStyle;
                    }

                    /*
                     * For display none, do the same thing jQuery does. For visibility,
                     * check the element computed style since browsers are already doing
                     * the job for us. In fact, the visibility computed style is the actual
                     * computed value and already takes into account the element ancestors.
                     */
                    if ( ( element.offsetWidth <= 0 && element.offsetHeight <= 0 ) || style.visibility === 'hidden' ) {
                        cssHidden = true;
                    }

                    // Skip form elements that are hidden or disabled.
                    if ( 'hidden' === element.type || element.disabled || cssHidden ) {
                        continue;
                    }

                    element.focus();
                    // Stop after the first focusable element.
                    break;
                }

            } catch( er ) {}

            return false;
        },

        I: function( id ) {
            return document.getElementById( id );
        }
    }

    ///////////////////////////////////////////////

    var selectedSPAN;

    function showCommentForm(node) {
        selectedSPAN = node;
        if (selectedSPAN.className !== 'add-a-comment') { return; }
        if(selectedSPAN.nextElementSibling.style.display === "none") {
            selectedSPAN.nextElementSibling.style.display = "block";
            selectedSPAN.innerHTML = "Hide comments";
        } else {
            selectedSPAN.nextElementSibling.style.display = "none";
            selectedSPAN.innerHTML = "Show comments";
        }
    }

    document.body.onclick = function (event) {
        var target = event.target || event.srcElement;
        showCommentForm(target);
    };

    $(function ajaxComments() {

        $(function () {
            $('.comment-form').each(function () {
                // Объявляем переменные (форма и кнопка отправки)
                var form = $(this),
                    btn = form.find('.submit');

                // Добавляем каждому проверяемому полю, указание что поле пустое
                form.find('.required').addClass('empty_field');

                // Функция проверки полей формы
                function checkInput() {
                    form.find('.required').each(function () {
                        if ($(this).val() != '') {
                            // Если поле не пустое удаляем класс-указание
                            $(this).removeClass('empty_field');
                        } else {
                            // Если поле пустое добавляем класс-указание
                            $(this).addClass('empty_field');
                        }
                    });
                }

                // Функция подсветки незаполненных полей
                function lightEmpty() {
                    form.find('.empty_field').css({'border-color': '#d8512d'});
                    // Через полсекунды удаляем подсветку
                    setTimeout(function () {
                        form.find('.empty_field').removeAttr('style');
                    }, 500);
                }

                // Проверка в режиме реального времени
                setInterval(function () {
                    // Запускаем функцию проверки полей на заполненность
                    checkInput();
                    // Считаем к-во незаполненных полей
                    var sizeEmpty = form.find('.empty_field').size();
                    // Вешаем условие-тригер на кнопку отправки формы
                    if (sizeEmpty > 0) {
                        if (btn.hasClass('disabled')) {
                            return false
                        } else {
                            btn.addClass('disabled')
                        }
                    } else {
                        btn.removeClass('disabled')
                    }
                }, 500);

                // Событие клика по кнопке отправить
                btn.click(function () {
                    if ($(this).hasClass('disabled')) {
                        // подсвечиваем незаполненные поля и форму не отправляем, если есть незаполненные поля
                        lightEmpty();
                        return false;
                    }
                });
            });
        });


////////////////////////////////////////////////////////////////////////////
        $(function () {
            $('body').on('submit', '.comment-form', function (e) {
                // Stop the default form behavior
                e.preventDefault();
                var target = $(e.target);
                var targetParent = target.parents('.comment_form');
                var commentform = $(this);
                var action = commentform.attr('action');
                var inputs = commentform.serializeArray();
                var submitting_comment = target.find('.submitting-comment');

                // Submitting comment
                commentform.ajaxSubmit({
                    beforeSend: function () {
                        // Display the loading state
                        commentform.find('p').slideUp();
                        submitting_comment.show();
                    },
                    success: function (responseText, statusText, xhr, form) {
                        // Switch the existing comment area with the comment area returned from AJAX call
                        var cancel = $("#cancel-comment-reply-link");
                        if (cancel) {
                            cancel.click();
                        }

                        var page = $(responseText);
                        var comments = page.find('.commentlist');
                        targetParent.find('.commentlist').replaceWith(comments);

                        commentform.find('p').slideDown();
                        submitting_comment.hide();
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        // Translates the error code status into understandable error message
                        if (textStatus == 'error') {
                            var error_code = xhr.status;
                            if (error_code == 409) {
                                commentform.prepend('<div id="comment-status" >Duplicate comment detected; it looks as though you have already said that!</div>');
                            }
                            if (error_code == 429) {
                                commentform.prepend('<div id="comment-status" style="font-size: 12px;" >You are posting comments too quickly. Slow down.</div>');
                            }
                        }
                        // Unloading state
                        commentform.find('p').slideDown();
                        submitting_comment.hide();
                    },
                    clearForm: true,
                    url: action,
                    data: inputs
                });
                return false;
            })
        });
    });


});