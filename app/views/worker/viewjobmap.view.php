<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOb Map</title>
    <style>
        .mapdetails {
            display: flex;
            flex-direction: column;
        }

        .mapdetails h1 {
            display: flex;
            justify-content: center;
            flex-direction: row;
        }

        #map {
            height: 600px;
            width: 75%;
            left: 20%;
        }
    </style>
</head>
<?php include 'workernav.php' ?>
<?php include 'workerfilter.php' ?>

<body>

    <div class="mapdetails">
        <h1>Job Locations Map</h1>
        <div id="map"></div>
    </div>
    <script>
        function initMap() {

            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: {
                    lat: 6.882842411689467,
                    lng: 79.89451365555615
                },
                gestureHandling: "none",
                zoomControl: false
            });

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "<?= ROOT ?>/worker/fetchlocations", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var locations = JSON.parse(xhr.responseText);
                        console.log(locations);
                        locations.forEach(function(location) {
                            var marker = new google.maps.Marker({
                                position: {
                                    lat: parseFloat(location.latitude),
                                    lng: parseFloat(location.longitude)
                                },
                                map: map,
                                jobId: location.job_id
                            });
                            marker.addListener("click", function() {
                                window.location.href = "<?= ROOT ?>/worker/requestjob?id=" + this.jobId;
                            });
                        });

                    } else {
                        console.error("Failed to retrieve locations: " + xhr.status);
                    }
                }
            };
            xhr.send();
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6GOvTVdWC3aNfI8Jg4gOkyk74hiOB0RE&libraries=places&callback=initMap"></script>
</body>

</html>