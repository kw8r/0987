<?php
// 管理バー非表示
add_filter( 'show_admin_bar', '__return_false' );

// 管理バーの項目を非表示
function remove_admin_bar_menu( $wp_admin_bar ) {
 $wp_admin_bar->remove_menu( 'wp-logo' ); // WordPressシンボルマーク
 $wp_admin_bar->remove_menu('my-account'); // マイアカウント
 $wp_admin_bar->remove_menu('new-content'); // 新規投稿
 $wp_admin_bar->remove_menu('comments'); // コメント
 }
add_action( 'admin_bar_menu', 'remove_admin_bar_menu', 99 );

// 管理バーのヘルプメニューを非表示にする
function my_admin_head(){
 echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
 }
add_action('admin_head', 'my_admin_head');

// 管理バーにログアウトを追加
function add_new_item_in_admin_bar() {
 global $wp_admin_bar;
 $wp_admin_bar->add_menu(array(
 'id' => 'new_item_in_admin_bar',
 'title' => __('ログアウト'),
 'href' => wp_logout_url()
 ));
 }
add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');

/* バージョン情報を削除する */
remove_action('wp_head', 'wp_generator');

/* リモートで投稿する際に使用する-不必要なので削除 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

/*// バージョン更新を非表示にする
add_filter('pre_site_transient_update_core', '__return_zero');

// APIによるバージョンチェックの通信をさせない
remove_action('wp_version_check', 'wp_version_check');
remove_action('admin_init', '_maybe_update_core');
*/
//WordPressの更新通知表示と、バージョンチェックを無効
if( !current_user_can( 'administrator' ) ) {
	add_filter( 'pre_site_transient_update_core', '__return_zero' );
	remove_action( 'wp_version_check', 'wp_version_check' );
	remove_action( 'admin_init', '_maybe_update_core' );
}

?>
