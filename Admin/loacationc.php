<?php
require('require/top.php');
?>
<div class="wrwr">
    <div class="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="loacationc.php">Add Country</a>
    </div>
    <div class="rowbtn">
        <div class="b" style="display:flex;flex-direction:column;padding:3rem 2rem" id="cpl">
            <input type="text" placeholder="Enter Country Name" id="sfield" style="width:98.5%;margin:1rem 0;" />
            <button class="add" onclick="addcountry()" id='adcntry'>
                <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Add
            </button>
            <span style="font-size:1.2rem;margin-top:0.8rem;" id="erm"></span>
        </div>
    </div>

    <div class="rowbtn" style="margin:3rem 0 0 0;" id="filterlist">
        <div class="b" style="display:flex;flex-direction:column;padding:3rem 2rem">
            <div class="row" style="height:3rem; display:flex;justify-content:space-between;">
                <div class="block" style="width:15rem; font-weight: 600; color:#40464d; font-size:1.6rem; display:flex; justify-content:center; align-items:center;">
                    Slno
                </div>
                <div class="block" style="width:15rem; font-weight: 600; color:#40464d; font-size:1.6rem; display:flex; justify-content:center; align-items:center;">
                    Country
                </div>
                <div class="block" style="width:15rem; font-weight: 600; color:#40464d; font-size:1.6rem; display:flex; justify-content:center; align-items:center;">
                    Action
                </div>
            </div>
        </div>
        <?php
        $query2 = "select * from country order by id desc";
        $res2 = mysqli_query($con, $query2);
        $i = 1;
        while ($rowt = mysqli_fetch_assoc($res2)) {
        ?>
            <div class="b" style="display:flex;flex-direction:column;padding:0.4rem 2rem">
                <div class="row" style="height:3rem; display:flex;justify-content:space-between;">
                    <div class="block" style="width:15rem; display:flex; justify-content:center; align-items:center;font-size:1.3rem;color:#6a7187;">
                        <?php echo $i; ?>
                    </div>
                    <div class="block" style="width:15rem; display:flex; justify-content:center; align-items:center;font-size:1.3rem;color:#6a7187;">
                        <?php echo $rowt['cntry_name']; ?>
                    </div>
                    <div class="block" style="width:15rem; display:flex; justify-content:center; align-items:center;font-size:1.3rem;color:#6a7187;">
                        <i class="fa fa-pencil" aria-hidden="true" style="margin-right:1.2rem;" class="k" onclick="editcountry(<?php echo $rowt['id']; ?>)"></i>
                        <i class="fa fa-trash" aria-hidden="true" onclick="deletecountry(<?php echo $rowt['id']; ?>)"></i>
                    </div>
                </div>
            </div>
        <?php $i++;
        } ?>
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