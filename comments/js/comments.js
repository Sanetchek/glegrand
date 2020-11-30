var addComment = {
    moveForm : function(commId, parentId, respondId, postId) {
        var t = this, div, comm = t.I(commId), respond = t.I(respondId), cancel = this.I('cancel-comment-reply-link'), parent = t.I('comment_parent'), post = t.I('comment_post_ID');

        if ( ! comm || ! respond || ! cancel || ! parent )
            return;

        t.respondId = respondId;
        postId = postId || false;

        if ( ! t.I('wp-temp-form-div') ) {
            div = document.createElement('div');
            div.id = 'wp-temp-form-div';
            div.style.display = 'none';
            respond.parentNode.insertBefore(div, respond);
        }

        comm.parentNode.insertBefore(respond, comm.nextSibling);
        if ( post && postId )
            post.value = postId;
        parent.value = parentId;
        cancel.style.display = '';

        cancel.onclick = function() {
            addComment.moveBack();
        }

        try { t.I('comment').focus(); }
        catch(e) {}

        return false;
    },

    I : function(e) {
        return document.getElementById(e);
    },

    moveBack : function() {
        var t = addComment, temp = t.I('wp-temp-form-div'), respond = t.I( t.respondId ), cancel = this.I('cancel-comment-reply-link');

        if ( ! temp || ! respond )
            return;

        t.I('comment_parent').value = '0';
        temp.parentNode.insertBefore(respond, temp);
        temp.parentNode.removeChild(temp);
        cancel.style.display = 'none';
        cancel.onclick = null;
        return false;
    }
}

'use strict';

//////////////////////////////////////////////////////

jQuery(document).ready(function ($){
    $(function ajaxComments() {
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



////////////////////////////////////////////////////////////////////////////

            $('body').on('submit', '.comment-form', function (e) {
                // Stop the default form behavior
                e.preventDefault();
                var target = $(e.target),
                    targetParent = target.parents('.comment_form'),
                    commentform = $(this),
                    action = commentform.attr('action'),
                    inputs = commentform.serializeArray(),
                    submitting_comment = target.find('.submitting-comment'),
                    temp = $('#wp-temp-form-div'),
                    respond = $( '#respond' ),
                    commList = $( '.commentlist' );

                // Submitting comment
                commentform.ajaxSubmit({
                    beforeSend: function () {
                        // Display the loading state
                        commentform.find('p').slideUp();
                        submitting_comment.show();
                    },
                    success: function (responseText, statusText, xhr, form) {
                        if ( ! temp || ! respond ) {
                            return;
                        } else {
                            respond.insertAfter( commList );
                        }

                        // Switch the existing comment area with the comment area returned from AJAX call


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
///////////////////////////////////////////////////////