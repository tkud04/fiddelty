function startsWith(n,t){return n.indexOf(t)===0}function DomDataCollection(n){function u(){}function f(n){return typeof n=="function"}var t=this,r;t.config={recursion_level:1,collection_mode:"partial",functionsToExclude:[],function_list_size:1024,json_script:n?n:"json2.js"},t.emptyDomData=function(){t.dom_data={functions:{names:[],excluded:{size:0,count:0},truncated:!1},inputs:[],iFrames:[],scripts:[],collection_status:DomDataCollection.NotStarted}},t.startInspection=function(){var n=!1,i=!0;if(BrowserDetect.init(),BrowserDetect.browser==="Explorer")t.dom_data.functions=[],(t.dom_data.functions===undefined||t.dom_data.functions.names===undefined)&&(t.dom_data.functions={names:[],excluded:{size:0,count:0},truncated:!1});else try{t.inspectJSFunctions(),i=!1}catch(r){n=n||!0}try{t.inspectFrames(),i=!1}catch(r){n=n||!0}try{t.inspectScripts(),i=!1}catch(r){n=n||!0}try{t.inspectInputFields(),i=!1}catch(r){n=n||!0}t.dom_data.collection_status=n?i?DomDataCollection.Fail:DomDataCollection.Partial:DomDataCollection.Success,BrowserDetect.browser==="Explorer"||t.handleSizeLimit()},t.domDataAsJSON=function(){return stripIllegalChars(JSON.stringify(t.dom_data))},t.recursiveGetAllFunctionNamesUnderElement=function(n,i,r){var a,h,v,y=t.config,p=y.recursion_level,w=y.collection_mode,o,c,s,e,l;(t.dom_data.functions===undefined||t.dom_data.functions.names===undefined)&&(t.dom_data.functions={names:[],excluded:{size:0,count:0},truncated:!1}),o=t.dom_data.functions,c=o.excluded;for(s in i)try{e=i[s],a=""+e,prefix=n.length>0?n+".":"",h=prefix+s,f(e)&&(t.functionShouldBeCollected(e,s)?(l=o.names,v=l.length,l[v]=h):w=="partial"&&(c.size+=a.length,c.count++)),r+1<p?t.recursiveGetAllFunctionNamesUnderElement(h,e,r+1):o.names.sort()}catch(b){window.console||(window.console={},window.console.info=u,window.console.log=u,window.console.warn=u,window.console.error=u),console&&console.log&&console.log("error counting functions: "+b.toString())}},r=new Hashtable,t.initFunctionsToExclude=function(){r&&r.clear();for(var n=t.config.functionsToExclude,i=n.length;i--;)r.put(n[i],"")},t.functionShouldBeCollected=function(n,i){return t.config.collection_mode=="full"?!0:(r.size()===0&&t.initFunctionsToExclude(),r.containsKey(i)?!1:!0)},t.inspectJSFunctions=function(){t.dom_data.functions=[],t.recursiveGetAllFunctionNamesUnderElement("",window,0)},t.handleSizeLimit=function(){var n=t.dom_data,h=t.config,u=h.function_list_size,i=n.functions,e,c;if(i.names.sort(),e=JSON.stringify(n),u<0&&(u=0),c=0,h.colllection_mode!="full"&&e.length>u){for(var o=i.names,s=o.toString(),l=e.length-JSON.stringify(o).length+"[]".length,f=!1,r=o.length;!f;)c++==1e3&&(f=!0),lastComma=s.lastIndexOf(","),lastComma>=0&&r>0?(quotation_marks=r*2,l+lastComma+quotation_marks>u?(s=s.substring(0,lastComma-1),r--):f=!0):f=!0;r>1?(i.truncated=!0,i.names=i.names.slice(0,r-1),n.functions.truncated=!0):(t.emptyDomData(),n=t.dom_data,n.collection_status=DomDataCollection.Partial,n.functions.truncated=!0)}},t.inspectFrames=function(){t.countElements("iframe")},t.countElements=function(n){var u=document.getElementsByTagName(n),r,f;for(t.dom_data.iFrames===undefined&&(t.dom_data.iFrames=[]),r=t.dom_data.iFrames,f=r.length,i=0;i<u.length;i++)r[f+i]=""+u[i].src;r.sort()},t.inspectScripts=function(){var i=document.getElementsByTagName("script"),n;for(t.dom_data.scripts=[],n=0;n<i.length;n++)t.dom_data.scripts[n]=i[n].text.length},t.collectFields=function(n){var e=document.getElementsByTagName(n);t.dom_data.inputs===undefined&&(t.dom_data.inputs=[]);for(var i=t.dom_data.inputs,s=i.length,r=e.length;r--;){var o=e[r],u=o.name,f=o.id;element_name=u&&u.length>0?u:f&&f.length>0?f:"NO_NAME",i[s+r]=element_name}i.sort()},t.inspectInputFields=function(){t.collectFields("input"),t.collectFields("textarea"),t.collectFields("select"),t.collectFields("button")},loadJSON=function(){if(!window.JSON){var i=document.getElementsByTagName("head")[0],n=document.createElement("script");n.type="text/javascript",n.src=t.config.json_script,i.appendChild(n)}},t.emptyDomData(),loadJSON()}function IE_FingerPrint(){this.deviceprint_browser=function(){var n=navigator.userAgent.toLowerCase();return t=n+SEP+navigator.appVersion+SEP+navigator.platform,t+=SEP+navigator.appMinorVersion+SEP+navigator.cpuClass+SEP+navigator.browserLanguage,t+=SEP+ScriptEngineBuildVersion()},this.deviceprint_software=function(){var t="",f=!0,u,o,e;try{for(document.body.addBehavior("#default#clientCaps"),o=n.length,i=0;i<o;i++)u=activeXDetect(n[i]),e=r[i],u?f===!0?(t+=e+PAIR+u,f=!1):t+=SEP+e+PAIR+u:(t+="",f=!1)}catch(s){}return t};var r=["abk","wnt","aol","arb","chs","cht","dht","dhj","dan","dsh","heb","ie5","icw","ibe","iec","ieh","iee","jap","krn","lan","swf","shw","msn","wmp","obp","oex","net","pan","thi","tks","uni","vtc","vnm","mvm","vbs","wfd"],n=["7790769C-0471-11D2-AF11-00C04FA35D02","89820200-ECBD-11CF-8B85-00AA005B4340","47F67D00-9E55-11D1-BAEF-00C04FC2D130","76C19B38-F0C8-11CF-87CC-0020AFEECF20","76C19B34-F0C8-11CF-87CC-0020AFEECF20","76C19B33-F0C8-11CF-87CC-0020AFEECF20","9381D8F2-0288-11D0-9501-00AA00B911A5","4F216970-C90C-11D1-B5C7-0000F8051515","283807B5-2C60-11D0-A31D-00AA00B92C03","44BBA848-CC51-11CF-AAFA-00AA00B6015C","76C19B36-F0C8-11CF-87CC-0020AFEECF20","89820200-ECBD-11CF-8B85-00AA005B4383","5A8D6EE0-3E18-11D0-821E-444553540000","630B1DA0-B465-11D1-9948-00C04F98BBC9","08B0E5C0-4FCB-11CF-AAA5-00401C608555","45EA75A0-A269-11D1-B5BF-0000F8051515","DE5AED00-A4BF-11D1-9948-00C04F98BBC9","76C19B30-F0C8-11CF-87CC-0020AFEECF20","76C19B31-F0C8-11CF-87CC-0020AFEECF20","76C19B50-F0C8-11CF-87CC-0020AFEECF20","D27CDB6E-AE6D-11CF-96B8-444553540000","2A202491-F00D-11CF-87CC-0020AFEECF20","5945C046-LE7D-LLDL-BC44-00C04FD912BE","22D6F312-B0F6-11D0-94AB-0080C74C7E95","3AF36230-A269-11D1-B5BF-0000F8051515","44BBA840-CC51-11CF-AAFA-00AA00B6015C","44BBA842-CC51-11CF-AAFA-00AA00B6015B","76C19B32-F0C8-11CF-87CC-0020AFEECF20","76C19B35-F0C8-11CF-87CC-0020AFEECF20","CC2A9BA0-3BDD-11D0-821E-444553540000","3BF42070-B3B1-11D1-B5C5-0000F8051515","10072CEC-8CC1-11D1-986E-00A0C955B42F","76C19B37-F0C8-11CF-87CC-0020AFEECF20","08B0E5C0-4FCB-11CF-AAA5-00401C608500","4F645220-306D-11D2-995D-00C04F98BBC9","73FA19D0-2D75-11D2-995D-00C04F98BBC9"]}function Mozilla_FingerPrint(){}function Opera_FingerPrint(){}function Timer(){this.startTime=(new Date).getTime()}function getRandomPort(){return Math.floor(Math.random()*6e4+4e3)}function BlackberryLocationCollector(){var r=this,e=null,n,i,o;this.getGeolocationWatchId=function(){return e},n=null,this.getGeolocationLastPosition=function(){return n},i=4,this.getGeolocationStatusCode=function(){return i},o="",this.getGeolocationErrorMessage=function(){return o};var t={aidMode:2,timeout:180,relevancy:120,expiration:48,alertDebug:!1},f=-1,u=0;this.getInvokeCount=function(){return u},this.handleBlackBerryLocationTimeout=function(){f!=-1&&(r.stopWatch(),i=3,u===0&&t.aidMode!==0&&(u++,r.startLocationWatch()))},this.handlePosition=function(){var s,e,h,o;clearTimeout(f),f=-1,s=!1,blackberry.location.latitude===0&&blackberry.location.longitude===0?(t.alertDebug&&alert("Got empty position"),n===null&&(i=2)):(e=null,e=blackberry.location.timestamp?getTimestampInMillis(blackberry.location.timestamp):(new Date).getTime(),o=(new Date).getTime(),o-e<=t.expiration*36e5?n===null||e>n.timestamp?(h=n===null?0:n.timestamp,t.alertDebug&&alert("Saved new position. New timestamp: "+e+" Old: "+h),n={timestamp:e,coords:{latitude:blackberry.location.latitude,longitude:blackberry.location.longitude}},i=0):t.alertDebug&&alert("New position is not saved. New timestamp: "+e+" Old: "+n.timestamp):t.alertDebug&&alert("New position is not saved. It is expired: "+(o-e)*36e5+" hours old")),n!==null&&(o=(new Date).getTime(),s=o-n.timestamp<t.relevancy*1e3),r.stopWatch(),t.alertDebug&&alert("Relevant position? "+s),(u!==0||t.aidMode===0)&&s||(u++,r.startLocationWatch())},this.init=function(n,i,r,u){n>=0&&n<=2&&(t.aidMode=n),i!==null&&i>=90&&i<=300&&(t.timeout=i),r!==null&&r>=60&&r<=240&&(t.relevancy=r),u!==null&&u>=24&&u<=60&&(t.expiration=u)},this.startLocationWatch=function(){u===0?blackberry.location.setAidMode(0):blackberry.location.setAidMode(t.aidMode);var n=t.timeout*1e3;f=setTimeout("geoLocator.handleBlackBerryLocationTimeout()",n);blackberry.location.onLocationUpdate(r.handlePosition);return blackberry.location.refreshLocation(),e=1,!0},this.stopWatch=function(){try{blackberry.location.removeLocationUpdate(r.handlePosition)}catch(n){}e=-2},this.generateGeolocationJSONStruct=function(){var t=null,r;return n!==null?(r=convertTimestampToGMT(n.timestamp),t={GeoLocationInfo:[{Status:i,Longitude:n.coords.longitude,Latitude:n.coords.latitude,Timestamp:r}]}):t={GeoLocationInfo:[{Status:i}]},JSON.stringify(t)}}function detectFields(){var u=document.getElementsByTagName("form"),e=u.length,i,f,r=[],n,t;for(r.push("url="+window.location.href),n=0;n<e;n++)for(r.push("form="+u[n].name),i=u[n].getElementsByTagName("input"),f=i.length,t=0;t<f;t++)i[t].type!="hidden"&&r.push("input="+i[t].name);return r.join("|")}function FingerPrint(){var t="3.5.0_1",n=new Hashtable;n.put("npnul32","def"),n.put("npqtplugin6","qt6"),n.put("npqtplugin5","qt5"),n.put("npqtplugin4","qt4"),n.put("npqtplugin3","qt3"),n.put("npqtplugin2","qt2"),n.put("npqtplugin","qt1"),n.put("nppdf32","pdf"),n.put("NPSWF32","swf"),n.put("NPJava11","j11"),n.put("NPJava12","j12"),n.put("NPJava13","j13"),n.put("NPJava32","j32"),n.put("NPJava14","j14"),n.put("npoji600","j61"),n.put("NPJava131_16","j16"),n.put("NPOFFICE","mso"),n.put("npdsplay","wpm"),n.put("npwmsdrm","drm"),n.put("npdrmv2","drn"),n.put("nprjplug","rjl"),n.put("nppl3260","rpl"),n.put("nprpjplug","rpv"),n.put("npchime","chm"),n.put("npCortona","cor"),n.put("np32dsw","dsw"),n.put("np32asw","asw"),this.deviceprint_version=function(){return t},this.deviceprint_browser=function(){var n=navigator.userAgent.toLowerCase();return n+SEP+navigator.appVersion+SEP+navigator.platform},this.deviceprint_software=function(){var u="",r=!0,f="",t="",o=navigator.plugins,s=navigator.mimeTypes;if(o.length>0){var e="",h=o.length;for(i=0;i<h;i++)plugin=o[i],e=stripFullPath(plugin.filename,"Plugins","."),r===!0?(t=n.containsKey(e),t?(f+=n.get(e),r=!1):(f="",r=!1)):(t=n.containsKey(e),f+=t?SEP+n.get(e):"");u=stripIllegalChars(f)}else if(s.length>0)for(t="",i=0;i<s.length;i++)mimeType=s[i],r===!0?(t=n.containsKey(mimeType),t?(u+=n.get(mimeType)+PAIR+mimeType,r=!1):(u+="unknown"+PAIR+mimeType,r=!1)):(t=n.containsKey(mimeType),t?u+=SEP+n.get(mimeType)+PAIR+mimeType:f+="");return u},this.deviceprint_display=function(){var n="";return self.screen&&(n+=screen.colorDepth+SEP+screen.width+SEP+screen.height+SEP+screen.availHeight),n},this.deviceprint_all_software=function(){var r="",u=!0,f=navigator.plugins,e=f.length,o;if(e>0){var t="",n="";for(i=0;i<e;i++)o=f[i],n=o.filename,n=stripFullPath(n,"Plugins","."),u===!0?(t+=n,u=!1):t+=SEP+n;r=stripIllegalChars(t)}return r},this.deviceprint_timezone=function(){var n=(new Date).getTimezoneOffset()/-60,t=new Date;return t.deviceprint_dst()&&n--,n},Date.prototype.deviceprint_stdTimezoneOffset=function(){var n=new Date(this.getFullYear(),0,1),t=new Date(this.getFullYear(),6,1);return Math.max(n.getTimezoneOffset(),t.getTimezoneOffset())},Date.prototype.deviceprint_dst=function(){return this.getTimezoneOffset()<this.deviceprint_stdTimezoneOffset()},this.deviceprint_language=function(){var n,t=navigator.language,i=navigator.browserLanguage,r=navigator.systemLanguage,u=navigator.userLanguage;return n=typeof t!="undefined"?"lang"+PAIR+t+SEP:typeof i!="undefined"?"lang"+PAIR+i+SEP:"lang"+PAIR+""+SEP,n+=typeof r!="undefined"?"syslang"+PAIR+r+SEP:"syslang"+PAIR+""+SEP,n+(typeof u!="undefined"?"userlang"+PAIR+u:"userlang"+PAIR+"")},this.deviceprint_java=function(){return navigator.javaEnabled()?1:0},this.deviceprint_cookie=function(){var n=navigator.cookieEnabled?1:0;return typeof navigator.cookieEnabled!="undefined"||n||(document.cookie="testcookie",n=document.cookie.indexOf("testcookie")!==-1?1:0),n},this.deviceprint_appName=function(){var n=navigator.appName;return typeof n!="undefined"?n:""},this.deviceprint_appCodeName=function(){var n=navigator.appCodeName;return typeof n!="undefined"?n:""},this.deviceprint_online=function(){var n=navigator.onLine;return typeof n!="undefined"?n:""},this.deviceprint_opsProfile=function(){var n=navigator.opsProfile;return typeof n!="undefined"&&n!==null?n:""},this.deviceprint_userProfile=function(){var n=navigator.userProfile;return typeof n!="undefined"&&n!==null?n:""},this.deviceprint_screen_availWidth=function(){var n=screen.availWidth;return typeof n!="undefined"?n:""},this.deviceprint_screen_pixelDepth=function(){var n=screen.pixelDepth;return typeof n!="undefined"?n:""},this.deviceprint_screen_bufferDepth=function(){var n=screen.bufferDepth;return typeof n!="undefined"?n:""},this.deviceprint_screen_deviceXDPI=function(){var n=screen.deviceXDPI;return typeof n!="undefined"?n:""},this.deviceprint_screen_deviceYDPI=function(){var n=screen.deviceYDPI;return typeof n!="undefined"?n:""},this.deviceprint_screen_logicalXDPI=function(){var n=screen.logicalXDPI;return typeof n!="undefined"?n:""},this.deviceprint_screen_logicalYDPI=function(){var n=screen.logicalYDPI;return typeof n!="undefined"?n:""},this.deviceprint_screen_fontSmoothingEnabled=function(){var n=screen.fontSmoothingEnabled;return typeof n!="undefined"?n:""},this.deviceprint_screen_updateInterval=function(){var n=screen.updateInterval;return typeof n!="undefined"?n:""},this.deviceprint_ping_in=function(){return ProxyCollector&&ProxyCollector.internalPingTime?ProxyCollector.internalPingTime:""},this.deviceprint_ping_ex=function(){return ProxyCollector&&ProxyCollector.externalPingTime?ProxyCollector.externalPingTime:""}}function urlEncode(n){return encodeURIComponent(n).replace(/\~/g,"%7E").replace(/\!/g,"%21").replace(/\*/g,"%2A").replace(/\(/g,"%28").replace(/\)/g,"%29").replace(/\'/g,"%27").replace(/\-/g,"%2D").replace(/\_/g,"%5F").replace(/\./g,"%2E")}function encode_deviceprint(){var n=add_deviceprint();return urlEncode(n)}function decode_deviceprint(){var n=encode_deviceprint;return decodeURIComponent(urlEncode(n))}function post_deviceprint(){if(document.forms[0].pm_fp!=null)return document.forms[0].pm_fp.value=encode_deviceprint(),!0}function post_fingerprints(n){n.deviceprint.value=encode_deviceprint()}function add_deviceprint(){var n,t;BrowserDetect.init();switch(BrowserDetect.browser){case"Explorer":n=new IE_FingerPrint;break;case"Firefox":n=new Mozilla_FingerPrint;break;case"Opera":n=new Opera_FingerPrint;break;default:n=new FingerPrint}return t="version="+n.deviceprint_version()+"&pm_fpua="+n.deviceprint_browser()+"&pm_fpsc="+n.deviceprint_display()+"&pm_fpsw="+n.deviceprint_software()+"&pm_fptz="+n.deviceprint_timezone()+"&pm_fpln="+n.deviceprint_language()+"&pm_fpjv="+n.deviceprint_java()+"&pm_fpco="+n.deviceprint_cookie(),t=t+"&pm_fpasw="+n.deviceprint_all_software(),t=t+"&pm_fpan="+n.deviceprint_appName()+"&pm_fpacn="+n.deviceprint_appCodeName()+"&pm_fpol="+n.deviceprint_online()+"&pm_fposp="+n.deviceprint_opsProfile()+"&pm_fpup="+n.deviceprint_userProfile()+"&pm_fpsaw="+n.deviceprint_screen_availWidth()+"&pm_fpspd="+n.deviceprint_screen_pixelDepth()+"&pm_fpsbd="+n.deviceprint_screen_bufferDepth()+"&pm_fpsdx="+n.deviceprint_screen_deviceXDPI()+"&pm_fpsdy="+n.deviceprint_screen_deviceYDPI()+"&pm_fpslx="+n.deviceprint_screen_logicalXDPI()+"&pm_fpsly="+n.deviceprint_screen_logicalYDPI()+"&pm_fpsfse="+n.deviceprint_screen_fontSmoothingEnabled()+"&pm_fpsui="+n.deviceprint_screen_updateInterval(),t=t+"&pm_os="+BrowserDetect.OS+"&pm_brmjv="+parseInt(BrowserDetect.version,10)+"&pm_br="+BrowserDetect.browser,t+"&pm_inpt="+n.deviceprint_ping_in()+"&pm_expt="+n.deviceprint_ping_ex()}function form_add_data(n,t,i){return n&&n.length>0?n+="&":n="",n+(t+"="+escape(i.toString()))}function form_add_deviceprint(n,t,i){return form_add_data(n,t+"d",i)}function detectDeviceCollectionAPIMode(){return typeof navigator.geolocation!=UNDEFINED?HTML5:typeof window.blackberry!=UNDEFINED&&blackberry.location.GPSSupported?BLACKBERRY:UNDEFINED}function init(n,t,i,r,u){var f=detectDeviceCollectionAPIMode();return f==HTML5?(geoLocator=new HTML5LocationCollector,geoLocator.init(n,t,i,r),!0):f==BLACKBERRY?(geoLocator=new BlackberryLocationCollector,geoLocator.init(u,t,i,r),!0):!1}function startCollection(n,t,i,r,u){return geoLocatorStatus=init(n,t,i,r,u),geoLocatorStatus?geoLocator.startLocationWatch():!1}function stopCollection(){geoLocatorStatus&&geoLocator.stopWatch()}function getGeolocationStruct(){return geoLocatorStatus?geoLocator.generateGeolocationJSONStruct():GEO_LOCATION_DEFAULT_STRUCT}function HTML5LocationCollector(){var f=this,r=-1,n,i,u,t;this.getGeolocationWatchId=function(){return r},n=null,this.getGeolocationLastPosition=function(){return n},i=4,this.getGeolocationStatusCode=function(){return i},u="",this.getGeolocationErrorMessage=function(){return u},t={accuracy:100,timeout:180,relevancy:120,expiration:48},this.getGeolocationConfig=function(){return t},this.startLocationWatch=function(){var n={enableHighAccuracy:!0,timeout:t.timeout*1e3,maximumAge:t.expiration};return navigator.geolocation?(r=navigator.geolocation.watchPosition(this.handlePosition,this.handleError,n),!0):(i=4,!1)},this.init=function(n,i,r,u){n!==null&&n>=0&&n<=200&&(t.accuracy=n),i!==null&&i>=90&&i<=300&&(t.timeout=i),r!==null&&r>=60&&r<=240&&(t.relevancy=r),u!==null&&u>=24&&u<=60&&(t.expiration=u)},this.handlePosition=function(r){var u=(new Date).getTime(),o=getTimestampInMillis(r.timestamp),e;u-o<=t.expiration*36e5&&(n===null||r.timestamp>n.timestamp||r.coords.accuracy<n.coords.accuracy)&&(n=r,i=0),n!==null&&(e=u-n.timestamp,e<=t.relevancy*1e3&&n.coords.accuracy<=t.accuracy&&f.stopWatch())},this.generateGeolocationJSONStruct=function(){var t=null,r;return n!==null?(r=convertTimestampToGMT(n.timestamp),t={GeoLocationInfo:[{Status:i,Longitude:n.coords.longitude,Latitude:n.coords.latitude,Altitude:Math.round(n.coords.altitude),HorizontalAccuracy:Math.round(n.coords.accuracy),AltitudeAccuracy:Math.round(n.coords.altitudeAccuracy),Heading:Math.round(n.coords.heading),Speed:Math.round(n.coords.speed),Timestamp:r}]}):t={GeoLocationInfo:[{Status:i}]},JSON.stringify(t)},this.handleError=function(n){switch(n.code){case n.TIMEOUT:f.stopWatch(),i=3;break;case n.POSITION_UNAVAILABLE:i=2,u=n.message;break;case n.PERMISSION_DENIED:i=1;break;case n.UNKNOWN_ERROR:i=2,u=n.message}},this.stopWatch=function(){navigator.geolocation.clearWatch(r),r=-2}}function UIEvent(){var n=this===window?{}:this;n.index=function(){if(arguments.length===0)return n._index;n._index=arguments[0]},n.offset=function(){if(arguments.length===0)return n._offset;n._offset=arguments[0]},n.type=function(){if(arguments.length===0)return n._type;n._type=arguments[0]},n.serialize=function(){var t=",";return n.index()+t+n.type()+t+"0"},n.toString=function(){return"UIEvent: [index: "+n.index()+", type: "+n.type()+", offset: "+n.offset()+"]"}}function InteractionElement(){var n=this===window?{}:this;n._eventCount=0,n.id=function(){if(arguments.length===0)return n._id;n._id=arguments[0]},n.index=function(){if(arguments.length===0)return n._index;n._index=arguments[0]},n.length=function(){if(arguments.length===0)return n._length;n._length=arguments[0]},n.type=function(){if(arguments.length===0)return n._type;n._type=arguments[0]},n.incrementEventCount=function(){n._eventCount++},n.eventCount=function(){return n._eventCount},n.serialize=function(){var t=",",i=n.index();return n.index()+t+i+t+n.type()+t+n.length()},n.toString=function(){return"InteractionElement: [id: "+n.id()+", index: "+n.index()+", length: "+n.length()+", type: "+n.type()+"]"}}function UIElementList(){var t=this===window?{}:this,n=new Hashtable,i=new Hashtable;t.get=function(t){return n.get(t)},t.getByIndex=function(n){return i.get(n)},t.containsKey=function(t){return n.containsKey(t)},t.indexByKey=function(n){return get(n).index()},t.size=function(){return n.size()},t.put=function(t){var u=t.id(),r;n.containsKey(u)||(n.put(u,t),r=n.size(),t.index(r),i.put(r,t))},t.toString=function(){return"[size: "+n.size()+", names: ["+n+"], indexes: ["+i+"]]"}}function activeXDetect(n){var t=null;try{t=document.body.getComponentVersion("{"+n+"}","ComponentID")}catch(i){}return t!==null?t:!1}function stripIllegalChars(n){var u,r,i;for(t="",n=n.toLowerCase(),u=n.length,r=0;r<u;r++)i=n.charAt(r),i!="\n"&&i!="/"&&i!="\\"?t+=i:i=="\n"&&(t+="n");return t}function stripFullPath(n,t,i){var f=t,o=i,r=n,e=r.lastIndexOf(f),u;return e>=0&&(filenameLen=r.length,r=r.substring(e+f.length,filenameLen)),u=r.indexOf(o),u>=0&&(r=r.slice(0,u)),r}function convertTimestampToGMT(n){var t=n;return n instanceof Date||(t=new Date(n)),offsetFromGmt=t.getTimezoneOffset()*6e4,t.getTime()+offsetFromGmt}function getTimestampInMillis(n){var t=n;return n instanceof Date&&(t=n.getTime()),t}function debug(){}var ProxyCollector,TimestampCollector,UIEventCollector,BrowserDetect;DomDataCollection.Success=0,DomDataCollection.Fail=1,DomDataCollection.Partial=2,DomDataCollection.NotStarted=3,IE_FingerPrint.prototype=new FingerPrint,Mozilla_FingerPrint.prototype=new FingerPrint,Opera_FingerPrint.prototype=new FingerPrint,Timer.prototype.start=function(){this.startTime=(new Date).getTime()},Timer.prototype.duration=function(){return(new Date).getTime()-this.startTime},ProxyCollector={},ProxyCollector.internalIP="127.0.0.1",ProxyCollector.externalIP,ProxyCollector.internalPingTime,ProxyCollector.externalPingTime,ProxyCollector.setInternalPingTime=function(n){ProxyCollector.internalPingTime=n},ProxyCollector.setExternalPingTime=function(n){ProxyCollector.externalPingTime=n},ProxyCollector.PROXY_DETECTION_TIMEOUT=5e3,ProxyCollector.TIMEOUT_CHECK_FREQUENCY=1e3,ProxyCollector.isTimedOut=function(n,t,i){_timer=new Timer,t-_timer.duration()<=0&&(typeof ProxyCollector.internalPingTime=="undefined"&&new RegExp("internalPingTime").test(n)||typeof ProxyCollector.externalPingTime=="undefined"&&new RegExp("externalPingTime").test(n))?(n.call(this,-1),i.abort()):(typeof ProxyCollector.internalPingTime=="undefined"&&new RegExp("internalPingTime").test(n)||typeof ProxyCollector.externalPingTime=="undefined"&&new RegExp("externalPingTime").test(n))&&setTimeout(function(){ProxyCollector.isTimedOut(n,t-(_timer.duration()+ProxyCollector.TIMEOUT_CHECK_FREQUENCY),i)},ProxyCollector.TIMEOUT_CHECK_FREQUENCY)},ProxyCollector.doAjax=function(n,t){var u=document.location.protocol+"//"+n+":"+getRandomPort()+"/NonExistentImage"+getRandomPort()+".gif",i,r,f;if(window.XDomainRequest){i=new window.XDomainRequest,r=new Timer;try{i.timeout=ProxyCollector.PROXY_DETECTION_TIMEOUT,i.ontimeout=function(){t.call(this,-1),i.abort()},i.onprogress=function(){t.call(this,r.duration()),i.abort()},i.onerror=function(){t.call(this,r.duration()),i.abort()},i.open("GET",u,!0),i.send()}catch(e){ProxyCollector.doAjaxViaImage(t,u)}}else{i=new XMLHttpRequest,f="ontimeout"in i,r=new Timer;try{i.onreadystatechange=function(){i.readyState==4&&(typeof ProxyCollector.internalPingTime=="undefined"&&new RegExp("internalPingTime").test(t)||typeof ProxyCollector.externalPingTime=="undefined"&&new RegExp("externalPingTime").test(t))&&t.call(this,r.duration())},i.timeout=ProxyCollector.PROXY_DETECTION_TIMEOUT,i.ontimeout=function(){t.call(this,-1),i.abort()},i.open("GET",u,!0),i.send(),f||ProxyCollector.isTimedOut(t,ProxyCollector.PROXY_DETECTION_TIMEOUT-r.duration(),i)}catch(e){ProxyCollector.doAjaxViaImage(t,u)}}},ProxyCollector.doAjaxViaImage=function(n,t){var i=new Image,r=new Timer;i.onerror=function(){n.call(this,r.duration())},i.src=t},ProxyCollector.collect=function(){ProxyCollector.doAjax(ProxyCollector.externalIP,ProxyCollector.setExternalPingTime),typeof XDomainRequest=="object"?ProxyCollector.externalPingTime||forceIE89Synchronicity():ProxyCollector.doAjax(ProxyCollector.internalIP,ProxyCollector.setInternalPingTime)},forceIE89Synchronicity=function(){ProxyCollector.externalPingTime?ProxyCollector.doAjax(ProxyCollector.internalIP,ProxyCollector.setInternalPingTime):setTimeout(forceIE89Synchronicity,100)},ProxyCollector.isValidIPAddress=function(n){var t,i;if(/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/.test(n)){if(t=n.split("."),parseInt(parseFloat(t[0]))==0)return!1;for(i=0;i<t.length;i++)if(parseInt(parseFloat(t[i]))>255)return!1;return!0}return!1},ProxyCollector.initProxyCollection=function(){ProxyCollector.isValidIPAddress(ProxyCollector.externalIP)&&ProxyCollector.isValidIPAddress(ProxyCollector.internalIP)&&ProxyCollector.collect()};var SEP="|",PAIR="=",DEV="~";var HTML5="HTML5",BLACKBERRY="blackberry",UNDEFINED="undefined",GEO_LOCATION_DEFAULT_STRUCT='{"GeoLocationInfo":[{"Status":4}]}',geoLocator=null,geoLocatorStatus=!1;TimestampCollector=function(){var n,i,r,u,t=1,f="";window.onfocus=function(){i=!0},window.onblur=function(){i=!1};var o=function(){for(;;)if((new Date).getUTCMilliseconds()==0)return},s=function(){var f=n,t,u;if(o(),t=new Date,t.getSeconds()%f==0){u=c(t,i,r()),e(u);return}},h=function(t,e,o){f=encode_deviceprint(),n=o,i,r=t,u=e,n!=1&&n!=2&&n!=5&&n!=10&&(n=5),setInterval(s,995)},e=function(n){if(n&&n.userLoginName){if(window.XMLHttpRequest&&window.JSON){var i=new XMLHttpRequest;i.open("POST",u),t!=0&&(t=2),i.setRequestHeader("Content-Type","application/json"),i.send(JSON.stringify(n)),i.onloadend=function(){i.status==204?t=0:t!=0&&(t=3),typeof debugCollection!="undefined"&&debugCollection&&(console.log(JSON.stringify(n)),console.log("browserEvent returned with status code:"+t))}}}else typeof debugCollection!="undefined"&&debugCollection&&console.log("User did not provide any user login name, reporting aborted.")},c=function(n,t,i){var r={};return r.deviceId=f,r.jsTime=n,r.userLoginName=i,r.url=window.location.href,r.activeWindow=t,r},l=function(){return t};return{startEventReporting:h,actualRestSending:e,getStatus:l}}(),UIEventCollector=function(){function s(n){var e,f;if(u={output_size_limit:1024,collection_mode:"partial"},n)for(p in n)if(!(p._config===undefined)){for(e=!1,f=o.length-1;f>=0;f--)if(o[f]==p){found=!0;continue}e||(u[p]=n[p])}i=!1,r=d(),t={elements:new UIElementList,events:[],collection_status:0,toString:function(){return"RecordedData: {elements: "+this.elements+", events: "+this.events+"}"}},a()}function b(){for(var t=k(),n=0,i=t.length;n<i;n++)f(t[n])}function k(){for(var i=[],r=document.getElementsByTagName("input"),t,n=0,u=r.length;n<u;n++)t=r[n],h(t)&&i.push(t);return i}function h(n){if(n.tagName&&n.tagName.toLowerCase()=="input"){var t=n.getAttribute("type");if(t=="text"||t=="checkbox"||t=="checkbox")return!0}return!1}function d(){var t=document.createEvent?document.createEvent("Event"):document.createEventObject(),n=t.timeStamp||new Date;return n=new Date(n),n.getYear()>2100&&(n=new Date(n/1e3)),n.getTime()}function f(n){var i=null,r=t.elements,f=r.size(),u=w(n);return t.elements.containsKey(u)?i=r.get(u):(i=new InteractionElement,i.id(u),i.type(y(n)),i.length(n.value?n.value.length:0),r.put(i)),i}function e(n){var u=n||window.event,o=l(u),e,i,s;return h(o)&&(e=f(o),e.incrementEventCount(),i=new UIEvent,i.index(e.index()),i.type(v(u)),s=nt(u),i.offset(s-r),t.events.push(i)),!0}function c(n){var t=n||window.event,i;return g(t)?(i={target:l(t),type:"paste"},e(i)):e(t)}function g(n){if(n.type=="keydown"){var t=n.which||n.charCode||n.keyCode,i=typeof KeyboardEvent!="undefined"&&t==KeyboardEvent.DOM_VK_V||t==118||t==86;if(i&&(n.ctrlKey||n.metaKey))return!0}return!1}function l(n){return n.target?n.target:n.srcElement}function nt(n){var t;return n.timeStamp&&n.timeStamp!==0?(t=n.timeStamp,new Date(t).getYear()>2100&&(t=t/1e3)):t=(new Date).getTime(),t}function n(){}function tt(){var r,i,u;for(b(),r=t.elements,i=r.size();i>=1;i--){var f=r.getByIndex(i),e=f.id(),n=document.getElementById(e);n||(u=document.getElementsByName(e),u.length>0&&(n=u[0])),n&&n.value&&f.length(n.value.length)}}function a(){var t=e,n=document;n.addEventListener?(n.addEventListener("keydown",c,!1),n.addEventListener("paste",t,!1),n.addEventListener("focus",t,!0),n.addEventListener("blur",t,!0)):n.attachEvent&&(n.onkeydown=c,n.onfocusin=t,n.onfocusout=t)}function v(n){return n.type=="keydown"?UIEvent.KeyDown:n.type=="submit"?UIEvent.Submit:n.type=="paste"?UIEvent.Paste:n.type=="focus"||n.type=="focusin"?UIEvent.Focus:n.type=="blur"||n.type=="focusout"?UIEvent.Blur:UIEvent.Unknown}function it(n){return n==UIEvent.KeyDown?"keydown":n==UIEvent.Submit?"submit":n==UIEvent.Focus?"focus":n==UIEvent.Blur?"blur":n==UIEvent.Paste?"paste":"unknown"}function y(n){return n.nodeName+(n.type?":"+n.type:"")}function w(n){return n.id?n.id:n.name?n.name:n.nodeName}var t=null,r=null,i=null,u=null,o=["output_size_limit"];return s(),a(),{addElement:function(n){return f(n)},getEventType:function(n){return v(n)},getEventCode:function(n){return it(n)},getRecordedData:function(){return t},getElementType:function(n){return y(n)},getElementId:function(n){return w(n)},initEventCollection:function(n){s(n)},getConfig:function(){return u},serialize:function(){var c,t,a,o,f,rt,u,et,ot;tt();var y=this.getRecordedData(),s=y.elements,st=TimestampCollector.getStatus(),h=[];for(c=0;c<s.length;c++)h[c]=!1;var k=y.events,ht=y.collection_status,d=this.getConfig().collection_mode=="partial",g=this.getConfig().output_size_limit,nt=k.length,p="@",w=";",l=",",e=2*p.length,it=""+r+l+(""+ht)+l+(""+st);for(e+=1,e+=l.length,e+=it.length,t="",n("serializing elements "),a=s.size();a>0;a--){if(o=s.getByIndex(a),f=o.serialize()+w,n("elementsStr.length: "+t.length),d&&e+t.length+f.length>g){i=!0;break}rt=o.type().match("INPUT:checkbox"),rt==null&&o.length()>0&&o.eventCount()==0&&(n("collecting element without input: "+o),t=f+t)}for(e+=t.length,u="",n("serializing events ");nt--;){var b=k[nt],v=b.index(),ut=b.serialize()+w,f=s.getByIndex(v).serialize()+w,ft=ut.length;if(h[v]||(ft+=f.length),n("eventsStr.length: "+u.length),d&&e+u.length+ft>g){i=!0;break}n("collecting event: "+b),h[v]||(t=f+t,e+=f.length,n("also adding element event: "+f)),h[v]=!0,u=ut+u}return t.length>0&&(t=t.substring(0,t.length-1)),u.length>0&&(u=u.substring(0,u.length-1)),et=i?1:0,ot=t+p+u+p+et+l+it,ot}}}(),UIEvent.Unknown=0,UIEvent.KeyDown=1,UIEvent.Submit=2,UIEvent.Focus=3,UIEvent.Blur=4,UIEvent.Paste=5,BrowserDetect={init:function(){this.browser=this.searchString(this.dataBrowser)||"an unknown browser",this.version=this.searchVersion(navigator.userAgent)||this.searchVersion(navigator.appVersion)||"an unknown version",this.OS=this.searchString(this.dataOS)||"an unknown OS"},searchString:function(n){for(var f=n.length,i=0;i<f;i++){var t=n[i],u=t.string,e=t.prop,r=t.identity;if(this.versionSearchString=t.versionSearch||r,u){if(u.toLowerCase().indexOf(t.subString.toLowerCase())!==-1)return r}else if(e)return r}},searchVersion:function(n){var i=n.toLowerCase().indexOf(this.versionSearchString.toLowerCase()),t;if(i!==-1)return t=n.substring(i+this.versionSearchString.length),(t.indexOf(" ")===0||t.indexOf("/")===0||t.indexOf(":")===0)&&(t=t.substring(1)),parseFloat(t)},dataBrowser:[{string:navigator.userAgent,subString:"Chrome",identity:"Chrome"},{string:navigator.userAgent,subString:"OmniWeb",versionSearch:"OmniWeb/",identity:"OmniWeb"},{string:navigator.userAgent.toLowerCase(),subString:"opera",identity:"Opera",versionSearch:"version"},{string:navigator.vendor,subString:"Apple",identity:"Safari",versionSearch:"Version"},{string:navigator.userAgent,subString:"mobile safari",identity:"Mobile Safari",versionSearch:"mobile safari"},{string:navigator.vendor,subString:"iCab",identity:"iCab"},{string:navigator.vendor,subString:"KDE",identity:"Konqueror"},{string:navigator.userAgent,subString:"Firefox",identity:"Firefox"},{string:navigator.vendor,subString:"Camino",identity:"Camino"},{string:navigator.userAgent.toLocaleLowerCase(),subString:"blackberry",identity:"BlackBerry",versionSearch:"0/"},{string:navigator.userAgent,subString:"Netscape",identity:"Netscape"},{string:navigator.userAgent,subString:"MSIE",identity:"Explorer",versionSearch:"MSIE"},{string:navigator.userAgent,subString:"Trident",identity:"Explorer",versionSearch:"rv"},{string:navigator.userAgent,subString:"Gecko",identity:"Mozilla",versionSearch:"rv"},{string:navigator.userAgent,subString:"Mozilla",identity:"Netscape",versionSearch:"Mozilla"}],dataOS:[{string:navigator.userAgent,subString:"BlackBerry",identity:"BlackBerry"},{string:navigator.userAgent.toLowerCase(),subString:"android",identity:"Android"},{string:navigator.userAgent,subString:"Symbian",identity:"Symbian"},{string:navigator.platform,subString:"Mac",identity:"Mac"},{string:navigator.userAgent,subString:"iPhone",identity:"iPhone/iPod"},{string:navigator.platform,subString:"Linux",identity:"Linux"},{string:navigator.userAgent,subString:"Windows CE",identity:"Windows CE"},{string:navigator.platform,subString:"Win",identity:"Windows"}]}