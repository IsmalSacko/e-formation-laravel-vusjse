import{I as i,o as d,e as a,a as r,t as c}from"./app.93f6432b.js";import{u as t}from"./alert.c727725b.js";import{_ as n}from"./_plugin-vue_export-helper.cdc0426e.js";const p={props:["episodeId","watchedEpisodes"],data(){return{watchedEp:this.watchedEpisodes,isWatched:null}},methods:{toggleProgress(){axios.post("/toggleProgress",{episodeId:this.episodeId}).then(e=>{e.status===200&&(this.isWatched?t("Vous \xEAtes de retour cet \xE9pisode \u{1F519}"):t("Episode termi\xE9 avec succ\xE8es, bay \u2665\uFE0F\u2665\uFE0F\u2665\uFE0F"),this.isWatched=!this.isWatched,i.emit("toggleProgress",e.data))}).catch(e=>console.log(e))},isWatchedEpisode(){return!!this.watchedEp.find(e=>e.id===this.episodeId)}},mounted(){this.isWatched=this.isWatchedEpisode()}};function h(e,s,u,l,g,o){return d(),a("div",null,[r("button",{class:"bg-green-500 px-2 py-2 rounded-xl text-white",onClick:s[0]||(s[0]=m=>o.toggleProgress())},c(this.isWatched?"Termin\xE9":"Termin\xE9 ?"),1)])}const x=n(p,[["render",h]]);export{x as default};
