<?php if (!defined('ABSPATH')) exit; ?><!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
<meta name="color-scheme" content="dark">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Funnel+Display:wght@400;500&family=Host+Grotesk:wght@400;500&display=swap">
<style>
:root{--mbg:#1F1B2D;--mtx:#F5EEDF;--mln:rgba(245,238,223,.14);--mac:#F2B233;
  --papel:#F5EEDF;--tinta:#1F1B2D;--capa:#29243A;--capa-2:#322C45;--oro:#F2B233;
  --t1:#F5EEDF;--t2:rgba(245,238,223,.68);--t3:rgba(245,238,223,.44);--linea:rgba(245,238,223,.12);
  --disp:"Funnel Display","Host Grotesk",system-ui,sans-serif;--text:"Host Grotesk",system-ui,-apple-system,"Segoe UI",sans-serif;
  --gut:clamp(16px,4vw,56px);--max:1280px;--hh:76px;--ease:cubic-bezier(.2,.7,.2,1);
}
*{box-sizing:border-box}
[id]{scroll-margin-top:calc(var(--hh) + 20px)}

[hidden]{display:none!important}
html{scroll-behavior:smooth}
body{margin:0;background:var(--tinta);color:var(--t1);font:400 17px/1.55 var(--text);-webkit-font-smoothing:antialiased;overflow-x:clip}
img{display:block;max-width:100%}
a{color:inherit;text-decoration:none}
button{font:inherit;color:inherit;background:none;border:0;padding:0;cursor:pointer}
h1,h2,h3,h4,p,figure,ol,ul,blockquote{margin:0}
ol,ul{padding:0;list-style:none}
h1,h2,h3,h4{font-family:var(--disp);font-weight:500;letter-spacing:-.025em;text-wrap:balance}
:focus-visible{outline:2px solid var(--oro);outline-offset:3px;border-radius:4px}
.in{max-width:var(--max);margin-inline:auto;padding-inline:var(--gut)}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:10px;border-radius:999px;padding:15px 26px;font:500 15.5px/1 var(--text);white-space:nowrap;transition:transform .3s var(--ease),background-color .3s,color .3s,box-shadow .3s}
.btn:hover{transform:translateY(-1px)}
.btn.g{background:var(--oro);color:var(--tinta)}
.btn.l{box-shadow:inset 0 0 0 1px rgba(245,238,223,.35);color:var(--t1)}
.btn.l:hover{box-shadow:inset 0 0 0 1px var(--t1)}
.sec{padding-block:clamp(88px,10vw,150px)}
.sec-h{display:flex;justify-content:space-between;align-items:flex-end;gap:24px;flex-wrap:wrap;margin-bottom:clamp(36px,4vw,56px)}
.sec-h h2{font-size:clamp(44px,5.4vw,84px);line-height:.94;letter-spacing:-.04em}
.sec-h p{margin-top:16px;color:var(--t2);font-size:clamp(17px,1.35vw,20px);max-width:40ch}

/* ---------- cabecera ---------- */
.top{position:fixed;inset:0 0 auto 0;z-index:30;height:var(--hh);background:rgba(31,27,45,.86);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-bottom:1px solid transparent;transition:border-color .3s}
.top.baja{border-bottom-color:var(--linea)}
.top .row{height:100%;display:flex;align-items:center;gap:28px;padding-inline:var(--gut)}
.top .logo img{height:24px;width:auto}
.top nav{display:flex;align-items:center;gap:28px;margin-left:auto;font-size:15.5px}
.top nav a:not(.btn){color:var(--t2);transition:color .2s}
.top nav a:not(.btn):hover,.top nav a[aria-current]{color:var(--t1)}
.top .btn{padding:12px 20px;font-size:14.5px}
.top{--lfc:#F5EEDF}

/* ---------- 1 · apertura: el girasol entero con los futuros dentro ---------- */
.open{position:relative;min-height:100vh;min-height:100svh;display:flex;align-items:flex-end;overflow:hidden;padding-top:var(--hh)}
.open .t{position:relative;z-index:2;padding-bottom:clamp(48px,7vw,110px);width:100%;pointer-events:none}
.open h1{font-size:clamp(72px,9.5vw,150px);line-height:.84;letter-spacing:-.055em}
.open p{margin-top:clamp(20px,2.4vw,32px);font-size:clamp(20px,1.9vw,28px);line-height:1.3;color:var(--t2);max-width:22ch}
.open canvas{position:absolute;inset:0;width:100%;height:100%;z-index:1}
/* ---------- 2 · informe anual ---------- */
.inf{display:grid;grid-template-columns:minmax(0,.9fr) minmax(0,1.1fr);gap:clamp(40px,7vw,120px);align-items:center}
.libro{justify-self:center;perspective:1400px}
.cover{position:relative;width:clamp(260px,30vw,420px);aspect-ratio:3/4;border-radius:3px 6px 6px 3px;overflow:hidden;background:#141221;box-shadow:0 1px 0 rgba(245,238,223,.06) inset,-24px 40px 70px rgba(0,0,0,.5);transform:rotateY(-16deg) rotate(1.5deg);transition:transform .9s var(--ease)}
.libro:hover .cover,.libro:focus-visible .cover{transform:rotateY(-4deg) rotate(0deg)}
.cover::before{content:"";position:absolute;inset:0 auto 0 0;width:14px;z-index:3;background:linear-gradient(90deg,rgba(0,0,0,.45),rgba(255,255,255,.06) 60%,rgba(0,0,0,0))}
.cover > img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.cover::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(15,12,24,.55),rgba(15,12,24,0) 45%)}
.cover .ct{position:absolute;inset:0;z-index:2;padding:clamp(22px,2.4vw,34px);display:flex;flex-direction:column;text-align:left}
.cover .ct h3{font-size:clamp(32px,3.4vw,50px);line-height:1;max-width:9ch}
.cover .ct img{margin-top:auto;height:18px;width:auto;align-self:flex-start}
.inf .txt h2{font-size:clamp(40px,4.6vw,72px);line-height:.96;letter-spacing:-.04em}
.inf .txt > p{margin-top:20px;font-size:clamp(18px,1.4vw,21px);color:var(--t2);max-width:38ch}
.claves{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:clamp(16px,2.4vw,32px);margin-top:clamp(32px,3.6vw,48px)}
.claves b{display:block;font:500 clamp(40px,4vw,62px)/.9 var(--disp);letter-spacing:-.045em;color:var(--oro)}
.claves p{margin-top:12px;font-size:15px;line-height:1.42;color:var(--t2)}
.inf .acts{display:flex;gap:12px;flex-wrap:wrap;margin-top:clamp(32px,3.6vw,44px)}

/* ---------- 3 · papers ---------- */
.filtros{display:flex;gap:8px;flex-wrap:wrap}
.filtros button{border-radius:999px;padding:10px 16px;font-size:14.5px;color:var(--t2);box-shadow:inset 0 0 0 1px var(--linea);transition:background-color .2s,color .2s,box-shadow .2s}
.filtros button:hover{color:var(--t1)}
.filtros button[aria-pressed=true]{background:var(--papel);color:var(--tinta);box-shadow:none}
.papers{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:clamp(14px,1.8vw,24px)}
.paper{display:flex;flex-direction:column;width:100%;height:100%;text-align:left;padding:clamp(22px,2.2vw,30px);border-radius:6px;background:var(--capa);transition:background-color .3s,transform .4s var(--ease)}
.paper:hover{background:var(--capa-2);transform:translateY(-3px)}
.paper h3{font-size:clamp(23px,2vw,29px);line-height:1.08;letter-spacing:-.02em;min-height:2.16em}
@media (max-width:620px){.paper h3{min-height:0}}
.paper .banda{margin:22px 0;aspect-ratio:4/1;border-radius:4px;overflow:hidden}
.paper .banda img{width:100%;height:100%;object-fit:cover;transition:transform 1.2s var(--ease)}
.paper:hover .banda img{transform:scale(1.05)}
.paper .por{margin-top:auto;display:flex;align-items:center;gap:12px;font-size:15px}
.paper .por img{width:38px;height:38px;border-radius:50%;object-fit:cover;filter:grayscale(1)}
.paper .por small{display:block;color:var(--t2);font-size:14px}

