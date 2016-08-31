<?php
/*
Plugin Name: JP_WP Redirection - Hide Product
Plugin URI: http://www.jigerpatel.co.uk
Description: This plugin will help hide products and redirect users depending on were they are located.
Version: 1.2
Author: Jiger Patel
Author URI: http://www.jigerpatel.co.uk
License:GPL2
*/

function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    	$src = add_query_arg( 'ver=3', $src );
    
    return $src;
}
add_action('admin_menu', 'jp_create_menu');
function jp_create_menu() {
	add_menu_page('JP Product Validation', 'JP Redirection', 'administrator', __FILE__, 'jp_settings_page',plugins_url('/images/icon.png', __FILE__));
	add_action( 'admin_init', 'register_jp_settings' );
}

function register_jp_settings() {
	$g = get_products();$ln = count($g);
	$x = 0; 
	while($x <= $ln) { register_setting( 'jp-settings-group', 'country-'.$x );$x++;}
	while($x <= $ln) { register_setting( 'jp-settings-group', 'product-'.$x );$x++;}
	register_setting( 'jp-settings-group', 'ajax-all-772');
}
function get_products() {
	$p = array();
	$a = array('post_type' => 'product','posts_per_page' => -1);
		$l = new WP_Query( $a );
		if ( $l->have_posts() ) {
			while ( $l->have_posts() ) : $l->the_post(); 
			$id = get_the_ID();$t = get_the_title( $id );
			$s=array("title"=>$t,"id"=>$id);
			array_push($p,$s);
			endwhile;
		} else { $p = null;}
		wp_reset_postdata();
	return $p;
}

function jp_settings_page() { ?>
    <div class="wrap">
    <h2>Your Plugin Name</h2>
    <p>Please use the function bellow to get the woo product id then use that id in ID field. After that please select the country you would like to hide the product in. </p>
    <div>
	<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('select#selectcountry').on('change', function() {
        var k = jQuery(this).parent().attr('rel');
        var sl = "#country-" + k;
            if(jQuery(sl).val().indexOf(this.value) != -1){ 
            alert("This country is allready added"+ this.value);
            } else{
                if(!jQuery(sl).val()){
                    jQuery(sl).val(this.value);
                }else{
                    jQuery(sl).val(jQuery(sl).val()+","+this.value);
                }
            }
        });
    });//end jQuery
    </script>

