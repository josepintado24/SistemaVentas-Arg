
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h4 class="mt-4"><?php echo $titulo;?></h4>
                            <div>
                                <p>
                                    <a href="<?php echo base_url();?>/productos" class="btn btn-primary">Productos</a>
                                   
                                </p>
                            </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>Id</th>
                                                <th>Código</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Existencia</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php  
                                                foreach ($datos as $dato){?>
                                                    <tr>
                                                        <td><?php echo $dato['id']; ?> </td>
                                                        <td><?php echo $dato['codigo']; ?> </td>
                                                        <td><?php echo $dato['nombre']; ?> </td>
                                                        <td><?php echo $dato['precio_venta']; ?> </td>
                                                        <td><?php echo $dato['existencia']; ?> </td>

                                                        <td>
                                                            <a href="<?php echo base_url().'/productos/reingresar/'. $dato['id']; ?>" class="btn btn-warning">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </td>
                                                        
                                                    </tr>

                                         <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            
                        </div>
                    </div>
                </main>
                 <!-- Modal -->
                 <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reingresar Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Desea reingresar este registro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a class="btn btn-danger btn-ok">Si</a>
                    </div>
                    </div>
                </div>
                </div>