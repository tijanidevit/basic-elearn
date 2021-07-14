<?php 
session_start();
if (!isset($_SESSION['elearn_student'])) {
    header('location: ../');
    exit();
}
if (!isset($_GET['id'])) {
    header('location: courses');
    exit();
}
$id = $_GET['id'];

$student_id = $_SESSION['elearn_student']['id'];
include_once '../core/courses.class.php';
include_once '../core/core.function.php';
$course_obj = new courses();

$course = $course_obj->fetch_course($id);
$course_materials = $course_obj->fetch_course_materials($id);
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
                        </div>
                    </div>

                    <!-- row -->

                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-1 mt-0 header-title"><?php echo $course['course_title'] ?></h4>
                                    <p class="mb-3 mt-0">Keep Learning <?php echo $course['course_title'] ?></p>

                                    <?php display_flash('success'); display_flash('error') ?>

                                    <div class="text-muted mt-3">
                                        <p>To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth.</p>
                                        <p>Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages.</p>
                                        <ul class="pl-4 mb-4">
                                            <li>Quis autem vel eum iure</li>
                                            <li>Ut enim ad minima veniam</li>
                                            <li>Et harum quidem rerum</li>
                                            <li>Nam libero cum soluta</li>
                                        </ul>

                                        <div class="tags">
                                            <h6 class="font-weight-bold">Tags</h6>
                                            <div class="text-uppercase">
                                                <a href="#" class="badge badge-soft-primary mr-2">Html</a>
                                                <a href="#" class="badge badge-soft-primary mr-2">Css</a>
                                                <a href="#" class="badge badge-soft-primary mr-2">Bootstrap</a>
                                                <a href="#" class="badge badge-soft-primary mr-2">JQuery</a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-6">
                                                <div  class="mt-4">
                                                    <p class="mb-2"><i class="uil-calender text-danger"></i> Start Date</p>
                                                    <h5 class="font-size-16">15 July, 2019</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="mt-4">
                                                    <p class="mb-2"><i class="uil-calendar-slash text-danger"></i> Due Date</p>
                                                    <h5 class="font-size-16">15 July, 2019</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="mt-4">
                                                    <p class="mb-2"><i class="uil-dollar-alt text-danger"></i> Budget</p>
                                                    <h5 class="font-size-16">$1325</h5>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-6">
                                                <div class="mt-4">
                                                    <p class="mb-2"><i class="uil-user text-danger"></i> Owner</p>
                                                    <h5 class="font-size-16">Rick Perry</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="assign team mt-4">
                                            <h6 class="font-weight-bold">Assign To</h6>
                                            <a href="javascript: void(0);">
                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                            </a> 
                                            <a href="javascript: void(0);">
                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                            </a>
                                            <a href="javascript: void(0);">
                                                <img src="assets/images/users/avatar-9.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                            </a> 
                                            <a href="javascript: void(0);">
                                                <img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                                            </a>
                                        </div>

                                        <div class="mt-4">
                                            <h6 class="font-weight-bold">Attached Files</h6>

                                            <div class="row">
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="p-2 border rounded mb-2">
                                                        <div class="media">
                                                            <div class="avatar-sm font-weight-bold mr-3">
                                                                <span class="avatar-title rounded bg-soft-primary text-primary">
                                                                    <i class="uil-file-plus-alt font-size-18"></i>
                                                                </span>
                                                            </div>
                                                            <div class="media-body">
                                                                <a href="#" class="d-inline-block mt-2">Landing 1.psd</a>
                                                            </div>
                                                            <div class="float-right mt-1">
                                                                <a href="#" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6">
                                                    <div class="p-2 border rounded mb-2">
                                                        <div class="media">
                                                            <div class="avatar-sm font-weight-bold mr-3">
                                                                <span class="avatar-title rounded bg-soft-primary text-primary">
                                                                    <i class="uil-file-plus-alt font-size-18"></i>
                                                                </span>
                                                            </div>
                                                            <div class="media-body">
                                                                <a href="#" class="d-inline-block mt-2">Landing 2.psd</a>
                                                            </div>
                                                            <div class="float-right mt-1">
                                                                <a href="#" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                    <h6 class="mt-0 header-title">Project Activities</h6>

                                    <ul class="list-unstyled activity-widget">
                                        <li class="activity-list">
                                            <div class="media">
                                                <div class="text-center mr-3">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary">09</span>
                                                    </div>
                                                    <p class="text-muted font-size-13 mb-0">Jan</p>
                                                </div>
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                        class="text-dark">Bryan</a></h5>
                                                        <p class="text-muted font-size-13 text-truncate mb-0">Neque
                                                        porro quisquam est</p>
                                                    </div>
                                                </div>

                                            </li>
                                            <li class="activity-list">
                                                <div class="media">
                                                    <div class="text-center mr-3">
                                                        <div class="avatar-sm">
                                                            <span
                                                            class="avatar-title rounded-circle bg-soft-success text-success">
                                                            08
                                                        </span>
                                                    </div>
                                                    <p class="text-muted font-size-13 mb-0">Jan</p>
                                                </div>
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                        class="text-dark">Everett</a></h5>
                                                        <p class="text-muted font-size-13 text-truncate mb-0">Ut enim ad
                                                        minima veniam quis velit</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="activity-list">
                                                <div class="media">
                                                    <div class="text-center mr-3">
                                                        <div class="avatar-sm">
                                                            <span
                                                            class="avatar-title rounded-circle bg-soft-warning text-warning">
                                                            08
                                                        </span>
                                                    </div>
                                                    <p class="text-muted font-size-13 mb-0">Jan</p>
                                                </div>
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                        class="text-dark">Richard</a></h5>
                                                        <p class="text-muted font-size-13 text-truncate mb-0">Quis autem
                                                        vel eum iure</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="activity-list">
                                                <div class="media">
                                                    <div class="text-center mr-3">
                                                        <div class="avatar-sm">
                                                            <span
                                                            class="avatar-title rounded-circle bg-soft-info text-info">
                                                            08
                                                        </span>
                                                    </div>
                                                    <p class="text-muted font-size-13 mb-0">Jan</p>
                                                </div>
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                        class="text-dark">Jery</a></h5>
                                                        <p class="text-muted font-size-13 text-truncate mb-0">Quis autem
                                                        vel eum iure</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="activity-list">
                                                <div class="media">
                                                    <div class="text-center mr-3">
                                                        <div class="avatar-sm">
                                                            <span
                                                            class="avatar-title rounded-circle bg-soft-primary text-primary">07</span>
                                                        </div>
                                                        <p class="text-muted font-size-13 mb-0">Jan</p>
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                            class="text-dark">Bryan</a></h5>
                                                            <p class="text-muted font-size-13 text-truncate mb-0">Neque
                                                            porro quisquam est</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="media">
                                                        <div class="text-center mr-3">
                                                            <div class="avatar-sm">
                                                                <span
                                                                class="avatar-title rounded-circle bg-soft-success text-success">
                                                                06
                                                            </span>
                                                        </div>
                                                        <p class="text-muted font-size-13 mb-0">Jan</p>
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                            class="text-dark">Everett</a></h5>
                                                            <p class="text-muted font-size-13 text-truncate mb-0">Ut enim ad
                                                            minima veniam quis velit</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="activity-list">
                                                    <div class="media">
                                                        <div class="text-center mr-3">
                                                            <div class="avatar-sm">
                                                                <span
                                                                class="avatar-title rounded-circle bg-soft-warning text-warning">
                                                                05
                                                            </span>
                                                        </div>
                                                        <p class="text-muted font-size-13 mb-0">Jan</p>
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#"
                                                            class="text-dark">Richard</a></h5>
                                                            <p class="text-muted font-size-13 text-truncate mb-0">Quis autem
                                                            vel eum iure</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="text-center">
                                                <a href="javascript:void(0);" class="btn btn-sm border btn-white">
                                                    <i data-feather="loader" class="icon-dual icon-xs mr-2"></i>
                                                    Load more
                                                </a>
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