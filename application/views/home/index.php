

<section class="py-3 section-strict-height-full">
	<div class="container section-strict-height-full">
		<div class="row align-items-center section-strict-height-full">
			<div class="col-md-6 offset-md-3">
				<!-- ALERT TO DISPLAY ERROR OR WARNING -->
				<?php if(isset($alert)){ ?>
					<div class="alert mb-4 <?php echo $alert['class']; ?>">
						<?php echo $alert['html']; ?>
					</div><!-- /.alert mb-4 -->
				<?php } ?>

				<div class="card">
					<div class="card-body">
						<h1 class="h4 sr-only">Police UK</h1><!-- /.h4 -->

						<!-- FORM WITH GET METHOD TO ENTER POSTCODE -->
						<?php echo form_open(base_url('crimes-at-location/get-crimes'), array('method' => 'GET')); ?>
							<div class="form-group">
								<label for="postcode">Enter a UK postcode</label>
								<div class="input-group">
									<input type="text" name="postcode" id="postcode" class="form-control" autocomplete="off" />
									<div class="input-group-append">
										<button class="btn btn-primary" type="submit" title="Lookup">Lookup</button>
									</div><!-- /.input-group-append -->
								</div><!-- /.input-group -->
							</div><!-- /.form-group -->
							<p class="mb-0">
								eg. B4 7PS
							</p><!-- /.mb-0 -->
						</form>
						<!-- END FORM TO ENTER POSTCODE -->

					</div><!-- /.card-body -->
				</div><!-- /.card -->
			</div><!-- /.col-md-6 offset-md-3 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.py-3 section-strict-height-full -->