<?php $selcCC = '<select id="selectcountry">
	<option value="AF">Afghanistan</option>
	<option value="AX">Åland Islands</option>
	<option value="AL">Albania</option>
	<option value="DZ">Algeria</option>
	<option value="AS">American Samoa</option>
	<option value="AD">Andorra</option>
	<option value="AO">Angola</option>
	<option value="AI">Anguilla</option>
	<option value="AQ">Antarctica</option>
	<option value="AG">Antigua and Barbuda</option>
	<option value="AR">Argentina</option>
	<option value="AM">Armenia</option>
	<option value="AW">Aruba</option>
	<option value="AU">Australia</option>
	<option value="AT">Austria</option>
	<option value="AZ">Azerbaijan</option>
	<option value="BS">Bahamas</option>
	<option value="BH">Bahrain</option>
	<option value="BD">Bangladesh</option>
	<option value="BB">Barbados</option>
	<option value="BY">Belarus</option>
	<option value="BE">Belgium</option>
	<option value="BZ">Belize</option>
	<option value="BJ">Benin</option>
	<option value="BM">Bermuda</option>
	<option value="BT">Bhutan</option>
	<option value="BO">Bolivia, Plurinational State of</option>
	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
	<option value="BA">Bosnia and Herzegovina</option>
	<option value="BW">Botswana</option>
	<option value="BV">Bouvet Island</option>
	<option value="BR">Brazil</option>
	<option value="IO">British Indian Ocean Territory</option>
	<option value="BN">Brunei Darussalam</option>
	<option value="BG">Bulgaria</option>
	<option value="BF">Burkina Faso</option>
	<option value="BI">Burundi</option>
	<option value="KH">Cambodia</option>
	<option value="CM">Cameroon</option>
	<option value="CA">Canada</option>
	<option value="CV">Cape Verde</option>
	<option value="KY">Cayman Islands</option>
	<option value="CF">Central African Republic</option>
	<option value="TD">Chad</option>
	<option value="CL">Chile</option>
	<option value="CN">China</option>
	<option value="CX">Christmas Island</option>
	<option value="CC">Cocos (Keeling) Islands</option>
	<option value="CO">Colombia</option>
	<option value="KM">Comoros</option>
	<option value="CG">Congo</option>
	<option value="CD">Congo, the Democratic Republic of the</option>
	<option value="CK">Cook Islands</option>
	<option value="CR">Costa Rica</option>
	<option value="CI">Côte dIvoire</option>
	<option value="HR">Croatia</option>
	<option value="CU">Cuba</option>
	<option value="CW">Curaçao</option>
	<option value="CY">Cyprus</option>
	<option value="CZ">Czech Republic</option>
	<option value="DK">Denmark</option>
	<option value="DJ">Djibouti</option>
	<option value="DM">Dominica</option>
	<option value="DO">Dominican Republic</option>
	<option value="EC">Ecuador</option>
	<option value="EG">Egypt</option>
	<option value="SV">El Salvador</option>
	<option value="GQ">Equatorial Guinea</option>
	<option value="ER">Eritrea</option>
	<option value="EE">Estonia</option>
	<option value="ET">Ethiopia</option>
	<option value="FK">Falkland Islands (Malvinas)</option>
	<option value="FO">Faroe Islands</option>
	<option value="FJ">Fiji</option>
	<option value="FI">Finland</option>
	<option value="FR">France</option>
	<option value="GF">French Guiana</option>
	<option value="PF">French Polynesia</option>
	<option value="TF">French Southern Territories</option>
	<option value="GA">Gabon</option>
	<option value="GM">Gambia</option>
	<option value="GE">Georgia</option>
	<option value="DE">Germany</option>
	<option value="GH">Ghana</option>
	<option value="GI">Gibraltar</option>
	<option value="GR">Greece</option>
	<option value="GL">Greenland</option>
	<option value="GD">Grenada</option>
	<option value="GP">Guadeloupe</option>
	<option value="GU">Guam</option>
	<option value="GT">Guatemala</option>
	<option value="GG">Guernsey</option>
	<option value="GN">Guinea</option>
	<option value="GW">Guinea-Bissau</option>
	<option value="GY">Guyana</option>
	<option value="HT">Haiti</option>
	<option value="HM">Heard Island and McDonald Islands</option>
	<option value="VA">Holy See (Vatican City State)</option>
	<option value="HN">Honduras</option>
	<option value="HK">Hong Kong</option>
	<option value="HU">Hungary</option>
	<option value="IS">Iceland</option>
	<option value="IN">India</option>
	<option value="ID">Indonesia</option>
	<option value="IR">Iran, Islamic Republic of</option>
	<option value="IQ">Iraq</option>
	<option value="IE">Ireland</option>
	<option value="IM">Isle of Man</option>
	<option value="IL">Israel</option>
	<option value="IT">Italy</option>
	<option value="JM">Jamaica</option>
	<option value="JP">Japan</option>
	<option value="JE">Jersey</option>
	<option value="JO">Jordan</option>
	<option value="KZ">Kazakhstan</option>
	<option value="KE">Kenya</option>
	<option value="KI">Kiribati</option>
	<option value="KP">Korea, Democratic Peoples Republic of</option>
	<option value="KR">Korea, Republic of</option>
	<option value="KW">Kuwait</option>
	<option value="KG">Kyrgyzstan</option>
	<option value="LA">Lao Peoples Democratic Republic</option>
	<option value="LV">Latvia</option>
	<option value="LB">Lebanon</option>
	<option value="LS">Lesotho</option>
	<option value="LR">Liberia</option>
	<option value="LY">Libya</option>
	<option value="LI">Liechtenstein</option>
	<option value="LT">Lithuania</option>
	<option value="LU">Luxembourg</option>
	<option value="MO">Macao</option>
	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
	<option value="MG">Madagascar</option>
	<option value="MW">Malawi</option>
	<option value="MY">Malaysia</option>
	<option value="MV">Maldives</option>
	<option value="ML">Mali</option>
	<option value="MT">Malta</option>
	<option value="MH">Marshall Islands</option>
	<option value="MQ">Martinique</option>
	<option value="MR">Mauritania</option>
	<option value="MU">Mauritius</option>
	<option value="YT">Mayotte</option>
	<option value="MX">Mexico</option>
	<option value="FM">Micronesia, Federated States of</option>
	<option value="MD">Moldova, Republic of</option>
	<option value="MC">Monaco</option>
	<option value="MN">Mongolia</option>
	<option value="ME">Montenegro</option>
	<option value="MS">Montserrat</option>
	<option value="MA">Morocco</option>
	<option value="MZ">Mozambique</option>
	<option value="MM">Myanmar</option>
	<option value="NA">Namibia</option>
	<option value="NR">Nauru</option>
	<option value="NP">Nepal</option>
	<option value="NL">Netherlands</option>
	<option value="NC">New Caledonia</option>
	<option value="NZ">New Zealand</option>
	<option value="NI">Nicaragua</option>
	<option value="NE">Niger</option>
	<option value="NG">Nigeria</option>
	<option value="NU">Niue</option>
	<option value="NF">Norfolk Island</option>
	<option value="MP">Northern Mariana Islands</option>
	<option value="NO">Norway</option>
	<option value="OM">Oman</option>
	<option value="PK">Pakistan</option>
	<option value="PW">Palau</option>
	<option value="PS">Palestinian Territory, Occupied</option>
	<option value="PA">Panama</option>
	<option value="PG">Papua New Guinea</option>
	<option value="PY">Paraguay</option>
	<option value="PE">Peru</option>
	<option value="PH">Philippines</option>
	<option value="PN">Pitcairn</option>
	<option value="PL">Poland</option>
	<option value="PT">Portugal</option>
	<option value="PR">Puerto Rico</option>
	<option value="QA">Qatar</option>
	<option value="RE">Réunion</option>
	<option value="RO">Romania</option>
	<option value="RU">Russian Federation</option>
	<option value="RW">Rwanda</option>
	<option value="BL">Saint Barthélemy</option>
	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
	<option value="KN">Saint Kitts and Nevis</option>
	<option value="LC">Saint Lucia</option>
	<option value="MF">Saint Martin (French part)</option>
	<option value="PM">Saint Pierre and Miquelon</option>
	<option value="VC">Saint Vincent and the Grenadines</option>
	<option value="WS">Samoa</option>
	<option value="SM">San Marino</option>
	<option value="ST">Sao Tome and Principe</option>
	<option value="SA">Saudi Arabia</option>
	<option value="SN">Senegal</option>
	<option value="RS">Serbia</option>
	<option value="SC">Seychelles</option>
	<option value="SL">Sierra Leone</option>
	<option value="SG">Singapore</option>
	<option value="SX">Sint Maarten (Dutch part)</option>
	<option value="SK">Slovakia</option>
	<option value="SI">Slovenia</option>
	<option value="SB">Solomon Islands</option>
	<option value="SO">Somalia</option>
	<option value="ZA">South Africa</option>
	<option value="GS">South Georgia and the South Sandwich Islands</option>
	<option value="SS">South Sudan</option>
	<option value="ES">Spain</option>
	<option value="LK">Sri Lanka</option>
	<option value="SD">Sudan</option>
	<option value="SR">Suriname</option>
	<option value="SJ">Svalbard and Jan Mayen</option>
	<option value="SZ">Swaziland</option>
	<option value="SE">Sweden</option>
	<option value="CH">Switzerland</option>
	<option value="SY">Syrian Arab Republic</option>
	<option value="TW">Taiwan, Province of China</option>
	<option value="TJ">Tajikistan</option>
	<option value="TZ">Tanzania, United Republic of</option>
	<option value="TH">Thailand</option>
	<option value="TL">Timor-Leste</option>
	<option value="TG">Togo</option>
	<option value="TK">Tokelau</option>
	<option value="TO">Tonga</option>
	<option value="TT">Trinidad and Tobago</option>
	<option value="TN">Tunisia</option>
	<option value="TR">Turkey</option>
	<option value="TM">Turkmenistan</option>
	<option value="TC">Turks and Caicos Islands</option>
	<option value="TV">Tuvalu</option>
	<option value="UG">Uganda</option>
	<option value="UA">Ukraine</option>
	<option value="AE">United Arab Emirates</option>
	<option value="GB">United Kingdom</option>
	<option value="US">United States</option>
	<option value="UM">United States Minor Outlying Islands</option>
	<option value="UY">Uruguay</option>
	<option value="UZ">Uzbekistan</option>
	<option value="VU">Vanuatu</option>
	<option value="VE">Venezuela, Bolivarian Republic of</option>
	<option value="VN">Viet Nam</option>
	<option value="VG">Virgin Islands, British</option>
	<option value="VI">Virgin Islands, U.S.</option>
	<option value="WF">Wallis and Futuna</option>
	<option value="EH">Western Sahara</option>
	<option value="YE">Yemen</option>
	<option value="ZM">Zambia</option>
	<option value="ZW">Zimbabwe</option></div>
