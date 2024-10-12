       

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>

</html>

<!-- untuk sales -->
<script type="text/javascript">
    $('.tgllahirsales').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
        width: 100,
    });
</script>
<script type="text/javascript">
        $(document).ready(function(){
            jQuery(function($){
                $.mask.definitions['~']='[+-]';
                $('.telpsales').mask('9999-9999-9999');
            });
        });
</script>
<script>
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
</script>
<!-- _________________________________________________________________________________ -->
<!-- untuk pelanggan -->
<script type="text/javascript">
    $('.tgllahirpel').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
        width: 100,
    });


        $(document).ready(function(){
            jQuery(function($){
                $.mask.definitions['~']='[+-]';
                $('.telppel').mask('9999-9999-9999');
            });
        });
</script>
<script>
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
</script>