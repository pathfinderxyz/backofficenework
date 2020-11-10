

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                   <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                       <strong><h4 class="text-themecolor">Incentivos y promociones</h4></strong> 
                    </div>
                    
                </div>
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <h4 class="card-title">Añadir una nuevo incentivo</h4>
                            <h6 class="card-subtitle"> En esta seccion puedes agregar una promocion para que los usuarios del sitio pueden visualizarlo
                            y asi incentivarse a buscar mas clientes </h6>
                            <form class="form-horizontal mt-4" action="app/promociones/guardarpromocion.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" name="titulo" placeholder="Introduzca un nombre para la promocion">
                                </div>
                               <div class="form-group">
                                    <label>Imagen de referencia</label>
                                    <input type="file"  name="imagen"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Descripcion de la promocion</label>
                                    <textarea class="form-control"  name="descripcion" rows="5"></textarea>
                                </div>
                               
                              <button type="submit" class="btn btn-success mr-2">Crear promocion</button>
                              
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>