</select>';?>

    <form method="post" action="options.php">
    <?php 	settings_fields( 'jp-settings-group' ); ?>
    <?php 	do_settings_sections( 'jp-settings-group' ); ?>
    <table class="form-table"  style="width:800px;">
    <?php 	$x = 0; $g = get_products();$g = array_reverse($g);$ln = count($g); $k = array();
            while($x <= $ln) {
              echo'<tr valign="top">'; $p = "product-".$x; $c = "country-".$x; $ti = $g[$x]["title"]; $ii = $g[$x]["id"];
              update_option($p,$ii); $k[$x] = array("pid"=> esc_attr( get_option($p)),"cid"=> esc_attr( get_option($c)) );
              echo'<td><label for="'.$p.'">'.$ti.'</label><input style="display:none;" type="text" name="'.$p.'" id="'.$p.'" value="'.esc_attr( get_option($p) ).'"></td>';
              echo'<td>Countries sold in<input type="text" id="'.$c.'" name="'.$c.'" value="'. esc_attr( get_option($c) ).'" rel="'.$ii.'" /></td>';
              echo'<td rel="'.$x.'">Countries sold in'.$selcCC.'</td>';echo'</tr>';
              $x++;
            }
            $k = json_encode($k);update_option('ajax-all-772',$k);?>
    </table>
    <?php submit_button(); ?>
    </form>
    </div>
