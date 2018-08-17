<?php
	// crime categories instance
	$crime_categories = array();
?>

<section class="py-5">
	<div class="container-fluid">
		<h1>Crimes</h1>
		<p>
			Postcode: <strong><?php echo $postcode; ?></strong>
		</p>
		<p>
			<a href="<?php echo base_url(); ?>" title="Enter postcode">
				&laquo; Enter postcode
			</a>
		</p>
		<br />
		<!-- NO RESULTS ALERT -->
		<?php if($crimes_data == null){ ?>
			<div class="alert alert-info">
				There are no crimes on the location having a postcode of
				<strong><?php echo $postcode; ?></strong>
				.
			</div><!-- /.alert alert-info -->
		<?php }else{ ?>
			<!-- IF HAVE RESULTS THEN DISPLAY COUNT AND TABLE -->

			<h2>All</h2>
			<p>
				<?php echo count($crimes_data); ?>
				<?php echo (count($crimes_data) < 2) ? 'result' : 'results'; ?>
			</p>

			<!-- CRIMES TABLE START -->
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Category</th>
							<th>Location type</th>
							<th>Location subtype</th>
							<th>Persistent ID</th>
							<th>Month</th>
							<th>Location</th>
							<th>Context</th>
							<th>ID</th>
							<th>Outcome status</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($crimes_data as $key => $crime){ ?>
							<?php
								// if category not yet pushed to crime categories array
								if (!in_array($crime['category'], $crime_categories)) {
									// push category to crime categories array
									$crime_categories[$crime['category']] = array();
								}
							?>
							<tr>
								<td class="align-middle">
									<?php echo $crime['category']; ?>
								</td>
								<td class="align-middle">
									<?php echo $crime['location_type']; ?>
								</td>
								<td class="align-middle">
									<?php echo empty($crime['location_subtype']) ? 'N&#47;A' : $crime['location_subtype']; ?>
								</td>
								<td class="align-middle">
									<a href="javascript:" class="btn btn-outline-dark btn-sm" data-toggle="popover" data-placement="right" data-content="<?php echo $crime['persistent_id']; ?>" data-trigger="focus" title="Persistent ID">View</a>
								</td>
								<td class="align-middle">
									<?php echo $crime['month']; ?>
								</td>
								<td class="align-middle">
									<p>
										latitude: <?php echo $crime['location']['latitude']; ?>
									</p>
									<p>
										longitude: <?php echo $crime['location']['longitude']; ?>
									</p>
									<p>
										Street ID: <?php echo $crime['location']['street']['id']; ?>
									</p>
									<p>
										Street name: <?php echo $crime['location']['street']['name']; ?>
									</p>
								</td>
								<td class="align-middle">
									<?php echo empty($crime['context']) ? 'N&#47;A' : $crime['context']; ?>
								</td>
								<td class="align-middle">
									<?php echo $crime['id']; ?>
								</td>
								<td class="align-middle">
									<p>
										Category: <?php echo $crime['outcome_status']['category']; ?>
									</p>
									<p>
										Date: <?php echo $crime['outcome_status']['date']; ?>
									</p>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table><!-- /.table table-bordered -->
			</div><!-- /.table-responsive -->
			<!-- CRIMES TABLE END -->

			<br />
			<br />
			<hr />
			<br />
			<br />

			<h2>Crimes by category</h2>

			<p>
				<?php echo count($crime_categories); ?>
				<?php echo (count($crime_categories) < 2) ? 'category' : 'categories'; ?>
			</p>


			<?php
				// push each crime to their specific categories
				foreach($crime_categories as $category => $category_data){
					foreach($crimes_data as $i => $crime){
						// if same category then push
						if ($category == $crime['category']) {
							array_push($crime_categories[$category], $crime);
						}
					}
				}
			?>

			<?php foreach($crime_categories as $category => $category_data){ ?>
				<h3 class="text-uppercase"><?php echo $category; ?></h3>

				<!-- CRIMES BY CATEGORY TABLE START -->
				<div class="table-responsive">
					<table class="table table-bordered mb-5">
						<thead>
							<tr>
								<th>Location type</th>
								<th>Location subtype</th>
								<th>Persistent ID</th>
								<th>Month</th>
								<th>Location</th>
								<th>Context</th>
								<th>ID</th>
								<th>Outcome status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($category_data as $key => $crime){ ?>
								<tr>
									<td class="align-middle">
										<?php echo $crime['location_type']; ?>
									</td>
									<td class="align-middle">
										<?php echo empty($crime['location_subtype']) ? 'N&#47;A' : $crime['location_subtype']; ?>
									</td>
									<td class="align-middle">
										<a href="javascript:" class="btn btn-outline-dark btn-sm" data-toggle="popover" data-placement="right" data-content="<?php echo $crime['persistent_id']; ?>" data-trigger="focus" title="Persistent ID">View</a>
									</td>
									<td class="align-middle">
										<?php echo $crime['month']; ?>
									</td>
									<td class="align-middle">
										<p>
											latitude: <?php echo $crime['location']['latitude']; ?>
										</p>
										<p>
											longitude: <?php echo $crime['location']['longitude']; ?>
										</p>
										<p>
											Street ID: <?php echo $crime['location']['street']['id']; ?>
										</p>
										<p>
											Street name: <?php echo $crime['location']['street']['name']; ?>
										</p>
									</td>
									<td class="align-middle">
										<?php echo empty($crime['context']) ? 'N&#47;A' : $crime['context']; ?>
									</td>
									<td class="align-middle">
										<?php echo $crime['id']; ?>
									</td>
									<td class="align-middle">
										<p>
											Category: <?php echo $crime['outcome_status']['category']; ?>
										</p>
										<p>
											Date: <?php echo $crime['outcome_status']['date']; ?>
										</p>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table><!-- /.table table-bordered mb-5 -->
				</div><!-- /.table-responsive -->
				<!-- CRIMES BY CATEGORY TABLE END -->
			<?php } ?>

		<?php } ?>

		<p>
			<a href="<?php echo base_url(); ?>" title="Enter postcode">
				&laquo; Enter postcode
			</a>
		</p>

	</div><!-- /.container-fluid -->
</section><!-- /.py-5 -->
