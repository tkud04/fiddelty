var Hashtable=function(n){function e(n){return typeof n==f?n:""+n}function c(n){var t;return typeof n==f?n:typeof n.hashCode==i?(t=n.hashCode(),typeof t==f?t:c(t)):e(n)}function w(n,t){for(var i in t)t.hasOwnProperty(i)&&(n[i]=t[i])}function b(n,t){return n.equals(t)}function k(n,t){return typeof t.equals==i?t.equals(n):n===t}function l(t){return function(i){if(i===null)throw new Error("null is not a valid "+t);else if(i===n)throw new Error(t+" must not be undefined");}}function s(n,t,i,r){this[0]=n,this.entries=[],this.addEntry(t,i),r!==null&&(this.getEqualityFunction=function(){return r})}function h(n){return function(t){for(var r=this.entries.length,i,u=this.getEqualityFunction(t);r--;)if(i=this.entries[r],u(t,i[0]))switch(n){case a:return!0;case v:return i;case y:return[r,i[1]]}return!1}}function p(n){return function(t){for(var u=t.length,i=0,r=this.entries,f=r.length;i<f;++i)t[u+i]=r[i][n]}}function d(n,t){for(var i=n.length,r;i--;)if(r=n[i],t===r[0])return i;return null}function r(n,t){var i=n[t];return i&&i instanceof s?i:null}function u(){var i=[],u={},f={replaceDuplicateKey:!0,hashCode:c,equals:null},l=arguments[0],a=arguments[1],e,v,h;a!==n?(f.hashCode=l,f.equals=a):l!==n&&w(f,l),e=f.hashCode,v=f.equals,this.properties=f,this.put=function(n,h){t(n),o(h);var a=e(n),c,l,y=null;return c=r(u,a),c?(l=c.getEntryForKey(n),l?(f.replaceDuplicateKey&&(l[0]=n),y=l[1],l[1]=h):c.addEntry(n,h)):(c=new s(a,n,h,v),i.push(c),u[a]=c),y},this.get=function(n){var o,i,f;return(t(n),o=e(n),i=r(u,o),i&&(f=i.getEntryForKey(n),f))?f[1]:null},this.containsKey=function(n){t(n);var f=e(n),i=r(u,f);return i?i.containsKey(n):!1},this.containsValue=function(n){o(n);for(var t=i.length;t--;)if(i[t].containsValue(n))return!0;return!1},this.clear=function(){i.length=0,u={}},this.isEmpty=function(){return!i.length},h=function(n){return function(){for(var t=[],r=i.length;r--;)i[r][n](t);return t}},this.keys=h("keys"),this.values=h("values"),this.entries=h("getEntries"),this.remove=function(n){t(n);var f=e(n),h,o=null,s=r(u,f);return s&&(o=s.removeEntryForKey(n),o!==null&&s.entries.length==0&&(h=d(i,f),i.splice(h,1),delete u[f])),o},this.size=function(){for(var n=0,t=i.length;t--;)n+=i[t].entries.length;return n}}var i="function",f="string",t,o;if(typeof encodeURIComponent=="undefined"||Array.prototype.splice===n||Object.prototype.hasOwnProperty===n)return null;t=l("key"),o=l("value");var a=0,v=1,y=2;return s.prototype={getEqualityFunction:function(n){return typeof n.equals==i?b:k},getEntryForKey:h(v),getEntryAndIndexForKey:h(y),removeEntryForKey:function(n){var t=this.getEntryAndIndexForKey(n);return t?(this.entries.splice(t[0],1),t[1]):null},addEntry:function(n,t){this.entries.push([n,t])},keys:p(0),values:p(1),getEntries:function(n){for(var r=n.length,t=0,i=this.entries,u=i.length;t<u;++t)n[r+t]=i[t].slice(0)},containsKey:h(a),containsValue:function(n){for(var t=this.entries,i=t.length;i--;)if(n===t[i][1])return!0;return!1}},u.prototype={each:function(n){for(var i=this.entries(),r=i.length,t;r--;)t=i[r],n(t[0],t[1])},equals:function(n){var u,t,i,r=this.size();if(r==n.size()){for(u=this.keys();r--;)if(t=u[r],i=n.get(t),i===null||i!==this.get(t))return!1;return!0}return!1},putAll:function(n,t){for(var e=n.entries(),f,r,u,o,s=e.length,h=typeof t==i;s--;)f=e[s],r=f[0],u=f[1],h&&(o=this.get(r))&&(u=t(r,o,u)),this.put(r,u)},clone:function(){var n=new u(this.properties);return n.putAll(this),n}},u.prototype.toQueryString=function(){for(var i=this.entries(),n=i.length,t,r=[];n--;)t=i[n],r[n]=encodeURIComponent(e(t[0]))+"="+encodeURIComponent(e(t[1]));return r.join("&")},u}()