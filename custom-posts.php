<?php
/* カスタム投稿タイプの追加（お知らせ） */
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'infos', /* post-type */
		array(
			'labels' => array(
			'name' => __( 'お知らせ' ), /* 追加するメニューの名前 */
			'singular_name' => __( 'お知らせ' ) /* 追加するメニューの名前 */
		),
		'public' => true,
		'menu_position' => 5, /* メニューに表示する位置（5は投稿の下に表示される） */
		)
	);
	register_taxonomy(
		'info', /* タクソノミーの名前 */
		'infos', /* インフォメーションで設定する */
		array(
			'hierarchical' => false, /* 親子関係が必要なければ false */
			'update_count_callback' => '_update_post_term_count',
			'label' => 'カテゴリー', /* メニューに表示する名前 */
			'singular_label' => 'カテゴリー', /* メニューに表示する名前 */
			'public' => true,
			'show_ui' => true
		)
	);
}
/* カスタム投稿タイプの追加（今月のおすすめ） */
add_action( 'init', 'create_post_type2' );
function create_post_type2() {
	register_post_type( 'months', /* post-type */
		array(
			'labels' => array(
			'name' => __( '今月のおすすめ' ), /* 追加するメニューの名前 */
			'singular_name' => __( '今月のおすすめ' ) /* 追加するメニューの名前 */
		),
		'public' => true,
		'menu_position' => 5, /* メニューに表示する位置（5は投稿の下に表示される） */
		)
	);
	register_taxonomy(
		'month', /* タクソノミーの名前 */
		'months', /* インフォメーションで設定する */
		array(
			'hierarchical' => false, /* 親子関係が必要なければ false */
			'update_count_callback' => '_update_post_term_count',
			'label' => 'カテゴリー', /* メニューに表示する名前 */
			'singular_label' => 'カテゴリー', /* メニューに表示する名前 */
			'public' => true,
			'show_ui' => true
		)
	);
}

?>
