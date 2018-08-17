<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// set form error
if ( ! function_exists('site_form_errors'))
{
    function site_form_errors($config_form_validation)
    {
        $form_errors = array();

        foreach ($config_form_validation as $key => $field) {
            $form_errors[$field['field']] = form_error($field['field'], '<span>', '</span>');

        }

        return $form_errors;
    }
}

// display validation errors template
if ( ! function_exists('site_validation_errors'))
{
    function site_validation_errors($form_errors)
    {
        $form_errors_display = validation_errors('<p>', '</p>');

        return $form_errors_display;
    }
}