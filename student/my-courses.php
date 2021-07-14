<?php 
session_start();
if (!isset($_SESSION['elearn_student'])) {
    header('location: ../');
    exit();
}
$student_id = $_SESSION['elearn_student']['id'];
include_once '../core/students.class.php';
include_once '../core/core.function.php';
$student_obj = new students();

$student_courses = $student_obj->fetch_student_courses($student_id);
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
                            <h4 class="mb-1 mt-0">My Courses</h4>
                        </div>
                    </div>

                    <!-- row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-1 mt-0 header-title">My Courses</h4>
                                    <p class="mb-3 mt-0">List of courses you have enrolled in</p>
                                    <div class="row p-3">

                                        <?php foreach ($student_courses as $course): ?>
                                            <div class="col-lg-6 col-xl-3 mb-3">
                                                <!-- Simple card -->
                                                <div class="col-lg-6 col-xl-3 mb-3">
                                                    <!-- Simple card -->
                                                    <div class="card bg-light mb-4 mb-xl-0">
                                                        <img class="card-img-top img-fluid" src="../uploads/course/image/<?php echo $course['course_image'] ?>" alt="Card image cap">
                                                        <div class="card-body">
                                                            <h5 class="card-title font-size-16"><?php echo $course['course_title'] ?></h5>
                                                            <p class="card-text text-muted"><?php echo substr($course['course_description'],0,120) ?>...</p>
                                                            <div class="media-body">
                                                                <div class="text-muted font-weight-normal mt-1 mb-4">
                                                                    <div><i class='uil uil-user'></i> <?php echo $course['fullname'] ?></div>
                                                                    <i class='uil uil-calendar-alt'></i> <?php echo format_date($course['created_at']) ?>
                                                                </div>
                                                            </div>
                                                            <a href="course-class?id=<?php echo $course['id'] ?>" class="text-primary mr-3">Go to course</a>
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