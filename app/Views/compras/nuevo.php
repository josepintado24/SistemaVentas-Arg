<?php
    $id_compra=uniqid();
?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                     
                       <?php if (isset($validation)) {?>
                       <div class="alert alert-danger">
                         <?php echo $validation->listErrors(); ?>
                       </div>
                       <?php }?>
                            <form method="POST" id="form_compra" name="form_compra"action="<?php echo base_url();?>/compras/guarda" autocomplete="off">
                           
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <input id="id_producto" name="id_producto" type="hidden" value="">
                                            <input id="id_compra" name="id_compra" type="hidden" value="<?php echo $id_compra;?>">
                                            <label for="">Código</label>
                                            <input  onkeyup="buscarProducto(event,this,this.value)"  placeholder="Escribe el código y enter" class="form-control" id="codigo" name="codigo" type="text"  autofocus />
                                            <label for="codigo" id="resultado_error" style="color: red"></label>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <label for="">Nombre del producto</label>
                                            <input class="form-control" id="nombre" name="nombre" type="text" disabled/>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label for="">cantidad</label>
                                            <input  class="form-control" id="cantidad" name="cantidad" type="text"  />
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <label for="">Precio Comprea</label>
                                            <input class="form-control" id="precio_compra" name="precio_compra" type="text" value="" autofocus />
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <label for="">Subtotal</label>
                                            <input class="form-control" id="subtotal" name="subtotal" type="text" value="" disabled />
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <label ><br>&nbsp;</label>
                                            <button onclick="agregarProducto(id_producto.value,cantidad.value, '<?php echo $id_compra; ?>' )" id="agregar_producto" name="agregar_producto" type="button" class="btn btn-primary">
                                                Agregar Producto
                                            </button>
                                        </div>
                                    </div>    
                                </div>
                                   <div class='row'>
                                       
                                        <table id="tablaProductos" class="table table-sm">
                                            <thead class="thead-dark">
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Código</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Total</th>
                                                <th width ="1%" scope="col"></th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                   </div>
                                    <div>
                                        <div class="col-12 col-sm-6 offset-md-6"> 
                                            <label style="font-weight: bold; font-size: 30px; text-align: center;"> Total $</label>
                                            <input style="font-weight: bold; font-size: 30px; text-align: center;" size="7" readonly="true" type="text" id="total" name="total" value="0.00">
                                       
                                            <button  type="button" id="completa_compra"  name="completa_compra" class="btn btn-success">Finalizar Compra</button>
                                        </div>
                                    </div>


                                   
                               
                                
                            </form>
                            
                            
                            
                        
                    </div>
                </main>
                <script>
                        $(document).ready(function(){
                            $("#completa_compra").click(function(){
                                let nFila=$("#tablaProductos tr").length;
                                if(nFila<2){
                                    
                                }else{
                                    $("#form_compra").submit();
                                }
                            });
                           
                        });

                        function buscarProducto(e, tagCodigo, codigo){
                            var enterkey=13;

                            if (codigo !=''){
                                if (e.which==enterkey){ 
                                    $.ajax({
                                        url: '<?php echo base_url(); ?>/productos/buscarPorCodigo/'+codigo,
                                        dataType: 'json',
                                        success: function(resultado){
                                          
                                            if(resultado == 0){
                                                $(tagCodigo).val('');
                                            }else{
                                                $(tagCodigo).removeClass('has-error');
                                                $("#resultado_error").html(resultado.error);
                                                if(resultado.existe){
                                                    $("#id_producto").val(resultado.datos.id);     
                                                    $("#nombre").val(resultado.datos.nombre);     
                                                    $("#cantidad").val(1);     
                                                    $("#precio_compra").val(resultado.datos.precio_compra);     
                                                    $("#subtotal").val(resultado.datos.subtotal);  
                                                    $("#cantidad").focus();      
                                                }else{
                                                    $("#id_producto").val('');     
                                                    $("#nombre").val('');     
                                                    $("#cantidad").val('');     
                                                    $("#precio_compra").val('');     
                                                    $("#subtotal").val('');  
                                                }
                                            }
                                        }
                                    });
                                }
                            }
                        }


                        function agregarProducto(id_producto, cantidad, id_compra){
                         

                            if (id_producto !=null && id_producto!=0 && cantidad>0){
                                
                                    $.ajax({
                                        url: '<?php echo base_url(); ?>/TemporalCompra/inserta/'+id_producto+"/"+cantidad+"/"+id_compra,
                                        
                                        success: function(resultado){
                                            if(resultado == 0){
                                                $(tagCodigo).val('');
                                            }else{
                                                var resultado= JSON.parse(resultado);
                                                if (resultado.error==''){
                                                    $("#tablaProductos tbody").empty();
                                                    $("#tablaProductos tbody").append(resultado.datos)
                                                    $("#total").val(resultado.total);
                                                    $("#id_producto").val('');     
                                                    $("#nombre").val(''); 
                                                    $("#codigo").val('');        
                                                    $("#cantidad").val('');     
                                                    $("#precio_compra").val('');     
                                                    $("#subtotal").val('');  
                                                }
                                            }
                                        }
                                    });
                                
                            }
                        }

                        function eliminaProducto(id_producto, id_compra){
                            
                                    $.ajax({
                                        url: '<?php echo base_url(); ?>/TemporalCompra/eliminar/'+id_producto+"/"+id_compra,
                                        success: function(resultado){
                                          
                                            if(resultado == 0){
                                                $(tagCodigo).val('');
                                            }else{
                                                var resultado= JSON.parse(resultado);
                                                $("#tablaProductos tbody").empty();
                                                $("#tablaProductos tbody").append(resultado.datos)
                                                $("#total").val(resultado.total);
                                            }
                                        }
                                    });
                             
                        }
                </script>