<head>
  <script src="../vendors/app-assets/vendors/js/jquery/jquery.min.js"></script>
  <script src="../vendors/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
  <script src="../vendors/app-assets/vendors/js/extensions/polyfill.min.js"></script>
  <script src="../vendors/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
</head>

<?php
echo '<script type="text/javascript">
            $(document).ready(function(){
              Swal.fire({
              title: "Login Berhasil..",
              icon: "success",
              customClass: {
                confirmButton: "btn btn-primary"
              },
              buttonsStyling: false
            });
          });
        </script>';
?>