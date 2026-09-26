<?php
function home() {
	$home = buildPage('home');
    if (!$home) {
        echo '<p>
        This theme needs a static page "home".
        If you have not created it yet, please add a static page "home".
        It will be used as the main content for the home page.
        </p>';
        echo '<hr />';
        echo '<p>
        このテーマでは、静的ページ "home" が必要です。
        まだ作成していない場合は、静的ページ "home" を追加してください。
        ホームページのメインコンテンツとして使用されます。
        </p>';
        
        return;
    }
    
    // echo '<small>' . $home->slug() . '</small>';
	// echo '<h3>' . $home->title() . '</h3>';
    return $home->content();
}
