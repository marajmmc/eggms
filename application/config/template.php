<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  |--------------------------------------------------------------------------
  | Active template, ala http://williamsconcepts.com/ci/codeigniter/libraries/template/reference.html#writing
  |--------------------------------------------------------------------------
  |
  | The $template['active_template'] setting lets you choose which template
  | group to make active.  By dashboard there is only one group (the
  | "dashboard" group).
  |
 */
$template['active_template'] = 'dashboard';
/*
  |--------------------------------------------------------------------------
  | Explaination of template group variables
  |--------------------------------------------------------------------------
  |
  | ['template'] The filename of your master template file in the Views folder.
  |   Typically this file will contain a full XHTML skeleton that outputs your
  |   full template or region per region. Include the file extension if other
  |   than ".php"
  | ['regions'] Places within the template where your content may land.
  |   You may also include dashboard markup, wrappers and attributes here
  |   (though not recommended). Region keys must be translatable into variables
  |   (no spaces or dashes, etc)
  | ['parser'] The parser class/library to use for the parse_view() method
  |   NOTE: See http://codeigniter.com/forums/viewthread/60050/P0/ for a good
  |   Smarty Parser that works perfectly with Template
  | ['parse_template'] FALSE (dashboard) to treat master template as a View. TRUE
  |   to user parser (see above) on the master template
  |
  | Region information can be extended by setting the following variables:
  | ['content'] Must be an array! Use to set dashboard region content
  | ['name'] A string to identify the region beyond what it is defined by its key.
  | ['wrapper'] An HTML element to wrap the region contents in. (We
  |   recommend doing this in your template file.)
  | ['attributes'] Multidimensional array defining HTML attributes of the
  |   wrapper. (We recommend doing this in your template file.)
  |
  | Example:
  | $template['dashboard']['regions'] = array(
  |    'header' => array(
  |       'content' => array('<h1>Welcome</h1>','<p>Hello World</p>'),
  |       'name' => 'Page Header',
  |       'wrapper' => '<div>',
  |       'attributes' => array('id' => 'header', 'class' => 'clearfix')
  |    )
  | );
  |
 */
/*
  |--------------------------------------------------------------------------
  | Default Template Configuration (adjust this or create your own)
  |--------------------------------------------------------------------------
 */
$template['dashboard']['template'] = 'template_dashboard';
$template['dashboard']['regions'] = array(
    'title',
    'javascript',
    'meta',
    'css',
    'content',
    'footer'
);
$template['dashboard']['parser'] = 'parser';
$template['dashboard']['parser_method'] = 'parse';
$template['dashboard']['parse_template'] = FALSE;

$template['report']['template'] = 'template_report';
$template['report']['regions'] = array(
    'title',
    'javascript',
    'meta',
    'css',
    'content'

);
$template['report']['parser'] = 'parser';
$template['report']['parser_method'] = 'parse';
$template['report']['parse_template'] = FALSE;


$template['login']['template'] = 'template_login';
$template['login']['regions'] = array
(
    'title',
    'javascript',
    'meta',
    'css',
    'content'

);
$template['login']['parser'] = 'parser';
$template['login']['parser_method'] = 'parse';
$template['login']['parse_template'] = FALSE;


$template['website']['template'] = 'template_website';
$template['website']['regions'] = array
(
    'title',
    'javascript',
    'meta',
    'css',
    'content'

);
$template['website']['parser'] = 'parser';
$template['website']['parser_method'] = 'parse';
$template['website']['parse_template'] = FALSE;

/* End of file template.php */
/* Location: ./system/application/config/template.php */