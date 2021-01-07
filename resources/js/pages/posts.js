social.PostsPageManager = function (config) {
    const _this = this;
    _this.config = config || {};
    _this.elements = this.config.elements || {};
    _this._init();
}
social.PostsPageManager.prototype = {
    _init: function () {
        const _this = this;
        _this._initListeners();
    },

    _initListeners: function () {
        const _this = this;
        const $messages = $('#messages')
        _this.elements.postsContent.find('.delete-post').on('click', function () {
            let $this = $(this);
            $.ajax({
                url: $this.attr('data-url'),
                type: 'delete',

            }).done(function(response) {

                $messages.removeClass('alert-danger');
                $messages.addClass('alert-success');

                // Set the message text.
                $($messages).text(response.message);
                $messages.show();
                $this.closest('.post-container').remove()
            }).fail(function(data) {
                $messages.removeClass('alert-success');
                $messages.addClass('alert-danger');

                // Set the message text.
                if (data.responseText !== '') {
                    $($messages).text(data.responseText);
                } else {
                    $($messages).text('Oops! An error occured and your message could not be sent.');
                }
                $messages.show();
            });
        })

    }
}