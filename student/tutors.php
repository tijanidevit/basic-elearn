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
                                                <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <img src="assets/images/users/avatar-7.jpg"
                                            class="avatar-lg rounded-circle mr-2" alt="shreyu">
                                        <div class="media-body">
                                            <h5 class="mt-2 mb-0">Shreyu N</h5>
                                            <h6 class="text-muted font-weight-normal mt-1 mb-4">New York, USA</h6>
                                        </div>
                                        <div class="dropdown float-right">
                                            <a href="#" class="dropdown-toggle arrow-none text-muted"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="uil uil-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item"><i
                                                        class="uil uil-edit-alt mr-2"></i>Edit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item"><i
                                                        class="uil uil-refresh mr-2"></i>Refresh</a>
                                                <div class="dropdown-divider"></div>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item text-danger"><i
                                                        class="uil uil-trash mr-2"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-2 mb-3 row justify-content-between">
                                        <div class="col-sm-5">
                                            <span class="font-size-15"><i class='uil uil-calendar-alt mr-1'></i>40 Days
                                                Ago</span>
                                        </div>
                                        <div class="col-sm mt-2 mt-sm-0">
                                            <span class="font-size-15"><i
                                                    class='uil uil-users-alt mr-1'></i>12,001</span>
                                        </div>
                                        <div class="col-sm mt-2 mt-sm-0 text-sm-right">
                                            <span class="font-size-15"><i
                                                    class='uil uil-calendar-alt mr-1'></i>1200</span>
                                        </div>
                                    </div>

                                    <div class="mt-1 pt-2 border-top text-left">
                                        <p class="text-muted mb-2">Hi I'm Shreyu. I am foodie and love to eat different
                                            cuisine!</p>
                                    </div>

                                    <div class="row mt-4 mb-3">
                                        <div class="col">
                                            <img src="assets/images/small/img-4.jpg" alt=""
                                                class="img-fluid rounded shadow" />
                                        </div>
                                        <div class="col">
                                            <img src="assets/images/small/img-5.jpg" alt=""
                                                class="img-fluid rounded shadow" />
                                        </div>
                                        <div class="col">
                                            <img src="assets/images/small/img-6.jpg" alt=""
                                                class="img-fluid rounded shadow" />
                                        </div>
                                    </div>

                                    <div class="row mt-5 text-center">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary btn-block mr-1">Follow</button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-white btn-block">Message</button>
                                        </div>
                                    </div>
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