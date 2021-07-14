<?php 
    session_start();
    if (!isset($_SESSION['elearn_student'])) {
        header('location: dashboard');
        exit();
    }
    $student_id = $_SESSION['elearn_student']['id'];
    include_once '../core/tutors.class.php';
    $tutor_obj = new tutors();

    $tutors = $tutor_obj->fetch_tutors();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'components/head.php'; ?>
    </head>

    <body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include_once 'components/header.php'; ?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include_once 'components/sidebar.php'; ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-sm-4 col-xl-6">
                                <h4 class="mb-1 mt-0">Tutors</h4>
                            </div>
                        </div>
                        
                        <!-- row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-1 mt-0 header-title">Tutors</h4>
                                        <p class="mb-3 mt-0">List of all registered tutors</p>
                                        <div class="row p-3">

                                            <?php foreach ($tutors as $tutor): ?>
                                                <div class="col-lg-6 col-xl-3 mb-3">
                                                <!-- Simple card -->
                                                    <div class="card bg-light mb-4 mb-xl-0">
                                                        <img class="card-img-top img-fluid" src="../uploads/tutor/image/<?php echo $tutor['tutor_image'] ?>" alt="Card image cap">
                                                        <div class="card-body">
                                                            <h5 class="card-title font-size-16"><?php echo $tutor['tutor_title'] ?></h5>
                                                            <p class="card-text text-muted"><?php echo substr($tutor['tutor_image'],0,120) ?>...</p>
                                                            <a href="tutor?id=<?php echo $tutor['id'] ?>" class="btn btn-primary">Enroll tutor</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                

                <!-- Footer Start -->
                <?php include_once 'components/footer.php'; ?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right bar overlay-->
        <?php include_once 'components/scripts.php'; ?>

    </body>
</html>