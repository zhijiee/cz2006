<?php
include_once("../../DAO/mysql/FamilyProfileDAO.php");
include_once("validateEligibilityStatusController.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "GET") {
	if($_GET["action"]=="getCurrentInfo"){
		$id = mysqli_real_escape_string($mysql,$_SESSION['userNRIC']);
		$array = FamilyProfileDAO::getFamilyProfileDetails($mysql,$id);

		$final = array("data"=>$array);
		$json = json_encode($final);
		echo $json;
	}
}else{
	$id = mysqli_real_escape_string($mysql,$_SESSION['userNRIC']);
	if(FamilyProfileDAO::checkExist($mysql,$id)>0){
		if(FamilyProfileDAO::deleteFamilyProfile($mysql,$id)){
			//echo "ERROR";
		}
	}
	$familyProfile = new FamilyProfile();
	$familyProfile->setNric($_POST['nric']);
	$familyProfile->setContactNumber($_POST['contactnumber']);
	$familyProfile->setFullName($_POST['fullname']);
	$familyProfile->setAddress($_POST['address']);
	$familyProfile->setDateOfBirth($_POST['dateofbirth']);
	$familyProfile->setPostalCode($_POST['postalcode']);
	$familyProfile->setRelationship($_POST['relationships']);
	$familyProfile->setIncome($_POST['income']);
	$familyProfile->setHouseholdNum($_POST['household']);
	$familyProfile->setCitizenship($_POST['citizenship']);
	$familyProfile->setHDBOwnership($_POST['hdbOwnership']);
	$familyProfile->setOccupation($_POST['occupation']);
	$familyProfile->setMainApplicantnric($id);
	
	if(FamilyProfileDAO::createFamilyProfile($mysql,$familyProfile)==true){
		$eligibilitystatus = checkEligibility($mysql);
		$array=array('familyProfile','s',$eligibilitystatus);
		$_SESSION["fromWhere"] = $array;
		header("Location: ../../browseHDB.php");
	}else{
		$array=array('familyProfile','f');
		$_SESSION["fromWhere"] = $array;
		header("Location: ../../browseHDB.php");
	}
}
?>