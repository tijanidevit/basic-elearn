<?php 
session_start();
if (!isset($_SESSION['elearn_tutor'])) {
    header('location: ../');
    exit();
}
if (!isset($_GET['id'])) {
    header('location: courses');
    exit();
}
$id = $_GET['id'];

$tutor_id = $_SESSION['elearn_tutor']['id'];
include_once '../core/courses.class.php';
include_once '../core/tutors.class.php';
include_once '../core/core.function.php';
$tutor_obj = new tutors();
$course_obj = new courses();

$course = $course_obj->fetch_course($id);
$course_materials = $course_obj->fetch_course_materials($id);

$colors = ['primary','success','danger','info','warning'];
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
                            <h4 class="mb-1 mt-0"><?php echo $course['course_title'] ?></h4>
                            <?php display_flash('error') ?>
                        </div>
                    </div>

                    <!-- row -->

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-1 mt-0 header-title"><?php echo $course['course_title'] ?></h4>
                                    <p class="mb-3 mt-0">Keep Learning <?php echo $course['course_title'] ?></p>


                                    <div class="text-muted mt-3">
                                        <p><?php echo $course['course_description'] ?></p>

                                        <div class="tags">
                                            <h6 class="font-weight-bold">Details</h6>
                                        </div>

                                        <div class="row">

                                            <div class="col-lg-3 col-md-6">
                                                <div>
                                                    <p class="mb-2"><i class="uil-user text-danger"></i> Tutor </p>
                                                    <h5 class="font-size-15"><a href="profile"><?php echo $course['fullname'] ?></a></h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6">
                                                <div>
                                                    <p class="mb-2"><i class="uil-users-alt text-danger"></i> Enrolled students </p>
                                                    <h5 class="font-size-15 text-center"><?php echo $course_obj->student_courses_num($course['id']) ?></h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6">
                                                <div >
                                                    <p class="mb-2"><i class="uil-calender text-danger"></i> Added Date</p>
                                                    <h5 class="font-size-15"><?php echo format_date($course['created_at']) ?></h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div>
                                                    <p class="mb-2"><i class="uil-stopwatch text-danger"></i> Duration</p>
                                                    <h5 class="font-size-15"><?php echo $course['course_duration'] ?></h5>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="mt-0 header-title">Course Classes</h6>

                                    <ul class="list-unstyled activity-widget">
                                        <?php foreach ($course_materials as $index => $material): ?>
                                            <li class="activity-list">
                                                <div class="media">
                                                    <div class="text-center mr-3">
                                                        <div class="avatar-sm">
                                                            <span class="avatar-title rounded-circle bg-soft-<?php echo $colors[rand(0,count($colors) -1)] ?> text-primary"><?php echo $index+1 ?></span>
                                                        </div>
                                                        <!-- <p class="text-muted font-size-13 mb-0"><?php echo $material['duration'] ?></p> -->
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                            class="text-dark"><?php echo $material['title'] ?></a>
                                                        </h5>
                                                        <p class="text-muted font-size-13 text-truncate mb-0"><?php echo $material['duration'] ?></p>
                                                    </div>
                                                </div>

                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                    <div class="row">
                                        <div class="col-6">
                                            <a class="btn btn-block btn-primary" href="course-class?id=<?php echo $id ?>">Add Course Materials</a>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-block btn-primary" href="course-class?id=<?php echo $id ?>">Course Materials</a>
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
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right bar overlay-->
        <?php include_once 'components/scripts.php'; ?>
    </div>

</body>
</html>