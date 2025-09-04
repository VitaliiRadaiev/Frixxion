<?php

function print_svg($url)
{
  $before_wp_content = strstr($url, '/wp-content', false);
  return file_get_contents($_SERVER['DOCUMENT_ROOT'] . $before_wp_content);
}

function cut_p_tags($dirty_html)
{
  $nice_html = $dirty_html;
  $nice_html = str_replace("<p>", "", $nice_html);
  $nice_html = str_replace("</p>", "", $nice_html);
  return $nice_html;
}

function isMobile()
{
  $detect = new \Detection\MobileDetect;
  return $detect->isMobile();
}
function isTablet()
{
  $detect = new \Detection\MobileDetect;
  return $detect->isTablet();
}
function isDesktop()
{
  return (!isTablet() && !isMobile());
}

function shareFacebook($linkToShare)
{
  return 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($linkToShare);
}
function shareLinkedIn($linkToShare)
{
  return 'https://www.linkedin.com/shareArticle?url=' . urlencode($linkToShare);
}
function shareTwitter($linkToShare)
{
  return 'https://twitter.com/intent/tweet?url=' . urlencode($linkToShare);
}

function get_image($image_id, $classes = '', $echo = true, $size = 'large')
// thumbnail, medium, large, full
{
  if ($image_id) {
    $image_html = wp_get_attachment_image($image_id, $size, false, array('class' => $classes));
    if ($echo) {
      echo $image_html;
    } else {
      return $image_html;
    }
  } else {
    return false;
  }
}

function check($var)
{
  if (is_string($var)) {
    $var = trim($var);
  }

  return $var && isset($var) && !empty($var);
}

function build_menu_hierarchy($items, $parent = 0)
{
  $menu = array();
  foreach ($items as $item) {
    if ($item->menu_item_parent == $parent) {
      $children = build_menu_hierarchy($items, $item->ID);
      if ($children) {
        $item->children = $children;
      }
      $menu[] = $item;
    }
  }
  return $menu;
}

function get_social_icon_by_url($url)
{
  $icons = [
    'facebook' => get_template_directory_uri() . '/assets/images/icons/facebook.svg',
    'instagram' => get_template_directory_uri() . '/assets/images/icons/instagram.svg',
    'linkedin' => get_template_directory_uri() . '/assets/images/icons/linkedin.svg',
    'tiktok' => get_template_directory_uri() . '/assets/images/icons/tiktok.svg',
    'twitter' => get_template_directory_uri() . '/assets/images/icons/twitter.svg',
  ];

  if (strpos($url, 'facebook.com') !== false) {
    return $icons['facebook'];
  } elseif (strpos($url, 'instagram.com') !== false) {
    return $icons['instagram'];
  } elseif (strpos($url, 'linkedin.com') !== false) {
    return $icons['linkedin'];
  } elseif (strpos($url, 'tiktok.com') !== false) {
    return $icons['tiktok'];
  } elseif (strpos($url, 'twitter.com') !== false || strpos($url, 'x.com') !== false) {
    return $icons['twitter'];
  }

  return null;
}

function get_part_path($file_name)
{
  return 'templates/parts/' . $file_name . '/' . $file_name;
}

function cf7_obj($section_form_shortcode)
{
  if ($section_form_shortcode instanceof WP_Post && $section_form_shortcode->post_type === 'wpcf7_contact_form') {
    echo do_shortcode('[contact-form-7 id="' . $section_form_shortcode->ID . '"]');
  }
}

function render_menu_link($menu, $classes = '', $attr = '')
{
?>
  <a href="<?= $menu['url'] ?>" target="<?= $menu['target'] ? '_blank' : '_self' ?>" <?= $attr ?> class="<?= $classes ?>">
    <?= $menu['title'] ?>
  </a>
<?php
}

function get_section_id($data)
{
  return check($data['section_utils']['section_id']) ? 'id="' . $data['section_utils']['section_id'] . '"' : '';
}
