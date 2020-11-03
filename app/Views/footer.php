              
               
            </div>
        </div></div>
        <script src="<?php echo base_url();?>/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/js/scripts.js"></script>
        <script src="<?php echo base_url();?>/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url();?>/assets/demo/datatables-demo.js"></script>
              <script >
                $('#modal-confirma').on('show.bs.modal', function(e) {
                    $(this).find('.btn-ok').attr('href',$(e.relatedTarget).data('href'));
                });
              </script>
    </body>
</html>
