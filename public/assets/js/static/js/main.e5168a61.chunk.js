(this.webpackJsonpwebcame=this.webpackJsonpwebcame||[]).push([[0],{145:function(t,e,n){},146:function(t,e,n){},470:function(t,e,n){"use strict";n.r(e);var c=n(9),i=n.n(c),a=n(18),o=n.n(a),r=(n(145),n(74)),s=n.n(r),u=n(137),l=n(52),d=n(80),h=n(75),j=n(76),b=n(81),O=n(79),f=(n.p,n(146),n(138)),k=n.n(f),g=(n(147),n(148),n(139)),p=n.n(g),m=(n(169),n(78)),x=n(2),v={ck:null},C=n(466),P=function(t){Object(b.a)(n,t);var e=Object(O.a)(n);function n(){return Object(h.a)(this,n),e.call(this)}return Object(j.a)(n,[{key:"render",value:function(){v.image;return v.ck=null,Object(x.jsx)("div",Object(d.a)(Object(d.a)({},this.props),{},{children:Object(x.jsxs)("center",{children:[Object(x.jsx)("img",{width:200,src:v.image}),Object(x.jsxs)("div",{children:[Object(x.jsx)("p",{children:"coordinat maps"}),Object(x.jsx)("p",{children:v.latitude}),Object(x.jsx)("p",{children:v.longitude})]})]})}))}}]),n}(i.a.Component),w=function(t){Object(b.a)(n,t);var e=Object(O.a)(n);function n(){var t;return Object(h.a)(this,n),(t=e.call(this)).state={clicked:!1},t.handleTakePhoto=t.handleTakePhoto.bind(Object(l.a)(t)),t}return Object(j.a)(n,[{key:"handleClick",value:function(t){null!=v.ck?(v.moment=t,this.setState({clicked:!0})):setTimeout(function(){this.handleClick()}.bind(this),1e3)}},{key:"handleTakePhoto",value:function(){var t=Object(u.a)(s.a.mark((function t(e){var n;return s.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return n=null,t.next=3,C.getCurrentPosition((function(t,c){if(t)throw t;n={image:e,latitude:c.coords.latitude,longitude:c.coords.longitude},v.latitude=c.coords.latitude,v.longitude=c.coords.longitude,v.image=e,v.data=c,v.ck=n,p.a.post(m.location.origin+"/api/absensi/post",{data:{image:e,latitude:c.coords.latitude,longitude:c.coords.longitude}}).then((function(t){return"true"}),this).catch((function(t){return"error"}),this)}));case 3:t.sent,this.handleClick(n);case 5:case"end":return t.stop()}}),t,this)})));return function(e){return t.apply(this,arguments)}}()},{key:"render",value:function(){var t=this;return C.getCurrentPosition((function(t,e){if(t)throw t;console.log(e)})),Object(x.jsxs)("div",{className:"container",children:[Object(x.jsxs)("div",{className:"text-center",children:[Object(x.jsx)("h1",{children:"Absensi"}),Object(x.jsx)("p",{children:"Pastikan perangkat kamera anda tersedia"})]}),Object(x.jsx)(k.a,{onTakePhoto:function(e){t.handleTakePhoto(e)}}),this.state.clicked?Object(x.jsx)(P,{}):null]})}}]),n}(i.a.Component),T=function(t){t&&t instanceof Function&&n.e(3).then(n.bind(null,471)).then((function(e){var n=e.getCLS,c=e.getFID,i=e.getFCP,a=e.getLCP,o=e.getTTFB;n(t),c(t),i(t),a(t),o(t)}))};o.a.render(Object(x.jsx)(i.a.StrictMode,{children:Object(x.jsx)(w,{})}),document.getElementById("root")),T()}},[[470,1,2]]]);
//# sourceMappingURL=main.e5168a61.chunk.js.map