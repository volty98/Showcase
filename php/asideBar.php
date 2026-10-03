<?php
function asidebar()
{
    global  $page, $content, $categories;

    $html_sideBar = '';

    // Generate the HTML for the page content
    $html_sideBar .= '<aside>' . 
        '<div>' .
        '<h2>' . "sidebar" . '</h2>' .
        '<p>' . "No content available" . '</p>' .
        '</div>' .
        '</aside>';

    return $html_sideBar;
}
