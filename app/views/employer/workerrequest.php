<!DOCTYPE html>
<html>

<head>
    <title>Painter Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            /* Reset default margin */
        }

        .profile-container2 {
            background-color: #ffffff;
            width: 80%;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 20px;
            display: flex;
            /* Use flexbox for better alignment */
            align-items: center;
            justify-content: space-between;
            /* Adjusted spacing between items */
            margin: 20px auto;
            /* Center the container */
        }

        .picture {
            margin-right: 20px;
            /* Add margin for separation */
        }

        .image {
            max-height: 60px;
            max-width: 100%;
            /* Ensure image responsiveness */
            border-radius: 50%;
            /* Make the image circular */
        }

        .index {
            flex-grow: 1;
            /* Allow the content to grow within the flex container */
        }

        .profile-name,
        .profile-type,
        .profile-ratings,
        .budget {
            margin: 10px 0;
        }



        .view-profile-button,
        .edit-profile-button,
        .worker-profile-button {
            background-color: #ff7f00;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-align: center;
            border-radius: 20px;
            margin-top: 80px;
            margin-left: 5px;
        }

        .index-right {

            max-width: 450px;
        }

        .index-right a {
            float: right;
        }

        .location {
            float: right;
            font-size: 18px;
            margin-top: -19%;
            margin-right: -309px;
            /* Adjusted the font size for readability */


        }

        .post-container {
            margin-left: 300px;
            width: calc(100% - 287px);
            margin-top: 20px;
        }



        /* Responsive adjustments */
        @media (max-width: 768px) {
            .profile-container2 {
                width: 150px;
                flex-direction: column;
                /* Stack items in a column on smaller screens */
                text-align: center;
                /* Center text on smaller screens */
            }

            .picture {
                margin: 0;
                /* Remove margin on smaller screens */
                margin-bottom: 10px;
                /* Add bottom margin for separation */
            }

            .location {
                float: none;
                /* Remove float on smaller screens */
            }
        }
    </style>
    <!-- body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0; /* Reset default margin */
    }

    .profile-container2 {
    background-color: #ffffff;
    width: 80%;
    box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
    padding: 20px;
    border-radius: 20px;
    display: flex; /* Use flexbox for better alignment */
    align-items: center;
    justify-content: space-between; /* Adjusted spacing between items */
    margin: 20px auto; /* Center the container */
    }

    .picture {
    margin-right: 20px; /* Add margin for separation */
    }

    .image {
    max-width: 100%; /* Ensure image responsiveness */
    border-radius: 50%; /* Make the image circular */
    }

    .index {
    display: flex;
    flex-direction: column;
    }

    .profile-name,
    .profile-type,
    .profile-ratings,
    .budget,
    .location {
    margin: 10px 0;
    }

    .location {
    font-size: 16px; /* Adjusted the font size for readability */
    margin-left: auto; /* Move the location to the rightmost position */
    }

    .view-profile-button,
    .edit-profile-button,
    .worker-profile-button {
    background-color: #ff7f00;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    text-align: center;
    border-radius: 20px;
    }

    .view-profile-button,
    .edit-profile-button {
    margin-top: 10px; /* Adjusted the margin for better spacing */
    }

    .worker-profile-button {
    margin-top: 10px;
    }

    .post-container {
    margin-top: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
    .profile-container2 {
    flex-direction: column; /* Stack items in a column on smaller screens */
    text-align: center; /* Center text on smaller screens */
    }

    .picture {
    margin: 0; /* Remove margin on smaller screens */
    margin-bottom: 10px; /* Add bottom margin for separation */
    }

    .location {
    margin-left: 0; /* Remove margin-left on smaller screens */
    }
    } -->
</head>

<body>
    <div class="post-container">
        <div class="profile-container2">
            <div class="picture">
                <img class="image" src="<?= ROOT ?>/assets/images/employer/profile.jpg" alt="">
            </div>
            <div class="index">
                <div class="profile-name">Your Post -තණකොළ කැපීමට සේවකයෙකු අවශ්‍යයි</div>
                <div class="profile-ratings">2 hrs ago</div>
                <div class="profile-type">Requested By - Upul Perera</div>
                <div class="budget">Requested Budget-RS 3500/= per day</div>
                <div class="location">Kadawatha</div>



            </div>
            <div class="index-right">

                <a></a><button class="view-profile-button">Accept</button></a>
                <a></a><button class="edit-profile-button">Reject</button></a>
                <a href="<?= ROOT ?>/employer/workerprof"><button class="worker-profile-button">Worker Profile</button></a>
            </div>
        </div>
    </div>
</body>

</html>