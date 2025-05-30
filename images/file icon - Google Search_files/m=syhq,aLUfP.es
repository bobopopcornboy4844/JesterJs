this._s=this._s||{};(function(_){var window=this;
try{
_.Ywb=class{constructor(a){this.Qk=a}};
}catch(e){_._DumpException(e)}
try{
_.q("aLUfP");
var $wb;_.Zwb=!1;$wb=function(){return _.na()&&_.td.sG()&&!navigator.userAgent.includes("GSA")};
_.No(_.iUa,class extends _.Lo{static Ra(){return{service:{window:_.Mo}}}constructor(a){super();this.window=a.service.window.get();this.Ba=this.Qk();this.Aa=window.orientation;this.oa=()=>{const b=this.Qk();var c=this.CMb()&&Math.abs(window.orientation)===90&&this.Aa===-1*window.orientation;this.Aa=window.orientation;if(b!==this.Ba||c){this.Ba=b;for(const d of this.listeners){c=new _.Ywb(b);try{d(c)}catch(e){_.ea(e)}}}};this.listeners=new Set;this.window.addEventListener("resize",this.oa);this.CMb()&&
this.window.addEventListener("orientationchange",this.oa)}addListener(a){this.listeners.add(a)}removeListener(a){this.listeners.delete(a)}Qk(){if($wb()){var a=_.Xl(this.window);a=new _.Ol(a.width,Math.round(a.width*this.window.innerHeight/this.window.innerWidth))}else a=this.Bc()||(_.na()?$wb():this.window.visualViewport)?_.Xl(this.window):new _.Ol(this.window.innerWidth,this.window.innerHeight);return a.height<a.width}destroy(){this.window.removeEventListener("resize",this.oa);this.window.removeEventListener("orientationchange",
this.oa)}Bc(){return _.Zwb}CMb(){return"orientation"in window}});
_.Zwb=!0;
_.u();
}catch(e){_._DumpException(e)}
})(this._s);
// Google Inc.
