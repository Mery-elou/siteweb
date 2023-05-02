import{d as x,J as v,v as _,g as l,b as s,a,u as e,e as n,w as m,j as h,x as k,h as f,T as V,f as b,o as d,m as w}from"./app-509bad22.js";import{a as p,b as g,_ as y}from"./TextInput.vue_vue_type_script_setup_true_lang-092f3fb2.js";import{P as N}from"./PrimaryButton-f2e9abc1.js";const S=s("header",null,[s("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"},"Profile Information"),s("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Update your account's profile information and email address. ")],-1),B={key:0},C={class:"text-sm mt-2 text-gray-800 dark:text-gray-200"},E={class:"mt-2 font-medium text-sm text-green-600 dark:text-green-400"},P={class:"flex items-center gap-4"},U={key:0,class:"text-sm text-gray-600 dark:text-gray-400"},I=x({__name:"UpdateProfileInformationForm",props:{mustVerifyEmail:null,status:null},setup(u){const i=v().props.auth.user,t=_({name:i.name,email:i.email});return(c,o)=>(d(),l("section",null,[S,s("form",{onSubmit:o[2]||(o[2]=b(r=>e(t).patch(c.route("profile.update")),["prevent"])),class:"mt-6 space-y-6"},[s("div",null,[a(y,{for:"name",value:"Name"}),a(p,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:e(t).name,"onUpdate:modelValue":o[0]||(o[0]=r=>e(t).name=r),required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),a(g,{class:"mt-2",message:e(t).errors.name},null,8,["message"])]),s("div",null,[a(y,{for:"email",value:"Email"}),a(p,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:e(t).email,"onUpdate:modelValue":o[1]||(o[1]=r=>e(t).email=r),required:"",autocomplete:"username"},null,8,["modelValue"]),a(g,{class:"mt-2",message:e(t).errors.email},null,8,["message"])]),u.mustVerifyEmail&&e(i).email_verified_at===null?(d(),l("div",B,[s("p",C,[n(" Your email address is unverified. "),a(e(w),{href:c.route("verification.send"),method:"post",as:"button",class:"underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"},{default:m(()=>[n(" Click here to re-send the verification email. ")]),_:1},8,["href"])]),h(s("div",E," A new verification link has been sent to your email address. ",512),[[k,u.status==="verification-link-sent"]])])):f("",!0),s("div",P,[a(N,{disabled:e(t).processing},{default:m(()=>[n("Save")]),_:1},8,["disabled"]),a(V,{"enter-from-class":"opacity-0","leave-to-class":"opacity-0",class:"transition ease-in-out"},{default:m(()=>[e(t).recentlySuccessful?(d(),l("p",U,"Saved.")):f("",!0)]),_:1})])],32)]))}});export{I as _};