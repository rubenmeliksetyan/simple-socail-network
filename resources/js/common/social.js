window.social = window.social || {};

social.configXHR = function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function(jqXHR, exception) {
            if (jqXHR && jqXHR.responseText) {
                try {
                    const response = JSON.parse(jqXHR.responseText);
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                } catch (e) {
                }
            }
        }
    });
};
(function () {
    social.configXHR();
})()
