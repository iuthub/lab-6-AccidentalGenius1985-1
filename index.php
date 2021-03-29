<?php
    $name="";
    $email="";
    $username="";
    $password="";
    $passwordConfirmed="";
    $dateOfBirth="";
    $gender="";
    $maritalStatus="";
    $address="";
    $city="";
    $postalCode="";
    $homePhone="";
    $mobilePhone="";
    $creditCardNumber="";
    $creditCardExpiryDate="";
    $monthlySalary="";
    $webSiteURL="";
    $overallGPA="";

    $isNameValid = true;
    $isEmailValid = true;
    $isUsernameValid = true;
    $isPasswordValid = true;
    $isPasswordConfirmedValid = true;
    $isDateOfBirthValid = true;
    $isGenderValid = true;
    $isMaritalStatusValid = true;
    $isAddressValid=true;
    $isCityValid=true;
    $isPostalCodeValid=true;
    $isHomePhoneValid=true;
    $isMobilePhoneValid=true;
    $isCreditCardNumberValid=true;
    $isCreditCardExpiryDateValid=true;
    $isMonthlySalaryValid=true;
    $isWebSiteURLValid=true;
    $isOverallGPAValid=true;

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $passwordConfirmed = $_REQUEST['passwordConfirmation'];
        $dateOfBirth = $_REQUEST['dateOfBirth'];
        $gender = $_REQUEST['gender'];
        $maritalStatus = $_REQUEST['maritalStatus'];
        $address = $_REQUEST['address'];
        $city = $_REQUEST['city'];
        $postalCode = $_REQUEST['postalCode'];
        $homePhone = $_REQUEST['homePhone'];
        $mobilePhone = $_REQUEST['mobilePhone'];
        $creditCardNumber = $_REQUEST['creditCardNumber'];
        $creditCardExpiryDate = $_REQUEST['creditCardExpiryDate'];
        $monthlySalary = $_REQUEST['monthlySalary'];
        $webSiteURL = $_REQUEST['webSiteURL'];
        $overallGPA = $_REQUEST['overallGPA'];

        $isNameValid = preg_match("/^[a-z]{2,}$/i",$name);
        $isEmailValid = preg_match("/.*@.*/",$email);
        $isUsernameValid = preg_match("/.{5,}/",$username);
        $isPasswordValid = preg_match("/.{8,}/",$password);
        $isPasswordConfirmedValid = ($password == $passwordConfirmed);
        $isDateOfBirthValid = preg_match("/\d{2}\.\d{2}\.\d{4}/",$dateOfBirth);
        $isGenderValid = preg_match("/\b(Male|Female)\b/",$gender);
        $isMaritalStatusValid = preg_match("/\b(Single|Married|Divorced|Widowed)\b/",$maritalStatus);
        $isAddressValid = preg_match("/.+/",$address);
        $isCityValid = preg_match("/.+/",$city);
        $isPostalCodeValid = preg_match("/\d{6}/",$postalCode);
        $isHomePhoneValid = preg_match("/\d{9}/",$homePhone);
        $isMobilePhoneValid = preg_match("/\d{9}/",$mobilePhone);
        $isCreditCardNumberValid = preg_match("/\d{16}/",$creditCardNumber);
        $isCreditCardExpiryDateValid = preg_match("/\d{2}\.\d{2}\.\d{4}/",$creditCardExpiryDate);
        $isMonthlySalaryValid = preg_match("/UZS [\d]*\.\d{2}/",$monthlySalary);
        $isWebSiteURLValid = preg_match("/https:\/\/www\..*\.[a-z]{2,5}/",$webSiteURL);
        $isOverallGPAValid = preg_match("/\b(\d\.\d)\b/",$overallGPA) && (strlen($overallGPA)==3) && (floatval($overallGPA)<=4.5 && floatval($overallGPA)>=0);
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="webpage/style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<h1>Registration Form</h1>

		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
        <form action="index.php" method="post">
		<dl>
            <!--Name-->
            <div class="labelFieldPair">
			<dt><label for="name" class="form-label">Name</label></dt>
			<dd>
				<input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
                <p class="invalid">
                <?php if(!$isNameValid) { print("Name must be at least 2 characters long and must contain only alphabets");} ?>
                </p>
            </dd>
            </div>
             <!--Email-->
            <div class="labelFieldPair">
			<dt><label for="email" class="form-label">Email</label></dt>
			<dd>
				<input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email">
                <p class="invalid">
                <?php if(!$isEmailValid) { print("Please enter proper email");} ?>
                </p>
            </dd>
            </div>
             <!--Username-->
            <div class="labelFieldPair">
			<dt><label for="username" class="form-label">Username</label></dt>
			<dd>
				<input type="text" class="form-control" id="username" name="username" placeholder="Enter your Username">
                <p class="invalid">
                <?php if(!$isUsernameValid) { print("The username must be at least 5 characters long");} ?>
                </p>
            </dd>
            </div>
             <!--Password-->
            <div class="labelFieldPair">
			<dt><label for="password" class="form-label">Password</label></dt>
			<dd>
				<input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password">
                <p class="invalid">
                <?php if(!$isPasswordValid) { print("The password must be at least 8 characters long");} ?>
                </p>
            </dd>
            </div>
             <!--Password confirmation-->
            <div class="labelFieldPair">
			<dt><label for="passwordConfirmation" class="form-label">Confirm Password</label></dt>
			<dd>
				<input type="password" class="form-control" id="passwordConfirmation" name="passwordConfirmation" placeholder="Re enter Password">
                <p class="invalid">
                <?php if(!$isPasswordConfirmedValid) { print("Your password does not match. Please re enter");} ?>
                </p>
            </dd>
            </div>
            <!--Date of birth-->
            <div class="labelFieldPair">
			<dt><label for="dateOfBirth" class="form-label">Date Of Birth</label></dt>
			<dd>
				<input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="Enter your date of birth">
                <p class="invalid">
                <?php if(!$isDateOfBirthValid) { print("Date of birth must be in dd.mm.yyyy format");} ?>
                </p>
            </dd>
            </div>
            <!--Gender-->
            <div class="labelFieldPair">
			<dt><label for="gender" class="form-label">Gender</label></dt>
			<dd>
				<input type="text" class="form-control" id="gender" name="gender" placeholder="Enter your gender">
                <p class="invalid">
                <?php if(!$isGenderValid) { print("Only Male and Female is accepted");} ?>
                </p>
            </dd>
            </div>
            <!--Marital Status-->
            <div class="labelFieldPair">
			<dt><label for="maritalStatus" class="form-label">Marital Status</label></dt>
			<dd>
				<input type="text" class="form-control" id="maritalStatus" name="maritalStatus" placeholder="Enter your marital status">
                <p class="invalid">
                <?php if(!$isMaritalStatusValid) { print("Only Single, Married, Divorced, Widowed are accepted");} ?>
                </p>
            </dd>
            </div>
            <!--Address-->
            <div class="labelFieldPair">
			<dt><label for="address" class="form-label">Address</label></dt>
			<dd>
				<input type="text" class="form-control" id="address" name="address" placeholder="Enter your address">
                <p class="invalid">
                <?php if(!$isAddressValid) { print("This is a required field");} ?>
                </p>
            </dd>
            </div>
            <!--City-->
            <div class="labelFieldPair">
			<dt><label for="city" class="form-label">City</label></dt>
			<dd>
				<input type="text" class="form-control" id="city" name="city" placeholder="Enter your city">
                <p class="invalid">
                <?php if(!$isCityValid) { print("This is a required field");} ?>
                </p>
            </dd>
            </div>
            <!--Postal Code-->
            <div class="labelFieldPair">
			<dt><label for="postalCode" class="form-label">Postal Code</label></dt>
			<dd>
				<input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Enter your postal code">
                <p class="invalid">
                <?php if(!$isPostalCodeValid) { print("Postal code must be 6 digits");} ?>
                </p>
            </dd>
            </div>
            <!--Home Phone-->
            <div class="labelFieldPair">
			<dt><label for="homePhone" class="form-label">Home Phone</label></dt>
			<dd>
				<input type="text" class="form-control" id="homePhone" name="homePhone" placeholder="Enter your home phone number">
                <p class="invalid">
                <?php if(!$isHomePhoneValid) { print("Home phone number must be 9 digits");} ?>
                </p>
            </dd>
            </div>
            <!--Mobile Phone-->
            <div class="labelFieldPair">
			<dt><label for="mobilePhone" class="form-label">Mobile Phone</label></dt>
			<dd>
				<input type="text" class="form-control" id="mobilePhone" name="mobilePhone" placeholder="Enter your mobile phone number">
                <p class="invalid">
                <?php if(!$isHomePhoneValid) { print("Mobile phone number must be 9 digits");} ?>
                </p>
            </dd>
            </div>
            <!--Credit Card Number-->
            <div class="labelFieldPair">
			<dt><label for="creditCardNumber" class="form-label">Credit Card Number</label></dt>
			<dd>
				<input type="text" class="form-control" id="creditCardNumber" name="creditCardNumber" placeholder="Enter your credit card number">
                <p class="invalid">
                <?php if(!$isCreditCardNumberValid) { print("Credit card number must be 16 digits");} ?>
                </p>
            </dd>
            </div>
            <!--Credit Card Expiry Date-->
            <div class="labelFieldPair">
			<dt><label for="creditCardExpiryDate" class="form-label">Credit Card Expiry Date</label></dt>
			<dd>
				<input type="text" class="form-control" id="creditCardExpiryDate" name="creditCardExpiryDate" placeholder="Enter your credit card expiry date">
                <p class="invalid">
                <?php if(!$isCreditCardExpiryDateValid) { print("Credit Card Expiry Date must be in the form dd.mm.yyyy");} ?>
                </p>
            </dd>
            </div>
            <!--Monthly salary-->
            <div class="labelFieldPair">
			<dt><label for="monthlySalary" class="form-label">Monthly Salary</label></dt>
			<dd>
				<input type="text" class="form-control" id="monthlySalary" name="monthlySalary" placeholder="Enter your monthly salary">
                <p class="invalid">
                <?php if(!$isMonthlySalaryValid) { print("Monthly salary must be in the format UZS dddddd.dd");} ?>
                </p>
            </dd>
            </div>
            <!--Web site URL-->
            <div class="labelFieldPair">
			<dt><label for="webSiteURL" class="form-label">Web Site URL</label></dt>
			<dd>
				<input type="text" class="form-control" id="webSiteURL" name="webSiteURL" placeholder="Enter your web site URL">
                <p class="invalid">
                <?php if(!$isWebSiteURLValid) { print("Web site URL must match URL format");} ?>
                </p>
            </dd>
            </div>
            <!--Overall GPA-->
            <div class="labelFieldPair">
			<dt><label for="overallGPA" class="form-label">Overall GPA</label></dt>
			<dd>
				<input type="text" class="form-control" id="overallGPA" name="overallGPA" placeholder="Enter your overall GPA">
                <p class="invalid">
                <?php if(!$isOverallGPAValid) { print("Overall GPA must be number from 0.0 to 4.5");} ?>
                </p>
            </dd>
            </div>
		</dl>
		
		<div>
			Register
		</div>
        <div class="button">
            <dd>
                <input type="submit" class="submitButton" value="Submit">
            </dd>
        </div>
</form>
	</body>
</html>