<?php } 

add_action('wp_head', 'rdhead');
function rdhead(){
  jpScriptCustom();
  $fgh = _bot_detected();
    if($fgh == FALSE){jpScriptRedirct();}
}

function jpScriptRedirct(){
  if ( current_user_can('manage_options') ) {  }else{
  //maxmind
  wp_register_script('geoip2_script','https://js.maxmind.com/js/apis/geoip2/v2.0/geoip2.js');
  // Owens Script ??
  wp_register_script('owensScript',plugin_dir_url( __FILE__ ).'js/bit1.js',array('jquery'));
  //main Script for the redirection
  wp_register_script('MainReScript',plugin_dir_url( __FILE__ ).'js/re-script.js',array('jquery'));
  // enque the scripts
  $nonce = wp_create_nonce("P(T8*iyBLcU8Rh");
  wp_localize_script( 'MainReScript', 'mgips', array( 'noce' => $nonce, 'ajaxurl'=>admin_url( 'admin-ajax.php' ), "data12"=> $jparced));  
  wp_enqueue_script('geoip2_script');
  }
}
function jpScriptCustom(){
   wp_register_script('jp_c_hh_script',plugin_dir_url( __FILE__ ).'js/jp_chh_scripts.js',array('jquery'));
   wp_enqueue_script('jp_c_hh_script');
}

function _bot_detected() {
  if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT'])) {
    return TRUE;
	}else { return FALSE;}
}

add_action( 'wp_ajax_get_dataJary', 'cbJary' ); add_action( 'wp_ajax_nopriv_get_dataJary', 'cbJary' );
function cbJary() {
	if ( !wp_verify_nonce( $_REQUEST['n'], "P(T8*iyBLcU8Rh")) {exit("No naughty business please");}  
	$j = get_option('ajax-all-772');$response = array('sucess' => true,'res2'=> $j);
	print json_encode($response);
	exit;
}

