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
:root{--mbg:var(--papel);--mtx:var(--tinta);--mln:var(--linea);--mac:var(--fuego);
  --papel:#F5EEDF;--lino:#ECE4D3;--tinta:#1F1B2D;--tinta-2:rgba(31,27,45,.66);--tinta-3:rgba(31,27,45,.42);--linea:rgba(31,27,45,.12);
  --oro:#F2B233;--fuego:#E2592A;
  --disp:"Funnel Display","Host Grotesk",system-ui,sans-serif;--text:"Host Grotesk",system-ui,-apple-system,"Segoe UI",sans-serif;
  --gut:clamp(16px,4vw,56px);--max:1280px;--hh:76px;--ease:cubic-bezier(.2,.7,.2,1);
  --grano:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='200' height='200'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 .5  0 0 0 0 .45  0 0 0 0 .4  0 0 0 .55 0'/></filter><rect width='200' height='200' filter='url(%23n)'/></svg>");
}
*{box-sizing:border-box}
[id]{scroll-margin-top:calc(var(--hh) + 20px)}

[hidden]{display:none!important}
html{scroll-behavior:smooth}
body{margin:0;background:var(--papel);color:var(--tinta);font:400 17px/1.55 var(--text);-webkit-font-smoothing:antialiased;overflow-x:clip}
img,video{display:block;max-width:100%}
a{color:inherit;text-decoration:none}
button{font:inherit;color:inherit;background:none;border:0;padding:0;cursor:pointer}
h1,h2,h3,h4,p,figure,blockquote,ol,ul{margin:0}
ol,ul{padding:0;list-style:none}
h1,h2,h3,h4{font-family:var(--disp);font-weight:500;letter-spacing:-.025em;text-wrap:balance}
:focus-visible{outline:2px solid var(--fuego);outline-offset:3px;border-radius:4px}
.in{max-width:var(--max);margin-inline:auto;padding-inline:var(--gut)}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:10px;border-radius:999px;padding:15px 26px;font:500 15.5px/1 var(--text);white-space:nowrap;transition:transform .3s var(--ease),background-color .3s}
.btn:hover{transform:translateY(-1px)}
.btn.p{background:var(--tinta);color:var(--papel)}

/* ---------- cabecera: aparece al deslizar ---------- */
.top{position:fixed;inset:0 0 auto 0;z-index:30;height:var(--hh);padding-top:env(safe-area-inset-top,0px);background:rgba(245,238,223,.92);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-bottom:1px solid var(--linea);opacity:var(--hv,0);transform:translateY(calc((1 - var(--hv,0)) * -12px));pointer-events:var(--hpe,none);transition:opacity .25s,transform .25s}
.top .row{height:100%;display:flex;align-items:center;gap:28px;padding-inline:var(--gut)}
.top .logo img{height:24px;width:auto}
.top nav{display:flex;align-items:center;gap:28px;margin-left:auto;font-size:15.5px}
.top nav a:not(.btn){color:var(--tinta-2);transition:color .2s}
.top nav a:not(.btn):hover{color:var(--tinta)}
.top .btn{padding:12px 20px;font-size:14.5px}

