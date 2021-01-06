social.ProfilePageManger = function (config) {
    const _this = this;
    _this.config = config || {};
    _this.elements = this.config.elements || {};
    _this._init();
}

social.ProfilePageManger.prototype = {

    _init: function () {
        const _this = this;
        _this._initListeners();
    },

    _initListeners: function () {
        const _this = this;
        let $messages = $('#messages')
        _this.config.elements.pageContainer.find('.unfriend').click(function () {
            let $this = $(this)
            $.ajax({
                url: $this.attr('data-url'),
                method: "POST",

            }).done(function(response) {

                $messages.removeClass('alert-danger');
                $messages.addClass('alert-success');

                // Set the message text.
                $($messages).text(response.message);
                $messages.show();
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

        });

        _this.config.elements.pageContainer.find('#send_friend_request_btn').click(function () {
            let $this = $(this)
            $.ajax({
                url: $this.attr('data-action'),
                method: "POST",

            }).done(function(response) {

                $messages.removeClass('alert-danger');
                $messages.addClass('alert-success');

                // Set the message text.
                $($messages).text(response.message);
                $messages.show();
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
    },

}
