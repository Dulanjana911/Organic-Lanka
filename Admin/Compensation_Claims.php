<?php
require('require/top.php');

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

    // Fetch data from the database
    $stmt = $conn->query("SELECT * FROM compensation_claims");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

<div class="wrwr">
    <div class="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="form_views.php">Compensation Claims</a>
    </div>
    <div class="rowbtn">
    </div>
    <div class="catbox-row">
        <table class="table" style="width: 100%; border-collapse: collapse; border-spacing: 0;">
            <thead style="background-color: #f2f2f2;">
                <tr>
                    <th style="padding: 12px; border: 1px solid #ddd;">Name</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Phone</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Address</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Crop Type</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Crop Damage Description</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Damage Date</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Proof</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Estimated Extent of Damage</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Estimated Financial Losses</th>
                    <th style="padding: 12px; border: 1px solid #ddd;">Submitted At</th>
               
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr style="background-color: #fff;">
                        <td style="padding: 12px; border: 1px solid #ddd;"><?php echo htmlspecialchars($row['name']); ?></td>
                        <td style="padding: 12px; border: 1px solid #ddd;"><?php echo htmlspecialchars($row['phone_number']); ?></td>
                        <td style="padding: 12px; border: 1px solid #ddd;"><?php echo htmlspecialchars($row['address']); ?></td>
                        <td style="padding: 12px; border: 1px solid #ddd;"><?php echo htmlspecialchars($row['crop_type']); ?></td>
                        <td style="padding: 12px; border: 1px solid #ddd;"><?php echo htmlspecialchars($row['crop_damage_description']); ?></td>
                        <td style="padding: 12px; border: 1px solid #ddd;"><?php echo htmlspecialchars($row['damage_date']); ?></td>
                        <td style="padding: 12px; border: 1px solid #ddd;">
    <?php 
    $imagePath = "../forms/" . htmlspecialchars($row['evidence_files']); // Construct the image file path
    ?>
    <img src="<?php echo $imagePath; ?>" style="max-width: 100px; max-height: 100px;" alt="Evidence Image">
</td>

                        <td style="padding: 12px; border: 1px solid #ddd;"><?php echo htmlspecialchars($row['estimated_extent_of_damage']); ?></td>
                        <td style="padding: 12px; border: 1px solid #ddd;"><?php echo htmlspecialchars($row['estimated_financial_losses']); ?></td>
                        <td style="padding: 12px; border: 1px solid #ddd;"><?php echo htmlspecialchars($row['submitted_at']); ?></td>
                      
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row" style="display: block; margin-bottom: 2rem; font-size: 1.2rem; color: #6a7187;">
        @ Developed by Dulanjana Kavishan - 10819548
    </div>
</div>

<?php
require('require/foot.php');
?>
