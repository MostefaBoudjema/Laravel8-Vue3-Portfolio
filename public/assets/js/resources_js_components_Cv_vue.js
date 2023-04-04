"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_Cv_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/Cv.vue?vue&type=script&lang=js":
/*!********************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/Cv.vue?vue&type=script&lang=js ***!
  \********************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "cv",
  data: function data() {
    return {
      title: "Liste of my CV",
      cvs: [],
      Cvid: 0,
      cv: {
        id: 0,
        titre: "",
        photo: "",
        render: "",
        presentation: ""
      }
    };
  },
  methods: {
    getCv: function getCv() {
      var _this = this;

      axios.get(window.Laravel.url + "/getCv").then(function (response) {
        _this.cvs = response.data;
        console.log("success getCv => ", response.data.data);
      })["catch"](function (error) {
        console.log("error getCv => ", error);
      });
    },
    getLogo: function getLogo(logo) {
      return "../assets/" + logo;
    },
    deleteCV: function deleteCV(CvParam) {
      var _this2 = this;

      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "error",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Oui, Delete!",
        cancelButtonText: "Annuler"
      }).then(function (result) {
        if (result.isConfirmed) {
          axios["delete"](window.Laravel.url + "/deletecv/" + CvParam.id).then(function (response) {
            // this.experience = response.data;
            console.log("success deleteCV => ", response.data);

            if (response.data.etat) {
              var pos = _this2.cvs.indexOf(CvParam);

              _this2.cvs.splice(pos, 1);

              Swal.fire("Delete!", "Experience a etes Delete avec succee.", "success");
            }
          })["catch"](function (error) {
            console.log("error deleteCV => ", error);
            Swal.fire("Error!", "Not Autorized!", "error");
          });
        }
      });
    }
  },
  mounted: function mounted() {
    this.getCv();
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/Cv.vue?vue&type=template&id=e19deac4":
/*!************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/Cv.vue?vue&type=template&id=e19deac4 ***!
  \************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "container"
};
var _hoisted_2 = {
  "class": "row"
};
var _hoisted_3 = {
  "class": "col-md-12"
};
var _hoisted_4 = {
  "class": "col-md-10"
};

var _hoisted_5 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-md-2 pull-right"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
  href: 'cvs/create',
  "class": "btn btn-success"
}, "NEW CV")], -1
/* HOISTED */
);

var _hoisted_6 = {
  "class": "row"
};
var _hoisted_7 = {
  "class": "thumbnail"
};
var _hoisted_8 = ["href"];
var _hoisted_9 = ["src"];
var _hoisted_10 = {
  "class": "caption"
};
var _hoisted_11 = ["href"];
var _hoisted_12 = ["href"];
var _hoisted_13 = ["onClick"];

var _hoisted_14 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "text-center"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" {{ cvs.render() }} ")], -1
/* HOISTED */
);

function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($data.title), 1
  /* TEXT */
  )]), _hoisted_5])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_6, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($data.cvs.data, function (cv) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
      "class": "col-sm-6 col-md-4",
      key: cv.id
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
      href: 'cvs/' + cv.id
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
      style: {
        "height": "250px",
        "width": "250px",
        "object-fit": "contain"
      },
      src: 'storage/' + cv.photo,
      alt: "..."
    }, null, 8
    /* PROPS */
    , _hoisted_9)], 8
    /* PROPS */
    , _hoisted_8), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_10, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(cv.titre), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(cv.presentation), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <form action=\"/\" method=\"delete\"> "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" {{ method_field('Delete') }} "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" csrf_field()  "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
      href: 'cvs/' + cv.id,
      "class": "btn btn-primary",
      role: "button"
    }, "Show", 8
    /* PROPS */
    , _hoisted_11), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
      href: 'cvs/' + cv.id + '/edit',
      "class": "btn btn-warning",
      role: "button"
    }, "Edit", 8
    /* PROPS */
    , _hoisted_12), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
      "class": "btn btn-danger",
      onClick: function onClick($event) {
        return $options.deleteCV(cv);
      }
    }, " Delete ", 8
    /* PROPS */
    , _hoisted_13), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" </form> ")])])]);
  }), 128
  /* KEYED_FRAGMENT */
  ))]), _hoisted_14]);
}

/***/ }),

/***/ "./resources/js/components/Cv.vue":
/*!****************************************!*\
  !*** ./resources/js/components/Cv.vue ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Cv_vue_vue_type_template_id_e19deac4__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Cv.vue?vue&type=template&id=e19deac4 */ "./resources/js/components/Cv.vue?vue&type=template&id=e19deac4");
/* harmony import */ var _Cv_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Cv.vue?vue&type=script&lang=js */ "./resources/js/components/Cv.vue?vue&type=script&lang=js");
/* harmony import */ var D_www_Devs_Laravel_VueJs_WORKSHOPPPPPP_Laravel8_Vue3_Portfolio_v6_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,D_www_Devs_Laravel_VueJs_WORKSHOPPPPPP_Laravel8_Vue3_Portfolio_v6_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Cv_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Cv_vue_vue_type_template_id_e19deac4__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/components/Cv.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/components/Cv.vue?vue&type=script&lang=js":
/*!****************************************************************!*\
  !*** ./resources/js/components/Cv.vue?vue&type=script&lang=js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Cv_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Cv_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Cv.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/Cv.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/components/Cv.vue?vue&type=template&id=e19deac4":
/*!**********************************************************************!*\
  !*** ./resources/js/components/Cv.vue?vue&type=template&id=e19deac4 ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Cv_vue_vue_type_template_id_e19deac4__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Cv_vue_vue_type_template_id_e19deac4__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Cv.vue?vue&type=template&id=e19deac4 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/Cv.vue?vue&type=template&id=e19deac4");


/***/ })

}]);