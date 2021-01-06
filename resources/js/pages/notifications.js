social.NotificationPageManger = function (config) {
    const _this = this;
    _this.config = config || {};
    _this.elements = this.config.elements || {};
    _this._init();
}

social.NotificationPageManger.prototype = {
    _init: function () {
        const _this = this;
        _this._initListeners();
        _this._initElements();
    },
    _initListeners: function () {
        const _this = this;
        const $messages = $('#messages')
        _this.elements.pageContainer.find('.reject').on('click', function () {
            let $this = $(this);
            $.ajax({
                url: $this.attr('data-url'),
                type: "POST",
                data: {
                    notification_id: $this.attr('data-notification-id')
                }
            }).done(function(response) {

                $messages.removeClass('alert-danger');
                $messages.addClass('alert-success');

                // Set the message text.
                $($messages).text(response.message);
                $messages.show();
                $this.closest('.user-notification-container').remove()
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

        _this.elements.pageContainer.find('.approve').on('click', function () {
            let $this = $(this);
            $.ajax({
                url: $this.attr('data-url'),
                type: "POST",
                data: {
                    notification_id: $this.attr('data-notification-id')
                }
            }).done(function(response) {

                $messages.removeClass('alert-danger');
                $messages.addClass('alert-success');

                // Set the message text.
                $($messages).text(response.message);
                $messages.show();
                $this.closest('.user-notification-container').remove()
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
    _initElements: function () {

    }
}