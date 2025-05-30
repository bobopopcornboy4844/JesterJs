this._s=this._s||{};(function(_){var window=this;
try{
_.uyx=_.w("KSk4yc",[_.hA]);
}catch(e){_._DumpException(e)}
try{
var Ssh,Tsh;Ssh=RegExp("tw-data-text|tw-data-placeholder");Tsh=class{constructor(){this.oa=!1}};_.Ush=new Tsh;
_.Vsh=class{constructor(a,b){this.pre=a;this.oa=this.pre.firstElementChild;this.textarea=b||null}uc(a){_.pm(this.oa,a);this.pre.className=this.pre.className.replace(Ssh,"tw-data-text");this.pre.className.indexOf("tw-data-placeholder")>=0||this.oa.innerHTML.length!=0||(_.pm(this.oa,this.IX()),this.pre.className=this.pre.className.replace(Ssh,"tw-data-placeholder"));this.textarea&&this.textarea.value!=a&&(this.textarea.value=a)}kc(){return this.textarea?this.textarea.value:this.pre.className.indexOf("tw-data-text")>=
0?_.vCa(this.oa):""}IX(){return this.pre.getAttribute("data-placeholder")||""}mM(a){this.pre.setAttribute("data-placeholder",a);this.pre.className.indexOf("tw-data-placeholder")>=0&&_.pm(this.oa,a)}};
}catch(e){_._DumpException(e)}
try{
_.Yse=!!(_.th[32]>>23&1);_.Zse=!!(_.th[32]>>24&1);_.$se=!!(_.th[32]>>25&1);_.ate=!!(_.th[32]>>26&1);_.bte=!!(_.th[32]>>27&1);_.cte=!!(_.th[32]>>28&1);_.dte=!!(_.th[32]>>29&1);_.ete=!!(_.th[33]&1);_.fte=!!(_.th[33]&2);_.gte=!!(_.th[33]&4);_.hte=!!(_.th[33]&8);_.ite=!!(_.th[33]&16);_.jte=!!(_.th[33]&32);_.kte=!!(_.th[33]&64);_.MJ=!!(_.th[33]&128);_.lte=!!(_.th[33]&256);_.mte=!!(_.th[33]&512);_.nte=!!(_.th[33]&1024);_.ote=!!(_.th[33]&2048);_.pte=!!(_.th[33]&4096);_.qte=!!(_.th[33]&8192);
_.rte=!!(_.th[33]>>14&1);_.ste=!!(_.th[33]>>15&1);_.tte=!!(_.th[33]>>16&1);_.ute=!!(_.th[33]>>17&1);_.vte=!!(_.th[33]>>18&1);_.wte=!!(_.th[33]>>19&1);
}catch(e){_._DumpException(e)}
try{
var Vfd,Tfd,Ufd;
_.Wfd=function(){var a=_.Hh?_.Pl("center_col"):_.Pl("rcnt");if(a===null)return[];var b=new Set;for(var c of Tfd){var d=Array.prototype.slice.call(a.querySelectorAll(c[0]),0);for(var e of d)if(c.length===2&&c[1]==="PARENT")d=e.parentElement,d!==null&&b.add(d);else if(c.length===2&&c[1]==="DESCENDANTS"){if(d=e.childNodes,d!==null)for(var f of d)b.add(f)}else b.add(e)}a=Array.from(b);b=[];for(c=0;c<a.length;c++)if(a[c]instanceof HTMLElement){e=a[c];f=!0;d=e.getBoundingClientRect();if(e.offsetParent===null||
d.width===0||d.height===0)f=!1;if(f)for(d=0;d<a.length;d++)if(c!==d&&_.qf(a[d],e)){f=!1;break}if(f)for(const g of Ufd){if(g.length===2&&g[1]==="ANCESTORS")e.querySelector(g[0])!==null&&(f=!1);else if(g.length===2&&g[1]==="DESCENDANTS")for(d=e.parentElement;d;){if(d.matches(g[0])){f=!1;break}d=d.parentElement}else if(g.length===2&&g[1]==="PARENT"){if(d=e.childNodes,d!==null)for(const h of d)if(h.matches(g[0])){f=!1;break}}else if(e.matches(g[0])){f=!1;break}if(!f)break}f&&b.push(e)}return Vfd(b)};
Vfd=function(a){const b=[..._.Rl("*")];return a.sort((c,d)=>b.indexOf(c)-b.indexOf(d))};
Tfd=[["#rso > div:not(.ULSxyf):not([jsname='TlEBqd']):not(.MjjYud):not(.hlcw0c)[class]"],["#rso div.ULSxyf:not(:only-of-type):not(:last-of-type)"],["#rso div.MjjYud:not(:only-of-type):not(:last-of-type)"],["#rso div.hlcw0c:not(:only-of-type):not(:last-of-type)"],["#rso div.ULSxyf:not(:only-of-type):last-of-type:not(:nth-of-type(2))"],["#rso div.MjjYud:not(:only-of-type):last-of-type:not(:nth-of-type(2))"],["#rso div.hlcw0c:not(:only-of-type):last-of-type:not(:nth-of-type(2))"],["#bres"],["[jsname='xQjRM']"],
[".g-blk"],["[jsname='GDPwke'] div.MjjYud"],[".XqFnDf"],[".e6hL7d","DESCENDANTS"],[".kkCXT"],[".cu-container"],["#tvcap"],["#bottomads"]];Ufd=[];
}catch(e){_._DumpException(e)}
try{
_.q("KSk4yc");
var PGA=function(a){return new _.xm(a.top,a.right,a.bottom,a.left)},QGA=function(a){const b=Object.values(a.getClientRects()).filter(c=>c.width>0);if(b.length===0)return PGA(a.range.getBoundingClientRect());a=PGA(b[0]);for(const c of b.slice(1))a.bottom!==c.bottom?a=PGA(c):a.right=c.right;return a},RGA=function(a){const b=Object.values(a.getClientRects()).filter(c=>c.width>0);if(b.length===0)return PGA(a.range.getBoundingClientRect());a=PGA(b[0]);for(const c of b.slice(1)){if(a.top!==c.top)break;
a.right=c.right}return a};var SGA=class{constructor(a){this.range=a;const b=[];let c=a.startContainer;for(;c;){a:{var d;try{if(c.nodeType!==3||!_.nf(c.parentNode)){var e=!1;break a}}catch(f){e=!1;break a}e=c.parentNode;if(d=e.tagName!=="STYLE".toString())d=_.am().getComputedStyle(e),d=!(d.getPropertyValue("position")!=="fixed"&&!e.offsetParent)&&d.getPropertyValue("display")!=="none"&&d.getPropertyValue("visibility")!=="hidden"&&d.getPropertyValue("user-select")!=="none"&&d.getPropertyValue("-moz-user-select")!=="none"&&d.getPropertyValue("-ms-user-select")!==
"none"&&d.getPropertyValue("-webkit-user-select")!=="none";e=d}e&&c.nodeValue.trim()&&b.push(c);if(c===a.endContainer)break;c=_.jCa(c)}this.oa=b}toString(){return this.oa.length===0?"":this.oa.map(a=>{let b=0,c=a.nodeValue.length;a===this.range.startContainer&&(b=this.range.startOffset);a===this.range.endContainer&&(c=this.range.endOffset);return a.nodeValue.substring(b,c).trim()}).filter(Boolean).join(" ")}getClientRects(){const a=document.createRange();var b=this.oa[0];const c=b===this.range.startContainer?
this.range.startOffset:0;if(typeof b!=="object")return a.getClientRects();a.setStart(b,c);b=this.oa[this.oa.length-1];a.setEnd(b,b===this.range.endContainer?this.range.endOffset:b.nodeValue.length);return a.getClientRects()}};var UGA=function(a){const b=_.am().getSelection();return b&&b.rangeCount!==0&&TGA(a,b)?a.Ob(b.getRangeAt(0)):(a.tooltip.Td()&&a.oa(),null)},VGA=function(a,b,c){if(a.tooltip!==null&&a.tooltip.qb()!==null){var d=a.tooltip.qb().offsetWidth,e=a.tooltip.qb().offsetHeight,f=_.am(),g=QGA(b),h=RGA(b);b=!1;a.Ca&&a.Ca.y+20<g.bottom&&(b=!0);g.bottom+8+a.tooltip.qb().offsetHeight>f.innerHeight&&(b=!0);h.top+8+a.tooltip.qb().offsetHeight<f.innerHeight&&(b=!1);b?e=f.pageYOffset+h.top-8-e:(e=f.pageYOffset+g.bottom+
8,h=g);a.tooltip.setStyle("top",Math.round(e)+"px");g=_.am();e=g.innerWidth-16;{f=h.left;var k=h.right,l=a.Ca;h=f+8;const t=k-8;!l||h>=t?f=(f+k)/2:(f=l.x,f=f<h?h:f>t?t:f)}h=f;f=h-d/2;f<16?f=Math.min(16,h-12):f+d>e&&(f=Math.max(e-d,h+12-d));d=h-f;f+=g.pageXOffset;var {sqe:n,LEd:r}={sqe:f,LEd:d};c||a.tooltip.setStyle("left",Math.round(n)+"px");d=b;c=c?null:Math.round(r-6);a.Ja.isEmpty()||a.Ga.isEmpty()||(g=d?a.Ga:a.Ja,d=d?a.Ja:a.Ga,c&&g.setStyle("left",c+"px"),g.show(),d.hide());a.tooltip.setStyle("transform-origin",
r+"px "+(b?"bottom":"top"));a.Aa=null}},WGA=function(a){const b=a.Xa("YljVCc");(b.Td()?_.Uo(b,'[role="button"], button, a'):_.Uo(a.Xa("ZmkZfc"),'[role="button"], button, a')).focus()},XGA=function(a,b){if(a.split(" ").length===1){var c=_.am().getSelection();if(c&&c.anchorNode&&c.focusNode&&c.anchorNode===c.focusNode){var d=c.anchorNode;a=null;d.textContent&&(b.set("ctif",d.textContent),(d=d.parentElement)&&d.textContent&&(b.set("ctif",d.textContent),a=d,(d.tagName==="B"||d.tagName==="EM")&&(d=d.parentElement)&&
d.textContent&&(b.set("ctif",d.textContent),a=d)));a!==null&&c.rangeCount>0?(c=c.getRangeAt(0),d=c.cloneRange(),d.selectNodeContents(a),d.setEnd(c.startContainer,c.startOffset),a=d.toString().length,d.setEnd(c.endContainer,c.endOffset),c=d.toString().length,b.set("slst",a),b.set("sled",c)):isNaN(c.anchorOffset)||isNaN(c.focusOffset)||(a=Math.max(c.anchorOffset,c.focusOffset),b.set("slst",Math.min(c.anchorOffset,c.focusOffset)),b.set("sled",a))}}},$GA=function(a,b){if(a.Da){a.Da=!1;var c=UGA(a),d=
c?c.toString().slice(0,a.Fb).trim():null;a.Fa("Uo0pef").toggle(b);d&&(a.Qa===-1||d.split(" ").length<=a.Qa)?YGA(a,()=>ZGA(a,c,d)):a.tooltip.Td()&&a.oa()}},aHA=function(a,b,c){if(!b||c.has(b))return!1;c.add(b);if(!a.Ya&&b.tagName==="A".toString()||_.dDa(b)==="button"||b===a.Jb||b.id==="tw-container")return!0;const d=_.Cm(b,"zIndex");return d&&d.toString()!=="auto"&&d.toString()!=="0"||_.fte&&b.getAttribute("jsname")==="dvXlsc"?!0:aHA(a,_.jf(b),c)},TGA=function(a,b){const c=new Set;b=b.getRangeAt(0);
let d=b.startContainer;for(;d;){try{if(d.nodeType!==3&&d.nodeType!==1)return!1}catch(e){return!1}if(d.parentElement&&aHA(a,d.parentElement,c))return!1;if(d===b.endContainer)break;d=_.jCa(d)}return!0},YGA=function(a,b){a.Aa&&((0,_.Ao)(a.Aa),a.Aa=null);a.Aa=(0,_.zo)(b,a.yb)},ZGA=function(a,b,c){if(a.Ba!==null&&a.Ba.el()!==null){var d=new Map;d.set("rt","tc");d.set("sltx",c);XGA(c,d);_.fv(a.Ba.el(),{context:d}).then(e=>{a.showTooltip(e,b);(0,_.zo)(()=>_.$g(),200)})}},bHA=class extends _.og{static Ra(){return{qd:{snackbar:{jsname:"m3HYFd",
ctor:_.jA}}}}constructor(a){super(a.Oa);this.Ll=[];this.Ma=this.Pa=this.Da=!1;this.Ca=null;this.La=!1;this.Aa=null;this.Ea=!1;this.yj=a.qd.snackbar;this.tooltip=this.Xa("suEOdc");this.tooltip.isEmpty()&&_.Xeb(this,"suEOdc").then(b=>this.tooltip=b);this.Ja=this.Xa("ojBOCb");this.Ga=this.Xa("GV5nwf");this.Ba=this.Xa("V4zgDf");this.Ba.isEmpty()&&_.Xeb(this,"V4zgDf").then(b=>this.Ba=b);this.Fb=this.getData("mcl").number(0);this.Qa=this.getData("mwl").number(-1);this.yb=this.getData("dl").number(0);this.Jb=
_.Pl("result-stats");this.Ob=b=>new SGA(b);this.Db=this.getData("cf").Hb();this.Ya=this.getData("ath").Hb();a=_.am();this.Ll.push(_.Ue(a,"mousedown",b=>{this.onMouseDown(b)},!1,this));this.Ll.push(_.Ue(a,"keydown",b=>{this.onKeyDown(b)},!1,this));this.Ll.push(_.Ue(a,"mouseup",b=>{this.onMouseUp(b)},!1,this));this.Ll.push(_.Ue(a,"keyup",()=>{this.onKeyUp()},!1,this));this.Ll.push(_.Ue(document,"selectionchange",()=>{this.OEa()},!1,this))}Vb(){this.Ll.forEach(a=>a&&_.ln(a));this.Ll.length=0}Sa(){this.Xa("neDtlb").isEmpty()||
(this.Xa("ZmkZfc").hide(),this.oa())}Mb(a){const b=this.Xa("ZmkZfc");if(!b.isEmpty()&&!b.Td()&&this.tooltip!==null){b.show();this.tooltip.addClass("lSNMte");this.Xa("YljVCc").hide();var c=UGA(this);c&&VGA(this,c,!0);WGA(this);this.Ea=!1;a=a.targetElement.el();_.tv([new _.uo(b.el(),"show")],{triggerElement:a})}}Wa(a){if(a.data.Aa()==="context_actions_dictionary"||a.data.Aa()==="context_actions_translate")this.Ma=!0}Va(){this.Ma=!1}onMouseDown(a){this.Pa=a=_.qf(this.tooltip.el(),a.target);!a&&this.tooltip.Td()&&
this.oa()}onKeyDown(a){a.keyCode===27&&(this.La=!0,this.oa());var b;if(b=a.shiftKey)b=a.keyCode,b=b===38||b===40||b===37||b===39;b&&(this.La=!1,this.oa());a.ctrlKey&&a.shiftKey&&a.key==="X"&&this.tooltip.Td()&&WGA(this)}onMouseUp(a){const b=_.qf(this.tooltip.el(),a.target);this.Pa=b;b||(this.Ca=a.clientX&&a.clientY?new _.Ll(a.clientX,a.clientY):null,$GA(this,!1))}onKeyUp(){const a=!this.tooltip.Td()&&!this.Aa;!this.La&&a&&(this.Ca=null,$GA(this,!0))}OEa(){this.Da=!0;(_.am().getSelection()||"").toString()===
""&&!this.Pa&&this.tooltip.Td()&&(this.oa(),this.Da=!1)}showTooltip(a,b){a&&!this.Xa("YljVCc").isEmpty()&&this.tooltip!==null&&this.tooltip.el()!==null&&(this.Db||this.tooltip===null||(this.tooltip.show(),VGA(this,b,!1),this.tooltip.setStyle("opacity",.999),this.tooltip.setStyle("transform","scale(1)")),this.Ea||(_.tv([new _.uo(this.tooltip.el(),"show")],{}),this.Ea=!0))}oa(){this.tooltip!==null&&this.Ba!==null&&this.Ba.el()!==null&&this.Ma!==!0&&(this.Aa&&((0,_.Ao)(this.Aa),this.Aa=null),this.tooltip.setStyle("top",
0),this.tooltip.setStyle("left",0),this.tooltip.hide(),this.tooltip.setStyle("opacity",.001),this.tooltip.setStyle("transform","scale(0.1)"),this.tooltip.removeClass("lSNMte"),_.hv(this.Ba.el()),this.Ea=!1)}kb(a){document.execCommand("copy")&&this.yj&&this.yj.show();_.uv(a.targetElement.el());this.oa()}};_.J(bHA.prototype,"dK6tkc",function(){return this.kb});_.J(bHA.prototype,"VvZoSb",function(){return this.Va});_.J(bHA.prototype,"MlP2je",function(){return this.Wa});_.J(bHA.prototype,"v9xSwd",function(){return this.Mb});
_.J(bHA.prototype,"Geh74d",function(){return this.Sa});_.J(bHA.prototype,"k4Iseb",function(){return this.Vb});_.P(_.uyx,bHA);

_.u();
}catch(e){_._DumpException(e)}
try{
_.OAf=_.w("b1c25c",[]);
}catch(e){_._DumpException(e)}
try{
_.mEf=_.w("xSkvYe",[_.LKb,_.Yq,_.fr,_.aVa,_.TUa,_.OAf,_.mr,_.hr]);
}catch(e){_._DumpException(e)}
try{
_.q("Tia57b");
_.No(_.YUa,class extends _.Lo{Aa(a,b=!1){b&&_.Yc(location,a);return!1}mma(){}Gka(){this.oa||(this.oa=new Promise(a=>{_.to(_.Ie(_.pg(this,{service:{Daa:_.mEf}}),b=>a(b.service.Daa)),()=>a(this))}));return this.oa}Cia(a,b={}){b.replace?(_.Zc(location,a),location.reload()):_.Yc(location,a);return Promise.resolve(null)}prefetch(){return Promise.resolve(null)}Egb(){}});
_.u();
}catch(e){_._DumpException(e)}
try{
_.q("KpRAue");
_.EEf=new _.De(_.ZUa);
_.u();
}catch(e){_._DumpException(e)}
try{
_.eBf=!!(_.th[48]>>26&1);_.fBf=!!(_.th[48]>>27&1);_.gBf=!!(_.th[48]>>28&1);_.hBf=!!(_.th[48]>>29&1);_.iBf=!!(_.th[49]&2);_.jBf=!!(_.th[49]&4);_.kBf=!!(_.th[49]&8);_.lBf=!!(_.th[49]&16);_.mBf=!!(_.th[49]&64);_.nBf=!!(_.th[49]&512);_.oBf=!!(_.th[49]&1024);_.pBf=!!(_.th[49]&2048);_.qBf=!!(_.th[49]&4096);_.rBf=!!(_.th[49]&8192);_.sBf=!!(_.th[49]>>14&1);_.tBf=!!(_.th[49]&1);_.uBf=!!(_.th[49]&32);_.vBf=!!(_.th[49]&256);
}catch(e){_._DumpException(e)}
try{
_.cyc=!!(_.th[0]>>25&1);_.dyc=!!(_.th[0]>>26&1);_.eyc=!!(_.th[1]&2);_.fyc=!!(_.th[1]&4);_.RB=!!(_.th[1]&8);_.gyc=!!(_.th[1]&16);_.SB=!!(_.th[1]&32);_.hyc=!!(_.th[1]&64);_.iyc=!!(_.th[1]&1024);_.jyc=!!(_.th[1]&2048);_.kyc=!!(_.th[1]&4096);_.lyc=!!(_.th[1]&8192);_.myc=!!(_.th[1]>>14&1);_.nyc=!!(_.th[1]>>15&1);_.oyc=!!(_.th[1]>>26&1);_.pyc=!!(_.th[1]>>27&1);_.qyc=!!(_.th[1]>>28&1);_.ryc=!!(_.th[1]>>29&1);_.syc=!!(_.th[2]&1);_.tyc=!!(_.th[2]&512);_.uyc=!!(_.th[2]&1024);_.vyc=!!(_.th[2]&2048);
_.TB=!!(_.th[2]&4096);_.wyc=!!(_.th[2]&8192);_.UB=!!(_.th[2]>>14&1);_.xyc=!!(_.th[2]>>15&1);_.yyc=!!(_.th[2]>>16&1);_.zyc=!!(_.th[2]>>17&1);_.Ayc=!!(_.th[2]>>18&1);_.Byc=!!(_.th[2]>>19&1);_.Cyc=!!(_.th[2]>>20&1);_.Dyc=!!(_.th[2]>>21&1);_.VB=!!(_.th[2]>>22&1);_.Eyc=!!(_.th[2]>>23&1);_.Fyc=!!(_.th[2]>>24&1);_.Gyc=!!(_.th[2]>>25&1);_.Hyc=!!(_.th[2]>>27&1);_.WB=!!(_.th[2]>>28&1);_.Iyc=!!(_.th[2]>>29&1);_.Jyc=!!(_.th[3]&2);_.Kyc=!!(_.th[3]&4);_.Lyc=!!(_.th[3]&8);_.Myc=!!(_.th[3]&16);_.Nyc=!!(_.th[3]&64);
_.XB=!!(_.th[3]&128);_.Oyc=!!(_.th[3]&256);_.Pyc=!!(_.th[3]&1024);_.Qyc=!!(_.th[3]&2048);_.Ryc=!!(_.th[3]&4096);_.Syc=!!(_.th[3]&8192);_.Tyc=!!(_.th[3]>>14&1);_.Uyc=!!(_.th[3]>>15&1);_.Vyc=!!(_.th[3]>>16&1);_.Wyc=!!(_.th[3]>>17&1);_.Xyc=!!(_.th[3]>>18&1);_.Yyc=!!(_.th[3]>>19&1);_.Zyc=!!(_.th[3]>>20&1);_.$yc=!!(_.th[3]>>22&1);_.azc=!!(_.th[3]>>23&1);_.bzc=!!(_.th[3]>>24&1);_.czc=!!(_.th[3]>>25&1);_.dzc=!!(_.th[3]>>29&1);_.ezc=!!(_.th[4]&2);_.fzc=!!(_.th[4]&8);_.gzc=!!(_.th[4]&16);
_.hzc=!!(_.th[4]&32);_.izc=!!(_.th[4]&64);_.jzc=!!(_.th[4]&128);_.kzc=!!(_.th[4]&256);_.lzc=!!(_.th[4]&2048);_.mzc=!!(_.th[4]&4096);_.nzc=!!(_.th[4]&8192);_.ozc=!!(_.th[4]>>17&1);_.pzc=!!(_.th[4]>>18&1);_.qzc=!!(_.th[4]>>19&1);_.rzc=!!(_.th[4]>>21&1);_.szc=!!(_.th[4]>>22&1);_.tzc=!!(_.th[4]>>23&1);_.uzc=!!(_.th[4]>>24&1);_.vzc=!!(_.th[4]>>26&1);_.wzc=!!(_.th[4]>>27&1);_.xzc=!!(_.th[4]>>28&1);_.YB=!!(_.th[4]>>29&1);_.yzc=!!(_.th[5]&256);_.zzc=!!(_.th[5]&512);_.Azc=!!(_.th[5]>>27&1);
_.Bzc=!!(_.th[6]&512);_.Czc=!!(_.th[7]&64);_.Dzc=!!(_.th[7]&512);_.Ezc=!!(_.th[7]&1024);_.Fzc=!!(_.th[7]&2048);_.Gzc=!!(_.th[7]&8192);_.ZB=!!(_.th[7]>>14&1);_.$B=!!(_.th[7]>>15&1);_.Hzc=!!(_.th[7]>>16&1);_.Izc=!!(_.th[7]>>17&1);_.Jzc=!!(_.th[7]>>18&1);_.Kzc=!!(_.th[7]>>19&1);_.Lzc=!!(_.th[7]>>20&1);_.Mzc=!!(_.th[7]>>23&1);_.Nzc=!!(_.th[7]>>24&1);_.Ozc=!!(_.th[7]>>26&1);_.aC=!!(_.th[7]>>27&1);_.Pzc=!!(_.th[8]&32);_.Qzc=!!(_.th[8]&64);_.Rzc=!!(_.th[8]&128);_.Szc=!!(_.th[8]&256);_.Tzc=!!(_.th[8]&512);
_.Uzc=!!(_.th[8]&1024);_.Vzc=!!(_.th[8]&2048);_.Wzc=!!(_.th[8]&4096);_.Xzc=!!(_.th[8]&8192);_.Yzc=!!(_.th[8]>>14&1);_.Zzc=!!(_.th[8]>>15&1);_.$zc=!!(_.th[8]>>16&1);_.aAc=!!(_.th[8]>>19&1);_.bC=!!(_.th[8]>>29&1);_.bAc=!!(_.th[9]&1);_.cAc=!!(_.th[9]&2);_.dAc=!!(_.th[9]&4);_.eAc=!!(_.th[9]&8);_.fAc=!!(_.th[9]&16);_.gAc=!!(_.th[9]&32);_.hAc=!!(_.th[9]&64);_.cC=!!(_.th[9]&256);_.iAc=!!(_.th[9]&512);_.jAc=!!(_.th[9]&1024);_.kAc=!!(_.th[9]&2048);_.lAc=!!(_.th[9]&4096);_.mAc=!!(_.th[9]&8192);
_.nAc=!!(_.th[9]>>17&1);_.oAc=!!(_.th[9]>>18&1);_.pAc=!!(_.th[9]>>19&1);_.qAc=!!(_.th[9]>>20&1);_.rAc=!!(_.th[9]>>21&1);_.sAc=!!(_.th[9]>>22&1);_.tAc=!!(_.th[9]>>23&1);_.uAc=!!(_.th[9]>>24&1);_.vAc=!!(_.th[9]>>25&1);_.wAc=!!(_.th[9]>>26&1);_.xAc=!!(_.th[9]>>27&1);_.yAc=!!(_.th[9]>>28&1);_.zAc=!!(_.th[9]>>29&1);_.AAc=!!(_.th[10]&1);_.BAc=!!(_.th[10]&2);_.CAc=!!(_.th[10]&4);_.DAc=!!(_.th[10]&8);_.EAc=!!(_.th[10]&16);_.FAc=!!(_.th[10]&32);_.GAc=!!(_.th[10]&64);_.HAc=!!(_.th[10]&128);
_.IAc=!!(_.th[10]&256);_.JAc=!!(_.th[10]&8192);_.KAc=!!(_.th[10]>>14&1);_.LAc=!!(_.th[10]>>20&1);_.MAc=!!(_.th[10]>>21&1);_.NAc=!!(_.th[10]>>22&1);_.OAc=!!(_.th[10]>>23&1);_.PAc=!!(_.th[10]>>24&1);_.QAc=!!(_.th[10]>>25&1);_.RAc=!!(_.th[10]>>27&1);_.SAc=!!(_.th[10]>>28&1);_.TAc=!!(_.th[10]>>29&1);_.UAc=!!(_.th[11]&1);_.VAc=!!(_.th[11]&2);_.WAc=!!(_.th[11]&4);_.XAc=!!(_.th[11]&8);_.YAc=!!(_.th[11]&16);_.ZAc=!!(_.th[11]&32);_.$Ac=!!(_.th[11]&64);_.aBc=!!(_.th[11]&512);_.bBc=!!(_.th[11]&1024);
_.cBc=!!(_.th[11]&2048);
}catch(e){_._DumpException(e)}
try{
_.wBf=!!(_.th[21]>>16&1);_.xBf={jxe:"appbar",zJe:"ee",BZe:"mode",ZMe:"fb",qOc:"rhs",SVe:"lhs",b9e:"sge",xye:"atvcap",h8e:"stb",O8e:"dark",cif:"uib",E2e:"osrp_st_tabs",tHe:"dthm",HXe:"mgq",GFe:"ctor",Iff:"taw"};_.yBf=Object.values(_.xBf);_.zBf=!_.vBf;
}catch(e){_._DumpException(e)}
try{
_.$Bf=Object.values(_.xBf);
}catch(e){_._DumpException(e)}
try{
_.nEf=function(a,b){if(!a.match(/.*com\/search|^\/search/))return _.Vd(new _.Re("url invalid not /search")),{VIa:!1,Toc:!0};let c;const d=(c=_.kh(a,"tbm"))!=null?c:"web";return d!=="web"?(_.Vd(new _.Re(`url invalid mode: ${d}`)),{VIa:!1,Toc:!0}):_.kh(b,"vsrid")&&!_.kh(a,"vsrid")?{VIa:!1,Toc:!0}:_.kh(a,"q")||_.lBf&&_.kh(a,"vsrid")?{VIa:!0}:(_.Vd(new _.Re(`url invalid missing query: ${a}`)),{VIa:!1,reload:!0})};
}catch(e){_._DumpException(e)}
try{
_.q("NyeqM");
var WVg,YVg,VVg,$Vg,aWg;
WVg=function(a){a.Ba||(a.Ba=!0,document.addEventListener("click",b=>{try{const d=b.target.closest("a");if(d&&!b.defaultPrevented){var c=VVg(a,d);if(c){let e;const f=(e=c.onClick)==null?void 0:e.call(c,b,d),g=Object.assign({},c,f),{VIa:h}=_.nEf(d.href,a.Oc.location.href);if(h){if(!g.triggerElement){for(c=d;c&&!c.getAttribute("jslog")&&!c.getAttribute("data-ved");)c=c.parentElement;c||_.Vd(Error("Tp"));g.triggerElement=c}a.transition(d.href,g);b.preventDefault()}}}}catch(d){_.Vd(Error("Rp`"+d))}}))};
_.XVg=function(a){return _.A(function*(){return a.Ar.Gka().then(b=>{a.Ar=b})})};YVg=function(a){return Array.isArray(a)?a:[a]};_.ZVg=function(a,b={}){WVg(a);b.drf&&_.XVg(a);b.feature&&a.Ar.mma(b);if(b.bR)for(const c of YVg(b.bR))a.Aa.set(c,b)};VVg=function(a,b){try{const c=$Vg(a,b),d=c?a.Aa.get(c):void 0;return((d==null?0:d.omit)?aWg(d.omit):[]).find(e=>typeof e==="function"?e(b):a.isMatch(b,e)||typeof e==="string"&&b.closest(e))?void 0:d}catch(c){_.Vd(Error("Sp`"+c))}};
$Vg=function(a,b){return Array.from(a.Aa.keys()).find(c=>a.isMatch(b,c))};aWg=function(a){return Array.isArray(a)?a:[a]};_.bWg=class extends _.Lo{static Ra(){return{service:{Oc:_.zv,Ar:_.EEf}}}constructor(a){super();this.Ba=!1;this.Aa=new Map;this.Oc=a.service.Oc;this.Ar=a.service.Ar}oa(){}transition(a,b){return this.Ar.Cia(a,b)}Egb(){this.Ar.Egb()}isMatch(a,b){return b instanceof Element?a.isEqualNode(b):a.matches(b)||a.closest(b)}};_.No(_.k1a,_.bWg);

_.u();
}catch(e){_._DumpException(e)}
try{
_.MBh=_.w("O9SqHb",[_.hr,_.k1a]);
}catch(e){_._DumpException(e)}
try{
_.vBh=_.H("gfszqc");_.wBh=_.H("x8GQkd");_.xBh=_.H("ccMokc");_.yBh=_.H("D7JhZd");_.zBh=_.H("M5Bnof");_.ABh=_.H("JCifrc");
}catch(e){_._DumpException(e)}
try{
_.Yyh=!!(_.th[57]&8192);_.Zyh=!!(_.th[57]>>14&1);_.$yh=!!(_.th[57]>>15&1);_.azh=!!(_.th[57]>>16&1);_.bzh=!!(_.th[57]>>17&1);
}catch(e){_._DumpException(e)}
try{
_.q("O9SqHb");
var NBh=class extends _.og{static Ra(){return{service:{yc:_.cB,eO:_.bWg}}}constructor(a){super(a.Oa);this.yc=a.service.yc;_.$yh&&(this.eO=a.service.eO)}navigate(a){const b=this;return _.A(function*(){var c=!!a&&a.data||{};const d=c.url;c=c.Skc;if(b.eO&&!c)try{b.trigger(_.ABh);yield b.eO.transition(d.toString());return}catch(e){_.Vd(Error("Qq`"+e))}b.yc.Mf(d,!1)})}};_.J(NBh.prototype,"RySO6d",function(){return this.navigate});_.P(_.MBh,NBh);
_.u();
}catch(e){_._DumpException(e)}
})(this._s);
// Google Inc.
