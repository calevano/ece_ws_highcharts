<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  |--------------------------------------------------------------------------
  | Add Css and JS
  |--------------------------------------------------------------------------
  |
  | Añadir Css y Js al iniciar la Aplicacioón.
  |
 */


$config['header_css'] = array('bootstrap.min',
    'font-awesome.min',
    'ionicons.min',
    'global',
    'style.min',
    'skins/_all-skins.min');

$config['header_js'] = array('bootstrap.min',
    'plugins/fastclick/fastclick.min',
    'plugins/slimScroll/jquery.slimscroll.min',
    'app.min');

$config['header_js_'] = array();
