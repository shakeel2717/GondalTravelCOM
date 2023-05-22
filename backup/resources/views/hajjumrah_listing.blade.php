@extends('main.app')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

body {
    font-family: "Poppins", sans-serif;
    color: #444444;
}

a,
a:hover {
    text-decoration: none;
    color: inherit;
}

.section-products {
    padding: 80px 0 54px;
}

.section-products .header {
    margin-bottom: 50px;
}

.section-products .header h3 {
    font-size: 1rem;
    color: #fe302f;
    font-weight: 500;
}

.section-products .header h2 {
    font-size: 2.2rem;
    font-weight: 400;
    color: #444444; 
}

.section-products .single-product {
    margin-bottom: 26px;
}

.section-products .single-product .part-1 {
    position: relative;
    height: 290px;
    max-height: 290px;
    margin-bottom: 20px;
    overflow: hidden;
}

.section-products .single-product .part-1::before {
		position: absolute;
		content: "";
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: -1;
		transition: all 0.3s;
}

.section-products .single-product:hover .part-1::before {
		transform: scale(1.2,1.2) rotate(5deg);
}

/*.section-products #product-1 .part-1::before {*/
/*    background: url("images/packages/bb.jpg") no-repeat center;*/
/*    background-size: cover;*/
/*		transition: all 0.3s;*/
/*}*/


.section-products #product-2 .part-1::before {
    background: url("images/packages/bb2.jpg") no-repeat center;
    background-size: cover;
}

.section-products #product-3 .part-1::before {
    background: url("images/packages/bb3.jpg") no-repeat center;
    background-size: cover;
}

.section-products #product-4 .part-1::before {
    background: url("images/packages/bb.jpg") no-repeat center;
    background-size: cover;
}

.section-products .single-product .part-1 .discount,
.section-products .single-product .part-1 .new {
    position: absolute;
    top: 15px;
    left: 20px;
    color: #ffffff;
    background-color: #fe302f;
    padding: 2px 8px;
    text-transform: uppercase;
    font-size: 0.85rem;
}

.section-products .single-product .part-1 .new {
    left: 0;
    background-color: #444444;
}

.section-products .single-product .part-1 ul {
    position: absolute;
    bottom: -41px;
    left: 20px;
    margin: 0;
    padding: 0;
    list-style: none;
    opacity: 0;
    transition: bottom 0.5s, opacity 0.5s;
}

.section-products .single-product:hover .part-1 ul {
    bottom: 30px;
    opacity: 1;
}

.section-products .single-product .part-1 ul li {
    display: inline-block;
    margin-right: 4px;
}

.section-products .single-product .part-1 ul li a {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    background-color: #ffffff;
    color: #444444;
    text-align: center;
    box-shadow: 0 2px 20px rgb(50 50 50 / 10%);
    transition: color 0.2s;
}

.section-products .single-product .part-1 ul li a:hover {
    color: #fe302f;
}

.section-products .single-product .part-2 .product-title {
    font-size: 1rem;
}

.section-products .single-product .part-2 h4 {
    display: inline-block;
    font-size: 1rem;
}

.section-products .single-product .part-2 .product-old-price {
    position: relative;
    padding: 0 7px;
    margin-right: 2px;
    opacity: 0.6;
}

.section-products .single-product .part-2 .product-old-price::after {
    position: absolute;
    content: "";
    top: 50%;
    left: 0;
    width: 100%;
    height: 1px;
    background-color: #444444;
    transform: translateY(-50%);
}

/**
 * Add the correct display in IE 9-.
 */
article,
aside,
footer,
header,
nav,
section {
  display: block;
}

/**
 * Correct the font size and margin on `h1` elements within `section` and
 * `article` contexts in Chrome, Firefox, and Safari.
 */
h1 {
  font-size: 2em;
  margin: 0.67em 0;
}

/* Grouping content
   ========================================================================== */
