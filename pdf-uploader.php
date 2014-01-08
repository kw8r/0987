<?php
//pdfアップローダー
function test_menu_page() {
	$siteurl = get_option( 'siteurl' );
?>
<div class="wrap">
<h2>約款PDFアップロード</h2>
<form action="http://bigflag.co.jp/pdf_upload.php" method="post" enctype="multipart/form-data">
		ファイル：<input type="file" name="upfile" size="30" />
		<br />
		<p>※ファイル名は『yakkan.pdf』に変更してアップロードしてください。</p>
		<br />
		<input type="submit" value="アップロード" />
	</form>
</div>
<?php
}
function test_admin_menu() {
	add_menu_page( '約款PDFアップロード', '約款PDFアップロード', 'read',
		__FILE__, 'test_menu_page' );
}
add_action( 'admin_menu', 'test_admin_menu' );
?>
