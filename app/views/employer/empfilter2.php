<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/jobfilter.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Category and Location Select</title>
</head>

<body>

    <div class="select-container">
        <div class="logo_details">
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <div class="search-container">
            <input type="text" class="search-box" id="search" placeholder="Search..." oninput="searchInput()">

        </div>
        <div class="filter-container">
            <h2 class="search-box">Filter</h2>
            <button type="submit" id="search-button" onclick="searchTable()">Filter</button>
        </div>

        <label for="category">Category</label>
        <select id="category">
            <option value="All">All</option>
            <option value="Technicians">Technicians</option>
            <option value="AC Repairs">AC Repairs</option>
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
            <option value="Garden">Garden</option>
            <option value="Painting">Painting</option>
            <option value="Roofing">Roofing</option>
            <option value="Cleaning">Cleaning</option>

        </select>


        <label for="locationdata">Location</label>
        <select id="locationdata">
            <option value="All">All</option>
            <option value="Colombo">Colombo</option>
            <option value="Kandy">Kandy</option>
            <option value="Gampaha">Gampaha</option>
            <option value="Negombo">Negombo</option>
            <option value="Kadawatha">Kiribathgoda</option>
            <option value="Kadawatha">kaluthara</option>
            <option value="kirindiwela">kirindiwela</option>
            <option value="Homagama">Homagama</option>
            <option value="Kirulapana">Kirulapana</option>

        </select>


    </div>
    <script>
        window.onload = function() {
            const sidebar = document.querySelector(".select-container");
            const closeBtn = document.querySelector("#btn");
            const main = document.querySelector(".main");

            closeBtn.addEventListener("click", function() {
                sidebar.classList.toggle("open");
                main.classList.toggle("open");
                menuBtnChange();
            });

            function menuBtnChange() {
                if (sidebar.classList.contains("open")) {
                    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else {
                    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
                }
            }
        };
    </script>
</body>

</html>