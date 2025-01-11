<?php date_default_timezone_set('Asia/Bangkok'); 

require_once '../controller/conn.php';

session_start();
if (!isset($_SESSION['user_id']) && $_SESSION['user_urole'] != 'user' ) {
  header('Location: ../index.php');
  exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = $user_id";
$stmt = $pdo->prepare($sql); 
$stmt->execute();           

if ($stmt->rowCount() > 0) {
    $userInfo = $stmt->fetch(PDO::FETCH_ASSOC); 
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="../favicon/favicon.ico" />
  <link rel="stylesheet" href="../assets/css/styles.css" />
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <title>Invoice Neko</title>
</head>

<body class="link-sidebar">

  <div id="main-wrapper">

    <?php require_once("./bar/sidebar.php") ?>
    <div class="page-wrapper">

      <?php require_once("./bar/header.php") ?>
      <!-- sidebar-horizon.php -->


      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="datatables">



            <!-- start Default Ordering -->
            <div class="card">

              <div class="card-body">
                <h3>Invoice Admin Check</h3>
                <div class="table-responsive">
                  <table id="adminBillTable" class="table table-striped table-bordered display text-nowrap">
                    <thead>
                      <!-- start row -->
                      <tr>
                        <th>Id</th>
                        <th>Nick Name</th>
                        <th>Position</th>
                        <th>Organize </th>
                        <th>Description</th>
                        <th>Img</th>
                        <th>Status</th>
                        <th>payment</th>
                        <th>Create at</th>
                        <th>Update at</th>

                      </tr>
                      <!-- end row -->
                    </thead>
                    <tbody>
                     

                    </tbody>
                    <tfoot>
                      <!-- start row -->
                      <tr>
                        <th>Id</th>
                        <th>Nick Name</th>
                        <th>Position</th>
                        <th>Organize </th>
                        <th>Description</th>
                        <th>Img</th>
                        <th>Status</th>
                        <th>payment</th>
                        <th>Create at</th>
                        <th>Date update</th>

                      </tr>
                      <!-- end row -->
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <!-- end Default Ordering -->
          </div>
        </div>
      </div>
    </div>

    <?php require_once("./bar/setting.php") ?>


    <div class="dark-transparent sidebartoggler"></div>
    <script src="../assets/js/vendor.min.js"></script>
    <!-- Import Js Files -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../assets/js/theme/app.init.js"></script>
    <script src="../assets/js/theme/theme.js"></script>
    <script src="../assets/js/theme/app.min.js"></script>
    <script src="../assets/js/theme/sidebarmenu.js"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.15.349/pdf.min.js"></script>
    <script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/datatable/datatable-basic.init.js"></script>

</body>

<script>
  $(document).ready(function() {
    const table = $('#adminBillTable').DataTable({
      scrollX: true,
      responsive: false,
      autoWidth: false,
      "order": [
        [0, 'desc']
      ],
      deferRender: true,
      pageLength: 10,
    });

    $.get('http://192.168.1.211/API/listBillAdmin', function(data) {

      table.clear();


      for (let i = 0; i < data.length; i++) {

        const payment = data[i].payment === '1' ?
          'Application/ATM' :
          data[i].payment === '2' ?
          'เงินสด' :
          data[i].payment === '3' ?
          'เช็คเงินสด' :
          data[i].payment === '4' ?
          'แคชเชียร์เช็ค' :
          '<img src="../img/no-results.png" alt="no-results" width="40">';

        const status = data[i].status === '1' ?
          '<img src="../img/waiting.png" alt="Pending" width="40">' :
          data[i].status === '2' ?
          '<img src="../img/true.png" alt="Approve" width="40">' :
          data[i].status === '3' ?
          '<img src="../img/false.png" alt="Disapprove" width="40">' :
          '<img src="../img/no-results.png" alt="no-results" width="40">';

        // // const newData =   '<img src="./img/new.png" alt="Top 5" width="30">' ;



        const newData = data[i].create_at && isRecent(data[i].create_at) ?
          '<img src="../img/new.png" alt="new" width="30">' :
          '';


        function isRecent(updateAt) {
          const now = new Date();
          const updateTime = new Date(updateAt);
          const diffInMinutes = (now - updateTime) / (1000 * 60);
          return diffInMinutes <= 60;
        }

        table.row.add([
          data[i].bill_id,
          data[i].nickname,
          data[i].position,
          data[i].organize,
          data[i].description,
          '<a href="../file-bill/' + data[i].file + '" target="_blank" class=""><i class="fa fa-file" style="font-size: 50px;"></i></a>',
          status,
          payment,
          data[i].bill_create_at,
          data[i].bill_update_at,
         
        ]);
      };


      table.draw();
      //};
      ///
    });


  });
</script>

</html>