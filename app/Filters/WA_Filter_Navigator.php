<?php

namespace WA\Addon\Filters;

use WA\Addon\Helpers\Polylang_Fns;

class WA_Filter_Navigator
{
    function __construct()
    {
        add_filter('render_block', [$this, 'modify_navigation_block_output'], 10, 2);
    }

    public function modify_navigation_block_output($block_content, $block)
    {
        if ($block['blockName'] === 'core/navigation') {
            // get current language
            $current_lang = Polylang_Fns::get_current_language();

            $block_content = preg_replace_callback('/<a[^>]*href="([^"]+)"[^>]*>(.*?)<\/a>/', function ($matches) use ($current_lang) {
                $url = $matches[1];
                // need to get content of a tag too
                $content = $matches[2];

                // replace the language in the url
                $page = Polylang_Fns::replace_language_in_page($url, $current_lang);

                if ($page['title'] === '') {
                    $page['title'] = $content;
                }

                return '<a href="' . $page['url'] . '">' . $page['title'] . '</a>';
            }, $block_content);

        }
        return $block_content;
    }


}