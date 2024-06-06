<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pest and Disease Monitoring Form</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM4aJ3s9RH8/jw3xt5TT2LBK8FX9t51PSPfaCLt" crossorigin="anonymous">
    <style>
       
    
        /* Custom styles for form */
        input, textarea, select {
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-family: Poppins;
            transition: border-color 0.3s;
        }
        input:focus, textarea:focus, select:focus {
            border-color: #4CAF50; /* Bright blue color when focused */
            outline: none;
            box-shadow: 0 0 5px rgba(37, 99, 235, 0.5);
        }

        /* Custom styles for floating labels */
        .floating-label {
            position: relative;
            margin-bottom: 16px;
        }
        .floating-label input,
        .floating-label textarea,
        .floating-label select {
            padding-top: 16px; /* Adjust to fit label */
        }
        .floating-label label {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            background: white;
            padding: 0 4px;
            transition: all 0.2s;
            pointer-events: none;
            color: #6b7280; /* Gray color */
            font-size: 14px;
        }
        .floating-label input:focus + label,
        .floating-label input:not(:placeholder-shown) + label,
        .floating-label textarea:focus + label,
        .floating-label textarea:not(:placeholder-shown) + label,
        .floating-label select:focus + label,
        .floating-label select:not(:placeholder-shown) + label {
            top: 0;
            left: 10px;
            font-size: 12px;
            color: #4CAF50; /* Bright blue color when focused */
            font-weight: 500;
        }

        /* Style for buttons */
        button {
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: rgba(29, 78, 216, 0.8);
        }
           /* Style for custom file upload button */
           .custom-file-upload-container {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    /* Custom file upload label */
    .custom-file-upload-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 12px;
        border: 2px dashed #34d399; /* Dashed green border */
        border-radius: 8px;
        transition: border-color 0.3s;
        cursor: pointer;
    }

    .custom-file-upload-label:hover {
        border-color: #28a745; /* Darker green on hover */
    }

    /* Upload text and icon */
    .custom-file-upload-text {
        font-weight: bold;
        color: #34d399; /* Green */
        display: flex;
        align-items: center;
    }

    /* Additional info about accepted file types */
    .upload-info {
        font-size: 0.9rem;
        color: #6b7280; /* Gray */
    }
    /* Styling for the file names container */
    .file-names {
        margin-top: 10px;
    }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4 text-center text-green-600">Pest and Disease Monitoring Form</h1>

        <form class="bg-white p-6 rounded-lg shadow-lg" id="monitoringForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <!-- Personal Information -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4 text-green-600">Personal Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div class="floating-label">
                        <input type="text" id="name" name="name" class="form-input w-full" placeholder=" " required>
                        <label for="name">Name</label>
                    </div>

                    <!-- Contact Details -->
                    <div class="floating-label">
                        <input type="text" id="contact" name="contact" class="form-input w-full" placeholder=" " required>
                        <label for="contact">Phone Number or Email</label>
                    </div>

                    <!-- Identification Information -->
                    <div class="floating-label">
                        <input type="text" id="id" name="id" class="form-input w-full" placeholder=" " required>
                        <label for="id">ID Number</label>
                    </div>

                    <!-- Address -->
                    <div class="floating-label">
                        <input type="text" id="address" name="address" class="form-input w-full" placeholder=" " required>
                        <label for="address">Address</label>
                    </div>
                </div>
            </div>

            <!-- Encounter Details -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4 text-green-600">Encounter Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Description -->
                    <div class="floating-label">
                        <textarea id="description" name="description" class="form-textarea w-full" rows="3" placeholder=" " required></textarea>
                        <label for="description">Description of Pest or Disease</label>
                    </div>

                    <!-- Date and Time -->
                    <div class="floating-label">
                        <input type="datetime-local" id="date" name="date" class="form-input w-full" placeholder=" " required>
                        <label for="date">Date and Time of Encounter</label>
                    </div>
                </div>
            </div>

            <!-- Visual Documentation -->
            <div class="mb-6">
    <h2 class="text-xl font-semibold mb-4 text-green-600">Visual Documentation</h2>
    <div class="custom-file-upload-container">
        <input type="file" id="media" name="media" accept="image/*, video/*" class="hidden" multiple required>
        <label for="media" class="custom-file-upload-label">
            <span class="custom-file-upload-text">
                <i class="fas fa-cloud-upload-alt mr-2"></i> Upload Photos or Videos
            </span>
            <span class="upload-info">(JPEG, PNG, MP4 - up to 10MB)</span>
        </label>
        <!-- Container to display uploaded file names -->
        <div id="file-names" class="file-names mt-2 text-sm text-gray-600"></div>
    </div>
