<!-- Navigation Bar -->

<style>
    .logo-admin{
        width: 20%;
        font-size: 30px;
        /*margin-left: 80px;*/
    }

    .logo-admin img{
        display: flex;
        position: relative;
        height: 60px;
        cursor: pointer;
    }

    .nav-link2{
        /*margin-right: 35px;*/
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
    nav {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        /*padding: 15px;*/
        background: #f16a2d;
        /*position: fixed;*/
        top: 0;
        left: 0;
        width: 100%;
        transition: all 0.5s ease;
    }
    /*.home-section .nav-icons {*/
    /*    margin-left: auto;*/
    /*}*/

    .sidebar.open ~ nav {
        margin-left: -80px;
        width: calc(100% - 172px);
    }
</style>

<section class="home-section" id="navbar" >
    <nav style="background:#f16a2d;  display: flex; height: fit-content;padding: 15px; margin-left:0px; " >
        <div class ="logo-admin"><a href="<?= ROOT ?>/admin/home"><img src="<?=ROOT?>/assets/images/logoe3.png"></a></div>
        <div   class="nav-icons" style="right: -75%; display: flex; position: relative; justify-content: center ;align-content: center; align-items: center">

            <a href="<?= ROOT ?>/admin/admincrew" class="nav-link2">
                <i class='bx bxs-chat icon'></i>
                <!--                    <span class="chat-notification">8</span>-->
            </a>
<!--            <a href="--><?php //=ROOT?><!--/member/account" class="nav-link2" >-->
<!--                <i class='bx bxs-user icon'></i>-->
                <!--                    <span class="bell-notification">5</span>-->
<!--            </a>-->

            <!-- <a href="#" class="nav-link-profile">
      <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
    </a> -->
        </div>
    </nav>
</section>




<!--<!-- Navigation Bar -->-->
<!--    <section class="home-section" id="navbar">-->
<!--        <nav style="background: #0c5fcd" >-->
<!--            <div class="nav-icons">-->
<!--                <a href="#" class="nav-link">-->
<!--                    <i class='bx bxs-bell-ring icon'></i>-->
<!--                    <span class="bell-notification">5</span>-->
<!--                </a>-->
<!--                <a href="--><?php //=ROOT?><!--/admin/message" class="nav-link">-->
<!--                    <i class='bx bxs-chat icon'></i>-->
<!--                    <span class="chat-notification">8</span>-->
<!--                </a>-->
<!---->
<!--                <!-- <a href="#" class="nav-link-profile">-->
<!--          <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">-->
<!--        </a> -->-->
<!--            </div>-->
<!--        </nav>-->
<!--    </section>-->
