<?php 
 require_once('../config.php'); 
// echo $_settings->userdata('id');

$a = "SELECT p.*, concat(m.firstname, ' ', coalesce(concat(m.middlename,' '),''),m.lastname) 
as `name`, m.avatar, COALESCE((SELECT count(member_id) FROM `like_list` where post_id = p.id),0) as `likes`, 
COALESCE((SELECT count(member_id) FROM `comment_list` where post_id = p.id),0) as `comments` FROM post_list p 
inner join `member_list` m on p.member_id = m.id where p.member_id = m.id order by 
unix_timestamp(p.date_updated) desc";

$b= "SELECT * FROM post_list";

$con = mysqli_connect('localhost','root','','sns_db');
$res = mysqli_query($con,$a);
while($row = $res->fetch_array()){
    // echo $row['name'];
    echo $row[0];
    echo $row[1];
    echo $row[2];
    echo $row[3];
    echo $row[4];
}

