<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="<?php echo $this->config->item('meta')['description']; ?>" />
    <meta name="keywords" content="<?php echo $this->config->item('meta')['keywords']; ?>" />

    <style>
        body{
            opacity: 0;
        }
    </style>

    <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="<?php echo base_url('assets/dist/styles/styles.min'.$this->config->item('assets_version_with_prefix').'.css'); ?>" />
    <noscript>
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/styles/styles.min'.$this->config->item('assets_version_with_prefix').'.css'); ?>" />
    </noscript>

	<link rel="canonical" href="<?php echo base_url(); ?>" />

	<title><?php echo $this->config->item('meta')['title']; ?></title>
</head>
<body>
