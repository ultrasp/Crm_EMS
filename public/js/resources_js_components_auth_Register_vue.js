(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_auth_Register_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Register.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Register.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************************************/
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
      form: new Form({
        nickname: '',
        name: '',
        surname: '',
        phone: '',
        email: '',
        password: '',
        specialization: '',
        remember: false
      }),
      specList: []
    };
  },
  mounted: function mounted() {
    console.log('Register mounted.');
    this.setSpecList();
  },
  methods: {
    register: function register() {
      var _this = this;

      // Submit the form via a POST request
      this.form.post('/register').then(function (_ref) {
        var data = _ref.data;
        console.log(data);

        if (data.success == 1) {
          console.log('asas');

          _this.$router.push({
            name: 'pin-code'
          });
        }

        console.log(data);
      });
    },
    setSpecList: function setSpecList() {
      this.specList = [{
        id: 1,
        value: 'Стоматологія'
      }, {
        id: 2,
        value: 'Офтальмологія'
      }];
    }
  }
});

/***/ }),

/***/ "./resources/js/components/auth/Register.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/auth/Register.vue ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Register_vue_vue_type_template_id_d4f9cbe2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Register.vue?vue&type=template&id=d4f9cbe2& */ "./resources/js/components/auth/Register.vue?vue&type=template&id=d4f9cbe2&");
/* harmony import */ var _Register_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Register.vue?vue&type=script&lang=js& */ "./resources/js/components/auth/Register.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Register_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Register_vue_vue_type_template_id_d4f9cbe2___WEBPACK_IMPORTED_MODULE_0__.render,
  _Register_vue_vue_type_template_id_d4f9cbe2___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/auth/Register.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/auth/Register.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/auth/Register.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Register.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Register.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/auth/Register.vue?vue&type=template&id=d4f9cbe2&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/auth/Register.vue?vue&type=template&id=d4f9cbe2& ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_template_id_d4f9cbe2___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_template_id_d4f9cbe2___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Register_vue_vue_type_template_id_d4f9cbe2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Register.vue?vue&type=template&id=d4f9cbe2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Register.vue?vue&type=template&id=d4f9cbe2&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Register.vue?vue&type=template&id=d4f9cbe2&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/auth/Register.vue?vue&type=template&id=d4f9cbe2& ***!
  \*************************************************************************************************************************************************************************************************************************/
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
  return _c("div", [
    _vm._m(0),
    _vm._v(" "),
    _c("div", { staticClass: "sauth" }, [
      _c("div", { staticClass: "wr" }, [
        _c("div", { staticClass: "auth auth-signup" }, [
          _vm._m(1),
          _vm._v(" "),
          _c("div", { staticClass: "inputs" }, [
            _c(
              "form",
              {
                staticStyle: { width: "100%" },
                on: {
                  submit: function($event) {
                    $event.preventDefault()
                    return _vm.register($event)
                  },
                  keydown: function($event) {
                    return _vm.form.onKeydown($event)
                  }
                }
              },
              [
                _c(
                  "div",
                  { staticClass: "input  " },
                  [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.nickname,
                          expression: "form.nickname"
                        }
                      ],
                      class: { "is-invalid": _vm.form.errors.has("nickname") },
                      attrs: {
                        type: "text",
                        placeholder: "Прізвище",
                        value: ""
                      },
                      domProps: { value: _vm.form.nickname },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "nickname", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("error-div", {
                      attrs: { form: _vm.form, field: "nickname" }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "input  " },
                  [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.name,
                          expression: "form.name"
                        }
                      ],
                      attrs: {
                        type: "text",
                        name: "",
                        placeholder: "Ім’я",
                        value: ""
                      },
                      domProps: { value: _vm.form.name },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "name", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("error-div", {
                      attrs: { form: _vm.form, field: "name" }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "input  " },
                  [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.surname,
                          expression: "form.surname"
                        }
                      ],
                      attrs: {
                        type: "text",
                        name: "",
                        placeholder: "По-батькові",
                        value: ""
                      },
                      domProps: { value: _vm.form.surname },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "surname", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("error-div", {
                      attrs: { form: _vm.form, field: "surname" }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "input  " },
                  [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.phone,
                          expression: "form.phone"
                        }
                      ],
                      attrs: {
                        type: "tel",
                        name: "",
                        placeholder: "Телефон",
                        value: ""
                      },
                      domProps: { value: _vm.form.phone },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "phone", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("error-div", {
                      attrs: { form: _vm.form, field: "phone" }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "input  full" },
                  [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.email,
                          expression: "form.email"
                        }
                      ],
                      attrs: {
                        type: "email",
                        name: "email",
                        placeholder: "Email",
                        value: "i.bionic.office@gmail.com"
                      },
                      domProps: { value: _vm.form.email },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "email", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("error-div", {
                      attrs: { form: _vm.form, field: "email" }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "input  full" },
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
                      attrs: {
                        type: "password",
                        name: "",
                        placeholder: "Пароль",
                        value: "i.bionic.office@gmail.com"
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
                _c(
                  "div",
                  { staticClass: "input  full" },
                  [
                    _c(
                      "select",
                      {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.form.specialization,
                            expression: "form.specialization"
                          }
                        ],
                        on: {
                          change: function($event) {
                            var $$selectedVal = Array.prototype.filter
                              .call($event.target.options, function(o) {
                                return o.selected
                              })
                              .map(function(o) {
                                var val = "_value" in o ? o._value : o.value
                                return val
                              })
                            _vm.$set(
                              _vm.form,
                              "specialization",
                              $event.target.multiple
                                ? $$selectedVal
                                : $$selectedVal[0]
                            )
                          }
                        }
                      },
                      [
                        _c("option", { attrs: { value: "" } }, [
                          _vm._v("Оберіть спеціалізацію")
                        ]),
                        _vm._v(" "),
                        _vm._l(_vm.specList, function(item) {
                          return _c(
                            "option",
                            { domProps: { value: item.id } },
                            [_vm._v(_vm._s(item.value))]
                          )
                        })
                      ],
                      2
                    ),
                    _vm._v(" "),
                    _c("error-div", {
                      attrs: { form: _vm.form, field: "specialization" }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c("div", { staticClass: "button" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn-my btn-blue",
                      attrs: { disabled: _vm.form.busy, type: "submit" }
                    },
                    [_vm._v("Створити профіль")]
                  )
                ])
              ]
            ),
            _vm._v(" "),
            _vm._m(2)
          ])
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "container" }, [
      _c(
        "div",
        { staticClass: "alert alert-danger", attrs: { role: "alert" } },
        [
          _vm._v("\r\n            После регистрации отправлять сообщение "),
          _c("br"),
          _vm._v(
            "\r\n            https://codeseven.github.io/toastr/demo.html "
          ),
          _c("br"),
          _vm._v(
            "\r\n            Такие уведомление сделать на всех страницах системы, но можно также использовать из коробки для vue.js другую подобную библиотеку для уведомлений\r\n            "
          ),
          _c("br"),
          _vm._v(
            "\r\n            После регистрации Отображать уведомление чтобы перейти на почту и подтвердить почту\r\n        "
          )
        ]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "auth_head" }, [
      _c("div", { staticClass: "title" }, [_vm._v("Реєстрація")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "links" }, [
      _c("a", { attrs: { href: "/login" } }, [_vm._v("Вже заєстровані?")])
    ])
  }
]
render._withStripped = true



/***/ })

}]);