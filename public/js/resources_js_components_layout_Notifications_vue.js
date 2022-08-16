(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_layout_Notifications_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/layout/Notifications.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/layout/Notifications.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      // Create a new form instance
      notifications: [],
      total: 0
    };
  },
  mounted: function mounted() {
    var _this = this;

    if (!this.$gate.isDoctor()) setInterval(function () {
      _this.getNotifications();
    }, 60000); // this.getNotifications();
  },
  methods: {
    getNotifications: function getNotifications() {
      var _this2 = this;

      return axios.get('/notifications').then(function (res) {
        _this2.notifications = res.data.notifications;
        _this2.total = res.data.total;
      });
    },
    markRead: function markRead(notify, index) {
      var _this3 = this;

      return axios.post('/notification/read', {
        id: notify.id
      }).then(function (res) {
        _this3.notifications.splice(index, 1);

        Toast.fire({
          icon: 'success',
          title: res.data.message
        });
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/components/layout/Notifications.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/layout/Notifications.vue ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Notifications_vue_vue_type_template_id_24e935ee___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Notifications.vue?vue&type=template&id=24e935ee& */ "./resources/js/components/layout/Notifications.vue?vue&type=template&id=24e935ee&");
/* harmony import */ var _Notifications_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Notifications.vue?vue&type=script&lang=js& */ "./resources/js/components/layout/Notifications.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Notifications_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Notifications_vue_vue_type_template_id_24e935ee___WEBPACK_IMPORTED_MODULE_0__.render,
  _Notifications_vue_vue_type_template_id_24e935ee___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/layout/Notifications.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/layout/Notifications.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/layout/Notifications.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Notifications_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Notifications.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/layout/Notifications.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Notifications_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/layout/Notifications.vue?vue&type=template&id=24e935ee&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/layout/Notifications.vue?vue&type=template&id=24e935ee& ***!
  \*****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Notifications_vue_vue_type_template_id_24e935ee___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Notifications_vue_vue_type_template_id_24e935ee___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Notifications_vue_vue_type_template_id_24e935ee___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Notifications.vue?vue&type=template&id=24e935ee& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/layout/Notifications.vue?vue&type=template&id=24e935ee&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/layout/Notifications.vue?vue&type=template&id=24e935ee&":
/*!********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/layout/Notifications.vue?vue&type=template&id=24e935ee& ***!
  \********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container container-settings" }, [
    _c("div", { staticClass: "row" }, [
      _c(
        "div",
        { staticClass: "col-12" },
        _vm._l(_vm.notifications, function(notify, index) {
          return _c(
            "div",
            {
              staticClass: "alert alert-warning d-flex",
              attrs: { role: "alert" }
            },
            [
              (notify.ds = "App\\Notifications\\ZipFileReady")
                ? _c("div", [
                    _vm._v(
                      "\n                    " +
                        _vm._s(_vm._f("myDate")(notify.created_at)) +
                        " Процес формування архіву може заняти певний час.\n                    "
                    ),
                    _c(
                      "a",
                      {
                        staticStyle: { color: "red" },
                        attrs: { href: notify.data["link"], target: "_blank" }
                      },
                      [_vm._v("Натисніть щоб завантажити")]
                    ),
                    _vm._v(".\n                    "),
                    _c("br"),
                    _vm._v(
                      "\n                    Після завантаження файл буде видалено.\n                "
                    )
                  ])
                : _c("div", [
                    _vm._v(
                      "\n                    " +
                        _vm._s(_vm._f("myDate")(notify.created_at)) +
                        " В користувача " +
                        _vm._s(notify.data["name"]) +
                        " (" +
                        _vm._s(notify.data["email"]) +
                        ") доступ закінчується через " +
                        _vm._s(notify.data["days"]) +
                        " днів.\n                "
                    )
                  ]),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: " mark-as-read pl-3 ml-auto",
                  staticStyle: { cursor: "pointer", color: "#3d5c9f" },
                  on: {
                    click: function($event) {
                      return _vm.markRead(notify, index)
                    }
                  }
                },
                [
                  _vm._v(
                    "\n                    Помітити, як прочитане\n                "
                  )
                ]
              )
            ]
          )
        }),
        0
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);