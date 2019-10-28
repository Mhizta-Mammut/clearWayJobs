<?php
date_default_timezone_set('Africa/Nigeria');
require '../../process/constants/db_config.php';
require '../constants/check-login.php';
require '../../process/constants/uniques.php';


$postdate = date('F d, Y');
$job_id = ''.get_rand_numbers(10).'';
$title  = ucwords($_POST['title']);
$city  = ucwords($_POST['city']);
$country = $_POST['country'];
$category = $_POST['category'];
$type = $_POST['jobtype'];
$exp = $_POST['experience'];
$desc = ucfirst($_POST['description']);
$rec = ucfirst($_POST['requirements']);
$res = ucfirst($_POST['responsiblities']);
$deadline = $_POST['deadline'];



try{

$stmt = $conn->prepare("INSERT INTO jobs (job_id, title, city, country, category, type, experience, description, responsibility, requirements, company, date_posted, closing_date)
 VALUES (:jobid, :title, :city, :country, :category, :type, :experience, :description, :responsibility, :requirements, :company, :dateposted, :closingdate)");
$stmt->bindParam(':jobid', $job_id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':country', $country);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':experience', $exp);
$stmt->bindParam(':description', $desc);
$stmt->bindParam(':responsibility', $res);
$stmt->bindParam(':requirements', $rec);
$stmt->bindParam(':company', $myid);
$stmt->bindParam(':dateposted', $postdate);
$stmt->bindParam(':closingdate', $deadline);
$stmt->execute();

header("location:../post-job.php?r=9843");		  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

?>