/**
 * Add the correct display in IE 9-.
 * 1. Add the correct display in IE.
 */
figcaption,
figure,
main {
  /* 1 */
  display: block;
}

/**
 * Add the correct margin in IE 8.
 */
figure {
  margin: 1em 40px;
}

/**
 * 1. Add the correct box sizing in Firefox.
 * 2. Show the overflow in Edge and IE.
 */
hr {
  box-sizing: content-box;
  /* 1 */
  height: 0;
  /* 1 */
  overflow: visible;
  /* 2 */
}

/**
 * 1. Correct the inheritance and scaling of font size in all browsers.
 * 2. Correct the odd `em` font sizing in all browsers.
 */
pre {
  font-family: monospace, monospace;
  /* 1 */
  font-size: 1em;
  /* 2 */
}

/* Text-level semantics
   ========================================================================== */
/**
 * 1. Remove the gray background on active links in IE 10.
 * 2. Remove gaps in links underline in iOS 8+ and Safari 8+.
 */
a {
  background-color: transparent;
  /* 1 */
  -webkit-text-decoration-skip: objects;
  /* 2 */
}

/**
 * 1. Remove the bottom border in Chrome 57- and Firefox 39-.
 * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.
 */
abbr[title] {
  border-bottom: none;
  /* 1 */
  text-decoration: underline;
  /* 2 */
  text-decoration: underline dotted;
  /* 2 */
}

/**
 * Prevent the duplicate application of `bolder` by the next rule in Safari 6.
 */
b,
strong {
  font-weight: inherit;
}

/**
 * Add the correct font weight in Chrome, Edge, and Safari.
 */
b,
strong {
  font-weight: bolder;
}

/**
 * 1. Correct the inheritance and scaling of font size in all browsers.
 * 2. Correct the odd `em` font sizing in all browsers.
 */
code,
kbd,
samp {
  font-family: monospace, monospace;
  /* 1 */
  font-size: 1em;
  /* 2 */
}

/**
 * Add the correct font style in Android 4.3-.
 */
dfn {
  font-style: italic;
}

/**
 * Add the correct background and color in IE 9-.
 */
mark {
  background-color: #ff0;
  color: #000;
}

/**
 * Add the correct font size in all browsers.
 */
small {
  font-size: 80%;
}

/**
 * Prevent `sub` and `sup` elements from affecting the line height in
 * all browsers.
 */
sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sub {
  bottom: -0.25em;
}

sup {
  top: -0.5em;
}

/* Embedded content
   ========================================================================== */
/**
 * Add the correct display in IE 9-.
 */
audio,
video {
  display: inline-block;
}

/**
 * Add the correct display in iOS 4-7.
 */
audio:not([controls]) {
  display: none;
  height: 0;
}

/**
 * Remove the border on images inside links in IE 10-.
 */
img {
  border-style: none;
}

/**
 * Hide the overflow in IE.
 */
svg:not(:root) {
  overflow: hidden;
}

/* Forms
   ========================================================================== */
/**
 * 1. Change the font styles in all browsers (opinionated).
 * 2. Remove the margin in Firefox and Safari.
 */
button,
input,
optgroup,
select,
textarea {
  font-family: sans-serif;
  /* 1 */
  font-size: 100%;
  /* 1 */
  line-height: 1.15;
  /* 1 */
  margin: 0;
  /* 2 */
}

/**
 * Show the overflow in IE.
 * 1. Show the overflow in Edge.
 */
button,
input {
  /* 1 */
  overflow: visible;
}

/**
 * Remove the inheritance of text transform in Edge, Firefox, and IE.
 * 1. Remove the inheritance of text transform in Firefox.
 */
button,
select {
  /* 1 */
  text-transform: none;
}

/**
 * 1. Prevent a WebKit bug where (2) destroys native `audio` and `video`
 *    controls in Android 4.
 * 2. Correct the inability to style clickable types in iOS and Safari.
 */
