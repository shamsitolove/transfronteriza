<?php
if (!defined('ABSPATH')) exit;
define('TF_U', get_template_directory_uri());

add_action('after_setup_theme', function () {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
});

/* La web nueva no carga los estilos ni scripts del tema viejo ni de otros plugins: solo lo suyo. */
add_action('wp_enqueue_scripts', function () {
	global $wp_styles, $wp_scripts;
	foreach ((array) ($wp_styles->queue ?? []) as $h) if (!in_array($h, ['admin-bar', 'dashicons'], true)) wp_dequeue_style($h);
	foreach ((array) ($wp_scripts->queue ?? []) as $h) if (!in_array($h, ['admin-bar'], true)) wp_dequeue_script($h);
}, 9999);
/* El optimizador de imágenes del sitio (EWWW) cambia cada <img> por un marcador que luego rellena su script.
   Como aquí no se cargan scripts ajenos, las imágenes se quedaban vacías: se le pide que no toque estas páginas
   (ya usan la carga diferida del propio navegador). */
add_filter('eio_do_lazyload', '__return_false', 99);
add_filter('eio_do_js_webp', '__return_false', 99);
add_filter('eio_do_picture_webp', '__return_false', 99);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
add_filter('show_admin_bar', function ($s) { return $s && current_user_can('edit_posts'); });

/* ---------- ayudas ---------- */
function tf_estados() { return current_user_can('edit_posts') ? ['publish', 'draft', 'pending', 'future'] : ['publish']; }
function tf_q($tipo, $args = []) {
	return get_posts(array_merge(['post_type' => $tipo, 'post_status' => tf_estados(), 'numberposts' => -1, 'orderby' => ['menu_order' => 'ASC', 'date' => 'DESC']], $args));
}
function tf_campo($k, $id = null) { return function_exists('get_field') ? get_field($k, $id) : get_post_meta($id, $k, true); }
function tf_op($k, $def = '') { $v = function_exists('get_field') ? get_field($k, 'option') : ''; return ($v === null || $v === '' || $v === false) ? $def : $v; }
function tf_foto($id, $tam = 'large') { $u = get_the_post_thumbnail_url($id, $tam); return $u ?: ''; }
/* enlaces a páginas: si aún son borrador, el enlace de vista previa (solo lo ve quien edita) */
function tf_pagina($slug) {
	$p = get_page_by_path($slug, OBJECT, 'page');
	if (!$p) { $b = get_posts(['post_type' => 'page', 'name' => $slug, 'post_status' => tf_estados(), 'numberposts' => 1]); $p = $b[0] ?? null; }
	if (!$p) return home_url("/$slug/");
	return $p->post_status === 'publish' ? get_permalink($p) : (current_user_can('edit_posts') ? add_query_arg(['page_id' => $p->ID, 'preview' => 'true'], home_url('/')) : home_url("/$slug/"));
}
function tf_enlaces($html) {
	return strtr($html, [
		'href="index.html#' => 'href="' . esc_url(home_url('/')) . '#',
		'href="index.html"' => 'href="' . esc_url(home_url('/')) . '"',
		'href="comunidad.html"' => 'href="' . esc_url(tf_pagina('comunidad')) . '"',
		'href="futuros.html"' => 'href="' . esc_url(tf_pagina('futuros')) . '"',
		"data-ir=\"futuros.html#leer-informe\"" => 'data-ir="' . esc_url(tf_pagina('futuros')) . '#leer-informe"',
	]);
}

