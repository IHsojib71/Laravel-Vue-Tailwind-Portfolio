import{_ as b}from"./AuthenticatedLayout-8448465b.js";import{_ as v,a as k,b as y}from"./TextInput-4156c0dc.js";import{P as w}from"./PrimaryButton-64bb3dd6.js";import{Z as V,i as I,T as u,r as l,o as L,c as T,a as e,w as r,F as B,b as s,d as C,e as A,v as U,f,n as D,t as E}from"./app-face8b92.js";import{_ as F}from"./_plugin-vue_export-helper-c27b6911.js";import"./ApplicationLogo-a6ac9e4f.js";const P={components:{AuthenticatedLayout:b,InputError:v,InputLabel:k,PrimaryButton:w,TextInput:y,Head:V,Link:I,useForm:u},props:{certification:Object},data(){return{form:u({title:this.certification?this.certification.title:"",issue_date:this.certification?this.certification.issue_date:"",link:this.certification?this.certification.link:"",description:this.certification?this.certification.description:""})}},methods:{submit(){this.certification?this.form.put(this.route("certification.update",this.certification)):this.form.post(this.route("certification.store"))}}},H=s("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Add Certification ",-1),N={class:"py-12"},S={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},j={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg sm:p-6 md:p-6 lg:p-8"},M={class:"lg:flex"},z={class:"lg:basis-1/2 p-2"},O={class:"lg:basis-1/2 p-2"},Z={class:"lg:flex"},q={class:"w-full p-2"},G={class:"lg:flex"},J={class:"w-full p-2"},K={class:"flex items-center justify-end mt-4 p-2"};function Q(p,o,_,R,t,m){const h=l("Head"),n=l("InputLabel"),c=l("TextInput"),a=l("InputError"),d=l("PrimaryButton"),g=l("Link"),x=l("AuthenticatedLayout");return L(),T(B,null,[e(h,{title:"Add Test Score"}),e(x,null,{header:r(()=>[H]),default:r(()=>[s("div",N,[s("div",S,[s("div",j,[s("form",{onSubmit:o[4]||(o[4]=C((...i)=>m.submit&&m.submit(...i),["prevent"])),enctype:"multipart/form-data"},[s("div",M,[s("div",z,[e(n,{for:"title",value:"Title"}),e(c,{type:"text",class:"mt-1 block w-full",modelValue:t.form.title,"onUpdate:modelValue":o[0]||(o[0]=i=>t.form.title=i),autocomplete:"title",placeholder:"Title"},null,8,["modelValue"]),e(a,{class:"mt-2",message:t.form.errors.title},null,8,["message"])]),s("div",O,[e(n,{for:"issue_date",value:"Issue date"}),e(c,{class:"mt-1 block w-full",type:"date",modelValue:t.form.issue_date,"onUpdate:modelValue":o[1]||(o[1]=i=>t.form.issue_date=i),autocomplete:"issue_date",placeholder:"Issue date"},null,8,["modelValue"]),e(a,{class:"mt-2",message:t.form.errors.issue_date},null,8,["message"])])]),s("div",Z,[s("div",q,[e(n,{for:"link",value:"Link"}),e(c,{type:"text",class:"mt-1 block w-full",modelValue:t.form.link,"onUpdate:modelValue":o[2]||(o[2]=i=>t.form.link=i),autocomplete:"link",placeholder:"link"},null,8,["modelValue"]),e(a,{class:"mt-2",message:t.form.errors.link},null,8,["message"])])]),s("div",G,[s("div",J,[e(n,{for:"description",value:"Description"}),A(s("textarea",{class:"mt-1 block w-full rounded border-slate-300",placeholder:"Description",rows:"6","onUpdate:modelValue":o[3]||(o[3]=i=>t.form.description=i)},`
                                `,512),[[U,t.form.description]]),e(a,{class:"mt-2",message:t.form.errors.description},null,8,["message"])])]),s("div",K,[e(g,{href:p.route("certification.index"),class:"text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:r(()=>[e(d,{class:"mr-4 bg-red-600 hover:bg-red-400"},{default:r(()=>[f(" Cancel ")]),_:1})]),_:1},8,["href"]),e(d,{class:D(["ml-4",{"opacity-25":t.form.processing}]),disabled:t.form.processing},{default:r(()=>[f(E(_.certification?"Update":"Create"),1)]),_:1},8,["class","disabled"])])],32)])])])]),_:1})],64)}const se=F(P,[["render",Q]]);export{se as default};