/* ---------- 4 · consejo ---------- */
.consejo{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:clamp(18px,2.4vw,36px) clamp(14px,2vw,28px)}
.mb{position:relative;text-align:left;display:block;width:100%}
.mb .ft{position:relative;aspect-ratio:4/5;border-radius:6px;overflow:hidden;background:var(--capa)}
.mb .ft img{width:100%;height:100%;object-fit:cover;filter:grayscale(1);transition:transform 1.1s var(--ease)}
.mb:hover .ft img{transform:scale(1.04)}
.mb .pep{flex:none;width:22px;height:22px;transition:transform .8s var(--ease)}
.mb:hover .pep{transform:rotate(60deg)}
.mb h3{display:flex;align-items:center;gap:8px;margin-top:16px;font-size:clamp(19px,1.5vw,22px);line-height:1.15;letter-spacing:-.015em}
.mb p{margin-top:4px;padding-left:30px;font-size:14.5px;line-height:1.4;color:var(--t2)}

dialog.perfil,dialog.legal{border:0;padding:0;width:min(980px,92vw);max-height:90vh;background:var(--tinta);color:var(--t1);border-radius:10px;box-shadow:0 30px 90px rgba(0,0,0,.6)}
dialog::backdrop{background:rgba(10,8,18,.72);backdrop-filter:blur(4px);-webkit-backdrop-filter:blur(4px)}
.marco{position:relative;margin:clamp(10px,1.4vw,16px);border:1px solid rgba(245,238,223,.18);border-radius:6px;display:grid;grid-template-columns:minmax(0,.85fr) minmax(0,1.15fr);min-height:min(560px,76vh)}
.marco .ft{position:relative;overflow:hidden;border-radius:5px 0 0 5px}
.marco .ft img{width:100%;height:100%;object-fit:cover;filter:grayscale(1)}
.marco .tx{position:relative;padding:clamp(28px,4vw,56px);display:flex;flex-direction:column}
.marco .tx canvas{width:36px;height:36px}
.marco h3{margin-top:22px;font-size:clamp(34px,3.4vw,50px);line-height:1;letter-spacing:-.035em}
.marco .rol{margin-top:10px;font-size:16px;color:var(--oro)}
.marco .bio{margin-top:22px;font-size:17px;line-height:1.6;color:var(--t2);max-width:44ch}
.marco .pie{margin-top:auto;padding-top:28px;display:flex;justify-content:space-between;align-items:center;font-size:14px;color:var(--t3)}
.flechas{display:flex;gap:8px}
.icon{width:44px;height:44px;border-radius:50%;box-shadow:inset 0 0 0 1px rgba(245,238,223,.25);display:grid;place-items:center;font-size:18px;transition:box-shadow .2s,background-color .2s}
.icon:hover{box-shadow:inset 0 0 0 1px currentColor}
.cerrar{position:absolute;top:clamp(20px,2.4vw,30px);right:clamp(20px,2.4vw,30px);font-size:22px}

/* legal */
.legal .marco{display:block;min-height:0;padding:clamp(28px,4vw,56px)}
.legal .tabs{display:flex;gap:8px;flex-wrap:wrap;margin-right:56px}
.legal .tabs button{border-radius:999px;padding:10px 16px;font-size:14.5px;color:var(--t2);box-shadow:inset 0 0 0 1px var(--linea)}
.legal .tabs button[aria-selected=true]{background:var(--papel);color:var(--tinta);box-shadow:none}
.legal .pan{margin-top:28px;max-width:62ch;color:var(--t2);font-size:16px;line-height:1.65}
.legal .pan h3{color:var(--t1);font-size:30px;margin-bottom:14px}
.legal .pan p + p{margin-top:12px}

