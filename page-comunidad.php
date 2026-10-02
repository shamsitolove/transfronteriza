<?php if (!defined('ABSPATH')) exit; ?><!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
<meta name="color-scheme" content="light">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Funnel+Display:wght@400;500&family=Host+Grotesk:wght@400;500&display=swap">
<style>
:root{--mbg:var(--teja);--mtx:var(--tinta);--mln:rgba(31,27,45,.12);--mac:var(--fuego);
  --papel:#F5EEDF;--lino:#ECE4D3;--teja:#ECC6AC;--tinta:#1F1B2D;--tinta-2:rgba(31,27,45,.66);--tinta-3:rgba(31,27,45,.42);--linea:rgba(31,27,45,.12);
  --oro:#F2B233;--fuego:#E2592A;
  --disp:"Funnel Display","Host Grotesk",system-ui,sans-serif;--text:"Host Grotesk",system-ui,-apple-system,"Segoe UI",sans-serif;
  --gut:clamp(16px,4vw,56px);--max:1280px;--hh:76px;--ease:cubic-bezier(.2,.7,.2,1);
  --grano:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='200' height='200'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 .5  0 0 0 0 .45  0 0 0 0 .4  0 0 0 .55 0'/></filter><rect width='200' height='200' filter='url(%23n)'/></svg>");
}
*{box-sizing:border-box}
[id]{scroll-margin-top:calc(var(--hh) + 20px)}

[hidden]{display:none!important}
body{margin:0;background:var(--lino);color:var(--tinta);font:400 17px/1.55 var(--text);-webkit-font-smoothing:antialiased;overflow-x:clip}
img,video{display:block;max-width:100%}
a{color:inherit;text-decoration:none}
button{font:inherit;color:inherit;background:none;border:0;padding:0;cursor:pointer}
h1,h2,h3,h4,p,figure,ol,ul,blockquote{margin:0}
ol,ul{padding:0;list-style:none}
h1,h2,h3,h4{font-family:var(--disp);font-weight:500;letter-spacing:-.025em;text-wrap:balance}
:focus-visible{outline:2px solid var(--fuego);outline-offset:3px;border-radius:4px}
.in{max-width:var(--max);margin-inline:auto;padding-inline:var(--gut)}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:10px;border-radius:999px;padding:15px 26px;font:500 15.5px/1 var(--text);white-space:nowrap;transition:transform .3s var(--ease),background-color .3s,color .3s,box-shadow .3s}
.btn:hover{transform:translateY(-1px)}
.btn.p{background:var(--tinta);color:var(--papel)}
.btn.g{background:var(--oro);color:var(--tinta)}
.btn.l{box-shadow:inset 0 0 0 1px rgba(31,27,45,.3)}
.btn.l:hover{box-shadow:inset 0 0 0 1px var(--tinta)}
.enl{font-weight:500;text-decoration:underline;text-underline-offset:4px;text-decoration-thickness:1px}
.sec{padding-block:clamp(88px,10vw,150px)}
.sec-h{margin-bottom:clamp(32px,4vw,52px)}
.sec-h h2{font-size:clamp(44px,5.6vw,88px);line-height:.94;letter-spacing:-.04em}
.sec-h p{margin-top:16px;color:var(--tinta-2);font-size:clamp(17px,1.35vw,20px);max-width:44ch}

/* ---------- cabecera: la línea aparece al bajar ---------- */
.top{position:fixed;inset:0 0 auto 0;z-index:30;height:var(--hh);background:rgba(236,228,211,.9);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-bottom:1px solid transparent;transition:border-color .3s}
.top.baja{border-bottom-color:var(--linea)}
.top .row{height:100%;display:flex;align-items:center;gap:28px;padding-inline:var(--gut)}
.top .logo img{height:24px;width:auto}
.top nav{display:flex;align-items:center;gap:28px;margin-left:auto;font-size:15.5px}
.top nav a:not(.btn){color:var(--tinta-2);transition:color .2s}
.top nav a:not(.btn):hover,.top nav a[aria-current]{color:var(--tinta)}
.top .btn{padding:12px 20px;font-size:14.5px}

/* ---------- 1 · vídeo de ambiente ---------- */
.open{padding:calc(var(--hh) + 14px) var(--gut) 0}
.open .fr{position:relative;height:calc(100vh - var(--hh) - 28px);height:calc(100svh - var(--hh) - 28px);min-height:520px;border-radius:6px;overflow:hidden;background:#15131e}
.open video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.open .fr::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(15,12,24,.1),rgba(15,12,24,0) 40%,rgba(15,12,24,.55))}
.open .t{position:absolute;z-index:2;left:clamp(24px,4vw,64px);right:clamp(24px,4vw,64px);bottom:clamp(28px,5vw,64px);color:var(--papel)}
.open h1{font-size:clamp(60px,9vw,150px);line-height:.84;letter-spacing:-.055em}
.open p{margin-top:18px;font-size:clamp(19px,1.8vw,26px);line-height:1.3;max-width:24ch;opacity:.92}

