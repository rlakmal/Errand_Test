    <div class="sidebar">
        <div class="logo_details">
            <div class="logo_icon"></div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="<?= ROOT ?>/admin/home">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="link_name">DashBoard</span>
                </a>
                <span class="tooltip">DashBoard</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/jobs">
                    <i class="bx bxs-wrench"></i>
                    <span class="link_name">Jobs</span>
                </a>
                <span class="tooltip">Jobs</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/workers2">
                    <i class="bx bxs-hard-hat"></i>
                    <span class="link_name">Workers</span>
                </a>
                <span class="tooltip">Workers</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/employers">
                    <i class="bx bxs-user-detail"></i>
                    <span class="link_name">Employers</span>
                </a>
                <span class="tooltip">Employers</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/emprequests">
                    <i class="bx bx-dollar"></i>
                    <span class="link_name">Employer Requests</span>
                </a>
                <span class="tooltip">Employer Requests</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/workrequests">
                    <i class="bx bx-edit"></i>
                    <span class="link_name">Worker Requests</span>
                </a>
                <span class="tooltip">Worker Requests</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/accrequests">
                    <i class="bx bxs-hand-right "></i>
                    <span class="link_name">Accepted Requests</span>
                </a>
                <span class="tooltip">Accepted Requests</span>
            </li>
            <li>
                <a href="<?=ROOT?>/admin/bargains">
                    <i class='bx bx-money-withdraw'></i>
                    <span class="link_name">Bargains</span>
                </a>
                <span class="tooltip">bargains</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/admincrew">
                    <i class="bx bxs-group"></i>
                    <span class="link_name">Admin Crew</span>
                </a>
                <span class="tooltip">Admin Crew</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/adnotification2">
                    <i class="bx bxs-bell-plus"></i>
                    <span class="link_name">Notifications</span>
                </a>
                <span class="tooltip">Notifications</span>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/adreports">
                    <i class="bx bxs-report"></i>
                    <span class="link_name">Reports</span>
                </a>
                <span class="tooltip">Reports</span>
            </li>


            <li class="profile" style="margin-bottom: 3%">
<!--                <div class="profile_details">-->
<!--                    <img src="--><?php //= ROOT ?><!--/assets/images/manager/elon_musk.jpg" alt="profile image">-->
<!--                    <div class="profile_content">-->
<!--                        <div class="name">Admin 1</div>-->
<!--                    </div>-->
<!--                </div>-->
                <a href="<?= ROOT ?>/home/signout">
                    <i class="bx bx-log-out" id="log_out"></i>
                    <span class="link_name" style="margin-left: 10px">Logout</span>
                </a>
                <span class="tooltip">logOut</span>

            </li>
        </ul>
    </div>