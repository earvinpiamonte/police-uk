<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// used for condition if localhost
$localhost_addrs = array(
    '127.0.0.1',
    '::1'
);

// assets version
$config['assets_version']             = '201808131050';

// add period before assets
$config['assets_version_with_prefix'] = '.'.$config['assets_version'];

// if localhost then do not use assets versioning
if(in_array($_SERVER['REMOTE_ADDR'], $localhost_addrs)){
	$config['assets_version_with_prefix'] = '';
}

// site details
$config['site'] = array(
	'name'        => 'Police UK',
	'description' => 'DATA.POLICE.UK API using postcode',
	'tags'        => 'codeigniter, sass, html5, bootstrap, data.police.uk'
);

// pages meta
$config['meta'] = array(
	'title'       => $config['site']['name'],
	'description' => $config['site']['description'],
	'keywords'    => $config['site']['tags']
);

// after compressed
$config['content_before_compressed_html'] = '<!-- Created by Noel Earvin Piamonte -->';