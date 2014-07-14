/*! ikSelect 1.0.1
	Copyright (c) 2013 Igor Kozlov
	http://igorkozlov.me */
!function(a,b,c){function d(b,c){var d={};this.el=b,this.$el=a(b);for(var e in g)d[e]=this.$el.data(e.toLowerCase());this.options=a.extend({},g,c,d),a.browser.mobile&&(this.options.filter=!1),this.init()}var e,f=a(b),g={syntax:'<div class="ik_select_link"><div class="ik_select_link_text"></div></div><div class="ik_select_dropdown"><div class="ik_select_list"></div></div>',autoWidth:!0,ddFullWidth:!0,equalWidths:!0,dynamicWidth:!1,extractLink:!1,customClass:"",linkCustomClass:"",ddCustomClass:"",ddMaxHeight:200,filter:!1,nothingFoundText:"Nothing found",isDisabled:!1,onShow:function(){},onHide:function(){},onKeyUp:function(){},onKeyDown:function(){},onHoverMove:function(){}},h=function(a){a=a.toLowerCase();var b=/(chrome)[ \/]([\w.]+)/.exec(a)||/(webkit)[ \/]([\w.]+)/.exec(a)||/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(a)||/(msie) ([\w.]+)/.exec(a)||a.indexOf("compatible")<0&&/(mozilla)(?:.*? rv:([\w.]+)|)/.exec(a)||[];return{browser:b[1]||"",version:b[2]||"0"}};if(!a.browser){var i=h(navigator.userAgent),j={};i.browser&&(j[i.browser]=!0,j.version=i.version),j.chrome?j.webkit=!0:j.webkit&&(j.safari=!0),a.browser=j}a.extend(d.prototype,{init:function(){this.$wrapper=a('<div class="ik_select">'+this.options.syntax+"</div>"),this.$link=a(".ik_select_link",this.$wrapper),this.$linkText=a(".ik_select_link_text",this.$wrapper),this.$dropdown=a(".ik_select_dropdown",this.$wrapper),this.$list=a(".ik_select_list",this.$wrapper),this.$listInner=a('<div class="ik_select_list_inner"/>'),this.$active=a([]),this.$hover=a([]),this.hoverIndex=0,this.$optionSet=a([]),this.$optgroupSet=a([]),this.$list.append(this.$listInner),this.options.filter&&(this.$filter=a([]),this.$optionSetOriginal=a([]),this.$nothingFoundText=a('<div class="ik_select_nothing_found"/>').html(this.options.nothingFoundText),this.$filterWrap=a(".ik_select_filter_wrap",this.$wrapper),this.$filterWrap.length||(this.$filterWrap=a('<div class="ik_select_filter_wrap"/>')),this.$filter=a('<input type="text" class="ik_select_filter">'),this.$filterWrap.append(this.$filter),this.$list.prepend(this.$filterWrap),this.$filter.on({"keydown.ikSelect keyup.ikSelect":a.proxy(this,"_elKeyUpDown"),"keyup.ikSelect":a.proxy(this,"_filterKeyup")})),this.$wrapper.addClass(this.options.customClass),this.$link.addClass(this.options.linkCustomClass||this.options.customClass&&this.options.customClass+"-link"),this.$dropdown.addClass(this.options.ddCustomClass||this.options.customClass&&this.options.customClass+"-dd"),this.reset(),this.toggle(!(this.options.isDisabled||this.$el.prop("disabled"))),this.$link.on("click.ikSelect",a.proxy(this,"_linkClick")),this.$el.on({"focus.ikSelect":a.proxy(this,"_elFocus"),"blur.ikSelect":a.proxy(this,"_elBlur"),"change.ikSelect":a.proxy(this,"_syncOriginalOption"),"keydown.ikSelect keyup.ikSelect":a.proxy(this,"_elKeyUpDown")}),this.$list.on({"click.ikSelect":a.proxy(this,"_optionClick"),"mouseover.ikSelect":a.proxy(this,"_optionMouseover")},".ik_select_option"),this.$wrapper.on("click",function(){return!1}),this.$el.after(this.$wrapper),this.redraw(),this.$el.appendTo(this.$wrapper)},_linkClick:function(){this.isDisabled||(this===e?this.hideDropdown():this.showDropdown())},_optionClick:function(){this._makeOptionActive(this.searchIndexes?this.$optionSetOriginal.index(this.$hover):this.hoverIndex,!0),this.hideDropdown(),this.$el.change().focus()},_optionMouseover:function(b){var c=a(b.currentTarget);c.hasClass("ik_select_option_disabled")||(this.$hover.removeClass("ik_select_hover"),this.$hover=c.addClass("ik_select_hover"),this.hoverIndex=this.$optionSet.index(this.$hover))},_makeOptionActive:function(b,c){var d=a(this.el.options[b]);this.$linkText.text(d.text()),this.$link.toggleClass("ik_select_link_novalue",!d.attr("value")),this.$hover.removeClass("ik_select_hover"),this.$active.removeClass("ik_select_active"),this.$hover=this.$active=this.$optionSet.eq(b).addClass("ik_select_hover ik_select_active"),this.hoverIndex=b,c&&this._syncFakeOption()},_elKeyUpDown:function(b){var c,d=a(b.currentTarget),e=b.type,f=b.which;switch(f){case 38:"keydown"===e&&(b.preventDefault(),this._moveToPrevActive());break;case 40:"keydown"===e&&(b.preventDefault(),this._moveToNextActive());break;case 33:"keydown"===e&&(b.preventDefault(),c=this.$hover.position().top-this.$listInner.height(),this._moveToPrevActive(function(a){return c>=a}));break;case 34:"keydown"===e&&(b.preventDefault(),c=this.$hover.position().top+this.$listInner.height(),this._moveToNextActive(function(a){return a>=c}));break;case 36:"keydown"===e&&d.is(this.$el)&&(b.preventDefault(),this._moveToFirstActive());break;case 35:"keydown"===e&&d.is(this.$el)&&(b.preventDefault(),this._moveToLastActive());break;case 32:"keydown"===e&&d.is(this.$el)&&(b.preventDefault(),this.$dropdown.is(":visible")?this.$hover.click():this._linkClick());break;case 13:"keydown"===e&&this.$dropdown.is(":visible")&&(b.preventDefault(),this.$hover.click());break;case 27:"keydown"===e&&this.$dropdown.is(":visible")&&(b.preventDefault(),this.hideDropdown());break;case 9:"keydown"===e&&(a.browser.webkit&&this.$dropdown.is(":visible")?b.preventDefault():this.hideDropdown());break;default:"keyup"===e&&d.is(this.$el)&&this._syncOriginalOption()}"keyup"===e&&a.browser.mozilla&&this._syncFakeOption(),"keydown"===e&&(this.options.onKeyDown(this,f),this.$el.trigger("ikkeydown",[this,f])),"keyup"===e&&(this.options.onKeyUp(this,f),this.$el.trigger("ikkeyup",[this,f]))},_moveTo:function(b){var c,d,e;return!this.$dropdown.is(":visible")&&a.browser.webkit?(this.showDropdown(),this):(!this.$dropdown.is(":visible")||a.browser.mozilla?this._makeOptionActive(b,!0):(this.$hover.removeClass("ik_select_hover"),this.$hover=this.$optionSet.eq(b).addClass("ik_select_hover"),this.hoverIndex=b),c=this.$hover.position().top,d=c+this.$active.outerHeight(),this.$hover.index()||(e=this.$hover.closest(".ik_select_optgroup"),e.length&&(c=e.position().top)),d>this.$listInner.height()?this.$listInner.scrollTop(this.$listInner.scrollTop()+d-this.$listInner.height()):0>c&&this.$listInner.scrollTop(this.$listInner.scrollTop()+c),this.options.onHoverMove(this),this.$el.trigger("ikhovermove",this),void 0)},_moveToFirstActive:function(){for(var a=0;a<this.$optionSet.length;a++)if(!this.$optionSet.eq(a).hasClass("ik_select_option_disabled")){this._moveTo(a);break}},_moveToLastActive:function(){for(var a=this.$optionSet.length-1;a>=0;a++)if(!this.$optionSet.eq(a).hasClass("ik_select_option_disabled")){this._moveTo(a);break}},_moveToPrevActive:function(a){for(var b,c=this.hoverIndex-1;c>=0;c--)if(b=this.$optionSet.eq(c),!b.hasClass("ik_select_option_disabled")&&("undefined"==typeof a||a(b.position().top))){this._moveTo(c);break}},_moveToNextActive:function(a){for(var b,c=this.hoverIndex+1;c<this.$optionSet.length;c++)if(b=this.$optionSet.eq(c),!b.hasClass("ik_select_option_disabled")&&("undefined"==typeof a||a(b.position().top))){this._moveTo(c);break}},_elFocus:function(){var a,b,c,d;return this.isDisabled?this:(this.$link.addClass("ik_select_link_focus"),a=this.$wrapper.offset().top,b=this.$wrapper.height(),c=f.scrollTop(),d=f.height(),(a+b>c+d||c>a)&&f.scrollTop(a-d/2),void 0)},_elBlur:function(){this.$link.removeClass("ik_select_link_focus")},_filterKeyup:function(){var b,c=a.trim(this.$filter.val());this.$listInner.show(),"undefined"==typeof this.searchIndexes&&(this.$optionSetOriginal=this.$optionSet,this.searchIndexes=a.makeArray(this.$optionSet.map(function(b,c){return a(c).text().toLowerCase()}))),c!==b&&(""===c?(this.$optionSet=this.$optionSetOriginal.show(),this.$optgroupSet.show(),this.$nothingFoundText.remove()):(this.$optionSet=a([]),this.$optgroupSet.show(),this.$optionSetOriginal.each(a.proxy(function(b,d){var e=a(d);this.searchIndexes[b].indexOf(c.toLowerCase())>=0?(this.$optionSet=this.$optionSet.add(e),e.show()):e.hide()},this)),this.$optionSet.length?(this.$nothingFoundText.remove(),this.$optgroupSet.each(function(b,c){var d=a(c);a(".ik_select_option:visible",d).length||d.hide()}),this.$hover.is(":visible")||this._moveToFirstActive()):(this.$listInner.hide(),this.$list.append(this.$nothingFoundText))),b=c)},_syncFakeOption:function(){this.el.selectedIndex=this.hoverIndex},_syncOriginalOption:function(){this._makeOptionActive(this.el.selectedIndex)},_fixHeight:function(){this.$dropdown.show(),this.$listInner.css("height","auto"),this.$listInner.height()>this.options.ddMaxHeight&&this.$listInner.css({overflow:"auto",height:this.options.ddMaxHeight,position:"relative"}),this.$dropdown.hide()},redraw:function(){var b,c,d;this.options.filter&&this.$filter.hide(),this.$wrapper.css({position:"relative"}),this.$dropdown.css({position:"absolute",zIndex:9998,width:"100%"}),this.$list.css({position:"relative"}),this._fixHeight(),(this.options.dynamicWidth||this.options.autoWidth||this.options.ddFullWidth)&&(this.$wrapper.width(""),this.$dropdown.show().width(9999),this.$listInner.css("float","left"),this.$list.css("float","left"),b=this.$list.outerWidth(!0),c=this.$listInner.width()-this.$listInnerUl.width(),this.$list.css("float",""),this.$listInner.css("float",""),this.$dropdown.css("width","100%"),this.options.ddFullWidth&&this.$dropdown.width(b+c),this.options.dynamicWidth?this.$wrapper.css({display:"inline-block",width:"auto",verticalAlign:"top"}):this.options.autoWidth&&this.$wrapper.width(b+(this.options.equalWidths?c:0)).addClass("ik_select_autowidth"),d=this.$wrapper.parent().width(),this.$wrapper.width()>d&&this.$wrapper.width(d)),this.options.filter&&this.$filter.show().outerWidth(this.$filterWrap.width()),this.$dropdown.hide(),this.$el.css({position:"absolute",margin:0,padding:0,top:0,left:-9999}),a.browser.mobile&&this.$el.css({opacity:0,left:0,height:this.$wrapper.height(),width:this.$wrapper.width()})},reset:function(){var b="";this.$linkText.html(this.$el.val()),this.$listInner.empty(),b="<ul>",this.$el.children().each(a.proxy(function(c,d){var e,f=a(d),g=d.tagName.toLowerCase();"optgroup"===g?(e=f.children().map(a.proxy(function(b,c){return this._generateOptionObject(a(c))},this)),e=a.makeArray(e),b+=this._renderListOptgroup({label:f.attr("label")||"&nbsp;",isDisabled:f.is(":disabled"),options:e})):"option"===g&&(b+=this._renderListOption(this._generateOptionObject(f)))},this)),b+="</ul>",this.$listInner.append(b),this._syncOriginalOption(),this.$listInnerUl=a("> ul",this.$listInner),this.$optgroupSet=a(".ik_select_optgroup",this.$listInner),this.$optionSet=a(".ik_select_option",this.$listInner)},hideDropdown:function(){this.options.filter&&this.$filter.val("").keyup(),this.$dropdown.hide().appendTo(this.$wrapper).css({left:"",top:""}),this.options.extractLink&&(this.$wrapper.outerWidth(this.$wrapper.data("outerWidth")),this.$wrapper.height(""),this.$link.removeClass("ik_select_link_extracted").css({position:"",top:"",left:"",zIndex:""}).prependTo(this.$wrapper)),e=null,this.$el.focus(),this.options.onHide(this),this.$el.trigger("ikhide",this)},showDropdown:function(){var a,b,c,d,g,h,i,j,k;e!==this&&this.$optionSet.length&&(e&&e.hideDropdown(),this._syncOriginalOption(),this.$dropdown.show(),a=this.$dropdown.offset(),b=this.$dropdown.outerWidth(!0),c=this.$dropdown.outerHeight(!0),d=this.$wrapper.offset(),h=f.width(),i=f.height(),j=f.scrollTop(),this.options.ddFullWidth&&d.left+b>h&&(a.left=h-b),a.top+c>j+i&&(a.top=j+i-c),this.$dropdown.css({left:a.left,top:a.top,width:this.$dropdown.width()}).appendTo("body"),this.options.extractLink&&(k=this.$link.offset(),g=this.$wrapper.outerWidth(),this.$wrapper.data("outerWidth",g),this.$wrapper.outerWidth(g),this.$wrapper.outerHeight(this.$wrapper.outerHeight()),this.$link.outerWidth(this.$link.outerWidth()),this.$link.addClass("ik_select_link_extracted").css({position:"absolute",top:k.top,left:k.left,zIndex:9999}).appendTo("body")),this.$listInner.scrollTop(this.$active.position().top-this.$list.height()/2),this.options.filter?this.$filter.focus():this.$el.focus(),e=this,this.options.onShow(this),this.$el.trigger("ikshow",this))},_generateOptionObject:function(a){return{value:a.val(),label:a.html()||"&nbsp;",isDisabled:a.is(":disabled")}},_renderListOption:function(a){var b,c=a.isDisabled?" ik_select_option_disabled":"";return b='<li class="ik_select_option'+c+'" data-value="'+a.value+'">',b+='<span class="ik_select_option_label">',b+=a.label,b+="</span>",b+="</li>"},_renderListOptgroup:function(b){var c,d=b.isDisabled?" ik_select_optgroup_disabled":"";return c='<li class="ik_select_optgroup'+d+'">',c+='<div class="ik_select_optgroup_label">'+b.label+"</div>",c+="<ul>",a.isArray(b.options)&&a.each(b.options,a.proxy(function(a,b){c+=this._renderListOption({value:b.value,label:b.label||"&nbsp;",isDisabled:b.isDisabled})},this)),c+="</ul>",c+="</li>"},_renderOption:function(a){return'<option value="'+a.value+'">'+a.label+"</option>"},_renderOptgroup:function(b){var c;return c='<optgroup label="'+b.label+'">',a.isArray(b.options)&&a.each(b.options,a.proxy(function(a,b){c+=this._renderOption(b)},this)),c+="</option>"},addOptions:function(b,c,d){var e,f,g="",h="",i=this.$listInnerUl,j=this.$el;b=a.isArray(b)?b:[b],a.each(b,a.proxy(function(a,b){g+=this._renderListOption(b),h+=this._renderOption(b)},this)),a.isNumeric(d)&&d<this.$optgroupSet.length&&(i=this.$optgroupSet.eq(d),j=a("optgroup",this.$el).eq(d)),a.isNumeric(c)&&(e=a(".ik_select_option",i),c<e.length&&(e.eq(c).before(g),f=a("option",j),f.eq(c).before(h))),f||(i.append(g),j.append(h)),this.$optionSet=a(".ik_select_option",this.$listInner),this._fixHeight()},addOptgroups:function(b,c){var d="",e="";b&&(b=a.isArray(b)?b:[b],a.each(b,a.proxy(function(a,b){d+=this._renderListOptgroup(b),e+=this._renderOptgroup(b)},this)),a.isNumeric(c)&&c<this.$optgroupSet.length?(this.$optgroupSet.eq(c).before(d),a("optgroup",this.$el).eq(c).before(e)):(this.$listInnerUl.append(d),this.$el.append(e)),this.$optgroupSet=a(".ik_select_optgroup",this.$listInner),this.$optionSet=a(".ik_select_option",this.$listInner),this._fixHeight())},removeOptions:function(b,c){var d,e,f=a([]);a.isNumeric(c)&&(0>c?(d=a("> .ik_select_option",this.$listInnerUl),e=a("> option",this.$el)):c<this.$optgroupSet.length&&(d=a(".ik_select_option",this.$optgroupSet.eq(c)),e=a("optgroup",this.$el).eq(c).find("option"))),d||(d=this.$optionSet,e=a(this.el.options)),a.isArray(b)||(b=[b]),a.each(b,a.proxy(function(a,b){b<d.length&&(f=f.add(d.eq(b)).add(e.eq(b)))},this)),f.remove(),this.$optionSet=a(".ik_select_option",this.$listInner),this._syncOriginalOption(),this._fixHeight()},removeOptgroups:function(b){var c=a([]),d=a("optgroup",this.el);a.isArray(b)||(b=[b]),a.each(b,a.proxy(function(a,b){b<this.$optgroupSet.length&&(c=c.add(this.$optgroupSet.eq(b)).add(d.eq(b)))},this)),c.remove(),this.$optionSet=a(".ik_select_option",this.$listInner),this.$optgroupSet=a(".ik_select_optgroup",this.$listInner),this._syncOriginalOption(),this._fixHeight()},disable:function(){this.toggle(!1)},enable:function(){this.toggle(!0)},toggle:function(a){this.isDisabled="undefined"!=typeof a?!a:!this.isDisabled,this.$el.prop("disabled",this.isDisabled),this.$link.toggleClass("ik_select_link_disabled",this.isDisabled)},select:function(a,b){b?this.el.selectedIndex=a:this.$el.val(a),this._syncOriginalOption()},disableOptgroups:function(a){this.toggleOptgroups(a,!1)},enableOptgroups:function(a){this.toggleOptgroups(a,!0)},toggleOptgroups:function(b,c){a.isArray(b)||(b=[b]),a.each(b,a.proxy(function(b,d){var e,f,g,h=[],i=a("optgroup",this.$el).eq(d);e="undefined"!=typeof c?c:i.prop("disabled"),i.prop("disabled",!e),this.$optgroupSet.eq(d).toggleClass("ik_select_optgroup_disabled",!e),f=a("option",i),g=a(this.el.options).index(f.eq(0));for(var j=g;j<g+f.length;j++)h.push(j);this.toggleOptions(h,!0,e)},this)),this._syncOriginalOption()},disableOptions:function(a,b){this.toggleOptions(a,b,!1)},enableOptions:function(a,b){this.toggleOptions(a,b,!0)},toggleOptions:function(b,c,d){var e=a("option",this.el);a.isArray(b)||(b=[b]);var f=a.proxy(function(a,b){var c="undefined"!=typeof d?d:a.prop("disabled");a.prop("disabled",!c),this.$optionSet.eq(b).toggleClass("ik_select_option_disabled",!c)},this);a.each(b,function(b,d){c?f(e.eq(d),d):e.each(function(b,c){var e=a(c);return e.val()===d?(f(e,b),this):void 0})}),this._syncOriginalOption()},detach:function(){this.$el.off(".ikSelect").css({width:"",height:"",left:"",top:"",position:"",margin:"",padding:""}),this.$wrapper.before(this.$el),this.$wrapper.remove(),this.$el.removeData("plugin_ikSelect")}}),a.fn.ikSelect=function(b){var c;return a.browser.operamini?this:(c=Array.prototype.slice.call(arguments,1),this.each(function(){var e;a.data(this,"plugin_ikSelect")?"string"==typeof b&&(e=a.data(this,"plugin_ikSelect"),"function"==typeof e[b]&&e[b].apply(e,c)):a.data(this,"plugin_ikSelect",new d(this,b))}))},a.ikSelect={extendDefaults:function(b){a.extend(g,b)}},a(c).bind("click.ikSelect",function(){e&&e.hideDropdown()})}(jQuery,window,document);
/*
 * jQuery FlexSlider v2.2.2
 * Copyright 2012 WooThemes
 * Contributing Author: Tyler Smith
 */
