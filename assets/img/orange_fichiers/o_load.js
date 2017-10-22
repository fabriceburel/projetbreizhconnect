function o_deepAssignment(a){for(var b,c,d=Array.prototype.slice.call(arguments,1);d.length;){b=d.shift();for(c in b)b.hasOwnProperty(c)&&("object"==typeof a[c]&&a[c]&&"[object Array]"!==Object.prototype.toString.call(a[c])&&"object"==typeof b[c]&&null!==b[c]?a[c]=o_deepAssignment({},a[c],b[c]):a[c]=b[c])}return a}function o_addEvent(a,b,c,d){if(a&&"addEventListener"in a)try{a.addEventListener(b,c,d)}catch(e){if("object"!=typeof c||!c.handleEvent)throw e;a.addEventListener(b,function(a){c.handleEvent.call(c,a)},d)}else a&&"attachEvent"in a&&("object"==typeof c&&c.handleEvent?a.attachEvent("on"+b,function(){c.handleEvent.call(c)}):a.attachEvent("on"+b,c))}function o_removeEvent(a,b,c,d){if("removeEventListener"in a)try{a.removeEventListener(b,c,d)}catch(e){if("object"!=typeof c||!c.handleEvent)throw e;a.removeEventListener(b,function(a){c.handleEvent.call(c,a)})}else"detachEvent"in a&&a.detachEvent("on"+b,c)}function o_mergeArrays(a,b){var c,d=a;for(c in b)d[c]=b[c];return d}function o_defineDomain(){switch(o_confCommon.typeEnv){case"local":o_domainName=window.location.host+"/libs/dev/",staticServ="c.rec.woopic.com";break;case"local_cloud":o_domainName=window.location.host+"/dev/",staticServ="c.rec.woopic.com";break;case"dev":o_domainName="c.dev.woopic.com/libs/",staticServ="c.rec.woopic.com";break;case"rec":o_domainName="c-rec.staging.woopic.com/libs/",staticServ="c-rec.staging.woopic.com";break;case"preprod":o_domainName="c.preprod.woopic.com/libs/",staticServ="c.preprod.woopic.com";break;default:o_domainName="c.woopic.com/libs/",staticServ="c.woopic.com"}switch(o_confCommon.typeEnvModule){case"local":o_moduleDomainName=window.location.host+"/";break;case"dev":o_moduleDomainName="c.dev.woopic.com/libs/modules/";break;case"rec":o_moduleDomainName="c-rec.staging.woopic.com/libs/modules/";break;case"preprod":o_moduleDomainName="c.preprod.woopic.com/libs/modules/";break;default:o_moduleDomainName="c.woopic.com/libs/modules/"}}function o_loadLib(a){a instanceof Array?o_libToLoad=o_libToLoad.concat(a):o_libToLoad.push(a),o_confCommon.debug&&console.info("ajout de la librairie a charger: "+a)}function createHeaderStructure(){if(!o_confCommon.waitMode)if(document.body){if(o_confCommon.headerDisplay){var a,b={polaris2:{desktop:{height:61,options:[{name:"serviceZone",height:90},{name:"slimServiceZone",height:60},{name:"cookieZone",height:132}]},mobile:{height:48,options:[{name:"serviceZone",height:47},{name:"cookieZone",height:131}]}},polaris3:{desktop:{height:80,options:[{name:"isHomePage",height:20},{name:"serviceZone",height:91},{name:"slimServiceZone",height:61},{name:"cookieZone",height:95}]},mobile:{height:50,options:[{name:"serviceZone",height:50},{name:"cookieZone",height:131}]}},pro:{desktop:{height:121,attr:{"background-color":"#000"}},mobile:{height:60}},progp:{desktop:{height:80,options:[{name:"serviceZone",height:93},{name:"slimServiceZone",height:93},{name:"cookieZone",height:100}]},mobile:{height:50,options:[{name:"serviceZone",height:50},{name:"cookieZone",height:131}]}}},c=o_confCommon.isSosh?"s-header":"o-header",d=document.getElementById(c);null===d&&(d=document.createElement("div"),d.setAttribute("id",c),document.body.insertBefore(d,document.body.firstChild)),o_confCommon.centeredPage?d.className+=" fixed-center o-center-align":d.className+=" o-left-align";var e=function(){return o_confCommon.isSosh?"sosh":o_confCommon.isProGP?"progp":o_confCommon.isPro||o_confCommon.OPUSMode?"pro":!1===o_confCommon.polaris3Mode?"polaris2":!0===o_confCommon.polaris3Mode?"polaris3":void 0}(),f=function(){return o_confCommon.responsiveMobile?"mobile":"desktop"}(),g=function(a){var b="(?:(?:^|.*;\\s*)("+a+")\\s*\\=\\s*([^;]*).*$)|^.*$",c=new RegExp(b),d=document.cookie.match(c);return d[1]!==undefined&&d[2]};if(b[e]&&b[e][f]&&"undefined"!=typeof b[e][f].height){if("undefined"!=typeof b[e][f].options){var h="";for(a=0;a<b[e][f].options.length;a++)!1!==(h=function(a){switch(a.name){case"isHomePage":if(o_confCommon.isHomePage)return a.height;break;case"serviceZone":if(o_confCommon.genericHeaderZone&&!o_confCommon.slimServiceZone)return a.height;break;case"slimServiceZone":if(o_confCommon.genericHeaderZone&&o_confCommon.slimServiceZone)return a.height;break;case"cookieZone":if(o_confCommon.infoCookieZone&&""===g("o-cookie-cnil"))return a.height;break;default:return!1}return 0}(b[e][f].options[a]))&&(b[e][f].height+=h)}if(d.removeAttribute("style"),d.style.height=b[e][f].height+"px","undefined"!=typeof b[e][f].attr){var i=Object.keys(b[e][f].attr);for(a=0;a<i.length;a++)d.style[i[a]]=b[e][f].attr[i[a]]}}clearTimeout(createHeaderStructure)}}else setTimeout(createHeaderStructure,10)}function isHeaderReady(){document.getElementById("o-header")?(o_confCommon.responsiveMobile?o_configureHeaderMobile():o_configureHeader(),clearTimeout(isHeaderReady)):setTimeout(isHeaderReady,10)}function o_asyncLoadScript(){var a,b=0,c=0,d=0,e=0,f="",g="",h=function(a){if(a.libModule){var b=a.uri.replace("/modules",""),c=o_moduleDomainName.replace("modules/",a.hash+"/modules");return o_srcHost+c+b}return o_srcHost+o_domainName+a.hash+a.uri};for(b=0,d=o_libToLoad.length;b<d;b++)for(c=0,e=o_allLib.length;c<e;c++)if(o_allLib[c].key===o_libToLoad[b])if(f=o_allLib[c].label,a={},"undefined"==typeof o_allLib[c].hash&&(o_allLib[c].hash=""),o_allLib[c].param)switch(o_allLib[c].param){case"default_theme":"undefined"!=typeof o_confCommon.genericHeader&&"undefined"!=typeof o_confCommon.genericHeader.theme&&"light"!==o_confCommon.genericHeader.theme||(a[f]=h(o_allLib[c]),head.load(a));break;case"dark_theme":"undefined"!=typeof o_confCommon.genericHeader&&"undefined"!=typeof o_confCommon.genericHeader.theme&&"dark"===o_confCommon.genericHeader.theme&&(a[f]=h(o_allLib[c]),head.load(a));break;case"notIE78":(!navig.isIE||navig.getVersion()>8)&&(a[f]=h(o_allLib[c]),head.load(a));break;case"IE78":navig.isIE&&navig.getVersion()<=8&&(a[f]=h(o_allLib[c]),head.load(a));break;case"IE":navig.isIE&&navig.getVersion()<=9&&(a[f]=h(o_allLib[c]),head.load(a));break;case"module":a[f]=h(o_allLib[c]),head.load(a);break;case"ext":"test"===o_confCommon.typeEnv&&"s.gstat"===o_allLib[c].uri.substring(0,7)?(g=o_allLib[c].uri,a[f]=o_srcHost+o_domainName+"/common/tests/"+g.split("/").pop()):a[f]=o_srcHost+o_allLib[c].uri,head.load(a)}else a[f]=h(o_allLib[c]),head.load(a);o_libToLoad.length=0}function o_loadConf(){head.js({tealiumActivate:o_srcHost+staticServ+"/Magic/o_tealium.js?update"}),head.ready("common",function(){o_getUserLoginInfo()}),head.ready(document,function(){!function(){if(o_confCommon&&o_confCommon.tracking){if("false"===localStorage.getItem("tealium-activate")==!1&&!0!==o_confCommon.tracking.Tealium.deactivate&&(!o_confCommon.isSosh&&!o_confCommon.headerPro&&!o_confCommon.OPUSMode&&"undefined"==typeof utag||""!==o_confCommon.tracking.Tealium.instanceUrl)&&-1===document.domain.indexOf("francetelecom.fr")){var a,b,c;if(o_confCommon.tracking.Tealium.instanceUrl)a=o_confCommon.tracking.Tealium.instanceUrl;else{if(!(b=o_confCommon.tracking.Tealium.profile)){for(var d=/\/utag.js/g,e=document.getElementsByTagName("script"),f=e?e.length:0,g=0;g<f;g++)if(d.test(e[g].innerHTML)||d.test(e[g].src))return;b="dnu",utag_data&&utag_data.domaine?"shop"===utag_data.domaine.toLowerCase()?-1!==document.domain.indexOf("boutique.orange")||-1!==document.domain.indexOf("agence.orange")?b="frshoporange":"Sosh"===utag_data.couleur&&(b="frnewshop"):"espace client"===utag_data.domaine.toLowerCase()?"Web"===utag_data.canal?b="espaceclient":"Mobile Web"===utag_data.canal&&(b="wamlnec"):"assistance"===utag_data.domaine.toLowerCase()&&(b="assistance"):-1!==document.domain.indexOf("abonnez")||-1!==document.domain.indexOf("ma-boutique")?b="boi":-1!==document.domain.indexOf("ESHOP_mx_orange")&&(b="ebp")}switch(o_confCommon.typeEnv){case"rec":c="qa";break;case"prod":c="prod";break;default:c="prod"}a="//tags.tiqcdn.com/utag/orange/"+b+"/"+c+"/utag.js"}!function(b,c,d,e){c=document,d="script",e=c.createElement(d),e.src=a,e.type="text/java"+d,e.async=!0,b=c.getElementsByTagName(d)[0],b.parentNode.insertBefore(e,b)}()}}}(),o_addEvent(window,"beforeunload",function(){document.activeElement&&document.activeElement.href&&-1!==document.activeElement.href.indexOf("utx_")&&document.activeElement.attributes&&!document.activeElement.attributes["data-link-changed"]&&o_link({track_refGstat:undefined,track_destinationUrl:document.activeElement.href})}),window.o_showOptOutDialog=function(a){a=a||1,"__tealium"in window&&__tealium.load?__tealium.load():a<10&&(1===a&&"utag"in window&&"cfg"in window.utag?head.load(window.utag.cfg.path+"utag.tagsOptOut.js?cb="+Math.random()):setTimeout(function(){o_showOptOutDialog(a++)},1e3))}})}function o_loadConfUpdate(){if(o_confCommon=window.o_confCommon,o_defineDomain(),("pro"===m_seg||"prom"===c_seg||"pro"===c_seg||!0===o_confCommon._idzForced&&"pro"===o_confCommon._idzSeg||!0===o_confCommon.headerPro||!0===o_confCommon.OPUSMode)&&(o_isModule=!0,o_moduleName="pro",o_confCommon.isPro=!0,o_confCommon.isProGP=!1,("pro"===m_seg||"prom"===c_seg||"pro"===c_seg||o_confCommon._idzForced&&"pro"===o_confCommon._idzSeg)&&!1===o_confCommon.headerPro&&!1===o_confCommon.OPUSMode&&(o_confCommon.isProGP=!0),o_confCommon.responsive||o_confCommon.responsiveMobile?o_confCommon.responsive&&!o_confCommon.responsiveMobile?head.js({proLoader:o_srcHost+o_moduleDomainName+o_moduleName+"/o_load_pro_responsive.js"}):o_confCommon.responsive&&o_confCommon.responsiveMobile&&head.js({proLoader:o_srcHost+o_moduleDomainName+o_moduleName+"/o_load_pro_responsive_mobile.js"}):head.js({proLoader:o_srcHost+o_moduleDomainName+o_moduleName+"/o_load_pro.js"}),head.ready("proLoader",function(){for(var a in o_allLibPro)o_allLibPro.hasOwnProperty(a)&&(o_allLibPro[a].libModule=!0);o_allLib=o_mergeArrays(o_allLib,o_allLibPro)})),o_confCommon.isSosh)o_confCommon.sosh2Mode?(o_isModule=!0,o_moduleName="sosh",o_confCommon.headerDisplay&&(o_confCommon.responsive||o_confCommon.responsiveMobile?o_confCommon.responsive&&!o_confCommon.responsiveMobile?head.js({soshLoader:o_srcHost+o_moduleDomainName+o_moduleName+"/o_load_sosh_responsive.js"}):o_confCommon.responsive&&o_confCommon.responsiveMobile&&head.js({soshLoader:o_srcHost+o_moduleDomainName+o_moduleName+"/o_load_sosh_responsive_mobile.js"}):head.js({soshLoader:o_srcHost+o_moduleDomainName+o_moduleName+"/o_load_sosh.js"}),createHeaderStructure(),head.ready("soshLoader",function(){for(var a in o_allLibSosh)o_allLibSosh.hasOwnProperty(a)&&(o_allLibSosh[a].libModule=!0);o_allLib=o_mergeArrays(o_allLib,o_allLibSosh),o_loadLib("moduleSosh"),o_asyncLoadScript()}))):(o_confCommon.headerDisplay&&o_loadLib("sosh"),o_confCommon.responsiveMobile?head.js({jsonMenu:o_srcHost+staticServ+"/Magic/menus.sosh.mobile.json"}):head.js({jsonMenu:o_srcHost+staticServ+"/Magic/menus.sosh.desktop.json"}));else if(o_confCommon.isPro&&(!o_confCommon.responsiveMobile&&!o_confCommon.OPUSMobileMode||o_confCommon.OPUSMobileMode))o_confCommon.headerDisplay&&(head.ready("proLoader",function(){o_loadLib(o_confCommon.OPUSMode?"moduleProUnified":"modulePro"),o_asyncLoadScript()}),createHeaderStructure()),o_confCommonDefault.isProGP&&o_loadLib(o_confCommon.polaris3Mode?"polaris3":"polaris2");else{var a=!!o_sGetCookie("o-cookie-consent");rate=[{value:"0",selectedRate:3},{value:"00",selectedRate:20},{value:"000",selectedRate:100}],o_progressiveDeployment(rate,3,"o-cookie-consent",180),a||"1"!==o_sGetCookie("o-cookie-consent")||o_bSetCookie("o-cookie-cnil","","domain = .orange.fr, expires=-1"),o_confCommon.headerDisplay&&(o_loadLib(o_confCommon.polaris3Mode?"polaris3":"polaris2"),""!==o_confCommon.useMB&&(o_confCommon.searchZone=!1,o_loadLib("mail"),navig.isMobile||navig.isIE||(o_bSetCookie("dnu_abtest_actumail_01","","domain=orange.fr,expires=-1"),o_bSetCookie("dnu_abtest_actumail_02","","domain=orange.fr,expires=-1"),o_bSetCookie("dnu_abtest_actumail_default","","domain=orange.fr,expires=-1"))),createHeaderStructure())}o_asyncLoadScript(),head.isReady=!0,head.runReadyWhenAllLoaded()}function enableHeader(a){var b,c,d;for(var e in o_universes)if(o_universes.hasOwnProperty(e)){c=o_universes[e];for(b in c.elts)c.elts.hasOwnProperty(b)&&(d=document.querySelector(c.elts[b].selector),!c.elts[b].node&&d&&(c.elts[b].node=d),e!==a&&c.elts[b].node&&!o_hasClass(c.elts[b].node,"o-hide")&&(o_addClass(c.elts[b].node,"o-hide"),c.elts[b].node.id+="-hidden",o_universes[e].styles=function(){var a=o_allLib.filter(function(a){return a.key===c.o_allLibKey&&a.uri.indexOf(".css")>=0}),b=[];for(var d in a)if(a.hasOwnProperty(d)){var e=[],f=document.querySelector("head");if(e.length){e[0].setAttribute("disabled","true"),b.push(e[0]);for(var g=1;g<e.length;g++)f.removeChild(e[g])}}return b}()));c.o_allLibKey===o_universes[a].o_allLibKey&&o_universes[a].styles.concat(c.styles)}if(o_universes[a].styles)for(var f in o_universes[a].styles)o_universes[a].styles.hasOwnProperty(f)&&o_universes[a].styles[f].removeAttribute("disabled");var g=0;for(b in o_universes[a].elts)o_universes[a].elts.hasOwnProperty(b)&&o_universes[a].elts[b].node&&(o_removeClass(o_universes[a].elts[b].node,"o-hide"),o_universes[a].elts[b].node.id=o_universes[a].elts[b].node.id.replace("-hidden",""),g++);return g>0}function o_changeMode(a){var b=function(){if(o_confCommon=window.o_confCommon,a=a.toLowerCase(),window.o_currentPanel&&o_hasClass(o_hGetById(window.o_currentPanel),"o-stick")){o_toggleClass(o_hGetById(window.o_currentPanel),"o-stick"),o_toggleDisplay(window.o_currentPanel);var b=document.querySelector("#o-header .o-nav-item-highlight");o_removeClass(b,"o-nav-item-highlight"),o_removeClass(b,"o-nav-item-hover")}!0!==o_confCommon.waitMode&&(o_confCommon.waitMode||enableHeader(a))||(head.emptyCache(),s_confCommon={},o_confCommon=o_mergeArrays(o_confCommon,o_universes[a].o_confCommon),!0===o_confCommon.waitMode&&(o_loadConf(),o_startLoading()),o_loadConfUpdate(),o_confCommon.callbackHead=o_footer)};head.ready(b)}function o_startLoading(){o_confCommon=window.o_confCommon,o_confCommon.waitMode=!1,o_loadConf(),head.ready(function(){for(var a=0;a<o_pendingFunctions.length;a++)window[o_pendingFunctions[a].name].apply(null,o_pendingFunctions[a].arguments)})}if(function(a,b){"use strict";function c(){}function d(a,b){if(a){"object"==typeof a&&(a=[].slice.call(a));for(var c=0,d=a.length;c<d;c++)b.call(a,a[c],c)}}function e(a,c){var d=Object.prototype.toString.call(c).slice(8,-1);return c!==b&&null!==c&&d===a}function f(a){return e("Function",a)}function g(a){return e("Array",a)}function h(a){var b=a.split("/"),c=b[b.length-1],d=c.indexOf("?");return-1!==d?c.substring(0,d):c}function i(a){a=a||c,a._done||(a(),a._done=1)}function j(a,b,d,e){var f="object"==typeof a?a:{test:a,success:!!b&&(g(b)?b:[b]),failure:!!d&&(g(d)?d:[d]),callback:e||c},h=!!f.test;return h&&f.success?(f.success.push(f.callback),G.load.apply(null,f.success)):!h&&f.failure?(f.failure.push(f.callback),G.load.apply(null,f.failure)):e(),G}function k(a){var b={};if("object"==typeof a)for(var c in a)a[c]&&(b={name:c,url:a[c]});else b={name:h(a),url:a};var d=D[b.name];return d&&d.url===b.url?d:(D[b.name]=b,b)}function l(){for(var a in D)D[a]=null,delete D[a]}function m(a){a=a||D;for(var b in a)if(a.hasOwnProperty(b)&&a[b].state!==K)return!1;return!0}function n(a){a.state=I,d(a.onpreload,function(a){a.call()})}function o(a,c){a.state===b&&(a.state=H,a.onpreload=[],t({url:a.url,type:"cache"},function(){n(a)}))}function p(){var a=arguments,b=a[a.length-1],c=[].slice.call(a,1),e=c[0];return f(b)||(b=null),g(a[0])?(a[0].push(b),G.load.apply(null,a[0]),G):(e?(d(c,function(a){!f(a)&&a&&o(k(a))}),r(k(a[0]),f(e)?e:function(){G.load.apply(null,c)})):r(k(a[0])),G)}function q(){var a=arguments,b=a[a.length-1],c={};return f(b)||(b=null),g(a[0])?(a[0].push(b),G.load.apply(null,a[0]),G):(d(a,function(a,d){a!==b&&(a=k(a),c[a.name]=a)}),d(a,function(a,d){a!==b&&(a=k(a),r(a,function(){m(c)&&i(b)}))}),G)}function r(a,b){return b=b||c,a.state===K?void b():a.state===J?void G.ready(a.name,b):a.state===H?void a.onpreload.push(function(){r(a,b)}):(a.state=J,void t(a,function(){a.state=K,b(),d(C[a.name],function(a){i(a)}),z&&m()&&G.isReady&&d(C.ALL,function(a){i(a)})}))}function s(a){a=a||"";var b=a.split("?")[0].split(".");return b[b.length-1].toLowerCase()}function t(b,d){function e(b){b=b||a.event,h.onload=h.onreadystatechange=h.onerror=null,d()}function f(c){c=c||a.event,("load"===c.type||/loaded|complete/.test(h.readyState)&&(!A.documentMode||A.documentMode<9))&&(a.clearTimeout(b.errorTimeout),a.clearTimeout(b.cssTimeout),h.onload=h.onreadystatechange=h.onerror=null,d())}function g(){if(b.state!==K&&b.cssRetries<=20){for(var c=0,d=A.styleSheets.length;c<d;c++)if(A.styleSheets[c].href===h.href)return void f({type:"load"});b.cssRetries++,b.cssTimeout=a.setTimeout(g,250)}}d=d||c;var h;"css"===s(b.url)?(h=A.createElement("link"),h.type="text/"+(b.type||"css"),h.rel="stylesheet",h.href=b.url,b.cssRetries=0,b.cssTimeout=a.setTimeout(g,500)):(h=A.createElement("script"),h.type="text/"+(b.type||"javascript"),h.src=b.url),h.onload=h.onreadystatechange=f,h.onerror=e,h.async=!1,h.defer=!1,b.errorTimeout=a.setTimeout(function(){e({type:"timeout"})},7e3);var i=A.head||A.getElementsByTagName("head")[0];i.insertBefore(h,i.lastChild)}function u(){for(var a=A.getElementsByTagName("script"),b=0,c=a.length;b<c;b++){var d=a[b].getAttribute("data-headjs-load");if(d)return void G.load(d)}}function v(a,b){if(a===A)return z?i(b):B.push(b),G;if(f(a)&&(b=a,a="ALL"),g(a)){var c={};return d(a,function(a){c[a]=D[a],G.ready(a,function(){m(c)&&i(b)})}),G}if("string"!=typeof a||!f(b))return G;var e=D[a];if(e&&e.state===K||"ALL"===a&&m()&&z)return i(b),G;var h=C[a];return h?h.push(b):h=C[a]=[b],G}function w(){if(!A.body)return a.clearTimeout(G.readyTimeout),void(G.readyTimeout=a.setTimeout(w,50));z||(z=!0,u(),d(B,function(a){i(a)}))}function x(){A.addEventListener?(A.removeEventListener("DOMContentLoaded",x,!1),w()):"complete"===A.readyState&&(A.detachEvent("onreadystatechange",x),w())}function y(){z&&m()&&G.isReady&&d(C.ALL,function(a){i(a)})}var z,A=a.document,B=[],C={},D={},E="async"in A.createElement("script")||"MozAppearance"in A.documentElement.style||a.opera,F=a.head_conf&&a.head_conf.head||"head",G=a[F]=a[F]||function(){G.ready.apply(null,arguments)},H=1,I=2,J=3,K=4;if("complete"===A.readyState)w();else if(A.addEventListener)A.addEventListener("DOMContentLoaded",x,!1),a.addEventListener("load",w,!1);else{A.attachEvent("onreadystatechange",x),a.attachEvent("onload",w);var L=!1;try{L=!a.frameElement&&A.documentElement}catch(M){}L&&L.doScroll&&function N(){if(!z){try{L.doScroll("left")}catch(b){return a.clearTimeout(G.readyTimeout),void(G.readyTimeout=a.setTimeout(N,50))}w()}}()}G.load=G.js=E?q:p,G.test=j,G.ready=v,G.emptyCache=l,G.isReady=!0,G.runReadyWhenAllLoaded=y,G.ready(A,function(){m()&&G.isReady&&d(C.ALL,function(a){i(a)}),G.feature&&G.feature("domloaded",!0)})}(window),void 0===o_confCommon)var o_confCommon={};o_confCommon.responsive=!1,o_confCommon.responsiveMobile=!1;var o_theme="";if(void 0!==o_confCommon&&o_confCommon.genericHeader&&"dark"===o_confCommon.genericHeader.theme&&(o_theme="_"+o_confCommon.genericHeader.theme),void 0!==s_confCommon&&!1!==s_confCommon.isSosh||void 0!==o_confCommon&&!0===o_confCommon.isSosh){if(s_confCommon===undefined)var s_confCommon={};s_confCommon.isSosh=!0,o_confCommon.sosh2Mode=!0}var o_allLib=[{key:"common",label:"common",uri:"/common/js/common.js",hash:"5ce2d2b1be073a072b96a8c4d4b56a6f"},{key:"common",label:"commonCSS",uri:"/common/css/common.css",hash:"4a1f5a5aa0c594bf3982de9eb5bf72e9"},{key:"mail",label:"headerMail",uri:"/common/js/o_header_mail.js",hash:"dfbdfe92a993c7363c5bffddc92b6a41"},{key:"mail",label:"headerMailCSS",uri:"/common/css/o_header_mail.css",hash:"016714a824fb0c9f698238b213d4694b"},{key:"sosh",label:"headerSosh",uri:"/common/js/s_sosh.js",hash:"4d7814100040d98405725d1e3778cbc5"},{key:"sosh",label:"headerSoshCore",uri:"/common/js/s_sosh_core.js",hash:"55a737b9dde3eb0d080e3835dcf2a548"},{key:"sosh",label:"headerSoshCss",uri:"/common/css/s_sosh.css",hash:"98ada193b7cb3f2f8ffa240ed396cfaa"},{key:"sosh",label:"headerSoshCssIE78",uri:"/common/css/s_sosh_ie_7_8.css",param:"IE78",hash:"59616ae77e7df1087bc70840fe0e609b"},{key:"polaris2",label:"headerCore",uri:"/common/js/o_polaris2_core.js",hash:"b56959240d56e5f0279fb578101eb16f"},{key:"polaris2",label:"completion",uri:"/common/js/o_completion.js",hash:"ea7cba03c1b3c51bfb88988a2d76608b"},{key:"polaris2",label:"completionCSS",uri:"/common/css/o_completion.css",hash:"00b42ccef6f14ab2221bdd5dc23d4bef"},{key:"polaris2",label:"polarisStandard",uri:"/common/js/o_polaris2_standard.js",hash:"80bad25599effbcfe500934d0bdb043a"},{key:"polaris2",label:"polarisStandardCSS",uri:"/common/css/o_polaris2_standard.css",hash:"58aa736e100f19704c5b3a099e56d426"},{key:"polaris2",label:"polarisStandardCSS",uri:"/common/css/o_polaris2_footer.css",hash:"728b2f93aee84b95d706ae4c0fddf005"},{key:"polaris2",label:"polarisStandardCSSIE78",uri:"/common/css/o_polaris2_ie_7_8.css",param:"IE78",hash:"522a7b3fad624312e4c6263cea012f8b"},{key:"polaris3",label:"polaris3Core",uri:"/common/js/o_polaris3_core.js",hash:"b463df1be230d29de89d73e3c6c64f50"},{key:"polaris3",label:"polaris3Desktop",uri:"/common/js/o_polaris3_desktop.js",hash:"21f2ce4ef265683e5cc792f3f5d664d8"},{key:"polaris3",label:"polaris3DesktopCSS",uri:"/common/css/o_polaris3_desktop.css",param:"default_theme",hash:"92fa75ee8b784bf48df19195bd0a9d31"},{key:"polaris3",label:"polaris3DesktopCSS",uri:"/common/css/o_polaris3_desktop_dark.css",param:"dark_theme",hash:"dc375d8cb77d8e0c21c1ed5f7ea54933"},{key:"polaris3",label:"polaris3Completion",uri:"/common/js/o_completion.js",hash:"ea7cba03c1b3c51bfb88988a2d76608b"},{key:"polaris3",label:"polaris3CompletionCSS",uri:"/common/css/o_completion.css",hash:"00b42ccef6f14ab2221bdd5dc23d4bef"}],o_startDate=new Date,o_libToLoad=[],menus_ruban="",o_pendingFunctions=[],o_srcHost=document.location.protocol+"//",o_domainName="c.woopic.com/libs/",o_moduleDomainName,staticServ="c.woopic.com",o_defaultMoteurModule="orange",o_confCommonDefault={typeEnv:"prod",typeEnvModule:"",debug:!1,loadJSONData:!0,polaris3Mode:!0,OPUSMode:!1,OPUSMobileMode:!1,isCaraibe:!1,isSosh:!1,sosh2Mode:!1,isMobEnt:!1,centeredPage:!0,isHomePage:!1,headerDisplay:!0,persoZone:!0,genericHeaderZone:!0,genericHeader:{},serviceZone:!0,slimServiceZone:!1,searchZone:!0,navZone:!0,launchZone:!0,infoCookieZone:!0,domainImg:"",domainTitle:"",domainUrl:"",domainRef:"",serviceTitle:"",serviceUrl:"",serviceRef:"",serviceTarget:"_top",logoUrl:"http://r.orange.fr/r/Ohome_accueil",highlightPath:[],useCompletion:!0,deployPanel:-1,simPanel:!1,classicSearch:!1,searchInputs:{},waitMode:!1,version:"local",tracking:{Tealium:{instanceUrl:"",profile:"",deactivate:!1},Gstat:{externalLoading:!1,path:"",useServerRedirect:!0}},isConnected:!0,isPro:!1,isProGP:!1,noLogo:!1,noBtnSearch:!1,cmplPetale:!0,searchInputValue:"",footer:{id:"",theme:"dark",compactVersion:!1,syndicationZone:!1,sitemapZone:!1,authentZone:!1,gstatPath:""},mobile:{autoscroll:!0,backButton:!1,backButtonUrl:"javascript:history.back()",backButtonTitle:"",dropDownIcon:!1,searchIcon:!1,displaySearchZone:!1,iconClass:"o-sprite-mobile",icon1:"",icon1Url:"",icon2:"",icon2Url:"",icon3:"",icon3Url:""},callbackNav:function(){},callbackHead:function(){},callbackFooter:function(){},callbackInfoCookie:function(){},setGstatProfile:!0,headerPro:!1,underlineLeftItem:"",disableNotif:!1,useMB:""};o_confCommon=o_deepAssignment(o_confCommonDefault,o_confCommon),""!==o_confCommon.useMB&&(o_confCommon.disableNotif=!0),void 0!==s_confCommon&&(o_confCommon.isSosh||s_confCommon.isSosh)&&(o_confCommon=o_mergeArrays(o_confCommon,s_confCommon)),o_confCommon.isSosh&&!o_confCommon.responsiveMobile&&(o_confCommon.waitMode=!0),""===o_confCommon.typeEnvModule&&(o_confCommon.typeEnvModule=o_confCommon.typeEnv);var o_data=o_data||{},utag_data=utag_data||{};!function(){var a={domaine:"",canal:"",univers_affichage:"",type_page:"",noeud_arborescence:"",id_page:"",nav:"",environnement:"",titre_page:"",couleur:o_confCommon.isSosh?"Sosh":"Orange"};head.ready("common",function(){o_data=Object.assign(a,o_data),utag_data=Object.assign({},o_data,utag_data)})}();var o_isModule=!1,o_moduleName;(o_confCommon.headerPro||o_confCommon.OPUSMode||o_confCommon.sosh2Mode)&&(o_isModule=!0),o_defineDomain(),"undefined"==typeof console&&(window.console={log:function(){},info:function(){},warn:function(){},error:function(){},dir:function(){}}),"undefined"!=typeof sUrlReferrer&&""!==sUrlReferrer||(window.sUrlReferrer=document.location.host.replace(".orange.fr",""));var navig={isIE:/MSIE/.test(navigator.userAgent)||/Trident/.test(navigator.userAgent),isFF:/Firefox/.test(navigator.userAgent),isChrome:/Chrome/.test(navigator.userAgent)&&!/Edge/.test(navigator.userAgent),isOpera:/Opera/.test(navigator.userAgent),isSafari:/Safari/.test(navigator.userAgent)&&!/Edge/.test(navigator.userAgent),isEdge:/Edge/.test(navigator.userAgent),isAndroid:/Android/.test(navigator.userAgent)&&!/Windows Phone/.test(navigator.userAgent),isIOS:/iPad|iPhone|iPod/.test(navigator.userAgent)&&!/Windows Phone/.test(navigator.userAgent),isWP:/Windows Phone|WP|iemobile/.test(navigator.userAgent),isIpad:/iPad/.test(navigator.userAgent),isIphone:/iPhone/.test(navigator.userAgent),isIpod:/iPod/.test(navigator.userAgent),getVersion:function(){var a,b=navigator.appName,c=navigator.userAgent,d=c.match(/(opera|chrome|safari|firefox|msie|Trident)\/?\s*(\.?\d+(\.\d+)*)/i);return this.isEdge?(a=c.match(/Edge\/([\d]+)/),d[2]=a[1]):d&&null!==c.match(/version\/([\.\d]+)/i)&&!0!==/Trident/.test(navigator.userAgent)?(a=c.match(/version\/([\.\d]+)/i),d[2]=a[1]):d&&!0===/Trident/.test(navigator.userAgent)&&c.match(/rv:([0-9]+)/i)&&(a=c.match(/rv:([0-9]+)/i),d[2]=a[1]),d=d?[d[1],d[2]]:[b,navigator.appVersion,"-?"],parseInt(d[1],10)},getAndroidVersion:function(){var a=navigator.userAgent.toLowerCase(),b=a.match(/android\s([0-9\.]*)/);return!!b&&parseFloat(b[1])},isTouchDevice:function(){return"ontouchstart"in window||navigator.MaxTouchPoints>0||navigator.msMaxTouchPoints>0}};if(navig.isMobile=navig.isAndroid||navig.isIOS||navig.isWP||navig.isIpad||navig.isIphone||navig.isIpod,navig.isIE&&navig.getVersion()<9&&(o_confCommon.responsive=!1),window.o_universes={sosh:{elts:[{selector:"#s-header",node:undefined},{selector:"#s-footer-mobile",node:undefined},{selector:"#o-footer-content-sosh",node:undefined}],o_allLibKey:"sosh",o_confCommon:{genericHeaderZone:!0,isSosh:!0,sosh2Mode:!0,navZone:!0,isPro:!1,OPUSMode:!1,isMobEnt:!1},styles:[]},gp:{elts:[{selector:"#o-header.polaris3:not(.opus)",node:undefined},{selector:"#o-menu-burger-panel:not(.mobEnt)",node:undefined},{selector:"#o-footer-wrapper:not(.mobEnt)",node:undefined}],o_allLibKey:"polaris3",o_confCommon:{isSosh:!1,isPro:!1,OPUSMode:!1,isMobEnt:!1},styles:[]},pro:{elts:[{selector:"#o-header.opus",node:undefined},{selector:"#opus-footerAllWrapper",node:undefined}],o_allLibKey:"moduleProUnified",o_confCommon:{isSosh:!1,OPUSMode:!0,OPUSMobileMode:!0,isMobEnt:!1},styles:[]},mobent:{elts:[{selector:"#o-header.polaris3.mobEnt",node:undefined},{selector:"#o-menu-burger-panel.mobEnt",node:undefined},{selector:"#o-footer-wrapper.mobEnt",node:undefined}],o_allLibKey:"polaris3",o_confCommon:{isSosh:!1,isPro:!1,OPUSMode:!1,isMobEnt:!0},styles:[]}},!1===o_confCommon.tracking.Gstat.externalLoading){var gs_d=new Date,DoW=gs_d.getDay();gs_d.setDate(gs_d.getDate()-(DoW+6)%7+3);var ms=gs_d.valueOf();gs_d.setMonth(0),gs_d.setDate(4);var gs_r=(Math.round((ms-gs_d.valueOf())/6048e5)+1)*gs_d.getFullYear(),gstatURL="s.gstat.orange.fr/lib/gs.js?v=";"rec"===o_confCommon.typeEnv&&(gstatURL="s.gstat.rec.orange.fr/lib/gs.js?v="),o_allLib.push({key:"common",label:"gstat",uri:gstatURL+gs_r,param:"ext"})}"prod"!==o_confCommon.typeEnv&&(o_allLib.push({key:"common",label:"doc",uri:"/common/js/o_doc.js"}),o_allLib.push({key:"common",label:"docCSS",uri:"/common/css/o_doc.css"})),o_confCommon.polaris3Mode&&createHeaderStructure(),o_loadLib("common"),o_asyncLoadScript(),head.isReady=o_confCommon.waitMode,o_confCommon.waitMode||o_loadConf(),o_confCommon.isSosh&&!o_confCommon.responsiveMobile&&(loadKameleoon="undefined"!=typeof loadKameleoon&&loadKameleoon,o_sosh2Timeout=setInterval(function(){loadKameleoon&&(clearInterval(o_sosh2Timeout),clearInterval(o_sosh2MainTimeout),o_startLoading())},300),o_sosh2MainTimeout=setInterval(function(){clearInterval(o_sosh2Timeout),clearInterval(o_sosh2MainTimeout),o_startLoading()},1500)),o_confCommon.version="G3R8C5";