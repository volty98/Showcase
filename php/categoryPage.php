<?php
function categoryPage()
{
    global  $page, $content, $categories;

    $html_categoryPage = '';
    $html_permalinks = '';

    $categoryKey = $page->categoryKey();
    
    foreach ($content as $p)
    {
        $permalink = $p->permalink();
        $html_permalinks .= '<a href="' . $permalink . '">' . $p->title() . '</a>';
        $html_permalinks .= '<hr>';
    }

    // Generate the HTML for the category page content
    $html_categoryPage = '<div class="showtime-category">' .
        $html_permalinks .
        '</div>';

    return $html_categoryPage;
}
