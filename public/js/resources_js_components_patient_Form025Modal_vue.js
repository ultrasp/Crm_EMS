(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_patient_Form025Modal_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/patient/Form025Modal.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/patient/Form025Modal.vue?vue&type=script&lang=js& ***!
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
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: ["patientId", "showModal", "pageNum", "info"],
  data: function data() {
    return {
      toggleModal: this.showModal,
      form: new Form({
        patientId: '',
        pageNum: '',
        skargi: '',
        anamnez: '',
        visus_od: '',
        visus_od_kop: '',
        visus_od_cyl: '',
        visus_od_ax: '',
        visus_od_equal: '',
        visus_od_konyuktiv: '',
        visus_od_rogivka: '',
        visus_od_krishtalik: '',
        visus_od_sklo: '',
        visus_od_ochne: '',
        visus_od_keratot: '',
        visus_od_refrakt: '',
        visus_os: '',
        visus_os_sph: '',
        visus_os_cyl: '',
        visus_os_ax: '',
        visus_os_equal: '',
        visus_os_konyuktiv: '',
        visus_os_rogivka: '',
        visus_os_krishtalik: '',
        visus_os_sklo: '',
        visus_os_ochne: '',
        visus_os_keratot: '',
        visus_os_refrakt: '',
        diagnoz: '',
        priznan: '',
        rekomend: ''
      })
    };
  },
  mounted: function mounted() {// this.getDoctors();
    // this.getSelectedDoctors();
  },
  methods: {
    fillData: function fillData() {
      var _this = this;

      axios.post('/patient/getConclution', {
        patientId: this.patientId,
        pageNum: this.pageNum
      }).then(function (res) {
        if (res.data.conclution != null) _this.form.fill(res.data.conclution);
        $("#consultFrame").attr('src', '/patients/consult/print/' + _this.patientId + '/' + _this.pageNum);
      })["catch"](function (error) {
        Swal.fire('Помилка при отримані даних!', null, 'error');
      });
    },
    isHasData: function isHasData(data) {
      var found = Object.keys(data).filter(function (key) {
        if (!['patientId', 'pageNum'].includes(key)) {
          // console.log(key,data[key],'data[key]');
          return data[key] != null && data[key] != '';
        }
      });
      return found.length > 0;
    },
    save: function save() {
      var _this2 = this;

      console.log(this.info, this.info);

      if (this.patientId == 0) {
        Toast.fire({
          icon: 'success',
          title: 'Дані будуть збережені після збереження пацієнта'
        });
        var data = this.form.data();
        data.pageNum = this.pageNum;
        this.$emit('concSaved', {
          data: data,
          pageNum: this.pageNum,
          hasData: this.isHasData(this.form.data())
        });
        this.form.reset();
        return;
      } else {
        this.form.patientId = this.patientId;
        this.form.pageNum = this.pageNum;
        this.form.post('/patient/storeConclution').then(function (_ref) {
          var data = _ref.data;
          Toast.fire({
            icon: 'success',
            title: data.message
          });

          _this2.$emit('concSaved', {
            data: null,
            pageNum: _this2.pageNum,
            hasData: _this2.isHasData(_this2.form.data())
          });

          $("#consultFrame").attr('src', '');

          _this2.form.reset();
        });
      }
    },
    close: function close() {
      this.$emit('concSaved', {
        data: null,
        pageNum: this.pageNum,
        hasData: this.isHasData(this.form.data())
      });
      this.form.reset();
    },
    onPrint: function onPrint() {
      if (this.patientId > 0) {
        // let loader = this.$loading.show();
        $("#consultFrame").get(0).contentWindow.print(); // document.getElementById('consultFrame').contentDocument.location.reload(true);
        // setTimeout(() => {
        //     loader.hide();
        //     $("#consultFrame").get(0).contentWindow.print();
        //     console.log("this is the first message")
        // }, 5000);
      } else Toast.fire({
        icon: 'warning',
        title: 'Потрібно зберегти пацієнта, після цього можна друкувати консультацію'
      });
    }
  },
  watch: {
    showModal: function showModal(newVal, oldVal) {
      // watch it
      if (newVal) {
        // console.log(this.info,'info');
        if (this.patientId == 0 && this.info != undefined) {
          this.form.fill(this.info.data);
        }

        if (this.patientId != 0) {
          this.fillData();
        }

        $('body').addClass('modal-open'); //   console.log(this.info,'this.info')
      } else {
        $('body').removeClass('modal-open');
      }
    }
  }
});

