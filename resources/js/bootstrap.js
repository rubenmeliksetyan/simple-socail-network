window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('jquery-autocomplete')
    require('./common/social.js')
    require('./common/autocomplete')

} catch (e) {}

