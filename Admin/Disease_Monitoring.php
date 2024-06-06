<?php
require('require/top.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
<div class="wrwr">
    <div class="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="form_views.php">Pest and Disease Monitoring Forms</a>
    </div>
    <div class="rowbtn">
    </div>
    <div class="catbox-row">
    <table class="table" style="width: 100%; border-collapse: collapse; border-spacing: 0;">
    <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Contact</th>
                        <th class="px-4 py-2 text-left">ID Number</th>
                        <th class="px-4 py-2 text-left">Address</th>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-left">Date and Time</th>
                        <th class="px-4 py-2 text-left">Media</th>
                        <th class="px-4 py-2 text-left">Crops Affected</th>
                        <th class="px-4 py-2 text-left">Crop Stage</th>
                        <th class="px-4 py-2 text-left">Estimated Damage</th>
                        <th class="px-4 py-2 text-left">Notes</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    // Establish database connection
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "grocerry";

                    $conn = new mysqli($servername, $username, $password, $database);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch data from the database
                    $sql = "SELECT * FROM pestanddiseasemonitoring";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['name'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['contact'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['id_number'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['address'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['description'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['date_time'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>";
                            // Check if media file exists
                            if (!empty($row['media'])) {
                                // Get the filename from the media path
                                $filename = basename($row['media']);
                                // Display the download link with .htm extension
                                echo "<a href='../forms/" . $row['media'] . "' class='text-blue-500' download='$filename'><i class='fas fa-download'></i> $filename</a>";
                            } else {
                                // If media file is not available
                                echo "N/A";
                            }
                            echo "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['crops'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['crop_stage'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['estimated_damage'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['notes'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11' class='px-4 py-2 text-center'>No data found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
