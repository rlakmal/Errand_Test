<style>
    .logo-admin {
        width: 20%;
        font-size: 30px;
        margin-left: 5%;
    }

    .logo-admin img {
        display: flex;
        position: relative;
        height: 60px;
        cursor: pointer;
    }

    .nav-link2 {
        margin-right: 35px;
        font-size: 20px;
        color: #191919;
        position: relative;
    }

    nav .nav-link2 .icon {
        font-size: 25px;
        color: #ffffff;
        margin-right: 0px;
        align-self: center;
    }

    .home-section {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 15px;
        background: #f16a2d;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        transition: all 0.5s ease;
    }

    /*.home-section .nav-icons {*/
    /*    margin-left: auto;*/
    /*}*/

    .sidebar.expanded ~ .home-section {
        left: 260px;
        width: calc(100% - 260px);
    }
</style>

<section class="home-section">
    <nav>
        <div class="logo-admin">
            <a href="<?= ROOT ?>/admin/home">
                <img src="<?= ROOT ?>/assets/images/logoe3.png">
            </a>
        </div>
        <div class="nav-icons">
            <a href="#" class="nav-link2">
                <i class='bx bxs-chat icon'></i>
                <!-- <span class="chat-notification">8</span> -->
            </a>
        </div>
    </nav>
</section>
