import{_}from"./AppLayout.0748b563.js";import{y as g,D as y,o as r,c as v,w as b,a as e,e as i,t as a,f as u,m as f,v as c,E as m,i as w,F as x}from"./app.47443cd5.js";import{u as k}from"./alert.9fd763ef.js";import{_ as V}from"./_plugin-vue_export-helper.cdc0426e.js";const U={components:{AppLayout:_},data(){return{sucess:!1,erros:!1,form:{title:null,description:null,episodes:[{title:null,description:null,video_url:null}]}}},methods:{submit(){g.Inertia.post("/courses",this.form),k("Episode termi\xE9 avec succ\xE8es, bay \u2665\uFE0F\u2665\uFE0F\u2665\uFE0F")},add(){this.form.episodes.push({title:null,description:null,video_url:null})},remove(){this.form.episodes.pop()}}},D=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Dashboard ",-1),C={class:"py-12"},L={key:0,class:"bg-gren-500 text-green-500 p-3"},B={class:"w-full"},E={class:"mb-4"},S=e("label",{class:"block text-gray-700 text-sm font-bold mb-2",for:"title"}," Tittre de la formation ",-1),A={key:0,class:"bg-red-200 text-red-800 mt-2 p-4"},T={class:"mb-4"},F=e("label",{class:"block text-gray-700 text-sm font-bold mb-2",for:"description"}," Description de la formation ",-1),M={key:0,class:"bg-red-200 text-red-800 mt-2 p-4"},N={class:"mb-4"},j=e("h2",{class:"text-2xl"},"Episodes de la formation",-1),I=["for"],R=["id","onUpdate:modelValue"],q=["for"],z=["id","onUpdate:modelValue"],G=["for"],H=["id","onUpdate:modelValue"],J={class:"flex justify-between"},K=e("button",{class:"bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline",type:"submit"}," Cr\xE9er une formation ",-1);function O(d,s,P,Q,t,n){const h=y("AppLayout");return r(),v(h,{title:"Dashboard"},{header:b(()=>[D]),default:b(()=>[e("div",C,[d.$page.props.flash.success?(r(),i("div",L,a(d.$page.props.flash.success),1)):u("",!0),e("div",B,[e("form",{onSubmit:s[4]||(s[4]=f((...l)=>n.submit&&n.submit(...l),["prevent"])),class:"bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"},[e("div",E,[S,c(e("input",{class:"shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",id:"title",type:"text","onUpdate:modelValue":s[0]||(s[0]=l=>t.form.title=l)},null,512),[[m,t.form.title]]),d.$page.props.errors.title?(r(),i("div",A,a(d.$page.props.errors.title),1)):u("",!0)]),e("div",T,[F,c(e("textarea",{class:"shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",id:"description",type:"text","onUpdate:modelValue":s[1]||(s[1]=l=>t.form.description=l)},`
            `,512),[[m,t.form.description]]),d.$page.props.errors.description?(r(),i("div",M,a(d.$page.props.errors.description),1)):u("",!0)]),e("div",N,[j,(r(!0),i(x,null,w(t.form.episodes,(l,o)=>(r(),i("div",{class:"",key:o},[e("label",{class:"block text-gray-700 text-sm font-bold mb-2",for:"title-"+o}," Titre de l'\xE9pisode de n\xB0 "+a(o+1),9,I),c(e("input",{class:"shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",id:"title-"+o,type:"text","onUpdate:modelValue":p=>t.form.episodes[o].title=p},null,8,R),[[m,t.form.episodes[o].title]]),e("label",{class:"block text-gray-700 text-sm font-bold mb-2",for:"description-"+o}," Description de l'\xE9pisode de n\xB0 "+a(o+1),9,q),c(e("input",{class:"shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",id:"description-"+o,type:"text","onUpdate:modelValue":p=>t.form.episodes[o].description=p},null,8,z),[[m,t.form.episodes[o].description]]),e("label",{class:"block text-gray-700 text-sm font-bold mb-2",for:"video_url-"+o}," L'URL de la vid\xE9o de l'\xE9pisode de n\xB0 "+a(o+1),9,G),c(e("input",{class:"shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline",id:"video_url-"+o,type:"text","onUpdate:modelValue":p=>t.form.episodes[o].video_url=p},null,8,H),[[m,t.form.episodes[o].video_url]])]))),128))]),e("div",J,[t.form.episodes.length<15?(r(),i("button",{key:0,class:"bg-green-600 rounded py-2 px-4 text-white block mb-2",onClick:s[2]||(s[2]=f((...l)=>n.add&&n.add(...l),["prevent"]))}," + ")):u("",!0),t.form.episodes.length>1?(r(),i("button",{key:1,class:"bg-red-600 rounded py-2 px-3 text-white block mb-2",onClick:s[3]||(s[3]=f((...l)=>n.remove&&n.remove(...l),["prevent"]))}," \u{1F5D1}\uFE0F ")):u("",!0)]),K],32)])])]),_:1})}const $=V(U,[["render",O]]);export{$ as default};