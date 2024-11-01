import{_ as y}from"./AuthenticatedLayout-dc2b39fc.js";import{i as g,Z as k,r,o,g as b,w as a,b as t,e as v,v as w,a as s,f as L,c as i,h as P,t as d,F as A}from"./app-9fd10ef8.js";import{P as B}from"./PrimaryButton-7dfa7ccb.js";import{P as V}from"./Paginator-afbdc137.js";import{_ as D}from"./_plugin-vue_export-helper-c27b6911.js";import"./ApplicationLogo-82f209d6.js";const N={components:{AuthenticatedLayout:y,Link:g,Head:k,PrimaryButton:B,Paginator:V},props:{projects:[Array,Object]},data(){return{search:null}},watch:{search(n){this.$inertia.get(this.route("project.index"),{search:n},{preserveScroll:!0,preserveState:!0,replace:!0})}}},T=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Projects ",-1),C={class:"max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-2xl bg-white p-4 mt-16"},S={class:"my-2 flex justify-between"},j={class:"w-full border-collapse bg-white text-center text-sm text-gray-500 table-auto"},E=t("thead",{class:"bg-gray-50"},[t("tr",null,[t("th",{scope:"col",class:"px-6 py-4 font-medium text-gray-900"},"Project Title"),t("th",{scope:"col",class:"px-6 py-4 font-medium text-gray-900"},"Duration"),t("th",{scope:"col",class:"px-6 py-4 font-medium text-gray-900"},"Github Link"),t("th",{scope:"col",class:"px-6 py-4 font-medium text-gray-900"},"Live Link"),t("th",{scope:"col",class:"px-6 py-4 font-medium text-gray-900"},"Image"),t("th",{scope:"col",class:"px-6 py-4 font-medium text-gray-900"},"Description"),t("th",{scope:"col",class:"px-6 py-4 font-medium text-gray-900"},"Action")])],-1),F={class:"divide-y divide-gray-100 border-t border-gray-100"},I={class:"px-6 py-4"},$={class:"px-6 py-4"},G={class:"px-6 py-4"},H=["href"],M={key:1},O={class:"px-6 py-4"},U=["href"],Z={key:1},q={class:"px-6 py-4"},z=["src","alt"],J={class:"px-6 py-4"},K={class:"d-flex"},Q={class:"max-w-7xl mx-auto flex justify-end"};function R(n,h,p,W,_,X){const m=r("PrimaryButton"),l=r("Link"),c=r("font-awesome-icon"),u=r("Paginator"),f=r("AuthenticatedLayout");return o(),b(f,null,{header:a(()=>[T]),default:a(()=>[t("div",C,[t("div",S,[v(t("input",{class:"rounded-2xl","onUpdate:modelValue":h[0]||(h[0]=e=>_.search=e),type:"text",name:"search",placeholder:"search"},null,512),[[w,_.search]]),s(l,{href:n.route("project.create")},{default:a(()=>[s(m,{class:"ml-4"},{default:a(()=>[L("Add new")]),_:1})]),_:1},8,["href"])]),t("table",j,[E,t("tbody",F,[(o(!0),i(A,null,P(p.projects.data,(e,x)=>(o(),i("tr",{key:x,class:"hover:bg-gray-50"},[t("td",I,d(e.title),1),t("td",$,d(e.duration),1),t("td",G,[e.github?(o(),i("a",{key:0,href:e.github,target:"_blank"},[s(c,{class:"mr-2",title:"Click To Visit",icon:"fa-solid fa-link"})],8,H)):(o(),i("span",M,"N/A"))]),t("td",O,[e.live?(o(),i("a",{key:0,href:e.live,target:"_blank"},[s(c,{class:"mr-2",title:"Click To Visit",icon:"fa-solid fa-link"})],8,U)):(o(),i("span",Z,"N/A"))]),t("td",q,[t("img",{src:"/"+e.image,alt:e.title,width:"100"},null,8,z)]),t("td",J,d(e.description),1),t("td",K,[s(l,{href:n.route("project.edit",e)},{default:a(()=>[s(c,{class:"text-green-500 mr-2",title:"Edit",icon:"fa-solid fa-pencil"})]),_:2},1032,["href"]),s(l,{method:"delete",href:n.route("project.destroy",e)},{default:a(()=>[s(c,{title:"Delete",class:"text-red-500 ml-2",icon:"fa-solid fa-trash-can"})]),_:2},1032,["href"])])]))),128))])])]),t("div",Q,[s(u,{links:p.projects.links,class:"mt-4"},null,8,["links"])])]),_:1})}const it=D(N,[["render",R]]);export{it as default};