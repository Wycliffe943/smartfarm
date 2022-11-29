<?php
   
    include ('config/db_connect.php');
    //write query for all pizzas
    $sql = 'SELECT * FROM sf_users ORDER BY created_at';

    // make query and get result
    $result = mysqli_query($conn, $sql);

    //fetch the resulting rows as an array
    $guys = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //best practice but not important: free result from memory
    mysqli_free_result($result); 

    //then close connection
    mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>

<h4 class = "center grey-text">Welcome To My Users Page</h4>


<div class="container">
    
        <?php foreach($guys as $guy): ?>
             <h5><?php echo htmlspecialchars($guy['first_name']. ' ' .$guy['last_name']); ?></h5>
        <?php endforeach; ?>
                   
    

</div>

<?php include('templates/footer.php'); ?>
    

</html>