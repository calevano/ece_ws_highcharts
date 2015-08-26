<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


//Añade dinamicamente archivos personalizados js en el pie de la pagina
if (!function_exists('add_js')) {

    function add_js($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_js = $ci->config->item('header_js');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_js[] = $item;
            }
            $ci->config->set_item('header_js', $header_js);
        } else {
            $str = $file;
            $header_js[] = $str;
            $ci->config->set_item('header_js', $header_js);
        }
    }

}

//añadir js al inicio tamare
if (!function_exists('add_js_')) {

   function add_js_($file = '') {
      $str = '';
      $ci = &get_instance();
      $header_js_ = $ci->config->item('header_js_');

      if (empty($file)) {
         return;
      }

      if (is_array($file)) {
         if (!is_array($file) && count($file) <= 0) {
            return;
         }
         foreach ($file AS $item) {
            $header_js_[] = $item;
         }
         $ci->config->set_item('header_js_', $header_js_);
      } else {
         $str = $file;
         $header_js_[] = $str;
         $ci->config->set_item('header_js_', $header_js_);
      }
   }

}

if (!function_exists('put_headersJs_')) {

    function put_headersJs_() {
        $str = '';
        $ci = &get_instance();
        $header_js = $ci->config->item('header_js_');

        foreach ($header_js AS $item) {
            $str .= '<script src="' . base_url() . 'assets/js/' . $item . '.js"></script>' . "\n";
        }

        return $str;
    }

}

//Añade dinamicamente archivos personalizados css en el header de la pagina
if (!function_exists('add_css')) {

    function add_css($file = '') {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file AS $item) {
                $header_css[] = $item;
            }
            $ci->config->set_item('header_css', $header_css);
        } else {
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('header_css', $header_css);
        }
    }

}

//Añade dinamicamente archivos css en el header de la pagina
if (!function_exists('put_headersCss')) {

    function put_headersCss() {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');

        foreach ($header_css AS $item) {
            $str .= '<link rel="stylesheet" href="' . base_url() . 'assets/css/' . $item . '.css"  />' . "\n";
        }

        return $str;
    }

}

//Añade dinamicamente archivos js en el pie de la pagina
if (!function_exists('put_headersJs')) {

    function put_headersJs() {
        $str = '';
        $ci = &get_instance();
        $header_js = $ci->config->item('header_js');

        foreach ($header_js AS $item) {
            $str .= '<script src="' . base_url() . 'assets/js/' . $item . '.js"></script>' . "\n";
        }

        return $str;
    }

}
