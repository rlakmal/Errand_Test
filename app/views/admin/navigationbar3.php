<!-- Navigation Bar -->

<style>
    .logo-admin{
        width: 20%;
        font-size: 30px;
        margin-left: 5%;
    }

    .logo-admin img{
        display: flex;
        position: relative;
        height: 60px;
        cursor: pointer;
    }

    .nav-link2{
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

    .head-nav {
        left: 0;
        transition: all 0.5s ease;
    }

    .head-nav.open {
        left: 172px;
        width: calc(100% - 172px);
    }

</style>


    <nav class="head-nav" style="background: #f16a2d;  display: flex; height: fit-content;padding: 15px; position: fixed;  top: 0; z-index: 999; justify-content: space-between" >
        <div class ="logo-admin"><a href="<?= ROOT ?>/admin/home"><img src="<?=ROOT?>/assets/images/logoe3.png"></a></div>
        <div   class="nav-icons" >

            <a href="#" class="nav-link2">
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





<!-- Navigation Bar -->
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
<!--                <a href="#" class="nav-link-profile">-->
<!--          <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">-->
<!--        </a> -->
<!--            </div>-->
<!--        </nav>-->
<!--    </section>-->
