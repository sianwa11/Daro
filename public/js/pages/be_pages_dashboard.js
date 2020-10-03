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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/be_pages_dashboard.js":
/*!**************************************************!*\
  !*** ./resources/js/pages/be_pages_dashboard.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/*
 *  Document   : be_pages_dashboard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Dashboard Page
 */
var BePagesDashboard = /*#__PURE__*/function () {
  function BePagesDashboard() {
    _classCallCheck(this, BePagesDashboard);
  }

  _createClass(BePagesDashboard, null, [{
    key: "initDashboardChartJS",

    /*
     * Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
     *
     */
    value: function initDashboardChartJS() {
      // Set Global Chart.js configuration
      Chart.defaults.global.defaultFontColor = '#555555';
      Chart.defaults.scale.gridLines.color = "transparent";
      Chart.defaults.scale.gridLines.zeroLineColor = "transparent";
      Chart.defaults.scale.display = false;
      Chart.defaults.scale.ticks.beginAtZero = true;
      Chart.defaults.global.elements.line.borderWidth = 2;
      Chart.defaults.global.elements.point.radius = 5;
      Chart.defaults.global.elements.point.hoverRadius = 7;
      Chart.defaults.global.tooltips.cornerRadius = 3;
      Chart.defaults.global.legend.display = false; // Chart Containers

      var chartDashboardLinesCon = jQuery('.js-chartjs-dashboard-lines');
      var chartDashboardLinesCon2 = jQuery('.js-chartjs-dashboard-lines2'); // Chart Variables

      var chartDashboardLines, chartDashboardLines2; // Lines Charts Data

      var chartDashboardLinesData = {
        labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
        datasets: [{
          label: 'This Week',
          fill: true,
          backgroundColor: 'rgba(66,165,245,.45)',
          borderColor: 'rgba(66,165,245,1)',
          pointBackgroundColor: 'rgba(66,165,245,1)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(66,165,245,1)',
          data: [25, 21, 23, 38, 36, 35, 39]
        }]
      };
      var chartDashboardLinesOptions = {
        scales: {
          yAxes: [{
            ticks: {
              suggestedMax: 50
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function label(tooltipItems, data) {
              return ' ' + tooltipItems.yLabel + ' Sales';
            }
          }
        }
      };
      var chartDashboardLinesData2 = {
        labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
        datasets: [{
          label: 'This Week',
          fill: true,
          backgroundColor: 'rgba(156,204,101,.45)',
          borderColor: 'rgba(156,204,101,1)',
          pointBackgroundColor: 'rgba(156,204,101,1)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(156,204,101,1)',
          data: [190, 219, 235, 320, 360, 354, 390]
        }]
      };
      var chartDashboardLinesOptions2 = {
        scales: {
          yAxes: [{
            ticks: {
              suggestedMax: 480
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function label(tooltipItems, data) {
              return ' $ ' + tooltipItems.yLabel;
            }
          }
        }
      }; // Init Charts

      if (chartDashboardLinesCon.length) {
        chartDashboardLines = new Chart(chartDashboardLinesCon, {
          type: 'line',
          data: chartDashboardLinesData,
          options: chartDashboardLinesOptions
        });
      }

      if (chartDashboardLinesCon2.length) {
        chartDashboardLines2 = new Chart(chartDashboardLinesCon2, {
          type: 'line',
          data: chartDashboardLinesData2,
          options: chartDashboardLinesOptions2
        });
      }
    }
    /*
     * Init Onboarding modal
     *
     */

  }, {
    key: "initOnboardingModal",
    value: function initOnboardingModal() {
      // Show Onboarding Modal by default
      jQuery('#modal-onboarding').modal('show'); // Re-init Slick Slider every time the modal is shown

      jQuery('#modal-onboarding').on('shown.bs.modal', function (e) {
        // Remove enabled class added by the helper to prevent re-init
        jQuery('js-slider', '#modal-onboarding').removeClass('js-slider-enabled'); // Re-init Slick Slider

        Codebase.helpers('slick');
      });
    }
    /*
     * Init functionality
     *
     */

  }, {
    key: "init",
    value: function init() {
      this.initDashboardChartJS();
      this.initOnboardingModal();
    }
  }]);

  return BePagesDashboard;
}(); // Initialize when page loads


jQuery(function () {
  BePagesDashboard.init();
});

/***/ }),

/***/ 3:
/*!********************************************************!*\
  !*** multi ./resources/js/pages/be_pages_dashboard.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\ISP2\Daro\resources\js\pages\be_pages_dashboard.js */"./resources/js/pages/be_pages_dashboard.js");


/***/ })

/******/ });