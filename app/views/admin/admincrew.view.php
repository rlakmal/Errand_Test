<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sidebar</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <!-- Sidebar -->
    <?php include 'sidebar.php' ?>
    <!-- Navigation bar -->
    <?php include 'navigationbar.php' ?>
    <!-- Scripts -->
    <script src="<?= ROOT ?>/assets/js/script-bar.js"></script>

    <!-- content  -->
    <section id="main" class="main">

        <h2>Crew Members details</h2>

        <form>
            <div class="form">
                <input class="form-group" type="text" placeholder="Search...">
                <i class='bx bx-search icon'></i>
                <input class="btn" type="button" onclick="openReport()" value="New Registration">
                <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
            </div>

        </form>

        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th class="ordId">Member ID</th>
                    <th class="stth">Name</th>
                    <th class="desc">Username</th>
                    <th></th>
                    <th>Active</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($data)) {
                    $i = 1;
                    foreach ($data as $item) {

                ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $item->id; ?></td>
                            <td><?php echo $item->name; ?></td>
                            <td><?php echo $item->email; ?></td>


                            <td class="edit-icon"><a type="hidden" data-order=<?= json_encode($item); ?> onclick="openView(this)">
                                    <i class="bx bxs-edit-alt"></i>
                                    <span class="link_name"></span>
                                </a></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                    <button name="active" value="valid" class="
                                <?php if ($item->active) {
                                    echo "is_active";
                                } else {
                                    echo "is_deactive";
                                } ?> ">
                                        <?php if ($item->active) {
                                            echo "Delete";
                                        } else {
                                            echo "Delete";
                                        } ?>
                                    </button>
                                </form>

                            </td>

                        </tr>

                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </section>


    <!-- add members -->
    <div class="popup-report">
        <h2>New Crew Member Registration</h2>
        <h4> name : </h4>
        <form method="POST">

            <input name="name" type="text" placeholder="Enter Member name">
            <h4>Email : </h4>
            <input name="email" type="text" placeholder="Enter Member email">
            <h4>Password : </h4>
            <input name="password" type="text" placeholder="Enter Member password">
            <div class="btns">
                <button type="button" class="cancelR-btn" onclick="closeReport()">Cancel</button>
                <button type="submit" name="memberRegister" value="Submit" class="close-btn" onclick="closeReport()">Submit</button>
            </div>
        </form>
    </div>

    <!-- update members -->
    <div class="popup-view">
        <h2>Update Crew Member</h2>
        <form method="POST">

            <h4> name : </h4>
            <input name="name" type="text" placeholder="Enter Member name">
            <h4>Email : </h4>
            <input name="email" type="text" placeholder="Enter Member email">
            <h4>Password : </h4>
            <input name="password" type="text" placeholder="Enter Member email">
            <input type="hidden" name="id">
            <div class="btns">
                <button type="button" class="cancelR-btn" onclick="closeView()">Cancel</button>
                <button type="submit" name="member" value="Update" class="close-btn" onclick="closeView()">Update</button>
            </div>

        </form>
    </div>



    <div id="overlay" class="overlay"></div>




    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <!-- <script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script> -->
    <script src="<?= ROOT ?>/assets/js/admin/crewMembers.js"></script>

</body>

</html>