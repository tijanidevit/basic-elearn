<?php 
session_start();
if (!isset($_SESSION['elearn_student'])) {
    header('location: dashboard');
    exit();
}
$student_id = $_SESSION['elearn_student']['id'];
include_once '../core/tutors.class.php';
include_once '../core/core.function.php';
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
                                                <div class="card bg-light">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <img src="../uploads/tutors/<?php echo $tutor['image'] ?>"
                                                            class="avatar-lg rounded-circle mr-2" alt="shreyu">
                                                            <div class="media-body">
                                                                <h5 class="mt-2 mb-0"><a href="tutor?id=<?php echo $tutor['id'] ?>"><?php echo $tutor['fullname'] ?></a></h5>
                                                                <h6 class="text-muted font-weight-normal mt-1 mb-4"><?php echo $tutor['email'] ?></h6>
                                                            </div>
                                                        </div>

                                                        <div class="mt-2 mb-3 row justify-content-between">
                                                            <div class="col-sm-7">
                                                                <span class="font-size-10"><i class='uil uil-calendar-alt'></i> <?php echo format_date($tutor['created_at']) ?></span>
                                                            </div>
                                                            <div class="col-sm mt-2 mt-sm-0">
                                                                <span class="font-size-15"><i class='uil uil-book-alt'></i><?php echo $tutor_obj->tutor_courses_num($tutor['id']) ?></span>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="mt-1 pt-2 border-top text-left">
                                                            <p class="text-muted mb-2">Hi I'm Shreyu. I am foodie and love to eat different
                                                            cuisine!</p>
                                                        </div> -->
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