/*Add on Jp*/
function jp_homepage_posts($atts, $content = null){
  echo do_shortcode('[wooslider slide_page="homeslider" slider_type="slides" thumbnails="default" order="ASC" order_by="menu_order"]');
  $jp_queryw = new WP_Query(array('post_type' => 'page','post__in' => array(2305,1736,182)));
  if ($jp_queryw->have_posts()): ?>
    <div class="woocommerce columns-3"><ul class="products">
    <?php $j = 0; 
    $k = $jp_queryw->found_posts;
    $k = $k - 1; 
    while ($jp_queryw->have_posts()): 
      $jp_queryw->the_post();
      if ($j == 0 || $j == $k){
        if ($j == 0){ ?> 
          <li class="product-category product first"> <?php
        }else{ ?> 
          <li class="product-category product last">
    <?php } 
      }else{ ?>
    <li class="product-category product">
    <?php }
    
    if (has_post_thumbnail()): ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>">
    <?php the_post_thumbnail() ?>
    </a>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>">
    <h3><?php the_title() ?> </h3></a>
    <span class="price excerpt"><span class="amount"><?php the_excerpt() ?></span></span>
    <?php
    endif;
    $j++; ?>
    <?php endwhile; ?>
    </ul></div>
  <?php wp_reset_postdata(); ?>
<?php
  else: ?>
  <p><?php
    _e('Sorry, no posts matched your criteria.'); ?></p>
<?php
  endif; ?>
<?php
  }
add_shortcode('HomePagePosts', 'jp_homepage_posts');

/*Add Excerpt to pages */
add_action('init', 'enable_page_excerpts');

function enable_page_excerpts(){
  add_post_type_support('page', 'excerpt');
  }

/*Remove footer link to whoothems function*/
add_action('init', 'custom_remove_footer_credit', 10);

function custom_remove_footer_credit(){
  remove_action('storefront_footer', 'storefront_credit', 20);
  add_action('storefront_footer', 'custom_storefront_credit', 20);
  }

function custom_storefront_credit(){ ?>
  <div class="site-info">
    &copy; <?php
  echo get_bloginfo('name') . ' ' . get_the_date('Y'); ?>
  </div><!-- .site-info -->
  <?php
  }

add_action('wp_head', 'add_fav_con');

function add_fav_con(){ ?>
<link rel="icon" href="<?php bloginfo('siteurl'); ?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php bloginfo('siteurl'); ?>/favicon.ico" type="image/x-icon" />
<?php
  } 

// define the woocommerce_after_shop_loop_item_title callback
function action_woocommerce_after_shop_loop_item_title( ) 
{global $product;
        if ( ! $product->managing_stock() && ! $product->is_in_stock() ){
        echo '<img id="sold-out" src="' . plugins_url( 'img/sold-out.png', __FILE__ ) . '" > ';
		}
		$j = $product->get_sku();
        if ( $j == "THC7433333" || $j == "2"  || $j == "2" ){
        echo '<img id="sold-out" src="' . plugins_url( 'img/buy-2-get-2-free.png', __FILE__ ) . '" > ';
    	}
};
        
// add the action
add_action( 'woocommerce_after_shop_loop_item_title', 'action_woocommerce_after_shop_loop_item_title', 10, 2 );
add_action( 'init', 'oj_init' );
function oj_init() {
remove_action( 'storefront_header', 'storefront_product_search', 40 );
}

remove_action('storefront_page', 'storefront_page_header');
add_action('storefront_page', 'storefront_page_header', 	10 );
if ( ! function_exists( 'storefront_page_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 * @since 1.0.0
	 */
	function storefront_page_header() {
		if ( is_front_page() ) {
		?>
			<header class="entry-header home-entry-header">
				<?php the_title( '<h1 class="entry-title home-title" itemprop="name">', '</h1>' ); ?>
			</header><!-- .entry-header -->
		<?php
		} else {
		?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<?php
	}
	}
}
?>