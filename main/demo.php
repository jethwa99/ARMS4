<?php
    include("dbcon.php");
    echo $_GET['cid'] . " " . $_GET['sid'];
?>

<div class="form-group row mb-3">
                      <div class="col-xl-6">
                        <label class="form-control-label">Subject<span class="text-danger ml-2">*</span></label>
                      
                             <select name="inputSubject4" class="form-select">
                                <option selected>--Select Subject--</option>
                                <?php
                                $sql = "SELECT * FROM subject where Course = '19' AND Semester = '4'";
                                $que = $conn->query($sql);
                                while ($row = $que->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['SubjectID'] ?>"><?php echo $row['SubjectName'] ?></option>
                                <?php } ?>
                            </select>
                      </div>
</div>

