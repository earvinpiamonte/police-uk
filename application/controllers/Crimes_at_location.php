<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crimes_at_location extends CI_Controller {

	private $view_data;

	public function __construct()
	{
		parent::__construct();

		// view data
		$this->view_data = array();
	}


	public function index()
	{
		// redirect to base url when accessing index page
		// nothing to see here
		redirect(base_url());
	}

	public function get_crimes(){
		// set default alert in case something goes wrong
		$alert = array(
			'class' => 'alert-danger',
			'html'  => 'Something went wrong.'
		);

		// get postcode
		$postcode = $this->input->get('postcode');

		// if postcode not set, return back to form
		if (!isset($postcode) || $postcode == null) {
			redirect(base_url());
		}

		// set postcode without space
		$postcode_no_white_space = str_replace(' ', '', $postcode);

		// set country code
		$country_code = 'UK';

		// maps request URL
		$maps_request_url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$postcode_no_white_space.',+'.$country_code.'&sensor=false';

		// get returned response data as json
		$maps_json_data = @file_get_contents($maps_request_url);

		// convert returned response to array
		$maps_data = json_decode($maps_json_data, true);

		// if maps array is not null
		if ($maps_data != null) {

			// if map array data status is OK
			if ($maps_data['status'] == 'OK') {

				// get geometry
				$map_geometry = $maps_data['results'][0]['geometry'];

				// get lat & lng on location
				$map_location = $map_geometry['location'];

				// police UK request URL
				$police_uk_request_url = 'https://data.police.uk/api/crimes-at-location?lat='.$map_location['lat'].'&lng='.$map_location['lng'];

				$police_uk_json_data = @file_get_contents($police_uk_request_url);

				// convert returned response to array
				$police_uk_data = json_decode($police_uk_json_data, true);

				// set returned crimes data to view
				$this->view_data['crimes_data'] = $police_uk_data;

				// set postcode to view
				$this->view_data['postcode']    = $postcode;

				// display page views
				$this->load->view('includes/html-start', $this->view_data);
				$this->load->view('crimes-at-location/get-crimes', $this->view_data);
				$this->load->view('includes/html-end', $this->view_data);

			}else{
				// set alert
				$alert = array(
					'class' => 'alert-warning',
					'html'  => 'Something went wrong on requesting data on Google Maps. It returned not &quot;OK&quot; status.'
				);

				// set alert to form page then redirect; disappears on page refresh
				$this->session->set_flashdata('alert', $alert);
				redirect(base_url());
			}

		}else{
			// set alert
			$alert = array(
				'class' => 'alert-warning',
				'html'  => 'Something went wrong on requesting data on Google Maps.'
			);

			// set alert to form page then redirect; disappears on page refresh
			$this->session->set_flashdata('alert', $alert);
			redirect(base_url());
		}
	}
}
