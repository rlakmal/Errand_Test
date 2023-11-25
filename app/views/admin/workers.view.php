<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sidebar</title>
    <!-- Link Styles -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style-bar.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                <!-- Category Selector -->
                <select class="form-group" name="category">
                    <option value="all">All Categories</option>
                    <option value="category1">Technicians </option>
                    <option value="category2">AC Repairs</option>
                    <option value="CCTV">CCTV</option>
                    <option value="Constructions">Constructions</option>
                    <option value="Electricians">Electricians</option>
                    <option value="Electronic Repairs">Electronic Repairs</option>
                    <option value="Glass & Aluminium">Glass & Aluminium</option>
                    <option value="Iron Works">Iron Works</option>
                    <option value="Masonry">Masonry</option>
                    <option value="Odd Jobs">Odd Jobs</option>
                    <option value="Pest Controllers">Pest Controllers</option>
                    <option value="Plumbing">Plumbing</option>
                    <option value="Wood Works">Wood Works</option>
                    <!-- Add more categories as needed -->
                </select>
                <!-- Location Selector -->
                <select class="form-group" name="location">
                    <option value="all">All Locations</option>
                    <option value="location1">Location 1</option>
                    <option value="location2">Location 2</option>
                    <!-- Add more locations as needed -->
                </select>
                <input class="form-group" type="text" placeholder="Search...">
                <i class='bx bx-search icon'></i>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th class="ordId">Worker Name</th>
                    <th class="desc">Category</th>
                    <th class="stth">Worker ID</th>
                    <th class="cost">Contact</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Category 1</td>
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
                    <td>Category 2</td>
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