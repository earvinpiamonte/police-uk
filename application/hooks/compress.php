<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function compress()
{
	$CI =& get_instance();

	if(!$CI->input->is_cli_request()){

		$buffer = $CI->output->get_output();

		 $search = array(
			'/\n/',			// replace end of line by a space
			'/\>[^\S ]+/s',		// strip whitespaces after tags, except space
			'/[^\S ]+\</s',		// strip whitespaces before tags, except space
		 	'/(\s)+/s',		// shorten multiple whitespace sequences
		 	'/<!--(.|\s)*?-->/' //strip HTML comments
		  );

		 $replace = array(
			' ',
			'>',
		 	'<',
		 	'\\1',
		 	''
		  );

		$buffer = preg_replace($search, $replace, $buffer);

		$output = $buffer;

		$content_before_compressed_html = $CI->config->item('content_before_compressed_html');
		$output = $content_before_compressed_html.$buffer;

		$CI->output->set_output($output);
		$CI->output->_display();

	}
}

/* End of file compress.php */