<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compensation Claims Form</title>
    <!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Include SweetAlert JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-bold text-green-600 mb-6 text-center">Compensation Claims Form</h1>

        <!-- 2x2 Grid Layout -->
        <form action="" method="POST" enctype="multipart/form-data" id="claimsForm">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <div class="bg-green-50 p-4 rounded-lg shadow-lg hover:bg-green-100 transition duration-300">
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">
                        <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-4-4h-4M9 11V3a1 1 0 011-1h4a1 1 0 011 1v8m-7 4v6h8v-6m-2-2H6a1 1 0 00-1 1v1m16 0h-4a1 1 0 00-1 1v1M6 15H4a1 1 0 00-1 1v2m14 0v2h-4v-2"></path>
                        </svg>
                        Personal Information
                    </h2>
                    <div class="space-y-2">
                        <input type="text" name="name" id="name" placeholder="Name" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                        <input type="email" name="email" id="email" placeholder="Email" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                        <input type="tel" name="phone_number" id="phone_number" placeholder="Phone Number" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                        <input type="text" name="address" id="address" placeholder="Address" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                        <input type="text" name="id_number" id="id_number" placeholder="ID Number" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                    </div>
                </div>

                <!-- Claim Details Section -->
                <div class="bg-green-50 p-4 rounded-lg shadow-lg hover:bg-green-100 transition duration-300">
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">
                        <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16v-4a3 3 0 013-3h12a3 3 0 013 3v4a3 3 0 01-3 3H6a3 3 0 01-3-3zm4 0v-4h12v4H7zm6-10l4 4m-2-4l-4 4"></path>
                        </svg>
                        Claim Details
                    </h2>
                    <div class="space-y-2">
                        <textarea name="crop_damage_description" id="crop_damage_description" placeholder="Description of the crop damage or loss" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-600" rows="4"></textarea>
                        <input type="datetime-local" name="damage_date" id="damage_date" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                        <input type="text" name="estimated_extent_of_damage" id="estimated_extent_of_damage" placeholder="Estimated extent of damage" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                    </div>
                </div>

                <!-- Evidence and Documentation Section -->
                <div class="bg-green-50 p-4 rounded-lg shadow-lg hover:bg-green-100 transition duration-300">
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">
                        <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h7l2-2h7a2 2 0 012 2v14a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm0 14h16"></path>
                        </svg>
                        Evidence and Documentation
                    </h2>
                    <div class="space-y-2">
                        <input type="file" name="evidence_files[]" id="evidence_files" accept="image/*, video/*" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-600" multiple>
                        <textarea name="relevant_records" id="relevant_records" placeholder="Relevant records or reports" required class="w-full border border-gray-300 rounded-lg p-2 mt-2 focus:outline-none focus:ring-2 focus:ring-green-600" rows="4"></textarea>
                    </div>
                </div>

                <!-- Financial Impact and Cause of Damage Section -->
                <div class="bg-green-50 p-4 rounded-lg shadow-lg hover:bg-green-100 transition duration-300">
                    <h2 class="text-xl font-semibold text-gray-700 mb-2">
                        <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17h2a3 3 0 003-3v-3a3 3 0 00-3-3h-2a3 3 0 00-3 3v3a3 3 0 003 3zM12 7v3"></path>
                    </svg>
                    Financial Impact &amp; Cause of Damage
                    </h2>
                    <div class="space-y-2">
                        <input type="text" name="cause_of_damage" id="cause_of_damage" placeholder="Description of the cause or source of damage" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                        <input type="number" name="estimated_financial_losses" id="estimated_financial_losses" placeholder="Estimated financial losses" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                        <input type="text" name="crop_type" id="crop_type" placeholder="Crop type (e.g., wheat, corn, etc.)" required class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-green-600">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 text-center">
                <button type="submit" class="w-full bg-green-600 text-white rounded-lg p-3 hover:bg-green-700 transition duration-300">
                    Submit Claim
                </button>
            </div>
        </form>
    </div>

    <!-- PHP handling -->
    <?php


    require '../vendor/autoload.php'; // Include PHPMailer autoload
    use PHPMailer\PHPMailer\PHPMailer;
    
    // Function to send email
    function sendEmail($to, $subject, $message) {
        $mail = new PHPMailer();
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'ameeshagamage@outlook.com';
        $mail->Password = 'ameesha12345';
        $mail->SMTPSecure = 'tls';
    
        // Sender and recipient
        $mail->setFrom('ameeshagamage@outlook.com', 'Admin');
        $mail->addAddress($to);
    
        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
    
        // Send email
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
    
    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "grocerry";
    
    // Establish database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Process form data on form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Extract form data
        $name = $_POST["name"] ?? '';
        $email = $_POST["email"] ?? '';
        $phone_number = $_POST["phone_number"] ?? '';
        $address = $_POST["address"] ?? '';
        $id_number = $_POST["id_number"] ?? '';
        $crop_damage_description = $_POST["crop_damage_description"] ?? '';
        $damage_date = $_POST["damage_date"] ?? '';
        $estimated_extent_of_damage = $_POST["estimated_extent_of_damage"] ?? '';
        $cause_of_damage = $_POST["cause_of_damage"] ?? '';
        $estimated_financial_losses = $_POST["estimated_financial_losses"] ?? '';
        $crop_type = $_POST["crop_type"] ?? '';
        $relevant_records = $_POST["relevant_records"] ?? '';
    
        // Handle file uploads
        $evidence_files = [];
        if (!empty($_FILES['evidence_files']['name'][0])) {
            $file_paths = [];
            $target_dir = "uploads/";
            foreach ($_FILES['evidence_files']['tmp_name'] as $key => $tmp_name) {
                $target_file = $target_dir . basename($_FILES["evidence_files"]["name"][$key]);
                if (move_uploaded_file($tmp_name, $target_file)) {
                    $file_paths[] = $target_file;
                }
            }
            $evidence_files = implode(",", $file_paths);
        }
    
        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO compensation_claims (name, email, phone_number, address, id_number, crop_damage_description, damage_date, estimated_extent_of_damage, cause_of_damage, estimated_financial_losses, crop_type, relevant_records, evidence_files) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssss", $name, $email, $phone_number, $address, $id_number, $crop_damage_description, $damage_date, $estimated_extent_of_damage, $cause_of_damage, $estimated_financial_losses, $crop_type, $relevant_records, $evidence_files);
    
        if ($stmt->execute()) {
            // Send email
            $email_subject = 'Compensation Claim Details';
            $email_message = "<h1>Thank you for your submission!</h1>";
            if (sendEmail($email, $email_subject, $email_message)) {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Claim submitted successfully!',
                    showConfirmButton: false,
                    timer: 6000 // Close after 3 seconds
                  });
                  
                    window.location.href = '../index.php';
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Claim submitted successfully, but failed to send email.',
                    showConfirmButton: false,
                    timer: 6000 
                  });
                  
                    window.location.href = '../index.php';
                </script>";
            }
        } else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Failed to submit claim.',
                showConfirmButton: false,
                timer: 1500 // milliseconds
              });
                              window.location.href = '../index.php';
            </script>";
        }
    
        $stmt->close();
    }
    
    // Close database connection
    $conn->close();
    ?>
    

</body>
</html>
