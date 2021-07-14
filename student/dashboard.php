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
                        <div class="row">

                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="#" class="btn btn-primary btn-sm float-right">
                                            <i class='uil uil-export ml-1'></i> Enrolled Courses
                                        </a>
                                        <h5 class="card-title mt-0 mb-0">List of courses you have enrolled in</h5>

                                        <div class="table-responsive mt-4">
                                            <table class="table table-hover table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">course</th>
                                                        <th scope="col">student</th>
                                                        <th scope="col">students' Phone</th>
                                                        <th scope="col">Price Per Minute</th>
                                                        <th scope="col">Code</th>
                                                        <th scope="col">Booking Date</th>
                                                        <th scope="col">Start Time</th>
                                                        <th scope="col">Return Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sn = 1; foreach ($student_courses as $booking): ?>
                                                        <tr>
                                                            <td>#<?php echo $sn ?></td>
                                                            <td><?php echo $booking['name'] ?></td>
                                                            <td><?php echo $booking['fullname'] ?></td>
                                                            <td><?php echo $booking['phone'] ?></td>
                                                            <td><?php echo $booking['price_per_minute'] ?></td>
                                                            <td><?php echo $booking['code'] ?> </td>
                                                            <td><?php echo format_date($booking['created_at']) ?></td>
                                                            <td><?php echo format_date($booking['start_time']) ?></td>
                                                            <td><?php echo format_date($booking['start_time']) ?></td>
                                                        </tr>
                                                    <?php $sn++; endforeach ?>
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div>
                        </div>
                        <!-- row -->

                    </div>
                </div> <!-- content -->

                

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