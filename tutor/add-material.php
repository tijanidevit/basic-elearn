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
$course_obj = new courses();


$course = $course_obj->fetch_course($id);
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

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row page-title align-items-center">
                        <div class="col-sm-4 col-xl-6">
                            <h4 class="mb-1 mt-0">Add New Course Material</h4>
                        </div>
                    </div>

                    <!-- row -->    

                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-1 mt-0 header-title">Enter Course Material Details</h4>

                                    <div id="result"></div>

                                    <div class="text-muted mt-3">
                                        <form id="materialForm"  enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Course Title</label>
                                                <input type="text" readonly value="<?php echo $course['course_title'] ?>" required class="form-control">
                                                <input type="hidden" name="course_id" value="<?php echo $id ?>" required class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Material Title</label>
                                                <input type="text" name="title" required class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Material</label>
                                                <input type="file" accept="video/*" name="material" required class="form-control">
                                            </div>


                                            <div class="form-group">
                                                <label class="font-weight-bold">Course Duration</label>
                                                <input type="text" name="course_duration" required class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Transcript</label>
                                                <textarea style="resize: none;" rows="5" name="transcript" required class="form-control"></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <button class="btn btn-info">
                                                    <i class="icon-rocket"></i>
                                                    <span class="spinner" style="display: none;">
                                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                    </span>
                                                    <span class="btnText">
                                                        Submit
                                                    </span>
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>

                    </div>

                    <!-- Footer Start -->
                    <?php include_once 'components/footer.php'; ?>
                    <!-- end Footer -->

                </div>
            </div>


        </div>
        <!-- END wrapper -->

        <!-- Right bar overlay-->
        <?php include_once 'components/scripts.php'; ?>
    </div>

</body>
</html>


<script>
    $('#materialForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url:'ajax/add_material.php',
            type: 'POST',
            data : new FormData(this),
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function() {
                $('.spinner').show();
                $('.btnText').hide();
            },
            success: function(data){

                $('.spinner').hide();
                $('.btnText').show();
                
                $('#result').html(data);
                $('#result').fadeIn();

                if (data.includes('successfully')) {
                    location.href = 'course?id='<?php echo $id ?>;
                }
            }
        })
    });
</script>