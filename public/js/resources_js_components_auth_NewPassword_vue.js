(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_auth_NewPassword_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/NewPassword.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/NewPassword.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************************/
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'pin-form',
  data: function data() {
    return {
      // Create a new form instance
      form: new Form({
        password: '',
        email: '',
        token: ''
      })
    };
  },
  mounted: function mounted() {},
  methods: {
    saveNewPassword: function saveNewPassword() {
      var _this = this;

      console.log(this.form, 'form');
      if (this.form.password == '') return;
      this.form.email = this.$route.query.test;
      this.form.token = this.$route.params.token; // Submit the form via a POST request

      this.form.post('/save/new-password').then(function (_ref) {
        var data = _ref.data;

        _this.$router.push({
          name: 'patients'
        });
      })["catch"](function (e) {
        return Toast.fire({
          icon: 'error',
          title: e.error_
        });
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/components/auth/NewPassword.vue":
/*!******************************************************!*\
  !*** ./resources/js/components/auth/NewPassword.vue ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _NewPassword_vue_vue_type_template_id_7d803ac2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./NewPassword.vue?vue&type=template&id=7d803ac2& */ "./resources/js/components/auth/NewPassword.vue?vue&type=template&id=7d803ac2&");
/* harmony import */ var _NewPassword_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NewPassword.vue?vue&type=script&lang=js& */ "./resources/js/components/auth/NewPassword.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _NewPassword_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _NewPassword_vue_vue_type_template_id_7d803ac2___WEBPACK_IMPORTED_MODULE_0__.render,
  _NewPassword_vue_vue_type_template_id_7d803ac2___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/auth/NewPassword.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/auth/NewPassword.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/auth/NewPassword.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NewPassword_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./NewPassword.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/NewPassword.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NewPassword_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/auth/NewPassword.vue?vue&type=template&id=7d803ac2&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/auth/NewPassword.vue?vue&type=template&id=7d803ac2& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NewPassword_vue_vue_type_template_id_7d803ac2___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NewPassword_vue_vue_type_template_id_7d803ac2___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NewPassword_vue_vue_type_template_id_7d803ac2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./NewPassword.vue?vue&type=template&id=7d803ac2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/NewPassword.vue?vue&type=template&id=7d803ac2&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/NewPassword.vue?vue&type=template&id=7d803ac2&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/NewPassword.vue?vue&type=template&id=7d803ac2& ***!
  \****************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "sauth" }, [
    _c("div", { staticClass: "wr" }, [
      _c("div", { staticClass: "auth" }, [
        _vm._m(0),
        _vm._v(" "),
        _c(
          "form",
          {
            staticStyle: { width: "100%" },
            on: {
              submit: function($event) {
                $event.preventDefault()
                return _vm.login($event)
              },
              keydown: function($event) {
                return _vm.form.onKeydown($event)
              }
            }
          },
          [
            _c("div", { staticClass: "inputs" }, [
              _c(
                "div",
                { staticClass: "input " },
                [
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.form.password,
                        expression: "form.password"
                      }
                    ],
                    class: { "is-invalid": _vm.form.errors.has("password") },
                    attrs: {
                      name: "email",
                      required: "",
                      type: "password",
                      placeholder: "Введіть новий пароль",
                      value: ""
                    },
                    domProps: { value: _vm.form.password },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.form, "password", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c("error-div", {
                    attrs: { form: _vm.form, field: "password" }
                  })
                ],
                1
              ),
              _vm._v(" "),
              _c("div", { staticClass: "button" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn-my",
                    attrs: { disabled: _vm.form.busy, type: "button" },
                    on: { click: _vm.saveNewPassword }
                  },
                  [_vm._v("Змінити")]
                )
              ])
            ])
          ]
        )
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "auth_head" }, [
      _c("div", { staticClass: "title" }, [_vm._v("Створення нового паролю")])
    ])
  }
]
render._withStripped = true



/***/ })

}]);