<form id="consultar">
<div class="modal fade" id="modal-consultar">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Consultar</h4>
			</div>
			<div class="modal-body">

			<div class="input-group">
			<input type="month" id="fecha"  class="form-control" required
			value="<?php echo date('Y-m') ?>">
			<span class="input-group-btn">
			<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
			</span>
			</div><!-- /input-group -->

			</div>
		</div>
	</div>
</div>
</form>
