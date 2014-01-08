<?php
function widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', '' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', '' ),
		'before_widget' => '<aside id="%1$s" class="%2$s">',
		'after_widget' => "\n</aside>",
		'before_title' => "\n<h3 class=\"widget-title\">",
		'after_title' => "</h3>\n",
	) );
}
add_action( 'widgets_init', 'widgets_init' );

/**
 * 20131204追記
 *
 */
/* パスを自動的にテーマディレクトリまでのパスに置換してくれる(img) */
function replaceImagePath($arg) {
	$content = str_replace('"pdf/', '"' . get_bloginfo('template_directory') . '/pdf/', $arg);
	return $content;
}  
add_action('the_content', 'replaceImagePath');
/*ここまで*/

/* パスを自動的にテーマディレクトリまでのパスに置換してくれる(img) */
function replaceImagePath2($arg) {
	$content2 = str_replace('"img/', '"' . get_bloginfo('template_directory') . '/img/', $arg);
	return $content2;
}  
add_action('the_content', 'replaceImagePath2');
/*ここまで*/

// フッターWordPressリンクを非表示に
function custom_admin_footer() {
 echo '<a href="mailto:xxx@zzz"></a>';
 }
add_filter('admin_footer_text', 'custom_admin_footer');

/* 画像挿入時リンクタグが入らないように */
function remove_a_tag_image_send_to_editor($html, $id, $caption, $title, $align, $url, $size) {
  return strip_tags($html, '<img>');
}
add_filter('image_send_to_editor', 'remove_a_tag_image_send_to_editor', 10, 7);

/* 画像挿入時高さと幅が入らないように */
function remove_hwstring_from_image_tag( $html, $id, $alt, $title, $align, $size ) {
	if ( !isset ( $infomation_width ) ) {
		$infomation_width = 715;
	}
    list( $img_src, $width, $height ) = image_downsize($id, $size);
	if ( $width > 	$infomation_width ) {
	    $hwstring = image_hwstring( $width, $height );
	    $html = str_replace( $hwstring, '', $html );
	}
    return $html;
}
add_filter( 'get_image_tag', 'remove_hwstring_from_image_tag', 10, 6 );

//プレビューボタン非表示
add_action('admin_print_styles', 'admin_preview_css_custom');
function admin_preview_css_custom() {
 if (!current_user_can('level_10')) { //level10以下のユーザーの場合ウィジェットをunsetする
   echo '<style>span.view,#preview-action {display: none;}</style>';
 }
}

//管理画面系
require( dirname( __FILE__ ) . '/inc/management.php' );
//カスタム投稿タイプ追加
require( dirname( __FILE__ ) . '/inc/custom-posts.php' );
// メニューを非表示にする
require( dirname( __FILE__ ) . '/inc/menu-hide.php' );
//pdfアップローダー追加
require( dirname( __FILE__ ) . '/inc/pdf-uploader.php' );


?>
