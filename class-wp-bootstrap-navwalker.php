<?php
/**
 * Minimal WP Bootstrap Navwalker (safe version for exams)
 * - Evita "Class not found" y genera HTML compatible con Bootstrap si lo usas.
 * - Si NO usas Bootstrap, igualmente te pinta el menú bien.
 *
 * USO:
 * wp_nav_menu([
 *   'theme_location' => 'primary',
 *   'container' => false,
 *   'menu_class' => 'navbar-nav',
 *   'walker' => new WP_Bootstrap_Navwalker(),
 * ]);
 */

if (!defined('ABSPATH')) { exit; }

if (!class_exists('WP_Bootstrap_Navwalker')) :

class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {

  public function start_lvl( &$output, $depth = 0, $args = null ) {
    $indent  = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu\">\n";
  }

  public function end_lvl( &$output, $depth = 0, $args = null ) {
    $indent  = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $classes = empty($item->classes) ? [] : (array) $item->classes;

    $has_children = in_array('menu-item-has-children', $classes, true);

    // <li> classes
    $li_classes = ['nav-item'];
    if ($has_children && $depth === 0) $li_classes[] = 'dropdown';
    if ($has_children && $depth > 0)   $li_classes[] = 'dropdown-submenu';

    // Mark current
    if (in_array('current-menu-item', $classes, true) || in_array('current_page_item', $classes, true)) {
      $li_classes[] = 'active';
    }

    $class_names = implode(' ', array_filter($li_classes));
    $output .= $indent . '<li class="' . esc_attr($class_names) . '">';

    // Link attributes
    $atts = [];
    $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
    $atts['target'] = ! empty($item->target)     ? $item->target     : '';
    $atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
    $atts['href']   = ! empty($item->url)        ? $item->url        : '';

    // a class
    $a_classes = [];
    if ($depth === 0) $a_classes[] = 'nav-link';
    else              $a_classes[] = 'dropdown-item';

    // dropdown toggle
    if ($has_children && $depth === 0) {
      $a_classes[] = 'dropdown-toggle';
      $atts['data-bs-toggle'] = 'dropdown';
      $atts['aria-expanded']  = 'false';
      // si no usas BS, no rompe: solo queda el atributo.
      $atts['role'] = 'button';
    }

    $atts['class'] = implode(' ', $a_classes);

    $attributes = '';
    foreach ($atts as $attr => $value) {
      if ($value !== '') {
        $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    $title = apply_filters('the_title', $item->title, $item->ID);

    $item_output  = ($args && isset($args->before)) ? $args->before : '';
    $item_output .= '<a' . $attributes . '>';
    $item_output .= ($args && isset($args->link_before)) ? $args->link_before : '';
    $item_output .= esc_html($title);
    $item_output .= ($args && isset($args->link_after)) ? $args->link_after : '';

    // caret opcional (solo visual)
    if ($has_children && $depth === 0) {
      $item_output .= ' <span class="caret" aria-hidden="true"></span>';
    }

    $item_output .= '</a>';
    $item_output .= ($args && isset($args->after)) ? $args->after : '';

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }

  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    $output .= "</li>\n";
  }

  /**
   * Fallback: por si el menú no está asignado en Apariencia > Menús
   */
  public static function fallback($args) {
    if (current_user_can('edit_theme_options')) {
      echo '<ul class="navbar-nav">';
      echo '<li class="nav-item"><a class="nav-link" href="' . esc_url(admin_url('nav-menus.php')) . '">Configura el menú</a></li>';
      echo '</ul>';
    }
  }
}

endif;