/***/ }),

/***/ "./resources/js/components/patient/Form025Modal.vue":
/*!**********************************************************!*\
  !*** ./resources/js/components/patient/Form025Modal.vue ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Form025Modal_vue_vue_type_template_id_1ce4e71a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Form025Modal.vue?vue&type=template&id=1ce4e71a& */ "./resources/js/components/patient/Form025Modal.vue?vue&type=template&id=1ce4e71a&");
/* harmony import */ var _Form025Modal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Form025Modal.vue?vue&type=script&lang=js& */ "./resources/js/components/patient/Form025Modal.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _Form025Modal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Form025Modal_vue_vue_type_template_id_1ce4e71a___WEBPACK_IMPORTED_MODULE_0__.render,
  _Form025Modal_vue_vue_type_template_id_1ce4e71a___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/patient/Form025Modal.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/patient/Form025Modal.vue?vue&type=script&lang=js&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/patient/Form025Modal.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Form025Modal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Form025Modal.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/patient/Form025Modal.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Form025Modal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/patient/Form025Modal.vue?vue&type=template&id=1ce4e71a&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/patient/Form025Modal.vue?vue&type=template&id=1ce4e71a& ***!
  \*****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Form025Modal_vue_vue_type_template_id_1ce4e71a___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Form025Modal_vue_vue_type_template_id_1ce4e71a___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Form025Modal_vue_vue_type_template_id_1ce4e71a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Form025Modal.vue?vue&type=template&id=1ce4e71a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/patient/Form025Modal.vue?vue&type=template&id=1ce4e71a&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/patient/Form025Modal.vue?vue&type=template&id=1ce4e71a&":
