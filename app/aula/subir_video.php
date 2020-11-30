   <!-- ============================================================== -->
            <div class="container-fluid">
                   <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                       <strong><h4 class="text-themecolor">Aula virtual</h4></strong> 
                    </div>
                    
                </div>
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-body">
                            <h4 class="card-title">Añadir un nuevo video al aula</h4>
                            <h6 class="card-subtitle"> los videos que se suban podran ser visualizados por todos los usuarios referidos </h6>
                            <form class="form-horizontal mt-4" action="app/aula/guardar_video.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" name="titulo" placeholder="Introduzca un nombre para el video">
                                </div>
                               <div class="form-group">
                                    <label>Video en Formato MP4</label>
                                    <input type="file"  name="imagen"  class="form-control">
                                    <small class="form-control-feedback">El video no puede pasar mas de 8 MB !</small>
                                </div>
                                <div class="form-group">
                                    <label>Descripcion del video</label>
                                    <textarea class="form-control"  name="descripcion" rows="5"></textarea>
                                </div>
                               
                              <button type="submit" class="btn btn-dark mr-2">Subir video</button>
                              
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>