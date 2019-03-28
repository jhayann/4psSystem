<?php
@ob_start();
session_start();
    
    if(isset($_GET['logout']) && $_GET['logout'] == "true")
    {
        unset($_SESSION['username']);
        session_destroy();
    }
    
    if(!isset($_SESSION['username']))
    {
        header('location:index.php');
    }

?>
<!DOCTYPE html>
<html lang="en">

<?php
      include 'inc/header.inc.php';
 
    include 'inc/footer.inc.php';
    ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include 'inc/sidebar.inc.php';
      ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include 'inc/navbar.inc.php';
                  ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php 
                    
                    if(isset($_GET['page']))
                    {
                       $page = urldecode($_GET['page']);
                        $dir = 'pages/'.$page.'.php';
                        if(is_readable($dir)){
                                try{
                                  require_once ("./$dir");
                                }catch(Exception $e){
                                      //
                                }
                            } else {
                                include('pages/404.php');
                            }
                    } else {
                        include_once('pages/default.php');
                    }
                    
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 4ps Members - BSIT3C 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="?logout=true">Logout</a>
                </div>
            </div>
        </div>
    </div>
<script>
    
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
   $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });
    
    
    
</script>
</body>

</html>