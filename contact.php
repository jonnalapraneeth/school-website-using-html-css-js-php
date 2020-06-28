
<?php
$NameError="";
$EmailError="";
$PhoneError="";
$ChildError="";
require_once("DBCON.php");
if(isset($_POST["submit"])){
	if(empty($_POST["Name"])){
	$NameError="Name is Required";
}
else{
	$Name=Test_User_Input($_POST["Name"]);
	if(!preg_match("/^[A-Za-z. ]*$/",$Name)){
		$NameError="only upper case and lower case are allowed";
	}
}
		if(empty($_POST["email_id"])){
	$EmailError="Email is Required";
}
else{
	$Email=Test_User_Input($_POST["email_id"]);
}
		if(empty($_POST["phone_number"])){
	$PhoneError="Phone number is Required";
}
else{
	$Phone=Test_User_Input($_POST["phone_number"]);
}	
		if(empty($_POST["child_name"])){
	$ChildError="Child number  is Required";
}
else{
	$Child=Test_User_Input($_POST["child_name"]);
}
if(!empty($_POST["Name"])&&!empty($_POST["email_id"])&&!empty($_POST["phone_number"])&&!empty($_POST["child_name"])){
	if((preg_match("/^[A-Za-z. ]*$/",$Name)==true)){
		echo "<h2>your response</h2>";
		echo "Name: {$_POST["Name"]}<br>";
		echo "Email ID:{$_POST["email_id"]}<br>";
		echo "phone number: {$_POST["phone_number"]}<br>";
        echo "child name:{$_POST["child_name"]}<br>";
		echo "message:{$_POST["message"]}<br><br>";
	}

		$Name=$_POST["Name"];
		$Email=$_POST["email_id"];
		$Phone=$_POST["phone_number"];
		$Child=$_POST["child_name"];
		$Message=$_POST["message"];
		global $ConnectingDB;
		$sql= "INSERT INTO tableschool(name,emailid,phnum,childname,message)
		VALUES(:Nsme,:mailg,:pmun,:ciild,:sb)";
		$stmt =$ConnectingDB->prepare($sql);
		$stmt->bindvalue('Nsme',$Name);
		$stmt->bindvalue('mailg',$Email);
		$stmt->bindvalue('pmun',$Phone);
		$stmt->bindvalue('ciild',$Child);
		$stmt->bindvalue('sb',$Message);
		$Execute = $stmt->execute();
		if($Execute){
			echo "<h2>info has been added sucessfully</h2>";
		}
}
}
	function Test_User_Input($Data){
return $Data;
}
?>