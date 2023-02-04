<?php
$servername = "localhost";
$username = "root";
$password = "4Bro@^26";
$dbname = "myFirstDB";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
 
$sql = "SELECT id,firstname,lastname FROM MyGuests";
//$result = $conn->query($sql);
//$row=mysqli_fetch_assoc($result);
$id = $_POST["id"];

if ($result=mysqli_query($conn,$sql))
{
    // 一条条获取
    while ($row=mysqli_fetch_row($result))
    {
        if($row[0] == $id)
        {
            printf("%s %s",$row[1],$row[2]);
            echo "<br>";
            break;
        }
        //printf ("%s : %s",$row[0],$row[1]);
        //echo "<br>";
    }
    
    // 释放结果集合
    mysqli_free_result($result);
}

/* 
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 结果";
}
*/
$conn->close();
?>