<?php
    include_once '../../app.php';
    use Models\Region;
    Region::setConn($conn);
    $objRegion = new Region();
?>
<script type="text/javascript" src="view/Regiones/region.js"></script>
<h1>Formulario de registro</h1>
<form id="frmRegion">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre ciudad</label>
    <input type="text" class="form-control" id="name_region" name="name_region">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Departamentos</label>
    <select class="form-select" name="id_region" id="id_region" aria-label="Default select example">
        <option selected>Seleccione un departamento</option>
        <?php foreach ($objRegion->loadAllData() as $region): ?>
            <option value="<?php echo $region['id_region']; ?>"><?php echo $region['name_region']; ?></option>
        <?php endforeach; ?>          
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
