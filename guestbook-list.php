<?php
require('config/config.php');
require('config/db.php');

//Create Query
$query = 'SELECT * FROM person';

// Get Result
$result = mysqli_query($conn, $query);

//Fetch Data
$persons = mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($persons);

//Free Result
mysqli_free_result($result);

//Close Connectiom
mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
	<div class="container">
    <br/>
		<h2>Person's Log</h2>
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Address</th>
                    <th scope="col">Log Date and Time</th>
                    </tr>
                </thead>
		
			<div class="well">
                <tbody>
                <?php foreach($persons as $person) : ?>
                    <tr>
                    <th scope="row"><?php echo $person['id'];?></th>
                    <td><?php echo $person['lname'];?></td>
                    <td><?php echo $person['fname'];?></td>
                    <td><?php echo $person['address'];?></td>
                    <td><?php echo $person['date'];?></td>
                    </tr>
                <?php endforeach; ?>   
                </tbody>
            </div>
        </table>
        <br/>
            <button type="button" class="btn btn-info btn-sm" onclick="document.location='index.php'">Add</button>
            <button type="button" class="btn btn-dark btn-sm float-sm-right" onclick="document.location='guestbook-login.php'">Logout</button>
            
</div>
<?php include('inc/footer.php'); ?>