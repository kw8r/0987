<?php
//メニュー項目非表示に
function remove_menus () {
	if (!current_user_can('level_10')) { //level10以下のユーザーの場合メニューをunsetする
		remove_menu_page('wpcf7'); //Contact Form 7
		global $menu;
		unset($menu[2]); // ダッシュボード
		unset($menu[4]); // メニューの線1
		unset($menu[5]); // 投稿
		unset($menu[15]); // リンク
		unset($menu[20]); // ページ
		unset($menu[25]); // コメント
		unset($menu[59]); // メニューの線2
		unset($menu[60]); // テーマ
		unset($menu[65]); // プラグイン
		unset($menu[70]); // プロフィール
		unset($menu[75]); // ツール
		unset($menu[80]); // 設定
		unset($menu[90]); // メニューの線3
	}
}
add_action('admin_menu', 'remove_menus');

// ダッシュボードウィジェット非表示
function example_remove_dashboard_widgets() {
	if (!current_user_can('level_10')) { //level10以下のユーザーの場合ウィジェットをunsetする
		global $wp_meta_boxes;
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
	}
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');

//ログイン画面のロゴを変更
function login_logo() {
	echo '<style type="text/css">
		.login h1 a {
			background-image: url('.get_bloginfo('template_directory').'/img/wp-login-logo.png);
		}
		</style>';
}
add_action('login_head', 'login_logo');


?>