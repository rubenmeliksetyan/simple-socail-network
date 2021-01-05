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
            $.ajax({
                url: _this.config.elements.pageContainer.find('.unfriend').attr('data-url'),
                method: "POST",
                /*success(response) {
                    alert(response.message)

                }*/
            }).done(function(response) {
                // Make sure that the formMessages div has the 'success' class.

                $messages.removeClass('alert-danger');
                $messages.addClass('alert-success');

                // Set the message text.
                $($messages).text(response.message);
                $messages.show();
            }).fail(function(data) {
                // Make sure that the formMessages div has the 'error' class.
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
            $.ajax({
                url: _this.config.elements.pageContainer.find('#send_friend_request_btn').attr('data-action'),
                method: "POST",
                success(response) {
                    alert(response.message)

                }
            })
        })
    },

}
