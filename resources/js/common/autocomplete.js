social.AutocompleteManger = function (config) {
    const _this = this;
    _this.config = config || {};
    _this.elements = this.config.elements || {};
    _this.urls = this.config.urls || {};
    _this._init();
}

social.AutocompleteManger.prototype = {

    _init: function () {
        const _this = this;
        _this._initListeners();
    },
    _initListeners: function () {
        const _this = this;

        _this.elements.autocompleteInput.on('keyup',function() {
            let query = $(this).val();
            $.ajax({

                url: _this.urls.searchUserURL,
                type:"GET",
                data:{'name':query},

                success:function (data) {

                    $('#users_list').html(data.output);
                }
            })
        });
        $(document).on('click', function(){

            _this.elements.usersList.html("");
        });


    },

}