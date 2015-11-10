<?php
$animation = $duration = $delay = '';
extract( shortcode_atts( array(
	'link' => '',
	'title' => __( 'Text on the button', "js_composer" ),
	'color' => '',
	'icon' => '',
	'size' => '',
	'style' => '',
	'el_class' => '',
    'animation'  => '',
    'duration'   => '',
    'delay'      => ''
), $atts ) );

$class = 'vc_btn';
//parse link
$link = ( $link == '||' ) ? '' : $link;
$link = vc_build_link( $link );
$a_href = $link['url'];
$a_title = $link['title'];
$a_target = $link['target'];

$class .= ( $color != '' ) ? ( ' vc_btn_' . $color . ' vc_btn-' . $color ) : '';
$class .= ( $size != '' ) ? ( ' vc_btn_' . $size . ' vc_btn-' . $size ) : '';
$class .= ( $style != '' ) ? ' vc_btn_' . $style : '';

$el_class = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ' . $class . $el_class, $this->settings['base'], $atts );

$attrs = '';
if( $animation ) {
    $css_class .= ' wow ' . $animation;
    if( $duration ) {
        $attrs .= ' data-wow-duration="' . $duration . 'ms"';
    }
    if( $delay ) {
        $attrs .= ' data-wow-delay="' . $delay . 'ms"';
    }
}

$attrs .= $a_href ? ' href = "' . $a_href . '"' : '';
$attrs .= $a_title ? ' title = "' . $a_title . '"' : '';
$attrs .= $a_target ? ' target = "' . $a_target . '"' : '';


?>
<a class="<?php echo esc_attr( trim( $css_class ) ); ?>" <?php echo $attrs; ?>>
	<?php echo $title; ?>
</a>
<?php echo $this->endBlockComment( 'vc_button' ) . "\n";