;(function(d){d.flexslider=function(g,l){var a=d(g);a.vars=d.extend({},d.flexslider.defaults,l);var e=a.vars.namespace,v=window.navigator&&window.navigator.msPointerEnabled&&window.MSGesture,t=("ontouchstart"in window||v||window.DocumentTouch&&document instanceof DocumentTouch)&&a.vars.touch,m="",u,p="vertical"===a.vars.direction,n=a.vars.reverse,h=0<a.vars.itemWidth,r="fade"===a.vars.animation,q=""!==a.vars.asNavFor,c={};d.data(g,"flexslider",a);c={init:function(){a.animating=!1;a.currentSlide=parseInt(a.vars.startAt?
a.vars.startAt:0,10);isNaN(a.currentSlide)&&(a.currentSlide=0);a.animatingTo=a.currentSlide;a.atEnd=0===a.currentSlide||a.currentSlide===a.last;a.containerSelector=a.vars.selector.substr(0,a.vars.selector.search(" "));a.slides=d(a.vars.selector,a);a.container=d(a.containerSelector,a);a.count=a.slides.length;a.syncExists=0<d(a.vars.sync).length;"slide"===a.vars.animation&&(a.vars.animation="swing");a.prop=p?"top":"marginLeft";a.args={};a.manualPause=!1;a.stopped=!1;a.started=!1;a.startTimeout=null;
a.transitions=!a.vars.video&&!r&&a.vars.useCSS&&function(){var b=document.createElement("div"),f=["perspectiveProperty","WebkitPerspective","MozPerspective","OPerspective","msPerspective"],k;for(k in f)if(void 0!==b.style[f[k]])return a.pfx=f[k].replace("Perspective","").toLowerCase(),a.prop="-"+a.pfx+"-transform",!0;return!1}();""!==a.vars.controlsContainer&&(a.controlsContainer=0<d(a.vars.controlsContainer).length&&d(a.vars.controlsContainer));""!==a.vars.manualControls&&(a.manualControls=0<d(a.vars.manualControls).length&&
d(a.vars.manualControls));a.vars.randomize&&(a.slides.sort(function(){return Math.round(Math.random())-0.5}),a.container.empty().append(a.slides));a.doMath();a.setup("init");a.vars.controlNav&&c.controlNav.setup();a.vars.directionNav&&c.directionNav.setup();a.vars.keyboard&&(1===d(a.containerSelector).length||a.vars.multipleKeyboard)&&d(document).bind("keyup",function(b){b=b.keyCode;a.animating||39!==b&&37!==b||(b=39===b?a.getTarget("next"):37===b?a.getTarget("prev"):!1,a.flexAnimate(b,a.vars.pauseOnAction))});
a.vars.mousewheel&&a.bind("mousewheel",function(b,f,k,d){b.preventDefault();b=0>f?a.getTarget("next"):a.getTarget("prev");a.flexAnimate(b,a.vars.pauseOnAction)});a.vars.pausePlay&&c.pausePlay.setup();a.vars.slideshow&&a.vars.pauseInvisible&&c.pauseInvisible.init();a.vars.slideshow&&(a.vars.pauseOnHover&&a.hover(function(){a.manualPlay||a.manualPause||a.pause()},function(){a.manualPause||a.manualPlay||a.stopped||a.play()}),a.vars.pauseInvisible&&c.pauseInvisible.isHidden()||(0<a.vars.initDelay?a.startTimeout=
setTimeout(a.play,a.vars.initDelay):a.play()));q&&c.asNav.setup();t&&a.vars.touch&&c.touch();(!r||r&&a.vars.smoothHeight)&&d(window).bind("resize orientationchange focus",c.resize);a.find("img").attr("draggable","false");setTimeout(function(){a.vars.start(a)},200)},asNav:{setup:function(){a.asNav=!0;a.animatingTo=Math.floor(a.currentSlide/a.move);a.currentItem=a.currentSlide;a.slides.removeClass(e+"active-slide").eq(a.currentItem).addClass(e+"active-slide");if(v)g._slider=a,a.slides.each(function(){this._gesture=
new MSGesture;this._gesture.target=this;this.addEventListener("MSPointerDown",function(a){a.preventDefault();a.currentTarget._gesture&&a.currentTarget._gesture.addPointer(a.pointerId)},!1);this.addEventListener("MSGestureTap",function(b){b.preventDefault();b=d(this);var f=b.index();d(a.vars.asNavFor).data("flexslider").animating||b.hasClass("active")||(a.direction=a.currentItem<f?"next":"prev",a.flexAnimate(f,a.vars.pauseOnAction,!1,!0,!0))})});else a.slides.on("click touchend MSPointerUp",function(b){b.preventDefault();
b=d(this);var f=b.index();0>=b.offset().left-d(a).scrollLeft()&&b.hasClass(e+"active-slide")?a.flexAnimate(a.getTarget("prev"),!0):d(a.vars.asNavFor).data("flexslider").animating||b.hasClass(e+"active-slide")||(a.direction=a.currentItem<f?"next":"prev",a.flexAnimate(f,a.vars.pauseOnAction,!1,!0,!0))})}},controlNav:{setup:function(){a.manualControls?c.controlNav.setupManual():c.controlNav.setupPaging()},setupPaging:function(){var b=1,f,k;a.controlNavScaffold=d('<ol class="'+e+"control-nav "+e+("thumbnails"===
a.vars.controlNav?"control-thumbs":"control-paging")+'"></ol>');if(1<a.pagingCount)for(var g=0;g<a.pagingCount;g++)k=a.slides.eq(g),f="thumbnails"===a.vars.controlNav?'<img src="'+k.attr("data-thumb")+'"/>':"<a>"+b+"</a>","thumbnails"===a.vars.controlNav&&!0===a.vars.thumbCaptions&&(k=k.attr("data-thumbcaption"),""!=k&&void 0!=k&&(f+='<span class="'+e+'caption">'+k+"</span>")),a.controlNavScaffold.append("<li>"+f+"</li>"),b++;a.controlsContainer?d(a.controlsContainer).append(a.controlNavScaffold):
a.append(a.controlNavScaffold);c.controlNav.set();c.controlNav.active();a.controlNavScaffold.delegate("a, img","click touchend MSPointerUp",function(b){b.preventDefault();if(""===m||m===b.type){var f=d(this),k=a.controlNav.index(f);f.hasClass(e+"active")||(a.direction=k>a.currentSlide?"next":"prev",a.flexAnimate(k,a.vars.pauseOnAction))}""===m&&(m=b.type);c.setToClearWatchedEvent()})},setupManual:function(){a.controlNav=a.manualControls;c.controlNav.active();a.controlNav.bind("click touchend MSPointerUp",
function(b){b.preventDefault();if(""===m||m===b.type){var f=d(this),k=a.controlNav.index(f);f.hasClass(e+"active")||(k>a.currentSlide?a.direction="next":a.direction="prev",a.flexAnimate(k,a.vars.pauseOnAction))}""===m&&(m=b.type);c.setToClearWatchedEvent()})},set:function(){a.controlNav=d("."+e+"control-nav li "+("thumbnails"===a.vars.controlNav?"img":"a"),a.controlsContainer?a.controlsContainer:a)},active:function(){a.controlNav.removeClass(e+"active").eq(a.animatingTo).addClass(e+"active")},update:function(b,
f){1<a.pagingCount&&"add"===b?a.controlNavScaffold.append(d("<li><a>"+a.count+"</a></li>")):1===a.pagingCount?a.controlNavScaffold.find("li").remove():a.controlNav.eq(f).closest("li").remove();c.controlNav.set();1<a.pagingCount&&a.pagingCount!==a.controlNav.length?a.update(f,b):c.controlNav.active()}},directionNav:{setup:function(){var b=d('<ul class="'+e+'direction-nav"><li><a class="'+e+'prev" href="#">'+a.vars.prevText+'</a></li><li><a class="'+e+'next" href="#">'+a.vars.nextText+"</a></li></ul>");
a.controlsContainer?(d(a.controlsContainer).append(b),a.directionNav=d("."+e+"direction-nav li a",a.controlsContainer)):(a.append(b),a.directionNav=d("."+e+"direction-nav li a",a));c.directionNav.update();a.directionNav.bind("click touchend MSPointerUp",function(b){b.preventDefault();var k;if(""===m||m===b.type)k=d(this).hasClass(e+"next")?a.getTarget("next"):a.getTarget("prev"),a.flexAnimate(k,a.vars.pauseOnAction);""===m&&(m=b.type);c.setToClearWatchedEvent()})},update:function(){var b=e+"disabled";
1===a.pagingCount?a.directionNav.addClass(b).attr("tabindex","-1"):a.vars.animationLoop?a.directionNav.removeClass(b).removeAttr("tabindex"):0===a.animatingTo?a.directionNav.removeClass(b).filter("."+e+"prev").addClass(b).attr("tabindex","-1"):a.animatingTo===a.last?a.directionNav.removeClass(b).filter("."+e+"next").addClass(b).attr("tabindex","-1"):a.directionNav.removeClass(b).removeAttr("tabindex")}},pausePlay:{setup:function(){var b=d('<div class="'+e+'pauseplay"><a></a></div>');a.controlsContainer?
(a.controlsContainer.append(b),a.pausePlay=d("."+e+"pauseplay a",a.controlsContainer)):(a.append(b),a.pausePlay=d("."+e+"pauseplay a",a));c.pausePlay.update(a.vars.slideshow?e+"pause":e+"play");a.pausePlay.bind("click touchend MSPointerUp",function(b){b.preventDefault();if(""===m||m===b.type)d(this).hasClass(e+"pause")?(a.manualPause=!0,a.manualPlay=!1,a.pause()):(a.manualPause=!1,a.manualPlay=!0,a.play());""===m&&(m=b.type);c.setToClearWatchedEvent()})},update:function(b){"play"===b?a.pausePlay.removeClass(e+
"pause").addClass(e+"play").html(a.vars.playText):a.pausePlay.removeClass(e+"play").addClass(e+"pause").html(a.vars.pauseText)}},touch:function(){var b,f,k,d,c,e,m=!1,l=0,q=0,s=0;if(v){g.style.msTouchAction="none";g._gesture=new MSGesture;g._gesture.target=g;g.addEventListener("MSPointerDown",t,!1);g._slider=a;g.addEventListener("MSGestureChange",u,!1);g.addEventListener("MSGestureEnd",y,!1);var t=function(b){b.stopPropagation();a.animating?b.preventDefault():(a.pause(),g._gesture.addPointer(b.pointerId),
s=0,d=p?a.h:a.w,e=Number(new Date),k=h&&n&&a.animatingTo===a.last?0:h&&n?a.limit-(a.itemW+a.vars.itemMargin)*a.move*a.animatingTo:h&&a.currentSlide===a.last?a.limit:h?(a.itemW+a.vars.itemMargin)*a.move*a.currentSlide:n?(a.last-a.currentSlide+a.cloneOffset)*d:(a.currentSlide+a.cloneOffset)*d)},u=function(a){a.stopPropagation();var b=a.target._slider;if(b){var f=-a.translationX,h=-a.translationY;c=s+=p?h:f;m=p?Math.abs(s)<Math.abs(-f):Math.abs(s)<Math.abs(-h);if(a.detail===a.MSGESTURE_FLAG_INERTIA)setImmediate(function(){g._gesture.stop()});
else if(!m||500<Number(new Date)-e)a.preventDefault(),!r&&b.transitions&&(b.vars.animationLoop||(c=s/(0===b.currentSlide&&0>s||b.currentSlide===b.last&&0<s?Math.abs(s)/d+2:1)),b.setProps(k+c,"setTouch"))}},y=function(a){a.stopPropagation();if(a=a.target._slider){if(a.animatingTo===a.currentSlide&&!m&&null!==c){var g=n?-c:c,h=0<g?a.getTarget("next"):a.getTarget("prev");a.canAdvance(h)&&(550>Number(new Date)-e&&50<Math.abs(g)||Math.abs(g)>d/2)?a.flexAnimate(h,a.vars.pauseOnAction):r||a.flexAnimate(a.currentSlide,
a.vars.pauseOnAction,!0)}k=c=f=b=null;s=0}}}else{g.addEventListener("touchstart",z,!1);var z=function(c){if(a.animating)c.preventDefault();else if(window.navigator.msPointerEnabled||1===c.touches.length)a.pause(),d=p?a.h:a.w,e=Number(new Date),l=c.touches[0].pageX,q=c.touches[0].pageY,k=h&&n&&a.animatingTo===a.last?0:h&&n?a.limit-(a.itemW+a.vars.itemMargin)*a.move*a.animatingTo:h&&a.currentSlide===a.last?a.limit:h?(a.itemW+a.vars.itemMargin)*a.move*a.currentSlide:n?(a.last-a.currentSlide+a.cloneOffset)*
d:(a.currentSlide+a.cloneOffset)*d,b=p?q:l,f=p?l:q,g.addEventListener("touchmove",w,!1),g.addEventListener("touchend",x,!1)},w=function(g){l=g.touches[0].pageX;q=g.touches[0].pageY;c=p?b-q:b-l;m=p?Math.abs(c)<Math.abs(l-f):Math.abs(c)<Math.abs(q-f);if(!m||500<Number(new Date)-e)g.preventDefault(),!r&&a.transitions&&(a.vars.animationLoop||(c/=0===a.currentSlide&&0>c||a.currentSlide===a.last&&0<c?Math.abs(c)/d+2:1),a.setProps(k+c,"setTouch"))},x=function(h){g.removeEventListener("touchmove",w,!1);if(a.animatingTo===
a.currentSlide&&!m&&null!==c){h=n?-c:c;var l=0<h?a.getTarget("next"):a.getTarget("prev");a.canAdvance(l)&&(550>Number(new Date)-e&&50<Math.abs(h)||Math.abs(h)>d/2)?a.flexAnimate(l,a.vars.pauseOnAction):r||a.flexAnimate(a.currentSlide,a.vars.pauseOnAction,!0)}g.removeEventListener("touchend",x,!1);k=c=f=b=null}}},resize:function(){!a.animating&&a.is(":visible")&&(h||a.doMath(),r?c.smoothHeight():h?(a.slides.width(a.computedW),a.update(a.pagingCount),a.setProps()):p?(a.viewport.height(a.h),a.setProps(a.h,
"setTotal")):(a.vars.smoothHeight&&c.smoothHeight(),a.newSlides.width(a.computedW),a.setProps(a.computedW,"setTotal")))},smoothHeight:function(b){if(!p||r){var f=r?a:a.viewport;b?f.animate({height:a.slides.eq(a.animatingTo).height()},b):f.height(a.slides.eq(a.animatingTo).height())}},sync:function(b){var f=d(a.vars.sync).data("flexslider"),c=a.animatingTo;switch(b){case "animate":f.flexAnimate(c,a.vars.pauseOnAction,!1,!0);break;case "play":f.playing||f.asNav||f.play();break;case "pause":f.pause()}},
uniqueID:function(a){a.find("[id]").each(function(){var a=d(this);a.attr("id",a.attr("id")+"_clone")});return a},pauseInvisible:{visProp:null,init:function(){var b=["webkit","moz","ms","o"];if("hidden"in document)return"hidden";for(var f=0;f<b.length;f++)b[f]+"Hidden"in document&&(c.pauseInvisible.visProp=b[f]+"Hidden");c.pauseInvisible.visProp&&(b=c.pauseInvisible.visProp.replace(/[H|h]idden/,"")+"visibilitychange",document.addEventListener(b,function(){c.pauseInvisible.isHidden()?a.startTimeout?
clearTimeout(a.startTimeout):a.pause():a.started?a.play():0<a.vars.initDelay?setTimeout(a.play,a.vars.initDelay):a.play()}))},isHidden:function(){return document[c.pauseInvisible.visProp]||!1}},setToClearWatchedEvent:function(){clearTimeout(u);u=setTimeout(function(){m=""},3E3)}};a.flexAnimate=function(b,f,k,g,m){a.vars.animationLoop||b===a.currentSlide||(a.direction=b>a.currentSlide?"next":"prev");q&&1===a.pagingCount&&(a.direction=a.currentItem<b?"next":"prev");if(!a.animating&&(a.canAdvance(b,
m)||k)&&a.is(":visible")){if(q&&g)if(k=d(a.vars.asNavFor).data("flexslider"),a.atEnd=0===b||b===a.count-1,k.flexAnimate(b,!0,!1,!0,m),a.direction=a.currentItem<b?"next":"prev",k.direction=a.direction,Math.ceil((b+1)/a.visible)-1!==a.currentSlide&&0!==b)a.currentItem=b,a.slides.removeClass(e+"active-slide").eq(b).addClass(e+"active-slide"),b=Math.floor(b/a.visible);else return a.currentItem=b,a.slides.removeClass(e+"active-slide").eq(b).addClass(e+"active-slide"),!1;a.animating=!0;a.animatingTo=b;
f&&a.pause();a.vars.before(a);a.syncExists&&!m&&c.sync("animate");a.vars.controlNav&&c.controlNav.active();h||a.slides.removeClass(e+"active-slide").eq(b).addClass(e+"active-slide");a.atEnd=0===b||b===a.last;a.vars.directionNav&&c.directionNav.update();b===a.last&&(a.vars.end(a),a.vars.animationLoop||a.pause());if(r)t?(a.slides.eq(a.currentSlide).css({opacity:0,zIndex:1}),a.slides.eq(b).css({opacity:1,zIndex:2}),a.wrapup(l)):(a.slides.eq(a.currentSlide).css({zIndex:1}).animate({opacity:0},a.vars.animationSpeed,
a.vars.easing),a.slides.eq(b).css({zIndex:2}).animate({opacity:1},a.vars.animationSpeed,a.vars.easing,a.wrapup));else{var l=p?a.slides.filter(":first").height():a.computedW;h?(b=a.vars.itemMargin,b=(a.itemW+b)*a.move*a.animatingTo,b=b>a.limit&&1!==a.visible?a.limit:b):b=0===a.currentSlide&&b===a.count-1&&a.vars.animationLoop&&"next"!==a.direction?n?(a.count+a.cloneOffset)*l:0:a.currentSlide===a.last&&0===b&&a.vars.animationLoop&&"prev"!==a.direction?n?0:(a.count+1)*l:n?(a.count-1-b+a.cloneOffset)*
l:(b+a.cloneOffset)*l;a.setProps(b,"",a.vars.animationSpeed);a.transitions?(a.vars.animationLoop&&a.atEnd||(a.animating=!1,a.currentSlide=a.animatingTo),a.container.unbind("webkitTransitionEnd transitionend"),a.container.bind("webkitTransitionEnd transitionend",function(){a.wrapup(l)})):a.container.animate(a.args,a.vars.animationSpeed,a.vars.easing,function(){a.wrapup(l)})}a.vars.smoothHeight&&c.smoothHeight(a.vars.animationSpeed)}};a.wrapup=function(b){r||h||(0===a.currentSlide&&a.animatingTo===
a.last&&a.vars.animationLoop?a.setProps(b,"jumpEnd"):a.currentSlide===a.last&&0===a.animatingTo&&a.vars.animationLoop&&a.setProps(b,"jumpStart"));a.animating=!1;a.currentSlide=a.animatingTo;a.vars.after(a)};a.animateSlides=function(){a.animating||a.flexAnimate(a.getTarget("next"))};a.pause=function(){clearInterval(a.animatedSlides);a.animatedSlides=null;a.playing=!1;a.vars.pausePlay&&c.pausePlay.update("play");a.syncExists&&c.sync("pause")};a.play=function(){a.playing&&clearInterval(a.animatedSlides);
a.animatedSlides=a.animatedSlides||setInterval(a.animateSlides,a.vars.slideshowSpeed);a.started=a.playing=!0;a.vars.pausePlay&&c.pausePlay.update("pause");a.syncExists&&c.sync("play")};a.stop=function(){a.pause();a.stopped=!0};a.canAdvance=function(b,f){var c=q?a.pagingCount-1:a.last;return f?!0:q&&a.currentItem===a.count-1&&0===b&&"prev"===a.direction?!0:q&&0===a.currentItem&&b===a.pagingCount-1&&"next"!==a.direction?!1:b!==a.currentSlide||q?a.vars.animationLoop?!0:a.atEnd&&0===a.currentSlide&&b===
c&&"next"!==a.direction?!1:a.atEnd&&a.currentSlide===c&&0===b&&"next"===a.direction?!1:!0:!1};a.getTarget=function(b){a.direction=b;return"next"===b?a.currentSlide===a.last?0:a.currentSlide+1:0===a.currentSlide?a.last:a.currentSlide-1};a.setProps=function(b,f,c){var d=function(){var c=b?b:(a.itemW+a.vars.itemMargin)*a.move*a.animatingTo;return-1*function(){if(h)return"setTouch"===f?b:n&&a.animatingTo===a.last?0:n?a.limit-(a.itemW+a.vars.itemMargin)*a.move*a.animatingTo:a.animatingTo===a.last?a.limit:
c;switch(f){case "setTotal":return n?(a.count-1-a.currentSlide+a.cloneOffset)*b:(a.currentSlide+a.cloneOffset)*b;case "setTouch":return b;case "jumpEnd":return n?b:a.count*b;case "jumpStart":return n?a.count*b:b;default:return b}}()+"px"}();a.transitions&&(d=p?"translate3d(0,"+d+",0)":"translate3d("+d+",0,0)",c=void 0!==c?c/1E3+"s":"0s",a.container.css("-"+a.pfx+"-transition-duration",c),a.container.css("transition-duration",c));a.args[a.prop]=d;(a.transitions||void 0===c)&&a.container.css(a.args);
a.container.css("transform",d)};a.setup=function(b){if(r)a.slides.css({width:"100%","float":"left",marginRight:"-100%",position:"relative"}),"init"===b&&(t?a.slides.css({opacity:0,display:"block",webkitTransition:"opacity "+a.vars.animationSpeed/1E3+"s ease",zIndex:1}).eq(a.currentSlide).css({opacity:1,zIndex:2}):a.slides.css({opacity:0,display:"block",zIndex:1}).eq(a.currentSlide).css({zIndex:2}).animate({opacity:1},a.vars.animationSpeed,a.vars.easing)),a.vars.smoothHeight&&c.smoothHeight();else{var f,
g;"init"===b&&(a.viewport=d('<div class="'+e+'viewport"></div>').css({overflow:"hidden",position:"relative"}).appendTo(a).append(a.container),a.cloneCount=0,a.cloneOffset=0,n&&(g=d.makeArray(a.slides).reverse(),a.slides=d(g),a.container.empty().append(a.slides)));a.vars.animationLoop&&!h&&(a.cloneCount=2,a.cloneOffset=1,"init"!==b&&a.container.find(".clone").remove(),c.uniqueID(a.slides.first().clone().addClass("clone").attr("aria-hidden","true")).appendTo(a.container),c.uniqueID(a.slides.last().clone().addClass("clone").attr("aria-hidden",
"true")).prependTo(a.container));a.newSlides=d(a.vars.selector,a);f=n?a.count-1-a.currentSlide+a.cloneOffset:a.currentSlide+a.cloneOffset;p&&!h?(a.container.height(200*(a.count+a.cloneCount)+"%").css("position","absolute").width("100%"),setTimeout(function(){a.newSlides.css({display:"block"});a.doMath();a.viewport.height(a.h);a.setProps(f*a.h,"init")},"init"===b?100:0)):(a.container.width(200*(a.count+a.cloneCount)+"%"),a.setProps(f*a.computedW,"init"),setTimeout(function(){a.doMath();a.newSlides.css({width:a.computedW,
"float":"left",display:"block"});a.vars.smoothHeight&&c.smoothHeight()},"init"===b?100:0))}h||a.slides.removeClass(e+"active-slide").eq(a.currentSlide).addClass(e+"active-slide");a.vars.init(a)};a.doMath=function(){var b=a.slides.first(),c=a.vars.itemMargin,d=a.vars.minItems,e=a.vars.maxItems;a.w=void 0===a.viewport?a.width():a.viewport.width();a.h=b.height();a.boxPadding=b.outerWidth()-b.width();h?(a.itemT=a.vars.itemWidth+c,a.minW=d?d*a.itemT:a.w,a.maxW=e?e*a.itemT-c:a.w,a.itemW=a.minW>a.w?(a.w-
c*(d-1))/d:a.maxW<a.w?(a.w-c*(e-1))/e:a.vars.itemWidth>a.w?a.w:a.vars.itemWidth,a.visible=Math.floor(a.w/a.itemW),a.move=0<a.vars.move&&a.vars.move<a.visible?a.vars.move:a.visible,a.pagingCount=Math.ceil((a.count-a.visible)/a.move+1),a.last=a.pagingCount-1,a.limit=1===a.pagingCount?0:a.vars.itemWidth>a.w?a.itemW*(a.count-1)+c*(a.count-1):(a.itemW+c)*a.count-a.w-c):(a.itemW=a.w,a.pagingCount=a.count,a.last=a.count-1);a.computedW=a.itemW-a.boxPadding};a.update=function(b,d){a.doMath();h||(b<a.currentSlide?
a.currentSlide+=1:b<=a.currentSlide&&0!==b&&(a.currentSlide-=1),a.animatingTo=a.currentSlide);if(a.vars.controlNav&&!a.manualControls)if("add"===d&&!h||a.pagingCount>a.controlNav.length)c.controlNav.update("add");else if("remove"===d&&!h||a.pagingCount<a.controlNav.length)h&&a.currentSlide>a.last&&(a.currentSlide-=1,a.animatingTo-=1),c.controlNav.update("remove",a.last);a.vars.directionNav&&c.directionNav.update()};a.addSlide=function(b,c){var e=d(b);a.count+=1;a.last=a.count-1;p&&n?void 0!==c?a.slides.eq(a.count-
c).after(e):a.container.prepend(e):void 0!==c?a.slides.eq(c).before(e):a.container.append(e);a.update(c,"add");a.slides=d(a.vars.selector+":not(.clone)",a);a.setup();a.vars.added(a)};a.removeSlide=function(b){var c=isNaN(b)?a.slides.index(d(b)):b;a.count-=1;a.last=a.count-1;isNaN(b)?d(b,a.slides).remove():p&&n?a.slides.eq(a.last).remove():a.slides.eq(b).remove();a.doMath();a.update(c,"remove");a.slides=d(a.vars.selector+":not(.clone)",a);a.setup();a.vars.removed(a)};c.init()};d(window).blur(function(d){focused=
!1}).focus(function(d){focused=!0});d.flexslider.defaults={namespace:"flex-",selector:".slides > li",animation:"fade",easing:"swing",direction:"horizontal",reverse:!1,animationLoop:!0,smoothHeight:!1,startAt:0,slideshow:!0,slideshowSpeed:7E3,animationSpeed:600,initDelay:0,randomize:!1,thumbCaptions:!1,pauseOnAction:!0,pauseOnHover:!1,pauseInvisible:!0,useCSS:!0,touch:!0,video:!1,controlNav:!0,directionNav:!0,prevText:"Previous",nextText:"Next",keyboard:!0,multipleKeyboard:!1,mousewheel:!1,pausePlay:!1,
pauseText:"Pause",playText:"Play",controlsContainer:"",manualControls:"",sync:"",asNavFor:"",itemWidth:0,itemMargin:0,minItems:1,maxItems:0,move:0,allowOneSlide:!0,start:function(){},before:function(){},after:function(){},end:function(){},added:function(){},removed:function(){},init:function(){}};d.fn.flexslider=function(g){void 0===g&&(g={});if("object"===typeof g)return this.each(function(){var a=d(this),e=a.find(g.selector?g.selector:".slides > li");1===e.length&&!0===g.allowOneSlide||0===e.length?
(e.fadeIn(400),g.start&&g.start(a)):void 0===a.data("flexslider")&&new d.flexslider(this,g)});var l=d(this).data("flexslider");switch(g){case "play":l.play();break;case "pause":l.pause();break;case "stop":l.stop();break;case "next":l.flexAnimate(l.getTarget("next"),!0);break;case "prev":case "previous":l.flexAnimate(l.getTarget("prev"),!0);break;default:"number"===typeof g&&l.flexAnimate(g,!0)}}})(jQuery);
// Avoid `console` errors in browsers that lack a console.
(function() {
	var method;
	var noop = function () {};
	var methods = [
		'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		'timeStamp', 'trace', 'warn'
	];
	var length = methods.length;
	var console = (window.console = window.console || {});

	while (length--) {
		method = methods[length];

		// Only stub undefined methods.
		if (!console[method]) {
			console[method] = noop;
		}
	}
}());