/*!********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/patient/Form025Modal.vue?vue&type=template&id=1ce4e71a& ***!
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
  return _c(
    "div",
    {
      staticClass: "modal modal-fields modal-themes modal-oft-conclusion",
      class: { active: _vm.showModal }
    },
    [
      _c("div", { staticClass: "modal_container" }, [
        _c(
          "div",
          {
            staticClass: "close",
            on: {
              click: function($event) {
                return _vm.close()
              }
            }
          },
          [_vm._v("×")]
        ),
        _vm._v(" "),
        _c("h3", [_vm._v(" Консультативне заключення")]),
        _vm._v(" "),
        _c("div", { staticClass: "scroll-b" }, [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-12" }, [
              _c("div", { staticClass: "form-group text-left" }, [
                _c("label", { staticClass: "font-weight-bold" }, [
                  _vm._v("Скарги ")
                ]),
                _vm._v(" "),
                _c("textarea", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.form.skargi,
                      expression: "form.skargi"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { placeholder: "" },
                  domProps: { value: _vm.form.skargi },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.form, "skargi", $event.target.value)
                    }
                  }
                })
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-12" }, [
              _c("div", { staticClass: "form-group text-left" }, [
                _c("label", { staticClass: "font-weight-bold" }, [
                  _vm._v("Короткий анамнез")
                ]),
                _vm._v(" "),
                _c("textarea", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.form.anamnez,
                      expression: "form.anamnez"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { placeholder: "" },
                  domProps: { value: _vm.form.anamnez },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.form, "anamnez", $event.target.value)
                    }
                  }
                })
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-12" }, [
              _c("div", { staticClass: "form-group text-left" }, [
                _c("label", { staticClass: "font-weight-bold" }, [
                  _vm._v("Дані обстеження")
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "row" }, [
                  _c("div", { staticClass: "col-sm-6" }, [
                    _c("label", { staticClass: "font-weight-bold" }, [
                      _vm._v("Праве око (OD)")
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "status-b form-group mb-0 d-flex align-items-center justify-content-start"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-3",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Visus OD = ")]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "d-flex flex-wrap align-items-center justify-content-center"
                          },
                          [
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.visus_od,
                                  expression: "form.visus_od"
                                }
                              ],
                              staticClass: "form-control p-1 text-center mb-3",
                              staticStyle: { "max-width": "50px" },
                              attrs: {
                                type: "text",
                                name: "properties[akt_visus_od]"
                              },
                              domProps: { value: _vm.form.visus_od },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "visus_od",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c(
                              "label",
                              {
                                staticClass:
                                  "form-label text-nowrap mr-2 ml-2 mb-3"
                              },
                              [_vm._v("З кор.sph.")]
                            ),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.visus_od_kop,
                                  expression: "form.visus_od_kop"
                                }
                              ],
                              staticClass: "form-control p-1 text-center mb-3",
                              staticStyle: { "max-width": "50px" },
                              attrs: {
                                type: "text",
                                name: "properties[akt_visus_od_sph]"
                              },
                              domProps: { value: _vm.form.visus_od_kop },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "visus_od_kop",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c(
                              "label",
                              {
                                staticClass:
                                  "form-label text-nowrap mr-2 ml-2 mb-3"
                              },
                              [_vm._v("cyl.")]
                            ),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.visus_od_cyl,
                                  expression: "form.visus_od_cyl"
                                }
                              ],
                              staticClass: "form-control p-1 text-center mb-3",
                              staticStyle: { "max-width": "50px" },
                              attrs: {
                                type: "text",
                                name: "properties[akt_visus_od_cyl]"
                              },
                              domProps: { value: _vm.form.visus_od_cyl },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "visus_od_cyl",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c(
                              "label",
                              {
                                staticClass:
                                  "form-label text-nowrap mr-2 ml-2 mb-3"
                              },
                              [_vm._v("ax.")]
                            ),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.visus_od_ax,
                                  expression: "form.visus_od_ax"
                                }
                              ],
                              staticClass: "form-control p-1 text-center mb-3",
                              staticStyle: { "max-width": "50px" },
                              attrs: {
                                type: "text",
                                name: "properties[akt_visus_od_ax]"
                              },
                              domProps: { value: _vm.form.visus_od_ax },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "visus_od_ax",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c(
                              "label",
                              {
                                staticClass:
                                  "form-label text-nowrap mr-2 ml-2 mb-3"
                              },
                              [_vm._v("=")]
                            ),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.visus_od_equal,
                                  expression: "form.visus_od_equal"
                                }
                              ],
                              staticClass: "form-control p-1 text-center mb-3",
                              staticStyle: { "max-width": "50px" },
                              attrs: {
                                type: "text",
                                name: "properties[akt_visus_od_equal]"
                              },
                              domProps: { value: _vm.form.visus_od_equal },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "visus_od_equal",
                                    $event.target.value
                                  )
                                }
                              }
                            })
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Кон‘юнктива ")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_od_konyuktiv,
                              expression: "form.visus_od_konyuktiv"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_conjunctiva_od]"
                          },
                          domProps: { value: _vm.form.visus_od_konyuktiv },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_od_konyuktiv",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Рогівка")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_od_rogivka,
                              expression: "form.visus_od_rogivka"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_cornea_od]"
                          },
                          domProps: { value: _vm.form.visus_od_rogivka },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_od_rogivka",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0 ",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Кришталик")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_od_krishtalik,
                              expression: "form.visus_od_krishtalik"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_crystal_od]"
                          },
                          domProps: { value: _vm.form.visus_od_krishtalik },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_od_krishtalik",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0 ",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Скловидне тіло")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_od_sklo,
                              expression: "form.visus_od_sklo"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_glassy_od]"
                          },
                          domProps: { value: _vm.form.visus_od_sklo },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_od_sklo",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0 ",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Очне дно")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_od_ochne,
                              expression: "form.visus_od_ochne"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_fundus_od]"
                          },
                          domProps: { value: _vm.form.visus_od_ochne },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_od_ochne",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0 ",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Кератотопографія")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_od_keratot,
                              expression: "form.visus_od_keratot"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_keratoto_od]"
                          },
                          domProps: { value: _vm.form.visus_od_keratot },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_od_keratot",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0 ",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Рефрактометрія")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_od_refrakt,
                              expression: "form.visus_od_refrakt"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_refractometry_od]"
                          },
                          domProps: { value: _vm.form.visus_od_refrakt },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_od_refrakt",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-sm-6" }, [
                    _c("label", { staticClass: "font-weight-bold" }, [
                      _vm._v("Праве око (OS)")
                    ]),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "status-b form-group mb-0 d-flex align-items-center justify-content-start"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-3",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Visus OS = ")]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "d-flex flex-wrap align-items-center justify-content-center"
                          },
                          [
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.visus_os,
                                  expression: "form.visus_os"
                                }
                              ],
                              staticClass: "form-control p-1 text-center mb-3",
                              staticStyle: { "max-width": "50px" },
                              attrs: {
                                type: "text",
                                name: "properties[akt_visus_os]"
                              },
                              domProps: { value: _vm.form.visus_os },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "visus_os",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c(
                              "label",
                              {
                                staticClass:
                                  "form-label text-nowrap mr-2 ml-2 mb-3"
                              },
                              [_vm._v("З кор.sph.")]
                            ),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.visus_os_sph,
                                  expression: "form.visus_os_sph"
                                }
                              ],
                              staticClass: "form-control p-1 text-center mb-3",
                              staticStyle: { "max-width": "50px" },
                              attrs: {
                                type: "text",
                                name: "properties[akt_visus_os_sph]"
                              },
                              domProps: { value: _vm.form.visus_os_sph },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "visus_os_sph",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c(
                              "label",
                              {
                                staticClass:
                                  "form-label text-nowrap mr-2 ml-2 mb-3"
                              },
                              [_vm._v("cyl.")]
                            ),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.visus_os_cyl,
                                  expression: "form.visus_os_cyl"
                                }
                              ],
                              staticClass: "form-control p-1 text-center mb-3",
                              staticStyle: { "max-width": "50px" },
                              attrs: {
                                type: "text",
                                name: "properties[akt_visus_os_cyl]"
                              },
                              domProps: { value: _vm.form.visus_os_cyl },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "visus_os_cyl",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c(
                              "label",
                              {
                                staticClass:
                                  "form-label text-nowrap mr-2 ml-2 mb-3"
                              },
                              [_vm._v("ax.")]
                            ),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.visus_os_ax,
                                  expression: "form.visus_os_ax"
                                }
                              ],
                              staticClass: "form-control p-1 text-center mb-3",
                              staticStyle: { "max-width": "50px" },
                              attrs: {
                                type: "text",
                                name: "properties[akt_visus_os_ax]"
                              },
                              domProps: { value: _vm.form.visus_os_ax },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "visus_os_ax",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c(
                              "label",
                              {
                                staticClass:
                                  "form-label text-nowrap mr-2 ml-2 mb-3"
                              },
                              [_vm._v("=")]
                            ),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.visus_os_equal,
                                  expression: "form.visus_os_equal"
                                }
                              ],
                              staticClass: "form-control p-1 text-center mb-3",
                              staticStyle: { "max-width": "50px" },
                              attrs: {
                                type: "text",
                                name: "properties[akt_visus_os_equal]"
                              },
                              domProps: { value: _vm.form.visus_os_equal },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "visus_os_equal",
                                    $event.target.value
                                  )
                                }
                              }
                            })
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Кон‘юнктива ")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_os_konyuktiv,
                              expression: "form.visus_os_konyuktiv"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_conjunctiva_os]"
                          },
                          domProps: { value: _vm.form.visus_os_konyuktiv },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_os_konyuktiv",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Рогівка")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_os_rogivka,
                              expression: "form.visus_os_rogivka"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_cornea_os]"
                          },
                          domProps: { value: _vm.form.visus_os_rogivka },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_os_rogivka",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0 ",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Кришталик")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_os_krishtalik,
                              expression: "form.visus_os_krishtalik"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_crystal_os]"
                          },
                          domProps: { value: _vm.form.visus_os_krishtalik },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_os_krishtalik",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0 ",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Скловидне тіло")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_os_sklo,
                              expression: "form.visus_os_sklo"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_glassy_os]"
                          },
                          domProps: { value: _vm.form.visus_os_sklo },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_os_sklo",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0 ",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Очне дно")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_os_ochne,
                              expression: "form.visus_os_ochne"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_fundus_os]"
                          },
                          domProps: { value: _vm.form.visus_os_ochne },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_os_ochne",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0 ",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Кератотопографія")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_os_keratot,
                              expression: "form.visus_os_keratot"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_keratoto_os]"
                          },
                          domProps: { value: _vm.form.visus_os_keratot },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_os_keratot",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "form-group d-flex align-items-center justify-content-center"
                      },
                      [
                        _c(
                          "label",
                          {
                            staticClass: "form-label text-nowrap mr-3 mb-0 ",
                            staticStyle: {
                              "min-width": "120px",
                              width: "120px"
                            }
                          },
                          [_vm._v("Рефрактометрія")]
                        ),
                        _vm._v(" "),
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.visus_os_refrakt,
                              expression: "form.visus_os_refrakt"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: {
                            type: "text",
                            name: "properties[akt_refractometry_os]"
                          },
                          domProps: { value: _vm.form.visus_os_refrakt },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(
                                _vm.form,
                                "visus_os_refrakt",
                                $event.target.value
                              )
                            }
                          }
                        })
                      ]
                    )
                  ])
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-12" }, [
              _c("div", { staticClass: "form-group text-left" }, [
                _c("label", { staticClass: "font-weight-bold" }, [
                  _vm._v("Діагноз")
                ]),
                _vm._v(" "),
                _c("textarea", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.form.diagnoz,
                      expression: "form.diagnoz"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { placeholder: "" },
                  domProps: { value: _vm.form.diagnoz },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.form, "diagnoz", $event.target.value)
                    }
                  }
                })
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-12" }, [
              _c("div", { staticClass: "form-group text-left" }, [
                _c("label", { staticClass: "font-weight-bold" }, [
                  _vm._v("Призначене лікування")
                ]),
                _vm._v(" "),
                _c("textarea", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.form.priznan,
                      expression: "form.priznan"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { placeholder: "" },
                  domProps: { value: _vm.form.priznan },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.form, "priznan", $event.target.value)
                    }
                  }
                })
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-12" }, [
              _c("div", { staticClass: "form-group text-left" }, [
                _c("label", { staticClass: "font-weight-bold" }, [
                  _vm._v("Рекомендовано")
                ]),
                _vm._v(" "),
                _c("textarea", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.form.rekomend,
                      expression: "form.rekomend"
                    }
                  ],
                  staticClass: "form-control",
                  attrs: { placeholder: "" },
                  domProps: { value: _vm.form.rekomend },
                  on: {
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(_vm.form, "rekomend", $event.target.value)
                    }
                  }
                })
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "buttons d-flex align-items-end justify-content-end" },
          [
            _c(
              "button",
              {
                staticClass: "btn-my mr-2 ml-0 mt-0",
                attrs: { type: "submit" },
                on: {
                  click: function($event) {
                    return _vm.onPrint()
                  }
                }
              },
              [_vm._v("Друк")]
            ),
            _vm._v(" "),
            _c(
              "button",
              {
                staticClass: "btn-my mr-0 ml-0 mt-0 bg-success",
                attrs: { type: "submit" },
                on: {
                  click: function($event) {
                    return _vm.save()
                  }
                }
              },
              [_vm._v("Зберегти")]
            )
          ]
        )
      ]),
      _vm._v(" "),
      this.patientId > 0
        ? _c("iframe", {
            staticStyle: {
              position: "absolute",
              top: "-1000px",
              left: "-1000px"
            },
            attrs: { id: "consultFrame" }
          })
        : _vm._e()
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);