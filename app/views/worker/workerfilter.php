<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/jobfilter.css">
    <title>Category and Location Select</title>
</head>
<body>

    <div class="select-container">
        <div class="search-container">
            <input type="text" id="search" placeholder="Search...">
            <button>Search</button>
        </div>
   
  
        <label for="category">Category</label>
        <select id="category">
            <option value="Technicians">All</option>
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
        </select>

        <label for="location">Location</label>
        <select id="location">
            <option value="Colombo">All</option>
            <option value="Colombo">Colombo</option>
            <option value="Kandy">Kandy</option>
            <option value="Gampaha">Gampaha</option>
            <option value="Negombo">Negombo</option>
            <option value="Kadawatha">Kiribathgoda</option>
            <option value="Kadawatha">kaluthara</option>
            <option value="Kadawatha">Galle</option>
            <option value="Kadawatha">Homagama</option>
            <option value="Kadawatha">Kirulapana</option>
           
        </select>
        
        
    </div>
    
</body>
</html>