<?php
/* 
DB name: todo

Create table 
------------
CREATE TABLE `todos` (
  `tid` int(11) NOT NULL,
  `tname` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `date` date NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

setprimary key
--------------
ALTER TABLE `todos`
  ADD PRIMARY KEY (`tid`);

Set Autoincrement
-----------------
ALTER TABLE `todos`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

Insert Data
-----------
INSERT INTO `todos` (`tid`, `tname`, `detail`, `date`, `status`) VALUES (NULL, 'test', 'This is test task detilas', '2018-11-01', '1'), (NULL, 'test2', 'This is test task detilas 2', '2018-11-08', '1') 
s
*/
$servername = "localhost";
$username = "root";
$password = "";
$database = "todo";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$getData = 'select * from todos';
$result = $conn->query($getData);

if ($result->num_rows > 0) {
    // output data of each row ?>
     <table border="1">
     	<thead>
     		<tr>
     			<td>No</td>
     			<td>Title</td>
     			<td>Details</td>
     			<td>Date</td>
     			<td>Status</td>
     		</tr>
     	</thead>
     	<tbody>
     		<?php
     		$no = 1;
     		while($row = $result->fetch_assoc()) {?>
     		<tr>
     			<td><?php echo $no;?></td>
     			<td><?php echo $row['tname'];?></td>
     			<td><?php echo $row['detail'];?></td>
     			<td><?php echo $row['date'];?></td>
     			<td><?php echo $row['status'];?></td>
     		</tr>
           <?php
           $no ++; } ?>
     	</tbody>
     </table>
<?php } else {
    echo "0 results";
}
