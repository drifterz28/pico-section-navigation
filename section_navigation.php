<?php

/**
 * navigation plugin which generates a better configurable navigation with endless children navigations
 *
 * @author Ahmet Topal
 * @link http://ahmet-topal.com
 * @license http://opensource.org/licenses/MIT
 */
class Section_Navigation {

    private $settings = array();
    private $navigation = array();

    public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page) {
        $navigation = array();
        echo $this->settings['base_url'];
        foreach ($pages as $page) {
            if ($this->is_child($page, $current_page)) {
                $navigation[] = $page;
            }
        }
        $sort = SORT_ASC;
        if($this->settings['pages_order'] === 'desc') {
            $sort = SORT_DESC;
        }

        array_multisort($navigation, $sort);
        $this->navigation = $navigation;
    }

    private function is_child($page, $c_page) {
        return (strlen(substr($page['url'], strlen($c_page['url']))) >= 1);
    }

    public function config_loaded(&$settings) {
        $this->settings = $settings;
    }

    public function before_render(&$twig_vars, &$twig) {
        $twig_vars['section_navigation']['navigation'] = $this->navigation;
    }
}
