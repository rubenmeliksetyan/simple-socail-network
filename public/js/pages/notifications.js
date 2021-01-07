/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/notifications.js":
/*!*********************************************!*\
  !*** ./resources/js/pages/notifications.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("social.NotificationPageManger = function (config) {\n  var _this = this;\n\n  _this.config = config || {};\n  _this.elements = this.config.elements || {};\n\n  _this._init();\n};\n\nsocial.NotificationPageManger.prototype = {\n  _init: function _init() {\n    var _this = this;\n\n    _this._initListeners();\n\n    _this._initElements();\n  },\n  _initListeners: function _initListeners() {\n    var _this = this;\n\n    var $messages = $('#messages');\n\n    _this.elements.pageContainer.find('.reject').on('click', function () {\n      var $this = $(this);\n      $.ajax({\n        url: $this.attr('data-url'),\n        type: \"POST\",\n        data: {\n          notification_id: $this.attr('data-notification-id')\n        }\n      }).done(function (response) {\n        $messages.removeClass('alert-danger');\n        $messages.addClass('alert-success'); // Set the message text.\n\n        $($messages).text(response.message);\n        $messages.show();\n        $this.closest('.user-notification-container').remove();\n      }).fail(function (data) {\n        $messages.removeClass('alert-success');\n        $messages.addClass('alert-danger'); // Set the message text.\n\n        if (data.responseText !== '') {\n          $($messages).text(data.responseText);\n        } else {\n          $($messages).text('Oops! An error occured and your message could not be sent.');\n        }\n\n        $messages.show();\n      });\n    });\n\n    _this.elements.pageContainer.find('.approve').on('click', function () {\n      var $this = $(this);\n      $.ajax({\n        url: $this.attr('data-url'),\n        type: \"POST\",\n        data: {\n          notification_id: $this.attr('data-notification-id')\n        }\n      }).done(function (response) {\n        $messages.removeClass('alert-danger');\n        $messages.addClass('alert-success'); // Set the message text.\n\n        $($messages).text(response.message);\n        $messages.show();\n        $this.closest('.user-notification-container').remove();\n      }).fail(function (data) {\n        $messages.removeClass('alert-success');\n        $messages.addClass('alert-danger'); // Set the message text.\n\n        if (data.responseText !== '') {\n          $($messages).text(data.responseText);\n        } else {\n          $($messages).text('Oops! An error occured and your message could not be sent.');\n        }\n\n        $messages.show();\n      });\n    });\n  },\n  _initElements: function _initElements() {}\n};//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcGFnZXMvbm90aWZpY2F0aW9ucy5qcz84YWFlIl0sIm5hbWVzIjpbInNvY2lhbCIsIk5vdGlmaWNhdGlvblBhZ2VNYW5nZXIiLCJjb25maWciLCJfdGhpcyIsImVsZW1lbnRzIiwiX2luaXQiLCJwcm90b3R5cGUiLCJfaW5pdExpc3RlbmVycyIsIl9pbml0RWxlbWVudHMiLCIkbWVzc2FnZXMiLCIkIiwicGFnZUNvbnRhaW5lciIsImZpbmQiLCJvbiIsIiR0aGlzIiwiYWpheCIsInVybCIsImF0dHIiLCJ0eXBlIiwiZGF0YSIsIm5vdGlmaWNhdGlvbl9pZCIsImRvbmUiLCJyZXNwb25zZSIsInJlbW92ZUNsYXNzIiwiYWRkQ2xhc3MiLCJ0ZXh0IiwibWVzc2FnZSIsInNob3ciLCJjbG9zZXN0IiwicmVtb3ZlIiwiZmFpbCIsInJlc3BvbnNlVGV4dCJdLCJtYXBwaW5ncyI6IkFBQUFBLE1BQU0sQ0FBQ0Msc0JBQVAsR0FBZ0MsVUFBVUMsTUFBVixFQUFrQjtBQUM5QyxNQUFNQyxLQUFLLEdBQUcsSUFBZDs7QUFDQUEsT0FBSyxDQUFDRCxNQUFOLEdBQWVBLE1BQU0sSUFBSSxFQUF6QjtBQUNBQyxPQUFLLENBQUNDLFFBQU4sR0FBaUIsS0FBS0YsTUFBTCxDQUFZRSxRQUFaLElBQXdCLEVBQXpDOztBQUNBRCxPQUFLLENBQUNFLEtBQU47QUFDSCxDQUxEOztBQU9BTCxNQUFNLENBQUNDLHNCQUFQLENBQThCSyxTQUE5QixHQUEwQztBQUN0Q0QsT0FBSyxFQUFFLGlCQUFZO0FBQ2YsUUFBTUYsS0FBSyxHQUFHLElBQWQ7O0FBQ0FBLFNBQUssQ0FBQ0ksY0FBTjs7QUFDQUosU0FBSyxDQUFDSyxhQUFOO0FBQ0gsR0FMcUM7QUFNdENELGdCQUFjLEVBQUUsMEJBQVk7QUFDeEIsUUFBTUosS0FBSyxHQUFHLElBQWQ7O0FBQ0EsUUFBTU0sU0FBUyxHQUFHQyxDQUFDLENBQUMsV0FBRCxDQUFuQjs7QUFDQVAsU0FBSyxD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QUFWO0FBQ0gsT0ExQkQ7QUEyQkgsS0E3QkQ7QUErQkgsR0F2RXFDO0FBd0V0Q25CLGVBQWEsRUFBRSx5QkFBWSxDQUUxQjtBQTFFcUMsQ0FBMUMiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcGFnZXMvbm90aWZpY2F0aW9ucy5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbInNvY2lhbC5Ob3RpZmljYXRpb25QYWdlTWFuZ2VyID0gZnVuY3Rpb24gKGNvbmZpZykge1xyXG4gICAgY29uc3QgX3RoaXMgPSB0aGlzO1xyXG4gICAgX3RoaXMuY29uZmlnID0gY29uZmlnIHx8IHt9O1xyXG4gICAgX3RoaXMuZWxlbWVudHMgPSB0aGlzLmNvbmZpZy5lbGVtZW50cyB8fCB7fTtcclxuICAgIF90aGlzLl9pbml0KCk7XHJcbn1cclxuXHJcbnNvY2lhbC5Ob3RpZmljYXRpb25QYWdlTWFuZ2VyLnByb3RvdHlwZSA9IHtcclxuICAgIF9pbml0OiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgY29uc3QgX3RoaXMgPSB0aGlzO1xyXG4gICAgICAgIF90aGlzLl9pbml0TGlzdGVuZXJzKCk7XHJcbiAgICAgICAgX3RoaXMuX2luaXRFbGVtZW50cygpO1xyXG4gICAgfSxcclxuICAgIF9pbml0TGlzdGVuZXJzOiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgY29uc3QgX3RoaXMgPSB0aGlzO1xyXG4gICAgICAgIGNvbnN0ICRtZXNzYWdlcyA9ICQoJyNtZXNzYWdlcycpXHJcbiAgICAgICAgX3RoaXMuZWxlbWVudHMucGFnZUNvbnRhaW5lci5maW5kKCcucmVqZWN0Jykub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICBsZXQgJHRoaXMgPSAkKHRoaXMpO1xyXG4gICAgICAgICAgICAkLmFqYXgoe1xyXG4gICAgICAgICAgICAgICAgdXJsOiAkdGhpcy5hdHRyKCdkYXRhLXVybCcpLFxyXG4gICAgICAgICAgICAgICAgdHlwZTogXCJQT1NUXCIsXHJcbiAgICAgICAgICAgICAgICBkYXRhOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgbm90aWZpY2F0aW9uX2lkOiAkdGhpcy5hdHRyKCdkYXRhLW5vdGlmaWNhdGlvbi1pZCcpXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH0pLmRvbmUoZnVuY3Rpb24ocmVzcG9uc2UpIHtcclxuXHJcbiAgICAgICAgICAgICAgICAkbWVzc2FnZXMucmVtb3ZlQ2xhc3MoJ2FsZXJ0LWRhbmdlcicpO1xyXG4gICAgICAgICAgICAgICAgJG1lc3NhZ2VzLmFkZENsYXNzKCdhbGVydC1zdWNjZXNzJyk7XHJcblxyXG4gICAgICAgICAgICAgICAgLy8gU2V0IHRoZSBtZXNzYWdlIHRleHQuXHJcbiAgICAgICAgICAgICAgICAkKCRtZXNzYWdlcykudGV4dChyZXNwb25zZS5tZXNzYWdlKTtcclxuICAgICAgICAgICAgICAgICRtZXNzYWdlcy5zaG93KCk7XHJcbiAgICAgICAgICAgICAgICAkdGhpcy5jbG9zZXN0KCcudXNlci1ub3RpZmljYXRpb24tY29udGFpbmVyJykucmVtb3ZlKClcclxuICAgICAgICAgICAgfSkuZmFpbChmdW5jdGlvbihkYXRhKSB7XHJcbiAgICAgICAgICAgICAgICAkbWVzc2FnZXMucmVtb3ZlQ2xhc3MoJ2FsZXJ0LXN1Y2Nlc3MnKTtcclxuICAgICAgICAgICAgICAgICRtZXNzYWdlcy5hZGRDbGFzcygnYWxlcnQtZGFuZ2VyJyk7XHJcblxyXG4gICAgICAgICAgICAgICAgLy8gU2V0IHRoZSBtZXNzYWdlIHRleHQuXHJcbiAgICAgICAgICAgICAgICBpZiAoZGF0YS5yZXNwb25zZVRleHQgIT09ICcnKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgJCgkbWVzc2FnZXMpLnRleHQoZGF0YS5yZXNwb25zZVRleHQpO1xyXG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgICAgICAkKCRtZXNzYWdlcykudGV4dCgnT29wcyEgQW4gZXJyb3Igb2NjdXJlZCBhbmQgeW91ciBtZXNzYWdlIGNvdWxkIG5vdCBiZSBzZW50LicpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgJG1lc3NhZ2VzLnNob3coKTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfSlcclxuXHJcbiAgICAgICAgX3RoaXMuZWxlbWVudHMucGFnZUNvbnRhaW5lci5maW5kKCcuYXBwcm92ZScpLm9uKCdjbGljaycsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgbGV0ICR0aGlzID0gJCh0aGlzKTtcclxuICAgICAgICAgICAgJC5hamF4KHtcclxuICAgICAgICAgICAgICAgIHVybDogJHRoaXMuYXR0cignZGF0YS11cmwnKSxcclxuICAgICAgICAgICAgICAgIHR5cGU6IFwiUE9TVFwiLFxyXG4gICAgICAgICAgICAgICAgZGF0YToge1xyXG4gICAgICAgICAgICAgICAgICAgIG5vdGlmaWNhdGlvbl9pZDogJHRoaXMuYXR0cignZGF0YS1ub3RpZmljYXRpb24taWQnKVxyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KS5kb25lKGZ1bmN0aW9uKHJlc3BvbnNlKSB7XHJcblxyXG4gICAgICAgICAgICAgICAgJG1lc3NhZ2VzLnJlbW92ZUNsYXNzKCdhbGVydC1kYW5nZXInKTtcclxuICAgICAgICAgICAgICAgICRtZXNzYWdlcy5hZGRDbGFzcygnYWxlcnQtc3VjY2VzcycpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8vIFNldCB0aGUgbWVzc2FnZSB0ZXh0LlxyXG4gICAgICAgICAgICAgICAgJCgkbWVzc2FnZXMpLnRleHQocmVzcG9uc2UubWVzc2FnZSk7XHJcbiAgICAgICAgICAgICAgICAkbWVzc2FnZXMuc2hvdygpO1xyXG4gICAgICAgICAgICAgICAgJHRoaXMuY2xvc2VzdCgnLnVzZXItbm90aWZpY2F0aW9uLWNvbnRhaW5lcicpLnJlbW92ZSgpXHJcbiAgICAgICAgICAgIH0pLmZhaWwoZnVuY3Rpb24oZGF0YSkge1xyXG4gICAgICAgICAgICAgICAgJG1lc3NhZ2VzLnJlbW92ZUNsYXNzKCdhbGVydC1zdWNjZXNzJyk7XHJcbiAgICAgICAgICAgICAgICAkbWVzc2FnZXMuYWRkQ2xhc3MoJ2FsZXJ0LWRhbmdlcicpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8vIFNldCB0aGUgbWVzc2FnZSB0ZXh0LlxyXG4gICAgICAgICAgICAgICAgaWYgKGRhdGEucmVzcG9uc2VUZXh0ICE9PSAnJykge1xyXG4gICAgICAgICAgICAgICAgICAgICQoJG1lc3NhZ2VzKS50ZXh0KGRhdGEucmVzcG9uc2VUZXh0KTtcclxuICAgICAgICAgICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICAgICAgICAgJCgkbWVzc2FnZXMpLnRleHQoJ09vcHMhIEFuIGVycm9yIG9jY3VyZWQgYW5kIHlvdXIgbWVzc2FnZSBjb3VsZCBub3QgYmUgc2VudC4nKTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICRtZXNzYWdlcy5zaG93KCk7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH0pXHJcblxyXG4gICAgfSxcclxuICAgIF9pbml0RWxlbWVudHM6IGZ1bmN0aW9uICgpIHtcclxuXHJcbiAgICB9XHJcbn0iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/pages/notifications.js\n");

/***/ }),

/***/ 2:
/*!***************************************************!*\
  !*** multi ./resources/js/pages/notifications.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\socialNetwork\resources\js\pages\notifications.js */"./resources/js/pages/notifications.js");


/***/ })

/******/ });