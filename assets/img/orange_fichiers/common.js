function o_initForcedConf(){var a=function(a,b,c){var d=c||window;void 0!==a&&(d[b]=a)};o_confCommon._idzForced&&(a(o_confCommon._idzSeg,"c_seg"),a(o_confCommon._idzCloudApps,"oopsPNSContent"),a(o_confCommon._idzAuthentServer,"authentServer",o_confCommon),a(o_confCommon.USER_SPUP_PSEUDO_COUNT,"USER_SPUP_PSEUDO_COUNT",o_idzone),a(o_confCommon.USER_SPUP_PSEUDO_NAME,"USER_SPUP_PSEUDO_NAME",o_idzone),a(o_confCommon.USER_SPUP_ALERT,"USER_SPUP_ALERT",o_idzone),a(o_confCommon._idzName,"USER_FULL_NAME",o_idzone),a(o_confCommon._idzAvatar,"USER_AVATAR_TINY_PICTURE_URL",o_idzone),a(o_confCommon._idzTel,"USER_MSISDN",o_idzone),a(o_confCommon._idzMailNB,"USER_MAIL_NB",o_idzone),a(o_confCommon._idzSMSNB,"USER_SMS_NB",o_idzone),a(o_confCommon._idzMMSNB,"USER_MMS_NB",o_idzone),a(o_confCommon._idzIdentLevel,"USER_IDENT_LEVEL",o_idzone),a(o_confCommon._idzMultibal,"ACCOUNT_MULTIBAL",o_idzone),a(o_confCommon._idzUSER_IS_REUNION,"USER_IS_REUNION",o_idzone),a(o_confCommon._idzPrincipal,"USER_PRINCIPAL",o_idzone),a(o_confCommon._idzMail,"USER_MAIL_ADDRESS",o_idzone),a(o_confCommon._idz_HashAppCloud,"USER_OOPS_APP",o_idzone),a(o_confCommon._idzUSER_IDENT_TYPE,"USER_IDENT_TYPE",o_idzone),a(o_confCommon._idzUSER_PRINCIPAL,"USER_PRINCIPAL",o_idzone),a(o_confCommon._idzUSER_IDENT_CONTEXT,"USER_IDENT_CONTEXT",o_idzone),a(o_confCommon._idzMOBILE_OFFER_TYPE,"MOBILE_OFFER_TYPE",o_idzone),a(o_confCommon._idzCR7_TIME,"CR7_TIME",o_idzone),a(o_confCommon._idzCR7_SIGN,"CR7_SIGN",o_idzone),a(o_confCommon._idzUSER_PPERSO_STATUS,"USER_PPERSO_STATUS",o_idzone),a(o_confCommon._idzUSER_HOMELIVE_STATUS,"USER_HOMELIVE_STATUS",o_idzone),a(o_confCommon._idzUSER_IDENT_METHOD,"USER_IDENT_METHOD",o_idzone),a(o_confCommon._idzNETWORK_TYPE,"NETWORK_TYPE",o_idzone),a(o_confCommon._idzNETWORK_POOL,"NETWORK_POOL",o_idzone),a(o_confCommon._idzUSER_TCF_IDENTITY,"USER_TCF_IDENTITY",o_idzone))}function o_is(a,b){var c=Object.prototype.toString.call(b).slice(8,-1);return b!==undefined&&null!==b&&c===a}function LoadingTimeTracker(a,b){var c=0,d=0;this.JTYPE=["tavpub","tpubdelay","tfloatation","timehtml","timeTotal"],this.loadTimeJalon=a,this.startTime=this.loadTimeJalon.startTime.oDate,this.bGetSize=b||!1,this.sAcces=this.loadTimeJalon.sAcces||"NC",this.sAPP=this.loadTimeJalon.sAPP||"NC",this.sUrlImg="http://z.woopic.com/z.gif",this.getDuration=function(a,b){return null!==b&&""!==b?a.getTime()-b.getTime():a.getTime()-this.startTime.getTime()},this.sendInfos=function(){this.loadTimeJalon.timeTotal={oDate:new Date};var a="APP="+this.sAPP+"&acces="+this.sAcces;for(c=0,d=this.JTYPE.length;c<d;c++)if(this.loadTimeJalon[this.JTYPE[c]]&&null!==this.loadTimeJalon[this.JTYPE[c]]&&this.loadTimeJalon[this.JTYPE[c]].oDate){marqueurCompare=this.loadTimeJalon[this.JTYPE[c]].oDateCompare||null;try{a+="&"+this.JTYPE[c]+"="+this.getDuration(this.loadTimeJalon[this.JTYPE[c]].oDate,marqueurCompare)}catch(b){a+="&"+this.JTYPE[c]+"=0"}}else a+="&"+this.JTYPE[c]+"=0";this.bGetSize&&(document.all?a+="&size=|"+parseInt(document.body.clientWidth,10)+"|"+parseInt(document.body.clientHeight,10)+"|M|"+parseInt(screen.width,10)+"|"+parseInt(screen.height,10):a+="&size=|"+window.innerWidth+"|"+window.innerHeight+"|N|"+window.outerWidth+"|"+window.outerHeight),document.getElementById("timeQOS").innerHTML+="<img src='"+this.sUrlImg+"?"+a+"' width=10 height=10 alt='' title=''><br>",bLoadTimeTDone=!0}}function o_loadJS(a){if(document&&document.appendChild&&document.getElementsByTagName&&document.createElement){var b=document.getElementsByTagName("head")[0],c=document.createElement("script");c.type="text/javascript",c.src=a,b.appendChild(c)}}function o_parseRefGStat(a){var b,c=a.track_refGstat,d=c.split("_").length,e=a.track_page||c.split("_").splice(0,1).join("_"),f=a.track_nom||c.split("_").splice(d-2,2).join("_"),g=a.track_zone||c.replace(e,"").replace(f,"").substr(1);return g.indexOf("_")===g.length-1&&(g=g.substr(0,g.length-1)),g=g.replace("_url",""),-1!==g.indexOf("urlwg")?(b=c.track_eventType||"nav",g=g.replace("urlwg","")):-1!==g.indexOf("navwg")&&(b=c.track_eventType||"action",g=g.replace("navwg","")),g=g||f.split("_").splice(0,1).join("_"),{track_page:e,track_zone:g,track_nom:f,track_eventType:b}}function o_getParameterByName(a,b){b||(b=window.location.href),a=a.replace(/[\[\]]/g,"\\$&");var c=new RegExp("[?&]"+a+"(=([^&#]*)|&|#|$)"),d=c.exec(b);return d?d[2]?decodeURIComponent(d[2].replace(/\+/g," ")):"":null}function o_parseUTX(a){return{utx_source:o_getParameterByName("utx_source",a),utx_medium:o_getParameterByName("utx_medium",a),utx_campaign:o_getParameterByName("utx_campaign",a),utx_term:o_getParameterByName("utx_term",a)}}function o_link(a,b){if(a){var c=a.track_refGstat;if("undefined"!=typeof utag){a.track_refGstat=a.track_refGstat===undefined?window.sUrlReferrer:window.sUrlReferrer+"_"+a.track_refGstat,a.track_destinationUrl=a.track_destinationUrl||b&&b.href,"string"==typeof a.track_destinationUrl&&-1!==a.track_destinationUrl.indexOf("r.orange.fr")&&-1!==a.track_destinationUrl.indexOf("url=")&&(a.track_destinationUrl=o_getParameterByName("url",a.track_destinationUrl)),a=Object.assign(a,o_parseRefGStat(a),o_parseUTX(a.track_destinationUrl));var d=Date.now(),e=!(o_sem&&o_sem.utag&&o_sem.utag.ts)||o_sem&&o_sem.utag&&o_sem.utag.ts&&(o_sem.utag.trackDestinationUrl===a.track_destinationUrl&&d-o_sem.utag.ts>300||o_sem.utag.trackDestinationUrl!==a.track_destinationUrl);o_sem.utag={ts:d,trackDestinationUrl:a.track_destinationUrl},e&&utag.link(a)}!0===o_confCommon.tracking.Gstat.useServerRedirect&&b&&("A"===b.tagName&&b.href&&""!==b.href&&"#"!==b.href?b.href=rewriteLink(b.href,c):o_changeImgForGstat4(c))}}function o_audience(a,b){if(!1!==b&&"undefined"!=typeof utag&&utag.view(a),!o_confCommon.tracking.Gstat.externalLoading&&"undefined"!=typeof _gstat){var c=o_confCommon.tracking.Gstat.path;a&&a.montant_total!==undefined&&_gstat.setAmount(a.montant_total),c?_gstat.audience("","",c):_gstat.audience("","","")}}function o_changeImgForGstat(a){if(o_hGetById("ImgForGstat")){var b=Math.round(1e10*Math.random());document.images.ImgForGstat.src="http://r.orange.fr/r?ref="+a+"&url=http%3A//c.woopic.com/Icons/z.gif?"+b}return!0}function o_changeAllLinks(a,b,c){var d,e=[],f="ok"===o_sExtractVar("displayRef"),g=!1===o_confCommon.tracking.Gstat.useServerRedirect;"string"==typeof a?e.push(a):void 0!==a&&null!==a&&a.nodeType===Node.ELEMENT_NODE?e.push(a):"object"==typeof a&&"undefined"!=typeof a.length?e=a:e.push(window.document),b=b||"_self",void 0!==(c=c||!1)&&null!==c||(c=!1);for(var h=function(a,b,c,d,e){var f,i,j;if(a.getAttribute&&a.getAttribute("data-tag"))f=a.getAttribute("data-tag"),e=void 0!==e&&null!==e?e+"_"+f:f;else if("string"==typeof a.className&&""!==a.className&&(j=a.className.indexOf("o_r_"))>=0){if(f=a.className.substr(j+4),j=f.indexOf(" "),j>=0&&(f=f.substr(0,j)),"notchanged"===f)return!1;e=void 0!==e&&null!==e?e+"_"+f:f}if(a.hasChildNodes())for(var k=a.childNodes,l=0;l<k.length;l++)h(k[l],b,c,d,e);if(null===a.tagName||a.tagName===undefined)return!1;i=a.tagName.toUpperCase(),"A"!==i&&"LINK"!==i&&a.getAttribute("href")&&!a.getAttribute("data-link-changed")&&(a.setAttribute("data-link-changed",!0),o_addEvent(a,"mouseover",function(){this.style.textDecoration="underline",this.style.cursor="pointer"}),o_addEvent(a,"mouseout",function(){this.style.textDecoration="none"}),o_addEvent(a,"click",function(){o_link({track_refGstat:e,track_destinationUrl:this.getAttribute("href")}),!1===g&&(top.location.href=rewriteLink(this.getAttribute("href"),e))})),"A"===i&&a.href&&!a.getAttribute("data-link-changed")?(a.setAttribute("data-link-changed",!0),o_addEvent(a,"mousedown",function(){o_link({track_refGstat:e,track_destinationUrl:a.href})}),!1===g&&(a.target||(a.target=b),d?a.href=rewriteLink(a.href,e):(a.setAttribute("data-link-changed",!0),o_addEvent(a,"mouseup",function(){this.href=rewriteLink(this.href,e)})))):"FORM"===i&&a.action&&c&&!a.getAttribute("data-link-changed")&&(a.setAttribute("data-link-changed",!0),o_addEvent(a,"submit",function(){o_link({track_refGstat:e,track_destinationUrl:a.action})}),!1===g&&(a.action=rewriteLink(a.action,e)))},i=0,j=e.length;i<j;i++)"string"==typeof e[i]?(d=o_hGetById(e[i]))&&h(d,b,c,f):h(e[i],b,c,f)}function rewriteLink(a,b){var c=!1,d=document.location.protocol;if(b&&b.indexOf("extLink")>=0&&(b=b.replace("extLink_",""),c=!0),b=null===b?window.sUrlReferrer:window.sUrlReferrer+"_"+b,a.match(/^(http:|https:)*(\/\/r\.orange\.fr\/r)/)){if(-1===a.indexOf("ref=")){var e=a.indexOf("?");e>-1?a=a.substring(0,e+1)+"ref="+b+"&"+a.substring(e+1,a.length):a+="?ref="+b}}else c?(encodeURIComponent(a),setTimeout(o_delay,0),window.location.href=d+"//r.orange.fr/l?ref="+b+"&url=none"):-1===a.indexOf("javascript")&&(a=d+"//r.orange.fr/r?ref="+b+"&url="+encodeURIComponent(a));return a}function o_switchMobileToDesktop(){o_confCommon.switchMobileToDesktop&&!0===o_confCommon.switchMobileToDesktop.activate&&(o_setUACookie(0),document.location.href=o_confCommon.switchMobileToDesktop.desktopURL?o_confCommon.switchMobileToDesktop.desktopURL:document.location.href)}function o_defineWassupEnv(){if(o_idzone.IDENT_FORM_URL){var a={"id.orange.fr":"prod","id-rec.orange.fr":"tb1","id-natnext.orange.fr":"tb2"};o_confCommon.wassupEnv=a[o_idzone.IDENT_FORM_URL.split("/")[2]]}}function o_getUserLoginInfo(a){var b=a||!1;0===o_idzone.IDZONE_STATUS||b?0===o_idZoneSingleton&&(o_is("Object",o_idzone)||(o_idzone={}),m_seg="res",c_seg=setSegmentation(),o_confCommon._idzForced&&"vis"!==o_confCommon._idzSeg&&(c_seg=o_confCommon._idzSeg),"msgpro"===c_seg?(m_seg="msgpro",o_confCommon.genericHeaderZone=!1,o_confCommon.noDeploy=!0):"vis"===c_seg&&(m_seg="nsru"),o_confCommon.headerPro&&"vis"===c_seg&&(m_seg="pro"),(null===o_idzone.USER_IDENT_LEVEL||null!==o_idzone.USER_IDENT_LEVEL&&"FULL"!==o_idzone.USER_IDENT_LEVEL)&&(o_confCommon.isConnected=!1),o_confCommon.isConnected&&o_confCommon.headerPro&&(m_seg="pro"),o_defineWassupEnv(),o_loadConfUpdate(),o_idZoneSingleton=1):o_idZoneTimeout=setTimeout(function(){o_getUserLoginInfo(!0)},100)}function o_footer(a,b){return o_confCommon.waitMode?o_pendingFunctions.push({name:"o_footer",arguments:arguments}):"function"==typeof o_generateFooter&&o_generateFooter(a,b),!0}function o_audience_wait(){null!==document.body&&document.getElementById("oan_adBan")&&document.getElementById("oan_adBan").hasChildNodes()||o_is("Function",window.oan_displayAd)?(window.o_timerAudienceWait&&clearInterval(window.o_timerAudienceWait),head.ready("gstat",function(){_gstat!==undefined&&_gstat.audience("","","")})):window.o_timerAudienceWait===undefined&&(window.o_timerAudienceWait=setInterval(function(){o_audience_wait()},10))}function o_refreshSession(a,b,c){var d=function(){var a={prod:"https://iapref.orange.fr/refresh?",tb1:"https://tb1n.orange.fr/track?",tb2:"https://iapref.natnext.orange.fr/refresh?"};return(o_confCommon.wassupEnv&&a[o_confCommon.wassupEnv]||a.prod)+"EC=true"}(),e=a||window.location.href.substring(window.location.protocol.length+2+window.location.hostname.length),f=b||window.location.hostname;return d+="&sn="+encodeURI(f),d+="&pn="+encodeURI(e),d+="&r="+Math.round(1e10*Math.random()),""!==document.referrer?d+="&h="+encodeURI(document.referrer):d+="&h=0",o_sGetCookie("ty")?d+="&ty="+o_sGetCookie("ty"):d+="&ty=0",o_hGetById(c)?o_hGetById(c).innerHTML='<img src="'+d+'" width="1" height="1">':document.body.insertAdjacentHTML("beforeEnd",'<img src="'+d+'" width="0" height="0" class="statTag">'),!0}function o_hGetById(a){return a&&"string"==typeof a&&a.indexOf(" ")>0?document.querySelector("#"+a.replace(" "," #")):document.getElementById(a)||!1}function o_hGetByClass(a){if(document.getElementsByClassName)return!!document.getElementsByClassName(a).length&&document.getElementsByClassName(a);document.getElementsByClassName=function(a){var b,c,d,e=document,f=[];if(e.querySelectorAll)return e.querySelectorAll("."+a);if(e.evaluate)for(c=".//*[contains(concat(' ', @class, ' '), ' "+a+" ')]",b=e.evaluate(c,e,null,0,null);d=b.iterateNext();)f.push(d);else for(b=e.getElementsByTagName("*"),c=new RegExp("(^|\\s)"+a+"(\\s|$)"),d=0;d<b.length;d++)c.test(b[d].className)&&f.push(b[d]);return f}}function o_sExtractVar(a,b){b=b!==undefined&&""!==b?b:document.location.search;var c=new RegExp(a+"=([^&]*)","");return c.test(b)?(c.exec(b),RegExp.$1):null}function o_bIsMail(a){return oRegExp=/^[\w\.-]+@[\w-]+\.\w+$/,oRegExp.test(a)}function o_bSetCookie(sName,sVal,options){var aOption,oRegExp,sCookieVal,i=0,len=0,exdate;try{if(options!==undefined&&-1!==options.indexOf("="))for(aOption=options.split(","),oRegExp=/\s*(\w*)\s*=\s*(.*)\s*/,i=0,len=aOption.length;i<len;i++){oRegExp.exec(aOption[i]);try{eval("var o_"+RegExp.$1+" = '"+RegExp.$2+"';")}catch(e){console.error("Impossible de traiter les options du cookie",e)}}return sCookieVal=encodeURI(sVal),"undefined"!=typeof o_expires&&(exdate=new Date,exdate.setDate(exdate.getDate()+parseInt(o_expires,10))),"undefined"==typeof o_expiresHour||isNaN(o_expiresHour)||(exdate===undefined&&(exdate=new Date),exdate.setHours(o_expiresHour,0,0,0)),document.cookie=sName+"="+sVal+("undefined"==typeof o_domain?"":";domain="+o_domain)+";path="+("undefined"==typeof o_path?"/":o_path)+(void 0===exdate?"":";expires="+exdate.toGMTString()),!0}catch(e){return console.error("Impossible de poser le cookie",e),!1}}function o_sGetCookie(a){var b,c;return document.cookie.length>0&&-1!==(b=document.cookie.indexOf(a+"="))&&(b=b+a.length+1,c=document.cookie.indexOf(";",b),-1===c&&(c=document.cookie.length),encodeURI(document.cookie.substring(b,c)))}function o_iz_class(){this.ACCESS_NETWORK="",this.ACCOUNT_MULTIBAL=!1,this.ACCOUNT_NETWORK="",this.ACCOUNT_OPTION_FFMV3=!1,this.ACCOUNT_OPTION_OCS=0,this.ACCOUNT_OPTION_OO_MAIL=!1,this.ACCOUNT_OPTION_OO_PIM=!1,this.ACCOUNT_OPTION_ORANGE_OFFICE=!1,this.ACCOUNT_OPTION_QUAD=!1,this.ACCOUNT_OPTION_SPORT=0,this.ACCOUNT_PRO=!1,this.ACCOUNT_SUBSCRIPTION_TYPE=null,this.ACCOUNT_OPTION_MCS=!1,this.COMMON_ZIP_CODE="",this.FLASH_SERVER="http://v3.woopic.com",this.IDENT_FORM_URL="http://id.orange.fr/auth_user/bin/auth_user.cgi",this.IMG_SERVER="http://i5.woopic.com",this.MOBILE_COMMERCIAL_SEGMENT="",this.MOBILE_OFFER_TYPE="",this.NETWORK_POOL="",this.NETWORK_TYPE="",this.PUBPERSO_VAR1=null,this.PUBPERSO_VAR2=null,this.PUBPERSO_VAR3=null,this.PUBPERSO_VAR4=null,this.PUBPERSO_VAR5=!1,this.PUBPERSO_VAR6=null,this.USER_AVATAR_TINY_PICTURE_URL=null,this.USER_DEFAULT_HOMEPAGE=-1,this.USER_DEFINED_MSISDN="",this.USER_FSS_DATA=null,this.USER_FULL_NAME="",this.USER_IDENT_CONTEXT=null,this.USER_IDENT_LEVEL="NONE",this.USER_IDENT_TYPE="",this.USER_IS_FUT=0,this.USER_ISIN_PREFS="",this.USER_MAIL_ADDRESS="",this.USER_MAIL_DETAILS_DATA_ALL="",this.USER_MAIL_NB=null,this.USER_MMS_NB=null,this.USER_SMS_NB=null,this.USER_MSISDN="",this.USER_MYCO_CGU_SUBSCRIPTION_STAMP=null,this.USER_OOPS_APP=null,this.USER_OPTOUT_MERGER=!1,this.USER_OSDAT_EXTRA="",this.USER_OSDAT_VAR1=null,this.USER_OSDAT_VAR2=null,this.USER_OSDAT_VAR3=null,this.USER_OSDAT_VAR4=null,this.USER_OSDAT_VAR5=null,this.USER_OSDAT_VAR6=null,this.USER_PRINCIPAL=!1,this.USER_PRO=!1,this.USER_PRO_PREFS="",this.USER_QMSISDN="",this.USER_QUAD=0,this.USER_OPEN=0,this.USER_SPUP_ALERT=null,this.USER_SPUP_PSEUDO_COUNT=null,this.USER_SPUP_PSEUDO_NAME=null,this.USER_TV_INTERNET_OFFER=0,this.USER_VOICE_MESSAGE_NB=null,this.USER_ZIP_CODE="",this.MOBILE_BRAND="",this.MOBILE_MODEL="",this.MOBILE_TAC_AUTOMATIC="",this.MOBILE_TAC_DECLARED="",this.MOBILE_TAC_USE_DECLARED=null,this.USER_HPPRO_GRID_SERVICES=null,this.USER_HPPRO_MPL_PROFILE="",this.USER_MOBILE_LAST_CONTRACT_DATE=null,this.USER_MOBILE_LAST_CONTRACT_DURATION=0,this.USER_MOBILE_FIRST_CONTRACT_DATE=null,this.USER_MOBILE_FIRST_CONTRACT_DURATION=0,this.USER_MOBILE_CONTRACT_TYPE="",this.USER_MOBILE_CONTRACT_DESC="",this.USER_MOBILE_OFFER_CODE="",this.USER_MOBILE_OFFER_DESC="",this.CR7_TIME="",this.CR7_SIGN="",this.USER_HOMELIVE_STATUS=null,this.USER_PPERSO_STATUS=null,this.USER_IDENT_METHOD=0,this.USER_BIRTHDAY=null,this.USER_GENDER=null,this.USER_FIRST_NAME="",this.USER_LAST_NAME="",this.USER_CITY_NAME="",this.USER_M6=!1,this.USER_BIMOBILE_TAGPRO=!1,this.USER_EXTERNAL_ID_HASH="",this.MOBILE_NETWORK_TYPE="",this.USER_TCF_CONTRACTS=null,this.USER_TCF_IDENTITY=null,this.USER_OPTION_TV_FIBRE=!1,this.USER_OPTION_TV_SAT=!1,this.USER_OPTION_TV_SAT_DOM=!1,this.USER_OPTION_TV_XDSL=!1,this.USER_OPTION_TV_ZNE=!1,this.USER_OPTION_TV_ZNE_DUO=!1,this.USER_ORANGE_CARAIBE_MOBILE=!1,this.USER_ORANGE_CARAIBE_CONVERGENT=!1}function o_delay(){var a=10;for(a+=(new Date).getTime();new Date<a;);}function o_cleanReferrer(a){return a.replace(/[^_a-zA-Z0-9]/g,"")}function o_changeImgForGstat4(a,b){!1===o_confCommon.tracking.Gstat.useServerRedirect&&(window.o_changeImgForGstat4=function(a){return""===a||(o_link({track_refGstat:a}),!1)},o_changeImgForGstat4(a));var c=document.location.host.replace(".orange.fr",""),d=Math.round(1e10*Math.random()),e="https:"===document.location.protocol?"https%3A":"http%3A",f=new Image;return""===a||(b&&"refNav"===b&&(c=window.sUrlReferrerAction||window.sUrlReferrer),f.src=document.location.protocol+"//r.orange.fr/r?ref="+c+"_"+a+"&url="+e+"//c.woopic.com/z.gif?"+d,setTimeout(o_delay,0),!1)}function o_setSearchValue(a){a=decodeURIComponent(encodeURIComponent(a)),o_confCommon.searchInputValue=a,o_getSearchValue()}function o_getSearchValue(){if(""!==o_confCommon.searchInputValue)if(o_hGetById("formSearchCompletion")){var a=o_hGetById("o-search-input")||o_hGetById("o-mobile-panel-input");a&&(o_addClass(o_hGetById("formSearchCompletion"),"set-search"),o_addClass(o_hGetById("formSearchCompletion"),"o-on"),o_addClass(a,"o-on"),a.value=o_confCommon.searchInputValue),clearTimeout(o_getSearchValue)}else setTimeout(o_getSearchValue,10)}function o_getUserCountry(){var a="",b="",c="";return o_idzone!==undefined&&(o_idzone.COMMON_ZIP_CODE!==undefined&&(b=o_idzone.COMMON_ZIP_CODE.substring(0,3)),o_idzone.USER_ZIP_CODE!==undefined&&(c=o_idzone.USER_ZIP_CODE.substring(0,3)),o_idzone!==undefined&&("REUNION"===o_idzone.NETWORK_TYPE||("1"===o_idzone.USER_IDENT_TYPE||"3"===o_idzone.USER_IDENT_TYPE)&&"974"===b||2===o_idzone._TYPE&&"974"===c?(o_idzone.USER_IS_REUNION=!0,a="_reu"):"reunion.orange.fr"===document.domain&&(o_idzone.USER_IS_REUNION=!0,a="_reu")),"ADSL/Mayotte"===o_idzone.NETWORK_POOL&&(a="_may"),"ADSL/Martinique"===o_idzone.NETWORK_POOL&&(a="_mar"),"ADSL/Guadeloupe"===o_idzone.NETWORK_POOL&&(a="_gua"),"ADSL/Guyane"===o_idzone.NETWORK_POOL&&(a="_guy")),a}function o_renderTemplate(a,b,c,d){d=d||"",o_confCommon.debug&&console.info("Impression du template: "+d),a=new o_t(a),c?o_hGetById(c).innerHTML=a.render(b):(o_confCommon.debug&&o_log(d+" ID du footer non defini, insertion juste avant le </body>","warn"),document.body.insertAdjacentHTML("beforeEnd",a.render(b)))}function o_truncate(a,b){var c="",d=0,e=!1,f="",g=0,h=0;for(a!==undefined&&null!==a||(a=""),g=0,h=a.length;(e||d<b)&&g<h;g++)f=a.charAt(g),"&"===f?(d++,e=!0):";"===f?e=!1:d++,c+=f;return c===a?c:c+"..."}function setSegmentation(){return c_ty=1,c_debit="RTC"==o_idzone.NETWORK_TYPE?"bd":"hd",1==o_idzone.USER_SOSH?1==o_idzone.ACCOUNT_OPTION_QUAD&&1==o_idzone.ACCOUNT_OPTION_MCS||2==o_idzone.USER_QUAD?(c_ty="20",c_seg="soshquad"):(c_ty="21",c_seg="sosh"):1==o_idzone.USER_BIMOBILE_TAGPRO?(c_ty="4",c_seg="pro"):o_idzone.ACCOUNT_MULTIBAL&&"PARTIAL"==o_idzone.USER_IDENT_LEVEL?o_idzone.ACCOUNT_PRO?(c_ty="4",c_seg="pro",c_pub="pro."+c_debit):(1==o_idzone.USER_QUAD?(c_seg="iquad",c_ty="11"):(c_seg="i",c_ty="1"),c_pub="i."+c_debit):1==o_idzone.USER_IDENT_TYPE?o_idzone.ACCOUNT_PRO?(c_ty="4",c_seg="pro",c_pub="pro."+c_debit):(1==o_idzone.USER_QUAD?"FIBRE"==o_idzone.ACCOUNT_NETWORK?(c_seg="fquad",c_ty="16"):(c_seg="iquad",c_ty="11"):"FIBRE"==o_idzone.ACCOUNT_NETWORK?(c_seg="f",c_ty="9"):"NONE"===o_idzone.USER_IDENT_LEVEL||null===o_idzone.USER_IDENT_LEVEL?(c_seg="vis",c_ty="8"):(c_seg="i",c_ty="1"),c_pub="i."+c_debit):2==o_idzone.USER_IDENT_TYPE?"PREPAID"==o_idzone.MOBILE_OFFER_TYPE?(c_seg="m",c_ty="2",c_pub="mpre/"):(2==o_idzone.USER_QUAD?(c_seg="mquad",c_ty="12"):(c_seg="m",c_ty="2"),c_pub="mpost/"):3==o_idzone.USER_IDENT_TYPE?o_idzone.ACCOUNT_PRO?(c_ty="5",c_seg="prom","PREPAID"==o_idzone.MOBILE_OFFER_TYPE?(c_pub="prompre."+c_debit,c_optionMobile="pre_pro"):(c_optionMobile="post_pro",c_pub="prompost."+c_debit)):("PREPAID"==o_idzone.MOBILE_OFFER_TYPE?(c_optionMobile="pre",c_seg="im",c_ty="3"):(c_optionMobile="post",3==o_idzone.USER_QUAD?"FIBRE"==o_idzone.ACCOUNT_NETWORK?(c_seg="fquadmquad",c_ty="18"):(c_seg="iquadmquad",c_ty="13"):2==o_idzone.USER_QUAD?(c_seg="imquad",c_ty="14"):1==o_idzone.USER_QUAD?"FIBRE"==o_idzone.ACCOUNT_NETWORK?(c_seg="fquadm",c_ty="17"):(c_seg="iquadm",c_ty="15"):"FIBRE"==o_idzone.ACCOUNT_NETWORK?(c_seg="fm",c_ty="19"):(c_seg="im",c_ty="3")),c_pub="im"+c_optionMobile+c_debit):4==o_idzone.USER_IDENT_CONTEXT?(c_pub="vis/",c_ty="8",c_seg="vis"):o_idzone.ACCOUNT_PRO?(c_ty="4",c_seg="pro",c_pub="pro.hd"):"NONE"===o_idzone.USER_IDENT_LEVEL||null===o_idzone.USER_IDENT_LEVEL?(c_pub="vis/",c_seg="vis",c_ty=void 0===o_sGetCookie||o_sGetCookie("hp_prospect")||o_sGetCookie("hpc-prospect")?"7":"6"):(c_seg="i",c_ty="1",c_pub="i."+c_debit),void 0!==o_bSetCookie&&!0===o_confCommon.setGstatProfile&&o_bSetCookie("ty",c_ty,"domain = .orange.fr"),c_seg}function preventDefaultBehavior(a){a.preventDefault?(a.preventDefault(),a.stopPropagation()):(a.cancelBubble=!0,a.returnValue=!1)}function stopPropagationBehavior(a){a.stopPropagation?a.stopPropagation():a.cancelBubble=!0}function o_hasClass(a,b){return!1!==a&&a.className.match(new RegExp("(\\s|^)"+b+"(\\s|$)"))}function o_addClass(a,b){a&&!this.o_hasClass(a,b)&&(a.className+=" "+b)}function o_removeClass(a,b){a&&o_hasClass(a,b)&&(a.className=a.className.replace(new RegExp("(?:^|\\s)"+b+"(?!\\S)","g"),""))}function o_toggleClass(a,b){o_hasClass(a,b)?o_removeClass(a,b):o_addClass(a,b)}function o_isNodeReady(a){if(o_is("String",a))return document.getElementById(a)?(clearTimeout(o_isNodeReady),!0):(setTimeout(function(){o_isNodeReady(a)},100),!1)}function o_isArrayEquals(a,b){if(!a||!b)return!1;if(a.length!==b.length)return!1;for(var c=0,d=a.length;c<d;c++)if(a[c]instanceof Array&&b[c]instanceof Array){if(!o_isArrayEquals(a[c],b[c]))return!1}else if(a[c]!==b[c])return!1;return!0}function o_changeTitle(a){if(!(navig.isIE&&navig.getVersion()<=8)){var b=o_hGetById(a);if(null!==b.getAttribute("data-change_title")){aElt=b.getAttribute("data-change_title").split(",");for(var c=0,d=aElt.length;c<d;c++)o_toggleTitle(a,aElt[c])}}}function o_toggleTitle(a,b){var c=!0===o_confCommon.isSosh?"s-on":"o-on",d=o_hGetById(a),e=o_hGetById(b);e.title=o_hasClass(d,c)?e.dataset.title_on:e.dataset.title_off}function o_toggleDisplay(a){""!==o_currentPanel&&o_executeToggle(o_currentPanel),""===a||o_isArrayEquals(a,o_currentPanel)?o_currentPanel="":(o_executeToggle(a),o_currentPanel=a)}function o_executeToggle(a){var b=!0===o_confCommon.isSosh&&!1===o_confCommon.sosh2Mode?"s-on":"o-on";if(o_is("Array",a))for(var c=0,d=a.length;c<d;c++)o_toggleClass(o_hGetById(a[c]),b),o_changeTitle(a[c]);else o_toggleClass(o_hGetById(a),b),o_changeTitle(a)}function o_setUACookie(a){switch(a){case 0:o_bSetCookie("ua","0","domain = .orange.fr");break;case 1:o_bSetCookie("ua","1","domain = .orange.fr");break;case 2:o_bSetCookie("ua","2","domain = .orange.fr");break;case 3:o_bSetCookie("ua","3","domain = .orange.fr");break;case 4:o_bSetCookie("ua","4","domain = .orange.fr")}}function o_ajax(a,b){var c,d=b||{};d={method:b.method||"GET",accept:b.accept||"",withCredentials:b.withCredentials||!1,headers:b.headers||{},data:b.data||null,synchronous:b.synchronous||!1,timeout:b.timeout,onSuccess:b.onSuccess||null,onError:b.onError||null,onLoadEnd:b.onLoadEnd||null},navig.isFF&&!0===b.synchronous&&!0===b.withCredentials&&(d.synchronous=!1);try{if("GET"!==d.method.toUpperCase()&&"POST"!==d.method.toUpperCase()||""===a)throw new Error("Paramètres invalides pour l'envoi d'une requête XHR.");if(d.withCredentials&&navig.isIE&&navig.getVersion()<=9)c=new XDomainRequest,c.open(d.method,a);else{c=new XMLHttpRequest,c.withCredentials=d.withCredentials,c.open(d.method,a,!d.synchronous);for(var e in d.headers)d.headers.hasOwnProperty(e)&&c.setRequestHeader(e,d.headers[e]);d.accept!==undefined&&c.setRequestHeader("Accept",d.accept),"POST"===d.method.toUpperCase()&&d.headers["Content-Type"]===undefined&&c.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8")}d.synchronous||(c.timeout=d.timeout,d.timeout>0&&(c.ontimeout=function(a){null!==d.onError&&d.onError(c,a),o_log("Timeout de la requête XHR dépassé.","warn")})),null!==d.onSuccess&&(c.onload=function(){d.onSuccess(c)}),null!==d.onLoadEnd&&c.addEventListener("loadend",function(){d.onLoadEnd(c)},!1),c.onerror=function(a){null!==d.onError&&d.onError(c,a),o_log("Ereur lors de l'envoi de la requête XHR.","warn")},c.send(d.data)}catch(f){o_log(f.message,"warn")}}function o_detectNavigationOrange(a){function b(a){return!(!a||!a.href||-1===a.href.indexOf(".orange.fr"))||!!(a=a.parentNode)&&b(a)}return b(a.target||a.srcElement)}function o_setRibbonCookie(){if(o_removeEvent(document,eventType,o_setRibbonCookie,!0),!o_sGetCookie("o-cookie-cnil")){o_bSetCookie("o-cookie-cnil","1"===o_sGetCookie("o-cookie-consent")?2:1,"domain = .orange.fr, expires =365")}}function o_initCompletion(a,b,c,d){var e,f=b||o_hGetById("o-search-input")||o_hGetById("o-mobile-panel-input"),g=c||"EC_standard_completion";e="Rechercher sur Orange";var h=function(){o_initCompletion(a,f,c,d),o_removeEvent(f,"focus",h)};try{if(d!==undefined?e=d:o_confCommon.responsiveMobile&&(e="rechercher sur orange.fr"),!o_confCommon.unifiedSearchEngine||!o_confCommon.unifiedSearchEngine.label||o_confCommon.classicSearch||"EC_standard_completion"!==g&&"EC_nav_completion"!==g||(e=o_confCommon.unifiedSearchEngine.label),o_confCommon.responsiveMobile?f.setAttribute("placeholder",e):document.querySelector("#o-search-label, #"+f.parentNode.id+" .o-search-label").innerHTML=e,f&&0===f.offsetHeight&&!0===o_confCommon.polaris3Mode)o_addEvent(f,"focus",h);else{if("https:"===document.location.protocol&&(o_confCommon.cmplPetale=!1),b?(o_confCommon.searchInputs[b.id]=g,f=b):o_confCommon.searchInputs[f.id]=g,f){var i={cssPrefix:"cmpl ec",url:document.location.protocol+"//completion.ke.orange.fr/proxy/cmplsearchbox",field:f,nameOfInstanceForJsonP:"BLO_Autocompletion."+g,additionalParams:"ref=urlwg_rubanGP3_recherche_lancer_completion&target=orange",maxNbChar:100,closeCompletionOnBlur:!0,isFormSubmit:!1,onClickCompletion:!0,onClickCompletionBaseUrl:"//api.ke.orange.fr/searchToptrends",onClickCompletionVersion:"v2.1",onClickCompletionAuthKey:"fd5f4401-2e17-4ef5-8562-c71e82d294f1",callbacks:{submit:{context:window,method:"o_headerFormSetup"}}};i.blocks={"default":[{label:"",baseId:-3,max:8}],toptrend:[{label:"Top tendance",max:5,type:"top",bottomLabel:""}]},o_confCommon.responsiveMobile&&(i.cssPrefix="cmpl ec mobile"),!o_confCommon.unifiedSearchEngine||o_confCommon.classicSearch||"EC_standard_completion"!==g&&"EC_nav_completion"!==g||(o_confCommon.unifiedSearchEngine.cmplUrl&&(i.url=o_confCommon.unifiedSearchEngine.cmplUrl),o_confCommon.unifiedSearchEngine.cmplAdditionalParams&&(i.additionalParams+="&"+o_confCommon.unifiedSearchEngine.cmplAdditionalParams),o_confCommon.unifiedSearchEngine.cmplBlocks&&o_confCommon.unifiedSearchEngine.cmplBlocks[0]&&(o_confCommon.unifiedSearchEngine.cmplBlocks[0].baseId&&(i.blocks["default"][0].baseId=o_confCommon.unifiedSearchEngine.cmplBlocks[0].baseId),o_confCommon.unifiedSearchEngine.cmplBlocks[0].max&&(i.blocks["default"][0].max=o_confCommon.unifiedSearchEngine.cmplBlocks[0].max),o_confCommon.unifiedSearchEngine.cmplBlocks[0].label&&(i.blocks["default"][0].label=o_confCommon.unifiedSearchEngine.cmplBlocks[0].label)),o_confCommon.unifiedSearchEngine&&o_confCommon.unifiedSearchEngine.toptrendCategory&&(i.onClickCompletionCategory=o_confCommon.unifiedSearchEngine.toptrendCategory),o_confCommon.unifiedSearchEngine&&!o_confCommon.unifiedSearchEngine.toptrend&&(i.onClickCompletion=!1)),a=o_mergeArrays(i,a),o_confCommon.responsiveMobile&&(a.plugins=["DirectLink","PetaleMobile"],i.onClickCompletion=!1),o_confCommon.cmplPetale?(a.Petale=!0,o_confCommon.responsiveMobile||(o_confCommon.unifiedSearchEngine?o_confCommon.unifiedSearchEngine.toptrend?a.plugins=["DirectLink","Petale","TopTrend"]:a.plugins=["DirectLink","Petale"]:a.plugins=["DirectLink","Petale","TopTrend"]),a.petaleLeftShiftWidth=0,a.petaleTopShiftHeight=0,a.petaleSmoothShow=!1,a.petaleDefaultImages={"default":"http://img.ke.orange.fr/I/leMoteur/petaleGenericImage.jpg",people:"http://img.ke.orange.fr/I/leMoteur/petaleGenericPeople.jpg",shopping:"http://img.ke.orange.fr/I/leMoteur/petaleGenericShopping.jpg",meteo:"http://img.ke.orange.fr/I/leMoteur/petaleGenericMeteo.jpg"}):a.plugins=["DirectLink","TopTrend"],BLO_Autocompletion[g]===undefined&&(BLO_Autocompletion[g]=new orangesearch.EC.completion.Component(a)),BLO_Autocompletion[g].isStarted()?(o_confCommon.noPluginProperties=o_mergeArrays(i,a),delete o_confCommon.noPluginProperties.plugins,BLO_Autocompletion[g].restart(o_confCommon.noPluginProperties)):BLO_Autocompletion[g].start();var j=function(a){for(var b=a.srcElement||a.target,c=!1;b.parentNode;)b!==o_hGetById("o-engine")&&b!==o_hGetById("o-ribbon")&&b!==o_hGetById("o-header-wrapper")&&b!==o_hGetById("o-service")&&b!==o_hGetById("o-mobile-panel-search")||(c=!0),b=b.parentNode;c||(BLO_Autocompletion[g]?BLO_Autocompletion[g].hideCompletionDiv():o_removeEvent(document.body,eventType,j,!1))};o_addEvent(document.body,eventType,j,!1)}!1===o_confCommon.useCompletion&&BLO_Autocompletion[g].disable()}}catch(k){console.error("Impossible d'instancier la completion: "+k)}}function o_headerFormSetup(a){if(""===a.query){var b=document.location.host.replace(".orange.fr","");return top.location.href="http://r.orange.fr/r/Ohome_moteur?ref="+b+"_urlwg_rubanGP3_recherche_lancer_home",!1}var c=o_confCommon.searchInputs[o_hGetById(a.id).id];a&&a.div&&BLO_Autocompletion[c].isSelectedSuggestion()&&(searchForm=o_hGetById(a.id).parentNode,searchForm.suggest=document.createElement("INPUT"),searchForm.suggest.type="hidden",searchForm.suggest.name="o-suggest",searchForm.suggest.id="o-suggest",searchForm.suggest.value="on"),BLO_Autocompletion&&BLO_Autocompletion[c]&&BLO_Autocompletion[c].currentBlocks&&"top"===BLO_Autocompletion[c].currentBlocks[0].type&&(searchForm.toptrend=document.createElement("INPUT"),searchForm.toptrend.type="hidden",searchForm.toptrend.name="o-toptrend",searchForm.toptrend.id="o-toptrend",searchForm.toptrend.value="on"),o_changeImgForGstat4("urlwg_rubanGP3_rechercher"),o_headerFormSubmit(a)}function o_headerFormSubmit(a){var b=o_hGetById(a.id).value,c=o_hGetById(a.id).parentNode,d=!1,e=!1,f="&bhv=web_fr&module="+o_defaultMoteurModule+"&target=orange",g=document.location.protocol+"//lemoteur.orange.fr/",h="",i="kw";!o_confCommon.unifiedSearchEngine||o_confCommon.classicSearch||"EC_standard_completion"!==o_confCommon.searchInputs[a.id]&&"EC_nav_completion"!==o_confCommon.searchInputs[a.id]||(o_confCommon.unifiedSearchEngine.queryUrl&&(g=o_confCommon.unifiedSearchEngine.queryUrl),o_confCommon.unifiedSearchEngine.queryParamName&&(i=o_confCommon.unifiedSearchEngine.queryParamName),o_confCommon.unifiedSearchEngine.queryAdditionalParams&&(f="&"+o_confCommon.unifiedSearchEngine.queryAdditionalParams)),g=g+"?"+i+"=",c.suggest&&"on"===c.suggest.value&&(d=!0),c.toptrend&&"on"===c.toptrend.value&&(e=!0),sUrlReferrerHead=sUrlReferrer+"_urlwg_rubanGP3_recherche_lancer_requete",d&&(sUrlReferrerHead+="_completion"),e&&(sUrlReferrerHead+="_toptrend"),-1!==document.location.host.indexOf("pro.orange.fr")&&(f+="&profil=pro"),g+=encodeURIComponent(b)+f,d&&(g+="&suggest=on"),h="http://r.orange.fr/r?ref="+sUrlReferrerHead+"&url="+encodeURIComponent(g),""!==b&&(top.location.href=h)}function o_progressiveDeployment(a,b,c,d){if(null==a)return!1;var e,f,g=b-1||0,h=c||"o-lottery",i=d||1
;if(g>0&&(e=Math.round((a[g].selectedRate-a[g-1].selectedRate)/(100-a[g-1].selectedRate)*100,2)),"1"!==o_sGetCookie(h)){var j=parseInt(100*Math.random()+1);!1===o_sGetCookie(h)?(f=j<=a[g].selectedRate?"1":a[g].value,o_bSetCookie(h,f,"domain = .orange.fr, expires="+i)):o_sGetCookie(h)!==a[g].value&&(f=j<=e?"1":a[g].value,o_bSetCookie(h,f,"domain = .orange.fr, expires="+i))}return!0}function o_abtest(a,b,c){if(null==a)return!1;var d,e,f,g,h,i,j,k,l=b-1||0,m=c||1,n={dist:{}};if("undefined"==typeof a.segment[l])return!1;if("undefined"==typeof a.cookie["default"])return!1;for(g in a.segment)if(a.segment.hasOwnProperty(g)&&"undefined"==typeof a.segment[g].dist.rdm){i=100;for(h in a.segment[g].dist)a.segment[g].dist.hasOwnProperty(h)&&(i-=a.segment[g].dist[h]);a.segment[g].dist.rdm=i}for(g in a.segment)if(a.segment.hasOwnProperty(g))for(h in a.segment[g].dist)a.segment[g].dist.hasOwnProperty(h)&&(a.segment[g].dist[h]=Math.floor(100*a.segment[g].dist[h]));if(l>0){j=0;for(g in a.segment[l].dist)"rdm"!==g&&(j+=a.segment[l].dist[g]-a.segment[l-1].dist[g]);n.selectedRate=Math.round(j/a.segment[l-1].dist.rdm*1e4,2),k=0;for(g in a.segment[l].dist)"rdm"!==g&&(k+=n.dist[g]=Math.round(1e4*(a.segment[l].dist[g]-a.segment[l-1].dist[g])/j,2));if(k>1e4){var o=Object.keys(n.dist)[Object.keys(n.dist).length-1];n.dist[o]-=k-1e4}}var p=function(a){var b,c=parseInt(1e4*Math.random()+1),d={},e=0;for(b in a)a.hasOwnProperty(b)&&(e++,d[b]={},d[b].min=e,e=e+a[b]-1,d[b].max=e);for(b in d)if(c>=d[b].min&&c<=d[b].max)return b};if(!1===(f=o_checkAbTestCookie(a)))f=p(a.segment[l].dist),d="undefined"!=typeof a.cookie[f]?a.cookie[f]:a.cookie["default"],e=l+1+"-"+("rdm"===f?"0":f);else if(!1!==o_sGetCookie(a.cookie["default"])){if(o_sGetCookie(a.cookie["default"])!==l+1+"-0"){var q=parseInt(1e4*Math.random()+1);o_bSetCookie(a.cookie[f],"","domain = .orange.fr, expires=-1"),q<=n.selectedRate?(f=p(n.dist),d="undefined"!=typeof a.cookie[f]?a.cookie[f]:a.cookie["default"],e=l+1+"-"+("rdm"===f?"0":f)):(d=a.cookie["default"],e=l+1+"-0")}}else d=a.cookie[f],o_sGetCookie(d)!==l+1+"-"+f&&(e=l+1+"-"+f);return void 0!==e&&o_bSetCookie(d,e,"domain = .orange.fr, expires="+m),!0}function o_checkAbTestCookie(a){for(var b in a.cookie)if(!1!==o_sGetCookie(a.cookie[b]))return b;return!1}function o_isVisible(a,b){var c=o_hGetById(a);if(!1===c)return o_log("[o_isVisible] Element "+a+" inconnu.","warn");var d=c.getBoundingClientRect();return!0===b?d.top>=0&&d.bottom<=(window.innerHeight||document.documentElement.clientHeight):d.top>=0&&d.left>=0&&d.bottom<=(window.innerHeight||document.documentElement.clientHeight)&&d.right<=(window.innerWidth||document.documentElement.clientWidth)}function o_getScrollTop(){var a=document.documentElement;return(window.pageYOffset||a.scrollTop)-(a.clientTop||0)}function o_getScrollLeft(){var a=document.documentElement;return(window.pageXOffset||a.scrollLeft)-(a.clientLeft||0)}function o_onLoadPush(a){o_aOnLoad.push(a)}function o_onResizePush(a){o_aOnResize.push(a)}function o_onUnLoadPush(a){o_aOnUnLoad.push(a)}function o_bodyOnLoad(){var i=0,len=0;for(i=0,len=o_aOnLoad.length;i<len;i++)try{eval(o_aOnLoad[i])}catch(ignore){}}function o_bodyOnResize(){var i=0,len=0;for(i=0,len=o_aOnResize.length;i<len;i++)try{eval(o_aOnResize[i])}catch(ignore){}}function o_bodyOnUnLoad(){var i=0,len=0;for(i=0,len=o_aOnUnLoad.length;i<len;i++)try{eval(o_aOnUnLoad[i])}catch(ignore){}}function o_scale(){var resizeList=o_scale.arguments;for(i=0;i<resizeList.length;i++){var x=resizeList[i],o_sWidthMax=null,o_sWidthMin=null;if(void 0!==x)if(re=/\s*(\w*)\s\:(.*)/,re.test(x)){re.exec(x),element=RegExp.$1,x=RegExp.$2,OptionArray=x.split(";"),re=/\s*(\w*)\s*=\s*(.*)\s*/;for(var opt in OptionArray){var thisone=OptionArray[opt];if(re.test(thisone)){re.exec(thisone);try{eval("var "+RegExp.$1+" = '"+RegExp.$2+"';")}catch(e){}}}}else element=x;null!==document.body&&document.body.clientWidth>=999?(null===o_sWidthMax&&(o_sWidthMax="991px"),void 0!==document.getElementById(element)&&o_hGetById(element)&&(document.getElementById(element).style.width=o_sWidthMax)):(null===o_sWidthMin&&(o_sWidthMin="780px"),void 0!==document.getElementById(element)&&o_hGetById(element)&&(document.getElementById(element).style.width=o_sWidthMin))}}var m_seg="res",c_seg="vis",c_ty,c_debit,o_idZoneTimeout=0,o_idZoneSingleton=0,o_currentPanel="",eventType="click",eventTypeAttribute="onclick";switch(o_confCommon.typeEnv){case"dev":case"rec":o_idOrange="id-rec.orange.fr",o_AuthURI="/auth_user/bin/auth_user.cgi";break;case"preprod":case"prod":default:o_idOrange="r.orange.fr",o_AuthURI="/r/Oid_identification"}"function"!=typeof Object.assign&&(Object.assign=function(a){"use strict";if(null===a)throw new TypeError("Cannot convert undefined or null to object");a=Object(a);for(var b=1;b<arguments.length;b++){var c=arguments[b];if(null!==c)for(var d in c)Object.prototype.hasOwnProperty.call(c,d)&&(a[d]=c[d])}return a}),Array.prototype.indexOf||(Array.prototype.indexOf=function(a,b){var c;if(null===this)throw new TypeError('"this" vaut null ou n est pas défini');var d=Object(this),e=d.length>>>0;if(0===e)return-1;var f=+b||0;if(Math.abs(f)===Infinity)return-1;if(f>=e)return-1;for(c=Math.max(f>=0?f:e-Math.abs(f),0);c<e;){if(c in d&&d[c]===a)return c;c++}return-1}),bLoadTimeTDone=!1;var o_sem={},aOpts=[];aOpts.channelmode=0,aOpts.directories=0,aOpts.fullscreen=0,aOpts.location=0,aOpts.menubar=0,aOpts.resizable=0,aOpts.scrollbars=0,aOpts.status=0,aOpts.titlebar=0,aOpts.width=480,aOpts.height=360;var aSpecOpts=["top","left"],def_wname="formpopup";if(o_iz_class.prototype.set=function(a){try{var b;for(b in a)this.hasOwnProperty(b)&&(this[b]=a[b])}catch(c){o_log("Impossible de creer l'objet idZone","warn")}finally{clearTimeout(o_idZoneTimeout),o_getUserLoginInfo()}},"object"!=typeof o_idzone)o_idzone=new o_iz_class;else{var o_idzoneTemp=new o_iz_class;for(var propertyName in o_idzoneTemp)o_idzone.hasOwnProperty(propertyName)||(o_idzone[propertyName]=o_idzoneTemp[propertyName])}o_initForcedConf();var o_userCountry=o_getUserCountry();!function(){function a(a){this.o_t=a}function b(a){return new Option(a).innerHTML.replace(/"/g,"&quot;")}function c(a,b){for(var c=b.split(".");c.length;){if(!(c[0]in a))return!1;a=a[c.shift()]}return a}function d(a,g){return a.replace(e,function(a,b,e,f,h,i,j,k){var l,m=c(g,f),n="";if(!m)return"!"===e?d(h,g):j?d(k,g):"";if(!e)return d(i,g);if("@"===e){a=g._key,b=g._val;for(l in m)m.hasOwnProperty(l)&&(g._key=l,g._val=m[l],n+=d(h,g));return g._key=a,g._val=b,n}return""}).replace(f,function(a,d,e){var f=c(g,e);return f||0===f?"%"===d?b(f):f:""})}var e=/\{\{(([@!]?)(.+?))\}\}(([\s\S]+?)(\{\{:\1\}\}([\s\S]+?))?)\{\{\/\1\}\}/g,f=/\{\{([=%])(.+?)\}\}/g;a.prototype.render=function(a){return d(this.o_t,a)},window.o_t=a}();var o_aOnLoad=[],o_aOnResize=[],o_aOnUnLoad=[];window.addEventListener?(window.addEventListener("load",o_bodyOnLoad,!1),window.addEventListener("resize",o_bodyOnResize,!1),window.addEventListener("unload",o_bodyOnUnLoad,!1)):window.attachEvent?(window.attachEvent("onload",o_bodyOnLoad),window.attachEvent("onresize",o_bodyOnResize),window.attachEvent("onunload",o_bodyOnUnLoad)):(window.onload=o_bodyOnLoad,window.onresize=o_bodyOnResize,window.onunload=o_bodyOnUnLoad);