<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<i class="fa fa-users"></i> Reports

		</h1>
	</section>
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Lowest Rated Pets</h3>
				<div class="box-tools">
				</div>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table id="dataTable" class="table table-hover" cellspacing="5" width="100%">
					<thead>
						<tr>
							<th>Image</th>
							<th>Name</th>
							<th>Breed</th>
							<th>Rating</th>

						</tr>
					</thead>
					<tbody>
						<?php
						if(!empty($low))
						{
							foreach($low as $record)
							{
								?>
								<tr>

									<td style="display:block; font-size: 0px; " ><img  src="<?php echo base_url();?>pets/<?php echo $record->img ?>" width="70px" height="20%" ></td>
									<td><?php echo $record->name ?></td>
									<td><?php echo $record->breed ?></td>
									<td><?php echo $record->rating ?></td>


								</tr>
								<?php
							}
						}
						?>
					</tbody>
				</table>

			</div><!-- /.box-body -->



		</div>
	</div>
</div>

