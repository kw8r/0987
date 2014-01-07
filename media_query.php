//functions.phpにでも書いておく
add_filter('query_string', "set_media_query");

function set_media_query($query_string){
	global $pagenow,$current_user; // media-upload.php 、upload.php

	// メディアライブラリ系の処理以外は何もしない
	if($pagenow != 'media-upload.php' && $pagenow != 'upload.php') {
		return $query_string;
	}

	get_currentuserinfo();

	// 編集者以上だったら何もしない
	if($current_user->user_level >= 5) {
		return $query_string;
	}

	wp_parse_str($query_string, $qv);

	// メディア以外のqueryの場合も何もしない
	if($qv['post_type'] != 'attachment') {
		return $query_string;
	}

	// 条件に自分の画像を追加
	$add_query_string = array(
		'author' => $current_user->ID
	);

	$new_query_vars = array_merge($add_query_string,$qv);

	$query_var = array();
	foreach ($new_query_vars as $key => $value) {
		$query_var[] = $key.'='.$value;
	}

	return join('&', $query_var);

}