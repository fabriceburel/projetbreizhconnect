//tealium universal tag - utag.38 ut4.0.201710121609, Copyright 2017 Tealium.com Inc. All Rights Reserved.
window.GoogleAnalyticsObject=""||"ga";window[window.GoogleAnalyticsObject]=window[window.GoogleAnalyticsObject]||function(){(window[window.GoogleAnalyticsObject].q=window[window.GoogleAnalyticsObject].q||[]).push(arguments);};try{(function(id,loader){var u={};utag.o[loader].sender[id]=u;if(utag.ut===undefined){utag.ut={};}if(utag.ut.loader===undefined){u.loader=function(o){var a,b,c,l;a=document;if(o.type==="iframe"){b=a.createElement("iframe");b.setAttribute("height","1");b.setAttribute("width","1");b.setAttribute("style","display:none");b.setAttribute("src",o.src);}else if(o.type==="img"){utag.DB("Attach img: "+o.src);b=new Image();b.src=o.src;return;}else{b=a.createElement("script");b.language="javascript";b.type="text/javascript";b.async=1;b.src=o.src;}if(o.id){b.id=o.id;}if(typeof o.cb==="function"){b.hFlag=0;b.onreadystatechange=function(){if((this.readyState==='complete'||this.readyState==='loaded')&&!b.hFlag){b.hFlag=1;o.cb();}};b.onload=function(){if(!b.hFlag){b.hFlag=1;o.cb();}};}l=o.loc||"head";c=a.getElementsByTagName(l)[0];if(c){utag.DB("Attach to "+l+": "+o.src);if(l==="script"){c.parentNode.insertBefore(b,c);}else{c.appendChild(b);}}};}else{u.loader=utag.ut.loader;}
if(utag.ut.typeOf===undefined){u.typeOf=function(e){return({}).toString.call(e).match(/\s([a-zA-Z]+)/)[1].toLowerCase();};}else{u.typeOf=utag.ut.typeOf;}
u.ev={'view':1,'link':1};u.o=window[window.GoogleAnalyticsObject];u.required={};u.created=false;u.all=function(e,o,v,a,b){for(var i=0;i<u.data.account.length;i++){var t=(u.data.name[i]?u.data.name[i]+".":"");if(o==="event"){u.o(t+e,o,v,a,b)}else if(v){u.o(t+e,o,v)}else{u.o(t+e,o);}}};u.setHitData=function(g,a,b,f){var obj=u.data[a];for(var d in utag.loader.GV(obj)){if(b&&d.indexOf("enh_"+b+"-")!==0&&d.indexOf("enh_all-")!==0){continue;}
var idx=d.split("-")[1],val=obj[d];if(u.typeOf(val)!=="array"){g[idx]=val;}else{g[idx]=val[f];}}};u.addEvent=function(v){if(typeof v.eventCategory=="undefined"||typeof v.eventAction=="undefined"){utag.DB("GA event Category or Action is not set");return;}
if(isNaN(parseInt(v.eventValue))){utag.DB("GA event Value is not a number");v.eventValue=null;}else{v.eventValue=parseInt(v.eventValue)||null;}
u.data.ga_events.push(v);};u.addproduct=function(event_type,len,imp){var g={},i,j,k=[];if(imp===true){k=(u.data.enh_impression_id.length?u.data.enh_impression_id:u.data.enh_impression_name);for(i=0;i<k.length;i++){g={};g.id=(u.data.enh_impression_id[i]?u.data.enh_impression_id[i]:"");g.name=(u.data.enh_impression_name[i]?u.data.enh_impression_name[i]:"");g.brand=(u.data.enh_impression_brand[i]?u.data.enh_impression_brand[i]:"");g.variant=(u.data.enh_impression_variant[i]?u.data.enh_impression_variant[i]:"");g.category=(u.data.enh_impression_category[i]?u.data.enh_impression_category[i]:"");g.list=(u.data.enh_impression_list[i]?u.data.enh_impression_list[i]:"");g.price=(u.data.enh_impression_price[i]?u.data.enh_impression_price[i]:"");g.position=(u.data.enh_impression_position[i]?u.data.enh_impression_position[i]:"");u.setHitData(g,"enhecom_events",event_type,i);u.all('ec:addImpression',g);}}else{for(i=0;i<len;i++){g={};if(u.data.autofill_params==="true"){for(j=0;j<u.data.product_id.length;j++){u.data.product_name[j]=u.data.product_name[j]||u.data.product_id[j];u.data.product_unit_price[j]=u.data.product_unit_price[j]||"1.00";u.data.product_quantity[j]=u.data.product_quantity[j]||"1";}}
g.id=u.data.product_id[i];g.name=(u.data.product_name[i]?u.data.product_name[i]:"");g.brand=(u.data.product_brand[i]?u.data.product_brand[i]:"");g.variant=(u.data.product_variant[i]?u.data.product_variant[i]:"");g.category=(u.data.product_category[i]?u.data.product_category[i]:"");g.price=(u.data.product_unit_price[i]?u.data.product_unit_price[i]:"");g.quantity=(u.data.product_quantity[i]?u.data.product_quantity[i]:"");g.coupon=(u.data.product_discount[i]?u.data.product_discount[i]:"");g.position=(u.data.product_position[i]?u.data.product_position[i]:"");u.setHitData(g,"enhecom_events",event_type,i);u.all('ec:addProduct',g);}}};u.addpromo=function(action,event){var f,g;for(f=0;f<u.data.enh_promo_id.length;f++){g={};g.id=u.data.enh_promo_id[f];g.name=(u.data.enh_promo_name[f]?u.data.enh_promo_name[f]:u.data.enh_promo_id[f]);g.creative=(u.data.enh_promo_creative[f]?u.data.enh_promo_creative[f]:"");g.position=(u.data.enh_promo_position[f]?u.data.enh_promo_position[f]:"");u.all('ec:addPromo',g);}
if(action==="promo_click"&&event==="link"){u.all('ec:setAction',u.data.enh_action);if(u.data.autosend_events==="true"){u.all('send','event','Internal Promotions','click',(g.name?g.name:g.id));}}};u.createTracker=function(){if(u.typeOf(u.data.account)==="string"){u.data.account=u.data.account.replace(/\s/g,"").split(",");}
if(u.typeOf(u.data.name)==="string"&&u.data.name!==""){u.data.name=u.data.name.replace(/\s/g,"").split(",");}
if(!u.data.name||u.data.name.length!==u.data.account.length){var start=u.data.name.length!==u.data.account.length?u.data.name.length:0;tn=utag.tagsettings.gua.trackernames;u.data.name=u.data.name||[];for(i=start;i<u.data.account.length;i++){u.data.name.push("tealium_"+(i+tn));}
utag.tagsettings.gua.trackernames=tn+i;}};u.initTracker=function(){var c;if(!u.created){u.created=true;for(f=0;f<u.data.account.length;f++){c={};if(u.data.siteSpeedSampleRate){c.siteSpeedSampleRate=parseInt(u.data.siteSpeedSampleRate);}
if(u.data.sampleRate){c.sampleRate=parseFloat(u.data.sampleRate);}
c.cookieDomain=u.data.cookieDomain;if(u.data.cookieExpires||u.data.cookieExpires==="0"){c.cookieExpires=parseInt(u.data.cookieExpires);}
if(u.data.legacyCookieDomain){c.legacyCookieDomain=u.data.legacyCookieDomain;}
c.allowLinker=u.data.allowLinker;if(typeof u.data.name[f]!=="undefined"&&u.data.name[f]!==""){c.name=u.data.name[f];}
u.o("create",u.data.account[f],c);}
if(u.data.optimizely==="true"){window.optimizely=window.optimizely||[];window.optimizely.push(['activateUniversalAnalytics']);}}};window.utag.tagsettings=window.utag.tagsettings||{};window.utag.tagsettings.gua=window.utag.tagsettings.gua||{};window.utag.tagsettings.gua.trackernames=window.utag.tagsettings.gua.trackernames||0;u.map={"js_page.o_idzone.USER_EXTERNAL_ID_HASH":"uid,dimension31","UA":"account","vod_google_dl_ovrw":"location","track_zone":"eventAction","track_page":"eventCategory","track_nom":"eventLabel","cp.dnu_abtest_actumail_01":"dimension30","cp.dnu_abtest_actumail_02":"dimension32","cp.o-cookie-cnil":"dimension33","cp.s-cookie-cnil":"dimension34","cp.o-cookie-consent":"dimension35","domaine":"dimension1","canal":"dimension2","couleur":"dimension3","user_logged":"dimension10","track_refGstat":"dimension37","track_destinationUrl":"dimension36","occ_compte":"dimension20","name":"dimension23","track_type":"dimension24","mere_nom":"dimension45","fille_nom":"dimension46","fil_ariane":"dimension47","categorie_nom":"dimension48","tutoriel_plateforme":"dimension49","tutoriel_usage":"dimension50","ns_site":"dimension4","mail_view":"dimension20","mail_tri":"dimension21","mail_nb_elements":"dimension22","mail_type":"dimension24","mail_dossier":"dimension25","mail_category":"dimension26","mail_space":"dimension27","mail_space_seuil":"dimension28","mail_type_mail":"dimension29","mail_pj":"dimension30","mail_statut":"dimension31","mail_nb_selection":"dimension32","mail_sous_category":"dimension33","mail_name":"eventAction","mail_zone":"eventCategory","agenda_vue":"dimension41","agenda_selection":"dimension42","agenda_calendrier":"dimension43","agenda_periode":"dimension44","agenda_ev_categorie":"dimension45","agenda_ev_type":"dimension46","agenda_ev_calendrier":"dimension47","agenda_ev_couleur":"dimension48","agenda_ev_case_journee":"dimension49","agenda_ev_date_debut":"dimension50","agenda_ev_heure_debut":"dimension51","agenda_ev_date_fin":"dimension52","agenda_ev_heure_fin":"dimension53","agenda_ev_recurrence":"dimension54","agenda_ev_frequence":"dimension55","agenda_ev_repetition":"dimension56","agenda_ev_jours_choisis":"dimension57","agenda_ev_partage":"dimension58","agenda_ev_invites":"dimension59","contacts_categorie":"dimension60","contacts_nb_fiches":"dimension61","contacts_nb_fiches_groupes":"dimension62","contacts_nb_groupes":"dimension63","contacts_nb_sources":"dimension64","contacts_nom_sources":"dimension65","contacts_fiche_nb_associations":"dimension66","contacts_fiche_nom_associations":"dimension67","contacts_fiche_nb_mails":"dimension68","contacts_fiche_nb_tels":"dimension69","contacts_fiche_nb_adresses":"dimension70","contacts_fiche_nb_autres":"dimension71","contacts_fiche_autres":"dimension72","ns_search_term":"dimension73","ns_search_result":"dimension74","contacts_ev_nb_donnees":"dimension75","contacts_ev_nb_modif":"dimension76","contacts_ev_doublons_suppr":"dimension77","contacts_ev_doublons_asso":"dimension78","contacts_ev_nb_asso":"dimension79"};u.extend=[function(a,b,c,d,e,f,g){d=b['dom.url'];if(typeof d=='undefined')return;c=[{'reseaux.orange.fr':'UA-82378354-17'},{'service24.orange.fr':'UA-82378354-17'},{'lecollectif.orange.fr':'UA-82378354-17'},{'service.orange.fr':'UA-82378354-17'},{'mail..\.qf-tb2n1\.orange\.fr\/ ':'UA-82378354-52'},{'mescontacts.orange.fr':'UA-82378354-51'},{'agenda.orange.fr':'UA-82378354-50'}];var m=false;for(e=0;e<c.length;e++){for(f in c[e]){g=new RegExp(f,'i');if(g.test(d)){b['UA']=c[e][f];m=true};};if(m)break};if(!m)b['UA']='UA-82378354-24';},function(a,b){try{if((b['dom.url'].toString().indexOf('#')>-1&&b['dom.url'].toString().indexOf('video-a-la-demande.orange.fr')>-1)){try{b['vod_google_dl_ovrw']=document.location.origin+"/"+document.location.hash.replace('#','');}catch(e){}}}catch(e){utag.DB(e)}},function(a,b,c,d){try{if(b['utx_campaign'].toString().toLowerCase()!=''.toLowerCase()||b['utx_source'].toString().toLowerCase()!=''.toLowerCase()||b['utx_medium'].toString().toLowerCase()!=''.toLowerCase()||b['utx_term'].toString().toLowerCase()!=''.toLowerCase()){c=[b['utx'],b['utx_campaign']];b['track_nom']=c.join('utx_')}}catch(e){utag.DB(e)}},function(a,b,c,d){try{if(b['utx_campaign'].toString().toLowerCase()!=''.toLowerCase()||b['utx_source'].toString().toLowerCase()!=''.toLowerCase()||b['utx_medium'].toString().toLowerCase()!=''.toLowerCase()||b['utx_term'].toString().toLowerCase()!=''.toLowerCase()){c=[b['utx'],b['utx_source']];b['track_page']=c.join('utx_')}}catch(e){utag.DB(e)}},function(a,b,c,d){try{if(b['utx_campaign'].toString().toLowerCase()!=''.toLowerCase()||b['utx_source'].toString().toLowerCase()!=''.toLowerCase()||b['utx_medium'].toString().toLowerCase()!=''.toLowerCase()||b['utx_term'].toString().toLowerCase()!=''.toLowerCase()){c=[b['utx'],b['utx_medium']];b['track_zone']=c.join('utx_')}}catch(e){utag.DB(e)}}];u.send=function(a,b){if(u.ev[a]||u.ev.all!==undefined){u.o=window[window.GoogleAnalyticsObject];b.ga_events=b.ga_events||[];var c,d,e,f,g,tn,prop;if(u.data&&u.data.name){tn=u.data.name;}
u.data={"qsp_delim":"&","kvp_delim":"=","base_url":"","a":a,"cookieDomain":""||utag.loader.lh(),"name":tn||"","account":"","anonymizeIp":"true","allowLinker":"true","crossDomainTrack":"sosh.fr","enhancedLinkAttribution":"false","enhancedecommerce":"false","displayfeatures":"false","screenView":"false","optimizely":"false","init_before_extensions":"false","autofill_params":"false","autosend_events":"true"||"true","enh_action":"","enh_event_cb":"","enh_checkout_step":"","enh_checkout_option":"","product_action_list":"","product_variant":[],"enh_impression_id":[],"enh_impression_name":[],"enh_impression_price":[],"enh_impression_category":[],"enh_impression_brand":[],"enh_impression_variant":[],"enh_impression_list":[],"enh_impression_position":[],"enh_promo_id":[],"enh_promo_name":[],"enh_promo_creative":[],"enh_promo_position":[],"id":"","product_id":[],"product_name":[],"product_brand":[],"product_category":[],"product_quantity":[],"product_unit_price":[],"product_discount":[],"product_position":[],"ga_events":[],"sessionControl":"","set":{}};if(u.data.init_before_extensions==="true"){u.createTracker();u.initTracker();}
for(c=0;c<u.extend.length;c++){try{d=u.extend[c](a,b);if(d==false)return}catch(e){}};c=[];for(d in utag.loader.GV(u.map)){if(b[d]!==undefined&&b[d]!==""){e=u.map[d].split(",");for(f=0;f<e.length;f++){if(e[f].indexOf("a.")===0){u.data["a"][e[f].substring(2)]=b[d];}else if(e[f].indexOf("set.")===0){u.data.set[e[f].substring(4)]=b[d];}else{u.data[e[f]]=b[d];}}}else{h=d.split(":");if(h.length===2&&b[h[0]]===h[1]){if(u.map[d]){u.data.enh_action=u.map[d];}}}}
if(u.typeOf(u.data.ga_events)==="array"&&u.typeOf(b.ga_events)==="array"){if(u.data.ga_events.length===0&&b.ga_events.length>0){u.data.ga_events=b.ga_events;}else if(u.data.ga_events.length>0&&b.ga_events.length>0){u.data.ga_events=u.data.ga_events.concat(b.ga_events);}}
u.data.order_id=u.data.order_id||b._corder||"";u.data.order_total=u.data.order_total||b._ctotal||"";u.data.order_shipping=u.data.order_shipping||b._cship||"";u.data.order_tax=u.data.order_tax||b._ctax||"";u.data.order_store=u.data.order_store||b._cstore||"";u.data.order_currency=u.data.order_currency||b._ccurrency||"";u.data.order_coupon_code=u.data.order_coupon_code||b._cpromo||"";if(u.data.product_id.length===0&&b._cprod!==undefined){u.data.product_id=b._cprod.slice(0);}
if(u.data.product_name.length===0&&b._cprodname!==undefined){u.data.product_name=b._cprodname.slice(0);}
if(u.data.product_brand.length===0&&b._cbrand!==undefined){u.data.product_brand=b._cbrand.slice(0);}
if(u.data.product_category.length===0&&b._ccat!==undefined){u.data.product_category=b._ccat.slice(0);}
if(u.data.product_quantity.length===0&&b._cquan!==undefined){u.data.product_quantity=b._cquan.slice(0);}
if(u.data.product_unit_price.length===0&&b._cprice!==undefined){u.data.product_unit_price=b._cprice.slice(0);}
if(u.data.product_discount.length===0&&b._cpdisc!==undefined){u.data.product_discount=b._cpdisc.slice(0);}
if(u.data.init_before_extensions!=="true"){u.createTracker();u.initTracker();}
if(u.data.enhancedecommerce==="true"&&!u.required["ec"]){u.required["ec"]=!0;u.all("require","ec");}
u.data.app_id=u.data.app_id||u.data.appId||b.app_id;u.data.app_name=u.data.app_name||u.data.appName||b.app_name;u.data.app_version=u.data.app_version||u.data.appVersion||b.app_version;u.data.app_rdns=u.data.app_rdns||u.data.appInstallerId||b.app_rdns;u.data.screen_title=u.data.screen_title||u.data.screenName||b.screen_title;if(u.data.app_id||u.data.app_name){g={};g.appName=u.data.app_name;g.appId=u.data.app_id||"";g.appVersion=u.data.app_version;g.appInstallerId=u.data.app_rdns;u.all("set",g);}
u.data.exception_reason=u.data.exception_reason||b.exception_reason;if(u.data.exception_reason){g={};g.exDescription=u.data.exception_reason;g.exFatal=true;u.all("send","exception",g);}
if(u.data.allowLinker==="true"||u.data.allowLinker===true){if(!u.required["linker"]){u.all("require","linker");u.required["linker"]=!0;}
if(u.data.crossDomainTrack){if(u.typeOf(u.data.crossDomainTrack)==="string"){u.data.crossDomainTrack=u.data.crossDomainTrack.replace(/\s/g,'').split(',');}
u.all("linker:autoLink",u.data.crossDomainTrack);}}
if(u.data.anonymizeIp==="true"||u.data.anonymizeIp===true){u.all("set",'anonymizeIp',true);}
if(u.data.uid){u.all("set","&uid",u.data.uid);}
if(u.data.page){u.all("set","page",u.data.page);}
if(u.data.title){u.all("set","title",u.data.title);}
if(u.data.location){u.all("set","location",u.data.location);}
if(u.data.campaignName){u.all("set","campaignName",u.data.campaignName);}
if(u.data.campaignSource){u.all("set","campaignSource",u.data.campaignSource);}
if(u.data.campaignMedium){u.all("set","campaignMedium",u.data.campaignMedium);}
if(u.data.campaignContent){u.all("set","campaignContent",u.data.campaignContent);}
if(u.data.campaignKeyword){u.all("set","campaignKeyword",u.data.campaignKeyword);}
if(u.data.displayfeatures==="true"||u.data.displayfeatures===true){if(!u.required["displayfeatures"]){u.required["displayfeatures"]=!0;u.all("require","displayfeatures");}}
if(u.data.dataSource){u.all("set","dataSource",u.data.dataSource);}
for(prop in utag.loader.GV(u.data.set)){u.all("set",prop,u.data.set[prop]);}
u.data.transaction_events={};u.data.pageview_events={};u.data.link_events={};u.data.enhecom_events={};for(d in utag.loader.GV(u.data)){if(d.indexOf("-")>-1&&(d.indexOf("metric")>-1||d.indexOf("dimension")>-1||d.indexOf("contentGroup")>-1)){if(d.indexOf("transaction-")===0){u.data.transaction_events[d]=u.data[d];}else if(d.indexOf("pageview-")===0){u.data.pageview_events[d]=u.data[d];}else if(d.indexOf("link-")===0){u.data.link_events[d]=u.data[d];}else if(u.data.enhancedecommerce==="true"&&d.indexOf("enh_")===0){u.data.enhecom_events[d]=u.data[d];}}else if(d.indexOf("metric")===0||d.indexOf("dimension")===0||d.indexOf("contentGroup")===0){u.all("set",d,u.data[d]);}}
if(u.data.enhancedLinkAttribution==="true"){if(!u.required["enhancedLinkAttribution"]){u.required["enhancedLinkAttribution"]=!0;u.all("require","linkid","linkid.js");}}
u.data.order_id=(u.data.order_id?u.data.order_id:u.data.id);if(u.data.enhancedecommerce==="true"){u.all("set",'&cu',(u.data.currency?u.data.currency:u.data.order_currency));if(u.data.order_id&&u.data.enh_action==="refund"){if(u.data.order_id instanceof Array&&u.data.order_id.length>0){u.data.order_id=u.data.order_id[0];}
for(f=0;f<u.data.product_id.length;f++){g={};g.id=u.data.product_id[f];g.quantity=(u.data.product_quantity[f]?u.data.product_quantity[f]:"1");u.setHitData(g,"enhecom_events","product_refund",f);u.all('ec:addProduct',g);}
g={};g.id=u.data.order_id;u.setHitData(g,"enhecom_events","refund");u.all('ec:setAction','refund',g);}
else if(u.data.order_id){if(u.data.order_id instanceof Array&&u.data.order_id.length>0){u.data.order_id=u.data.order_id[0];}
u.addproduct("product_purchase",u.data.product_id.length,false);g={};g.id=u.data.order_id;g.affiliation=(u.data.affiliation?u.data.affiliation:u.data.order_store);g.revenue=(u.data.revenue?u.data.revenue:u.data.order_total);g.shipping=(u.data.shipping?u.data.shipping:u.data.order_shipping);g.tax=(u.data.tax?u.data.tax:u.data.order_tax);g.coupon=(u.data.coupon?u.data.coupon:u.data.order_coupon_code);u.setHitData(g,"enhecom_events","purchase");u.all('ec:setAction','purchase',g);}
else if(u.data.enh_action==="product_click"&&u.data.a==="link"){u.addproduct("product_click",1,false);u.all('ec:setAction','click',{list:u.data.product_action_list});if(u.data.autosend_events==="true"){u.all('send','event','UX','click','Results',{'hitCallback':window[u.data.enh_event_cb]});}
}
else if(u.data.enh_action==="detail"){u.addproduct("detail",1,false);g={};u.setHitData(g,"list",u.data.product_action_list);u.all("ec:setAction","detail");}
else if(u.data.enh_action==="add"){u.addproduct("product_add",u.data.product_id.length,false);u.all('ec:setAction','add',{list:u.data.product_action_list});if(u.data.a==="link"&&u.data.autosend_events==="true"){u.all('send','event','UX','click','add to cart');}
}
else if(u.data.enh_action==="remove"){u.addproduct("product_remove",u.data.product_id.length,false);u.all('ec:setAction','remove');if(u.data.a==="link"&&u.data.autosend_events==="true"){u.all('send','event','UX','click','remove from cart');}
}
else if(u.data.enh_action==="checkout"){u.addproduct("product_checkout",u.data.product_id.length,false);g={};g.step=u.data.enh_checkout_step||"1";g.option=u.data.enh_checkout_option;u.all('ec:setAction',u.data.enh_action,g);}
if(u.data.enh_action==="checkout_option"&&u.data.a==="link"){g={};g.step=u.data.enh_checkout_step||"1";g.option=u.data.enh_checkout_option;u.all('ec:setAction',u.data.enh_action,g);if(u.data.autosend_events==="true"){u.all('send','event','Checkout','Option',{'hitCallback':window[u.data.enh_event_cb]});}
}
if(u.data.enh_impression_id){u.addproduct("product_impression",u.data.enh_impression_id.length,true);}
if(u.data.enh_promo_id){u.addpromo(u.data.enh_action,u.data.a);}
g={};if(u.data.order_id){u.setHitData(g,"transaction_events");}
u.setHitData(g,"pageview_events");if(u.data.sessionControl==="start"||u.data.sessionControl==="end"){g.sessionControl=u.data.sessionControl;}
if(u.data.a==="view"){if(u.data.screenView==="true"||u.data.screenView===true){g.screenName=u.data.screen_title||"";u.all("send","screenview",g);}else{g.hitType="pageview";u.all("send",g);}}
}else if(u.data.a==="view"){g={};u.setHitData(g,"pageview_events");if(u.data.sessionControl==="start"||u.data.sessionControl==="end"){g.sessionControl=u.data.sessionControl;}
if(u.data.screenView==="true"||u.data.screenView===true){g.screenName=u.data.screen_title||"";u.all("send","screenview",g);}else{g.hitType="pageview";u.all("send",g);}
if(u.data.order_id&&!(u.data.order_id instanceof Array)){if(!u.required["ecommerce"]){u.required["ecommerce"]=!0;u.all("require","ecommerce","ecommerce.js");}
g={};u.setHitData(g,"transaction_events");g.id=u.data.order_id;g.affiliation=(u.data.affiliation?u.data.affiliation:u.data.order_store);g.revenue=(u.data.revenue?u.data.revenue:u.data.order_total);g.shipping=(u.data.shipping?u.data.shipping:u.data.order_shipping);g.tax=(u.data.tax?u.data.tax:u.data.order_tax);g.currency=(u.data.currency?u.data.currency:u.data.order_currency);u.all('ecommerce:addTransaction',g);for(f=0;f<u.data.product_id.length;f++){g={};g.id=u.data.order_id;g.sku=u.data.product_id[f];g.name=(u.data.product_name[f]?u.data.product_name[f]:u.data.product_id[f]);g.category=(u.data.product_category[f]?u.data.product_category[f]:"");g.price=(u.data.product_unit_price[f]?u.data.product_unit_price[f]:"1.00");g.quantity=(u.data.product_quantity[f]?u.data.product_quantity[f]:"1");u.setHitData(g,"transaction_events");u.all('ecommerce:addItem',g);}
u.all('ecommerce:send');}else if(u.data.order_id instanceof Array&&u.data.order_id.length>0){if(!u.required["ecommerce"]){u.required["ecommerce"]=!0;u.all("require","ecommerce","ecommerce.js");}
var lastindex=0;for(f=0;f<u.data.order_id.length;f++){if(f===u.data.order_id.length-1||(u.data.order_id[f]!==u.data.order_id[f+1])){g={};u.setHitData(g,"transaction_events");g.id=u.data.order_id[f];g.affiliation=(u.data.affiliation&&typeof u.data.affiliation[f]!=="undefined"?u.data.affiliation[f]:u.data.order_store);g.revenue=(u.data.revenue&&typeof u.data.revenue[f]!=="undefined"?u.data.revenue[f]:u.data.order_total);g.shipping=(u.data.shipping&&typeof u.data.shipping[f]!=="undefined"?u.data.shipping[f]:u.data.order_shipping);g.tax=(u.data.tax&&typeof u.data.tax[f]!=="undefined"?u.data.tax[f]:u.data.order_tax);g.currency=(u.data.currency?u.data.currency:u.data.order_currency);u.all('ecommerce:addTransaction',g);for(e=lastindex;e<f+1;e++){g={};g.id=u.data.order_id[f];g.sku=u.data.product_id[e];g.name=(u.data.product_name[e]?u.data.product_name[e]:u.data.product_id[e]);g.category=(u.data.product_category[e]?u.data.product_category[e]:"");g.price=(u.data.product_unit_price[e]?u.data.product_unit_price[e]:"1.00");g.quantity=(u.data.product_quantity[e]?u.data.product_quantity[e]:"1");u.setHitData(g,"transaction_events");u.all('ecommerce:addItem',g);}
lastindex=f+1;}}
u.all('ecommerce:send');}
}
if(u.data.eventCategory&&u.data.eventAction){g={};u.setHitData(g,"link_events");g.hitType="event";g.eventCategory=u.data.eventCategory;if(u.data.nonInteraction){g.nonInteraction=1;}
g.eventAction=u.data.eventAction;if(u.data.eventLabel){g.eventLabel=u.data.eventLabel;}
if(typeof u.data.eventValue!=="undefined"&&u.data.eventValue!==""){g.eventValue=u.data.eventValue;}
if(u.data.screenView==="true"||u.data.screenView===true){g.screenName=u.data.screen_title||"";}
if(u.data.sessionControl==="start"||u.data.sessionControl==="end"){g.sessionControl=u.data.sessionControl;}
u.all("send",g);u.data.eventCategory=u.data.eventAction=u.data.eventLabel=u.data.eventValue="";}
for(e=0;e<u.data.ga_events.length;e++){g={};u.setHitData(g,"link_events");g.hitType="event";g.eventCategory=u.data.ga_events[e].eventCategory;g.eventAction=u.data.ga_events[e].eventAction;g.eventLabel=u.data.ga_events[e].eventLabel;g.eventValue=u.data.ga_events[e].eventValue;if(u.data.ga_events[e].nonInteraction){g.nonInteraction=1;}
if(u.data.sessionControl==="start"||u.data.sessionControl==="end"){g.sessionControl=u.data.sessionControl;}
u.all("send",g);}
if(u.data.socialNetwork&&u.data.socialAction&&u.data.socialTarget){g={};g.hitType="social";g.socialNetwork=u.data.socialNetwork;g.socialAction=u.data.socialAction;g.socialTarget=u.data.socialTarget;u.all("send",g);u.data.socialNetwork=u.data.socialAction=u.data.socialTarget="";}
if(u.data.timingCategory&&u.data.timingVar&&u.data.timingValue){g={};g.hitType="timing";g.timingCategory=u.data.timingCategory;g.timingVar=u.data.timingVar;g.timingValue=u.data.timingValue;g.timingLabel=u.data.timingLabel||"";u.all("send",g);}
if(u.data["ga-disable"]){window["ga-disable-"+u.data["ga-disable"]]=true;}
(function(){var id='tealium-tag-7110';if(document.getElementById(id)){return;}
u.loader({"type":"script","src":'https://www.google-analytics.com/analytics.js',"loc":"script","id":id});u.o.l=1*new Date();})();}};utag.o[loader].loader.LOAD(id);}('38','orange.dnu'));}catch(error){utag.DB(error);}
