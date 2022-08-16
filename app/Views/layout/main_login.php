<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hanindya Gallery | Log in </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= BASE  ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= BASE  ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= BASE  ?>/assets/dist/css/adminlte.min.css">


  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
</head>

<body class="hold-transition login-page">

  <?= $isi ?>



  <!-- jQuery -->
  <script src="<?= BASE  ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= BASE  ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= BASE  ?>/assets/dist/js/adminlte.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script type="text/javascript">
    // Provinsi
    $(document).ready(function() {
      $("#kota").select2({});
      // $("#kota").disabled();
      // $('#kota').prop('readOnly', true);
      $("#provinsi").select2({
        ajax: {
          url: '<?= BASE ?>/front/getdataprov',
          type: "post",
          dataType: 'json',
          delay: 200,
          data: function(params) {
            return {
              searchTerm: params.term
            };
          },
          processResults: function(response) {
            return {
              results: response
            };
          },
          cache: true
        },
        // placeholder: "Select a value",
      });
    });

    // kota
    $("#provinsi").change(function() {
      // $('#kota').prop('readOnly', false);

      var id_prov = $("#provinsi").val();
      $("#kota").select2({
        ajax: {
          url: '<?= base_url() ?>/front/getdatakot/' + id_prov,
          type: "post",
          dataType: 'json',
          delay: 200,
          data: function(params) {
            return {
              searchTerm: params.term
            };
          },
          processResults: function(response) {
            return {
              results: response
            };
          },
          cache: true
        }
      });
    });
  </script>
</body>

</html>