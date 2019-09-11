<!-- Modal -->
  <div class="modal fade" id="modal-consultar" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Consultar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="consultar" autocomplete="off">

<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>EMPRESA</label>
<select class="form-control" id="empresa" name="empresa" required>
  <option value="">[SELECCIONAR]</option>

<?php foreach (Historial_empresa::empresa() as $key => $value): ?>
  <option value="<?php echo $value['idempresa'] ?>"><?php echo $value['descripcion']; ?></option>
<?php endforeach; ?>

</select>
</div>
</div>

<div id="id_detalle">

</div>
</div>




<div class="modal-footer">
  <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
