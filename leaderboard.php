<?php
	require('config/config.php');
	require('config/db.php');
	session_start();

	// Create Query
	$query = 'SELECT * FROM leaderboard ORDER BY points DESC';

	// Get Result
	$result = mysqli_query($mysqli, $query);

	// Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// Free Result
	mysqli_free_result($result);
	
	// Close Connection
	mysqli_close($mysqli);
	$class="";
	$bgcolor="";
?>

<?php include('templates/header.php'); ?>
	<div class="container">
		<h5 class="text-center">Description</h5>
		<table class="table table-hover text-center shadow">
			<thead>
			<tr>
				<th>0 >= Points <= 50</th>
				<th>50 >= Points <= 100</th>
				<th>100 >= Points <= 250</th>
				<th>250 >= Points <= 500</th>
				<th>500 >= Points <= 650</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><i class="fas fa-baby"></i></td>
				<td><i class="fas fa-robot"></i></td>
				<td><i class="fas fa-heart"></i></td>
				<td><i class="fas fa-crown"></i></td>
				<td><i class="fas fa-gem"></i></td>
			</tr>
			</tbody>
		</table>
		<hr>
	</div>
	
	<div class="container">
		<table class="table table-hover text-center shadow bg-light">
			<thead>
			<tr>
				<th>Icon</th>
				<th>Rank</th>
				<th>Name</th>
				<th>Roll No.</th>
				<th>Points</th>
			</tr>
			</thead>
			<tbody>
				<?php $i=1;
					foreach($posts as $post) : ?>
						<?php 
							$point=$post['points'];
							if ( $point>=0 && $point <=50 ) {
								$class="fas fa-baby";
								$bgcolor="#FA8072";
							} else if ( $point>50 && $point <=100 ) {
								$class="fas fa-robot";
								$bgcolor="#FFD700";
							} else if ( $point>100 && $point <=250 ) {
								$class="fas fa-heart";
								$bgcolor="#FAFAD2	";
							} else if ( $point>250 && $point <=500 ) {
								$class="fas fa-crown";
								$bgcolor="#ADFF2F";
							} else if ( $point>500 && $point <=650 ) {
								$class="fas fa-gem";
								$bgcolor="#E0FFFF";
							}
						?>
						<tr style="background: <?php echo $bgcolor ?>">
							<td><i class="<?php echo $class; ?>"></i></td>
							<td><?php echo $i++;?></td>
							<td><?php echo $post['name'] ?></td>
							<td><?php echo $post['rollno'] ?></td>
							<td><?php echo $post['points'] ?></td>
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php include('templates/footer.php'); ?>