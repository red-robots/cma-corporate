<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bellaworks
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

define('THEMEURI',get_template_directory_uri() . '/');

function bellaworks_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.

    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }

    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    if ( is_front_page() || is_home() ) {
        $classes[] = 'homepage';
    } else {
        $classes[] = 'subpage';
    }

    $browsers = ['is_iphone', 'is_chrome', 'is_safari', 'is_NS4', 'is_opera', 'is_macIE', 'is_winIE', 'is_gecko', 'is_lynx', 'is_IE', 'is_edge'];
    $classes[] = join(' ', array_filter($browsers, function ($browser) {
        return $GLOBALS[$browser];
    }));

    return $classes;
}
add_filter( 'body_class', 'bellaworks_body_classes' );

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}


function add_query_vars_filter( $vars ) {
  $vars[] = "pg";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );


function shortenText($string, $limit, $break=".", $pad="...") {
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}

/* Fixed Gravity Form Conflict Js */
add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
    return true;
}

function get_page_id_by_template($fileName) {
    $page_id = 0;
    if($fileName) {
        $pages = get_pages(array(
            'post_type' => 'page',
            'meta_key' => '_wp_page_template',
            'meta_value' => $fileName.'.php'
        ));

        if($pages) {
            $row = $pages[0];
            $page_id = $row->ID;
        }
    }
    return $page_id;
}

function string_cleaner($str) {
    if($str) {
        $str = str_replace(' ', '', $str); 
        $str = preg_replace('/\s+/', '', $str);
        $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);
        $str = strtolower($str);
        $str = trim($str);
        return $str;
    }
}

function format_phone_number($string) {
    if(empty($string)) return '';
    $append = '';
    if (strpos($string, '+') !== false) {
        $append = '+';
    }
    $string = preg_replace("/[^0-9]/", "", $string );
    $string = preg_replace('/\s+/', '', $string);
    return $append.$string;
}

function get_instagram_setup() {
    global $wpdb;
    $result = $wpdb->get_row( "SELECT option_value FROM $wpdb->options WHERE option_name = 'sb_instagram_settings'" );
    if($result) {
        $option = ($result->option_value) ? @unserialize($result->option_value) : false;
    } else {
        $option = '';
    }
    return $option;
}

function extract_emails_from($string){
  preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $string, $matches);
  return $matches[0];
}

function email_obfuscator($string,$noFilter=null) {
    $output = '';
    $newString = '';
    if($string) {
        $emails_matched = ($string) ? extract_emails_from($string) : '';
        if($emails_matched) {
            foreach($emails_matched as $em) {
                $encrypted = antispambot($em,1);
                if (strpos($string, 'mailto') !== false) {
                    $replace = 'mailto:'.$em;
                    $new_mailto = 'mailto:'.$encrypted;
                    $string = str_replace($replace, $new_mailto, $string);
                    $rep2 = $em.'</a>';
                    $new2 = antispambot($em).'</a>';
                    $string = str_replace($rep2, $new2, $string);
                } else {
                    $new_mailto = '<a href="mailto:'.antispambot($em,1).'">'.antispambot($em).'</a>';
                    $newString = str_replace($em, $new_mailto, $string);
                }
            }
        }

        if($noFilter) {
            $output = $newString;
        } else {
            $output = apply_filters('the_content',$string);
        }
    }
    return $output;
}

function get_social_links() {
    $social_types = social_icons();
    $social = array();
    foreach($social_types as $k=>$icon) {
        $value = get_field($k,'option');
        if($value) {
            $social[$k] = array('link'=>$value,'icon'=>$icon);
        }
    }
    return $social;
}

function social_icons() {
    $social_types = array(
        'facebook'  => 'fab fa-facebook-f',
        'twitter'   => 'fab fa-twitter',
        'linkedin'  => 'fab fa-linkedin-in',
        'instagram' => 'fab fa-instagram',
        'snapchat'  => 'fab fa-snapchat-ghost',
        'youtube'   => 'fab fa-youtube'
    );
    return $social_types;
}

/* removing WP version generator */
function cma_remove_wp_version_string( $src )
{
    global $wp_version;

    parse_str( parse_url( $src, PHP_URL_QUERY), $query);
    if( ! empty( $query['ver'] ) && $query['ver'] === $wp_version ){
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'script_loader_src', 'cma_remove_wp_version_string' );
add_filter( 'style_loader_src', 'cma_remove_wp_version_string' );

function cma_remove_meta_version(){
    return '';
}
add_filter( 'the_generator', 'cma_remove_meta_version' );


/* Display Vendor Information via Ajax */
add_action( 'wp_ajax_nopriv_vendor_details', 'vendor_details' );
add_action( 'wp_ajax_vendor_details', 'vendor_details' );
function vendor_details() {
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $post_id = ($_POST['post_id']) ? $_POST['post_id'] : 0;
        $html = get_vendor_info_html($post_id);
        $response['title'] = ($post_id>0) ? get_the_title($post_id):'';
        $response['content'] = $html;
        echo json_encode($response);
    }
    else {
        header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
    die();
}

function get_vendor_info_html($id) {
    $content = '';
    $post = get_post($id);
    if($post) {
        ob_start();  ?>
        <div class="vendor-detatils-wrap">
            <?php 
            $id = $post->ID;
            $logo = get_field("vendor_logo",$id); 
            $address = get_field("vendor_address",$id); 
            $phone = get_field("vendor_phone",$id); 
            $email = get_field("vendor_email",$id); 
            $website = get_field("vendor_website",$id); 
            $webdomain = '';
            if($website) {
                $web = parse_url($website);
                $host = $web['host'];
                $host = str_replace('www','',$host);
                $webdomain = 'www.'.$host;
            }
            ?>
            <div class="inner <?php echo ($logo) ? 'half':'full'; ?>">
                <?php if ($logo) { ?>
                <div class="logodiv">
                    <span><img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['title'] ?>" class="vendor-logo"></span>
                </div>
                <?php } ?>
                <div class="info">
                    <h2 class="name"><?php echo $post->post_title; ?></h2>
                    <?php if ($address) { ?>
                    <div class="data address"><span class="icon"><i class="fas fa-map-marker-alt"></i></span> <?php echo $address ?></div>
                    <?php } ?>
                    <?php if ($phone) { ?>
                    <div class="data phone"><span class="icon"><i class="fas fa-phone-alt"></i></span> <?php echo $phone ?></div>
                    <?php } ?>
                    <?php if ($email) { ?>
                    <div class="data email"><span class="icon"><i class="fas fa-envelope"></i></span> <a href="mailto:<?php echo antispambot($email,1) ?>"><?php echo antispambot($email) ?></a></div>
                    <?php } ?>
                    <?php if ($website) { ?>
                    <div class="data website"><span class="icon"><i class="fas fa-globe-americas"></i></span> <a href="<?php echo $website ?>" target="_blank"><?php echo $webdomain ?></a></div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
        $content = ob_get_contents();
        ob_end_clean();
    }
    return $content;
}
