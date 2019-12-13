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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var optionName = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'];
  var optDefaultCount = 5;
  createOptionHtml(0, optDefaultCount, optionName);

  function createOptionHtml() {
    var start = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
    var end = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 5;
    var optionName = arguments.length > 2 ? arguments[2] : undefined;

    if (start >= optionName.length) {
      Swal.fire({
        icon: 'error',
        title: 'Uyarı!',
        text: 'Ekleyebileceğiniz maksimum cevap sayısına ulaştınız.',
        confirmButtonText: 'Tamam'
      });
    } else {
      for (var i = start; i < end; i++) {
        $('#answerContent').append('<div id="answer-' + (i + 1) + '" class="row">' + '<div class="col-md-1 col-sm-1 ">' + '<label for="option-' + optionName[i] + '" class="option">' + optionName[i] + '</label></div>' + '<div class="col-md-9 col-sm-9 ml-0">' + '<textarea id="option-' + optionName[i] + '" name="option-' + optionName[i] + '" rows="2" data-min-rows="2" class="autoExpand quiz-text" ></textarea></div>' + '<div class="col-md-1 col-sm-1 mt-2">' + '<span  class="delete_button" rel="tooltip" data-placement="bottom" title="Seçeneği sil">' + '<i id="deleteOption-' + optionName[i] + '" onclick="deleteOption(' + (i + 1) + ')" class="material-icons ">delete_outline</i></span>\n' + '</div>' + '<div class="col-md-1 col-sm-1">' + '<div class="form-check">' + '<label class="form-check-label">' + '<input class="form-check-input" type="checkbox" onclick="rightChoice()"  id="' + optionName[i] + '"  value="' + optionName[i] + '">' + '<span class="form-check-sign">' + '<span class="check"></span>' + '</span>' + '</label>' + '</div>' + '</div>' + '</div>');
      }
    }
  }

  $('#addOptionBtn').on('click', function () {
    var count = 0;

    while (true) {
      var temp = $('#answer-' + (count + 1)).html();

      if (temp === undefined) {
        break;
      } else {
        count++;
      }
    }

    createOptionHtml(count, count + 1, optionName);
  });
});
$(document).one('focus.autoExpand', 'textarea.autoExpand', function () {
  var savedValue = this.value;
  this.value = '';
  this.baseScrollHeight = this.scrollHeight;
  this.value = savedValue;
}).on('input.autoExpand', 'textarea.autoExpand', function () {
  var minRows = this.getAttribute('data-min-rows') | 0,
      rows;
  this.rows = minRows;
  rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
  this.rows = minRows + rows;
});

function rightChoice() {
  $(".form-check-input").change(function () {
    if (this.checked === true) {
      var idName = 'option-' + $(this).attr('id');
      $("label[for='" + idName + "']").removeClass('option');
      $("label[for='" + idName + "']").addClass('selected-option');
      $("#" + idName).removeClass('quiz-text');
      $("#" + idName).addClass('selected-quiz-text');
      console.log(idName);
    } else if (this.checked === false) {
      var idName = 'option-' + $(this).attr('id');
      $("label[for='" + idName + "']").removeClass('selected-option');
      $("label[for='" + idName + "']").addClass('option');
      $("#" + idName).removeClass('selected-quiz-text');
      $("#" + idName).addClass('quiz-text');
    }
  });
}

function deleteOption(index) {
  var indis = parseInt(index);
  var optionName = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'];
  var count = 0;

  while (true) {
    var temp = $('#answer-' + (count + 1)).html();

    if (temp === undefined) {
      break;
    } else {
      count++;
    }
  }

  $('#answer-' + indis).remove();

  for (var i = indis; i < count; i++) {
    $("label[for=option-" + optionName[i] + "]").attr('for', 'option-' + optionName[i - 1]);
    $("label[for=option-" + optionName[i - 1] + "]").text(optionName[i - 1]);
    $('#option-' + optionName[i]).attr({
      id: "option-" + optionName[i - 1],
      name: "option-" + optionName[i - 1]
    });
    $('#deleteOption-' + optionName[i]).attr({
      id: "deleteOption-" + optionName[i - 1],
      onclick: "deleteOption(" + i + ")"
    });
    $('#answer-' + (i + 1)).attr({
      id: "#answer-" + i
    });
    console.log(i);
  }
}

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\working\laravel\senedu\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\working\laravel\senedu\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });