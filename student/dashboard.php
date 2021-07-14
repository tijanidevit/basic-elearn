<?php 
    session_start();
    if (!isset($_SESSION['elearn_student'])) {
        header('location: dashboard');
        exit();
    }
    $student_id = $_SESSION['elearn_student']['id'];
    include_once '../core/students.class.php';
    include_once '../core/courses.class.php';
    $student_obj = new students();
    $course_obj = new courses();

    $students_num = $student_obj->students_num();
    $courses_num = $course_obj->courses_num();

    $all_courses = $course_obj->fetch_courses();

    $student_courses = $student_obj->fetch_student_courses($student_id);
    $student_courses_num = $student_obj->student_courses_num($student_id);
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
                                <h4 class="mb-1 mt-0">Dashboard</h4>
                            </div>
                        </div>

                        <!-- content -->
                        <div class="row">
                            <div class="col-md-4 col-xl-4">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                                                 All students</span>
                                                <h2 class="mb-0"><?php echo $students_num ?></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <div id="today-revenue-chart" class="apex-charts"></div>
                                                <span class="text-success font-weight-bold font-size-13"><i
                                                        class='uil uil-arrow-up'></i> 10.21%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xl-4">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">All courses</span>
                                                <h2 class="mb-0"><?php echo $courses_num ?></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <div id="today-product-sold-chart" class="apex-charts"></div>
                                                <span class="text-danger font-weight-bold font-size-13"><i
                                                        class='uil uil-arrow-down'></i> 5.05%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-xl-4">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">My Courses</span>
                                                <h2 class="mb-0"><?php echo $student_courses_num ?></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <div id="today-new-customer-chart" class="apex-charts"></div>
                                                <span class="text-success font-weight-bold font-size-13"><i
                                                        class='uil uil-arrow-up'></i> 25.16%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- stats + charts -->
                        
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
                                                    <div class="card bg-light mb-4 mb-xl-0">
                                                        <img class="card-img-top img-fluid" src="../uploads/course/image/<?php echo $course['course_image'] ?>" alt="Card image cap">
                                                        <div class="card-body">
                                                            <h5 class="card-title font-size-16"><?php echo $course['course_title'] ?></h5>
                                                            <p class="card-text text-muted"><?php echo substr($course['course_image'],0,120) ?>...</p>
                                                            <a href="course?id=<?php echo $course['id'] ?>" class="text-primary">Go to course</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-1 mt-0 header-title">All Courses</h4>
                                        <p class="mb-3 mt-0">List of all courses added by tutors</p>
                                        <div class="row p-3">

                                            <?php foreach ($all_courses as $course): ?>
                                                <div class="col-lg-6 col-xl-3 mb-3">
                                                <!-- Simple card -->
                                                    <div class="card bg-light mb-4 mb-xl-0">
                                                        <img class="card-img-top img-fluid" src="../uploads/course/image/<?php echo $course['course_image'] ?>" alt="Card image cap">
                                                        <div class="card-body">
                                                            <h5 class="card-title font-size-16"><?php echo $course['course_title'] ?></h5>
                                                            <p class="card-text text-muted"><?php echo substr($course['course_image'],0,120) ?>...</p>
                                                            <a href="course?id=<?php echo $course['id'] ?>" class="btn btn-primary">Enroll course</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
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