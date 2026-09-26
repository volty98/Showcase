<?php
function siteHeader() {
    global $site, $staticContent;

    $html_categorylinks = '';
    $html_navlinks = '';
    $html_separator = '';//'<li class="nav-item"><a class="nav-link disabled font-weight-bold">:</a></li>';

    // Categoriesを取得し、Navbarのリンクを生成する
    $all_categories = getCategories();
    foreach ($all_categories as $c)
    {
        $html_categorylinks .= '<li class="nav-item mr-3"><a class="nav-link btn btn-outline-light" href="'. $c->permalink() .'">' . $c->name() . '</a></li>';
    }
    
    // StaticPageをposition順で取得し、Navbarのリンクを生成する
    $sortedPages = $staticContent;
    usort($sortedPages, function($curr, $next) {
        return $curr->position() - $next->position();
    });

    foreach ($sortedPages as $p) {
        // ホームページ"home"の場合は除外
        if($p->slug() == 'home')
        {
            continue;
        }
        $html_navlinks .= '<li class="nav-item"><a class="nav-link" href="' . $p->permalink() . '">' . $p->title() . '</a></li>';
    }
    $html_navlinks = $html_categorylinks . $html_separator . $html_navlinks;

    $html_header = '
        <nav class="showtime-header-logo navbar fixed-top navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="'.$site->url().'">
                <img class="d-inline-block align-top" src="'.$site->logo().'" alt="'.$site->description().'">
                <div class="ml-2 d-flex flex-column justify-content-center">
                    <h5 class="mt-0">'.$site->title().'</h5>
                    <small calss="text-muted">'.$site->slogan().'</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    ' . $html_navlinks . '
                </ul>
            </div>
        </div>
        </nav>
    ';

    return $html_header;
}
