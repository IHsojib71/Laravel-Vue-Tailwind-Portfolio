import{_ as x}from"./AuthenticatedLayout-dc2b39fc.js";import{_ as b,a as y,b as w}from"./TextInput-1afe3af1.js";import{P as V}from"./PrimaryButton-7dfa7ccb.js";import{Z as I,i as L,T as u,r as n,o as T,c as k,a as e,w as a,F as A,b as t,d as B,e as D,v as C,f as p,n as E,t as F}from"./app-9fd10ef8.js";import{_ as P}from"./_plugin-vue_export-helper-c27b6911.js";import"./ApplicationLogo-82f209d6.js";const U={components:{AuthenticatedLayout:x,InputError:b,InputLabel:y,PrimaryButton:V,TextInput:w,Head:I,Link:L,useForm:u},props:{acheivement:Object},data(){return{form:u({title:this.acheivement?this.acheivement.title:"",date:this.acheivement?this.acheivement.date:"",description:this.acheivement?this.acheivement.description:""})}},methods:{submit(){this.acheivement?this.form.put(this.route("acheivement.update",this.acheivement)):this.form.post(this.route("acheivement.store"))}}},H=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Add Acheivement ",-1),N={class:"py-12"},S={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},j={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg sm:p-6 md:p-6 lg:p-8"},M={class:"lg:flex"},z={class:"lg:basis-1/2 p-2"},O={class:"lg:basis-1/2 p-2"},Z={class:"lg:flex"},q={class:"w-full p-2"},G={class:"flex items-center justify-end mt-4 p-2"};function J(f,o,h,K,s,m){const _=n("Head"),r=n("InputLabel"),c=n("TextInput"),l=n("InputError"),d=n("PrimaryButton"),v=n("Link"),g=n("AuthenticatedLayout");return T(),k(A,null,[e(_,{title:"Add Test Score"}),e(g,null,{header:a(()=>[H]),default:a(()=>[t("div",N,[t("div",S,[t("div",j,[t("form",{onSubmit:o[3]||(o[3]=B((...i)=>m.submit&&m.submit(...i),["prevent"])),enctype:"multipart/form-data"},[t("div",M,[t("div",z,[e(r,{for:"title",value:"Title"}),e(c,{type:"text",class:"mt-1 block w-full",modelValue:s.form.title,"onUpdate:modelValue":o[0]||(o[0]=i=>s.form.title=i),autocomplete:"title",placeholder:"Title"},null,8,["modelValue"]),e(l,{class:"mt-2",message:s.form.errors.title},null,8,["message"])]),t("div",O,[e(r,{for:"date",value:"Date"}),e(c,{class:"mt-1 block w-full",type:"date",modelValue:s.form.date,"onUpdate:modelValue":o[1]||(o[1]=i=>s.form.date=i),autocomplete:"date",placeholder:"Date"},null,8,["modelValue"]),e(l,{class:"mt-2",message:s.form.errors.date},null,8,["message"])])]),t("div",Z,[t("div",q,[e(r,{for:"description",value:"Description"}),D(t("textarea",{class:"mt-1 block w-full rounded border-slate-300",placeholder:"Description",rows:"6","onUpdate:modelValue":o[2]||(o[2]=i=>s.form.description=i)},`
                                `,512),[[C,s.form.description]]),e(l,{class:"mt-2",message:s.form.errors.description},null,8,["message"])])]),t("div",G,[e(v,{href:f.route("acheivement.index"),class:"text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:a(()=>[e(d,{class:"mr-4 bg-red-600 hover:bg-red-400"},{default:a(()=>[p(" Cancel ")]),_:1})]),_:1},8,["href"]),e(d,{class:E(["ml-4",{"opacity-25":s.form.processing}]),disabled:s.form.processing},{default:a(()=>[p(F(h.acheivement?"Update":"Create"),1)]),_:1},8,["class","disabled"])])],32)])])])]),_:1})],64)}const ee=P(U,[["render",J]]);export{ee as default};