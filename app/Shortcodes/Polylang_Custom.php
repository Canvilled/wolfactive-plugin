<?php

namespace WA\Addon\Shortcodes;

use WA\Addon\WA_Constants;

class Polylang_Custom{
    function __construct()
    {
        add_shortcode( 'polylang_switcher', [$this,'wolfactive_polylang_switcher'] );
    }

    public function wolfactive_polylang_switcher() {
        if ( function_exists( 'pll_the_languages' ) ) {
            $languages = pll_the_languages([
                "dropdown" => 1,
                "hide_current" => 0,
                "show_flags" => 1,
                "raw" => 1,
                'display_names_as' => 'slug'
            ]);
            $output = '<select class="wolfactive-polylang-switcher">';
            if ($languages) {
                foreach ($languages as $lang) {
                    // $url returns the URL of the language, if the page exist in this language.
                    if ($lang['current_lang']) {
                        $output .= '<option selected lang="'.$lang['locale'].'" value="' . $lang['url'] . '" class="wolfactive-polylang-switcher__item">' . $lang['name'] . '</option>';
                    }else{

                        $output .= '<option lang="'.$lang['locale'].'" value="' . $lang['url'] . '" class="wolfactive-polylang-switcher__item">' . $lang['name'] . '</option>';
                    }
                }
            }
            $output .= '</select>';
            return $output;
        } else {
            return __( 'Polylang plugin is not active.', WA_Constants::WOLFACTIVE_ADDONS_TEXT_DOMAIN );
        }
    }

}
