<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fertilizer Information Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fadeInUp {
            animation: fadeInUp 0.5s ease-out;
        }
    </style>
</head>


<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Fertilizer Information Form</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <!-- Personal Information -->
            <div class="mb-4">
                <h2 class="text-xl font-bold mb-2">Personal Information</h2>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            <i class="fas fa-user mr-2"></i>Name
                        </label>
                        <input name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white fadeInUp" id="name" type="text" placeholder="John Doe">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
                            <i class="fas fa-phone-alt mr-2"></i>Phone Number
                        </label>
                        <input name="phone" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white fadeInUp" id="phone" type="tel" placeholder="94-7XX-XXX-XXX">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                            <i class="fas fa-envelope mr-2"></i>Email
                        </label>
                        <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white fadeInUp" id="email" type="email" placeholder="johndoe@example.com">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                            <i class="fas fa-map-marker-alt mr-2"></i>Address
                        </label>
                        <input name="address" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white fadeInUp" id="address" type="text" placeholder="123 Main St, City, Country">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="id">
                            <i class="fas fa-id-card mr-2"></i>Identification Number
                        </label>
                        <input name="id" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white fadeInUp" id="id" type="text" placeholder="ID-123456789">
                    </div>
                </div>
            </div>
            <!-- Farm Information -->
            <div class="mb-4">
                <h2 class="text-xl font-bold mb-2">Farm Information</h2>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="farmSize">
                            <i class="fas fa-ruler mr-2"></i>Farm Size (acres)
                        </label>
                        <input name="farmSize" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white fadeInUp" id="farmSize" type="number" placeholder="100">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cropType">
                            <i class="fas fa-seedling mr-2"></i>Type of Crops
                        </label>
                        <input name="cropType" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white fadeInUp" id="cropType" type="text" placeholder="Rice, Coconut, Tea">
                    </div>
                </div>
            </div>
            <!-- Fertilizer Requirements -->
            <div class="mb-4">
                <h2 class="text-xl font-bold mb-2">Fertilizer Requirements</h2>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="fertilizerQuantity">
                            <i class="fas fa-box mr-2"></i>Quantity Required (in kg)
                        </label>
                        <input name="fertilizerQuantity" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white fadeInUp" id="fertilizerQuantity" type="number" placeholder="1000">
                    </div>
                </div>
            </div>
            <!-- Crop Information -->
            <div class="mb-4">
                <h2 class="text-xl font-bold mb-2">Crop Information</h2>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cropIntended">
                            <i class="fas fa-seedling mr-2"></i>Types of Crops Intended for Fertilization
                        </label>
                        <input name="cropIntended" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white fadeInUp" id="cropIntended" type="text" placeholder="Rice, Coconut, Tea">
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cropStage">
                            <i class="fas fa-seedling mr-2"></i>Crop Stage
                        </label>
                        <select name="cropStage" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white fadeInUp" id="cropStage">
                            <option>Planting</option>
                            <option>Growing</option>
                            <option>Harvesting</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="yieldExpectations">
                            <i class="fas fa-chart-bar mr-2"></i>Estimated Yield Expectations (in tons)
                        </label>
                        <input name="yieldExpectations" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white fadeInUp" id="yieldExpectations" type="number" placeholder="50">
                    </div>
                </div>
            </div>
            <!-- Additional Information -->
            <div class="mb-4">
                <h2 class="text-xl font-bold mb-2">Additional Information</h2>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="additionalInfo">
                            <i class="fas fa-info-circle mr-2"></i>Additional Information
                        </label>
                        <textarea name="additionalInfo" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white fadeInUp" id="additionalInfo" placeholder="Enter any additional information here..."></textarea>
                    </div>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="flex items-center justify-between">
                <button name="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
    <script>
        // Add animation class to form elements
        document.querySelectorAll('.fadeInUp').forEach(element => {
            element.classList.add('fadeInUp');
        });
    </script>
 <?php
// Include PHPMailer autoload
require '../vendor/autoload.php';
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

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grocerry";

// Create connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    try {
        // Prepare SQL query to insert data into the database
        $stmt = $conn->prepare("INSERT INTO fertilizer_application  (name, phone, email, address, identification_number, farm_size, crop_type, fertilizer_quantity, crop_intended, crop_stage, yield_expectations, additional_info) VALUES (:name, :phone, :email, :address, :identification_number, :farm_size, :crop_type, :fertilizer_quantity, :crop_intended, :crop_stage, :yield_expectations, :additional_info)");

        // Bind parameters
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':phone', $_POST['phone']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':address', $_POST['address']);
        $stmt->bindParam(':identification_number', $_POST['id']);
        $stmt->bindParam(':farm_size', $_POST['farmSize']);
        $stmt->bindParam(':crop_type', $_POST['cropType']);
        $stmt->bindParam(':fertilizer_quantity', $_POST['fertilizerQuantity']);
        $stmt->bindParam(':crop_intended', $_POST['cropIntended']);
        $stmt->bindParam(':crop_stage', $_POST['cropStage']);
        $stmt->bindParam(':yield_expectations', $_POST['yieldExpectations']);
        $stmt->bindParam(':additional_info', $_POST['additionalInfo']);

        // Execute the query
        $stmt->execute();

        // Send email
        $email_to = $_POST['email'];
        $email_subject = 'Fertilizer Information Form Submission';
        $email_message = 'Dear ' . $_POST['name'] . ',<br><br>';
        $email_message .= 'Thank you for submitting the Fertilizer Information Form<br><br>';
        $email_message .= 'Best regards,<br>';
        $email_message .= 'Admin';

        if (sendEmail($email_to, $email_subject, $email_message)) {
            // Show success message using SweetAlert
            echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Data inserted successfully. Email sent.',
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
            // Show success message without email using SweetAlert
            echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Data inserted successfully, but failed to send email.',
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
        }
    } catch(PDOException $e) {
        // Show error message using SweetAlert
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
?>

</body>
</html>
