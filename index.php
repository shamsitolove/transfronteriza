<?php if (!defined('ABSPATH')) exit; ?><!doctype html>
<html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Funnel+Display:wght@400;500&family=Host+Grotesk:wght@400;500&display=swap">
<style>body{margin:0;background:#F5EEDF;color:#1F1B2D;font:400 18px/1.6 "Host Grotesk",system-ui,sans-serif}main{max-width:760px;margin:0 auto;padding:120px 24px}h1,h2,h3{font-family:"Funnel Display",sans-serif;font-weight:500;letter-spacing:-.02em}a{color:#1F1B2D}.volver{display:inline-block;margin-bottom:40px}</style>
<?php wp_head(); ?></head><body <?php body_class('tf'); ?>><?php wp_body_open(); ?>
<main><a class="volver" href="<?php echo esc_url(home_url('/')); ?>">← Transfronteriza</a>
<?php while (have_posts()) { the_post(); echo '<h1>' . esc_html(get_the_title()) . '</h1>'; the_content(); } ?>
</main><?php wp_footer(); ?></body></html>
