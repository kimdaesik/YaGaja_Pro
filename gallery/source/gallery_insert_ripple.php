<?php
session_start();
include_once "../../common_lib/createLink_db.php";

$num = $_GET['num'];
$page = $_GET["page"];
$table = $_GET["table"];
$continent = $_GET["continent"];

$ripple_content = $_POST["ripple_content"];

if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $name=$_SESSION['name'];
}


if(empty($id)){
    echo ("
    <script>
    alert('로그인 후 이용하세요')
    history.go(-1)
    </script>
");
    exit();
}
$regist_day = date("Y-m-d (H:i)");


$sql="insert into gallery_ripple (id,parent,name,content,regist_day)";
$sql.="values('$id','$num','$name','$ripple_content','$regist_day')";

if(!mysqli_query($con, $sql)){
    echo "실패원인 : ".mysqli_error($con);
}


mysqli_close($con);

echo "<script>
  location.href='gallery_view.php?table=$table&num=$num&page=$page';
</script>";
?>