/* ---------- lector de papers ---------- */
.lector{position:fixed;inset:0;z-index:60;overflow-y:auto;overscroll-behavior:contain;background:#16131f;color:var(--t1);--fs:19px;animation:entra .45s var(--ease)}
.lector[data-modo=papel]{background:var(--papel);color:var(--tinta)}
@keyframes entra{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:none}}
.lector .barra{position:sticky;top:0;z-index:2;display:flex;align-items:center;gap:10px;padding:14px var(--gut);background:inherit;border-bottom:1px solid var(--linea)}
.lector[data-modo=papel] .barra{border-color:rgba(31,27,45,.1)}
.lector .barra .logo{height:22px;width:auto;margin-right:auto}
.lector[data-modo=papel] .barra .logo.o,.lector:not([data-modo=papel]) .barra .logo.c{display:none}
.lector .icon{width:42px;height:42px;font-size:15px}
.lector[data-modo=papel] .icon{box-shadow:inset 0 0 0 1px rgba(31,27,45,.22)}
.lector .icon svg{width:18px;height:18px}
.lector .prog{position:absolute;left:0;bottom:-1px;height:2px;width:0;background:var(--oro)}
.art{max-width:720px;margin:0 auto;padding:clamp(28px,5vw,64px) var(--gut) 120px}
.art .ab{aspect-ratio:3/1;border-radius:6px;overflow:hidden}
.art .ab img{width:100%;height:100%;object-fit:cover}
.art .ab.informe{aspect-ratio:16/9}
.art h1{margin-top:clamp(28px,3.4vw,44px);font-size:clamp(38px,5.2vw,64px);line-height:1;letter-spacing:-.04em}
.firma{display:flex;align-items:center;gap:14px;margin-top:26px;font-size:15.5px}
.firma img{width:52px;height:52px;border-radius:50%;object-fit:cover;filter:grayscale(1)}
.firma small{display:block;font-size:14px;opacity:.66}
.art .lead{margin-top:clamp(32px,4vw,48px);font:400 calc(var(--fs) * 1.3)/1.45 var(--disp);letter-spacing:-.01em}
.art .cuerpo{margin-top:26px;font-size:var(--fs);line-height:1.72}
.art .cuerpo p{opacity:.86}
.art .cuerpo p + p{margin-top:1.1em}
.art .cuerpo h2{margin:1.9em 0 .6em;font-size:calc(var(--fs) * 1.45);line-height:1.1;letter-spacing:-.025em}
.art .cuerpo blockquote{margin:1.6em 0;font:500 calc(var(--fs) * 1.45)/1.25 var(--disp);letter-spacing:-.02em;color:var(--oro)}
.lector[data-modo=papel] .cuerpo blockquote{color:#B8741A}
.art .dato{display:grid;grid-template-columns:auto 1fr;gap:18px;align-items:center;margin:1.6em 0;padding:22px 24px;border-radius:6px;background:rgba(245,238,223,.06)}
.lector[data-modo=papel] .dato{background:rgba(31,27,45,.05)}
.art .dato b{font:500 calc(var(--fs) * 2.4)/.9 var(--disp);letter-spacing:-.045em;color:var(--oro);white-space:nowrap}
.lector[data-modo=papel] .dato b{color:#B8741A}
.art .dato p{font-size:calc(var(--fs) * .88);line-height:1.5;opacity:.86}
.autora{display:grid;grid-template-columns:120px 1fr;gap:24px;align-items:center;margin-top:56px;padding:26px;border-radius:6px;background:rgba(245,238,223,.06)}
.lector[data-modo=papel] .autora{background:rgba(31,27,45,.05)}
.autora img{width:120px;height:120px;border-radius:50%;object-fit:cover;filter:grayscale(1)}
.autora h3{font-size:24px}
.autora .r{margin-top:2px;font-size:15px;opacity:.66}
.autora p.b{margin-top:10px;font-size:15.5px;line-height:1.55;opacity:.86}
.art .acts{display:flex;gap:12px;flex-wrap:wrap;margin-top:32px}
.sig{display:flex;justify-content:space-between;align-items:center;gap:20px;width:100%;text-align:left;margin-top:40px;padding:22px 26px;border-radius:6px;box-shadow:inset 0 0 0 1px var(--linea);transition:box-shadow .3s}
.lector[data-modo=papel] .sig{box-shadow:inset 0 0 0 1px rgba(31,27,45,.14)}
.sig:hover{box-shadow:inset 0 0 0 1px currentColor}
.sig small{display:block;font-size:14px;opacity:.6}
.sig b{display:block;margin-top:4px;font:500 22px/1.15 var(--disp);letter-spacing:-.02em}
.sig i{font-style:normal;font-size:22px}
.aviso{position:fixed;left:50%;bottom:28px;z-index:80;translate:-50% 0;padding:12px 20px;border-radius:999px;background:var(--papel);color:var(--tinta);font-size:15px;box-shadow:0 10px 30px rgba(0,0,0,.3);transition:opacity .3s,transform .3s}
.aviso:not(.on){opacity:0;transform:translateY(10px);pointer-events:none}

/* ---------- transparencia ---------- */
.docs{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:clamp(10px,1.4vw,18px)}
.docs a{display:flex;flex-direction:column;gap:14px;height:100%;padding:22px;border-radius:6px;background:var(--capa);transition:background-color .3s,transform .4s var(--ease)}
.docs a:hover{background:var(--capa-2);transform:translateY(-3px)}
.docs svg{width:30px;height:30px;color:var(--oro)}
.docs b{font:500 19px/1.2 var(--disp);letter-spacing:-.01em}
.docs span{margin-top:auto;font-size:13.5px;color:var(--t3)}
.reg{margin-top:22px;font-size:14px;color:var(--t3)}
@media (max-width:1000px){.docs{grid-template-columns:repeat(2,minmax(0,1fr))}}
/* ---------- 5 · hablemos ---------- */
.hab{display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr);gap:clamp(32px,6vw,96px);align-items:start;padding:clamp(32px,5vw,72px);border-radius:6px;background:var(--capa)}
.hab h2{font-size:clamp(46px,5.4vw,84px);line-height:.94;letter-spacing:-.04em}
.hab .sub{margin-top:18px;color:var(--t2);font-size:clamp(17px,1.35vw,20px);max-width:32ch}
.caja{display:flex;gap:8px;padding:6px;border-radius:999px;background:var(--tinta);box-shadow:inset 0 0 0 1px var(--linea)}
.caja input{flex:1;min-width:0;border:0;background:none;color:var(--t1);font:inherit;padding:12px 18px;outline:0}
.caja input::placeholder{color:var(--t3)}
.caja:focus-within{box-shadow:inset 0 0 0 2px var(--t1)}
.hform{display:grid;grid-template-columns:minmax(0,1fr);gap:14px}
label.f{display:grid;gap:6px;font-size:14px;color:var(--t2)}
input[type=text]{width:100%;border:0;border-radius:10px;background:var(--tinta);padding:15px 16px;font:inherit;color:var(--t1);box-shadow:inset 0 0 0 1px var(--linea)}
input[type=text]:focus{outline:0;box-shadow:inset 0 0 0 2px var(--t1)}
.two{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.q{font:500 17px/1.3 var(--disp);margin-top:6px}
.chips{display:flex;flex-wrap:wrap;gap:8px}
.chips label{position:relative}
.chips input{position:absolute;opacity:0;inset:0;cursor:pointer}
.chips span{display:inline-block;border-radius:999px;padding:11px 16px;box-shadow:inset 0 0 0 1px var(--linea);font-size:15px;color:var(--t2);transition:background-color .2s,color .2s}
.chips input:checked + span{background:var(--papel);color:var(--tinta);box-shadow:none}
.chips input:focus-visible + span{outline:2px solid var(--oro);outline-offset:2px}
.ok{display:flex;gap:10px;align-items:flex-start;font-size:14px;color:var(--t2)}
.ok input{margin-top:3px;accent-color:var(--oro);width:17px;height:17px}
.ok button{text-decoration:underline;text-underline-offset:3px}
.err{font-size:14px;color:var(--oro);min-height:1em}
.gracias h3{font-size:clamp(30px,3vw,44px);line-height:1.02}
.gracias p{margin-top:12px;color:var(--t2)}

/* ---------- pie (igual que en la Home) ---------- */
.foot{margin-top:clamp(88px,10vw,150px);background:var(--tinta);color:rgba(245,238,223,.7);padding-block:56px 30px;font-size:15px;border-top:1px solid var(--linea)}
.foot .row{display:flex;justify-content:space-between;align-items:center;gap:24px;flex-wrap:wrap}
.foot .flogo{height:30px;width:auto}
.foot nav{display:flex;gap:28px;flex-wrap:wrap;align-items:center}
.foot nav a:hover,.foot .leg button:hover{color:var(--papel)}
.foot .leg{margin-top:36px;font-size:13px;color:rgba(245,238,223,.42);display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap}

@media (max-width:1000px){
  .inf{grid-template-columns:minmax(0,1fr)}
  .papers{grid-template-columns:repeat(2,minmax(0,1fr))}
  .consejo{grid-template-columns:repeat(2,minmax(0,1fr))}
  .hab{grid-template-columns:minmax(0,1fr);padding:28px 20px}
  .marco{grid-template-columns:1fr}
  .marco .ft{aspect-ratio:4/3;border-radius:5px 5px 0 0}
  .marco .ft img{object-position:50% 25%}
  .top nav a:not(.btn){display:none}
}
@media (max-width:620px){ .papers{grid-template-columns:1fr} .claves{grid-template-columns:1fr} .two{grid-template-columns:1fr} .autora{grid-template-columns:1fr} .art .dato{grid-template-columns:1fr} .lector .barra{gap:6px} .lector .icon{width:38px;height:38px} }
@media (prefers-reduced-motion:reduce){ *{transition:none!important;animation:none!important} }
.lf{display:inline-grid;place-items:center;width:42px;height:42px;margin-left:-14px;border-radius:50%;color:var(--lfc,#1F1B2D);transition:background-color .2s,transform .3s}
.lf:hover{background:rgba(127,127,127,.12);transform:translateY(-1px)}
.lf:hover{color:var(--lfh,#1F1B2D)}
.lf .xf{width:30px;height:30px;overflow:visible}
.lf .punto{transform-origin:41px 9px;animation:late 2.4s ease-in-out infinite}
@keyframes late{0%,100%{transform:scale(1);opacity:1}50%{transform:scale(1.35);opacity:.75}}
dialog.entrar{width:min(520px,92vw)}
dialog.entrar .marco{text-align:center}
dialog.entrar .xf{width:72px;height:72px;margin:6px auto 0;display:block;color:#1F1B2D;overflow:visible}
dialog.entrar h3{margin:18px 0 0;font-size:clamp(28px,3vw,38px);line-height:1.02}
dialog.entrar p{margin-top:10px;color:rgba(31,27,45,.66)}
dialog.entrar form{margin-top:22px;display:grid;gap:10px}
dialog.entrar input{width:100%;border:0;border-radius:12px;background:#fff;padding:16px;font:inherit;font-size:17px;color:#1F1B2D;box-shadow:inset 0 0 0 1px rgba(31,27,45,.12);text-align:center}
dialog.entrar input:focus{outline:0;box-shadow:inset 0 0 0 2px #1F1B2D}
dialog.entrar .btn{width:100%;padding:17px}
dialog.entrar .nueva{margin-top:18px;font-size:15px}
dialog.entrar .nueva a{text-decoration:underline;text-underline-offset:3px;color:#1F1B2D}
dialog.entrar .err{color:#E2592A;font-size:14px;min-height:1em}
@media (max-width:1000px){.lf span{display:none}}
dialog.entrar{border:0;padding:0;border-radius:10px;background:#F5EEDF;color:#1F1B2D;overflow:auto;max-height:90vh;box-shadow:0 30px 90px rgba(0,0,0,.35)}
dialog.entrar::backdrop{background:rgba(15,12,24,.6);backdrop-filter:blur(3px);-webkit-backdrop-filter:blur(3px)}
dialog.entrar .marco{position:relative;display:block;min-height:0;margin:14px;padding:clamp(26px,4vw,44px);border:1px solid rgba(31,27,45,.12);border-radius:6px}
dialog.entrar .x{position:absolute;top:16px;right:16px;width:44px;height:44px;border-radius:50%;box-shadow:inset 0 0 0 1px rgba(31,27,45,.12);background:none;color:#1F1B2D;font-size:22px}
dialog.entrar .btn{background:#1F1B2D;color:#F5EEDF}


/* ---------- menú del móvil ---------- */
.mnu{display:none;flex:none;width:44px;height:44px;margin-left:2px;border-radius:50%;flex-direction:column;align-items:center;justify-content:center;gap:5px;color:inherit}
.mnu i{display:block;width:19px;height:1.8px;border-radius:2px;background:currentColor;transition:transform .3s var(--ease)}
.mnu[aria-expanded=true] i:first-child{transform:translateY(3.4px) rotate(45deg)}
.mnu[aria-expanded=true] i:last-child{transform:translateY(-3.4px) rotate(-45deg)}
.mnuP{position:fixed;z-index:29;inset:var(--hh) 0 0 0;display:flex;flex-direction:column;gap:30px;padding:26px var(--gut) calc(30px + env(safe-area-inset-bottom,0px));overflow:auto;background:var(--mbg);color:var(--mtx);animation:mnuIn .3s var(--ease)}
@keyframes mnuIn{from{opacity:0;transform:translateY(-8px)}to{opacity:1;transform:none}}
.mnuP nav{display:flex;flex-direction:column}
.mnuP nav a{padding:14px 0;border-bottom:1px solid var(--mln);font:500 34px/1.05 var(--disp);letter-spacing:-.03em}
.mnuP nav a[aria-current]{color:var(--mac)}
.mnuP .btn{align-self:flex-start}
.mnuP .mail{margin-top:auto;padding:12px 0;font-size:16px;opacity:.72}
body.admin-bar .mnuP{top:calc(var(--hh) + 46px)}
@media (max-width:1000px){.mnu{display:inline-flex}.top .row{gap:14px}}
/* ---------- móvil: vídeos de fondo sin el botón de play del sistema, botones que caben ---------- */
video:not([controls])::-webkit-media-controls,video:not([controls])::-webkit-media-controls-start-playback-button,video:not([controls])::-webkit-media-controls-overlay-play-button{display:none!important;-webkit-appearance:none}
@media (max-width:620px){
  .btn{white-space:normal;text-align:center;line-height:1.2}
  .top .logo img{height:29px}
  .top .row{gap:10px}
  .top .btn{padding:11px 16px;font-size:14.5px;white-space:nowrap}
}
@media (max-width:380px){ .top .logo img{height:25px} .top .btn{padding:10px 13px;font-size:14px} }
/* ---------- tocar con el dedo ---------- */
.ok input{flex:none}
.toggle{position:relative}.toggle::before{content:"";position:absolute;inset:-12px -8px}
@media (max-width:620px){
  .foot nav{gap:2px 22px}.foot nav a{display:inline-block;padding:11px 0}
  .foot .leg{gap:6px 16px}.foot .leg button{padding:11px 0}
  .ok input{width:22px;height:22px;margin-top:1px}
}
body.admin-bar .top{top:32px}@media (max-width:782px){body.admin-bar .top{top:46px}}
</style>
<?php wp_head(); ?>
</head>
<body <?php body_class('tf'); ?>>
<?php wp_body_open(); ?>

<header class="top" id="top"><div class="row">
  <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Transfronteriza, inicio"><img src="<?php tf_img('ia8745bc028', TF_U . '/logo/h-oscuro-34.svg'); ?>" data-tf-img="ia8745bc028" alt="Transfronteriza"></a>
  <nav aria-label="Principal"><a href="<?php echo esc_url(tf_pagina('comunidad')); ?>" data-tf="t38114eb012"><?php tf_t('t38114eb012'); ?></a><a href="<?php echo esc_url(tf_pagina('futuros')); ?>" aria-current="page" data-tf="tf6078594dd"><?php tf_t('tf6078594dd'); ?></a><a class="btn g" href="<?php echo esc_url(home_url('/')); ?>#descubre" data-tf="t3158ca410d"><?php tf_t('t3158ca410d'); ?></a><a class="lf" href="#" data-entrar aria-label="Entra en La Frontera" title="Entra en La Frontera"><svg class="xf" viewBox="0 0 48 48" aria-hidden="true"><path d="M9 8.5h16.5a6 6 0 0 1 6 6v7.5a6 6 0 0 1-6 6H17l-6.5 5.5V28H9a6 6 0 0 1-6-6v-7.5a6 6 0 0 1 6-6z" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linejoin="round"/><path d="M23 19h16a6 6 0 0 1 6 6v7a6 6 0 0 1-6 6h-1.5v5.5L31 38h-8a6 6 0 0 1-6-6v-7a6 6 0 0 1 6-6z" fill="#E2592A"/><circle class="punto" cx="41" cy="9" r="4.2" fill="#F2B233"/></svg></a></nav>
  <button class="mnu" type="button" aria-label="Abrir el menú" aria-expanded="false" aria-controls="mnuP"><i></i><i></i></button>
</div></header>
<div class="mnuP" id="mnuP" hidden><nav aria-label="Menú"><a href="<?php echo esc_url(tf_pagina('comunidad')); ?>" data-tf="t38114eb012"><?php tf_t('t38114eb012'); ?></a><a href="<?php echo esc_url(tf_pagina('futuros')); ?>" aria-current="page" data-tf="tf6078594dd"><?php tf_t('tf6078594dd'); ?></a><a href="#" data-entrar data-tf="t11905120cc"><?php tf_t('t11905120cc'); ?></a></nav><a class="btn g" href="<?php echo esc_url(home_url('/')); ?>#descubre" data-tf="t3158ca410d"><?php tf_t('t3158ca410d'); ?></a><a class="mail" href="mailto:hola@transfronteriza.net" data-tf="ta0aa22019a"><?php tf_t('ta0aa22019a'); ?></a></div>

<main>
  <!-- 1 · Apertura -->
  <section class="open" data-tf-sec="open">
    <canvas id="semilla" aria-hidden="true"></canvas>
    <div class="t in">
      <h1 data-tf="t7dd57907b5"><?php tf_t('t7dd57907b5'); ?></h1>
      <p data-tf="tbc6bf077e8"><?php tf_t('tbc6bf077e8'); ?></p>
    </div>
  </section>

  <!-- 2 · Informe anual -->
  <section class="sec in" id="informe" data-tf-sec="informe" data-tf-panel="edit.php?post_type=tf_informe" data-tf-panel-t="Editar el informe">
    <?php tf_informe_bloque(); ?>
  </section>

  <!-- 3 · Papers -->
  <section class="sec in" id="papers" style="padding-top:0" data-tf-sec="papers" data-tf-panel="edit.php?post_type=tf_paper" data-tf-panel-t="Editar los papers">
    <div class="sec-h">
      <div><h2 data-tf="t0ef101bafe"><?php tf_t('t0ef101bafe'); ?></h2><p data-tf="t8448cf18a5"><?php tf_t('t8448cf18a5'); ?></p></div>
      <?php tf_filtros(); ?>
    </div>
    <ul class="papers" id="papersList"></ul>
  </section>

  <!-- 4 · Consejo -->
  <section class="sec in" id="consejo" style="padding-top:0" data-tf-sec="consejo" data-tf-panel="edit.php?post_type=tf_persona" data-tf-panel-t="Editar el Consejo">
    <div class="sec-h"><div><h2 data-tf="t8fb259eb70"><?php tf_t('t8fb259eb70'); ?></h2><p data-tf="taceccb5a5c"><?php tf_t('taceccb5a5c'); ?></p></div></div>
    <ul class="consejo" id="consejoList"></ul>
  </section>

  <!-- Transparencia -->
  <section class="sec in" id="transparencia" style="padding-top:0" data-tf-sec="transparencia" data-tf-panel="edit.php?post_type=tf_documento" data-tf-panel-t="Editar los documentos">
    <div class="sec-h"><div><h2 data-tf="t3fff3b3af0"><?php tf_t('t3fff3b3af0'); ?></h2><p data-tf="t9d34789774"><?php tf_t('t9d34789774'); ?></p></div></div>
    <?php tf_documentos(); ?>
    <p class="reg" data-tf="tc6f0ef7565"><?php tf_t('tc6f0ef7565'); ?></p>
  </section>

  <!-- 5 · Hablemos -->
  <section class="in" id="hablemos" data-tf-sec="hablemos">
    <div class="hab">
      <div><h2 data-tf="td8c0f820e5"><?php tf_t('td8c0f820e5'); ?></h2><p class="sub" data-tf="t9a0e0eed9a"><?php tf_t('t9a0e0eed9a'); ?></p></div>
      <form class="hform" id="hform" novalidate>
        <div id="h1s"><div class="caja"><input type="email" id="h-correo" placeholder="Tu correo" autocomplete="email" aria-label="Tu correo"><button class="btn g" type="submit" data-tf="t29c14fc02f"><?php tf_t('t29c14fc02f'); ?></button></div></div>
        <div id="h2s" hidden class="hform">
          <div class="two"><label class="f">Tu nombre<input type="text" id="h-nombre" autocomplete="name"></label><label class="f">Tu organización<input type="text" id="h-org" autocomplete="organization"></label></div>
          <p class="q" data-tf="t96042621d8"><?php tf_t('t96042621d8'); ?></p>
          <div class="chips">
            <label><input type="radio" name="tipo" checked><span>Medio de comunicación</span></label>
            <label><input type="radio" name="tipo"><span>Institución pública</span></label>
            <label><input type="radio" name="tipo"><span>Universidad o centro de estudios</span></label>
            <label><input type="radio" name="tipo"><span>Fundación o financiador</span></label>
            <label><input type="radio" name="tipo"><span>Empresa</span></label>
          </div>
          <label class="ok"><input type="checkbox" id="h-ok"><span>Acepto la <button type="button" data-legal="privacidad" data-tf="tc8f28f06dd"><?php tf_t('tc8f28f06dd'); ?></button>.</span></label>
          <div><button class="btn g" type="submit" data-tf="t61b0418ae4"><?php tf_t('t61b0418ae4'); ?></button></div>
        </div>
        <div class="gracias" id="h3s" hidden><h3 id="hT">Gracias.</h3><p data-tf="ta5d4728d2e"><?php tf_t('ta5d4728d2e'); ?></p></div>
        <p class="err" id="herr" role="alert"></p>
      </form>
    </div>
  </section>
</main>

<footer class="foot"><div class="in">
  <div class="row"><img class="flogo" src="<?php tf_img('ia8745bc028', TF_U . '/logo/h-oscuro-34.svg'); ?>" data-tf-img="ia8745bc028" alt="Transfronteriza"><nav aria-label="Pie"><a href="<?php echo esc_url(tf_pagina('comunidad')); ?>" data-tf="t38114eb012"><?php tf_t('t38114eb012'); ?></a><a href="<?php echo esc_url(tf_pagina('futuros')); ?>" data-tf="tf6078594dd"><?php tf_t('tf6078594dd'); ?></a><a href="<?php echo esc_url(home_url('/')); ?>#descubre" data-tf="t3158ca410d"><?php tf_t('t3158ca410d'); ?></a><a href="mailto:hola@transfronteriza.net" data-tf="ta0aa22019a"><?php tf_t('ta0aa22019a'); ?></a></nav></div>
  <div class="leg"><span>© 2026 Asociación Juvenil Transfronteriza</span><span><button type="button" data-legal="aviso" data-tf="t2a27eb438d"><?php tf_t('t2a27eb438d'); ?></button> · <button type="button" data-legal="privacidad" data-tf="tcd9bcb9fd2"><?php tf_t('tcd9bcb9fd2'); ?></button> · <button type="button" data-legal="cookies" data-tf="t53614378a5"><?php tf_t('t53614378a5'); ?></button></span></div>
</div></footer>

<!-- lector de papers e informe -->
<div class="lector" id="lector" role="dialog" aria-modal="true" aria-labelledby="lTit" hidden>
  <div class="barra">
    <img class="logo o" src="<?php tf_img('ia8745bc028', TF_U . '/logo/h-oscuro-34.svg'); ?>" data-tf-img="ia8745bc028" alt="Transfronteriza"><img class="logo c" src="<?php tf_img('i9aac151d2b', TF_U . '/logo/h-color-34.svg'); ?>" data-tf-img="i9aac151d2b" alt="Transfronteriza">
    <button class="icon" type="button" id="lMenos" aria-label="Letra más pequeña">A−</button>
    <button class="icon" type="button" id="lMas" aria-label="Letra más grande">A+</button>
    <button class="icon" type="button" id="lModo" aria-label="Cambiar a modo papel"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><circle cx="12" cy="12" r="4.5"/><path d="M12 2.5v2M12 19.5v2M2.5 12h2M19.5 12h2M5.3 5.3l1.4 1.4M17.3 17.3l1.4 1.4M5.3 18.7l1.4-1.4M17.3 6.7l1.4-1.4"/></svg></button>
    <button class="icon" type="button" id="lLink" aria-label="Copiar enlace"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M10 14a4.5 4.5 0 0 0 6.4 0l3-3a4.5 4.5 0 0 0-6.4-6.4l-1.1 1.1"/><path d="M14 10a4.5 4.5 0 0 0-6.4 0l-3 3a4.5 4.5 0 0 0 6.4 6.4l1.1-1.1"/></svg></button>
    <button class="icon" type="button" id="lX" aria-label="Cerrar" style="font-size:20px">×</button>
    <span class="prog" id="lProg"></span>
  </div>
  <article class="art" id="lArt"></article>
</div>
<dialog class="entrar" id="entrar" aria-labelledby="entT"><div class="marco"><button class="x" type="button" data-cierra aria-label="Cerrar">×</button><svg class="xf" viewBox="0 0 48 48" aria-hidden="true"><path d="M9 8.5h16.5a6 6 0 0 1 6 6v7.5a6 6 0 0 1-6 6H17l-6.5 5.5V28H9a6 6 0 0 1-6-6v-7.5a6 6 0 0 1 6-6z" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linejoin="round"/><path d="M23 19h16a6 6 0 0 1 6 6v7a6 6 0 0 1-6 6h-1.5v5.5L31 38h-8a6 6 0 0 1-6-6v-7a6 6 0 0 1 6-6z" fill="#E2592A"/><circle class="punto" cx="41" cy="9" r="4.2" fill="#F2B233"/></svg><div id="entA"><h3 id="entT">Entra en La Frontera</h3><p data-tf="t9834a96e12"><?php tf_t('t9834a96e12'); ?></p><form id="entF" novalidate><input type="email" id="entC" placeholder="Tu correo" autocomplete="email" aria-label="Tu correo"><p class="err" id="entE" role="alert"></p><button class="btn p" type="submit" data-tf="t17c8912d40"><?php tf_t('t17c8912d40'); ?></button></form><p class="nueva">¿Aún no eres parte? <a href="<?php echo esc_url(home_url('/')); ?>#descubre" data-cierra-entrar data-tf="t3158ca410d"><?php tf_t('t3158ca410d'); ?></a></p></div><div id="entB" hidden><h3 data-tf="tb94238ba26"><?php tf_t('tb94238ba26'); ?></h3><p id="entBp"></p></div></div></dialog>
<div class="aviso" id="aviso" role="status"></div>

<dialog class="perfil" id="perfil" aria-labelledby="pNombre">
  <div class="marco">
    <div class="ft"><img id="pFoto" src="" alt=""></div>
    <div class="tx">
      <canvas id="pPep" aria-hidden="true"></canvas>
      <h3 id="pNombre"></h3>
      <p class="rol" id="pRol"></p>
      <p class="bio" id="pBio"></p>
      <div class="pie"><span id="pNum"></span><div class="flechas"><button class="icon" type="button" id="pAnt" aria-label="Anterior">←</button><button class="icon" type="button" id="pSig" aria-label="Siguiente">→</button></div></div>
      <button class="icon cerrar" type="button" id="pX" aria-label="Cerrar">×</button>
    </div>
  </div>
</dialog>

<dialog class="legal" id="legal" aria-label="Información legal">
  <div class="marco">
    <div class="tabs" role="tablist"><button type="button" role="tab" data-tab="aviso" data-tf="t2a27eb438d"><?php tf_t('t2a27eb438d'); ?></button><button type="button" role="tab" data-tab="privacidad" data-tf="tcd9bcb9fd2"><?php tf_t('tcd9bcb9fd2'); ?></button><button type="button" role="tab" data-tab="cookies" data-tf="t53614378a5"><?php tf_t('t53614378a5'); ?></button></div>
    <div class="pan" data-pan="aviso"><h3 data-tf="tb746b8f804"><?php tf_t('tb746b8f804'); ?></h3><p data-tf="t72a4100e93"><?php tf_t('t72a4100e93'); ?></p><p data-tf="t48b9f9d455"><?php tf_t('t48b9f9d455'); ?></p></div>
    <div class="pan" data-pan="privacidad" hidden><h3 data-tf="t48532db43b"><?php tf_t('t48532db43b'); ?></h3><p data-tf="t2305d32623"><?php tf_t('t2305d32623'); ?></p><p data-tf="t9d528350e7"><?php tf_t('t9d528350e7'); ?></p><p data-tf="tddb282a99c"><?php tf_t('tddb282a99c'); ?></p><p data-tf="t9f2bf10e65"><?php tf_t('t9f2bf10e65'); ?></p><p data-tf="t166c9b82c7"><?php tf_t('t166c9b82c7'); ?></p><p data-tf="te6be6faa4e"><?php tf_t('te6be6faa4e'); ?></p><p data-tf="t6e74bf0644"><?php tf_t('t6e74bf0644'); ?></p><p data-tf="td9a36501db"><?php tf_t('td9a36501db'); ?></p></div>
    <div class="pan" data-pan="cookies" hidden><h3 data-tf="t9d768186f8"><?php tf_t('t9d768186f8'); ?></h3><p data-tf="t54e3f07ee2"><?php tf_t('t54e3f07ee2'); ?></p><p data-tf="t514e195734"><?php tf_t('t514e195734'); ?></p></div>
    <button class="icon cerrar" type="button" id="legalX" aria-label="Cerrar">×</button>
  </div>
</dialog>

<?php tf_script_base(tf_datos_futuros()); ?>
<script>
(() => {
  /* menú del móvil */
  (() => { const b = document.querySelector('.mnu'), p = document.getElementById('mnuP'); if (!b || !p) return;
    const pon = v => { p.hidden = !v; b.setAttribute('aria-expanded', v); b.setAttribute('aria-label', v ? 'Cerrar el menú' : 'Abrir el menú'); document.documentElement.style.overflow = v ? 'hidden' : ''; };
    b.addEventListener('click', () => pon(p.hidden)); p.addEventListener('click', e => { if (e.target.closest('a')) pon(false); });
    addEventListener('keydown', e => { if (e.key === 'Escape' && !p.hidden) pon(false); }); addEventListener('resize', () => { if (innerWidth > 1000 && !p.hidden) pon(false); }); })();
  /* marcas para «Editar esta página»: solo salen cuando el dato viene de WordPress */
  const ED = (id, c) => id ? ` data-tf-c="p${id}.${c}"` : '', EF = id => id ? ` data-tf-f="p${id}"` : '', EI = (id, t) => id ? ` data-tf-item="${id}" data-tf-tipo="${t}"` : '';
  /* cada página empieza arriba (salvo que se abra en un apartado); un enlace a la misma página sube al principio */
  if ('scrollRestoration' in history) history.scrollRestoration = 'manual';
  let tocado = false; ['wheel', 'touchstart', 'keydown', 'pointerdown'].forEach(t => addEventListener(t, () => tocado = true, { once: true, passive: true }));
  const arriba = () => { if (!location.hash && !tocado) scrollTo(0, 0); };
  arriba(); addEventListener('DOMContentLoaded', arriba); addEventListener('load', arriba); addEventListener('pageshow', arriba); setTimeout(arriba, 350);
  document.addEventListener('click', e => { const a = e.target.closest('a[href]'); if (!a || a.target || a.hasAttribute('download')) return; const u = new URL(a.href, location.href); if (u.pathname === location.pathname && !u.hash && u.search === location.search) { e.preventDefault(); scrollTo({ top: 0, behavior: 'smooth' }); } });
  const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
  const DPR = Math.min(2, devicePixelRatio || 1), GA = Math.PI * (3 - Math.sqrt(5)), TAU = Math.PI * 2;
  const K = { papel: '#F5EEDF', oroN: '#FCD35A', fuegoN: '#FC8A45' };
  const $ = s => document.querySelector(s);
  const hx = h => [1, 3, 5].map(i => parseInt(h.slice(i, i + 2), 16));
  const mix = (a, b, t) => { const A = hx(a), B = hx(b); return '#' + A.map((v, i) => Math.round(v + (B[i] - v) * t).toString(16).padStart(2, '0')).join(''); };
  const rng = a => () => { a |= 0; a = a + 0x6D2B79F5 | 0; let t = Math.imul(a ^ a >>> 15, 1 | a); t = t + Math.imul(t ^ t >>> 7, 61 | t) ^ t; return ((t ^ t >>> 14) >>> 0) / 4294967296; };
  const setup = cv => { const w = cv.clientWidth, h = cv.clientHeight; cv.width = Math.max(1, Math.round(w * DPR)); cv.height = Math.max(1, Math.round(h * DPR)); const g = cv.getContext('2d'); g.setTransform(DPR, 0, 0, DPR, 0, 0); return [g, w, h]; };
  /* la pepita del manual */
  const seedAt = (g, x, y, rad, a, col, r) => {
    const p = new Path2D(), ca = Math.cos(a), sa = Math.sin(a);
    for (let k = 0; k <= 14; k++) { const b = k / 14 * TAU, q = 1 + (r() - .5) * .2, u = Math.cos(b) * rad * 1.1 * q, v = Math.sin(b) * rad * .9 * q; const px = x + u * ca - v * sa, py = y + u * sa + v * ca; k ? p.lineTo(px, py) : p.moveTo(px, py); }
    p.closePath(); g.fillStyle = col; g.fill(p);
    g.save(); g.clip(p); g.lineCap = 'round';
    const n = rad > 14 ? 4 : rad > 6 ? 3 : 2;
    for (let k = 0; k < n; k++) { g.strokeStyle = r() < .55 ? '#FCE7AE' : mix(col, '#3A1A08', .28); g.globalAlpha = .22 + r() * .26; g.lineWidth = Math.max(.5, rad * (.12 + r() * .1)); const o = (r() - .5) * rad * 1.3; g.beginPath(); g.moveTo(x - ca * rad * 1.2 - sa * o, y - sa * rad * 1.2 + ca * o); g.lineTo(x + ca * rad * 1.2 - sa * o, y + sa * rad * 1.2 + ca * o); g.stroke(); }
    if (rad > 10) for (let k = 0; k < rad * 2; k++) { g.fillStyle = r() < .5 ? '#fff4d6' : '#5a2a0a'; g.globalAlpha = .08 + r() * .1; g.fillRect(x + (r() - .5) * rad * 2, y + (r() - .5) * rad * 2, 1, 1); }
    g.restore(); g.globalAlpha = 1;
  };
  const pepBlanca = (cv, s) => { const [g, w] = setup(cv), r = rng(s * 131 + 7); seedAt(g, w / 2, w / 2, w * .32, r() * TAU, K.papel, r); };
  const pinta = new Map(), ro = new ResizeObserver(es => es.forEach(e => { if (e.contentRect.width > 0) pinta.get(e.target)?.(); }));
  const vigila = (cv, fn) => { pinta.set(cv, fn); ro.observe(cv); };
  const aviso = (() => { let t; return m => { const a = $('#aviso'); a.textContent = m; a.classList.add('on'); clearTimeout(t); t = setTimeout(() => a.classList.remove('on'), 2200); }; })();

  /* 1 · una corriente casi espacial de pepitas */
  const cvS = $('#semilla'), open = $('.open');
  let S = [], gS, wS, hS;
  /* la corriente: entra por arriba a la izquierda, cruza, baja por la derecha y se curva de vuelta hasta rozar el título */
  const corriente = (s, w, h) => { const u = 1 - s, P = w < 760 ? [[-.15, .12], [1.02, -.04], [1.12, .64], [-.06, .7]] : [[-.1, .1], [.66, -.1], [1.06, .66], [.3, .6]]; return [0, 1].map(k => u * u * u * P[0][k] + 3 * u * u * s * P[1][k] + 3 * u * s * s * P[2][k] + s * s * s * P[3][k]).map((v, k) => v * (k ? h : w)); };
  const buildSeeds = () => {
    [gS, wS, hS] = setup(cvS); const r = rng(55), N = wS < 760 ? 150 : 300; S = [];
    for (let i = 0; i < N; i++) {
      const capa = r() < .55 ? 0 : r() < .7 ? 1 : 2, rad = [2.2, 4.2, 7.5][capa] * (.7 + r() * .7), t = r();
      const s2 = Math.ceil(rad * 2.6), sp = document.createElement('canvas'); sp.width = sp.height = Math.ceil(s2 * DPR);
      const g = sp.getContext('2d'); g.setTransform(DPR, 0, 0, DPR, 0, 0); seedAt(g, s2 / 2, s2 / 2, rad, 0, mix(K.fuegoN, K.oroN, t), r);
      const g1 = (r() + r() + r()) / 3 - .5;
      S.push({ sp, s: s2, p: r(), v: [.0045, .007, .011][capa] * (.8 + r() * .4), off: g1 * [.5, .38, .3][capa] * Math.min(wS, hS) * 1.1, ph: r() * TAU, rot: r() * TAU, vr: (r() - .5) * .3, al: [.42, .7, .95][capa] });
    }
  };
  vigila(cvS, buildSeeds);
  const pinta1 = t => {
    gS.clearRect(0, 0, wS, hS);
    for (const q of S) {
      const [x0, y0] = corriente(q.p, wS, hS), [x1, y1] = corriente(Math.min(1, q.p + .004), wS, hS), an = Math.atan2(y1 - y0, x1 - x0);
      const o = q.off + Math.sin(t * .00025 + q.ph) * 14, x = x0 - Math.sin(an) * o, y = y0 + Math.cos(an) * o;
      const a = q.al * Math.min(1, q.p / .08, (1 - q.p) / .1);
      if (a <= .01) continue;
      gS.save(); gS.globalAlpha = a; gS.translate(x, y); gS.rotate(an + q.rot); gS.drawImage(q.sp, -q.s / 2, -q.s / 2, q.s, q.s); gS.restore();
    }
  };
  let tP = 0, vivo = true;
  const loop = t => { const dt = Math.min(64, t - (tP || t)) / 1000; tP = t; if (vivo && S.length) { for (const q of S) { q.p += q.v * dt; if (q.p > 1) q.p -= 1; q.rot += q.vr * dt; } pinta1(t); } requestAnimationFrame(loop); };
  if (reduce) { const once = () => S.length ? pinta1(0) : requestAnimationFrame(once); once(); } else { requestAnimationFrame(loop); new IntersectionObserver(e => { vivo = e[0].isIntersecting; }).observe(open); }

  /* 2 · informe y 3 · papers, con su lector */
  const A = TF.autores || {}, P = TF.papers || [], INF = TF.informe || { id: 'informe', informe: true, h: '', d: '', lead: '', html: '', claves: [] };
  const pl = $('#papersList');
  const aid = a => (/^p(\d+)$/.exec(a || '') || [])[1];
  pl.innerHTML = P.map(p => `<li data-t="${p.t}"${EI(p.pid, 'tf_paper')}><button class="paper" type="button" data-abre="${p.id}"><h3${ED(p.pid, 'titulo')}>${p.h}</h3><div class="banda"${EF(p.pid)}><img src="${p.banda}" alt="" loading="lazy"></div><div class="por"><img src="${(A[p.a] || [])[3] || ''}" alt="" loading="lazy"><div><span${ED(aid(p.a), 'titulo')}>${A[p.a][0]}</span><small${ED(aid(p.a), 'cargo')}>${A[p.a][1]}</small></div></div></button></li>`).join('');
  $('#filtros').addEventListener('click', e => { const b = e.target.closest('button'); if (!b) return; document.querySelectorAll('#filtros button').forEach(x => x.setAttribute('aria-pressed', x === b)); pl.querySelectorAll('li').forEach(li => li.hidden = b.dataset.t !== 'todos' && li.dataset.t !== b.dataset.t); });

  const lector = $('#lector'), art = $('#lArt');
  let fs = 19, antesFoco = null;
  const bloque = ([k, x, y]) => k === 'p' ? `<p>${x}</p>` : k === 'h' ? `<h2>${x}</h2>` : k === 'q' ? `<blockquote>«${x}»</blockquote>` : `<div class="dato"><b>${x}</b><p>${y}</p></div>`;
  const prog = () => { const m = lector.scrollHeight - lector.clientHeight; $('#lProg').style.width = (m > 0 ? lector.scrollTop / m * 100 : 0) + '%'; };
  const abre = id => {
    const p = id === 'informe' ? INF : P.find(x => x.id === id); if (!p) return;
    if (lector.hidden) antesFoco = document.activeElement;
    const au = p.informe ? null : A[p.a], i = P.indexOf(p), nx = p.informe ? P[0] : P[(i + 1) % P.length];
    art.innerHTML = `<div class="ab${p.informe ? ' informe' : ''}"><img src="${p.informe ? p.portada : p.banda}" alt=""></div>
      <h1 id="lTit">${p.h}</h1>
      <div class="firma">${au ? `<img src="${au[3]}" alt="">` : `<img src="<?php echo TF_U; ?>/logo/transfronteriza-simbolo-color.svg" alt="" style="filter:none;object-fit:contain">`}<div>${au ? au[0] : 'Futuros'}<small>${au ? au[1] + ' · ' : ''}${p.d}</small></div></div>
      <p class="lead">${p.lead}</p>
      <div class="cuerpo">${(p.claves || []).map(c => bloque(['d', c[0], c[1]])).join('')}${p.html || (p.b || []).map(bloque).join('')}</div>
      ${p.informe ? `<div class="acts"><a class="btn g" href="${INF.pdf || '#'}" download>Descargar el informe completo</a></div>` : `<div class="autora"><img src="${au[3]}" alt="${au[0]}"><div><h3>${au[0]}</h3><p class="r">${au[1]}</p><p class="b">${au[2]}</p></div></div>`}
      <button class="sig" type="button" data-abre="${nx.id}"><div><small>${p.informe ? 'Primer paper' : 'Siguiente paper'}</small><b>${nx.h}</b></div><i>→</i></button>`;
    lector.hidden = false; lector.scrollTop = 0; document.documentElement.style.overflow = 'hidden';
    history.replaceState(null, '', '#' + (p.informe ? 'leer-informe' : p.id)); $('#lX').focus({ preventScroll: true }); prog();
  };
  const cierra = () => { lector.hidden = true; document.documentElement.style.overflow = ''; history.replaceState(null, '', location.pathname + location.search); antesFoco?.focus?.({ preventScroll: true }); antesFoco = null; };
  lector.addEventListener('scroll', prog, { passive: true });
  document.addEventListener('click', e => { const b = e.target.closest('[data-abre]'); if (b) { e.preventDefault(); abre(b.dataset.abre); } });
  $('#lX').addEventListener('click', cierra);
  document.addEventListener('keydown', e => { if (e.key === 'Escape' && !lector.hidden) cierra(); });
  const setFs = v => { fs = Math.max(16, Math.min(24, v)); lector.style.setProperty('--fs', fs + 'px'); };
  $('#lMas').addEventListener('click', () => setFs(fs + 1)); $('#lMenos').addEventListener('click', () => setFs(fs - 1));
  $('#lModo').addEventListener('click', () => { const papel = lector.dataset.modo !== 'papel'; lector.dataset.modo = papel ? 'papel' : ''; $('#lModo').setAttribute('aria-label', papel ? 'Cambiar a modo oscuro' : 'Cambiar a modo papel'); try { localStorage.setItem('tf-modo', lector.dataset.modo); } catch (e) {} });
  try { if (localStorage.getItem('tf-modo') === 'papel') lector.dataset.modo = 'papel'; } catch (e) {}
  $('#lLink').addEventListener('click', () => { const u = location.href; (navigator.clipboard ? navigator.clipboard.writeText(u) : Promise.reject()).then(() => aviso('Enlace copiado')).catch(() => aviso(u)); });
  const deHash = () => { const h = location.hash.slice(1); if (h === 'leer-informe') abre('informe'); else if (P.some(p => p.id === h)) abre(h); };
  deHash(); addEventListener('hashchange', deHash);

  /* 4 · consejo */
  const C = TF.consejo || [];
  const cl = $('#consejoList');
  cl.innerHTML = C.map(([f, n, r, b, id], i) => `<li${EI(id, 'tf_persona')}><button class="mb" type="button" data-i="${i}" aria-haspopup="dialog"><div class="ft"${EF(id)}><img src="${f}" alt="${n}" loading="lazy"></div><h3><canvas class="pep" data-s="${i}" aria-hidden="true"></canvas><span${ED(id, 'titulo')}>${n}</span></h3><p${r.includes('. ') ? '' : ED(id, 'cargo')}>${r.split('. ').pop()}</p></button></li>`).join('');
  cl.querySelectorAll('.pep').forEach(cv => vigila(cv, () => pepBlanca(cv, +cv.dataset.s)));
  const dlg = $('#perfil'), pPep = $('#pPep');
  let cur = 0;
  const show = i => { cur = (i + C.length) % C.length; const [f, n, r, b] = C[cur]; $('#pFoto').src = f; $('#pFoto').alt = n; $('#pNombre').textContent = n; $('#pRol').textContent = r; $('#pBio').textContent = b; $('#pNum').textContent = `${cur + 1} de ${C.length}`; requestAnimationFrame(() => pepBlanca(pPep, cur)); };
  cl.addEventListener('click', e => { const b = e.target.closest('.mb'); if (!b) return; show(+b.dataset.i); dlg.showModal(); });
  $('#pAnt').addEventListener('click', () => show(cur - 1));
  $('#pSig').addEventListener('click', () => show(cur + 1));
  $('#pX').addEventListener('click', () => dlg.close());
  dlg.addEventListener('click', e => { if (e.target === dlg) dlg.close(); });
  dlg.addEventListener('keydown', e => { if (e.key === 'ArrowRight') show(cur + 1); if (e.key === 'ArrowLeft') show(cur - 1); });

  /* legal */
  const lg = $('#legal');
  const tab = t => { lg.querySelectorAll('[data-tab]').forEach(b => b.setAttribute('aria-selected', b.dataset.tab === t)); lg.querySelectorAll('[data-pan]').forEach(p => p.hidden = p.dataset.pan !== t); };
  document.addEventListener('click', e => { const b = e.target.closest('[data-legal]'); if (b) { e.preventDefault(); tab(b.dataset.legal); if (!lg.open) lg.showModal(); } const t = e.target.closest('[data-tab]'); if (t) tab(t.dataset.tab); });
  $('#legalX').addEventListener('click', () => lg.close());
  lg.addEventListener('click', e => { if (e.target === lg) lg.close(); });

  /* 5 · hablemos: primero el correo, luego quién eres */
  const hf = $('#hform'), s1 = $('#h1s'), s2 = $('#h2s'), s3 = $('#h3s'), err = $('#herr');
  let paso = 1;
  hf.addEventListener('submit', e => {
    e.preventDefault(); err.textContent = '';
    if (paso === 1) { const c = $('#h-correo').value.trim(); if (!/^\S+@\S+\.\S+$/.test(c)) { err.textContent = 'Escribe un correo válido.'; return; } s1.hidden = true; s2.hidden = false; paso = 2; $('#h-nombre').focus({ preventScroll: true }); return; }
    if (!$('#h-ok').checked) { err.textContent = 'Necesitamos que aceptes la política de privacidad.'; return; }
    const n = $('#h-nombre').value.trim();
    hf.style.minHeight = hf.offsetHeight + 'px'; s2.hidden = true; s3.hidden = false;
    $('#hT').textContent = n ? `Gracias, ${n}.` : 'Gracias.';
    TF.enviar('hablemos', TF.leer(hf));
  });
  const top = $('#top'); const linea = () => top.classList.toggle('baja', scrollY > 8); addEventListener('scroll', linea, { passive: true }); linea();
  /* La Frontera: entrar con un enlace al correo */
  (() => { const d = document.getElementById('entrar'); if (!d) return; document.addEventListener('click', e => { if (e.target.closest('[data-entrar]')) { e.preventDefault(); document.getElementById('entA').hidden = false; document.getElementById('entB').hidden = true; document.getElementById('entE').textContent = ''; d.showModal(); } if (e.target.closest('[data-cierra-entrar]')) d.close(); if (e.target.closest('#entrar [data-cierra]')) d.close(); }); d.addEventListener('click', e => { if (e.target === d) d.close(); }); document.getElementById('entF').addEventListener('submit', e => { e.preventDefault(); const c = document.getElementById('entC').value.trim(); if (!/^\S+@\S+\.\S+$/.test(c)) { document.getElementById('entE').textContent = 'Escribe un correo válido.'; return; } document.getElementById('entBp').textContent = `Te escribiremos a ${c} en cuanto abramos La Frontera.`; TF.enviar('la-frontera', { correo: c }); document.getElementById('entA').hidden = true; document.getElementById('entB').hidden = false; }); })();
  document.documentElement.dataset.done = 1;
})();
</script>
<?php wp_footer(); ?>
</body>
</html>