// Place any jQuery/helper plugins in here.

jQuery(function($) {
	"use strict";

	$.fn.increment = function() {
		$(this).each(function(){
			var that = $(this);
			var input = that.find('input.quantity');

            that.find('.inc, .dec').unbind('click.inc');
			that.find('.inc, .dec').bind('click.inc', function(e){
				e.preventDefault();

				var current = parseInt(input.val());
				if($(this).hasClass('inc')){
					input.val(current+1);
				} else if($(this).hasClass('dec')) {
					if(current > 0) {
						input.val(current-1);
					}
				}
				$('body').trigger('changeVal');
			});
		});
	};

	$.fn.popup = function() {
		var $wrapper = $('.popup-wrapper');

		$(this).each(function() {
			var $that = $(this);

			$that.find('.close-popup' ).on('click', function(e){
				e.preventDefault();
				$wrapper.fadeOut();
			});


		});
	}

});

(function($) {
    $.fn.attachmentUpload = function(uploadUrl) {
        uploadUrl = uploadUrl || window.attachmentUploadUrl;
        var input = $(this);

        if(!input.is("input")) {
            throw Error("You can bind only text input!");
        }

        var fileInput = $("<input type='file' name='attachment'>");
        var formData = new FormData();

        fileInput[0].addEventListener("change", function (evt) {
            var i = 0, len = this.files.length, img, reader, file;

            for ( ; i < len; i++ ) {
                file = this.files[i];

                formData.append("file", file);

                $.ajax({
                    url: uploadUrl,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (json) {
                        if(json.code == 0) {
                            input.val(json.file);
                            $(window).trigger('attachment-upload-success');
                        } else {
                            alert(json.error);
                        }
                    },
                    error: function() {
                        alert("Произошла ошибка сервера. Попробуйте позже...");
                    }
                });
            }

        }, false);

        fileInput.trigger("click");
    }
})(jQuery);