/* ---------- 2 · tres perfiles ---------- */
.tres{position:relative;display:flex;gap:6px;height:min(76vh,700px);border-radius:6px;overflow:hidden;background:var(--tinta)}
.perfil{position:relative;flex:1;min-width:0;overflow:hidden;text-align:left;transition:flex .8s var(--ease),height .8s var(--ease)}
.perfil img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;transition:transform 1.4s var(--ease)}
.tres:not(.abierto) .perfil:hover{flex:1.35}
.tres:not(.abierto) .perfil:hover img{transform:scale(1.04)}
.perfil::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(15,12,24,0) 45%,rgba(15,12,24,.75))}
.perfil.on::after{background:linear-gradient(180deg,rgba(15,12,24,.05) 15%,rgba(15,12,24,.55) 55%,rgba(15,12,24,.85))}
.perfil .nom{position:absolute;z-index:2;left:22px;right:22px;bottom:22px;color:var(--papel);display:flex;justify-content:space-between;align-items:flex-end;gap:12px}
.perfil .nom b{display:block;font:500 clamp(26px,2.4vw,36px)/1 var(--disp);letter-spacing:-.03em}
.perfil .nom small{display:block;margin-top:6px;font-size:15px;opacity:.85}
.perfil .nom i{flex:none;width:52px;height:52px;border-radius:50%;display:grid;place-items:center;box-shadow:inset 0 0 0 1.5px rgba(245,238,223,.8);font-style:normal}
.tres.abierto .perfil{flex:0}
.tres.abierto .perfil.on{flex:1}
.perfil.on img{animation:kb 16s linear forwards}
@keyframes kb{from{transform:scale(1)}to{transform:scale(1.12)}}
.perfil .sub{position:absolute;z-index:3;left:clamp(24px,5vw,72px);right:clamp(24px,5vw,72px);bottom:clamp(96px,10vw,124px);color:var(--papel);font:500 clamp(24px,2.8vw,42px)/1.18 var(--disp);letter-spacing:-.02em;max-width:26ch;opacity:0;transition:opacity .6s .5s}
.perfil.on .sub{opacity:1}
.perfil .sub span{opacity:.18;transition:opacity .5s}
.perfil .sub span.v{opacity:1}
.perfil.on .nom i{display:none}
.perfil .vid{position:absolute;inset:0;z-index:4;width:100%;height:100%;object-fit:cover;background:#000}
.vm{position:absolute;inset:0;z-index:4;overflow:hidden;background:#000}
.vm iframe{position:absolute;border:0}
.cerrarP{position:absolute;z-index:6;top:18px;right:18px;width:46px;height:46px;border-radius:50%;background:rgba(15,12,24,.45);color:var(--papel);font-size:22px;opacity:0;pointer-events:none;transition:opacity .4s .4s}
.tres.abierto .cerrarP{opacity:1;pointer-events:auto}
.barraP{position:absolute;z-index:6;left:0;right:0;bottom:0;height:3px;background:rgba(245,238,223,.2);opacity:0}
.tres.abierto .barraP{opacity:1}
.barraP b{display:block;height:100%;width:0;background:var(--oro)}

/* ---------- 3 · encuéntrate ---------- */
.enc{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:clamp(14px,2vw,28px)}
.ir{position:relative;display:flex;flex-direction:column;width:100%;text-align:left;border-radius:6px;overflow:hidden;background:var(--papel);transition:transform .45s var(--ease),box-shadow .45s}
.ir:hover{transform:translateY(-4px);box-shadow:0 20px 44px rgba(31,27,45,.12)}
.ir .ft{aspect-ratio:4/3;overflow:hidden;background:var(--tinta)}
.ir .ft img{width:100%;height:100%;object-fit:cover;transition:transform 1.2s var(--ease)}
.ir:hover .ft img{transform:scale(1.05)}
.ir .tx{padding:clamp(20px,2.4vw,30px)}
.ir h3{font-size:clamp(28px,2.6vw,40px);line-height:1;letter-spacing:-.035em}
.ir p{margin-top:12px;color:var(--tinta-2);font-size:16.5px}
.mini{position:relative;height:100%;padding:18px;display:flex;flex-direction:column;gap:8px;justify-content:center;background:var(--lino)}
.mini .b{max-width:82%;padding:10px 14px;border-radius:14px 14px 14px 4px;background:#fff;font-size:13.5px;line-height:1.35}
.mini .b.r{align-self:flex-end;border-radius:14px 14px 4px 14px;background:var(--oro)}
.mini .b small{display:block;font-size:11.5px;color:var(--tinta-2);margin-bottom:2px}

/* ---------- 4 · encuentro anual ---------- */
.anual{display:grid;grid-template-columns:minmax(0,1.15fr) minmax(0,.85fr);gap:clamp(28px,5vw,80px);align-items:center}
.af{border-radius:6px;overflow:hidden;aspect-ratio:16/10}
.af img{width:100%;height:100%;object-fit:cover}
.at h2{font-size:clamp(44px,5.2vw,82px);line-height:.94;letter-spacing:-.045em}
.at .lead{margin-top:22px;font:400 clamp(19px,1.6vw,23px)/1.45 var(--disp);color:var(--tinta-2);max-width:32ch}
.at .cuenta{margin-top:24px;font-size:17px;line-height:1.5;color:var(--tinta);font-variant-numeric:tabular-nums}
.at .cuenta b{font-weight:500;color:var(--tinta)}
.at .acts{margin-top:28px;display:flex;gap:22px;flex-wrap:wrap;align-items:center}

/* ---------- 5 · haz comunidad en tu ciudad (globo del revés) ---------- */
.donde{display:grid;grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr);gap:clamp(24px,4vw,64px);align-items:center}
#ciudad{position:relative;isolation:isolate;overflow:hidden;max-width:none;min-height:88svh;margin:clamp(40px,5vw,80px) 0 clamp(88px,10vw,150px);padding:clamp(48px,5.5vw,88px) max(var(--gut),calc((100% - var(--max)) / 2 + var(--gut)));background:var(--teja)}
#ciudad::before{content:"";position:absolute;inset:0;z-index:0;background:radial-gradient(90% 70% at 70% 20%,rgba(245,238,223,.55),rgba(245,238,223,0) 60%),var(--grano);background-size:auto,200px;pointer-events:none}
#ciudad .sec-h{position:relative;z-index:1;margin-bottom:clamp(8px,1vw,16px)}
#ciudad .donde{align-items:start}
#ciudad .globo{z-index:0;max-width:none;width:140%;margin:2% 0 -34% -26%;animation:deriva 28s ease-in-out infinite alternate}
#ciudad .globo > .mar{box-shadow:0 40px 90px rgba(31,27,45,.4)}
#ciudad .panel{position:relative;z-index:1;margin-top:clamp(0px,2vw,28px)}
#ciudad .abre,#ciudad .ciuM{position:relative;z-index:1}
#ciudad .abre{box-shadow:0 30px 60px rgba(31,27,45,.25)}
@keyframes deriva{from{transform:translate(0,0) rotate(0deg)}to{transform:translate(2.5%,-1.5%) rotate(3deg)}}
@media (max-width:1000px){#ciudad .globo{width:124%;margin:0 -12% -26%}}
.globo{position:relative;aspect-ratio:1/1;max-width:640px;width:100%;justify-self:center}
.globo > img,.globo > .mar{position:absolute;inset:0;width:100%;height:100%}
.globo > .mar{border-radius:50%;box-shadow:0 30px 50px rgba(31,27,45,.2)}
.pun{position:absolute;translate:-50% -50%;font-size:13.5px;color:var(--tinta);white-space:nowrap;text-shadow:0 0 3px var(--papel),0 0 3px var(--papel),0 0 6px var(--papel),0 1px 0 var(--papel)}
.pun canvas{display:block;width:24px;height:24px;transition:transform .5s var(--ease)}
.pun.sede canvas{width:32px;height:32px}
.pun span{position:absolute;top:50%;left:calc(100% + 5px);translate:0 -50%}
.pun::before{content:"";position:absolute;inset:-12px}
.ciuM{display:none;margin-top:18px;gap:8px;overflow-x:auto;scrollbar-width:none;padding-bottom:4px}
.ciuM::-webkit-scrollbar{display:none}
.ciuM button{flex:none;padding:12px 16px;border-radius:999px;background:var(--papel);font-size:15px;color:var(--tinta-2)}
.ciuM button[aria-pressed=true]{background:var(--tinta);color:var(--papel)}
@media (max-width:1000px){.ciuM{display:flex}}
.pun.izq span{left:auto;right:calc(100% + 5px)}
.pun.arr span{left:50%;top:auto;bottom:calc(100% + 1px);translate:-50% 0}
.pun:hover canvas{transform:scale(1.2) rotate(30deg)}
.pun[aria-pressed=true]{color:var(--tinta);font-weight:500}
.pun[aria-pressed=true] canvas{transform:scale(1.3)}
.panel{border-radius:6px;overflow:hidden;background:var(--papel)}
.panel .pf{height:clamp(180px,32svh,360px);overflow:hidden}
.panel .pf img{width:100%;height:100%;object-fit:cover;animation:aparece .6s var(--ease)}
.panel .pt{padding:clamp(22px,2.6vw,32px)}
.panel h3{font-size:clamp(30px,2.8vw,42px);line-height:1}
.panel .txt{margin-top:10px;color:var(--tinta-2)}
.panel .btn{margin-top:20px}
.abre{margin-top:clamp(24px,3vw,36px);display:flex;justify-content:space-between;align-items:center;gap:20px;flex-wrap:wrap;padding:clamp(24px,3vw,36px);border-radius:6px;background:var(--tinta);color:var(--papel)}
.abre h3{font-size:clamp(28px,2.6vw,40px);line-height:1.02}
.abre p{margin-top:8px;color:rgba(245,238,223,.74);max-width:48ch}

/* ---------- 6 · la frontera ---------- */
.fron{display:grid;grid-template-columns:minmax(0,.85fr) minmax(0,1.15fr);gap:clamp(28px,5vw,80px);align-items:center}
.fron h2{font-size:clamp(44px,5.6vw,88px);line-height:.94;letter-spacing:-.04em}
.fron .frases{margin-top:26px;display:grid;gap:6px}
.fron .frases p{font:500 clamp(24px,2.3vw,34px)/1.12 var(--disp);letter-spacing:-.02em}
.fron .frases p:nth-child(2){color:var(--fuego)}
.fron .desc{margin-top:22px;color:var(--tinta-2);font-size:clamp(17px,1.35vw,19px);max-width:38ch}
.fron .acts{margin-top:28px}
.app{border-radius:14px;overflow:hidden;background:var(--papel);box-shadow:0 30px 70px rgba(31,27,45,.16);height:min(640px,78vh);display:flex;flex-direction:column}
.app .cab{display:flex;align-items:center;gap:12px;padding:16px 20px;background:#fff;border-bottom:1px solid var(--linea)}
.app .cab .marca{display:flex;align-items:center;gap:8px;font:500 16px/1 var(--disp);letter-spacing:-.02em;color:var(--tinta)}
.app .cab .marca svg{height:24px;width:24px;overflow:visible}
.fron .fsim{display:block;width:clamp(48px,4.8vw,72px);height:auto;overflow:visible;color:var(--tinta);margin-bottom:clamp(14px,1.6vw,22px)}
.app .cab .vol{display:none;font-size:15px;color:var(--tinta-2)}
.app.hilo .cab .vol{display:inline-flex}
.app.hilo .cab .marca{display:none}
.app .cab .anon{margin-left:auto;display:flex;align-items:center;gap:8px;font-size:13px;color:var(--tinta-2)}
.app .cuerpo{flex:1;overflow-y:auto;overscroll-behavior:contain}
.hl{display:block;width:100%;text-align:left;padding:20px 22px;transition:filter .2s}
.hl:nth-child(odd){background:#fff}
.hl:nth-child(even){background:var(--lino)}
.hl:hover{filter:brightness(.98)}
.quien{display:flex;align-items:center;gap:10px;font-size:13.5px;color:var(--tinta-2)}
.quien canvas{width:26px;height:26px;flex:none}
.hl h4{margin-top:10px;font-size:20px;line-height:1.2;letter-spacing:-.01em}
.hl .met{margin-top:10px;display:flex;gap:16px;font-size:13.5px;color:var(--tinta-2)}
.hl .met b{color:var(--tinta);font-weight:500}
.post{padding:22px;background:#fff}
.post h4{margin-top:12px;font-size:23px;line-height:1.15}
.post p:not(.quien){margin-top:10px;font-size:16px;line-height:1.55;color:rgba(31,27,45,.82)}
.amt{margin-top:16px;display:inline-flex;align-items:center;gap:8px;padding:9px 14px;border-radius:999px;box-shadow:inset 0 0 0 1px var(--linea);font-size:14px;transition:background-color .2s}
.amt[aria-pressed=true]{background:var(--oro);box-shadow:none}
.resp{padding:18px 22px}
.resp:nth-child(even){background:var(--lino)}
.resp:nth-child(odd){background:var(--papel)}
.resp p:not(.quien){margin-top:8px;font-size:15.5px;line-height:1.5;color:rgba(31,27,45,.82)}
.resp.nueva{animation:entra .5s var(--ease)}
@keyframes entra{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}
.escribe{display:flex;gap:8px;align-items:flex-end;padding:12px;background:#fff;border-top:1px solid var(--linea)}
.escribe textarea{flex:1;min-height:44px;max-height:120px;resize:none;border:0;border-radius:12px;background:var(--papel);color:var(--tinta);font:inherit;font-size:15px;padding:11px 14px;outline:0}
.escribe textarea::placeholder{color:var(--tinta-3)}
.escribe .btn{padding:12px 18px;font-size:14.5px}
.toggle{position:relative;width:34px;height:20px;border-radius:999px;background:var(--linea);transition:background-color .2s}
.toggle::after{content:"";position:absolute;top:3px;left:3px;width:14px;height:14px;border-radius:50%;background:var(--papel);transition:transform .2s}
.toggle[aria-checked=true]{background:var(--oro)}
.toggle[aria-checked=true]::after{transform:translateX(14px);background:var(--tinta)}

/* ---------- 7 · nuestra voz, en historias ---------- */
.tira{display:grid;grid-auto-flow:column;grid-auto-columns:clamp(150px,15vw,210px);gap:12px;overflow-x:auto;scroll-snap-type:x mandatory;padding-bottom:10px;scrollbar-width:none}
.tira::-webkit-scrollbar{display:none}
.ht{position:relative;aspect-ratio:9/16;border-radius:10px;overflow:hidden;scroll-snap-align:start;text-align:left;background:var(--tinta)}
.ht img,.ht video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;transition:transform 1.2s var(--ease)}
.ht:hover img,.ht:hover video{transform:scale(1.05)}
.ht .tx{position:absolute;inset:0;padding:18px 16px 48px;display:flex;align-items:center;color:var(--papel);font:500 17px/1.22 var(--disp);letter-spacing:-.01em}
.ht .pl{position:absolute;z-index:3;top:12px;right:12px;width:30px;height:30px;border-radius:50%;display:grid;place-items:center;font-size:11px;font-style:normal;color:var(--papel);box-shadow:inset 0 0 0 1.5px rgba(245,238,223,.8)}
.ht::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(15,12,24,0) 55%,rgba(15,12,24,.7))}
.ht span{position:absolute;z-index:2;left:12px;right:12px;bottom:12px;color:var(--papel);font:500 15px/1.2 var(--disp)}
.ht .anillo{position:absolute;z-index:3;inset:0;border-radius:10px;box-shadow:inset 0 0 0 2px transparent;transition:box-shadow .3s}
.ht:hover .anillo{box-shadow:inset 0 0 0 2px var(--oro)}
.cuentaV{margin-top:24px;display:flex;gap:16px;align-items:center;flex-wrap:wrap;color:var(--tinta-2)}
.story{position:fixed;inset:0;z-index:70;background:rgba(12,10,18,.95);display:grid;place-items:center;animation:aparece .35s var(--ease)}
@keyframes aparece{from{opacity:0}to{opacity:1}}
.story .cuadro{position:relative;height:min(86vh,860px);aspect-ratio:9/16;max-width:94vw;border-radius:10px;overflow:hidden;background:#000}
.story .cuadro > img,.story .cuadro > video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.story .cuadro > .vm{z-index:1}
.story .cuadro > .tx{position:absolute;inset:0;display:flex;align-items:center;padding:14%;background:var(--tinta);color:var(--papel);font:500 clamp(26px,3.4vh,38px)/1.18 var(--disp);letter-spacing:-.02em}
.story .cuadro::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(0,0,0,.45),rgba(0,0,0,0) 22%,rgba(0,0,0,0) 45%,rgba(0,0,0,.78));pointer-events:none}
.story .barras{position:absolute;z-index:3;top:12px;left:12px;right:12px;display:flex;gap:4px}
.story .barras i{flex:1;height:3px;border-radius:2px;background:rgba(255,255,255,.3);overflow:hidden}
.story .barras i b{display:block;height:100%;width:0;background:var(--papel)}
.story .quienS{position:absolute;z-index:3;top:26px;left:16px;color:var(--papel);font:500 16px/1 var(--disp)}
.story blockquote{position:absolute;z-index:3;left:22px;right:22px;bottom:30px;color:var(--papel);font:500 clamp(22px,2.6vh,30px)/1.22 var(--disp);letter-spacing:-.015em}
.story .zona{position:absolute;z-index:4;top:0;bottom:0;width:40%}
.story .zona.a{left:0}.story .zona.s{right:0}
.story .x{position:absolute;z-index:5;top:18px;right:18px;width:44px;height:44px;border-radius:50%;background:rgba(0,0,0,.35);color:var(--papel);font-size:22px}
.story .fl{position:absolute;z-index:5;top:50%;translate:0 -50%;width:48px;height:48px;border-radius:50%;box-shadow:inset 0 0 0 1px rgba(245,238,223,.4);color:var(--papel);font-size:20px}
.story .fl.a{left:max(16px,calc(50% - min(86vh,860px) * 9 / 32 - 72px))}
.story .fl.s{right:max(16px,calc(50% - min(86vh,860px) * 9 / 32 - 72px))}

/* ---------- 9 · manifiesto ---------- */
.comp{background:var(--papel)}
.comp .pasos{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:clamp(18px,2.4vw,36px)}
.comp .flujo{display:block;width:100%;margin:clamp(0px,.6vw,8px) 0 clamp(14px,1.8vw,26px);height:clamp(150px,17vw,250px);cursor:default;touch-action:pan-y}
.comp .pasos li{padding-top:18px;border-top:1px solid var(--linea)}
.comp .pasos h3{font-size:clamp(24px,2.2vw,34px);line-height:1.02;letter-spacing:-.03em}
.comp .pasos p{margin-top:12px;color:var(--tinta-2);font-size:16px;line-height:1.55}
.comp .pasos li:last-child h3{color:var(--fuego)}
.firma{margin-top:clamp(40px,4.6vw,64px);padding:clamp(22px,2.8vw,36px);border-radius:6px;background:var(--lino)}
.firma .ft{font:500 clamp(20px,1.8vw,26px)/1.2 var(--disp);letter-spacing:-.015em}
.firma .ok input{margin-top:5px;width:20px;height:20px}
.firma .campos{margin-top:14px;display:grid;grid-template-columns:minmax(0,1fr) minmax(0,1fr) auto;gap:10px}
.firma .campos input{padding:14px 16px;border-radius:999px;border:0;background:var(--papel);font:inherit;color:var(--tinta);min-width:0}
.firma .nota{margin-top:12px;font-size:14px;color:var(--tinta-2)}
.firma .nota button{text-decoration:underline;text-underline-offset:3px}
.firmado{margin-top:clamp(40px,4.6vw,64px);padding:clamp(22px,2.8vw,36px);border-radius:6px;background:var(--lino)}
.firmado h3{font-size:clamp(26px,2.6vw,38px);line-height:1.05;letter-spacing:-.03em}
.firmado p{margin-top:8px;color:var(--tinta-2)}
@media (max-width:1000px){.comp .pasos{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media (max-width:620px){.comp .pasos{grid-template-columns:minmax(0,1fr)}.firma .campos{grid-template-columns:minmax(0,1fr)}}

/* ---------- 8 · mecenas ---------- */
.mec{display:grid;grid-template-columns:minmax(0,1.1fr) minmax(0,.9fr);gap:clamp(24px,4vw,64px);align-items:start}
.mec .foto{border-radius:6px;overflow:hidden;aspect-ratio:3/2}
.mec .foto img{width:100%;height:100%;object-fit:cover;object-position:50% 28%}
.mec h2{margin-top:clamp(22px,2.6vw,34px);font-size:clamp(38px,4.4vw,68px);line-height:.98;letter-spacing:-.04em;max-width:16ch}
.mec .sub2{margin-top:16px;color:var(--tinta-2);font-size:clamp(17px,1.35vw,20px);max-width:44ch}
.tarjeta{position:sticky;top:calc(var(--hh) + 24px);border-radius:10px;background:var(--papel);padding:clamp(24px,3vw,36px);box-shadow:0 1px 2px rgba(31,27,45,.06),0 24px 60px rgba(31,27,45,.1);text-align:center}
.tarjeta h3{font-size:clamp(24px,2.1vw,30px);line-height:1.12}
.freq{margin-top:20px;display:flex;padding:4px;border-radius:999px;background:var(--lino)}
.freq button{flex:1;padding:10px 8px;border-radius:999px;font-size:14.5px;color:var(--tinta-2);transition:background-color .2s,color .2s}
.freq button[aria-pressed=true]{background:#fff;color:var(--tinta);box-shadow:0 1px 3px rgba(31,27,45,.12)}
.globoI{position:relative;display:inline-block;margin-top:22px;padding:11px 15px;border-radius:10px;background:var(--teja);font-size:15px;line-height:1.35;max-width:100%}
.globoI::after{content:"";position:absolute;left:var(--pico,50%);bottom:-7px;width:14px;height:14px;background:var(--teja);transform:translateX(-50%) rotate(45deg);border-radius:2px;transition:left .35s var(--ease)}
.cants{margin-top:14px;display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:10px}
.cants button{padding:18px 8px;border-radius:12px;background:#fff;box-shadow:inset 0 0 0 1px var(--linea);font:500 26px/1 var(--disp);letter-spacing:-.03em;transition:box-shadow .2s}
.cants button[aria-pressed=true]{box-shadow:inset 0 0 0 2px var(--tinta)}
.otra{margin-top:10px;font-size:14.5px;color:var(--tinta-2)}
.otra input{width:110px;margin-left:6px;border:0;border-radius:8px;background:#fff;box-shadow:inset 0 0 0 1px var(--linea);padding:8px 10px;font:inherit;color:var(--tinta);text-align:center}
.renta{margin-top:18px;font-size:15px;color:var(--tinta-2)}
.renta mark{background:var(--oro);color:var(--tinta);border-radius:6px;padding:2px 7px;font-weight:500}
.renta button{text-decoration:underline;text-underline-offset:3px;color:var(--tinta)}
.tarjeta > .btn{width:100%;margin-top:18px;padding:18px 24px;font-size:16.5px}
.porque{margin-top:clamp(48px,6vw,80px)}
.hace{margin-top:clamp(48px,6vw,80px)}
.hace h3{font-size:clamp(30px,3vw,46px);line-height:1.02;letter-spacing:-.035em}
.hace ul{margin-top:24px;display:grid;gap:14px}
.hace li{display:grid;grid-template-columns:160px 1fr;grid-template-rows:auto 1fr;column-gap:20px;align-items:start;padding:14px;border-radius:6px;background:var(--papel)}
.hace li img{grid-row:1/3;width:160px;aspect-ratio:4/3;object-fit:cover;border-radius:4px}
.hace li b{margin-top:6px;font:500 21px/1.15 var(--disp)}
.hace li span{margin-top:6px;color:var(--tinta-2);font-size:15.5px}
.barraM{position:fixed;left:12px;right:12px;bottom:calc(12px + env(safe-area-inset-bottom,0px));z-index:40;display:none}
@media (max-width:620px){.enl{display:inline-block;padding-block:11px}}
.barraM .btn{width:100%;padding:18px;font-size:16.5px;box-shadow:0 12px 30px rgba(31,27,45,.25)}
.plega summary{list-style:none;cursor:pointer;display:flex;align-items:center;justify-content:space-between;gap:16px}
.plega summary::-webkit-details-marker{display:none}
.plega summary::after{content:"+";flex:none;width:36px;height:36px;border-radius:50%;display:grid;place-items:center;box-shadow:inset 0 0 0 1px var(--linea);font:400 22px/1 var(--text);transition:transform .3s var(--ease)}
.plega[open] summary::after{transform:rotate(45deg)}
@media (max-width:620px){.barraM.on{display:block}.hace li{grid-template-columns:110px 1fr}.hace li img{width:110px}}
.porque h3,.trans h3{font-size:clamp(30px,3vw,46px);line-height:1.02;letter-spacing:-.035em}
.porque ul{margin-top:26px;display:grid;grid-template-columns:minmax(0,1fr);gap:clamp(14px,2vw,24px)}
.porque li{display:grid;grid-template-columns:minmax(120px,.4fr) 1fr;column-gap:22px;align-items:baseline;padding:24px;border-radius:6px;background:var(--papel)}
.porque li b{display:block;font:500 clamp(40px,4vw,60px)/.9 var(--disp);letter-spacing:-.045em}
.porque li p{margin-top:0;font-size:16.5px;line-height:1.45}
.porque li small{grid-column:2;display:block;margin-top:8px;font-size:13px;color:var(--tinta-3)}
.trans{margin-top:clamp(56px,7vw,96px)}
.trans .bar{margin-top:22px;display:flex;height:10px;border-radius:999px;overflow:hidden}
.trans ul{margin-top:22px;display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:clamp(12px,1.8vw,20px)}
.trans li{padding:22px;border-radius:6px;background:var(--papel)}
.trans li b{display:flex;align-items:center;gap:10px;font:500 clamp(34px,3.2vw,50px)/.9 var(--disp);letter-spacing:-.045em}
.trans li b i{flex:none;width:12px;height:12px;border-radius:50%}
.trans li span{display:block;margin-top:12px;font-size:16px}
.trans li small{display:block;margin-top:6px;font-size:14px;color:var(--tinta-2)}


/* ---------- el paso a paso, igual para todos los formularios ---------- */
.pasoapaso{position:fixed;inset:0;z-index:75;background:var(--papel);display:flex;flex-direction:column;animation:aparece .35s var(--ease)}
.pasoapaso .pb{height:4px;background:var(--lino)}
.pasoapaso .pb b{display:block;height:100%;width:0;background:var(--tinta);transition:width .5s var(--ease)}
.pasoapaso .x{position:absolute;top:18px;right:18px;z-index:3;width:44px;height:44px;border-radius:50%;box-shadow:inset 0 0 0 1px var(--linea);font-size:22px;background:var(--papel)}
.pasoapaso .caja{flex:1;display:grid;place-items:center;padding:24px;overflow-y:auto}
.pasoapaso form{width:min(540px,100%);animation:entra .45s var(--ease)}
.pasoapaso h3{font-size:clamp(30px,3.4vw,48px);line-height:1.02;letter-spacing:-.035em}
.pasoapaso .ay{margin-top:12px;color:var(--tinta-2);font-size:17px}
.pasoapaso input[type=text],.pasoapaso input[type=email]{width:100%;margin-top:26px;border:0;border-radius:12px;background:#fff;padding:18px;font:inherit;font-size:18px;color:var(--tinta);box-shadow:inset 0 0 0 1px var(--linea)}
.pasoapaso input[type=text]:focus,.pasoapaso input[type=email]:focus{outline:0;box-shadow:inset 0 0 0 2px var(--tinta)}
.pasoapaso .chips{margin-top:24px;display:flex;flex-wrap:wrap;gap:10px}
.pasoapaso .chips label{position:relative}
.pasoapaso .chips input{position:absolute;opacity:0;inset:0;cursor:pointer}
.pasoapaso .chips span{display:inline-block;border-radius:999px;padding:13px 18px;background:#fff;box-shadow:inset 0 0 0 1px var(--linea);font-size:16px;transition:background-color .2s,color .2s}
.pasoapaso .chips input:checked + span{background:var(--tinta);color:var(--papel);box-shadow:none}
.pasoapaso .chips input:focus-visible + span{outline:2px solid var(--fuego);outline-offset:2px}
.pasoapaso .res{margin-top:24px;padding:20px 22px;border-radius:12px;background:#fff;font-size:17px;line-height:1.5}
.pasoapaso .res b{font-weight:500}
.ok{display:flex;gap:10px;align-items:flex-start;font-size:14.5px;color:var(--tinta-2);margin-top:20px}
.ok input{margin-top:3px;accent-color:var(--tinta);width:17px;height:17px}
.ok button{text-decoration:underline;text-underline-offset:3px}
.err{font-size:14px;color:var(--fuego);min-height:1em;margin-top:10px}
.firma .err:empty{margin:0;min-height:0}
.pasoapaso .acts{margin-top:22px;display:flex;gap:18px;align-items:center}
.pasoapaso .acts .btn{padding:17px 30px}
.pasoapaso .atras{color:var(--tinta-2);font-weight:500}
.fin{width:min(960px,100%);border-radius:10px;overflow:hidden;background:#fff;animation:entra .5s var(--ease)}
.fin img{width:100%;aspect-ratio:16/8;object-fit:cover}
.fin div{padding:clamp(24px,3vw,40px)}
.fin p{margin-top:12px;color:var(--tinta-2);max-width:54ch}
.fin .btn{margin-top:22px}

/* ---------- ventanas ---------- */
dialog{border:0;padding:0;border-radius:10px;background:var(--papel);color:var(--tinta);width:min(620px,92vw);max-height:90vh;box-shadow:0 30px 90px rgba(31,27,45,.35)}
dialog::backdrop{background:rgba(31,27,45,.55);backdrop-filter:blur(3px);-webkit-backdrop-filter:blur(3px)}
.marco{position:relative;margin:14px;border:1px solid var(--linea);border-radius:6px;padding:clamp(26px,4vw,44px)}
.marco .x{position:absolute;top:18px;right:18px;width:44px;height:44px;border-radius:50%;box-shadow:inset 0 0 0 1px var(--linea);font-size:22px}
.marco h3{font-size:clamp(28px,3vw,38px);line-height:1.02;margin-right:52px}
.marco .dl{margin-top:12px;color:var(--tinta-2)}
dialog.legal{width:min(820px,92vw)}
dialog.verP{width:100%;max-width:none;height:100%;max-height:none;margin:0;border-radius:0;background:#0F0C18;color:var(--papel)}
dialog.verP::backdrop{background:#0F0C18}
.verP .marco{position:relative;min-height:100%;display:flex;flex-direction:column;justify-content:center;gap:24px;padding:76px var(--gut) calc(34px + env(safe-area-inset-bottom,0px))}
.verP .x{position:absolute;top:16px;right:16px;width:46px;height:46px;border-radius:50%;background:rgba(245,238,223,.14);color:var(--papel);font-size:22px}
.vv{position:relative;width:min(100%,calc(60vh * var(--r)));aspect-ratio:var(--r);margin-inline:auto;border-radius:8px;overflow:hidden;background:#000}
.vv iframe,.vv video{position:absolute;inset:0;width:100%;height:100%;border:0}
.verP .fp{width:min(100%,360px);aspect-ratio:4/5;object-fit:cover;border-radius:8px;margin-inline:auto}
.verP h3{font-size:34px;line-height:1;letter-spacing:-.03em}
.verP small{display:block;margin-top:6px;font-size:15px;opacity:.72}
.verP p{margin-top:14px;font:500 22px/1.25 var(--disp);letter-spacing:-.015em;max-width:30ch}
.legal .tabs{display:flex;gap:8px;flex-wrap:wrap;margin-right:56px}
.legal .tabs button{border-radius:999px;padding:10px 16px;font-size:14.5px;color:var(--tinta-2);box-shadow:inset 0 0 0 1px var(--linea)}
.legal .tabs button[aria-selected=true]{background:var(--tinta);color:var(--papel);box-shadow:none}
.legal .pan{margin-top:26px;max-width:62ch;color:var(--tinta-2);font-size:16px;line-height:1.65}
.legal .pan h3{color:var(--tinta);font-size:30px;margin-bottom:12px}
.legal .pan p + p{margin-top:12px}

/* ---------- pie ---------- */
.foot{background:var(--tinta);color:rgba(245,238,223,.7);padding-block:56px 30px;font-size:15px;border-top:1px solid rgba(245,238,223,.08)}
.foot .row{display:flex;justify-content:space-between;align-items:center;gap:24px;flex-wrap:wrap}
.foot .flogo{height:30px;width:auto}
.foot nav{display:flex;gap:28px;flex-wrap:wrap;align-items:center}
.foot nav a:hover,.foot .leg button:hover{color:var(--papel)}
.foot .leg{margin-top:36px;font-size:13px;color:rgba(245,238,223,.42);display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap}
.aviso{position:fixed;left:50%;bottom:28px;z-index:90;translate:-50% 0;padding:12px 20px;border-radius:999px;background:var(--tinta);color:var(--papel);font-size:15px;transition:opacity .3s,transform .3s}
.aviso:not(.on){opacity:0;transform:translateY(10px);pointer-events:none}

@media (max-width:1000px){
  .tres{height:auto;gap:10px;overflow-x:auto;scroll-snap-type:x mandatory;background:none;border-radius:0;margin-inline:calc(var(--gut) * -1);padding-inline:var(--gut);scroll-padding-inline:var(--gut);scrollbar-width:none}
  .tres::-webkit-scrollbar{display:none}
  .perfil{flex:none;width:min(76vw,360px);height:min(66vh,122vw);scroll-snap-align:start;border-radius:6px}
  .tres:not(.abierto) .perfil:hover{flex:none}
  .tres .barraP,.tres .cerrarP,.perfil .sub{display:none}
  .enc{grid-template-columns:minmax(0,1fr)}
  .anual,.donde,.fron,.mec{grid-template-columns:minmax(0,1fr)}
  .porque ul{grid-template-columns:minmax(0,1fr)}
  .trans ul{grid-template-columns:repeat(2,minmax(0,1fr))}
  .top nav a:not(.btn){display:none}
}
@media (max-width:620px){
  .open h1{font-size:clamp(44px,14vw,150px)}
  .pun{font-size:11.5px}.pun canvas{width:21px;height:21px}.pun.sede canvas{width:26px;height:26px}
  #frontera{padding-top:clamp(72px,18vw,110px)!important}
  .app{height:auto}.app .cuerpo{flex:none;overflow:visible}
  .pasoapaso .caja{place-items:start center;padding-top:88px}
  .tarjeta{position:static}
}
@media (prefers-reduced-motion:reduce){ *{transition:none!important;animation:none!important} .comp .st{position:relative;height:auto;padding-block:120px} .comp li h3{opacity:1} .comp li p{max-height:none;opacity:1;margin-top:12px} .comp .firma{opacity:1;pointer-events:auto} }
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
  <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Transfronteriza, inicio"><img src="<?php tf_img('i9aac151d2b', TF_U . '/logo/h-color-34.svg'); ?>" data-tf-img="i9aac151d2b" alt="Transfronteriza"></a>
  <nav aria-label="Principal"><a href="<?php echo esc_url(tf_pagina('comunidad')); ?>" aria-current="page" data-tf="t38114eb012"><?php tf_t('t38114eb012'); ?></a><a href="<?php echo esc_url(tf_pagina('futuros')); ?>" data-tf="tf6078594dd"><?php tf_t('tf6078594dd'); ?></a><a class="btn p" href="<?php echo esc_url(home_url('/')); ?>#descubre" data-tf="t3158ca410d"><?php tf_t('t3158ca410d'); ?></a><a class="lf" href="#" data-entrar aria-label="Entra en La Frontera" title="Entra en La Frontera"><svg class="xf" viewBox="0 0 48 48" aria-hidden="true"><path d="M9 8.5h16.5a6 6 0 0 1 6 6v7.5a6 6 0 0 1-6 6H17l-6.5 5.5V28H9a6 6 0 0 1-6-6v-7.5a6 6 0 0 1 6-6z" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linejoin="round"/><path d="M23 19h16a6 6 0 0 1 6 6v7a6 6 0 0 1-6 6h-1.5v5.5L31 38h-8a6 6 0 0 1-6-6v-7a6 6 0 0 1 6-6z" fill="#E2592A"/><circle class="punto" cx="41" cy="9" r="4.2" fill="#F2B233"/></svg></a></nav>
  <button class="mnu" type="button" aria-label="Abrir el menú" aria-expanded="false" aria-controls="mnuP"><i></i><i></i></button>
</div></header>
<div class="mnuP" id="mnuP" hidden><nav aria-label="Menú"><a href="<?php echo esc_url(tf_pagina('comunidad')); ?>" aria-current="page" data-tf="t38114eb012"><?php tf_t('t38114eb012'); ?></a><a href="<?php echo esc_url(tf_pagina('futuros')); ?>" data-tf="tf6078594dd"><?php tf_t('tf6078594dd'); ?></a><a href="#" data-entrar data-tf="t11905120cc"><?php tf_t('t11905120cc'); ?></a></nav><a class="btn p" href="<?php echo esc_url(home_url('/')); ?>#descubre" data-tf="t3158ca410d"><?php tf_t('t3158ca410d'); ?></a><a class="mail" href="mailto:hola@transfronteriza.net" data-tf="ta0aa22019a"><?php tf_t('ta0aa22019a'); ?></a></div>

<main>
  <!-- 1 · Vídeo de ambiente -->
  <section class="open" data-tf-sec="open">
    <div class="fr">
      <video autoplay muted loop playsinline preload="auto" poster="<?php echo TF_U; ?>/media/com/poster.jpg" aria-hidden="true"><source src="<?php tf_img('i21c20def39', TF_U . '/media/com/loop.mp4'); ?>" data-tf-vid="i21c20def39" type="video/mp4"></video>
      <div class="t"><h1 data-tf="teab953326c"><?php tf_t('teab953326c'); ?></h1><p data-tf="tf1fc0eda57"><?php tf_t('tf1fc0eda57'); ?></p></div>
    </div>
  </section>

  <!-- 2 · ¿Por qué transfronteriza? -->
  <section class="sec in" id="perfiles" data-tf-sec="perfiles" data-tf-panel="edit.php?post_type=tf_perfil" data-tf-panel-t="Editar los perfiles">
    <div class="sec-h"><h2 data-tf="te4988355d1"><?php tf_t('te4988355d1'); ?></h2></div>
    <div class="tres" id="tres"><button class="cerrarP" type="button" id="cerrarP" aria-label="Cerrar">×</button></div>
  </section>

  <!-- 3 · Encuéntrate -->
  <section class="sec in" id="encuentrate" style="padding-top:0" data-tf-sec="encuentrate">
    <div class="sec-h"><h2 data-tf="t77e400e1ea"><?php tf_t('t77e400e1ea'); ?></h2></div>
    <div class="enc">
      <a class="ir" href="#ciudad"><div class="ft"><img src="<?php tf_img('i286731a19a', TF_U . '/img/comunidad/selfie.jpg'); ?>" data-tf-img="i286731a19a" alt="Un grupo de amigas y amigos de la comunidad haciéndose un selfi." loading="lazy"></div><div class="tx"><h3 data-tf="t1d32738558"><?php tf_t('t1d32738558'); ?></h3><p data-tf="te06400a63f"><?php tf_t('te06400a63f'); ?></p></div></a>
      <a class="ir" href="#anual"><div class="ft"><img src="<?php tf_img('i952b93b01b', TF_U . '/img/comunidad/finca.jpg'); ?>" data-tf-img="i952b93b01b" alt="Dos jóvenes de la comunidad charlando en la finca." loading="lazy"></div><div class="tx"><h3 data-tf="t5339a3fd5d"><?php tf_t('t5339a3fd5d'); ?></h3><p data-tf="tef1552045d"><?php tf_t('tef1552045d'); ?></p></div></a>
      <a class="ir" href="#frontera"><div class="ft"><div class="mini" aria-hidden="true"><div class="b"><small data-tf="t50c163711d"><?php tf_t('t50c163711d'); ?></small>Awili, mis padres no quieren ni conocer a mi novio.</div><div class="b r">Tía, te leo y me veo. Tardaron, pero hoy lo quieren.</div><div class="b"><small data-tf="t7469b8d16b"><?php tf_t('t7469b8d16b'); ?></small>No tienes que decidirlo hoy, khti. Te escribo.</div></div></div><div class="tx"><h3 data-tf="tc7871d1ef2"><?php tf_t('tc7871d1ef2'); ?></h3><p data-tf="tb1ba90c2e8"><?php tf_t('tb1ba90c2e8'); ?></p></div></a>
    </div>
  </section>

  <!-- 4 · Encuentro anual -->
  <section class="in" id="anual" data-tf-sec="anual" data-tf-panel="admin.php?page=tf-ajustes" data-tf-panel-t="Editar el encuentro">
    <?php tf_encuentro_bloque(); ?>
  </section>

  <!-- 5 · Haz comunidad en tu ciudad -->
  <section class="sec in" id="ciudad" data-tf-sec="ciudad" data-tf-panel="edit.php?post_type=tf_ciudad" data-tf-panel-t="Editar las ciudades">
    <div class="sec-h"><h2 data-tf="t1ea3373dcc"><?php tf_t('t1ea3373dcc'); ?></h2></div>
    <div class="donde">
      <div class="globo" id="mapa"><canvas class="mar" id="mar" aria-hidden="true"></canvas><img src="<?php tf_img('ie346a3a2be', TF_U . '/img/globo.svg'); ?>" data-tf-img="ie346a3a2be" alt="Globo terráqueo del revés, con España y el norte de Marruecos a los dos lados del Estrecho."></div>
      <div class="panel" id="panel" aria-live="polite"></div>
    </div>
    <div class="abre"><div><h3 data-tf="te076ee9ab2"><?php tf_t('te076ee9ab2'); ?></h3><p data-tf="t7174103a32"><?php tf_t('t7174103a32'); ?></p></div><button class="btn g" type="button" data-flujo="abrir" data-tf="t03f61a4195"><?php tf_t('t03f61a4195'); ?></button></div>
  </section>

  <!-- 6 · La Frontera -->
  <section class="sec in" id="frontera" style="padding-top:0" data-tf-sec="frontera">
    <div class="fron">
      <div>
        <svg class="fsim" viewBox="0 0 48 48" aria-hidden="true"><path d="M9 8.5h16.5a6 6 0 0 1 6 6v7.5a6 6 0 0 1-6 6H17l-6.5 5.5V28H9a6 6 0 0 1-6-6v-7.5a6 6 0 0 1 6-6z" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linejoin="round"/><path d="M23 19h16a6 6 0 0 1 6 6v7a6 6 0 0 1-6 6h-1.5v5.5L31 38h-8a6 6 0 0 1-6-6v-7a6 6 0 0 1 6-6z" fill="#E2592A"/><circle cx="41" cy="9" r="4.2" fill="#F2B233"/></svg>
        <h2 data-tf="t4d20f5ee80"><?php tf_t('t4d20f5ee80'); ?></h2>
        <div class="frases"><p data-tf="tb39ee0fd33"><?php tf_t('tb39ee0fd33'); ?></p><p data-tf="t87765b2a56"><?php tf_t('t87765b2a56'); ?></p><p data-tf="t0871782f28"><?php tf_t('t0871782f28'); ?></p></div>
        <p class="desc" data-tf="t657d9dca65"><?php tf_t('t657d9dca65'); ?></p>
        <div class="acts"><a class="btn p" href="#" data-entrar data-tf="t93b479b511"><?php tf_t('t93b479b511'); ?></a></div>
      </div>
      <div class="app" id="app">
        <div class="cab"><span class="marca"><svg class="xf" viewBox="0 0 48 48" aria-hidden="true"><path d="M9 8.5h16.5a6 6 0 0 1 6 6v7.5a6 6 0 0 1-6 6H17l-6.5 5.5V28H9a6 6 0 0 1-6-6v-7.5a6 6 0 0 1 6-6z" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linejoin="round"/><path d="M23 19h16a6 6 0 0 1 6 6v7a6 6 0 0 1-6 6h-1.5v5.5L31 38h-8a6 6 0 0 1-6-6v-7a6 6 0 0 1 6-6z" fill="#E2592A"/><circle cx="41" cy="9" r="4.2" fill="#F2B233"/></svg>La Frontera</span><button class="vol" type="button" id="volver">← Hilos</button><span class="anon">Anónima<button class="toggle" type="button" role="switch" aria-checked="true" id="anon" aria-label="Escribir de forma anónima"></button></span></div>
        <div class="cuerpo" id="appCuerpo"></div>
        <form class="escribe" id="escribe" hidden><textarea id="texto" rows="1" placeholder="Escribe tu respuesta…" aria-label="Tu respuesta"></textarea><button class="btn g" type="submit" data-tf="t61b0418ae4"><?php tf_t('t61b0418ae4'); ?></button></form>
      </div>
    </div>
  </section>

  <!-- 7 · Nuestra voz -->
  <section class="sec in" id="voz" style="padding-top:0" data-tf-sec="voz" data-tf-panel="edit.php?post_type=tf_historia" data-tf-panel-t="Editar las historias">
    <div class="sec-h"><h2 data-tf="t88e602409c"><?php tf_t('t88e602409c'); ?></h2></div>
    <div class="tira" id="tira"></div>
    <div class="cuentaV"><span>Te escuchamos. Cruza la frontera y comparte tu historia con la comunidad.</span><a class="btn l" href="<?php echo esc_url(home_url('/')); ?>#descubre" data-tf="t2a6a43053d"><?php tf_t('t2a6a43053d'); ?></a></div>
  </section>

  <!-- 8 · Mecenas -->
  <section class="sec in" id="mecenas" style="padding-top:0" data-tf-sec="mecenas" data-tf-panel="admin.php?page=tf-ajustes" data-tf-panel-t="Editar mecenas">
    <div class="mec">
      <div>
        <?php tf_mecenas_intro(); ?>
    <div class="hace">
      <h3 data-tf="t359555dd0a"><?php tf_t('t359555dd0a'); ?></h3>
      <ul>
        <li><img src="<?php tf_img('i7ce0644753', TF_U . '/img/comunidad/anual.jpg'); ?>" data-tf-img="i7ce0644753" alt="" loading="lazy"><b>Que vengan al encuentro</b><span>Viaje, comida y cama para quien no puede pagarlo. Sin preguntas incómodas.</span></li>
        <li><img src="<?php tf_img('i89a8d716b8', TF_U . '/img/comunidad/circulos.jpg'); ?>" data-tf-img="i89a8d716b8" alt="" loading="lazy"><b>Que haya comunidad en su ciudad</b><span>Un sitio donde quedar cada mes y alguien que acompaña.</span></li>
        <li><img src="<?php tf_img('iae296f3456', TF_U . '/img/papers/informe.jpg'); ?>" data-tf-img="iae296f3456" alt="" loading="lazy"><b>Que su voz llegue a quien decide</b><span>La investigación de Futuros, hecha con ellas y no sobre ellas.</span></li>
      </ul>
    </div>
    <?php tf_mecenas_datos(); ?>
      </div>
      <div class="tarjeta">
        <h3 data-tf="t1083615eb3"><?php tf_t('t1083615eb3'); ?></h3>
        <div class="freq" role="group" aria-label="Frecuencia"><button type="button" data-f="mes" aria-pressed="true" data-tf="t4eddab113d"><?php tf_t('t4eddab113d'); ?></button><button type="button" data-f="ano" aria-pressed="false" data-tf="tf357aec0c8"><?php tf_t('tf357aec0c8'); ?></button><button type="button" data-f="vez" aria-pressed="false" data-tf="t20115a4f28"><?php tf_t('t20115a4f28'); ?></button></div>
        <div class="globoI" id="globoI"></div>
        <div class="cants" id="cants" role="group" aria-label="Cantidad"></div>
        <p class="otra"><label>Otra cantidad<input type="number" min="5" step="1" id="otra" placeholder="€"></label></p>
        <p class="renta" id="renta"></p>
        <button class="btn g" type="button" id="donar"></button>
      </div>
    </div>
  </section>

  <!-- 9 · Manifiesto transfronterizo -->
  <section class="comp" id="manifiesto" data-tf-sec="manifiesto"><div class="sec in">
    <div class="sec-h"><h2 data-tf="tb9e1342531"><?php tf_t('tb9e1342531'); ?></h2></div>
    <canvas class="flujo" id="flujo" aria-hidden="true"></canvas>
    <ol class="pasos" id="compLista">
      <li><h3 data-tf="td261170dcd"><?php tf_t('td261170dcd'); ?></h3><p data-tf="t5169535bd5"><?php tf_t('t5169535bd5'); ?></p></li>
      <li><h3 data-tf="tee6ad3ee3d"><?php tf_t('tee6ad3ee3d'); ?></h3><p data-tf="t664bc9d2bc"><?php tf_t('t664bc9d2bc'); ?></p></li>
      <li><h3 data-tf="t063752a9e4"><?php tf_t('t063752a9e4'); ?></h3><p data-tf="t4474ade354"><?php tf_t('t4474ade354'); ?></p></li>
      <li><h3 data-tf="t653ede66ef"><?php tf_t('t653ede66ef'); ?></h3><p data-tf="tc728d2e62a"><?php tf_t('tc728d2e62a'); ?></p></li>
    </ol>
    <form class="firma" id="firma" novalidate>
      <p class="ft" data-tf="t4253a33e70"><?php tf_t('t4253a33e70'); ?></p>
      <div class="campos"><input type="text" id="firma-nombre" autocomplete="name" placeholder="Tu nombre" aria-label="Tu nombre"><input type="email" id="firma-correo" autocomplete="email" placeholder="Tu correo" aria-label="Tu correo"><button class="btn p" type="submit" data-tf="t01c868dc9d"><?php tf_t('t01c868dc9d'); ?></button></div>
      <p class="nota">Al firmar aceptas la <button type="button" data-legal="privacidad" data-tf="tc8f28f06dd"><?php tf_t('tc8f28f06dd'); ?></button>. Te escribiremos de vez en cuando para contarte lo que hacemos.</p>
      <p class="err" id="firmaE" role="alert"></p>
    </form>
    <div class="firmado" id="firmado" hidden><h3 id="firmadoT"></h3><p data-tf="ta2b25ebbde"><?php tf_t('ta2b25ebbde'); ?></p></div>
  </div></section>
</main>

<footer class="foot"><div class="in">
  <div class="row"><img class="flogo" src="<?php tf_img('ia8745bc028', TF_U . '/logo/h-oscuro-34.svg'); ?>" data-tf-img="ia8745bc028" alt="Transfronteriza"><nav aria-label="Pie"><a href="<?php echo esc_url(tf_pagina('comunidad')); ?>" data-tf="t38114eb012"><?php tf_t('t38114eb012'); ?></a><a href="<?php echo esc_url(tf_pagina('futuros')); ?>" data-tf="tf6078594dd"><?php tf_t('tf6078594dd'); ?></a><a href="<?php echo esc_url(home_url('/')); ?>#descubre" data-tf="t3158ca410d"><?php tf_t('t3158ca410d'); ?></a><a href="mailto:hola@transfronteriza.net" data-tf="ta0aa22019a"><?php tf_t('ta0aa22019a'); ?></a></nav></div>
  <div class="leg"><span>© 2026 Asociación Juvenil Transfronteriza</span><span><button type="button" data-legal="aviso" data-tf="t2a27eb438d"><?php tf_t('t2a27eb438d'); ?></button> · <button type="button" data-legal="privacidad" data-tf="tcd9bcb9fd2"><?php tf_t('tcd9bcb9fd2'); ?></button> · <button type="button" data-legal="cookies" data-tf="t53614378a5"><?php tf_t('t53614378a5'); ?></button></span></div>
</div></footer>

<!-- el paso a paso de todos los formularios -->
<div class="pasoapaso" id="paso" role="dialog" aria-modal="true" aria-labelledby="pasoT" hidden>
  <div class="pb"><b id="pb"></b></div>
  <button class="x" type="button" id="pasoX" aria-label="Cerrar">×</button>
  <div class="caja" id="pasoCaja"></div>
</div>

<dialog id="saber" aria-labelledby="sbT"><div class="marco"><button class="x" type="button" data-cierra aria-label="Cerrar">×</button><h3 id="sbT">Lo que te devuelve Hacienda</h3><p class="dl" data-tf="t3990a76c65"><?php tf_t('t3990a76c65'); ?></p><p class="dl" data-tf="t0fbba0559e"><?php tf_t('t0fbba0559e'); ?></p></div></dialog>

<dialog class="verP" id="verP" aria-labelledby="vpN"><div class="marco"><button class="x" type="button" data-cierra aria-label="Cerrar">×</button><div id="vpM"></div><div class="vt"><h3 id="vpN"></h3><small id="vpR"></small><p id="vpQ"></p></div></div></dialog>
<dialog class="legal" id="legal" aria-label="Información legal">
  <div class="marco">
    <div class="tabs" role="tablist"><button type="button" role="tab" data-tab="aviso" data-tf="t2a27eb438d"><?php tf_t('t2a27eb438d'); ?></button><button type="button" role="tab" data-tab="privacidad" data-tf="tcd9bcb9fd2"><?php tf_t('tcd9bcb9fd2'); ?></button><button type="button" role="tab" data-tab="cookies" data-tf="t53614378a5"><?php tf_t('t53614378a5'); ?></button></div>
    <div class="pan" data-pan="aviso"><h3 data-tf="tb746b8f804"><?php tf_t('tb746b8f804'); ?></h3><p data-tf="t72a4100e93"><?php tf_t('t72a4100e93'); ?></p><p data-tf="t48b9f9d455"><?php tf_t('t48b9f9d455'); ?></p></div>
    <div class="pan" data-pan="privacidad" hidden><h3 data-tf="t48532db43b"><?php tf_t('t48532db43b'); ?></h3><p data-tf="t2305d32623"><?php tf_t('t2305d32623'); ?></p><p data-tf="t9d528350e7"><?php tf_t('t9d528350e7'); ?></p><p data-tf="tddb282a99c"><?php tf_t('tddb282a99c'); ?></p><p data-tf="t9f2bf10e65"><?php tf_t('t9f2bf10e65'); ?></p><p data-tf="t166c9b82c7"><?php tf_t('t166c9b82c7'); ?></p><p data-tf="te6be6faa4e"><?php tf_t('te6be6faa4e'); ?></p><p data-tf="t6e74bf0644"><?php tf_t('t6e74bf0644'); ?></p><p data-tf="td9a36501db"><?php tf_t('td9a36501db'); ?></p></div>
    <div class="pan" data-pan="cookies" hidden><h3 data-tf="t9d768186f8"><?php tf_t('t9d768186f8'); ?></h3><p data-tf="t54e3f07ee2"><?php tf_t('t54e3f07ee2'); ?></p><p data-tf="t514e195734"><?php tf_t('t514e195734'); ?></p></div>
    <button class="x" type="button" data-cierra aria-label="Cerrar">×</button>
  </div>
</dialog>

<div class="story" id="story" role="dialog" aria-modal="true" aria-label="Nuestra voz" hidden>
  <button class="fl a" type="button" id="sAnt" aria-label="Anterior">←</button>
  <div class="cuadro" id="sCuadro">
    <div class="barras" id="sBar"></div>
    <p class="quienS" id="sQuien"></p>
    <blockquote id="sCita"></blockquote>
    <button class="zona a" type="button" id="sZa" aria-label="Anterior"></button><button class="zona s" type="button" id="sZs" aria-label="Siguiente"></button>
    <button class="x" type="button" id="sX" aria-label="Cerrar">×</button>
  </div>
  <button class="fl s" type="button" id="sSig" aria-label="Siguiente">→</button>
</div>
<dialog class="entrar" id="entrar" aria-labelledby="entT"><div class="marco"><button class="x" type="button" data-cierra aria-label="Cerrar">×</button><svg class="xf" viewBox="0 0 48 48" aria-hidden="true"><path d="M9 8.5h16.5a6 6 0 0 1 6 6v7.5a6 6 0 0 1-6 6H17l-6.5 5.5V28H9a6 6 0 0 1-6-6v-7.5a6 6 0 0 1 6-6z" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linejoin="round"/><path d="M23 19h16a6 6 0 0 1 6 6v7a6 6 0 0 1-6 6h-1.5v5.5L31 38h-8a6 6 0 0 1-6-6v-7a6 6 0 0 1 6-6z" fill="#E2592A"/><circle class="punto" cx="41" cy="9" r="4.2" fill="#F2B233"/></svg><div id="entA"><h3 id="entT">Entra en La Frontera</h3><p data-tf="t9834a96e12"><?php tf_t('t9834a96e12'); ?></p><form id="entF" novalidate><input type="email" id="entC" placeholder="Tu correo" autocomplete="email" aria-label="Tu correo"><p class="err" id="entE" role="alert"></p><button class="btn p" type="submit" data-tf="t17c8912d40"><?php tf_t('t17c8912d40'); ?></button></form><p class="nueva">¿Aún no eres parte? <a href="<?php echo esc_url(home_url('/')); ?>#descubre" data-cierra-entrar data-tf="t3158ca410d"><?php tf_t('t3158ca410d'); ?></a></p></div><div id="entB" hidden><h3 data-tf="tb94238ba26"><?php tf_t('tb94238ba26'); ?></h3><p id="entBp"></p></div></div></dialog>
<div class="barraM" id="barraM"><button class="btn g" type="button" id="donarM"></button></div>
<div class="aviso" id="aviso" role="status"></div>

<?php tf_script_base(tf_datos_comunidad()); ?>
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
  const $ = s => document.querySelector(s);
  const esc = t => String(t).replace(/[<>&"]/g, c => ({ '<': '&lt;', '>': '&gt;', '&': '&amp;', '"': '&quot;' }[c]));
  const hx = h => [1, 3, 5].map(i => parseInt(h.slice(i, i + 2), 16));
  const mix = (a, b, t) => { const A = hx(a), B = hx(b); return '#' + A.map((v, i) => Math.round(v + (B[i] - v) * t).toString(16).padStart(2, '0')).join(''); };
  const rng = a => () => { a |= 0; a = a + 0x6D2B79F5 | 0; let t = Math.imul(a ^ a >>> 15, 1 | a); t = t + Math.imul(t ^ t >>> 7, 61 | t) ^ t; return ((t ^ t >>> 14) >>> 0) / 4294967296; };
  const setup = cv => { const w = cv.clientWidth, h = cv.clientHeight; cv.width = Math.max(1, Math.round(w * DPR)); cv.height = Math.max(1, Math.round(h * DPR)); const g = cv.getContext('2d'); g.setTransform(DPR, 0, 0, DPR, 0, 0); return [g, w, h]; };
  const seedAt = (g, x, y, rad, a, col, r) => {
    const p = new Path2D(), ca = Math.cos(a), sa = Math.sin(a);
    for (let k = 0; k <= 14; k++) { const b = k / 14 * TAU, q = 1 + (r() - .5) * .2, u = Math.cos(b) * rad * 1.1 * q, v = Math.sin(b) * rad * .9 * q; const px = x + u * ca - v * sa, py = y + u * sa + v * ca; k ? p.lineTo(px, py) : p.moveTo(px, py); }
    p.closePath(); g.fillStyle = col; g.fill(p);
    g.save(); g.clip(p); g.lineCap = 'round';
    for (let k = 0; k < 3; k++) { g.strokeStyle = r() < .55 ? '#FCE7AE' : mix(col, '#3A1A08', .28); g.globalAlpha = .22 + r() * .26; g.lineWidth = Math.max(.5, rad * (.12 + r() * .1)); const o = (r() - .5) * rad * 1.3; g.beginPath(); g.moveTo(x - ca * rad * 1.2 - sa * o, y - sa * rad * 1.2 + ca * o); g.lineTo(x + ca * rad * 1.2 - sa * o, y + sa * rad * 1.2 + ca * o); g.stroke(); }
    g.restore(); g.globalAlpha = 1;
  };
  const pinta = new Map(), ro = new ResizeObserver(es => es.forEach(e => { if (e.contentRect.width > 0) pinta.get(e.target)?.(); }));
  const vigila = (cv, fn) => { pinta.set(cv, fn); ro.observe(cv); };
  const pep = (cv, s) => vigila(cv, () => { const [g, w] = setup(cv), r = rng(s * 53 + 9); seedAt(g, w / 2, w / 2, w * .34, r() * TAU, mix('#E2592A', '#F2B233', .2 + r() * .7), r); });
  const aviso = (() => { let t; return m => { const a = $('#aviso'); a.textContent = m; a.classList.add('on'); clearTimeout(t); t = setTimeout(() => a.classList.remove('on'), 2400); }; })();
  const correoOk = c => /^\S+@\S+\.\S+$/.test(c);
  /* la devolución en la Renta solo se promete si somos entidad de utilidad pública (Ley 49/2002) */
  const DESGRAVA = !!(TF.mecenas && TF.mecenas.desgrava);
  const top = $('#top'); const linea = () => top.classList.toggle('baja', scrollY > 8); addEventListener('scroll', linea, { passive: true }); linea();

  /* ===== el paso a paso, igual para todos los formularios ===== */
  const paso = $('#paso'), caja = $('#pasoCaja');
  let F = null, datos = {}, pi = 0;
  const campo = st => {
    if (st.tipo === 'nombre') return `<input type="text" name="v" autocomplete="given-name" placeholder="Tu nombre" aria-label="Tu nombre" value="${esc(datos.nombre || '')}">`;
    if (st.tipo === 'correo') return `<input type="email" name="v" autocomplete="email" placeholder="Tu correo" aria-label="Tu correo" value="${esc(datos.correo || '')}">`;
    if (st.tipo === 'ciudad') return `<input type="text" name="v" autocomplete="address-level2" placeholder="Tu ciudad" aria-label="Tu ciudad" value="${esc(datos.ciudad || '')}">`;
    if (st.tipo === 'chips') return `<div class="chips">${st.op.map((o, i) => `<label><input type="${st.multi ? 'checkbox' : 'radio'}" name="v" value="${esc(o)}"${!st.multi && i === 0 ? ' checked' : ''}><span>${esc(o)}</span></label>`).join('')}</div>`;
    if (st.tipo === 'res') return `<p class="res">${st.html(datos)}</p>`;
    return '';
  };
  const pintaPaso = () => {
    const pasos = F.pasos, total = pasos.length + 1;
    $('#pb').style.width = ((pi + 1) / total * 100) + '%';
    if (pi >= pasos.length) { TF.enviar(F.id || 'comunidad', Object.fromEntries(Object.entries(datos).filter(([k, v]) => v && !['foto', 'resumen'].includes(k)))); const f = F.fin(datos); caja.innerHTML = `<div class="fin"><img src="${f.foto}" alt=""><div><h3 id="pasoT">${esc(f.t)}</h3><p>${esc(f.p)}</p><button class="btn p" type="button" id="pasoFin">Volver</button></div></div>`; $('#pasoFin').addEventListener('click', cierraPaso); return; }
    const st = pasos[pi], t = typeof st.t === 'function' ? st.t(datos) : st.t, ay = typeof st.ay === 'function' ? st.ay(datos) : st.ay;
    caja.innerHTML = `<form novalidate><h3 id="pasoT">${esc(t)}</h3>${ay ? `<p class="ay">${esc(ay)}</p>` : ''}${campo(st)}${st.consent ? `<label class="ok"><input type="checkbox" name="ok"><span>Acepto la <button type="button" data-legal="privacidad">política de privacidad</button>.${F.nota ? ' ' + esc(F.nota) : ''}</span></label>` : ''}<p class="err" role="alert"></p><div class="acts"><button class="btn p" type="submit">${pi === pasos.length - 1 ? esc(F.enviar || 'Enviar') : 'Siguiente'}</button>${pi ? '<button class="atras" type="button" data-atras>Atrás</button>' : ''}</div></form>`;
    const fm = caja.querySelector('form'), inp = fm.querySelector('input[type=text],input[type=email]');
    if (inp && !matchMedia('(pointer:coarse)').matches) setTimeout(() => inp.focus({ preventScroll: true }), 60);
    fm.addEventListener('submit', e => {
      e.preventDefault(); const er = fm.querySelector('.err');
      if (st.tipo === 'nombre') { const v = inp.value.trim(); if (!v) { er.textContent = 'Escribe tu nombre.'; return; } datos.nombre = v; }
      if (st.tipo === 'correo') { const v = inp.value.trim(); if (!correoOk(v)) { er.textContent = 'Escribe un correo válido.'; return; } datos.correo = v; }
      if (st.tipo === 'ciudad') { const v = inp.value.trim(); if (!v) { er.textContent = 'Escribe tu ciudad.'; return; } datos.ciudad = v; }
      if (st.tipo === 'chips') datos[st.clave || 'opcion'] = [...fm.querySelectorAll('input[name=v]:checked')].map(i => i.value);
      if (st.consent && !fm.querySelector('input[name=ok]').checked) { er.textContent = 'Necesitamos que aceptes la política de privacidad.'; return; }
      pi++; pintaPaso();
    });
    fm.querySelector('[data-atras]')?.addEventListener('click', () => { pi--; pintaPaso(); });
  };
  const abrePaso = (flujo, extra = {}) => { F = FLUJOS[flujo]; if (!F) return; F.id = flujo; datos = { ...extra, nombre: datos.nombre, correo: datos.correo }; pi = 0; paso.hidden = false; document.documentElement.style.overflow = 'hidden'; pintaPaso(); };
  const cierraPaso = () => { paso.hidden = true; document.documentElement.style.overflow = ''; };
  $('#pasoX').addEventListener('click', cierraPaso);
  document.addEventListener('keydown', e => { if (e.key === 'Escape' && !paso.hidden && !document.querySelector('dialog[open]')) cierraPaso(); });
  const NOMBRE = { tipo: 'nombre', t: '¡Empezamos por tu nombre!', ay: 'Así sabremos cómo llamarte.' };
  const CORREO = (consent) => ({ tipo: 'correo', t: d => `¿A qué correo te escribimos, ${d.nombre}?`, ay: 'Solo para esto. Nada de spam.', consent });
  const FLUJOS = {
    anual: { enviar: 'Guardadme sitio', pasos: [NOMBRE, CORREO(), { tipo: 'ciudad', t: '¿Desde dónde vendrías?', ay: 'Así organizamos los viajes compartidos.' }, { tipo: 'chips', clave: 'beca', t: '¿Te vendría bien una beca para venir?', ay: 'Las becas cubren viaje, comida y alojamiento. Sin preguntas incómodas.', op: ['Sí', 'Quizá', 'No, gracias'], consent: true }],
      fin: d => ({ foto: '<?php echo TF_U; ?>/img/comunidad/encuentros.jpg', t: `¡Te guardamos sitio, ${d.nombre}!`, p: 'Te escribimos en cuanto abran las plazas del encuentro de septiembre de 2027 en Jérez del Marquesado.' }) },
    aviso: { enviar: 'Avísame', pasos: [NOMBRE, CORREO(true)], fin: d => ({ foto: '<?php echo TF_U; ?>/img/comunidad/charla.jpg', t: `Hecho, ${d.nombre}.`, p: 'Serás de las primeras en saber cuándo abren las plazas del encuentro.' }) },
    ciudad: { enviar: 'Quiero ir', pasos: [NOMBRE, CORREO(), { tipo: 'chips', multi: true, clave: 'plan', t: d => `¿Qué te apetece hacer con la comunidad de ${d.ciudad}?`, ay: 'Marca todo lo que quieras.', op: ['Tomar algo', 'Pasear', 'Cocinar juntas', 'Hablar de lo nuestro', 'Hacer deporte'], consent: true }],
      fin: d => ({ foto: d.foto, t: `¡Te esperamos en ${d.ciudad}, ${d.nombre}!`, p: 'Te escribimos para presentarte a la comunidad y decirte cuándo es la próxima quedada.' }) },
    abrir: { enviar: 'Quiero abrirla', pasos: [NOMBRE, CORREO(), { tipo: 'ciudad', t: '¿En qué ciudad quieres abrirla?' }, { tipo: 'chips', clave: 'gente', t: '¿Cuánta gente conoces allí?', op: ['De momento, solo yo', 'Dos o tres personas', 'Un grupo'], consent: true }],
      fin: d => ({ foto: '<?php echo TF_U; ?>/img/comunidad/puerta.jpg', t: `¡Vamos a abrir comunidad en ${d.ciudad}!`, p: 'Te enviamos el método y los materiales, y alguien del equipo te acompaña en los primeros encuentros.' }) },
    mecenas: { enviar: 'Hazme mecenas', nota: DESGRAVA ? 'Para el certificado de la Renta te pediremos el DNI más adelante.' : '', pasos: [NOMBRE, CORREO(), { tipo: 'res', t: 'Revisa tu aportación', html: d => d.resumen, consent: true }],
      fin: d => ({ foto: '<?php echo TF_U; ?>/img/comunidad/sandia.jpg', t: `¡Gracias, ${d.nombre}!`, p: 'Te escribimos en unos días para completar tu aportación de forma segura. Cada año te contaremos a quién has acompañado.' }) }
  };
  document.addEventListener('click', e => { const b = e.target.closest('[data-flujo]'); if (b) abrePaso(b.dataset.flujo, b.dataset.ciudad ? { ciudad: b.dataset.ciudad, foto: b.dataset.foto } : {}); });

  /* vídeos de Vimeo: el reproductor oficial, recortado para llenar el cuadro como si fuera una foto */
  let apiV = null;
  const cargaV = () => apiV || (apiV = new Promise((ok, ko) => { const s = document.createElement('script'); s.src = 'https://cdn.jsdelivr.net/npm/@vimeo/player@2/dist/player.min.js'; s.onload = () => ok(window.Vimeo); s.onerror = ko; document.head.appendChild(s); }));
  const vimeo = (caja, P, { avance, fin } = {}) => {
    const d = document.createElement('div'), f = document.createElement('iframe'), R = P.vr || 16 / 9, fx = P.fx ?? .5;
    d.className = 'vm'; f.src = `https://player.vimeo.com/video/${P.vm}?autoplay=1&title=0&byline=0&portrait=0&controls=0&playsinline=1&dnt=1`; f.allow = 'autoplay; fullscreen; picture-in-picture'; f.title = P.n;
    d.appendChild(f); caja.prepend(d);
    const ajusta = () => { const w = caja.clientWidth, h = caja.clientHeight; let W = w, A = w / R; if (A < h) { A = h; W = h * R; } Object.assign(f.style, { width: W + 'px', height: A + 'px', left: (w - W) * fx + 'px', top: (h - A) / 2 + 'px' }); };
    ajusta(); const ro = new ResizeObserver(ajusta); ro.observe(caja);
    let pl = null; cargaV().then(V => { pl = new V.Player(f); if (avance) pl.on('timeupdate', e => avance(e.percent)); if (fin) pl.on('ended', fin); }).catch(() => {});
    return { quita: () => { ro.disconnect(); pl?.destroy?.().catch?.(() => {}); d.remove(); }, pausa: () => pl?.pause().catch(() => {}), sigue: () => pl?.play().catch(() => {}) };
  };

  /* ===== 2 · tres perfiles: con vídeo si lo hay; si no, retrato con su frase ===== */
  const PERF = TF.perfiles || [];
  const tres = $('#tres');
  tres.insertAdjacentHTML('afterbegin', PERF.map((p, i) => `<button class="perfil" type="button" data-i="${i}" aria-label="Escuchar a ${p.n}"${EI(p.id, 'tf_perfil')}><img src="${p.f}" alt="${p.n}"${EF(p.id)}><p class="sub">${p.q.split(' ').map(w => `<span>${w}</span>`).join(' ')}</p><span class="nom"><span><b${ED(p.id, 'titulo')}>${p.n}</b><small${ED(p.id, 'rol')}>${p.r}</small></span><i>▶</i></span></button>`).join(''));
  tres.insertAdjacentHTML('beforeend', '<div class="barraP"><b id="barraP"></b></div>');
  let tP = null, vivoP = null;
  const cierraP = () => { cancelAnimationFrame(tP); vivoP?.quita(); vivoP = null; tres.querySelectorAll('.vid').forEach(v => { v.pause(); v.remove(); }); tres.classList.remove('abierto'); tres.querySelectorAll('.perfil').forEach(p => { p.classList.remove('on'); p.querySelectorAll('.sub span').forEach(s => s.classList.remove('v')); }); $('#barraP').style.width = 0; };
  const abreP = i => {
    cierraP(); const el = tres.querySelector(`.perfil[data-i="${i}"]`), P = PERF[i]; tres.classList.add('abierto'); el.classList.add('on');
    if (innerWidth <= 1000) requestAnimationFrame(() => tres.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'start' }));
    if (P.vm) { vivoP = vimeo(el, P, { avance: p => $('#barraP').style.width = p * 100 + '%', fin: cierraP }); return; }
    if (P.v) { const v = document.createElement('video'); v.className = 'vid'; v.src = P.v; v.playsInline = true; el.appendChild(v); v.play().catch(() => {}); v.addEventListener('timeupdate', () => { $('#barraP').style.width = (v.currentTime / (v.duration || 1) * 100) + '%'; }); v.addEventListener('ended', cierraP); return; }
    const ws = [...el.querySelectorAll('.sub span')], D = Math.max(6000, ws.length * 420), t0 = performance.now();
    const pasoP = t => { const p = Math.min(1, (t - t0) / D); $('#barraP').style.width = p * 100 + '%'; const k = Math.ceil(Math.min(1, p * 1.25) * ws.length); ws.forEach((w, j) => w.classList.toggle('v', j < k)); if (p < 1) tP = requestAnimationFrame(pasoP); };
    tP = requestAnimationFrame(pasoP);
  };
  tres.addEventListener('click', e => { if (e.target.closest('#cerrarP')) { cierraP(); return; } const p = e.target.closest('.perfil'); if (!p || p.classList.contains('on')) return; if (innerWidth <= 1000) { verP(+p.dataset.i); return; } abreP(+p.dataset.i); });
  /* en el móvil, cada perfil se abre en su ventana: el vídeo entero, con sus controles, y su frase */
  const dvp = $('#verP'), vpM = $('#vpM');
  const verP = i => {
    const P = PERF[i];
    vpM.innerHTML = P.vm ? `<div class="vv" style="--r:${P.vr || 16 / 9}"><iframe src="https://player.vimeo.com/video/${P.vm}?autoplay=1&playsinline=1&title=0&byline=0&portrait=0&dnt=1" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="${esc(P.n)}"></iframe></div>`
      : P.v ? `<div class="vv" style="--r:${P.vr || 9 / 16}"><video src="${P.v}" controls playsinline autoplay></video></div>` : `<img class="fp" src="${P.f}" alt="${esc(P.n)}">`;
    $('#vpN').textContent = P.n; $('#vpR').textContent = P.r || ''; $('#vpQ').textContent = P.q ? `«${P.q}»` : '';
    dvp.showModal();
  };
  dvp.addEventListener('close', () => { vpM.innerHTML = ''; });

  /* ===== 4 · cuenta atrás, en una frase ===== */
  const pintaCuenta = () => {
    const ini = new Date(TF.encuentro.fecha), fin = new Date(ini.getTime() + 2 * 864e5), d = Math.ceil(Math.max(0, ini - Date.now()) / 864e5);
    const dia = f => f.getDate(), mes = f => f.toLocaleDateString('es-ES', { month: 'long' });
    const cuando = mes(ini) === mes(fin) ? `Del ${dia(ini)} al ${dia(fin)} de ${mes(fin)} de ${fin.getFullYear()}.` : `Del ${dia(ini)} de ${mes(ini)} al ${dia(fin)} de ${mes(fin)} de ${fin.getFullYear()}.`;
    $('#cuenta').innerHTML = `<b>${cuando}</b> ${d > 1 ? `Faltan ${d} días.` : d === 1 ? 'Es mañana.' : 'Ya estamos allí.'}`;
  };
  pintaCuenta();

  /* ===== 5 · el globo del revés, con la gente de cada ciudad ===== */
  const CIU = TF.ciudades || {};
  /* el mar: el zellige añil de la marca (espiga de azulejo esmaltado, junta de cal) y la luz que lo cruza despacio */
  const ANIL = ['#2F4FA8', '#294796', '#3657B3', '#223D85', '#3B5FBE', '#2B4A9F', '#4A6BC2', '#1E377A', '#3252AC', '#5575C6'];
  const zellige = (g, x0, y0, w, h, r, s, pal = ANIL, grout = '#E4DDCD') => {
    g.save(); g.fillStyle = grout; g.fillRect(x0, y0, w, h);
    const cw = s * 1.6, sp = s * .62, gap = Math.max(.8, s * .07);
    for (let k = 0, x = x0 - cw; x < x0 + w + cw; x += cw, k++) {
      const d = k % 2 ? 1 : -1, rise = d * cw * .55;
      for (let y = y0 - cw * 1.2; y < y0 + h + cw; y += sp) {
        const j = () => (r() - .5) * gap * .9, p = new Path2D();
        p.moveTo(x + gap / 2 + j(), y + gap / 2 + j()); p.lineTo(x + cw - gap / 2 + j(), y + rise + gap / 2 + j());
        p.lineTo(x + cw - gap / 2 + j(), y + rise + sp - gap / 2 + j()); p.lineTo(x + gap / 2 + j(), y + sp - gap / 2 + j()); p.closePath();
        g.fillStyle = pal[(r() * pal.length) | 0]; g.fill(p);
        const gr = g.createLinearGradient(x, y, x + cw, y + sp + rise);
        gr.addColorStop(0, 'rgba(255,255,255,' + (.1 + r() * .12) + ')'); gr.addColorStop(.45, 'rgba(255,255,255,0)'); gr.addColorStop(1, 'rgba(0,0,30,' + (.08 + r() * .1) + ')');
        g.fillStyle = gr; g.fill(p);
        if (r() < .35) { g.save(); g.clip(p); g.fillStyle = 'rgba(255,255,255,.18)'; g.beginPath(); g.ellipse(x + cw * (.2 + r() * .5), y + sp * .35 + rise * .4, cw * .18, sp * .12, Math.atan2(rise, cw), 0, TAU); g.fill(); g.restore(); }
      }
    }
    g.restore();
  };
  (() => {
    const cv = $('#mar'); if (!cv) return;
    let g, W, H, base, T = 0, raf = 0, t0 = 0, enVista = false;
    const disco = x => { x.beginPath(); x.arc(W / 2, H / 2, W * .496, 0, TAU); x.clip(); };
    const luz = (ang, ancho, alfa, t) => { /* una franja de luz que cruza el disco en diagonal */
      g.save(); g.translate(W / 2, H / 2); g.rotate(ang); const x = (t % 1) * W * 2.6 - W * 1.3;
      const gr = g.createLinearGradient(x - ancho, 0, x + ancho, 0); gr.addColorStop(0, 'rgba(255,255,255,0)'); gr.addColorStop(.5, 'rgba(255,255,255,' + alfa + ')'); gr.addColorStop(1, 'rgba(255,255,255,0)');
      g.fillStyle = gr; g.fillRect(x - ancho, -W, ancho * 2, W * 2); g.restore();
    };
    const dibuja = () => {
      if (!g || !W) return; g.clearRect(0, 0, W, H); g.drawImage(base, 0, 0, W, H);
      if (reduce) return;
      g.save(); disco(g); g.globalCompositeOperation = 'screen';
      luz(.5, W * .22, .2, T / 21); luz(-.35, W * .1, .12, T / 13 + .4);
      g.restore();
    };
    const prepara = () => {
      [g, W, H] = setup(cv); if (!W) return;
      base = document.createElement('canvas'); base.width = cv.width; base.height = cv.height; const b = base.getContext('2d'); b.setTransform(DPR, 0, 0, DPR, 0, 0);
      b.save(); b.beginPath(); b.arc(W / 2, H / 2, W * .496, 0, TAU); b.clip(); zellige(b, 0, 0, W, H, rng(11), Math.max(15, W / 19)); b.restore();
      dibuja();
    };
    const bucle = t => { if (t - t0 > 40) { T += Math.min(.1, (t - t0) / 1000); t0 = t; dibuja(); } raf = enVista ? requestAnimationFrame(bucle) : 0; };
    vigila(cv, prepara);
    if (!reduce) new IntersectionObserver(es => { enVista = es[0].isIntersecting; if (enVista && !raf) { t0 = performance.now(); raf = requestAnimationFrame(bucle); } }, { rootMargin: '80px 0px' }).observe(cv);
  })();
  const mapa = $('#mapa'), panel = $('#panel');
  Object.entries(CIU).forEach(([k, c], i) => { const b = document.createElement('button'); b.type = 'button'; b.className = 'pun' + (c.sede ? ' sede' : '') + (c.izq ? ' izq' : '') + (c.arr ? ' arr' : ''); b.style.left = c.x + '%'; b.style.top = c.y + '%'; b.dataset.c = k; b.setAttribute('aria-pressed', 'false'); b.innerHTML = `<canvas aria-hidden="true"></canvas><span>${c.n}</span>`; mapa.appendChild(b); pep(b.querySelector('canvas'), i + 3); });
  const elige = k => { const c = CIU[k]; mapa.querySelectorAll('.pun').forEach(p => p.setAttribute('aria-pressed', p.dataset.c === k)); document.querySelectorAll('.ciuM button').forEach(p => p.setAttribute('aria-pressed', p.dataset.c === k)); panel.innerHTML = `<div${EI(c.id, 'tf_ciudad')}><figure class="pf"${EF(c.id)}><img src="${c.foto}" alt="Gente de la comunidad de ${c.n}."></figure><div class="pt"><h3${ED(c.id, 'titulo')}>${c.n}</h3><p class="txt"${ED(c.id, 'texto')}>${c.txt}</p><button class="btn p" type="button" data-flujo="ciudad" data-ciudad="${c.n}" data-foto="${c.foto}">Haz comunidad en ${c.n}</button></div></div>`; };
  mapa.addEventListener('click', e => { const b = e.target.closest('.pun'); if (b) elige(b.dataset.c); });
  mapa.insertAdjacentHTML('afterend', `<div class="ciuM" role="group" aria-label="Elige una ciudad">${Object.entries(CIU).map(([k, c]) => `<button type="button" data-c="${k}">${esc(c.n)}</button>`).join('')}</div>`);
  const ciuM = mapa.nextElementSibling; ciuM.addEventListener('click', e => { const b = e.target.closest('button'); if (b) { elige(b.dataset.c); if (innerWidth <= 1000) panel.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth', block: 'nearest' }); } });
  if (Object.keys(CIU).length) elige(Object.keys(CIU)[0]);

  /* ===== 6 · La Frontera ===== */
  const HILOS = [
    { q: 'Anónima · 23 · Sevilla', s: 11, h: 'Mis padres no quieren ni conocer a mi novio', t: 'Awili, no sé ni por dónde empezar. Llevamos dos años, él es de Dos Hermanas de toda la vida y en mi casa ni lo nombran. Mi madre dice que es por mi bien. No quiero perderlos, pero tampoco quiero seguir quedando a escondidas como si tuviera quince años. ¿A alguien le ha pasado?', a: 48,
      r: [['Anónima · Madrid', 21, 'Tía, te leo y me veo hace tres años. A mí me salvó mi hermana mayor, que hizo de puente. Tardaron, no te voy a mentir, pero ahora mi madre le pregunta por él cada domingo. Wallah.'], ['Salma · Málaga', 5, 'No tienes que decidirlo hoy, khti. Si te apetece hablarlo con calma, te escribo por privado.'], ['Anónima · 19', 33, 'Yo estoy igual ahora mismo. Pensaba que era la única.']] },
    { q: 'Ibrahima · Almería', s: 2, h: '¿A alguien más le preguntan de dónde es «de verdad»?', t: 'Nací en Almería. Y cada vez que lo digo viene la de siempre: «ya, pero ¿de dónde eres de verdad?». ¿Cómo lo lleváis vosotras?', a: 131,
      r: [['Nour · Granada', 3, 'Yo ya contesto «de Granada, de verdad». Y sonrío.'], ['Anónima · 26', 17, 'Antes me cansaba bzaf. Aquí aprendí que no le debo una explicación a nadie.']] },
    { q: 'Anónima · 17 · Barcelona', s: 29, h: 'Me da hchouma no hablar bien darija con mis abuelos', t: 'Lo entiendo casi todo, pero cuando hablo se ríen un poco. Al final me cuesta llamarles y luego me siento fatal.', a: 64,
      r: [['Anónima · Tarragona', 8, 'Se ríen con cariño, te lo prometo. Mi abuela me corrige cada palabra y es nuestro momento del día.'], ['Hugo · Tarifa', 4, 'En Tarifa hacemos tardes de darija sin hchouma. Vente cuando quieras.']] },
    { q: 'Yasmín · Murcia', s: 14, h: 'Busco gente en Murcia para hacer comunidad', t: 'Somos tres y queremos empezar en octubre. ¿Alguien más se anima? Yallah.', a: 9,
      r: [['Anónima · Cartagena', 41, '¡Yo! Estoy en Cartagena, pero me acerco.']] }
  ];
  const app = $('#app'), cuerpo = $('#appCuerpo'), escf = $('#escribe');
  let hi = -1, anon = true;
  const quien = (n, s) => `<p class="quien"><canvas data-s="${s}" aria-hidden="true"></canvas>${n}</p>`;
  const pepsIn = el => el.querySelectorAll('canvas[data-s]').forEach(cv => { if (!pinta.has(cv)) pep(cv, +cv.dataset.s); });
  const lista = () => { hi = -1; app.classList.remove('hilo'); escf.hidden = true; cuerpo.innerHTML = HILOS.map((h, i) => `<button class="hl" type="button" data-h="${i}">${quien(h.q, h.s)}<h4>${h.h}</h4><p class="met"><span><b>${h.a}</b> a mí también</span><span>${h.r.length} respuestas</span></p></button>`).join(''); pepsIn(cuerpo); cuerpo.scrollTop = 0; };
  const hilo = i => { hi = i; const h = HILOS[i]; app.classList.add('hilo'); escf.hidden = false; cuerpo.innerHTML = `<div class="post">${quien(h.q, h.s)}<h4>${h.h}</h4><p>${h.t}</p><button class="amt" type="button" id="amt" aria-pressed="${!!h.yo}">A mí también · <b>${h.a}</b></button></div>` + h.r.map(r => `<div class="resp">${quien(r[0], r[1])}<p>${r[2]}</p></div>`).join(''); pepsIn(cuerpo); cuerpo.scrollTop = 0; };
  cuerpo.addEventListener('click', e => { const b = e.target.closest('.hl'); if (b) { hilo(+b.dataset.h); return; } const a = e.target.closest('#amt'); if (a) { const h = HILOS[hi]; h.yo = !h.yo; h.a += h.yo ? 1 : -1; a.setAttribute('aria-pressed', h.yo); a.querySelector('b').textContent = h.a; } });
  $('#volver').addEventListener('click', lista);
  $('#anon').addEventListener('click', e => { anon = !anon; e.currentTarget.setAttribute('aria-checked', anon); });
  const ta = $('#texto'); ta.addEventListener('input', () => { ta.style.height = 'auto'; ta.style.height = Math.min(120, ta.scrollHeight) + 'px'; });
  escf.addEventListener('submit', e => { e.preventDefault(); const t = ta.value.trim(); if (!t || hi < 0) return; const r = [anon ? 'Anónima · tú' : 'Tú', 77, esc(t)]; HILOS[hi].r.push(r); cuerpo.insertAdjacentHTML('beforeend', `<div class="resp nueva">${quien(r[0], r[1])}<p>${r[2]}</p></div>`); pepsIn(cuerpo); ta.value = ''; ta.style.height = ''; cuerpo.scrollTop = cuerpo.scrollHeight; aviso('Tu respuesta solo se ve en esta demostración'); });
  lista();

  /* ===== 7 · Nuestra voz ===== */
  const H = TF.historias || [];
  $('#tira').innerHTML = H.map((h, i) => `<button class="ht" type="button" data-i="${i}"${EI(h.id, 'tf_historia')}>${h.v ? `<video src="${h.v}" poster="${h.p}" muted loop playsinline preload="none" aria-hidden="true"></video>` : h.f ? `<img src="${h.f}" alt="" loading="lazy"${h.fx ? ` style="object-position:${h.fx * 100}% 50%"` : ''}${EF(h.id)}>` : `<p class="tx">«<span${ED(h.id, 'frase')}>${h.q}</span>»</p>`}${h.vm ? '<i class="pl">▶</i>' : ''}<span${ED(h.id, 'titulo')}>${h.n}</span><i class="anillo"></i></button>`).join('');
  document.querySelectorAll('.ht video').forEach(v => { const b = v.parentElement; b.addEventListener('mouseenter', () => v.play().catch(() => {})); b.addEventListener('mouseleave', () => v.pause()); });
  const st = $('#story'), cuadroS = $('#sCuadro'), bar = $('#sBar'); let vi = 0, tv = null, t0 = 0, paus = false, resto = 0, foco = null, dur = 6500, media = null, vivoS = null;
  bar.innerHTML = H.map(() => '<i><b></b></i>').join('');
  const pintaBar = p => bar.querySelectorAll('b').forEach((b, i) => b.style.width = (i < vi ? 100 : i > vi ? 0 : p * 100) + '%');
  const tick = t => { if (st.hidden) return; if (!paus && !vivoS) { const p = Math.min(1, (t - t0) / dur); pintaBar(p); if (p >= 1) { if (vi < H.length - 1) muestra(vi + 1); else cierraS(); return; } } tv = requestAnimationFrame(tick); };
  const muestra = i => {
    vi = Math.max(0, Math.min(H.length - 1, i)); const h = H[vi];
    media?.remove(); media = null; vivoS?.quita(); vivoS = null;
    if (h.vm) vivoS = vimeo(cuadroS, h, { avance: pintaBar, fin: () => vi < H.length - 1 ? muestra(vi + 1) : cierraS() });
    else if (!h.f && !h.v) { media = document.createElement('p'); media.className = 'tx'; media.textContent = `«${h.q}»`; dur = 7000; }
    else media = document.createElement(h.v ? 'video' : 'img');
    if (h.vm || !media || media.className === 'tx') {} else if (h.v) { media.src = h.v; media.poster = h.p; media.muted = true; media.playsInline = true; media.loop = true; media.autoplay = true; dur = 5000; } else { media.src = h.f; media.alt = h.n; dur = h.q ? 7000 : 4000; }
    if (media) cuadroS.prepend(media); if (h.v) media.play().catch(() => {});
    $('#sQuien').textContent = h.n; $('#sCita').textContent = h.q && h.f && !h.vm ? `«${h.q}»` : '';
    t0 = performance.now(); pintaBar(0); cancelAnimationFrame(tv); if (!reduce) tv = requestAnimationFrame(tick);
  };
  const abreS = i => { foco = document.activeElement; st.hidden = false; document.documentElement.style.overflow = 'hidden'; muestra(i); $('#sX').focus({ preventScroll: true }); };
  const cierraS = () => { cancelAnimationFrame(tv); media?.pause?.(); vivoS?.quita(); vivoS = null; st.hidden = true; document.documentElement.style.overflow = ''; foco?.focus?.({ preventScroll: true }); };
  $('#tira').addEventListener('click', e => { const b = e.target.closest('.ht'); if (b) abreS(+b.dataset.i); });
  [['#sAnt', -1], ['#sZa', -1], ['#sSig', 1], ['#sZs', 1]].forEach(([s, d]) => $(s).addEventListener('click', () => muestra(vi + d)));
  $('#sX').addEventListener('click', cierraS);
  st.addEventListener('click', e => { if (e.target === st) cierraS(); });
  cuadroS.addEventListener('pointerdown', e => { if (e.target.closest('button')) return; paus = true; resto = performance.now() - t0; media?.pause?.(); vivoS?.pausa(); });
  addEventListener('pointerup', () => { if (paus) { paus = false; t0 = performance.now() - resto; media?.play?.()?.catch?.(() => {}); vivoS?.sigue(); } });
  document.addEventListener('keydown', e => { if (st.hidden) return; if (e.key === 'Escape') cierraS(); if (e.key === 'ArrowRight') muestra(vi + 1); if (e.key === 'ArrowLeft') muestra(vi - 1); });

  /* ===== 8 · mecenas ===== */
  let freq = 'mes', cant = TF.mecenas.pre.mes[1];
  const PRE = TF.mecenas.pre, SUF = { mes: ' al mes', ano: ' al año', vez: '' };
  const anual = () => freq === 'mes' ? cant * 12 : cant;
  const deduce = A => .8 * Math.min(A, 250) + .4 * Math.max(0, A - 250);
  const eur = v => (Math.round(v * 100) / 100).toLocaleString('es-ES', { minimumFractionDigits: Math.round(v * 100) % 100 ? 2 : 0, maximumFractionDigits: 2 }) + ' €';
  const LOGRO = TF.mecenas.logro.map(t => A => t.replace('{n}', Math.max(2, Math.floor(A / 240))));
  const logro = A => LOGRO[A < 150 ? 0 : A < 360 ? 1 : 2](A);
  const pintaC = () => {
    $('#cants').innerHTML = PRE[freq].map(v => `<button type="button" data-v="${v}" aria-pressed="${v === cant}">${v} €</button>`).join('');
    const A = anual(), D = deduce(A);
    $('#globoI').textContent = logro(A);
    $('#renta').hidden = !DESGRAVA;
    if (DESGRAVA) $('#renta').innerHTML = `Te devolverán <mark>${eur(freq === 'mes' ? D / 12 : D)}</mark> ${freq === 'mes' ? 'al mes ' : ''}en la Declaración de la Renta. <button type="button" id="saberMas">Saber más</button>`;
    $('#donar').textContent = `Quiero donar ${eur(cant)}${SUF[freq]}`; $('#donarM').textContent = $('#donar').textContent;
    requestAnimationFrame(() => { const sel = $('#cants [aria-pressed=true]'), g = $('#globoI'); if (sel) { const gb = g.getBoundingClientRect(), sb = sel.getBoundingClientRect(); g.style.setProperty('--pico', Math.max(16, Math.min(gb.width - 16, sb.left + sb.width / 2 - gb.left)) + 'px'); } else g.style.setProperty('--pico', '50%'); });
  };
  document.querySelector('.freq').addEventListener('click', e => { const b = e.target.closest('button'); if (!b) return; freq = b.dataset.f; document.querySelectorAll('.freq button').forEach(x => x.setAttribute('aria-pressed', x === b)); cant = PRE[freq][1]; $('#otra').value = ''; pintaC(); });
  $('#cants').addEventListener('click', e => { const b = e.target.closest('button'); if (!b) return; cant = +b.dataset.v; $('#otra').value = ''; pintaC(); });
  $('#otra').addEventListener('input', e => { const v = Math.round(+e.target.value); if (v >= 5) { cant = v; pintaC(); } });
  document.addEventListener('click', e => { if (e.target.closest('#saberMas')) $('#saber').showModal(); });
  pintaC();
  $('#donarM').addEventListener('click', () => $('#donar').click());
  { let enSec = false, enTarj = false; const pinta = () => $('#barraM').classList.toggle('on', enSec && !enTarj);
    new IntersectionObserver(e => { enSec = e[0].isIntersecting; pinta(); }).observe($('#mecenas'));
    new IntersectionObserver(e => { enTarj = e[0].isIntersecting; pinta(); }, { threshold: .25 }).observe(document.querySelector('.tarjeta')); }
  $('#donar').addEventListener('click', () => { const A = anual(), D = deduce(A); abrePaso('mecenas', { aportacion: `${eur(cant)}${SUF[freq]}`, resumen: `Vas a donar <b>${eur(cant)}${SUF[freq]}</b>. ${logro(A)}${DESGRAVA ? `<br>Hacienda te devolverá <b>${eur(freq === 'mes' ? D / 12 : D)}${freq === 'mes' ? ' al mes' : ''}</b>, así que de verdad te cuesta <b>${eur(freq === 'mes' ? (A - D) / 12 : A - D)}${SUF[freq]}</b>.` : ''}` }); });

  /* ===== 9 · manifiesto: una corriente de pepitas que entra por la izquierda, desordenada y sin color; se junta, coge color y desemboca en el girasol, que gira despacio. Se mueve sola, nunca con el scroll ===== */
  (() => {
    const cv = $('#flujo'); if (!cv) return;
    const smooth = (a, b, t) => { const k = Math.min(1, Math.max(0, (t - a) / (b - a))); return k * k * (3 - 2 * k); };
    const lerp = (a, b, t) => a + (b - a) * t, ease = t => t < .5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;
    const GRIS = ['#C9C0B0', '#B8AFA0', '#D4CCBD'];
    let g, W, H, cx, cy, R, RAD = 6, flor, P = [], T = 0, raf = 0, enVista = false, yo = null, pun = null;
    /* cada pepita se dibuja una vez, en gris y en color, y luego solo se mueve */
    const sprite = (col, rad, sem) => { const s = Math.ceil(rad * 2.8), c = document.createElement('canvas'); c.width = c.height = Math.max(1, Math.ceil(s * DPR)); const x = c.getContext('2d'); x.setTransform(DPR, 0, 0, DPR, 0, 0); seedAt(x, s / 2, s / 2, rad, 0, col, rng(sem)); return { c, s }; };
    const pon = (sp, x, y, a, al) => { if (al <= .01) return; g.save(); g.globalAlpha = al; g.translate(x, y); g.rotate(a); g.drawImage(sp.c, -sp.s / 2, -sp.s / 2, sp.s, sp.s); g.restore(); };
    const nace = (q, dentro) => { q.x = dentro ? lerp(-W * .08, cx - R * .6, q.r()) : -W * (.03 + q.r() * .08); q.y0 = .06 + q.r() * .88; q.a0 = q.r() * TAU; q.sp = (.55 + q.r() * .9) * (q.r() < .5 ? -1 : 1); q.v = W / 17 * (.8 + q.r() * .45); q.ph = q.r() * TAU; q.fue = q.r() < .18; q.lado = q.r() < .5 ? -1 : 1; q.d = .3 + q.r() * .65; };
    const prepara = () => {
      [g, W, H] = setup(cv); if (!W) return;
      const ult = document.querySelector('#compLista li:last-child'), bc = cv.getBoundingClientRect(), bu = ult && ult.getBoundingClientRect(), cu = bu ? bu.left + bu.width / 2 - bc.left : 0;
      R = Math.min(H * .44, W * .11); cx = cu > W * .6 ? cu : W - R * 1.25; cy = H / 2;
      /* el girasol: el logo, del fuego del centro al oro de fuera */
      const NF = 150, c = R / Math.sqrt(NF + 4), s = Math.ceil(R * 2.3); flor = document.createElement('canvas'); flor.width = flor.height = Math.ceil(s * DPR); const f = flor.getContext('2d'); f.setTransform(DPR, 0, 0, DPR, 0, 0); const r = rng(7);
      for (let i = 1; i <= NF; i++) { const t = i / NF, a = i * GA, d = c * Math.sqrt(i) * 1.05; seedAt(f, s / 2 + Math.cos(a) * d, s / 2 + Math.sin(a) * d, c * (.56 + .16 * t), a, mix('#E2592A', '#F2B233', Math.pow(t, .6)), r); }
      flor.s = s;
      const N = Math.max(70, Math.min(150, Math.round(W * H / 3400))), rad = RAD = Math.max(4.5, H * .027);
      P = Array.from({ length: N }, (_, k) => { const r = rng(300 + k), z = .7 + r() * .6, q = { r, z }; q.gr = sprite(GRIS[k % 3], rad * z, 900 + k); q.co = sprite(mix('#E2592A', '#F2B233', r()), rad * z, 900 + k); nace(q, true); return q; });
      if (yo) yo.sp = sprite('#1F1B2D', rad * 1.25, 77);
      dibuja();
    };
    const dibuja = (dt = 0) => {
      if (!g || !W) return; g.clearRect(0, 0, W, H); const giro = T * .05, fin = cx - R * .95;
      for (const q of P) {
        q.x += q.v * dt; const u = q.x / fin;
        /* cuatro etapas, una por columna: dispersas y grises · se juntan · se ordenan y se inclinan · florecen */
        const dis = 1 - smooth(.2, .5, u), col = smooth(.44, .74, u), ll = smooth(.8, 1, u), hum = smooth(.5, .72, u) * (1 - smooth(.74, .9, u));
        let y = lerp(cy + (q.y0 - .5) * H * lerp(.4, .24, hum), q.y0 * H, dis) + Math.sin(T * 1.1 + q.ph) * H * (.045 * dis + .008) + hum * H * .07;
        let a = lerp(Math.sin(T * .7 + q.ph) * .25, q.a0 + T * q.sp, dis), x = q.x, al = 1;
        if (q.fue) { /* algunas rodean el girasol y siguen hasta salir */
          const yb = cy + q.lado * (R * 1.12 + (q.y0 - .5) * R * .5); y = lerp(y, yb, ll); if (x > W + 30) nace(q);
        } else if (ll > 0) { /* las demás desembocan en él y se funden */
          const ang = Math.PI + (q.y0 - .5) * 2.2, tx = cx + Math.cos(ang) * R * q.d, ty = cy + Math.sin(ang) * R * q.d;
          const k = smooth(fin - R * .3, cx - R * q.d * .6, x); x = lerp(x, tx, k * .7); y = lerp(y, ty, k); al = 1 - smooth(.55, 1, k); if (k >= .999) nace(q);
        }
        if (pun) { const dx = x - pun[0], dy = y - pun[1], d2 = dx * dx + dy * dy, rr = H * .16; if (d2 < rr * rr) { const d = Math.sqrt(d2) || 1, e = (1 - d / rr) * rr * .5; x += dx / d * e; y += dy / d * e; } }
        pon(q.gr, x, y, a, al * (1 - col)); pon(q.co, x, y, a, al * col);
      }
      g.save(); g.translate(cx, cy); g.rotate(giro); g.drawImage(flor, -flor.s / 2, -flor.s / 2, flor.s, flor.s); g.restore();
      if (yo) { /* tu pepita: cruza la corriente y se queda en el borde del girasol */
        const k = ease(Math.min(1, (T - yo.t0) / 4.5)), an = yo.an + giro, bx = cx + Math.cos(an) * R * .98, by = cy + Math.sin(an) * R * .98;
        const x = lerp(-20, bx, k), y = lerp(cy + H * .3, by, k) - Math.sin(k * Math.PI) * H * .18;
        pon(yo.sp, x, y, an, 1); g.save(); g.strokeStyle = '#E2592A'; g.lineWidth = 1.5; g.globalAlpha = k; g.beginPath(); g.arc(x, y, yo.sp.s * .45, 0, TAU); g.stroke(); g.restore();
      }
    };
    let t0 = 0; const bucle = t => { const dt = t0 ? Math.min(.05, (t - t0) / 1000) : 0; t0 = t; T += dt; dibuja(dt); raf = enVista ? requestAnimationFrame(bucle) : (t0 = 0); };
    vigila(cv, prepara);
    cv.addEventListener('pointermove', e => { const b = cv.getBoundingClientRect(); pun = [e.clientX - b.left, e.clientY - b.top]; if (reduce) dibuja(); });
    cv.addEventListener('pointerleave', () => { pun = null; if (reduce) dibuja(); });
    if (!reduce) new IntersectionObserver(es => { enVista = es[0].isIntersecting; if (enVista && !raf) raf = requestAnimationFrame(bucle); }, { rootMargin: '80px 0px' }).observe(cv);
  /* la firma: nombre y correo, y tu pepita entra en el girasol */
    const fm = $('#firma'), er = $('#firmaE');
    fm.addEventListener('submit', e => {
      e.preventDefault(); const n = $('#firma-nombre').value.trim(), c = $('#firma-correo').value.trim();
      if (!n || !correoOk(c)) { er.textContent = 'Escribe tu nombre y un correo válido.'; return; }
      window.TF?.enviar?.('manifiesto', { nombre: n, correo: c, manifiesto: 'Firmado' });
      fm.hidden = true; $('#firmadoT').textContent = `Gracias, ${n}. Ya formas parte.`; $('#firmado').hidden = false;
      yo = { t0: reduce ? T - 9 : T, an: 2.4 - T * .05, sp: sprite('#1F1B2D', RAD * 1.25, 77) }; if (reduce) dibuja();
      const r = cv.getBoundingClientRect(); if (r.bottom < 0 || r.top > innerHeight) cv.scrollIntoView({ behavior: 'smooth', block: 'center' });
    });
  })();

  /* ===== ventanas: cerrar y legal ===== */
  document.addEventListener('click', e => { const c = e.target.closest('[data-cierra]'); if (c) c.closest('dialog').close(); });
  document.querySelectorAll('dialog').forEach(d => d.addEventListener('click', e => { if (e.target === d) d.close(); }));
  const lg = $('#legal');
  const tab = t => { lg.querySelectorAll('[data-tab]').forEach(b => b.setAttribute('aria-selected', b.dataset.tab === t)); lg.querySelectorAll('[data-pan]').forEach(p => p.hidden = p.dataset.pan !== t); };
  document.addEventListener('click', e => { const b = e.target.closest('[data-legal]'); if (b) { e.preventDefault(); tab(b.dataset.legal); if (!lg.open) lg.showModal(); } const t = e.target.closest('[data-tab]'); if (t) tab(t.dataset.tab); });

  /* La Frontera: entrar con un enlace al correo */
  (() => { const d = document.getElementById('entrar'); if (!d) return; document.addEventListener('click', e => { if (e.target.closest('[data-entrar]')) { e.preventDefault(); document.getElementById('entA').hidden = false; document.getElementById('entB').hidden = true; document.getElementById('entE').textContent = ''; d.showModal(); } if (e.target.closest('[data-cierra-entrar]')) d.close(); if (e.target.closest('#entrar [data-cierra]')) d.close(); }); d.addEventListener('click', e => { if (e.target === d) d.close(); }); document.getElementById('entF').addEventListener('submit', e => { e.preventDefault(); const c = document.getElementById('entC').value.trim(); if (!/^\S+@\S+\.\S+$/.test(c)) { document.getElementById('entE').textContent = 'Escribe un correo válido.'; return; } document.getElementById('entBp').textContent = `Te escribiremos a ${c} en cuanto abramos La Frontera.`; TF.enviar('la-frontera', { correo: c }); document.getElementById('entA').hidden = true; document.getElementById('entB').hidden = false; }); })();
  document.documentElement.dataset.done = 1;
})();
</script>
<?php wp_footer(); ?>
</body>
</html>
