<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <!-- <img src="assets/images/users/avatar-7.jpg" class="avatar-sm rounded-circle mr-2" alt="Educa" />
        <img src="assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2" alt="Educa" /> -->

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">Educa</h6>
            <span class="pro-user-desc"><?php echo $_SESSION['elearn_tutor']['fullname'] ?></span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
            aria-expanded="false">
            <span data-feather="chevron-down"></span>
        </a>
        <div class="dropdown-menu profile-dropdown">
            <a href="logout" class="dropdown-item notify-item">
                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</div>
<div class="sidebar-content">
    <!--- Sidemenu -->
    <div id="sidebar-menu" class="slimscroll-menu">
        <ul class="metismenu" id="menu-bar">
            <li class="menu-title">Navigation</li>

            <li>
                <a href="./">
                    <i data-feather="home"></i>
                    <span class="badge badge-success float-right">&nbsp;</span>
                    <span> Dashboard </span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i data-feather="settings"></i>
                    <span> Courses </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="my-courses">Enrolled Courses</a>
                    </li>
                    <li>
                        <a href="courses">All Courses</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i data-feather="sunrise"></i>
                    <span> Tutors </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="tutors">View Tutors</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="logout">
                    <i data-feather="log-out"></i>
                    <span> Logout </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
</div>
<!-- Sidebar -left -->
</div>