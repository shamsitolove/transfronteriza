/* Editar esta página. Solo lo carga quien puede editar.
   - Textos fijos de la web [data-tf] y campos de las fichas [data-tf-c] (tarjetas, historias, papers, encuentro, mecenas…): se escriben encima.
   - Fotos y vídeos [data-tf-img] [data-tf-vid] [data-tf-f]: se pulsan y se elige otro de la biblioteca.
   - Cada elemento de una lista [data-tf-item]: abrir su ficha, añadir otro o quitarlo de la web.
   - Secciones [data-tf-sec]: ocultar o mostrar, y enlace a su lista del panel. */
(() => {
  const E = window.TF_ED; if (!E) return;
  const $$ = s => [...document.querySelectorAll(s)];
  const el = (tag, cls, html) => { const n = document.createElement(tag); if (cls) n.className = cls; if (html != null) n.innerHTML = html; return n; };
  const plano = (() => { const d = document.createElement('div'); d.contentEditable = 'plaintext-only'; return d.contentEditable === 'plaintext-only'; })();
  const NOMBRE = { tf_tarjeta: 'tarjeta', tf_historia: 'historia', tf_perfil: 'perfil', tf_ciudad: 'ciudad', tf_paper: 'paper', tf_persona: 'persona', tf_cifra: 'cifra', tf_apoyo: 'logo', tf_documento: 'documento', tf_informe: 'informe' };
  let on = false, ocultas = new Set(E.ocultas || []), secCambio = false;
  const cambios = { textos: {}, imgs: {}, contenido: {}, fotos: {} }, quitar = new Set();

  /* ---------- botón para empezar y barra de abajo ---------- */
  const abre = el('button', 'tfe-abre', '✎ Editar esta página'); abre.type = 'button';
  const barra = el('div', 'tfe-barra', `<p><b>Estás editando.</b> Pulsa en un texto para cambiarlo, o en una foto para elegir otra. Pasa por encima de una tarjeta, historia o paper para ver sus opciones. <span class="tfe-n"></span></p><div>${document.getElementById('legal') ? '<button type="button" class="tfe-legal">Textos legales</button>' : ''}<button type="button" class="tfe-sal">Salir sin guardar</button><button type="button" class="tfe-guarda" disabled>Guardar y publicar</button></div>`);
  barra.hidden = true;
  const capa = el('div', 'tfe-capa'); capa.hidden = true;
  document.body.append(abre, barra, capa);
  const aviso = t => { const a = el('div', 'tfe-aviso', t); document.body.appendChild(a); setTimeout(() => a.remove(), 3600); };
  const nCambios = () => Object.keys(cambios.textos).length + Object.keys(cambios.imgs).length + Object.keys(cambios.contenido).length + Object.keys(cambios.fotos).length + quitar.size + (secCambio ? 1 : 0);
  const cuenta = () => { const n = nCambios(); barra.querySelector('.tfe-n').textContent = n ? `${n} ${n > 1 ? 'cambios' : 'cambio'} sin guardar.` : ''; barra.querySelector('.tfe-guarda').disabled = !n; };

  /* ---------- textos ---------- */
  const EDITABLE = '[data-tf],[data-tf-c]';
  const unaLinea = n => n.hasAttribute('data-tf-c') || /^(A|BUTTON|H1|H2|H3|H4|SMALL|B|STRONG|SPAN|LABEL)$/.test(n.tagName);
  const alEscribir = e => {
    const n = e.target.closest?.(EDITABLE); if (!n) return;
    if (n.hasAttribute('data-tf')) {
      const k = n.dataset.tf; cambios.textos[k] = n.innerHTML;
      $$(`[data-tf="${k}"]`).forEach(o => { if (o !== n) o.innerHTML = n.innerHTML; });
    } else {
      const k = n.dataset.tfC; cambios.contenido[k] = n.innerText.replace(/\s+/g, ' ').trim();
      $$(`[data-tf-c="${k}"]`).forEach(o => { if (o !== n) o.textContent = n.innerText; });
    }
    cuenta(); ponOriginal(n);
  };
  const alTeclear = e => {
    const n = e.target.closest?.(EDITABLE); if (!n || !on) return;
    if (e.key === 'Enter') { e.preventDefault(); if (!unaLinea(n)) document.execCommand('insertLineBreak'); }
    if (e.key === ' ' && n.closest('button,a')) { e.preventDefault(); document.execCommand('insertText', false, ' '); }
  };
  const alPegar = e => { const n = e.target.closest?.(EDITABLE); if (!n || !on) return; e.preventDefault(); document.execCommand('insertText', false, (e.clipboardData || window.clipboardData).getData('text/plain').replace(/\s+/g, ' ')); };
  /* «volver al original», junto a un texto fijo que tiene cambios */
  let btnOrig = null;
  const ponOriginal = n => {
    btnOrig?.remove(); btnOrig = null; if (!n || !n.hasAttribute('data-tf')) return; const k = n.dataset.tf;
    const cambiado = k in cambios.textos ? cambios.textos[k] !== null : E.cambiados.includes(k);
    if (!cambiado || !(k in E.base)) return;
    btnOrig = el('button', 'tfe-orig', '↺ Volver al texto original'); btnOrig.type = 'button';
    btnOrig.addEventListener('mousedown', ev => ev.preventDefault());
    btnOrig.addEventListener('click', () => { $$(`[data-tf="${k}"]`).forEach(o => o.innerHTML = E.base[k]); cambios.textos[k] = null; cuenta(); btnOrig.remove(); btnOrig = null; });
    const r = n.getBoundingClientRect(); btnOrig.style.top = (r.top + scrollY - 34) + 'px'; btnOrig.style.left = (r.left + scrollX) + 'px';
    capa.appendChild(btnOrig);
  };

  /* ---------- fotos y vídeos, con la biblioteca de WordPress ---------- */
  const medio = n => n.closest('[data-tf-img],[data-tf-f]') || (n.tagName === 'VIDEO' && (n.matches('[data-tf-vid]') || n.querySelector('[data-tf-vid]')) ? n : null);
  const bajoPuntero = (x, y) => { for (const n of document.elementsFromPoint(x, y)) { if (n.closest('.tfe-barra,.tfe-capa')) return null; const m = medio(n); if (m) return m; } return null; };
  const elige = (tipo, fn) => {
    if (!window.wp?.media) { aviso('No se ha podido abrir la biblioteca. Recarga la página.'); return; }
    const f = wp.media({ title: tipo === 'video' ? 'Elige un vídeo' : 'Elige una foto', library: { type: tipo }, button: { text: 'Usar esta' }, multiple: false });
    f.on('select', () => fn(f.state().get('selection').first().toJSON())); f.open();
  };
  const imgDe = m => m.tagName === 'IMG' ? m : m.querySelector('img');
  const ponMedio = (m, url) => {
    if (m.tagName !== 'VIDEO') { const i = imgDe(m); if (!i) return; i.removeAttribute('srcset'); i.removeAttribute('sizes'); i.src = url; return; }
    const s = m.querySelector('source[data-tf-vid]'); if (s) s.src = url; else m.src = url; m.removeAttribute('poster'); m.load(); m.play?.().catch(() => {});
  };
  let menu = null;
  const quitaMenu = () => { menu?.remove(); menu = null; };
  const menuMedio = (m, x, y) => {
    quitaMenu(); const esVid = m.tagName === 'VIDEO', ficha = m.dataset.tfF;
    const k = ficha || m.dataset.tfImg || m.dataset.tfVid || m.querySelector('[data-tf-vid]')?.dataset.tfVid, def = ficha ? null : E.imgs[k];
    const cambiada = !ficha && (k in cambios.imgs ? cambios.imgs[k] !== null : E.imgsCambiadas.includes(k));
    menu = el('div', 'tfe-menu', `<button type="button" data-a="elige">${esVid ? 'Elegir otro vídeo' : 'Elegir otra foto'}</button>${cambiada && def ? `<button type="button" data-a="orig">${esVid ? 'Volver al vídeo original' : 'Volver a la foto original'}</button>` : ''}`);
    menu.style.top = (y + scrollY + 8) + 'px'; menu.style.left = Math.min(x + scrollX, scrollX + innerWidth - 250) + 'px';
    menu.addEventListener('click', ev => {
      const a = ev.target.closest('button')?.dataset.a; if (!a) return; quitaMenu();
      if (a === 'orig') { ponMedio(m, def); cambios.imgs[k] = null; cuenta(); return; }
      elige(esVid ? 'video' : 'image', at => {
        const url = esVid ? at.url : (at.sizes?.large?.url || at.sizes?.full?.url || at.url);
        if (ficha) { $$(`[data-tf-f="${ficha}"]`).forEach(o => ponMedio(o, url)); cambios.fotos[ficha] = at.id; }
        else { ponMedio(m, url); cambios.imgs[k] = url; }
        cuenta();
      });
    });
    capa.appendChild(menu);
  };

  /* ---------- cada tarjeta, historia, paper…: su ficha, añadir otra o quitarla ---------- */
  let fichaItem = null, itemAct = null;
  const colocaItem = () => { if (!fichaItem || !itemAct) return; const r = itemAct.getBoundingClientRect(); if (!r.width) { fichaItem.remove(); fichaItem = null; itemAct = null; return; } const hh = cabecera(), arriba = r.top - 42 > hh + 4; fichaItem.style.top = (r.top + scrollY + (arriba ? -42 : 8)) + 'px'; fichaItem.style.left = (Math.min(Math.max(r.left, 8), innerWidth - fichaItem.offsetWidth - 8) + scrollX) + 'px'; };
  const ponItem = it => {
    if (itemAct === it) return; fichaItem?.remove(); fichaItem = null; itemAct = it; if (!it) return;
    const id = it.dataset.tfItem, tipo = it.dataset.tfTipo, q = quitar.has(id), nom = NOMBRE[tipo] || 'elemento';
    fichaItem = el('div', 'tfe-item', `<a href="${E.ficha}${id}" target="_blank" rel="noopener">Abrir su ficha ↗</a><a href="${E.nueva}${tipo}" target="_blank" rel="noopener">+ Añadir ${nom}</a><button type="button" data-a="quita">${q ? 'Volver a mostrar' : 'Quitar de la web'}</button>`);
    fichaItem.querySelector('[data-a=quita]').addEventListener('click', () => {
      quitar.has(id) ? quitar.delete(id) : quitar.add(id);
      $$(`[data-tf-item="${id}"]`).forEach(x => x.classList.toggle('tfe-quitado', quitar.has(id))); cuenta(); const i = itemAct; itemAct = null; ponItem(i);
    });
    capa.appendChild(fichaItem); colocaItem();
  };
  document.addEventListener('mouseover', e => { if (!on || e.target.closest?.('.tfe-capa,.tfe-barra')) return; const it = e.target.closest?.('[data-tf-item]'); if (it) ponItem(it); }, true);

  /* ---------- secciones: ocultar, mostrar y lo que se edita en el panel ---------- */
  const fichas = [];
  const ponFichas = () => {
    fichas.forEach(f => f.remove()); fichas.length = 0;
    $$('[data-tf-sec]').forEach(s => {
      const id = s.dataset.tfSec, oculta = ocultas.has(id); s.classList.toggle('tfe-oculta', oculta);
      const f = el('div', 'tfe-ficha', `${oculta ? '<span class="tfe-est">Oculta para el público</span>' : ''}<button type="button" data-a="ver">${oculta ? 'Mostrar sección' : 'Ocultar sección'}</button>${s.dataset.tfPanel ? `<a href="${E.admin}${s.dataset.tfPanel}" target="_blank" rel="noopener">${s.dataset.tfPanelT} ↗</a>` : ''}`);
      f.addEventListener('click', ev => { if (ev.target.closest('[data-a="ver"]')) { oculta ? ocultas.delete(id) : ocultas.add(id); secCambio = true; cuenta(); ponFichas(); } });
      f._s = s; capa.appendChild(f); fichas.push(f);
    });
    colocaFichas();
  };
  /* cada ficha se queda en la esquina de su sección, siempre por debajo de la cabecera fija */
  const cabecera = () => { const t = document.querySelector('.top'); const r = t?.getBoundingClientRect(); return r && r.bottom > 0 ? r.bottom : (document.getElementById('wpadminbar')?.offsetHeight || 0); };
  const colocaFichas = () => { const hh = cabecera(); fichas.forEach(f => { const r = f._s.getBoundingClientRect(); f.style.display = r.height < 40 ? 'none' : ''; const y = Math.min(Math.max(r.top + 14, hh + 10), r.bottom - 56); f.style.top = (y + scrollY) + 'px'; f.style.left = (r.right + scrollX - f.offsetWidth - 12) + 'px'; }); };
  let rafF = 0; addEventListener('scroll', () => { if (on && !rafF) rafF = requestAnimationFrame(() => { rafF = 0; colocaFichas(); colocaItem(); }); }, { passive: true });

  /* ---------- mientras se edita, los enlaces y botones de la página no hacen nada ---------- */
  const PASAN = '[data-tab],[data-cierra],dialog .x,.pun,.ciuM button,.freq button,.filtros button,.plega summary,.mnu,.mnuP a';
  const alPulsar = e => {
    if (!on || e.target.closest('.tfe-barra,.tfe-capa,.media-modal,.media-modal-backdrop,#wpadminbar')) return;
    if (e.target.closest(PASAN)) return; // lo que solo cambia lo que se ve (pestañas, ciudades, filtros…) sigue funcionando
    const texto = e.target.closest(EDITABLE), m = texto ? null : bajoPuntero(e.clientX, e.clientY);
    const it = e.target.closest('[data-tf-item]'); if (it) ponItem(it);
    if (m) { e.preventDefault(); e.stopPropagation(); menuMedio(m, e.clientX, e.clientY); return; }
    quitaMenu();
    if (e.target.closest('a,button,label,summary,[data-flujo],[data-abre],[data-ir],[data-legal],.perfil,.ht,.pc,.ir,.paper,.mb,.libro')) { e.preventDefault(); e.stopPropagation(); }
    ponOriginal(texto);
  };
  const noEnviar = e => { if (on) { e.preventDefault(); e.stopPropagation(); } };

  const entra = () => {
    on = true; document.body.classList.add('tf-editando'); abre.hidden = true; barra.hidden = false; capa.hidden = false;
    $$('[data-tf]').forEach(n => { n.contentEditable = 'true'; n.spellcheck = true; });
    $$('[data-tf-c]').forEach(n => { n.contentEditable = plano ? 'plaintext-only' : 'true'; n.spellcheck = true; });
    $$('video').forEach(v => { if (medio(v)) v.pause(); });
    ponFichas(); cuenta();
  };
  const sale = () => {
    on = false; document.body.classList.remove('tf-editando'); abre.hidden = false; barra.hidden = true; capa.hidden = true;
    $$(EDITABLE).forEach(n => n.removeAttribute('contenteditable')); quitaMenu(); btnOrig?.remove();
    fichas.forEach(f => f.remove()); fichas.length = 0; fichaItem?.remove(); fichaItem = null; itemAct = null;
  };
  abre.addEventListener('click', entra);
  barra.querySelector('.tfe-legal')?.addEventListener('click', () => { const d = document.getElementById('legal'); if (d && !d.open) d.showModal(); });
  barra.querySelector('.tfe-sal').addEventListener('click', () => { if (nCambios() && !confirm('¿Salir sin guardar? Se perderán los cambios.')) return; if (nCambios()) location.reload(); else sale(); });
  barra.querySelector('.tfe-guarda').addEventListener('click', async ev => {
    const b = ev.currentTarget; b.disabled = true; b.textContent = 'Guardando…';
    try {
      const r = await fetch(E.api, { method: 'POST', credentials: 'same-origin', headers: { 'Content-Type': 'application/json', 'X-WP-Nonce': E.nonce }, body: JSON.stringify({ pagina: E.pagina, textos: cambios.textos, imgs: cambios.imgs, contenido: cambios.contenido, fotos: cambios.fotos, quitar: [...quitar], ocultas: secCambio ? [...ocultas] : undefined }) });
      if (!r.ok) throw new Error(r.status);
      Object.entries(cambios.textos).forEach(([k, v]) => { const i = E.cambiados.indexOf(k); if (v === null) { if (i > -1) E.cambiados.splice(i, 1); } else if (i < 0) E.cambiados.push(k); });
      Object.entries(cambios.imgs).forEach(([k, v]) => { const i = E.imgsCambiadas.indexOf(k); if (v === null) { if (i > -1) E.imgsCambiadas.splice(i, 1); } else if (i < 0) E.imgsCambiadas.push(k); });
      quitar.forEach(id => $$(`[data-tf-item="${id}"]`).forEach(x => x.hidden = true));
      cambios.textos = {}; cambios.imgs = {}; cambios.contenido = {}; cambios.fotos = {}; quitar.clear(); secCambio = false; E.ocultas = [...ocultas];
      sale(); aviso('Guardado. Ya lo ve todo el mundo.');
    } catch (err) { aviso('No se ha podido guardar. Revisa la conexión y vuelve a intentarlo.'); }
    b.textContent = 'Guardar y publicar'; cuenta();
  });
  document.addEventListener('input', e => { if (on) alEscribir(e); });
  document.addEventListener('keydown', alTeclear, true);
  document.addEventListener('paste', alPegar, true);
  document.addEventListener('click', alPulsar, true);
  document.addEventListener('submit', noEnviar, true);
  addEventListener('resize', () => { if (on) { colocaFichas(); colocaItem(); } });
  new ResizeObserver(() => { if (on) { colocaFichas(); colocaItem(); } }).observe(document.body);
  addEventListener('beforeunload', e => { if (on && nCambios()) { e.preventDefault(); e.returnValue = ''; } });
  if (new URLSearchParams(location.search).get('tf_editar') === '1') { history.replaceState(null, '', location.pathname + location.hash); entra(); }
  /* el botón de la barra de administración también entra en el modo edición, sin recargar */
  document.querySelector('#wp-admin-bar-tf_editar a')?.addEventListener('click', e => { e.preventDefault(); if (!on) entra(); });
})();
