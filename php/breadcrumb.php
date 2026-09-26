<?php
function breadcrumb()
{
    global  $site, $page, $categories, $WHERE_AM_I;

    $html_category = '';
    $html_title = '';
    $html_separator = '<li class="breadcrumb-item"><i class="fas fa-angle-right"></i></li>';

    // No have breadcrumb for the home page
    if($WHERE_AM_I == 'home') {
        return '';
    }

    // Navlinks of the categories ---------------------------------------
    // if ($WHERE_AM_I =='category')
    {
        $categoryKey = $page->categoryKey();

        // Categoriesを取得し、対象のカテゴリ情報を取得
        $categories = getCategories();
        foreach ($categories as $c)
        {
            $targetCategory = $c->key() === $categoryKey ? $c : null;
            if ($targetCategory) {
                break;
            }
        }
        // ページが属するカテゴリのパンくずリストを生成、カテゴリがない場合は空にする
        if($targetCategory)
        {
            $html_category = $html_separator . '<li class="breadcrumb-item"><a href="' . $targetCategory->permalink() . '">' . $targetCategory->name() . '</a></li>'; 
        }
    }

    // Navlinks of the pages ---------------------------------------
    if($WHERE_AM_I == 'page')
    {
        $html_title = '<li class="breadcrumb-item active">' . $page->title() . '</li>';
    }

    // Generate the final breadcrumb HTML --------------------------
    $html_breadcrumb = '
         <nav aria-label="breadcrumb">
            <ul class="showtime-breadcrumb breadcrumb">
                <li class="breadcrumb-item mr-3"><a href="' . $site->url() . '"><i class="fas fa-home"></i></a></li>'
                . $html_category . $html_separator . $html_title . '
            </ul>
        </nav>
        ';

    return $html_breadcrumb;
}
