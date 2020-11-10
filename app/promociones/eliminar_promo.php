<?php
include '../../coneccion/coneccion.php';
include '../../Errores/mostrar_errores2.php';

$idpromo = $_GET['id'];


  echo '<form action="app/promociones/deletepromo.php" method="post">
      
        <div class="form-group">
         <label for="recipient-name" class="control-label">¿Esta seguro que desea eliminar este incetivo?</label>
       </div>
       
             <input type="hidden" name="idprom" value="'.$idpromo.'">
              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>    '
          ?>          