</div>
      

            <!-- Crop Information -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4 text-green-600">Crop Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Types of Crops Affected -->
                    <div class="floating-label">
                        <input type="text" id="crops" name="crops" class="form-input w-full" placeholder=" " required>
                        <label for="crops">Types of Crops Affected</label>
                    </div>

                    <!-- Crop Stage -->
                    <div class="floating-label">
                        <select id="crop_stage" name="crop_stage" class="form-input w-full" required>
                            <option value="planting">Planting</option>
                            <option value="growing">Growing</option>
                            <option value="harvesting">Harvesting</option>
                            <option value="mature">Mature</option>
                        </select>
                        <label for="crop_stage">Crop Stage</label>
                    </div>

                    <!-- Estimated Damage or Impact -->
                    <div class="floating-label col-span-2">
                        <input type="text" id="damage" name="damage" class="form-input w-full" placeholder=" " required>
                        <label for="damage">Estimated Damage or Impact</label>
                    </div>
                </div>
            </div>

            <!-- Additional Notes -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4 text-green-600">Additional Notes</h2>
                <div class="floating-label">
                    <textarea id="notes" name="notes" class="form-textarea w-full" rows="3" placeholder=" "></textarea>
                    <label for="notes">Notes</label>
                </div>
            </div>

            <!-- Submit and Clear Buttons -->
            <div class="flex justify-center space-x-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-semibold">Submit</button>
                <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg font-semibold" onclick="document.getElementById('monitoringForm').reset();">Clear</button>
            </div>
        </form>
    </div>

    <!-- JavaScript for form submission -->
    <script>
    // Listen for changes in the file input
    document.getElementById('media').addEventListener('change', function(event) {
        // Get the uploaded files
        const files = event.target.files;

        // Get the file names container
        const fileNamesContainer = document.getElementById('file-names');

        // Clear the existing file names
        fileNamesContainer.innerHTML = '';

        // Display the names of the uploaded files
        if (files.length > 0) {
            const fileNamesList = document.createElement('ul');
            fileNamesList.className = 'list-disc pl-5';

            for (let i = 0; i < files.length; i++) {
                const fileNameItem = document.createElement('li');
                fileNameItem.textContent = files[i].name;
                fileNamesList.appendChild(fileNameItem);
            }

            // Append the list of file names to the container
            fileNamesContainer.appendChild(fileNamesList);
        }
    });
</script>

<?php
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "grocerry";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO PestAndDiseaseMonitoring (name, contact, id_number, address, description, date_time, media, crops, crop_stage, estimated_damage, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $name, $contact, $id_number, $address, $description, $date_time, $media, $crops, $crop_stage, $estimated_damage, $notes);

    $to = $_POST["contact"]; // Assuming contact field contains the user's email
    $subject = "Form Submission Confirmation";
    $message = "Thank you for submitting the form. We have received your information.";

    // Send email
    sendEmail($to, $subject, $message);

    // Set parameters
    $name = $_POST["name"];
    $contact = $_POST["contact"];
    $id_number = $_POST["id"];
    $address = $_POST["address"];
    $description = $_POST["description"];
    $date_time = $_POST["date"];
    $crops = $_POST["crops"];
    $crop_stage = $_POST["crop_stage"];
    $estimated_damage = $_POST["damage"];
    $notes = $_POST["notes"];

    // Handle file upload
    $targetDir = "uploads/";
    $media = "";
    if (!empty($_FILES["media"]["name"])) {
        $fileName = basename($_FILES["media"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        
        // Allow certain file formats
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'mp4');
        if (in_array($fileType, $allowedTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["media"]["tmp_name"], $targetFilePath)) {
                $media = $targetFilePath;
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            }
        } else {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG, GIF, and MP4 files are allowed.');</script>";
        }
    }

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Form submitted successfully.'
        });
      </script>";
    } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Error: " . $conn->error . "'
        });
      </script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com'; // Outlook SMTP server
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'ameeshagamage@outlook.com'; // Your Outlook email address
    $mail->Password = 'ameesha12345'; // Your Outlook password
    $mail->SMTPSecure = 'tls';

    $mail->setFrom('ameeshagamage@outlook.com', 'Admin'); // Sender's email address and name
    $mail->addAddress($to); // Recipient's email address

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if (!$mail->send()) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Error sending email: " . $mail->ErrorInfo . "'
                });
              </script>";
    }
}
?>


</body>

</html>
