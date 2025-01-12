<?php

namespace WA\Addon\Helpers;

class Polylang_Fns {
    function __construct()
    {

    }

    public static function get_current_language(): array|\PLL_Language|bool|int|string
    {
        if (function_exists('pll_current_language')) {
            return pll_current_language();
        }
        return 'en';
    }

    public static function replace_language_in_page($url, $lang): array
    {
        $return_page = [
            'url' => $url,
            'title' => ''
        ];
        $lang = $lang === 'en' ? '' : $lang;
        $slug = str_replace(home_url(), '', $url);
        $page = get_page_by_path($slug);
        if ($page) {
            // get permalink by language
            $current_url_id = $page->ID;
            $return_id= pll_get_post($current_url_id, $lang);
            $return_page = [
              'url' => get_permalink($return_id),
              'title' => get_the_title($return_id)
            ];
        }


        return $return_page;
    }
}