/* ---------- 1 · vídeo que se encuadra, con su rastro de pepitas ---------- */
.intro{position:relative;height:190vh;height:190svh}
.stage{position:sticky;top:0;height:100vh;height:100svh;overflow:hidden}
.frame{position:absolute;inset:0;overflow:hidden;background:#15131e}
.frame video{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.frame::after{content:"";position:absolute;inset:0;background:radial-gradient(60% 45% at 50% 50%,rgba(15,12,24,.26),rgba(15,12,24,0) 100%),linear-gradient(180deg,rgba(15,12,24,.3),rgba(15,12,24,0) 22%,rgba(15,12,24,0) 78%,rgba(15,12,24,.3))}
.hlogo{position:absolute;top:calc(28px + env(safe-area-inset-top,0px));left:50%;transform:translateX(-50%);z-index:3;height:26px;width:auto;opacity:var(--lo,1)}
.hc{position:absolute;inset:0;z-index:2;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:0 24px;color:var(--papel)}
.hc h1{font-size:clamp(44px,7.2vw,112px);line-height:.96;letter-spacing:-.035em;max-width:13ch;text-shadow:0 2px 40px rgba(0,0,0,.25)}
.play{display:inline-flex;align-items:center;gap:14px;margin-top:34px;font:500 16px/1 var(--text);color:var(--papel)}
.play .pcir{width:58px;height:58px;border-radius:50%;display:grid;place-items:center;box-shadow:inset 0 0 0 1.5px rgba(245,238,223,.85);background:rgba(245,238,223,.08);backdrop-filter:blur(6px);-webkit-backdrop-filter:blur(6px);transition:background-color .3s,color .3s}
.play:hover .pcir{background:var(--papel);color:var(--tinta)}
.cue{position:absolute;left:50%;bottom:28px;z-index:3;transform:translateX(-50%);opacity:var(--lo,1);color:var(--papel)}
.cue svg{animation:cue 2.2s var(--ease) infinite}
@keyframes cue{0%,100%{transform:translateY(0);opacity:.6}50%{transform:translateY(6px);opacity:1}}

/* ---------- 2 · personas ---------- */
.people{padding-block:clamp(72px,9vw,130px) clamp(40px,5vw,72px);overflow-x:clip}
.cards{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:clamp(16px,2.4vw,36px);align-items:start}
.cards.b{grid-template-columns:repeat(3,minmax(0,1fr));max-width:980px;margin-inline:auto}
.pc{position:relative;transform:translateY(var(--ty,0)) rotate(var(--rt,0deg));animation:sway var(--sd,9s) ease-in-out infinite alternate;animation-delay:var(--dl,0s)}
@keyframes sway{from{transform:translateY(var(--ty,0)) rotate(var(--rt,0deg))}to{transform:translateY(calc(var(--ty,0) - 12px)) rotate(calc(var(--rt,0deg) * -1))}}
.cin{background:var(--lino);border-radius:6px;padding:10px 10px 18px;box-shadow:0 1px 2px rgba(31,27,45,.06),0 14px 30px rgba(31,27,45,.08);transition:transform .45s var(--ease),box-shadow .4s}
.pc:hover .cin{box-shadow:0 1px 2px rgba(31,27,45,.08),0 24px 50px rgba(31,27,45,.16)}
.ph{position:relative;aspect-ratio:4/5;border-radius:4px;overflow:hidden}
.ph img{width:100%;height:100%;object-fit:cover;transition:transform 1.2s var(--ease)}
.pc:hover .ph img{transform:scale(1.04)}
.ph::after{content:"";position:absolute;inset:0;background-image:var(--grano);background-size:200px;mix-blend-mode:overlay;opacity:.55;pointer-events:none}
.cin blockquote{margin:16px 6px 0;font:500 clamp(17px,1.35vw,20px)/1.22 var(--disp);letter-spacing:-.012em}
.who{margin:12px 6px 0;font-size:14px;color:var(--tinta-2)}
.who b{color:var(--tinta);font-weight:500}
.pw{position:absolute;z-index:2;pointer-events:none;transition:transform .5s var(--ease)}
.pw canvas{display:block;width:54px;height:54px;animation:pep var(--pd,6s) ease-in-out infinite alternate}
@keyframes pep{from{transform:translate(0,0) rotate(0deg)}to{transform:translate(var(--px,3px),var(--py,-5px)) rotate(var(--pr,12deg))}}
.between{text-align:center;padding-block:clamp(72px,9vw,130px)}
.between h2{font-size:clamp(34px,4.4vw,66px);line-height:1.02;letter-spacing:-.03em}
.between h2 span{display:block;color:var(--tinta-3)}

/* ---------- 3 · unidas en la diferencia ---------- */
.unidas{padding-block:clamp(120px,14vw,220px)}
.unidas h2{text-align:center;font-size:clamp(52px,8.4vw,136px);line-height:.92;letter-spacing:-.045em}
.nums{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:clamp(24px,3.4vw,56px);margin-top:clamp(56px,7vw,100px)}
.nums b{display:flex;align-items:center;gap:.13em;font:500 clamp(56px,6vw,96px)/.9 var(--disp);letter-spacing:-.045em;white-space:nowrap}
.nums li:last-child b{color:var(--fuego)}
.flag{flex:none;width:.13em;height:.68em;border-radius:.035em;overflow:hidden;box-shadow:0 0 0 1px rgba(31,27,45,.08);translate:0 .02em}
.flag svg{display:block;width:100%;height:100%}
.flag.onu{background:#009edb url(<?php echo TF_U; ?>/logo/onu.svg) 39% 50% / auto 160% no-repeat}
.nums p{margin-top:16px;font-size:16.5px;line-height:1.42;max-width:24ch}
.nums small{display:block;margin-top:10px;font-size:12.5px;color:var(--tinta-3)}

/* ---------- 4 · comunidad | futuros ---------- */
.dos{--em:clamp(180px,18vw,260px);position:relative;display:grid;grid-template-columns:1fr 1fr;min-height:88vh;min-height:88svh}
.lado{position:relative;overflow:hidden;display:flex;flex-direction:column;padding:clamp(28px,5vw,80px);color:var(--papel)}
.com{padding-right:calc(var(--em) / 2 + 40px)}
.fut{padding-left:calc(var(--em) / 2 + 40px);background:var(--tinta)}
.fut .t{margin-bottom:40px}
.lado .t{position:relative;z-index:2;max-width:28rem}
.lado h2{font-size:clamp(52px,6vw,96px);line-height:.92;letter-spacing:-.045em}
.lado .btn{margin-top:28px;background:var(--oro);color:var(--tinta)}
.lado:hover .btn{transform:translateY(-1px)}
.lado p{margin-top:18px;font-size:clamp(18px,1.45vw,21px);line-height:1.45;max-width:26ch;opacity:.92}
.com img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:50% 70%;transition:transform 1.4s var(--ease)}
.com:hover img{transform:scale(1.035)}
.com{color:var(--tinta)}
.com .btn{background:var(--tinta);color:var(--papel)}
.com::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(245,238,223,.28),rgba(245,238,223,0) 40%)}
.cover{position:relative;z-index:2;margin:auto 0;align-self:center;width:clamp(200px,19vw,290px);aspect-ratio:3/4;border-radius:4px;overflow:hidden;background:#27223a;box-shadow:0 1px 0 rgba(245,238,223,.06) inset,0 22px 44px rgba(0,0,0,.45);transform:rotate(3deg);transition:transform .6s var(--ease),box-shadow .6s}
.fut:hover .cover,.fut:focus-visible .cover{transform:rotate(0deg) translateY(-8px);box-shadow:0 1px 0 rgba(245,238,223,.06) inset,0 30px 60px rgba(0,0,0,.55)}
.cover canvas{position:absolute;inset:0;width:100%;height:100%}
.cover .ct{position:absolute;inset:0;padding:clamp(16px,1.6vw,22px);display:flex;flex-direction:column;gap:10px;color:var(--papel)}
.cover .ct span{font-size:11px;letter-spacing:.08em;text-transform:uppercase;opacity:.7}
.cover .ct h4{font-size:clamp(22px,2.2vw,32px);line-height:1.02;max-width:9ch}
.emblema{position:absolute;left:50%;top:50%;z-index:5;width:var(--em);aspect-ratio:1/1;translate:-50% -50%;pointer-events:none;perspective:900px}
.emblema .sway{width:100%;height:100%;animation:bascula 9s ease-in-out infinite alternate}
@keyframes bascula{from{transform:rotate(-3deg)}to{transform:rotate(3deg)}}
.emblema canvas{width:100%;height:100%;filter:drop-shadow(0 14px 30px rgba(0,0,0,.35));transition:transform 1.3s var(--ease)}
.dos:has(.com:hover) .emblema canvas,.dos:has(.com:focus-visible) .emblema canvas{transform:translateX(-6%) rotateY(-30deg) rotate(-12deg)}
.dos:has(.fut:hover) .emblema canvas,.dos:has(.fut:focus-visible) .emblema canvas{transform:translateX(6%) rotateY(30deg) rotate(12deg)}

/* ---------- 5 · nos hacen posible ---------- */
.apoyos{padding-block:clamp(130px,15vw,230px)}
.apoyos h2{font-size:clamp(32px,3.4vw,52px);text-align:center}
.logos{display:flex;flex-wrap:wrap;justify-content:center;align-items:center;gap:clamp(32px,6vw,88px);margin-top:clamp(40px,4.4vw,64px)}
.logos img{width:auto;filter:grayscale(1) contrast(1.15);mix-blend-mode:multiply;opacity:.78}

/* ---------- 6 · descúbrete transfronteriza ---------- */
.join{position:relative;overflow:hidden;background:var(--lino);border-radius:6px;min-height:min(720px,calc(100vh - 96px));display:grid;grid-template-columns:minmax(0,.78fr) minmax(0,1.22fr);align-items:center}
.spiral{position:absolute;left:0;bottom:0;width:min(1180px,96vw);aspect-ratio:1/1;transform:translate(-50%,50%)}
.spiral canvas{width:100%;height:100%;will-change:transform}
.join .form{position:relative;grid-column:2;padding:clamp(56px,6vw,96px) clamp(24px,3.6vw,56px)}
.join h2{font-size:clamp(46px,5.4vw,88px);line-height:.98;letter-spacing:-.04em}
.join h2 .u{white-space:nowrap;background:linear-gradient(transparent 64%,var(--oro) 64%,var(--oro) 88%,transparent 88%);padding-inline:.03em}
.join .sub{margin-top:26px;font-size:clamp(18px,1.4vw,21px);color:var(--tinta-2);max-width:34ch}
form{margin-top:clamp(28px,3vw,40px);display:grid;grid-template-columns:minmax(0,1fr);gap:12px;max-width:620px}
.steps{display:flex;gap:8px;align-items:center;font-size:13.5px;color:var(--tinta-2)}
.steps i{width:34px;height:4px;border-radius:2px;background:var(--linea)}
.steps i.on{background:var(--tinta)}
.steps span{margin-left:8px}
fieldset{border:0;padding:0;margin:0;display:grid;gap:14px}
.two{display:grid;grid-template-columns:1fr 1fr;gap:12px}
label.f{display:grid;gap:6px;font-size:14px;color:var(--tinta-2)}
input[type=text],input[type=email]{width:100%;border:0;border-radius:10px;background:var(--papel);padding:15px 16px;font:inherit;color:var(--tinta);box-shadow:inset 0 0 0 1px var(--linea);transition:box-shadow .2s}
input[type=text]:focus,input[type=email]:focus{outline:0;box-shadow:inset 0 0 0 2px var(--tinta)}
.q{font:500 17px/1.3 var(--disp);color:var(--tinta);margin:6px 0 2px}
.chips{display:flex;flex-wrap:wrap;gap:8px}
.chips label{position:relative}
.chips input{position:absolute;opacity:0;inset:0;cursor:pointer}
.chips span{display:inline-block;border-radius:999px;padding:10px 14px;background:var(--papel);box-shadow:inset 0 0 0 1px var(--linea);font-size:14.5px;transition:background-color .2s,color .2s,box-shadow .2s}
.chips input:checked + span{background:var(--tinta);color:var(--papel);box-shadow:none}
.chips input:focus-visible + span{outline:2px solid var(--fuego);outline-offset:2px}
.ok{display:flex;gap:10px;align-items:flex-start;font-size:14px;color:var(--tinta-2)}
.ok input{margin-top:3px;accent-color:var(--tinta);width:17px;height:17px}
.nav{display:flex;gap:12px;align-items:center;flex-wrap:wrap;margin-top:6px}
.nav .back{font-weight:500;color:var(--tinta-2)}
.err{font-size:14px;color:var(--fuego);min-height:1em}
.done h3{font-size:clamp(30px,3vw,44px);line-height:1.02}
.done p{margin-top:14px;color:var(--tinta-2);max-width:40ch;font-size:17px}

/* ---------- pie ---------- */
.foot{margin-top:clamp(88px,10vw,150px);background:var(--tinta);color:rgba(245,238,223,.7);padding-block:56px 30px;font-size:15px}
.foot .row{display:flex;justify-content:space-between;align-items:center;gap:24px;flex-wrap:wrap}
.foot .flogo{height:30px;width:auto}
.foot nav{display:flex;gap:28px;flex-wrap:wrap;align-items:center}
.foot nav a:hover{color:var(--papel)}
.foot .leg{margin-top:36px;font-size:13px;color:rgba(245,238,223,.42);display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap}

dialog.legal{width:min(820px,92vw);max-height:88vh;background:var(--papel);color:var(--tinta);overflow:auto}
dialog.legal .marco{position:relative;margin:14px;border:1px solid var(--linea);border-radius:6px;padding:clamp(28px,4vw,52px)}
dialog.legal .tabs{display:flex;gap:8px;flex-wrap:wrap;margin-right:56px}
dialog.legal .tabs button{border-radius:999px;padding:10px 16px;font-size:14.5px;color:var(--tinta-2);box-shadow:inset 0 0 0 1px var(--linea)}
dialog.legal .tabs button[aria-selected=true]{background:var(--tinta);color:var(--papel);box-shadow:none}
dialog.legal .pan{margin-top:26px;max-width:62ch;color:var(--tinta-2);font-size:16px;line-height:1.65}
dialog.legal .pan h3{color:var(--tinta);font-size:30px;margin-bottom:12px}
dialog.legal .pan p + p{margin-top:12px}
dialog.legal .x{position:absolute;top:22px;right:22px;width:44px;height:44px;border-radius:50%;box-shadow:inset 0 0 0 1px var(--linea);background:none;color:var(--tinta);font-size:22px}
.ok button{text-decoration:underline;text-underline-offset:3px}
.foot .leg button:hover{color:var(--papel)}
dialog{border:0;border-radius:10px;padding:0;width:min(1100px,94vw);background:#000;color:var(--papel);overflow:hidden}
dialog::backdrop{background:rgba(15,12,24,.8)}
dialog video{width:100%;height:auto}
dialog .x{position:absolute;top:10px;right:14px;z-index:2;width:40px;height:40px;border-radius:50%;background:rgba(0,0,0,.5);color:var(--papel);font-size:22px}

@media (max-width:1000px){
  .cards,.cards.b{grid-template-columns:repeat(2,minmax(0,1fr))}
  .nums{grid-template-columns:repeat(2,minmax(0,1fr));row-gap:48px}
  .dos{--em:clamp(150px,34vw,200px);grid-template-columns:1fr;grid-template-rows:1fr 1fr}
  .lado{min-height:70vh;padding:clamp(28px,6vw,56px) var(--gut)}
  .com{padding-right:var(--gut)}
  .fut{padding-left:var(--gut);padding-top:calc(var(--em) / 2 + 28px)}
  .join{grid-template-columns:minmax(0,1fr);min-height:0}
  .join .form{grid-column:1;padding-top:clamp(240px,62vw,340px)}
  .spiral{left:auto;right:0;bottom:auto;top:0;width:min(640px,120vw);transform:translate(40%,-45%)}
  .top nav a:not(.btn){display:none}
}
@media (max-width:560px){ .two{grid-template-columns:1fr} .cin blockquote{font-size:16px} .cards,.cards.b{gap:40px 14px} .nums p{font-size:15px} .pw canvas{width:38px;height:38px;animation:none} }
@media (max-width:1000px){
  .pc{animation:none;transform:rotate(calc(var(--rt,0deg) * .5))}
  .cards.b .pc:nth-child(3){display:none}
  .nums{grid-template-columns:minmax(0,1fr);row-gap:0}
  .nums li{padding-block:26px;border-top:1px solid var(--linea)}
  .nums li:first-child{border-top:0}
  .nums b{font-size:clamp(60px,17vw,84px)}
  .nums p{max-width:32ch}
}
@media (prefers-reduced-motion:reduce){ .pc,.pw canvas,.emblema .sway,.cue svg{animation:none} .intro{height:auto} .stage{position:relative} }
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
  <a class="logo" href="#inicio" aria-label="Transfronteriza, inicio"><img src="<?php tf_img('i9aac151d2b', TF_U . '/logo/h-color-34.svg'); ?>" data-tf-img="i9aac151d2b" alt="Transfronteriza"></a>
  <nav aria-label="Principal"><a href="<?php echo esc_url(tf_pagina('comunidad')); ?>" data-tf="t38114eb012"><?php tf_t('t38114eb012'); ?></a><a href="<?php echo esc_url(tf_pagina('futuros')); ?>" data-tf="tf6078594dd"><?php tf_t('tf6078594dd'); ?></a><a class="btn p" href="#descubre" data-tf="t3158ca410d"><?php tf_t('t3158ca410d'); ?></a><a class="lf" href="#" data-entrar aria-label="Entra en La Frontera" title="Entra en La Frontera"><svg class="xf" viewBox="0 0 48 48" aria-hidden="true"><path d="M9 8.5h16.5a6 6 0 0 1 6 6v7.5a6 6 0 0 1-6 6H17l-6.5 5.5V28H9a6 6 0 0 1-6-6v-7.5a6 6 0 0 1 6-6z" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linejoin="round"/><path d="M23 19h16a6 6 0 0 1 6 6v7a6 6 0 0 1-6 6h-1.5v5.5L31 38h-8a6 6 0 0 1-6-6v-7a6 6 0 0 1 6-6z" fill="#E2592A"/><circle class="punto" cx="41" cy="9" r="4.2" fill="#F2B233"/></svg></a></nav>
  <button class="mnu" type="button" aria-label="Abrir el menú" aria-expanded="false" aria-controls="mnuP"><i></i><i></i></button>
</div></header>
<div class="mnuP" id="mnuP" hidden><nav aria-label="Menú"><a href="<?php echo esc_url(tf_pagina('comunidad')); ?>" data-tf="t38114eb012"><?php tf_t('t38114eb012'); ?></a><a href="<?php echo esc_url(tf_pagina('futuros')); ?>" data-tf="tf6078594dd"><?php tf_t('tf6078594dd'); ?></a><a href="#" data-entrar data-tf="t11905120cc"><?php tf_t('t11905120cc'); ?></a></nav><a class="btn p" href="#descubre" data-tf="t3158ca410d"><?php tf_t('t3158ca410d'); ?></a><a class="mail" href="mailto:hola@transfronteriza.net" data-tf="ta0aa22019a"><?php tf_t('ta0aa22019a'); ?></a></div>

<main id="inicio">
  <!-- 1 · Somos la comunidad que cruza fronteras -->
  <section class="intro" id="intro" data-tf-sec="intro">
    <div class="stage">
      <div class="frame" id="frame">
        <video id="bg" autoplay muted loop playsinline preload="auto" poster="<?php echo TF_U; ?>/media/poster.jpg" aria-hidden="true"><source src="<?php tf_img('i693b0bc5af', TF_U . '/media/loop.mp4'); ?>" data-tf-vid="i693b0bc5af" type="video/mp4"></video>
        <img class="hlogo" src="<?php tf_img('ia8745bc028', TF_U . '/logo/h-oscuro-34.svg'); ?>" data-tf-img="ia8745bc028" alt="Transfronteriza">
        <div class="hc">
          <h1 data-tf="t8c97b138e5"><?php tf_t('t8c97b138e5'); ?></h1>
          <button class="play" type="button" id="playBtn"><span class="pcir"><svg width="16" height="18" viewBox="0 0 14 16" aria-hidden="true"><path d="M1 1.6v12.8a.8.8 0 0 0 1.2.7l10.6-6.4a.8.8 0 0 0 0-1.4L2.2.9A.8.8 0 0 0 1 1.6z" fill="currentColor"/></svg></span>Ver vídeo</button>
        </div>
        <div class="cue" aria-hidden="true"><svg width="30" height="18" viewBox="0 0 30 18" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M2 2l13 13L28 2"/></svg></div>
      </div>
    </div>
  </section>

  <!-- 2 · Personas con las que reconocerse -->
  <section class="people in" id="personas" aria-label="Personas de la comunidad" data-tf-sec="personas" data-tf-panel="edit.php?post_type=tf_tarjeta" data-tf-panel-t="Editar las tarjetas">
    <ul class="cards" id="cardsA"></ul>
    <div class="between"><h2 data-tf="t7e80b4de39"><?php tf_t('t7e80b4de39'); ?></h2></div>
    <ul class="cards b" id="cardsB"></ul>
  </section>

  <!-- 3 · Unidas en la diferencia -->
  <section class="unidas in" data-tf-sec="unidas" data-tf-panel="edit.php?post_type=tf_cifra" data-tf-panel-t="Editar las cifras">
    <h2 data-tf="t26c389cf51"><?php tf_t('t26c389cf51'); ?></h2>
    <?php tf_cifras(); ?>
  </section>

  <!-- 4 · Comunidad | Futuros -->
  <section class="dos" data-tf-sec="dos">
    <a class="lado com" id="comunidad" href="<?php echo esc_url(tf_pagina('comunidad')); ?>"><img src="<?php tf_img('i408711db45', TF_U . '/img/comunidad.jpg'); ?>" data-tf-img="i408711db45" alt="Dos chicas de la comunidad, de espaldas, miran la montaña al atardecer."><div class="t"><h2 data-tf="t8f69233c0e"><?php tf_t('t8f69233c0e'); ?></h2><p data-tf="t2f4fd33425"><?php tf_t('t2f4fd33425'); ?></p><span class="btn">Conoce la comunidad</span></div></a>
    <a class="lado fut" id="futuros" href="<?php echo esc_url(tf_pagina('futuros')); ?>"><div class="t"><h2 data-tf="t96b03ea3c7"><?php tf_t('t96b03ea3c7'); ?></h2><p data-tf="tbc6bf077e8"><?php tf_t('tbc6bf077e8'); ?></p><span class="btn" data-ir="<?php echo esc_url(tf_pagina('futuros')); ?>#leer-informe">Leer el informe</span></div><div class="cover"><canvas id="portada" aria-hidden="true"></canvas><div class="ct"><span>Futuros · 2026</span><h4 data-tf="tb63ed5ea90"><?php tf_t('tb63ed5ea90'); ?></h4></div></div></a>
    <div class="emblema" aria-hidden="true"><div class="sway"><canvas id="girasol"></canvas></div></div>
  </section>

  <!-- 5 · Nos hacen posible -->
  <section class="apoyos in" data-tf-sec="apoyos" data-tf-panel="edit.php?post_type=tf_apoyo" data-tf-panel-t="Editar los logos">
    <h2 data-tf="t903ff04bf9"><?php tf_t('t903ff04bf9'); ?></h2>
    <?php tf_apoyos(); ?>
  </section>

  <!-- 6 · Descúbrete transfronteriza -->
  <section class="in" id="descubre" data-tf-sec="descubre">
    <div class="join">
      <div class="spiral" aria-hidden="true"><canvas id="espiral"></canvas></div>
      <div class="form">
        <h2 data-tf="t9d63ac4424"><?php tf_t('t9d63ac4424'); ?></h2>
        <p class="sub" data-tf="tfb8b046ee2"><?php tf_t('tfb8b046ee2'); ?></p>
        <form id="reg" novalidate>
          <div class="steps" aria-hidden="true"><i class="on"></i><i></i><span id="stepTxt">Paso 1 de 2</span></div>
          <fieldset id="s1">
            <div class="two"><label class="f">Tu nombre<input type="text" id="f-nombre" autocomplete="given-name" required></label><label class="f">Tu correo<input type="email" id="f-correo" autocomplete="email" required></label></div>
            <p class="q" data-tf="t597087772a"><?php tf_t('t597087772a'); ?></p>
            <div class="chips">
              <label><input type="radio" name="perfil" value="Vivo entre culturas" checked><span>Vivo entre culturas</span></label>
              <label><input type="radio" name="perfil" value="Mi familia es transfronteriza"><span>Mi familia es transfronteriza</span></label>
              <label><input type="radio" name="perfil" value="Educo en la diversidad"><span>Educo en la diversidad</span></label>
              <label><input type="radio" name="perfil" value="Quiero apoyar"><span>Quiero apoyar</span></label>
              <label><input type="radio" name="perfil" value="Represento a una entidad"><span>Represento a una entidad</span></label>
            </div>
          </fieldset>
          <fieldset id="s2" hidden>
            <div class="two"><label class="f">Tu ciudad<input type="text" id="f-ciudad" autocomplete="address-level2"></label><label class="f">¿De qué lugares estás hecha?<input type="text" id="f-lugares" placeholder="Tetuán, Málaga, Dakar…"></label></div>
            <p class="q" data-tf="t97fa4d9bc3"><?php tf_t('t97fa4d9bc3'); ?></p>
            <div class="chips"><label><input type="radio" name="edad"><span>14–17</span></label><label><input type="radio" name="edad"><span>18–24</span></label><label><input type="radio" name="edad"><span>25–29</span></label><label><input type="radio" name="edad"><span>30 o más</span></label></div>
            <p class="q" data-tf="t6daa87c535"><?php tf_t('t6daa87c535'); ?></p>
            <div class="chips"><label><input type="checkbox"><span>Encuentros</span></label><label><input type="checkbox"><span>Mi ciudad</span></label><label><input type="checkbox"><span>Formación</span></label><label><input type="checkbox"><span>Futuros</span></label><label><input type="checkbox"><span>Echar una mano</span></label></div>
            <label class="ok"><input type="checkbox" id="f-ok"><span>Acepto la <button type="button" data-legal="privacidad" data-tf="tc8f28f06dd"><?php tf_t('tc8f28f06dd'); ?></button>. Usamos tus datos solo para escribirte.</span></label>
          </fieldset>
          <div class="done" id="done" hidden><h3 id="doneT">Gracias.</h3><p data-tf="te4b9f112b2"><?php tf_t('te4b9f112b2'); ?></p></div>
          <p class="err" id="err" role="alert"></p>
          <div class="nav" id="nav"><button class="btn p" type="submit" id="next">Seguir</button><button class="back" type="button" id="back" hidden>Atrás</button></div>
        </form>
      </div>
    </div>
  </section>
</main>

<footer class="foot"><div class="in">
  <div class="row"><img class="flogo" src="<?php tf_img('ia8745bc028', TF_U . '/logo/h-oscuro-34.svg'); ?>" data-tf-img="ia8745bc028" alt="Transfronteriza"><nav aria-label="Pie"><a href="<?php echo esc_url(tf_pagina('comunidad')); ?>" data-tf="t38114eb012"><?php tf_t('t38114eb012'); ?></a><a href="<?php echo esc_url(tf_pagina('futuros')); ?>" data-tf="tf6078594dd"><?php tf_t('tf6078594dd'); ?></a><a href="#descubre" data-tf="t3158ca410d"><?php tf_t('t3158ca410d'); ?></a><a href="mailto:hola@transfronteriza.net" data-tf="ta0aa22019a"><?php tf_t('ta0aa22019a'); ?></a></nav></div>
  <div class="leg"><span>© 2026 Asociación Juvenil Transfronteriza</span><span><button type="button" data-legal="aviso" data-tf="t2a27eb438d"><?php tf_t('t2a27eb438d'); ?></button> · <button type="button" data-legal="privacidad" data-tf="tcd9bcb9fd2"><?php tf_t('tcd9bcb9fd2'); ?></button> · <button type="button" data-legal="cookies" data-tf="t53614378a5"><?php tf_t('t53614378a5'); ?></button></span></div>
</div></footer>

<dialog class="legal" id="legal" aria-label="Información legal">
  <div class="marco">
    <div class="tabs" role="tablist"><button type="button" role="tab" data-tab="aviso" data-tf="t2a27eb438d"><?php tf_t('t2a27eb438d'); ?></button><button type="button" role="tab" data-tab="privacidad" data-tf="tcd9bcb9fd2"><?php tf_t('tcd9bcb9fd2'); ?></button><button type="button" role="tab" data-tab="cookies" data-tf="t53614378a5"><?php tf_t('t53614378a5'); ?></button></div>
    <div class="pan" data-pan="aviso"><h3 data-tf="tb746b8f804"><?php tf_t('tb746b8f804'); ?></h3><p data-tf="t72a4100e93"><?php tf_t('t72a4100e93'); ?></p><p data-tf="t48b9f9d455"><?php tf_t('t48b9f9d455'); ?></p></div>
    <div class="pan" data-pan="privacidad" hidden><h3 data-tf="t48532db43b"><?php tf_t('t48532db43b'); ?></h3><p data-tf="t2305d32623"><?php tf_t('t2305d32623'); ?></p><p data-tf="t9d528350e7"><?php tf_t('t9d528350e7'); ?></p><p data-tf="tddb282a99c"><?php tf_t('tddb282a99c'); ?></p><p data-tf="t9f2bf10e65"><?php tf_t('t9f2bf10e65'); ?></p><p data-tf="t166c9b82c7"><?php tf_t('t166c9b82c7'); ?></p><p data-tf="te6be6faa4e"><?php tf_t('te6be6faa4e'); ?></p><p data-tf="t6e74bf0644"><?php tf_t('t6e74bf0644'); ?></p><p data-tf="td9a36501db"><?php tf_t('td9a36501db'); ?></p></div>
    <div class="pan" data-pan="cookies" hidden><h3 data-tf="t9d768186f8"><?php tf_t('t9d768186f8'); ?></h3><p data-tf="t54e3f07ee2"><?php tf_t('t54e3f07ee2'); ?></p><p data-tf="t514e195734"><?php tf_t('t514e195734'); ?></p></div>
    <button class="x" type="button" id="legalX" aria-label="Cerrar">×</button>
  </div>
</dialog>
<dialog id="spot"><button class="x" type="button" id="spotX" aria-label="Cerrar">×</button><video id="spotV" controls playsinline preload="none" poster="<?php echo TF_U; ?>/media/poster.jpg"><source src="<?php tf_img('i05d4cf0dd1', TF_U . '/media/spot.mp4'); ?>" data-tf-vid="i05d4cf0dd1" type="video/mp4"></video></dialog>

<dialog class="entrar" id="entrar" aria-labelledby="entT"><div class="marco"><button class="x" type="button" data-cierra aria-label="Cerrar">×</button><svg class="xf" viewBox="0 0 48 48" aria-hidden="true"><path d="M9 8.5h16.5a6 6 0 0 1 6 6v7.5a6 6 0 0 1-6 6H17l-6.5 5.5V28H9a6 6 0 0 1-6-6v-7.5a6 6 0 0 1 6-6z" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linejoin="round"/><path d="M23 19h16a6 6 0 0 1 6 6v7a6 6 0 0 1-6 6h-1.5v5.5L31 38h-8a6 6 0 0 1-6-6v-7a6 6 0 0 1 6-6z" fill="#E2592A"/><circle class="punto" cx="41" cy="9" r="4.2" fill="#F2B233"/></svg><div id="entA"><h3 id="entT">Entra en La Frontera</h3><p data-tf="t9834a96e12"><?php tf_t('t9834a96e12'); ?></p><form id="entF" novalidate><input type="email" id="entC" placeholder="Tu correo" autocomplete="email" aria-label="Tu correo"><p class="err" id="entE" role="alert"></p><button class="btn p" type="submit" data-tf="t17c8912d40"><?php tf_t('t17c8912d40'); ?></button></form><p class="nueva">¿Aún no eres parte? <a href="<?php echo esc_url(home_url('/')); ?>#descubre" data-cierra-entrar data-tf="t3158ca410d"><?php tf_t('t3158ca410d'); ?></a></p></div><div id="entB" hidden><h3 data-tf="tb94238ba26"><?php tf_t('tb94238ba26'); ?></h3><p id="entBp"></p></div></div></dialog>
<?php tf_script_base(tf_datos_home()); ?>
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
  const K = { tinta: '#1F1B2D', oro: '#F2B233', fuego: '#E2592A', oroN: '#FCD35A', fuegoN: '#FC8A45' };
  const hx = h => [1, 3, 5].map(i => parseInt(h.slice(i, i + 2), 16));
  const mix = (a, b, t) => { const A = hx(a), B = hx(b); return '#' + A.map((v, i) => Math.round(v + (B[i] - v) * t).toString(16).padStart(2, '0')).join(''); };
  const rng = a => () => { a |= 0; a = a + 0x6D2B79F5 | 0; let t = Math.imul(a ^ a >>> 15, 1 | a); t = t + Math.imul(t ^ t >>> 7, 61 | t) ^ t; return ((t ^ t >>> 14) >>> 0) / 4294967296; };
  const setup = (cv, w, h) => { w = w || cv.clientWidth; h = h || cv.clientHeight; cv.width = Math.max(1, Math.round(w * DPR)); cv.height = Math.max(1, Math.round(h * DPR)); const g = cv.getContext('2d'); g.setTransform(DPR, 0, 0, DPR, 0, 0); return [g, w, h]; };

  /* la pepita del manual: forma irregular, veta y moteado cuando es grande */
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
  /* el símbolo: semillas por el ángulo de oro, de fuego (centro) a oro (borde) */
  const symbol = (g, cx, cy, R, N, cA, cB, r, clip) => {
    const c = R / Math.sqrt(N), vw = clip || [-1e9, -1e9, 1e9, 1e9];
    for (let i = 1; i <= N; i++) { const a = i * GA, d = c * Math.sqrt(i), x = cx + Math.cos(a) * d, y = cy + Math.sin(a) * d, t = i / N, rad = c * (.56 + .16 * t); if (x + rad < vw[0] || y + rad < vw[1] || x - rad > vw[2] || y - rad > vw[3]) { r(); continue; } seedAt(g, x, y, rad, a, mix(cA, cB, Math.pow(t, .6)), r); }
  };

  const intro = document.getElementById('intro');

  /* 2 · tarjetas: cada persona, una pepita; se inclinan un poco bajo el cursor */
  const P = (TF.tarjetas || []).map(t => [t.foto, t.nombre, t.edad, t.ciudad, t.frase, t.id]);
  const r0 = rng(20260929);
  const corners = innerWidth < 700 ? [['top:-12px', 'right:12px'], ['top:-12px', 'left:14px']] : [['top:-16px', 'right:18px'], ['top:30%', 'right:-18px'], ['top:-14px', 'left:22px'], ['bottom:32%', 'left:-16px'], ['top:48%', 'right:-16px']];
  const card = ([f, n, e, c, q, id], i) => {
    const rt = ((r0() - .5) * 7).toFixed(2), ty = Math.round((r0() - .5) * (innerWidth < 700 ? 16 : 50)), sd = (6 + r0() * 4).toFixed(1), dl = (-r0() * 6).toFixed(1);
    const [a, b] = corners[(r0() * corners.length) | 0];
    return `<li class="pc"${EI(id, 'tf_tarjeta')} style="--rt:${rt}deg;--ty:${ty}px;--sd:${sd}s;--dl:${dl}s"><div class="cin"><div class="ph"${EF(id)}><img src="${f}" alt="${n}, ${e} años, ${c}." loading="lazy"></div><blockquote>«<span${ED(id, 'frase')}>${q}</span>»</blockquote><p class="who"><b${ED(id, 'titulo')}>${n}</b>, <span${ED(id, 'edad')}>${e}</span> · <span${ED(id, 'ciudad')}>${c}</span></p></div><span class="pw" style="${a};${b}"><canvas data-seed="${i + 10}" style="--pd:${(3.5 + r0() * 3).toFixed(1)}s;--pr:${Math.round((r0() < .5 ? -1 : 1) * (22 + r0() * 20))}deg;--px:${Math.round((r0() - .5) * 16)}px;--py:${Math.round(-7 - r0() * 8)}px" aria-hidden="true"></canvas></span></li>`;
  };
  document.getElementById('cardsA').innerHTML = P.slice(0, 4).map(card).join('');
  document.getElementById('cardsB').innerHTML = P.slice(4).map((p, i) => card(p, i + 4)).join('');
  const drawPepita = cv => { const [g, w] = setup(cv), r = rng(+cv.dataset.seed * 977 + 13); seedAt(g, w / 2, w / 2, w * .3, r() * TAU, mix(K.fuego, K.oro, .3 + r() * .7), r); };
  if (!reduce) document.querySelectorAll('.pc').forEach(li => {
    const cin = li.querySelector('.cin'), pw = li.querySelector('.pw');
    li.addEventListener('pointermove', e => { if (e.pointerType !== 'mouse') return; const b = li.getBoundingClientRect(), nx = (e.clientX - b.left) / b.width * 2 - 1, ny = (e.clientY - b.top) / b.height * 2 - 1; cin.style.transform = `perspective(900px) translateY(-8px) rotateY(${(nx * 8).toFixed(2)}deg) rotateX(${(-ny * 8).toFixed(2)}deg)`; pw.style.transform = `translate(${(-nx * 26).toFixed(1)}px,${(-ny * 22).toFixed(1)}px) rotate(${(nx * 50).toFixed(1)}deg)`; });
    li.addEventListener('pointerleave', () => { cin.style.transform = ''; pw.style.transform = ''; });
  });

  /* 3 · estrellas de la bandera europea */
  (document.querySelector('.stars') || {}).innerHTML = [17, 34, 51].map(y => { const x = 6.5; return `<polygon points="${Array.from({ length: 10 }, (_, j) => { const rr = j % 2 ? 1.75 : 4.3, b = j / 10 * TAU - Math.PI / 2; return `${(x + Math.cos(b) * rr).toFixed(2)},${(y + Math.sin(b) * rr).toFixed(2)}`; }).join(' ')}"/>`; }).join('');

  /* 4 · el girasol en la costura y la portada del informe */
  const drawGirasol = () => { const cv = document.getElementById('girasol'), [g, w] = setup(cv); symbol(g, w / 2, w / 2, w * .47, 200, K.fuego, K.oro, rng(90)); };
  const drawPortada = () => { const cv = document.getElementById('portada'), [g, w, h] = setup(cv); symbol(g, w * 1.05, h * 1.02, Math.max(w, h) * .62, 420, K.fuegoN, K.oroN, rng(55), [0, 0, w, h]); };

  /* 6 · espiral que gira */
  const sp = document.getElementById('espiral');
  const drawSpiral = () => { const [g, w] = setup(sp); symbol(g, w / 2, w / 2, w * .47, 420, K.fuego, K.oro, rng(7)); };
  /* cada lienzo se dibuja cuando tiene tamaño (también si la página carga oculta) y al cambiar de tamaño */
  const pinta = new Map(), ro = new ResizeObserver(es => es.forEach(e => { if (e.contentRect.width > 0) pinta.get(e.target)?.(); }));
  const vigila = (cv, fn) => { pinta.set(cv, fn); ro.observe(cv); };
  vigila(document.getElementById('girasol'), drawGirasol); vigila(document.getElementById('portada'), drawPortada); vigila(sp, drawSpiral);
  document.querySelectorAll('.pw canvas').forEach(cv => vigila(cv, () => drawPepita(cv)));
  /* giro del girasol: ritmo natural y un impulso de alegría al enviar */
  let ang = 0, boost = 0, tS = 0, sOn = false, running = false;
  const BASE = TAU / 180;
  const spin = t => { const dt = Math.min(64, t - (tS || t)) / 1000; tS = t; boost *= Math.exp(-dt / 1.1); ang += (BASE + boost) * dt; sp.style.transform = `rotate(${ang}rad)`; if (sOn || boost > .01) requestAnimationFrame(spin); else running = false; };
  const kick = () => { if (running) return; running = true; tS = 0; requestAnimationFrame(spin); };
  if (!reduce) new IntersectionObserver(e => { sOn = e[0].isIntersecting; if (sOn) kick(); }).observe(document.querySelector('.join'));
  const alegria = () => { if (reduce) return; boost = TAU * 1.5; kick(); };

  /* vídeo que se encuadra al deslizar y cabecera que aparece */
  const frame = document.getElementById('frame'), top = document.getElementById('top');
  const f = () => {
    const span = Math.max(1, intro.offsetHeight - innerHeight), p = reduce ? 1 : Math.min(1, Math.max(0, scrollY / (span * .8)));
    const gut = Math.min(56, Math.max(16, innerWidth * .04));
    frame.style.top = (p * 88) + 'px'; frame.style.left = frame.style.right = frame.style.bottom = (p * gut) + 'px';
    frame.style.borderRadius = (p * 6) + 'px';
    frame.style.setProperty('--lo', Math.max(0, 1 - p * 2.2).toFixed(3));
    const hv = Math.min(1, Math.max(0, (p - .45) * 2.4)); top.style.setProperty('--hv', hv.toFixed(3)); top.style.setProperty('--hpe', hv > .5 ? 'auto' : 'none');
  };
  addEventListener('scroll', f, { passive: true }); addEventListener('resize', f); f();
  if (reduce) document.getElementById('bg').pause();

  /* el spot completo, con sonido */
  const d = document.getElementById('spot'), sv = document.getElementById('spotV');
  document.getElementById('playBtn').addEventListener('click', () => { d.showModal(); sv.play().catch(() => {}); });
  const close = () => { sv.pause(); d.close(); };
  document.getElementById('spotX').addEventListener('click', close);
  d.addEventListener('click', e => { if (e.target === d) close(); });

  /* formulario en dos pasos */
  const fm = document.getElementById('reg'), s1 = document.getElementById('s1'), s2 = document.getElementById('s2'), err = document.getElementById('err');
  const next = document.getElementById('next'), back = document.getElementById('back'), dots = fm.querySelectorAll('.steps i'), stepTxt = document.getElementById('stepTxt');
  let step = 1;
  const go = n => { step = n; s1.hidden = n !== 1; s2.hidden = n !== 2; dots[1].classList.toggle('on', n === 2); stepTxt.textContent = `Paso ${n} de 2`; back.hidden = n !== 2; next.textContent = n === 2 ? 'Enviar' : 'Seguir'; err.textContent = ''; };
  back.addEventListener('click', () => go(1));
  fm.addEventListener('submit', e => {
    e.preventDefault();
    const nombre = document.getElementById('f-nombre').value.trim(), correo = document.getElementById('f-correo').value.trim();
    if (step === 1) { if (!nombre || !/^\S+@\S+\.\S+$/.test(correo)) { err.textContent = 'Escribe tu nombre y un correo válido.'; return; } go(2); return; }
    if (!document.getElementById('f-ok').checked) { err.textContent = 'Necesitamos que aceptes la política de privacidad.'; return; }
    const fb = document.querySelector('.join .form'); fb.style.minHeight = fb.offsetHeight + 'px'; s1.hidden = s2.hidden = true; document.getElementById('nav').hidden = true; fm.querySelector('.steps').hidden = true; err.textContent = '';
    document.getElementById('doneT').textContent = `Gracias, ${nombre}.`; document.getElementById('done').hidden = false;
    TF.enviar('descubre', TF.leer(fm));
    alegria();
  });
  /* ventana legal y botones que llevan a otra página */
  const lg = document.getElementById('legal');
  const tab = t => { lg.querySelectorAll('[data-tab]').forEach(b => b.setAttribute('aria-selected', b.dataset.tab === t)); lg.querySelectorAll('[data-pan]').forEach(p => p.hidden = p.dataset.pan !== t); };
  document.addEventListener('click', e => {
    const b = e.target.closest('[data-legal]'); if (b) { e.preventDefault(); tab(b.dataset.legal); if (!lg.open) lg.showModal(); return; }
    const t = e.target.closest('[data-tab]'); if (t) { tab(t.dataset.tab); return; }
    const ir = e.target.closest('[data-ir]'); if (ir) { e.preventDefault(); location.href = ir.dataset.ir; }
  });
  document.getElementById('legalX').addEventListener('click', () => lg.close());
  lg.addEventListener('click', e => { if (e.target === lg) lg.close(); });
  /* La Frontera: entrar con un enlace al correo */
  (() => { const d = document.getElementById('entrar'); if (!d) return; document.addEventListener('click', e => { if (e.target.closest('[data-entrar]')) { e.preventDefault(); document.getElementById('entA').hidden = false; document.getElementById('entB').hidden = true; document.getElementById('entE').textContent = ''; d.showModal(); } if (e.target.closest('[data-cierra-entrar]')) d.close(); if (e.target.closest('#entrar [data-cierra]')) d.close(); }); d.addEventListener('click', e => { if (e.target === d) d.close(); }); document.getElementById('entF').addEventListener('submit', e => { e.preventDefault(); const c = document.getElementById('entC').value.trim(); if (!/^\S+@\S+\.\S+$/.test(c)) { document.getElementById('entE').textContent = 'Escribe un correo válido.'; return; } document.getElementById('entBp').textContent = `Te escribiremos a ${c} en cuanto abramos La Frontera.`; TF.enviar('la-frontera', { correo: c }); document.getElementById('entA').hidden = true; document.getElementById('entB').hidden = false; }); })();
  document.documentElement.dataset.done = 1;
})();
</script>
<?php wp_footer(); ?>
</body>
</html>
