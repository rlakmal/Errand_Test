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
        <h2>Registered Workers</h2>
        <form>
            <div class="form">
                <input class="form-group" type="text" placeholder="Search...">
                <i class='bx bx-search icon'></i>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th class="ordId">Employer Name</th>
                    <th class="stth">Employer ID</th>
                    <th class="cost">Contact</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>12345</td>
                    <td>johndoe@example.com</td>
                    <td class="edit-view-profile"><a href="#">
                            <i class="bx bxs-user-detail"></i>
                            <span class="link_name"></span>
                        </a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>67890</td>
                    <td>janesmith@example.com</td>
                    <td class="edit-view-profile"><a href="#">
                            <i class="bx bxs-user-detail"></i>
                            <span class="link_name"></span>
                        </a></td>
                </tr>
                <!-- Add more rows with dummy data as needed -->
            </tbody>
        </table>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="<?= ROOT ?>/assets/js/customer/customer-orders.js"></script>
</body>

</html>