button,
html [type="button"],
[type="reset"],
[type="submit"] {
  -webkit-appearance: button;
  /* 2 */
}

/**
 * Remove the inner border and padding in Firefox.
 */
button::-moz-focus-inner,
[type="button"]::-moz-focus-inner,
[type="reset"]::-moz-focus-inner,
[type="submit"]::-moz-focus-inner {
  border-style: none;
  padding: 0;
}

/**
 * Restore the focus styles unset by the previous rule.
 */
button:-moz-focusring,
[type="button"]:-moz-focusring,
[type="reset"]:-moz-focusring,
[type="submit"]:-moz-focusring {
  outline: 1px dotted ButtonText;
}

/**
 * Correct the padding in Firefox.
 */
fieldset {
  padding: 0.35em 0.75em 0.625em;
}

/**
 * 1. Correct the text wrapping in Edge and IE.
 * 2. Correct the color inheritance from `fieldset` elements in IE.
 * 3. Remove the padding so developers are not caught out when they zero out
 *    `fieldset` elements in all browsers.
 */
legend {
  box-sizing: border-box;
  /* 1 */
  color: inherit;
  /* 2 */
  display: table;
  /* 1 */
  max-width: 100%;
  /* 1 */
  padding: 0;
  /* 3 */
  white-space: normal;
  /* 1 */
}

/**
 * 1. Add the correct display in IE 9-.
 * 2. Add the correct vertical alignment in Chrome, Firefox, and Opera.
 */
progress {
  display: inline-block;
  /* 1 */
  vertical-align: baseline;
  /* 2 */
}

/**
 * Remove the default vertical scrollbar in IE.
 */
textarea {
  overflow: auto;
}

/**
 * 1. Add the correct box sizing in IE 10-.
 * 2. Remove the padding in IE 10-.
 */
[type="checkbox"],
[type="radio"] {
  box-sizing: border-box;
  /* 1 */
  padding: 0;
  /* 2 */
}

/**
 * Correct the cursor style of increment and decrement buttons in Chrome.
 */
[type="number"]::-webkit-inner-spin-button,
[type="number"]::-webkit-outer-spin-button {
  height: auto;
}

/**
 * 1. Correct the odd appearance in Chrome and Safari.
 * 2. Correct the outline style in Safari.
 */
[type="search"] {
  -webkit-appearance: textfield;
  /* 1 */
  outline-offset: -2px;
  /* 2 */
}

/**
 * Remove the inner padding and cancel buttons in Chrome and Safari on macOS.
 */
[type="search"]::-webkit-search-cancel-button,
[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}

/**
 * 1. Correct the inability to style clickable types in iOS and Safari.
 * 2. Change font properties to `inherit` in Safari.
 */
::-webkit-file-upload-button {
  -webkit-appearance: button;
  /* 1 */
  font: inherit;
  /* 2 */
}

/* Interactive
   ========================================================================== */
/*
 * Add the correct display in IE 9-.
 * 1. Add the correct display in Edge, IE, and Firefox.
 */
details,
menu {
  display: block;
}

/*
 * Add the correct display in all browsers.
 */
summary {
  display: list-item;
}

/* Scripting
   ========================================================================== */
/**
 * Add the correct display in IE 9-.
 */
canvas {
  display: inline-block;
}

/**
 * Add the correct display in IE.
 */
template {
  display: none;
}

/* Hidden
   ========================================================================== */
/**
 * Add the correct display in IE 10-.
 */
[hidden] {
  display: none;
}

html {
  height: 100%;
}

fieldset {
  margin: 0;
  padding: 0;
  -webkit-margin-start: 0;
  -webkit-margin-end: 0;
  -webkit-padding-before: 0;
  -webkit-padding-start: 0;
  -webkit-padding-end: 0;
  -webkit-padding-after: 0;
  border: 0;
}

legend {
  margin: 0;
  padding: 0;
  display: block;
  -webkit-padding-start: 0;
  -webkit-padding-end: 0;
}

