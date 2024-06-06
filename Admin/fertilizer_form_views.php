<?php
require('require/top.php');
?>
<?php
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

// Fetch data from the database
try {
    $stmt = $conn->query("SELECT * FROM fertilizer_application");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<div class="wrwr">
    <div class="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="form_views.php">fertilizer Forms</a>
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
            <th style="padding: 12px; border: 1px solid #ddd;">Farm Size</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Crop Type</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Fertilizer Quantity</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Crop Intended</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Crop Stage</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Yield Expectations</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Additional Info</th>
            <th style="padding: 12px; border: 1px solid #ddd;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row): ?>
            <tr style="background-color: #fff;">
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['name']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['phone']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['address']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['farm_size']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['crop_type']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['fertilizer_quantity']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['crop_intended']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['crop_stage']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['yield_expectations']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd;"><?php echo $row['additional_info']; ?></td>
                <td style="padding: 12px; border: 1px solid #ddd; text-align: center;">
                <button style="background-color: #4CAF50; /* Green */
                    border: none;
                    color: white;
                    padding: 8px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 4px;
                    transition: background-color 0.3s, transform 0.3s;
                    cursor: pointer;
                    border-radius: 5px;
                    outline: none;
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
    <i class="fas fa-eye" style="display: block; margin: auto;"></i> <!-- Assuming FontAwesome icon -->
</button>

</td>


            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

           
            
        </div>
    </div>
    <div class="row" style="
              display: block;
              margin-bottom: 2rem;
              font-size: 1.2rem;
              color: #6a7187;
            ">
        @ Developed by Dulanjana Kavishan -10819548
    </div>
</div>

<?php
require('require/foot.php');
?>