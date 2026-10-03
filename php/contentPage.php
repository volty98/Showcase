<?php
function contentpage()
{
    global  $page, $content, $categories;

    $html_contentPage = '';
    $categoryKey = $page->categoryKey();
    
    // Generate the HTML for the page content
    $html_contentPage .= 
        '<!-- ' . $page->slug() . ' -->' . "\n" .
        '<div class="showtime-page">' .
        '<h1>' . $page->title() . '</h1>' .
        '<p class="text-right font-weight-bold text-muted my-0 pb-3">' . $page->dateModified('Y-m-d H:i:s') .'</p>' .
        $page->content() . '</div>';

    return $html_contentPage;
}