/*===============================
=            Choices            =
===============================*/
.choices {
  position: relative;
  margin-bottom: 24px;
  font-size: 16px;
}

.choices:focus {
  outline: none;
}

.choices:last-child {
  margin-bottom: 0;
}

.choices.is-disabled .choices__inner, .choices.is-disabled .choices__input {
  background-color: #EAEAEA;
  cursor: not-allowed;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.choices.is-disabled .choices__item {
  cursor: not-allowed;
}

.choices[data-type*="select-one"] {
  cursor: pointer;
}

.choices[data-type*="select-one"] .choices__inner {
  padding-bottom: 7.5px;
}

.choices[data-type*="select-one"] .choices__input {
  display: block;
  width: 100%;
  padding: 10px;
  border-bottom: 1px solid #DDDDDD;
  background-color: #FFFFFF;
  margin: 0;
}

.choices[data-type*="select-one"] .choices__button {
  background-image: url("../../icons/cross-inverse.svg");
  padding: 0;
  background-size: 8px;
  height: 100%;
  position: absolute;
  top: 50%;
  right: 0;
  margin-top: -10px;
  margin-right: 25px;
  height: 20px;
  width: 20px;
  border-radius: 10em;
  opacity: .5;
}

.choices[data-type*="select-one"] .choices__button:hover, .choices[data-type*="select-one"] .choices__button:focus {
  opacity: 1;
}

.choices[data-type*="select-one"] .choices__button:focus {
  box-shadow: 0px 0px 0px 2px #00BCD4;
}

.choices[data-type*="select-one"]:after {
  content: "";
  height: 0;
  width: 0;
  border-style: solid;
  border-color: #333333 transparent transparent transparent;
  border-width: 5px;
  position: absolute;
  right: 11.5px;
  top: 50%;
  margin-top: -2.5px;
  pointer-events: none;
}

.choices[data-type*="select-one"].is-open:after {
  border-color: transparent transparent #333333 transparent;
  margin-top: -7.5px;
}

.choices[data-type*="select-one"][dir="rtl"]:after {
  left: 11.5px;
  right: auto;
}

.choices[data-type*="select-one"][dir="rtl"] .choices__button {
  right: auto;
  left: 0;
  margin-left: 25px;
  margin-right: 0;
}

.choices[data-type*="select-multiple"] .choices__inner, .choices[data-type*="text"] .choices__inner {
  cursor: text;
}

.choices[data-type*="select-multiple"] .choices__button, .choices[data-type*="text"] .choices__button {
  position: relative;
  display: inline-block;
  margin-top: 0;
  margin-right: -4px;
  margin-bottom: 0;
  margin-left: 8px;
  padding-left: 16px;
  border-left: 1px solid #008fa1;
  background-image: url("../../icons/cross.svg");
  background-size: 8px;
  width: 8px;
  line-height: 1;
  opacity: .75;
}

.choices[data-type*="select-multiple"] .choices__button:hover, .choices[data-type*="select-multiple"] .choices__button:focus, .choices[data-type*="text"] .choices__button:hover, .choices[data-type*="text"] .choices__button:focus {
  opacity: 1;
}

.choices__inner {
  display: inline-block;
  vertical-align: top;
  width: 100%;
  background-color: #f9f9f9;
  padding: 7.5px 7.5px 3.75px;
  border: 1px solid #DDDDDD;
  border-radius: 2.5px;
  font-size: 14px;
  min-height: 44px;
  overflow: hidden;
}

.is-focused .choices__inner, .is-open .choices__inner {
  border-color: #b7b7b7;
}

.is-open .choices__inner {
  border-radius: 2.5px 2.5px 0 0;
}

.is-flipped.is-open .choices__inner {
  border-radius: 0 0 2.5px 2.5px;
}

.choices__list {
  margin: 0;
  padding-left: 0;
  list-style: none;
}

.choices__list--single {
  display: inline-block;
  padding: 4px 16px 4px 4px;
  width: 100%;
}

[dir="rtl"] .choices__list--single {
  padding-right: 4px;
  padding-left: 16px;
}

.choices__list--single .choices__item {
  width: 100%;
}

.choices__list--multiple {
  display: inline;
}

.choices__list--multiple .choices__item {
  display: inline-block;
  vertical-align: middle;
  border-radius: 20px;
  padding: 4px 10px;
  font-size: 12px;
  font-weight: 500;
  margin-right: 3.75px;
  margin-bottom: 3.75px;
  background-color: #00BCD4;
  border: 1px solid #00a5bb;
  color: #FFFFFF;
  word-break: break-all;
}

.choices__list--multiple .choices__item[data-deletable] {
  padding-right: 5px;
}

[dir="rtl"] .choices__list--multiple .choices__item {
  margin-right: 0;
  margin-left: 3.75px;
}

.choices__list--multiple .choices__item.is-highlighted {
  background-color: #00a5bb;
  border: 1px solid #008fa1;
}

.is-disabled .choices__list--multiple .choices__item {
  background-color: #aaaaaa;
  border: 1px solid #919191;
}

.choices__list--dropdown {
  display: none;
  z-index: 1;
  position: absolute;
  width: 100%;
  background-color: #FFFFFF;
  border: 1px solid #DDDDDD;
  top: 100%;
  margin-top: -1px;
  border-bottom-left-radius: 2.5px;
  border-bottom-right-radius: 2.5px;
  overflow: hidden;
  word-break: break-all;
}

.choices__list--dropdown.is-active {
  display: block;
}

.is-open .choices__list--dropdown {
  border-color: #b7b7b7;
}

.is-flipped .choices__list--dropdown {
  top: auto;
  bottom: 100%;
  margin-top: 0;
  margin-bottom: -1px;
  border-radius: .25rem .25rem 0 0;
}

.choices__list--dropdown .choices__list {
  position: relative;
  max-height: 300px;
  overflow: auto;
  -webkit-overflow-scrolling: touch;
  will-change: scroll-position;
}

.choices__list--dropdown .choices__item {
  position: relative;
  padding: 10px;
  font-size: 14px;
}

[dir="rtl"] .choices__list--dropdown .choices__item {
  text-align: right;
}

@media (min-width: 640px) {
  .choices__list--dropdown .choices__item--selectable {
    padding-right: 100px;
  }
  .choices__list--dropdown .choices__item--selectable:after {
    content: attr(data-select-text);
    font-size: 12px;
    opacity: 0;
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
  }
  [dir="rtl"] .choices__list--dropdown .choices__item--selectable {
    text-align: right;
    padding-left: 100px;
    padding-right: 10px;
  }
  [dir="rtl"] .choices__list--dropdown .choices__item--selectable:after {
    right: auto;
    left: 10px;
  }
}

.choices__list--dropdown .choices__item--selectable.is-highlighted {
  background-color: #f2f2f2;
}

.choices__list--dropdown .choices__item--selectable.is-highlighted:after {
  opacity: .5;
}

.choices__item {
  cursor: default;
}

.choices__item--selectable {
  cursor: pointer;
}

.choices__item--disabled {
  cursor: not-allowed;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  opacity: .5;
}

.choices__heading {
  font-weight: 600;
  font-size: 12px;
  padding: 10px;
  border-bottom: 1px solid #f7f7f7;
  color: gray;
}

.choices__button {
  text-indent: -9999px;
  -webkit-appearance: none;
  -moz-appearance: none;
       appearance: none;
  border: 0;
  background-color: transparent;
  background-repeat: no-repeat;
  background-position: center;
  cursor: pointer;
}

.choices__button:focus {
  outline: none;
}

.choices__input {
  display: inline-block;
  vertical-align: baseline;
  background-color: #f9f9f9;
  font-size: 14px;
  margin-bottom: 5px;
  border: 0;
  border-radius: 0;
  max-width: 100%;
  padding: 4px 0 4px 2px;
}

.choices__input:focus {
  outline: 0;
}

[dir="rtl"] .choices__input {
  padding-right: 2px;
  padding-left: 0;
}

.choices__placeholder {
  opacity: .5;
}

/*=====  End of Choices  ======*/
* {
  box-sizing: border-box;
}

.s007 {
  min-height: 100vh;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: center;
      justify-content: center;
  -ms-flex-align: center;
      align-items: center;
 
  padding: 15px;
  font-family: 'Roboto', sans-serif;
}

.s007 form {
  width: 100%;
  max-width: 790px;
  margin: 0;
}

.s007 form .inner-form {
  width: 100%;
}

.s007 form .inner-form .input-field {
  position: relative;
}

.s007 form .inner-form .input-field input {
  height: 100%;
  border: 0;
  background: #fff;
  display: block;
  width: 100%;
  padding: 10px 32px 10px 70px;
  font-size: 18px;
  color: #666;
  border-radius: 3px;
  height: 70px;
  color: #555;
}

.s007 form .inner-form .input-field input.placeholder {
  color: #999;
  font-size: 18px;
}

.s007 form .inner-form .input-field input:-moz-placeholder {
  color: #999;
  font-size: 18px;
}

.s007 form .inner-form .input-field input::-webkit-input-placeholder {
  color: #999;
  font-size: 18px;
}

.s007 form .inner-form .input-field input:hover, .s007 form .inner-form .input-field input:focus {
  box-shadow: none;
  outline: 0;
}

.s007 form .inner-form .input-field .btn-search {
  min-width: 100px;
  height: 40px;
  padding: 0 15px;
  background: #57b846;
  white-space: nowrap;
  border-radius: 3px;
  font-size: 14px;
  color: #fff;
  transition: all .2s ease-out, color .2s ease-out;
  border: 0;
  cursor: pointer;
  font-weight: bold;
}

.s007 form .inner-form .input-field .btn-search:hover {
  background: #4ea63f;
}

.s007 form .inner-form .input-field .btn-delete {
  min-width: 100px;
  height: 40px;
  padding: 0 15px;
  background: transparent;
  white-space: nowrap;
  border-radius: 3px;
  font-size: 14px;
  color: #555;
  transition: all .2s ease-out, color .2s ease-out;
  border: 0;
  cursor: pointer;
  font-weight: bold;
}

.s007 form .inner-form .input-field .btn-delete:hover {
  color: #000;
}

.s007 form .inner-form .basic-search {
  margin-bottom: 5px;
  box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
}

.s007 form .inner-form .basic-search .input-field {
  width: 100%;
}

.s007 form .inner-form .basic-search .input-field input {
  padding: 10px 110px 10px 70px;
}

.s007 form .inner-form .basic-search .input-field .icon-wrap {
  position: absolute;
  top: 0;
  left: 0;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: end;
      justify-content: flex-end;
  -ms-flex-align: center;
      align-items: center;
  width: 60px;
  height: 100%;
}

.s007 form .inner-form .basic-search .input-field .icon-wrap svg {
  width: 34px;
  height: 34px;
  fill: #ccc;
}

.s007 form .inner-form .basic-search .input-field .result-count {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: start;
      justify-content: flex-start;
  -ms-flex-align: center;
      align-items: center;
  width: 110px;
  top: 0;
  right: 0;
  position: absolute;
  font-weight: bold;
  color: #555;
  height: 100%;
  font-size: 14px;
}

.s007 form .inner-form .basic-search .input-field .result-count span {
  color: #57b846;
  padding-right: 5px;
}

.s007 form .inner-form .advance-search {
  background: #fff;
  padding: 40px;
  border-radius: 3px;
  box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
}

.s007 form .inner-form .advance-search .desc {
  font-size: 15px;
  color: #999;
  display: block;
  margin-bottom: 26px;
}

.s007 form .inner-form .advance-search .row {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: justify;
      justify-content: space-between;
  -ms-flex-align: center;
      align-items: center;
  margin-bottom: 20px;
}

.s007 form .inner-form .advance-search .row.second {
  margin-bottom: 46px;
}

.s007 form .inner-form .advance-search .row.third {
  margin-bottom: 0;
}

.s007 form .inner-form .advance-search .input-field {
  width: calc(33.3333% - 30px);
}

.s007 form .inner-form .advance-search .input-select {
  height: 40px;
}

.s007 form .inner-form .advance-search .choices__inner {
  background: transparent;
  border-radius: 0;
  border: 0;
  border-bottom: 2px solid #ccc;
  height: 100%;
  color: #fff;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
      align-items: center;
  padding: 0;
  padding-right: 30px;
  font-size: 14px;
}

.s007 form .inner-form .advance-search .choices__inner .choices__list.choices__list--single {
  display: -ms-flexbox;
  display: flex;
  padding: 0;
  -ms-flex-align: center;
      align-items: center;
  height: 100%;
  padding-top: 2px;
}

.s007 form .inner-form .advance-search .choices__inner .choices__item.choices__item--selectable.choices__placeholder {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
      align-items: center;
  height: 100%;
  opacity: 1;
  color: #888;
}

.s007 form .inner-form .advance-search .choices__inner .choices__list--single .choices__item {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
      align-items: center;
  height: 100%;
  color: #555;
}

.s007 form .inner-form .advance-search .choices__list.choices__list--dropdown {
  border: 0;
  background: #fff;
  padding: 20px 30px;
  margin-top: 2px;
  border-radius: 4px;
  box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
}

.s007 form .inner-form .advance-search .choices__list.choices__list--dropdown .choices__item--selectable {
  padding-right: 0;
}

.s007 form .inner-form .advance-search .choices__list--dropdown .choices__item--selectable.is-highlighted {
  background: #fff;
  color: #57b846;
}

.s007 form .inner-form .advance-search .choices__list--dropdown .choices__item {
  color: #555;
  min-height: 24px;
}

.s007 form .inner-form .advance-search .choices[data-type*="select-one"]:after {
  border: 0;
  width: 32px;
  height: 32px;
  margin: 0;
  transform: none;
  opacity: 1;
  right: 0;
  top: 10px;
  background-size: 18px 18px;
  background-position: right center;
  background-repeat: no-repeat;
}

.s007 form .inner-form .advance-search .choices[data-type*="select-one"] .choices__button {
  background-size: 16px 16px;
  background-position: right center;
  width: 32px;
  height: 32px;
  opacity: 1;
  display: none;
  top: 10px;
  right: 0;
  transform: none;
  margin: 0;
}

.s007 form .inner-form .advance-search .choices[data-type*="select-one"].valid .choices__button {
  display: block;
}


.s007 form .inner-form .advance-search .choices[data-type*="select-one"].valid:after {
  display: none;
}


.imger {
    max-width: 100%;
    height: autol
}

@media screen and (max-width: 767px) {
  .s007 form .inner-form .basic-search .input-field input {
    padding: 10px 110px 10px 60px;
  }
  .s007 form .inner-form .basic-search .input-field .icon-wrap {
    width: 60px;
    -ms-flex-pack: center;
        justify-content: center;
  }
  .s007 form .inner-form .basic-search .input-field .icon-wrap svg {
    width: 26px;
    height: 26px;
  }
  .s007 form .inner-form .advance-search .row {
    display: block;
  }
  .s007 form .inner-form .advance-search .input-field {
    width: 100%;
    margin-bottom: 20px;
  }
</style>
<section class="section-products">
    
    
		<div class="container">
		    <div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header">
										<h3>Featured Packages</h3>
										<h2>Popular Hajj & Umrah,s Packages</h2>
								</div>
						</div>
				</div>
		      <div class="s007">
		          
		    <form action="{{route('hajj_umrah_listing')}}" method="GET">
		        @csrf
        <div class="inner-form">
          <div class="basic-search">
            <div class="input-field">
              <div class="icon-wrap">
               
              </div>
              <!--<input id="search" type="text" name placeholder="Search..." />-->
              <div class="result-count">
                <span> </span></div>
            </div>
          </div>
          <div class="advance-search">
            <span class="desc"></span>
            <div class="row">
              <div class="input-field">
                <div class="input-select">
                    <!--<label>Start Date</label>-->
                    <input type ="date" class="form-control" name="start_date"/>
                  <!--<select data-trigger="" class="form-control"name="choices-single-defaul">-->
                  <!--  <option placeholder="" value="">Price</option>-->
                  <!--  <option>Price</option>-->
                  <!--  <option>SUBJECT B</option>-->
                  <!--  <option>SUBJECT C</option>-->
                  <!--</select>-->
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                     <!--<label>End Date</label>-->
                    <input type ="date" class="form-control" name="end_date"/>
                  <!--<select data-trigger=""  class="form-control"name="choices-single-defaul">-->
                  <!--  <option placeholder="" value="">Rooms</option>-->
                  <!--  <option>Rooms</option>-->
                  <!--  <option>SUBJECT B</option>-->
                  <!--  <option>SUBJECT C</option>-->
                  <!--</select>-->
                </div>
              </div>
              <div class="input-field">
                <div class="input-select">
                     <!--<label>Price From</label>-->
                    <input type ="number" min="10" class="form-control" placeholder = "Select Price From"name="price_from"/>
                  <!--<select data-trigger=""  class="form-control"name="choices-single-defaul">-->
                  <!--  <option placeholder="" value="">Hotels</option>-->
                  <!--  <option>Hotels</option>-->
                  <!--  <option>SUBJECT B</option>-->
                  <!--  <option>SUBJECT C</option>-->
                  <!--</select>-->
                </div>
              </div>
            </div>
           
            <div class="row third">
              <div class="input-field">
                <button class="theme-btn theme-btn-small m-2">Search</button>
                <a href="{{route('hajj_umrah_listing')}}"class="theme-btn theme-btn-small m-2" id="delete">Reset Filter</a>
              </div>
            </div>
          </div>
        </div>
      </form>
      </div>
      
				<div class="row">
				    @foreach($flights as $flight)
						<!-- Single Product -->
						<div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-1" class="single-product">
										<!--<div class="part-1">-->
												<!--<ul>-->
														<!--<li><a href="{{route('hajjUmrahPackage_details',$flight->id)}}"><i class="fas fa-shopping-cart"></i></a></li>-->
														<!--<li><a href="#"><i class="fas fa-heart"></i></a></li>-->
														<!--<li><a href="#"><i class="fas fa-plus"></i></a></li>-->
														<!--<li><a href="#"><i class="fas fa-expand"></i></a></li>-->
												<!--</ul>-->
										<!--</div>-->
										<a href="{{route('hajjUmrahPackage_details',$flight->id)}}">
									<img class="img-fluid imger" style = "height:300px;"src="{{$flight->image}}">
									</a>
										<div class="part-2 text-center">
  <h1 class="product-title"><b>{{$flight->title}}</b></h1>
  <h4 class="product-price">Start Date: {{ \Carbon\Carbon::parse($flight->hajjumrah->start_date)->format('F j, Y') }}</h4>
  <h4 class="product-price">End Date: {{ \Carbon\Carbon::parse($flight->hajjumrah->end_date)->format('F j, Y') }}</h4>
  <h4 class="product-price">Price From: {{$flight->hajjumrah->chamber_room_price_1}}€</h4>
</div>
								</div>
						</div>
						@endforeach
					
						</div>
				</div>
		</div>
</section>
@endsection