jQuery(function($) {
	"use strict";

	$.fn.scrollTo = function( target, options, callback ){
		if(typeof options == 'function' && arguments.length == 2){ callback = options; options = target; }
		var settings = $.extend({
			scrollTarget  : target,
			offsetTop     : 50,
			duration      : 500,
			easing        : 'swing'
		}, options);
		return this.each(function(){
			var scrollPane = $(this);
			var scrollTarget = (typeof settings.scrollTarget == "number") ? settings.scrollTarget : $(settings.scrollTarget);
			var scrollY = (typeof scrollTarget == "number") ? scrollTarget : scrollTarget.offset().top + scrollPane.scrollTop() - parseInt(settings.offsetTop);
			scrollPane.animate({scrollTop : scrollY }, parseInt(settings.duration), settings.easing, function(){
				if (typeof callback == 'function') { callback.call(this); }
			});
		});
	};

    try {
        var $wisi = $('.wysi');


        if($wisi.length) {
            $wisi.wysihtml5({
                "stylesheets": [],
                "locale": "ru-RU"
            });
        }

        $('.popup').popup();

	    $('.integer').increment();

        $('.ik').ikSelect({
            ddFullWidth: true,
            autoWidth: false,
            equalWidths: true
        });
    } catch(e) {    }

	$('.goto').each(function(){
		$(this).on('click', function(e){
			e.preventDefault();
			$('body').scrollTo($('#' + $(this).data('goto')));
		});
	});

	function Calculator() {
		var that = this;

		var $form = $('#application-form form'),
			$total = $form.find('.total-price .value'),
			$items = $form.find('.items')
			;

		this.calculate = function() {
			var total = 0;
			$items.find('.item').each(function(){
				total += parseFloat($(this).find('select option:selected').data('price')) * $(this).find('.quantity').val();
			});

			$total.text(total);
		};

		this.getPrices = function() {
			$items.find('.item').each(function(){
				var select = $(this).find('select');
				$(this).find('.price .value').text(select.find('option:selected' ).data('price') * $(this).find('.quantity').val());
				that.calculate();

                select.off("change.calc");
				select.on('change.calc', function(){
					that.getPrices();
					that.calculate();
				});
			});
		};



		this.init = function() {
			that.getPrices();
			$('body').on('changeVal', function(){
				that.calculate();
				that.getPrices();
			});
		};
	};

	var calc = new Calculator();
	calc.init();

	var applicationForm = $('.application-form' ),
		actionNewItemButton = applicationForm.find('.action-add-new-item'),
		waiting = false
		;

	applicationForm.find('input[type="submit"]').on('click', function(e){
		e.preventDefault();

		var data = applicationForm.find('form').serialize();
		$.ajax({
			url: ajax_url.checkout,
			type: "POST",
			dataType: 'json',
			success: function(data) {
				if(data.code == 1) {
					console.log(data.error);
				} else {
					// popup
					var checkout = $('.popup-wrapper .popup.checkout_form');
					var total_price = 0;
					var items = '';

					$('.popup-wrapper').fadeIn();
					checkout.fadeIn();
					checkout.find('.order-number .value').text(data.data.uniqueIdx);
					checkout.find('.wallet').text(data.data.wallet);

					for(var i = 0; i < data.applicationData.length; i++) {

						total_price += data.applicationData[i]['totalPrice'];
						items += ' <div class="position"> 																	\
										<div class="title"> 																\
											'+ data.applicationData[i]['productName']+'										\
									</div> 																					\
										<div class="count"> 																\
											'+ data.applicationData[i]['quantity']+' шт. 									\
										</div> 																				\
										<div class="price"> 																\
											'+ data.applicationData[i]['totalPrice']+' руб. 		\
										</div> 																				\
									</div>';
					}

					checkout.find('.positions' ).append($(items));
					checkout.find('.total-price .value').text(total_price);
					checkout.find('.delivery-point').text(data.data.deliveryPointName);
                    //checkout.find('.delivery-point-info').html(data.data.deliveryPointDescription);

                    // reset form
                    applicationForm.find('.item:not(:first)').remove();
                    applicationForm.find('form')[0].reset();
                    applicationForm.find('.item').find('.ik').ikSelect("reset");
                    calc.init();
				}
			},
			error: function() {
				console.log('error');
			},
			data: data

		})
	});

	// Dummy ajax response data

	// ajax callback
	function resp() {
		var newItem = applicationForm.find('.item' ).first().clone()
			;

		var select = newItem.find('.ik_select select');

		newItem.find('.ik_select').remove();
		newItem.find('.item-name').html(select);
		newItem.find('.price .value').text();
		newItem.find('input.quantity').val('1');

		newItem.appendTo(applicationForm.find('.items'));

		newItem.find('.ik').ikSelect({
			ddFullWidth: true,
			autoWidth: false,
			equalWidths: true
		});

		newItem.find('.integer').increment();
		calc.init();

		waiting = false;
	};

	// Add new item
	actionNewItemButton.on('click', function(e){
		e.preventDefault();
		if(!waiting) {
			waiting = true;

			// Do ajax request
			resp();
		}
	});

	var bindLoginForm = function(resp) {
		var $data = $(resp);
		var $form = $data.find('form');
		$('body').append($data);
		$data.fadeIn().find('.popup').fadeIn();
		$data.find('.popup').popup();
		$form.find('input[type="submit"]').on('click', function(e){
			e.preventDefault();
			$.ajax({
				url: ajax_url.login,
				type: 'POST',
				dataType: 'html',
				success: function(resp) {
					if(resp == 'ok') {
						window.location.href = base_url;
						return;
					} else {
						$data.remove();
						bindLoginForm(resp);
					}
				},
				data: $form.serialize()
			})
		});
	};

	$('.action-login').on('click', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: ajax_url.login,
			dataType: 'html',
			success: bindLoginForm
		})
	});

	var bindRegisterForm = function(resp) {
		var $data = $(resp);
		var $form = $data.find('form');
		$('body').append($data);
		$data.fadeIn().find('.popup').fadeIn();
		$data.find('.popup').popup();
		$form.find('input[type="submit"]').on('click', function(e){
			e.preventDefault();
			$.ajax({
				url: ajax_url.register,
				type: 'POST',
				dataType: 'html',
				success: function(resp) {
					if(resp == 'ok') {
                        $form.replaceWith("<h2 style='text-transform: none'>" +
                            "Для подтверждения регистрации на вашу почту выслано письмо" +
                            "</h2>");
						//window.location.href = base_url;
						return;
					} else {
						$data.remove();
						bindRegisterForm(resp);
					}
				},
				data: $form.serialize()
			})
		});
	};

	$('.action-register').on('click', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: ajax_url.register,
			dataType: 'html',
			success: bindRegisterForm
		});
	});

    try {
        $('.flexslider').flexslider({
            autoScroll: false,
            controlNav: false,
            animation: 'slide'
        });
    } catch(e) {    }

    $(".spoiler").bind("click", function(e) {
        var header = $(this);

        header.next("p").slideToggle("fast");
    });
});