/* ---------- lo que comparten todas las páginas: datos y envío de formularios ---------- */
function tf_script_base($datos) {
	$datos['api'] = esc_url_raw(rest_url('tf/v1/formulario'));
	echo '<script>window.TF=' . wp_json_encode($datos, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . ';';
	echo 'TF.enviar=(tipo,datos)=>{try{fetch(TF.api,{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify({tipo,datos})}).catch(()=>{})}catch(e){}};';
	echo 'TF.leer=f=>{const o={};f.querySelectorAll("input,textarea,select").forEach(i=>{if(/-ok$/.test(i.id)){if(i.checked)o.privacidad="Aceptada"}else if(i.type==="checkbox"||i.type==="radio"){if(i.checked){const k=i.name||"opciones",t=i.value&&i.value!=="on"?i.value:(i.closest("label")?.textContent||"").trim();o[k]=o[k]?o[k]+", "+t:t}}else if(i.value&&i.type!=="hidden")o[(i.id||i.name||"campo").replace(/^[a-z]+-/,"")]=i.value});return o};';
	echo '</script>';
}

/* ---------- Home ---------- */
function tf_datos_home() {
	$t = array_map(function ($p) { return ['id' => $p->ID, 'foto' => tf_foto($p->ID), 'nombre' => get_the_title($p), 'edad' => tf_campo('edad', $p->ID), 'ciudad' => tf_campo('ciudad', $p->ID), 'frase' => tf_campo('frase', $p->ID)]; }, tf_q('tf_tarjeta'));
	return ['tarjetas' => $t];
}
function tf_bandera($b) {
	if ($b === 'mundo') return '<span class="flag onu" title="Mundo" role="img" aria-label="Mundo"></span>';
	if ($b === 'ue') return '<span class="flag" title="Unión Europea"><svg viewBox="0 0 13 68" aria-label="Unión Europea"><rect width="13" height="68" fill="#003399"/><g fill="#FFCC00">' . implode('', array_map(function ($y) { $p = []; for ($j = 0; $j < 10; $j++) { $r = $j % 2 ? 1.75 : 4.3; $a = $j / 10 * 2 * M_PI - M_PI / 2; $p[] = round(6.5 + cos($a) * $r, 2) . ',' . round($y + sin($a) * $r, 2); } return '<polygon points="' . implode(' ', $p) . '"/>'; }, [17, 34, 51])) . '</g></svg></span>';
	return '<span class="flag" title="España"><svg viewBox="0 0 13 68" aria-label="España"><rect width="13" height="68" fill="#AA151B"/><rect y="17" width="13" height="34" fill="#F1BF00"/></svg></span>';
}
function tf_cifras() {
	echo '<ol class="nums">';
	foreach (tf_q('tf_cifra') as $p) echo '<li data-tf-item="' . $p->ID . '" data-tf-tipo="tf_cifra"><b>' . tf_bandera(tf_campo('bandera', $p->ID)) . '<span data-tf-c="p' . $p->ID . '.titulo">' . esc_html(get_the_title($p)) . '</span></b><p data-tf-c="p' . $p->ID . '.texto">' . esc_html(tf_campo('texto', $p->ID)) . '</p><small data-tf-c="p' . $p->ID . '.fuente">' . esc_html(tf_campo('fuente', $p->ID)) . '</small></li>';
	echo '</ol>';
}
function tf_apoyos() {
	echo '<ul class="logos">';
	foreach (tf_q('tf_apoyo') as $p) {
		$img = '<img src="' . esc_url(tf_foto($p->ID, 'medium_large')) . '" alt="' . esc_attr(get_the_title($p)) . '" style="height:' . (int) (tf_campo('altura', $p->ID) ?: 44) . 'px" data-tf-f="p' . $p->ID . '">';
		$u = tf_campo('enlace', $p->ID);
		echo '<li data-tf-item="' . $p->ID . '" data-tf-tipo="tf_apoyo">' . ($u ? '<a href="' . esc_url($u) . '" target="_blank" rel="noopener">' . $img . '</a>' : $img) . '</li>';
	}
	echo '</ul>';
}

/* ---------- Futuros ---------- */
function tf_persona($id) {
	if (!$id) return ['', '', '', ''];
	return [get_the_title($id), tf_campo('cargo', $id), tf_campo('bio', $id), tf_foto($id, 'medium_large')];
}
function tf_informe_actual() { $i = tf_q('tf_informe', ['numberposts' => 1, 'orderby' => 'date', 'order' => 'DESC']); return $i[0] ?? null; }
function tf_datos_futuros() {
	$autores = []; $papers = [];
	foreach (tf_q('tf_paper', ['orderby' => 'date', 'order' => 'DESC']) as $p) {
		$a = (int) tf_campo('autor', $p->ID); $k = $a ? 'p' . $a : 'anon';
		if (!isset($autores[$k])) $autores[$k] = tf_persona($a);
		$temas = wp_get_post_terms($p->ID, 'tf_tema', ['fields' => 'names']);
		$papers[] = ['pid' => $p->ID, 'id' => $p->post_name ?: 'paper-' . $p->ID, 't' => $temas[0] ?? '', 'h' => get_the_title($p), 'a' => $k, 'd' => date_i18n('F \d\e Y', strtotime($p->post_date)), 'lead' => tf_campo('entradilla', $p->ID), 'html' => apply_filters('the_content', $p->post_content), 'banda' => tf_foto($p->ID, 'full'), 'pdf' => tf_campo('pdf', $p->ID)];
	}
	$inf = tf_informe_actual(); $INF = null;
	if ($inf) {
		$claves = array_map(function ($c) { return [$c['numero'] ?? '', $c['texto'] ?? '']; }, (array) (tf_campo('claves', $inf->ID) ?: []));
		$INF = ['pid' => $inf->ID, 'id' => 'informe', 'informe' => true, 'h' => get_the_title($inf), 'd' => get_the_date('Y', $inf) ? 'Informe anual ' . get_the_date('Y', $inf) : '', 'lead' => tf_campo('entradilla', $inf->ID), 'html' => apply_filters('the_content', $inf->post_content), 'portada' => tf_foto($inf->ID, 'full'), 'pdf' => tf_campo('pdf', $inf->ID), 'claves' => $claves];
	}
	$consejo = array_map(function ($p) { return [tf_foto($p->ID, 'medium_large'), get_the_title($p), tf_campo('cargo', $p->ID), tf_campo('bio', $p->ID), $p->ID]; }, tf_q('tf_persona', ['tax_query' => [['taxonomy' => 'tf_grupo', 'field' => 'slug', 'terms' => 'consejo']]]));
	return ['autores' => (object) $autores, 'papers' => $papers, 'informe' => $INF, 'consejo' => $consejo];
}
function tf_filtros() {
	echo '<div class="filtros" id="filtros" role="group" aria-label="Filtrar por tema"><button type="button" data-t="todos" aria-pressed="true">Todos</button>';
	foreach (get_terms(['taxonomy' => 'tf_tema', 'hide_empty' => false]) as $t) echo '<button type="button" data-t="' . esc_attr($t->name) . '" aria-pressed="false">' . esc_html($t->name) . '</button>';
	echo '</div>';
}
function tf_informe_bloque() {
	$i = tf_informe_actual(); if (!$i) return;
	$claves = (array) (tf_campo('claves', $i->ID) ?: []); $pdf = tf_campo('pdf', $i->ID);
	$k = 'p' . $i->ID;
	echo '<div class="inf" data-tf-item="' . $i->ID . '" data-tf-tipo="tf_informe"><button class="libro" type="button" data-abre="informe" aria-label="Leer el informe"><div class="cover"><img src="' . esc_url(tf_foto($i->ID, 'large')) . '" alt="" data-tf-f="' . $k . '"><div class="ct"><h3 data-tf-c="' . $k . '.titulo">' . esc_html(get_the_title($i)) . '</h3><img src="' . TF_U . '/logo/h-oscuro-34.svg" alt="Transfronteriza"></div></div></button>';
	echo '<div class="txt"><h2><span data-tf-c="' . $k . '.titulo">' . esc_html(get_the_title($i)) . '</span>.</h2><p data-tf-c="' . $k . '.entradilla">' . esc_html(tf_campo('entradilla', $i->ID)) . '</p><ul class="claves">';
	foreach (array_values($claves) as $n => $c) echo '<li><b data-tf-c="' . $k . '.claves.' . $n . '.numero">' . esc_html($c['numero'] ?? '') . '</b><p data-tf-c="' . $k . '.claves.' . $n . '.texto">' . esc_html($c['texto'] ?? '') . '</p></li>';
	echo '</ul><div class="acts"><button class="btn g" type="button" data-abre="informe">'; tf_tp('p-leer-informe', 'Leer el informe'); echo '</button>' . ($pdf ? '<a class="btn l" href="' . esc_url($pdf) . '" download>' . tf_tp('p-descargar-pdf', 'Descargar PDF', false) . '</a>' : '') . '</div></div></div>';
}
function tf_documentos() {
	echo '<ul class="docs">';
	foreach (tf_q('tf_documento') as $p) {
		$u = tf_campo('archivo', $p->ID); if (!$u) continue;
		echo '<li data-tf-item="' . $p->ID . '" data-tf-tipo="tf_documento"><a href="' . esc_url($u) . '" target="_blank" rel="noopener"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 2.5h8l4.5 4.5v14.5H6z" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/><path d="M14 2.5V7h4.5" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg><b data-tf-c="p' . $p->ID . '.titulo">' . esc_html(get_the_title($p)) . '</b><span>' . esc_html(strtoupper(pathinfo(parse_url($u, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'PDF')) . '</span></a></li>';
	}
	echo '</ul>';
}

/* ---------- Comunidad ---------- */
function tf_globo($lat, $lon) {
	$L0 = deg2rad(-3.4); $P0 = deg2rad(38.3); $R = 3700; $C = 500;
	$l = deg2rad((float) $lon); $p = deg2rad((float) $lat);
	$x = $R * cos($p) * sin($l - $L0); $y = $R * (cos($P0) * sin($p) - sin($P0) * cos($p) * cos($l - $L0));
	return [round(($C - $x) / 10, 2), round(($C + $y) / 10, 2)];
}
/* vídeo de Vimeo: basta con pegar el enlace; la proporción y la portada las pide a Vimeo una vez por semana */
function tf_vimeo($url) {
	if (!$url || !preg_match('#vimeo\.com/(?:video/)?(\d+)#', $url, $m)) return null;
	$k = 'tf_vimeo_' . $m[1]; $d = get_transient($k);
	if ($d === false) {
		$r = wp_remote_get('https://vimeo.com/api/oembed.json?url=' . rawurlencode('https://vimeo.com/' . $m[1]) . '&width=1280', ['timeout' => 6]);
		$j = is_wp_error($r) ? null : json_decode(wp_remote_retrieve_body($r), true);
		$d = $j && !empty($j['width']) ? ['r' => round($j['width'] / max(1, $j['height']), 4), 'p' => $j['thumbnail_url'] ?? ''] : ['r' => 16 / 9, 'p' => ''];
		set_transient($k, $d, $j ? WEEK_IN_SECONDS : HOUR_IN_SECONDS);
	}
	return ['vm' => $m[1], 'vr' => $d['r'], 'poster' => $d['p']];
}
function tf_encuadre($id) { return ['izquierda' => .3, 'derecha' => .64][tf_campo('encuadre', $id)] ?? .5; }
function tf_datos_comunidad() {
	$perf = array_map(function ($p) {
		$d = ['id' => $p->ID, 'f' => tf_foto($p->ID, 'large'), 'n' => get_the_title($p), 'r' => tf_campo('rol', $p->ID), 'q' => tf_campo('frase', $p->ID), 'v' => tf_campo('video', $p->ID) ?: ''];
		if (!$d['v'] && ($v = tf_vimeo(tf_campo('vimeo', $p->ID)))) { $d += ['vm' => $v['vm'], 'vr' => $v['vr'], 'fx' => tf_encuadre($p->ID)]; if (!$d['f']) $d['f'] = $v['poster']; }
		return $d;
	}, tf_q('tf_perfil'));
	$ciu = [];
	foreach (tf_q('tf_ciudad') as $p) {
		[$x, $y] = tf_globo(tf_campo('latitud', $p->ID), tf_campo('longitud', $p->ID)); $e = tf_campo('etiqueta', $p->ID);
		$ciu[$p->post_name ?: 'c' . $p->ID] = ['id' => $p->ID, 'n' => get_the_title($p), 'txt' => tf_campo('texto', $p->ID), 'foto' => tf_foto($p->ID, 'large'), 'x' => $x, 'y' => $y, 'sede' => tf_campo('sede', $p->ID) ? 1 : 0, 'izq' => $e === 'izquierda' ? 1 : 0, 'arr' => $e === 'arriba' ? 1 : 0];
	}
	$his = array_map(function ($p) {
		$v = tf_campo('video', $p->ID); $f = tf_foto($p->ID, 'large'); $h = ['id' => $p->ID, 'n' => get_the_title($p)];
		if ($v) { $h['v'] = $v; $h['p'] = $f; }
		elseif ($vm = tf_vimeo(tf_campo('vimeo', $p->ID))) { $h += ['vm' => $vm['vm'], 'vr' => $vm['vr'], 'f' => $f ?: $vm['poster']]; if ($vm['vr'] > 1) $h['fx'] = tf_encuadre($p->ID); }
		elseif ($f) $h['f'] = $f;
		if ($q = tf_campo('frase', $p->ID)) $h['q'] = $q;
		return ($h['v'] ?? $h['vm'] ?? $h['f'] ?? $h['q'] ?? null) ? $h : null;
	}, tf_q('tf_historia'));
	$his = array_values(array_filter($his));
	$lista = function ($k, $def) { $v = array_values(array_filter(array_map('intval', explode(',', (string) tf_op($k, ''))))); return count($v) === 3 ? $v : $def; };
	$lin = function ($k, $def) { $v = array_values(array_filter(array_map('trim', explode("\n", (string) tf_op($k, ''))))); return count($v) >= 3 ? array_slice($v, 0, 3) : $def; };
	return [
		'perfiles' => $perf, 'ciudades' => (object) $ciu, 'historias' => $his,
		'encuentro' => ['fecha' => tf_op('enc_fecha', '2027-09-17T10:00:00')],
		'mecenas' => [
			'desgrava' => (bool) tf_op('mec_desgrava', false),
			'pre' => ['mes' => $lista('mec_mes', [10, 20, 50]), 'ano' => $lista('mec_ano', [60, 120, 240]), 'vez' => $lista('mec_vez', [30, 60, 120])],
			'logro' => $lin('mec_impacto', ['Pagas un mes de quedadas de la comunidad de una ciudad: el sitio, la merienda y los materiales.', 'Una joven transfronteriza viene al encuentro de Sierra Nevada con todo pagado.', '{n} jóvenes transfronterizas vienen al encuentro con todo pagado y su voz llega a Futuros.']),
		],
	];
}
function tf_encuentro_bloque() {
	echo '<div class="anual"><figure class="af"><img src="' . esc_url(tf_op('enc_foto', TF_U . '/img/comunidad/grupo.jpg')) . '" alt="La comunidad reunida en Jérez del Marquesado, con Sierra Nevada al fondo." loading="lazy" data-tf-f="o.enc_foto"></figure><div class="at">';
	echo '<h2 data-tf-c="o.enc_titulo">' . esc_html(tf_op('enc_titulo', 'Nos vemos en Sierra Nevada.')) . '</h2><p class="lead" data-tf-c="o.enc_texto">' . esc_html(tf_op('enc_texto', 'Cada septiembre, la comunidad se junta tres días en la finca Las Viñas, en Jérez del Marquesado. Talleres, música, montaña y noches largas de conversación.')) . '</p>';
	echo '<p class="cuenta" id="cuenta"></p><div class="acts"><button class="btn p" type="button" data-flujo="anual">'; tf_tp('p-quiero-ir', 'Quiero ir'); echo '</button><button class="enl" type="button" data-flujo="aviso">'; tf_tp('p-avisame', 'Avísame cuando abran las plazas'); echo '</button></div></div></div>';
}
function tf_mecenas_intro() {
	$foto = tf_op('mec_foto', TF_U . '/img/comunidad/mecenas.jpg');
	echo '<figure class="foto"><img src="' . esc_url($foto) . '" alt="Jóvenes de la comunidad sentados al sol en una calle de pueblo." loading="lazy" data-tf-f="o.mec_foto"></figure>';
	echo '<h2 data-tf-c="o.mec_titular">' . esc_html(tf_op('mec_titular', 'Talento hay de sobra. Lo que falta es poder llegar.')) . '</h2>';
	echo '<p class="sub2" data-tf-c="o.mec_texto">' . esc_html(tf_op('mec_texto', 'Muchas jóvenes transfronterizas crecen en hogares humildes, hijas de padres que llegaron con lo justo. Con tu ayuda vienen a los encuentros, hacen comunidad en su ciudad y su voz llega a Futuros.')) . '</p>';
}
/* los datos que respaldan la donación, plegables en el móvil */
function tf_mecenas_datos() {
	$porque = (array) (tf_op('mec_porque', []) ?: []);
	if ($porque) {
		echo '<details class="porque plega" open><summary><h3>Por qué importa lo que das.</h3></summary><ul>';
		foreach (array_values($porque) as $n => $d) echo '<li><b data-tf-c="o.mec_porque.' . $n . '.numero">' . esc_html($d['numero']) . '</b><p data-tf-c="o.mec_porque.' . $n . '.texto">' . esc_html($d['texto']) . '</p>' . ($d['fuente'] ? '<small data-tf-c="o.mec_porque.' . $n . '.fuente">' . esc_html($d['fuente']) . '</small>' : '') . '</li>';
		echo '</ul></details>';
	}
	$rep = (array) (tf_op('mec_reparto', []) ?: []); $col = ['fuego' => 'var(--fuego)', 'oro' => 'var(--oro)', 'hoja' => '#5E8F4E', 'tinta' => 'var(--tinta)'];
	if ($rep) {
		echo '<details class="trans plega" open><summary><h3>Sabes a dónde va cada euro.</h3></summary><div class="bar" aria-hidden="true">'; foreach ($rep as $r) echo '<i style="width:' . (float) $r['porcentaje'] . '%;background:' . ($col[$r['color']] ?? 'var(--oro)') . '"></i>';
		echo '</div><ul>'; foreach (array_values($rep) as $n => $r) echo '<li><b><i style="background:' . ($col[$r['color']] ?? 'var(--oro)') . '"></i><span data-tf-c="o.mec_reparto.' . $n . '.porcentaje">' . esc_html($r['porcentaje']) . '</span> %</b><span data-tf-c="o.mec_reparto.' . $n . '.titulo">' . esc_html($r['titulo']) . '</span><small data-tf-c="o.mec_reparto.' . $n . '.texto">' . esc_html($r['texto']) . '</small></li>'; echo '</ul></details>';
	}
}

/* Cada paper tiene su enlace propio: lleva a Futuros y lo abre en el lector */
add_action('template_redirect', function () {
	if (is_singular('tf_paper')) { wp_safe_redirect(tf_pagina('futuros') . '#' . get_post_field('post_name', get_queried_object_id())); exit; }
	if (is_singular('tf_informe')) { wp_safe_redirect(tf_pagina('futuros') . '#leer-informe'); exit; }
});

/* =========================================================
 * Editar esta página: textos, fotos, vídeos y secciones se cambian desde la propia web.
 * Los textos originales están en textos-base.php; lo cambiado se guarda aparte y tiene prioridad.
 * ========================================================= */
function tf_permitido() { return ['b' => [], 'strong' => [], 'i' => [], 'em' => [], 'br' => [], 'mark' => [], 'sup' => [], 'sub' => [], 'span' => ['class' => true], 'a' => ['href' => true, 'target' => true, 'rel' => true]]; }
function tf_base_php() { return ['p-leer-informe' => 'Leer el informe', 'p-descargar-pdf' => 'Descargar PDF', 'p-quiero-ir' => 'Quiero ir', 'p-avisame' => 'Avísame cuando abran las plazas']; }
function tf_base() { static $b = null; if ($b === null) { $f = __DIR__ . '/textos-base.php'; $b = (is_file($f) ? (array) include $f : []) + tf_base_php(); } return $b; }
/* un texto fijo del PHP: se pinta dentro de un <span data-tf> para poder cambiarlo desde la web */
function tf_tp($k, $def, $eco = true) {
	$GLOBALS['tf_usados'][$k] = 1; $o = (array) get_option('tf_textos', []);
	$h = '<span data-tf="' . esc_attr($k) . '">' . (array_key_exists($k, $o) ? wp_kses((string) $o[$k], tf_permitido()) : esc_html($def)) . '</span>';
	if ($eco) echo $h; return $h;
}
function tf_t($k) {
	$GLOBALS['tf_usados'][$k] = 1;
	$o = (array) get_option('tf_textos', []);
	echo array_key_exists($k, $o) ? wp_kses((string) $o[$k], tf_permitido()) : (tf_base()[$k] ?? '');
}
function tf_img($k, $def) { $GLOBALS['tf_imgs'][$k] = $def; $o = (array) get_option('tf_imgs', []); echo esc_url($o[$k] ?? $def); }
function tf_pagina_actual() { return is_front_page() ? 'home' : (get_post_field('post_name', get_queried_object_id()) ?: 'pagina'); }
/* secciones ocultas: el público no las ve; quien edita las ve atenuadas al editar */
add_action('wp_head', function () {
	$p = tf_pagina_actual(); $sel = [];
	foreach ((array) get_option('tf_ocultas', []) as $x) if (strpos($x, $p . ':') === 0) $sel[] = '[data-tf-sec="' . esc_attr(substr($x, strlen($p) + 1)) . '"]';
	if ($sel) echo '<style>body:not(.tf-editando) ' . implode(',body:not(.tf-editando) ', $sel) . '{display:none!important}</style>' . "\n";
}, 20);
/* el editor solo se carga para quien puede editar */
add_action('wp_enqueue_scripts', function () {
	if (!current_user_can('edit_posts')) return;
	wp_enqueue_media();
	wp_enqueue_style('tf-editor', TF_U . '/editor.css', [], (string) filemtime(__DIR__ . '/editor.css'));
	wp_enqueue_script('tf-editor', TF_U . '/editor.js', [], (string) filemtime(__DIR__ . '/editor.js'), true);
}, 10000);
add_action('wp_footer', function () {
	if (!current_user_can('edit_posts')) return;
	$usados = array_keys((array) ($GLOBALS['tf_usados'] ?? [])); $imgs = (array) ($GLOBALS['tf_imgs'] ?? []);
	$p = tf_pagina_actual(); $oc = [];
	foreach ((array) get_option('tf_ocultas', []) as $x) if (strpos($x, $p . ':') === 0) $oc[] = substr($x, strlen($p) + 1);
	echo '<script>window.TF_ED=' . wp_json_encode([
		'api' => esc_url_raw(rest_url('tf/v1/editar')), 'nonce' => wp_create_nonce('wp_rest'), 'admin' => admin_url(), 'pagina' => $p,
		'ficha' => admin_url('post.php?action=edit&post='), 'nueva' => admin_url('post-new.php?post_type='),
		'base' => array_intersect_key(tf_base(), array_flip($usados)),
		'cambiados' => array_values(array_intersect(array_keys((array) get_option('tf_textos', [])), $usados)),
		'imgs' => $imgs, 'imgsCambiadas' => array_values(array_intersect(array_keys((array) get_option('tf_imgs', [])), array_keys($imgs))),
		'ocultas' => $oc,
	], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . ';</script>' . "\n";
}, 5);
add_action('admin_bar_menu', function ($bar) {
	if (is_admin() || !current_user_can('edit_posts') || !(is_front_page() || is_page(['comunidad', 'futuros']))) return;
	$bar->add_node(['id' => 'tf_editar', 'title' => '✎ Editar esta página', 'href' => add_query_arg('tf_editar', '1'), 'meta' => ['class' => 'tf-editar-barra']]);
}, 80);
/* ¿qué campo es y dónde se guarda? «p123.frase», «p123.titulo», «p123.claves.0.numero», «o.enc_titulo», «o.mec_porque.1.texto» */
function tf_campo_ref($ref) {
	if (!function_exists('acf_get_fields') || !preg_match('/^(?:p(\d+)|(o))\.([a-z_]+)(?:\.(\d+)\.([a-z_]+))?$/', $ref, $m)) return null;
	if (!empty($m[2])) { $grupo = 'group_tf_ajustes'; $donde = 'option'; }
	else { $id = (int) $m[1]; $pt = (string) get_post_type($id); if (strpos($pt, 'tf_') !== 0 || !current_user_can('edit_post', $id)) return null; $grupo = 'group_tf_' . substr($pt, 3); $donde = $id; }
	$campo = $m[3]; $fila = isset($m[4]) && $m[4] !== '' ? (int) $m[4] : null; $sub = $m[5] ?? '';
	if ($campo === 'titulo' && $donde !== 'option' && $fila === null) return ['donde' => $donde, 'titulo' => true];
	$f = null; foreach ((array) acf_get_fields($grupo) as $x) if ($x['name'] === $campo) $f = $x;
	if (!$f) return null;
	if ($fila === null) return ['donde' => $donde, 'campo' => $campo, 'tipo' => $f['type']];
	if ($f['type'] !== 'repeater') return null;
	foreach ((array) $f['sub_fields'] as $x) if ($x['name'] === $sub) return ['donde' => $donde, 'campo' => $campo, 'fila' => $fila, 'sub' => $sub, 'tipo' => $x['type']];
	return null;
}
function tf_limpia_valor($v, $tipo) {
	$v = trim((string) $v);
	if ($tipo === 'textarea') return sanitize_textarea_field($v);
	if ($tipo === 'number') { $n = str_replace(',', '.', $v); return is_numeric($n) ? 0 + $n : null; }
	if ($tipo === 'url') return esc_url_raw($v);
	if (in_array($tipo, ['text', 'email'], true)) return sanitize_text_field($v);
	return null;
}
function tf_valor_ref($c) {
	if (!empty($c['titulo'])) return get_the_title($c['donde']);
	if (isset($c['fila'])) { $filas = array_values((array) (get_field($c['campo'], $c['donde']) ?: [])); return $filas[$c['fila']][$c['sub']] ?? null; }
	return get_field($c['campo'], $c['donde']);
}
add_action('rest_api_init', function () {
	register_rest_route('tf/v1', '/editar', ['methods' => 'POST', 'permission_callback' => function () { return current_user_can('edit_posts'); }, 'callback' => function (WP_REST_Request $r) {
		$t = (array) get_option('tf_textos', []); $i = (array) get_option('tf_imgs', []); $oc = (array) get_option('tf_ocultas', []);
		/* copia de cómo estaba, por si hay que volver atrás (se guardan las 30 últimas) */
		$h = (array) get_option('tf_editar_historial', []);
		array_unshift($h, ['fecha' => current_time('mysql'), 'quien' => wp_get_current_user()->display_name, 'textos' => $t, 'imgs' => $i, 'ocultas' => $oc]);
		update_option('tf_editar_historial', array_slice($h, 0, 30), false);
		$base = tf_base();
		foreach ((array) $r->get_param('textos') as $k => $v) {
			$k = sanitize_key($k); if (!isset($base[$k])) continue;
			if ($v === null) { unset($t[$k]); continue; }
			$v = trim(wp_kses((string) $v, tf_permitido()));
			if ($v === trim(wp_kses($base[$k], tf_permitido()))) unset($t[$k]); else $t[$k] = $v;
		}
		foreach ((array) $r->get_param('imgs') as $k => $v) {
			$k = sanitize_key($k); $v = $v === null ? '' : esc_url_raw((string) $v);
			if ($v === '') unset($i[$k]); elseif (strpos($v, home_url('/')) === 0) $i[$k] = $v;
		}
		$p = sanitize_key((string) $r->get_param('pagina'));
		if ($p && is_array($r->get_param('ocultas'))) {
			$oc = array_values(array_filter($oc, function ($x) use ($p) { return strpos($x, $p . ':') !== 0; }));
			foreach ($r->get_param('ocultas') as $s) if ($s = sanitize_key((string) $s)) $oc[] = $p . ':' . $s;
		}
		update_option('tf_textos', $t, false); update_option('tf_imgs', $i, false); update_option('tf_ocultas', array_values(array_unique($oc)), false);
		/* lo que viene de las fichas (tarjetas, historias, papers…) y de los ajustes de encuentro y mecenas */
		$antes = [];
		foreach ((array) $r->get_param('contenido') as $ref => $v) {
			$c = tf_campo_ref((string) $ref); if (!$c) continue;
			$antes[$ref] = tf_valor_ref($c);
			if (!empty($c['titulo'])) { wp_update_post(['ID' => $c['donde'], 'post_title' => sanitize_text_field((string) $v)]); continue; }
			$v = tf_limpia_valor($v, $c['tipo']); if ($v === null) continue;
			if (isset($c['fila'])) { $filas = array_values((array) (get_field($c['campo'], $c['donde']) ?: [])); if (!isset($filas[$c['fila']])) continue; $filas[$c['fila']][$c['sub']] = $v; update_field($c['campo'], $filas, $c['donde']); }
			else update_field($c['campo'], $v, $c['donde']);
		}
		foreach ((array) $r->get_param('fotos') as $ref => $att) {
			$att = (int) $att; if (!$att || !wp_attachment_is_image($att)) continue;
			if (preg_match('/^p(\d+)$/', (string) $ref, $m)) { $id = (int) $m[1]; if (strpos((string) get_post_type($id), 'tf_') === 0 && current_user_can('edit_post', $id)) { $antes[$ref . '.foto'] = get_post_thumbnail_id($id); set_post_thumbnail($id, $att); } }
			elseif (in_array($ref, ['o.enc_foto', 'o.mec_foto'], true)) { $antes[$ref] = get_field(substr($ref, 2), 'option', false); update_field(substr($ref, 2), $att, 'option'); }
		}
		foreach ((array) $r->get_param('quitar') as $id) { $id = (int) $id; if ($id && strpos((string) get_post_type($id), 'tf_') === 0 && current_user_can('edit_post', $id)) { $antes['p' . $id . '.estado'] = get_post_status($id); wp_update_post(['ID' => $id, 'post_status' => 'draft']); } }
		if ($antes) { $h = (array) get_option('tf_editar_historial', []); $h[0]['fichas_antes'] = $antes; update_option('tf_editar_historial', $h, false); }
		return ['ok' => true];
	}]);
});
