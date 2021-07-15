<?php 
session_start();
if (!isset($_SESSION['elearn_tutor'])) {
    header('location: ../');
    exit();
}
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
                            <h4 class="mb-1 mt-0">Add New Course</h4>
                        </div>
                    </div>

                    <!-- row -->

                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-1 mt-0 header-title">Enter Course Details</h4>


                                    <div class="text-muted mt-3">
                                        <form id="courseForm">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Course Title</label>
                                                <input type="text" name="course_title" required class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Course Image</label>
                                                <input type="file" accept="image/*" name="course_image" required class="form-control">
                                            </div>


                                            <div class="form-group">
                                                <label class="font-weight-bold">Course Duration</label>
                                                <input type="text" name="course_duration" required class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">Course Description</label>
                                                <textarea style="resize: none;" rows="5" name="course_description" required class="form-control"></textarea>
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
    $('#courseForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url:'ajax/add_course.php',
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
                    $('input').val('');
                }
            }
        })
    });
</script>