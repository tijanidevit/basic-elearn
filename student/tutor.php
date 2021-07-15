<?php 
session_start();
if (!isset($_SESSION['elearn_student'])) {
    header('location: dashboard');
    exit();
}
$student_id = $_SESSION['elearn_student']['id'];
include_once '../core/tutors.class.php';
include_once '../core/courses.class.php';
include_once '../core/core.function.php';
$course_obj = new courses();
$tutor_obj = new tutors();

$id = $_GET['id'];
$tutor = $tutor_obj->fetch_tutor($id);
$tutor_courses = $tutor_obj->fetch_tutor_courses($id);
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
                            <h4 class="mb-1 mt-0">Tutor - <?php echo $tutor['fullname'] ?></h4>
                        </div>
                    </div>

                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="text-center mt-3">
                                        <img src="../uploads/tutors/<?php echo $tutor['image'] ?>" alt="" class="avatar-xl rounded-circle">
                                        <h5 class="mt-2 mb-0"><?php echo $tutor['fullname'] ?></h5>
                                        <h6 class="text-muted font-weight-normal mt-2 mb-4">
                                            Experienced Tutor
                                        </h6>

                                        <p class="mb-2">
                                            <label class="badge badge-soft-success">UI &amp; UX</label>
                                            <label class="badge badge-soft-success">Frontend Development</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-1 mt-0 header-title"><?php echo $tutor['fullname'] ?>'s Courses</h4>
                                    <div class="row p-3">

                                        <?php foreach ($tutor_courses as $course): ?>
                                            <div class="col-md-6 col-xl-4">
                                                <div class="card bg-light">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <img src="../uploads/course/image/<?php echo $course['course_image'] ?>" class="avatar-lg rounded-circle mr-2" alt="shreyu" />
                                                            <div class="media-body">
                                                                <h5 class="mt-2 mb-0"><a href="course?id=<?php echo $course['id'] ?>"><?php echo $course['course_title'] ?></a></h5>
                                                                <h6 class="text-muted font-weight-normal mt-1 mb-4"><?php echo substr($course['course_description'], 0, 140) ?>...</h6>
                                                            </div>
                                                        </div>

                                                        <div class="mt-2 mb-3 row justify-content-between">
                                                            <div class="col-sm-7">
                                                                <span class="font-size-10"><i class='uil uil-calendar-alt'></i> <?php echo format_date($course['created_at']) ?></span>
                                                            </div>
                                                            <div class="col-sm mt-2 mt-sm-0">
                                                                <span class="font-size-15"><i class='uil uil-book-alt'></i><?php echo $course_obj->course_materials_num($course['id']) ?></span>
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