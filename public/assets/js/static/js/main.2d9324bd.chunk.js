(this.webpackJsonpwebcame=this.webpackJsonpwebcame||[]).push([[0],{146:function(e,t,n){},147:function(e,t,n){},471:function(e,t,n){"use strict";n.r(t);var i=n(9),a=n.n(i),c=n(18),o=n.n(c),s=(n(146),n(76)),r=n.n(s),l=n(138),u=n(53),d=n(82),h=n(77),b=n(78),j=n(83),g=n(81),k=(n.p,n(147),n(139)),f=n.n(k),O=(n(148),n(149),n(140)),p=n.n(O),m=(n(170),n(80)),x=n(54),v=n.n(x),w=n(2),y={ck:null},C=n(467),P=function(e){Object(j.a)(n,e);var t=Object(g.a)(n);function n(){return Object(h.a)(this,n),t.call(this)}return Object(b.a)(n,[{key:"render",value:function(){y.image;return y.ck=null,Object(w.jsx)("div",Object(d.a)(Object(d.a)({},this.props),{},{children:Object(w.jsxs)("center",{children:[Object(w.jsx)("img",{width:200,src:y.image}),Object(w.jsxs)("div",{children:[Object(w.jsx)("p",{children:"coordinat maps"}),Object(w.jsx)("p",{children:y.latitude}),Object(w.jsx)("p",{children:y.longitude})]})]})}))}}]),n}(a.a.Component),T=function(e){Object(j.a)(n,e);var t=Object(g.a)(n);function n(){var e;return Object(h.a)(this,n),(e=t.call(this)).state={clicked:!1},e.handleTakePhoto=e.handleTakePhoto.bind(Object(u.a)(e)),e}return Object(b.a)(n,[{key:"handleClick",value:function(e){null!=y.ck?(y.moment=e,this.setState({clicked:!0})):setTimeout(function(){this.handleClick()}.bind(this),1e3)}},{key:"handleTakePhoto",value:function(){var e=Object(l.a)(r.a.mark((function e(t){var n;return r.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return n=null,e.next=3,C.getCurrentPosition((function(e,i){if(e)throw e;n={image:t,latitude:i.coords.latitude,longitude:i.coords.longitude},y.latitude=i.coords.latitude,y.longitude=i.coords.longitude,y.image=t,y.data=i,y.ck=n,p.a.post(m.location.origin+"/api/absensi/post",{data:{image:t,latitude:i.coords.latitude,longitude:i.coords.longitude}}).then((function(e){console.log("elm"),v()({title:"Are you sure?",text:"Are you sure that you want to delete this file?",icon:"warning",dangerMode:!0})&&v()({title:"Wow!",text:"Absensi telah berhasil, silahkan kembali kemenu!",type:"success"},(function(){window.location=m.location.origin+"/user/"}))}),this).catch((function(e){v()("Warning!","Anda gagal absensi, pastikan anda terkoneksi insternet dan coba kembali","warning")}),this)}));case 3:e.sent,this.handleClick(n);case 5:case"end":return e.stop()}}),e,this)})));return function(t){return e.apply(this,arguments)}}()},{key:"render",value:function(){var e=this;return C.getCurrentPosition((function(e,t){if(e)throw e;console.log(t)})),Object(w.jsxs)("div",{className:"container",children:[Object(w.jsxs)("div",{className:"text-center",children:[Object(w.jsx)("h1",{children:"Absensi"}),Object(w.jsx)("p",{children:"Pastikan perangkat kamera anda tersedia"})]}),Object(w.jsx)(f.a,{onTakePhoto:function(t){e.handleTakePhoto(t)}}),this.state.clicked?Object(w.jsx)(P,{}):null]})}}]),n}(a.a.Component),A=function(e){e&&e instanceof Function&&n.e(3).then(n.bind(null,472)).then((function(t){var n=t.getCLS,i=t.getFID,a=t.getFCP,c=t.getLCP,o=t.getTTFB;n(e),i(e),a(e),c(e),o(e)}))};o.a.render(Object(w.jsx)(a.a.StrictMode,{children:Object(w.jsx)(T,{})}),document.getElementById("root")),A()}},[[471,1,2]]]);
//# sourceMappingURL=main.2d9324bd.chunk.js.map