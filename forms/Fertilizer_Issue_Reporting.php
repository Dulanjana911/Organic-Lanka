<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fertilizer Issue Reporting Form</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image:url("https://i.ibb.co/HFkm34n/green-tea-bud-leaves-green-tea-plantations-morning-nature-background-min.png");
            background-repeat: no-repeat;
            background-size: cover;
            padding: 40px;
        }

        .form-container {
            max-width: 800px;
            margin: auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            border-color: #4caf50;
            outline: none;
        }

        .submit-btn {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        .file-input-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .file-input-button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .file-input-button:hover {
            background-color: #45a049;
        }

        .file-input {
            position: absolute;
            font-size: 100px;
            opacity: 0;
            right: 0;
            top: 0;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1 class="text-2xl font-bold mb-4 text-center">Fertilizer Issue Reporting Form</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <!-- Personal Information -->
            <div class="form-section grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="name" class="form-label"><i class="fas fa-user mr-2"></i>Name</label>
                    <input type="text" id="name" name="name" class="form-input">
                </div>
                <div>
                    <label for="contact" class="form-label"><i class="fas fa-phone-alt mr-2"></i>Contact Details</label>
                    <input type="text" id="contact" name="contact" class="form-input">
                </div>
                <div>
                    <label for="id" class="form-label"><i class="fas fa-id-card mr-2"></i>Identification Number</label>
                    <input type="text" id="id" name="id" class="form-input">
                </div>
                <div>
                    <label for="address" class="form-label"><i class="fas fa-map-marker-alt mr-2"></i>Address</label>
                    <input type="text" id="address" name="address" class="form-input">
                </div>
                <div>
                    <label for="problem" class="form-label"><i class="fas fa-exclamation-triangle mr-2"></i>Nature of the Problem</label>
                    <input type="text" id="problem" name="problem" class="form-input">
                </div>
                <div>
                    <label for="damage" class="form-label"><i class="fas fa-damage mr-2"></i>Extent of Damage</label>
                    <input type="text" id="damage" name="damage" class="form-input">
                </div>
                <div>
                    <label for="date" class="form-label"><i class="far fa-calendar-alt mr-2"></i>Date of Occurrence</label>
                    <input type="datetime-local" id="date" name="date" class="form-input">
                </div>
                <div>
                    <label for="type" class="form-label"><i class="fas fa-seedling mr-2"></i>Type of Fertilizer</label>
                    <input type="text" id="type" name="type" class="form-input">
                </div>
                <div>
                    <label for="brand" class="form-label"><i class="fas fa-tags mr-2"></i>Brand/Manufacturer</label>
                    <input type="text" id="brand" name="brand" class="form-input">
                </div>
                <div>
                    <label for="crops" class="form-label"><i class="fas fa-leaf mr-2"></i>Crops Affected</label>
                    <input type="text" id="crops" name="crops" class="form-input">
                </div>
                <div>
                    <label for="stage" class="form-label"><i class="fas fa-chart-line mr-2"></i>Crop Stage</label>
                    <input type="text" id="stage" name="stage" class="form-input">
                </div>
                <div>
                    <label for="description" class="form-label"><i class="fas fa-comment-alt mr-2"></i>Description</label>
                    <textarea id="description" name="description" rows="4" class="form-input"></textarea>
                </div>
                <div>
                    <label for="visual" class="form-label"><i class="fas fa-camera mr-2"></i>Visual Documentation</label>
                    <div class="file-input-container">
                        <input type="file" id="visual" name="visual" class="file-input">
                        <label for="visual" class="file-input-button">Choose File</label>
                    </div>
                </div>
                <div>
                    <label for="supporting" class="form-label"><i class="fas fa-file-alt mr-2"></i>Supporting Documents</label>
                    <div class="file-input-container">
                        <input type="file" id="supporting" name="supporting" class="file-input">
                        <label for="supporting" class="file-input-button">Choose File</label>
                    </div>
                </div>
                <div class="col-span-3">
                    <label for="notes" class="form-label"><i class="fas fa-sticky-note mr-2"></i>Additional Notes</label>
                    <textarea id="notes" name="notes" rows="4" class="form-input"></textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-section text-center">
                <button type="submit" class="submit-btn">Submit</button>
            </div>
        </form>
    </div>

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

    // Function to sanitize inputs
    function sanitize_input($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Function to handle file uploads
    function upload_file($file)
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file["name"]);

        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return basename($file["name"]);
        } else {
            return false;
        }
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and retrieve form inputs
        $name = isset($_POST["name"]) ? sanitize_input($_POST["name"]) : "";
        $contact = isset($_POST["contact"]) ? sanitize_input($_POST["contact"]) : "";
        $id = isset($_POST["id"]) ? sanitize_input($_POST["id"]) : "";
        $address = isset($_POST["address"]) ? sanitize_input($_POST["address"]) : "";
        $problem = isset($_POST["problem"]) ? sanitize_input($_POST["problem"]) : "";
        $damage = isset($_POST["damage"]) ? sanitize_input($_POST["damage"]) : "";
        $date = isset($_POST["date"]) ? $_POST["date"] : "";
        $type = isset($_POST["type"]) ? sanitize_input($_POST["type"]) : "";
        $brand = isset($_POST["brand"]) ? sanitize_input($_POST["brand"]) : "";
        $crops = isset($_POST["crops"]) ? sanitize_input($_POST["crops"]) : "";
        $stage = isset($_POST["stage"]) ? sanitize_input($_POST["stage"]) : "";
        $description = isset($_POST["description"]) ? sanitize_input($_POST["description"]) : "";
        $notes = isset($_POST["notes"]) ? sanitize_input($_POST["notes"]) : "";

        // Upload visual documentation
        $visual_documentation = isset($_FILES["visual"]) ? upload_file($_FILES["visual"]) : "";
        $supporting_documents = isset($_FILES["supporting"]) ? upload_file($_FILES["supporting"]) : "";

        $sql = "INSERT INTO fertilizer_reports (id, name, contact, identification_number, address, nature_of_problem, extent_of_damage, date_of_occurrence, type_of_fertilizer, brand_manufacturer, crops_affected, crop_stage, description, visual_documentation, supporting_documents, additional_notes, created_at, problem) 
        VALUES ('$id', '$name', '$contact', '$id', '$address', '$problem', '$damage', '$date', '$type', '$brand', '$crops', '$stage', '$description', '$visual_documentation', '$supporting_documents', '$notes', NOW(), '$problem')";


        if ($conn->query($sql) === TRUE) {
            echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Data inserted successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Clear all input boxes after successful insertion
                    var inputs = document.getElementsByTagName('input');
                    for (var i = 0; i < inputs.length; i++) {
                        inputs[i].value = '';
                    }
                    var textarea = document.getElementsByTagName('textarea')[0];
                    textarea.value = '';
                }
            });
            </script>";
        } else {
            echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Failed to insert data.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            </script>";
        }
    }

    $conn->close();
    ?>
</body>

</html>
