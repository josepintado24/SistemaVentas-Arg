
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h4 class="mt-4"><?php echo $titulo;?></h4>
                        <?php if (isset($validation)) {?>
                       <div class="alert alert-danger">
                         <?php echo $validation->listErrors(); ?>
                       </div>
                       <?php }?>
                            <form method="POST" action="<?php echo base_url();?>/configuracion/actualizar" autocomplete="off">
                            <?php csrf_field(); ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">Nombre Tienda</label>
                                            <input class="form-control" id="tienda_nombre" name="tienda_nombre" typr="text" value="<?php echo $nombre['valor']; ?>"  >
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">RFC</label>
                                            <input class="form-control" id="tienda_rfc" name="tienda_rfc" typr="text" value="<?php echo $tienda_rfc['valor']; ?>"  >
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">telefono</label>
                                            <input class="form-control" id="tienda_telefono" name="tienda_telefono" typr="text" value="<?php echo $tienda_telefono['valor']; ?>"  >
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">email</label>
                                            <input class="form-control" id="tienda_email" name="tienda_email" typr="text" value="<?php echo $tienda_email['valor']; ?>" >
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <label for="">direccion</label>
                                            <textarea class="form-control" id="tienda_direccion" name="tienda_direccion" typr="text" value="<?php echo $tienda_direccion['valor']; ?>"><?php echo $tienda_direccion['valor']; ?></textarea>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <label for="">ticket</label>
                                            <textarea class="form-control" id="ticket_leyenda" name="ticket_leyenda" typr="text" value="<?php echo $ticket_leyenda['valor']; ?>"><?php echo $ticket_leyenda['valor']; ?></textarea>
                                           
                                        </div>
                                    </div>    
                                </div>
                                    <a href="<?php echo base_url();?>/configuracion" class="btn btn-primary">Regresar</a>
                                    <button type="submit" class="btn btn-success">Guardar </button>
                               
                                
                            </form>
                    </div>
                </main>
                <!-- Modal -->
                <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>¿Desea eliminar este registro?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <a class="btn btn-danger btn-ok">Si</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            