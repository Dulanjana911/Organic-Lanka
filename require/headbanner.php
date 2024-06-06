<?php
$userid=$_SESSION['USER_ID'];
$userData=mysqli_fetch_assoc(mysqli_query($con,"select users.*,user_wallet.ballance from users,user_wallet where users.id='$userid' and user_wallet.user_id=users.id"));
?>
<div class="headbanner">
    <div class="userimage">
        <img src="https://i.ibb.co/WnKxNrN/Lovepik-com-380487049-fashion-boy-avatar-fashion-boy-cartoon-hat.pngg" alt="" />
    </div>
    <h4><?php echo $userData['name'] ?></h4>
    <p>
        +94 <?php echo $userData['mobile'] ?>
        <a href="#"><i class="uil uil-edit"></i></a>
    </p>
    <div class="earn-points">
        <img src="assets/images/Dollar.svg" alt="" />Ballance :
        <span>Rs.<?php echo $userData['ballance'] ?></span>
    </div>
</div>