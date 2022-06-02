<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_database";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO student_info (id,hall, regno, session, classroll, examroll, name, department)
VALUES (1,'smhall', '2018825550', '2018-19', '1101', '1001', 'mohsin', 'iit'),
(2,'smhall', '2018825551', '2018-19', '1102', '1002', 'fahim', 'iit'),
(3, 'smhall', '2018825552', '2018-19', '1103', '1003', 'mahtab', 'iit'),
(4, 'smhall', '2018825553', '2018-19', '1104', '1004', 'siam', 'iit'),
(5,'smhall', '2018825554', '2018-19', '1105', '1005', 'fahad', 'iit'),
(6, 'smhall', '2018825555', '2018-19', '1106', '1006', 'hasnain', 'iit'),
(7, 'sufia' , '2018825556', '2018-19', '1107', '1007', 'noshin', 'iit'),
(8, 'smhall', '2018825557', '2018-19', '1108', '1008', 'sakib', 'iit'),
(9, 'smhall', '2018825558', '2018-19', '1109', '1009', 'jafar', 'iit'),
(10, 'smhall', '2018825559', '2018-19', '1110', '1010', 'mushfiq', 'iit'),
(11, 'smhall', '2018825560', '2018-19', '1111', '1011', 'kazi', 'iit'),
(12,'smhall', '2018825561', '2018-19', '1112', '1012', 'arif', 'iit'),
(13, 'smhall', '2018825562', '2018-19', '1113', '1013', 'sobuz', 'iit'),
(14, 'smhall', '2018825563', '2018-19', '1114', '1014', 'musta', 'iit'),
(15, 'smhall', '2018825564', '2018-19', '1115', '1015', 'jitesh', 'iit'),
(16, 'smhall', '2018825565', '2018-19', '1116', '1016', 'khairul', 'iit'),
(17, 'smhall', '2018825566', '2018-19', '1117', '1017', 'rahat', 'iit'),
(18, 'smhall', '2018825567', '2018-19', '1118', '1018', 'jubaer', 'iit'),
(19, 'smhall', '2018825568', '2018-19', '1119', '1019', 'muktar', 'iit'),
(20, 'smhall', '2018825569', '2018-19', '1120', '1020', 'alif', 'iit'),
(21, 'smhall', '2018825570', '2018-19', '1121', '1021', 'piash', 'iit'),
(22, 'smhall', '2018825571', '2018-19', '1122', '1022', 'saad', 'iit'),
(23, 'smhall', '2018825572', '2018-19', '1123', '1023', 'nahid', 'iit'),
(24, 'smhall', '2018825573', '2018-19', '1124', '1024', 'sikdar', 'iit'),
(25, 'smhall', '2018825574', '2018-19', '1125', '1025', 'shafiq', 'iit'),
(26, 'smhall', '2018825575', '2018-19', '1126', '1026', 'rudro', 'iit'),
(27, 'smhall', '2018825576', '2018-19', '1127', '1027', 'tahmeed', 'iit'),
(28, 'sufia', '2018825577' , '2018-19', '1128', '1028', 'tasmia', 'iit')

";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?> 