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
        <a href="form_views.php">Fertilizer Issue Forms</a>
    </div>
    <div class="rowbtn">
    </div>
    <div class="catbox-row">
    <table class="table" style="width: 100%; border-collapse: collapse; border-spacing: 0;">
    <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Contact</th>
                
                        <th class="px-4 py-2 text-left">Address</th>
                        <th class="px-4 py-2 text-left">Nature of Problem</th>
                        <th class="px-4 py-2 text-left">Extent of Damage</th>
                        <th class="px-4 py-2 text-left">Date of Occurrence</th>
                        <th class="px-4 py-2 text-left">Type of Fertilizer</th>
                        <th class="px-4 py-2 text-left">Brand<br>Manufacturer</th>
                        <th class="px-4 py-2 text-left">Crops Affected</th>
                        <th class="px-4 py-2 text-left">Crop Stage</th>
                        <th class="px-4 py-2 text-left">Description</th>
                        <th class="px-4 py-2 text-left">Visual Documentation</th>
                        <th class="px-4 py-2 text-left">Supporting Documents</th>
                        <th class="px-4 py-2 text-left">Additional Notes</th>
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
                    $sql = "SELECT * FROM fertilizer_reports";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['name'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['contact'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['address'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['nature_of_problem'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['extent_of_damage'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['date_of_occurrence'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['type_of_fertilizer'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['brand_manufacturer'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['crops_affected'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['crop_stage'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['description'] . "</td>";
                            echo "<td class='px-4 py-2 text-left'><a href='../forms/uploads/" . $row['visual_documentation'] . "' class='text-blue-500' target='_blank'><i class='fas fa-file-image'></i> Download</a></td>";
                            echo "<td class='px-4 py-2 text-left'><a href='../forms/uploads/" . $row['supporting_documents'] . "' class='text-blue-500' target='_blank'><i class='fas fa-file'></i> Download</a></td>";
                            echo "<td class='px-4 py-2 text-left'>" . $row['additional_notes'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='15' class='px-4 py-2 text-center'>No data found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
