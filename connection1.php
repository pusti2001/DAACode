<?php
    $servername="localhost";
    $password="Sheth@1234";
    $username="root";
    $database="mydata";

    $conn=new mysqli($servername,$username,$password,$database);

    if($conn->connect_error){
        die("Connection failed");
    }
    echo "Connection successful";

    /*$sql="insert into student_data(studid,studname,studdiv) values('1006','Tanya Mistry','A');";
    $result=$conn->query($sql);

    if ($result==true){
        echo "New data inserted";
    }
    else{
        echo "Error";
    }*/

    /*$sql="select * from student_data";

    $result=$conn->query($sql);

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            echo $row["studid"]." ".$row["studname"]." ".$row["studdiv"]."<br/>";
        }
    }
    else
        echo "No results";*/

    $sql="delete from student_data where studid=1001";

    $result=$conn->query($sql);

    if($result==true){
        echo "Deleted successfully";
    }
    else{
        echo "Error occured";
    }

    $conn->close();
?>