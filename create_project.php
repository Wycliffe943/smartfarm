<?php
    include ('config/db_connect.php'); 

    $sql = 'SELECT * FROM sf_components';

    // make query and get result
    $result = mysqli_query($conn, $sql);

    //fetch the resulting rows as an array
    $components = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //best practice but not important: free result from memory
    mysqli_free_result($result); 

    //then close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<div class="container">
    <h4>Project & Components</h4>
    
    <form class="well form-horizontal">
        <fieldset>
        
            <label>Project Name</label>
            <br>
            <input type="text" name = "projectName">
            <br>
            <br>
            <label>Choose Component</label>
            <br>
            <select class="form-control selectpicker">
                <option  selected>-- Choose Component --</option>
                <?php foreach ($components as $component) : ?>
                    <option><?php echo $component['component_name']; ?> </option>
                <?php endforeach; ?>
            </select>
            <br>
            <br>
            <br>      
            <label>Choose Notification Option</label>
            <br>
            <select class="form-control selectpicker">
                <option  selected>-- Choose Notification Option --</option>
                <option>SMS</option>
                <option>E-Mail</option>
            </select>
             <br>
             <br>
             <br>       

            <!-- Button -->
                <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                <button name = "submit" type="submit" class="btn btn-secondary" value = "submit" >Submit</button>
                </div>
                </div>
        </fieldset>
    </form>
</div>

<?php include('templates/footer.php'); ?>   

</html>