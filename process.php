<?php
date_default_timezone_set('Africa/Lagos');
session_start();

include "classes/dbConnect.php";

$dbConnect = new dbConnect();

// returns banks
function getBanks()
{
    global $dbConnect;
    $sql = sprintf("SELECT bank, sortcode, nsortcode, bankstatement FROM dbCredits.Banks order by bank");
    $res = $dbConnect->get_data($sql);

    $val = "";

    if (is_array($res)) {
        foreach ($res as $item) {
            $val .= "<option value = '" . $item['nsortcode'] . "'>" . $item['bank'] . "</option>";
        }
    }

    return $val;
}

// returns the states in nigeria on load of the page
function get_state()
{
    global $dbConnect;
    $sql = sprintf("SELECT * FROM dbCredits.State");
    $res = $dbConnect->get_data($sql);

    $state_option = '';
    foreach ($res as $state) {
        $state_option .= "<option value = '" . $state['st_code'] . "'>" . $state['st_name'] . "</option>";
    }

    $val = "";
    $val .= "<option value = 'Lagos State'>Lagos State</option>";

    $str = file_get_contents('state.json');
    $json = json_decode($str, true);
    // echo '<pre>' . print_r($json, true) . '</pre>';

    foreach ($json as $row) {
        $val .= "<option value = '" . $row['state']['name'] . "'>" . $row['state']['name'] . "</option>";
        // $val .= "<option value = '".$row['st_code']."'>".$row['st_name']."</option>";
    }
    return $state_option;
}

// returns local govts for the state passed to it
function getLGA($state)
{
    global $dbConnect;
    $sql = sprintf("SELECT st_name FROM dbCredits.State where st_code = %s", $dbConnect->makeSQLStrings($state));
    $res = $dbConnect->get_data($sql);

    $val = "";
    $str = file_get_contents('state.json');
    $json = json_decode($str, true);
    // echo '<pre>' . print_r($res, true) . '</pre>';

    if ($res[0]['st_name'] == 'Abuja') {
        $state_sub = 'CT';
    } else {
        $state_sub = substr($res[0]['st_name'], 1);
    }

    foreach ($json as $row) {
        if (strpos($row['state']['name'], $state_sub) == 0) {
        } else {
            foreach ($row['state']['locals']  as $item) {
                $val .= "<option value = '" . $item['name'] . "'>" . $item['name'] . "</option>";
            }
        }
    }

    return $val;
}

// returns investment rating
function getInvestRating($amount, $tenure)
{
    global $dbConnect;
    $sql = sprintf("SELECT * FROM dbCredits.Investment_Rate where (%s BETWEEN Min_Amount AND Max_Amount) and Days = %s", $dbConnect->makeSQLStrings($amount), $dbConnect->makeSQLStrings($tenure));
    $res = $dbConnect->get_data($sql);

    if (is_array($res)) {
        return $res[0]['Rating'];
    } else {
        return false;
    }
}

// validates bvn passed to it
function bvn_request($bvn)
{
    global $dbConnect;

    $sql = sprintf("Select ifnull((Select 'Yes' from dbCredits.BlackList_BVN where BVN=%s order by ID desc limit 1),'No') as 'Tester'", $dbConnect->makeSQLStrings(trim($bvn)));
    $result = $dbConnect->get_data($sql);

    if ($result[0]['Tester'] == 'Yes') {
        return '{"status": "false"}';
    } else {
        return  '{"status": "true"}';
    }
}

// insert the appliction record with personal details data and returns a success or failed response
function insert_personal($title, $surname, $firstname, $middlename, $email, $phone, $dependents, $maritalStatus, $country, $state, $lga, $education, $referralCode, $aboutPage, $houseAddress, $idtype, $idnumber, $issuedate, $expdate, $govID, $nextKinName, $nextKinRelationship, $nextKinPhone, $bvn)
{
    global $dbConnect;

    $category = "individual";
    $status = 0;

    $sql = sprintf("SELECT * FROM dbCredits.Deposits_WebApp where BVN = %s", $dbConnect->makeSQLStrings($bvn));
    $res = $dbConnect->get_data($sql);

    if (is_array($res)) {

        $sql = sprintf(
            "UPDATE dbCredits.Deposits_WebApp SET Title = %s, Surname = %s, Firstname = %s, Middlename = %s, Email = %s, Phone = %s, 
            Dependents = %s, Marital_Status = %s, Country = %s, States = %s, LGA = %s, Education = %s, Referral_Code = %s, About_Page = %s, Residential_Address = %s, IDType = %s, IDNumber = %s, 
            Issue_Date = %s, Expire_Date = %s, Govt_ID = %s, NextKinName = %s, NextKinRelationship = %s, NextKinNumber = %s, BVN = %s",
            $dbConnect->makeSQLStrings($title),
            $dbConnect->makeSQLStrings($surname),
            $dbConnect->makeSQLStrings($firstname),
            $dbConnect->makeSQLStrings($middlename),
            $dbConnect->makeSQLStrings($email),
            $dbConnect->makeSQLStrings($phone),
            $dbConnect->makeSQLStrings($dependents),
            $dbConnect->makeSQLStrings($maritalStatus),
            $dbConnect->makeSQLStrings($country),
            $dbConnect->makeSQLStrings($state),
            $dbConnect->makeSQLStrings($lga),
            $dbConnect->makeSQLStrings($education),
            $dbConnect->makeSQLStrings($referralCode),
            $dbConnect->makeSQLStrings($aboutPage),
            $dbConnect->makeSQLStrings($houseAddress),
            $dbConnect->makeSQLStrings($idtype),
            $dbConnect->makeSQLStrings($idnumber),
            $dbConnect->makeSQLStrings($issuedate),
            $dbConnect->makeSQLStrings($expdate),
            $dbConnect->makeSQLStrings($govID),
            $dbConnect->makeSQLStrings($nextKinName),
            $dbConnect->makeSQLStrings($nextKinRelationship),
            $dbConnect->makeSQLStrings($nextKinPhone),
            $dbConnect->makeSQLStrings($bvn)
        );
        // echo $sql;
        $res = $dbConnect->insert_data($sql); // make record update

        return true;
    } else {
        $sql = sprintf(
            "INSERT INTO dbCredits.Deposits_WebApp (Title, DateCreated, Surname, Firstname, Middlename, Email, Category, Phone, Dependents, Marital_Status, Country, States, LGA, Education, Referral_Code, About_Page, Residential_Address, IDType, IDNumber, Issue_Date, Expire_Date, Status, Govt_ID, NextKinName, NextKinRelationship, NextKinNumber, BVN) VALUES (%s,now(),%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
            $dbConnect->makeSQLStrings($title),
            $dbConnect->makeSQLStrings($surname),
            $dbConnect->makeSQLStrings($firstname),
            $dbConnect->makeSQLStrings($middlename),
            $dbConnect->makeSQLStrings($email),
            $dbConnect->makeSQLStrings($category),
            $dbConnect->makeSQLStrings($phone),
            $dbConnect->makeSQLStrings($dependents),
            $dbConnect->makeSQLStrings($maritalStatus),
            $dbConnect->makeSQLStrings($country),
            $dbConnect->makeSQLStrings($state),
            $dbConnect->makeSQLStrings($lga),
            $dbConnect->makeSQLStrings($education),
            $dbConnect->makeSQLStrings($referralCode),
            $dbConnect->makeSQLStrings($aboutPage),
            $dbConnect->makeSQLStrings($houseAddress),
            $dbConnect->makeSQLStrings($idtype),
            $dbConnect->makeSQLStrings($idnumber),
            $dbConnect->makeSQLStrings($issuedate),
            $dbConnect->makeSQLStrings($expdate),
            $dbConnect->makeSQLStrings($status),
            $dbConnect->makeSQLStrings($govID),
            $dbConnect->makeSQLStrings($nextKinName),
            $dbConnect->makeSQLStrings($nextKinRelationship),
            $dbConnect->makeSQLStrings($nextKinPhone),
            $dbConnect->makeSQLStrings($bvn)
        );
        $res = $dbConnect->insert_data($sql); // make record update

        return true;

    }
}

// insert investment details
function insert_investment(
    $employer,
    $employmentdate,
    $offical_email,
    $employer_address,
    $tenure,
    $investment_amount,
    $rate,
    $investment_payment,
    $bank,
    $accountType,
    $accountNo,
    $income,
    $staffid,
    $utilityBill,
    $bvn
) {
    global $dbConnect;

    $sql = sprintf("SELECT * FROM dbCredits.Deposits_WebApp where BVN = %s", $dbConnect->makeSQLStrings($bvn));
    $res = $dbConnect->get_data($sql);

    if (is_array($res)) {

        $sql = sprintf(
            "UPDATE dbCredits.Deposits_WebApp set Employer_Name = %s, Employment_Date = %s, Official_Email = %s, Employer_Address = %s, Investment_Tenor = %s, Investment_Amount = %s, Interest_Rate = %s, Investment_Payment = %s, 
            Bank = %s, Account_Type = %s, Account_Number = %s, Net_Income = %s, Staff_ID = %s, Utility_Bill = %s WHERE BVN = %s",
            $dbConnect->makeSQLStrings($employer),
            $dbConnect->makeSQLStrings($employmentdate),
            $dbConnect->makeSQLStrings($offical_email),
            $dbConnect->makeSQLStrings($employer_address),
            $dbConnect->makeSQLStrings($tenure),
            $dbConnect->makeSQLStrings($investment_amount),
            $dbConnect->makeSQLStrings($rate),
            $dbConnect->makeSQLStrings($investment_payment),
            $dbConnect->makeSQLStrings($bank),
            $dbConnect->makeSQLStrings($accountType),
            $dbConnect->makeSQLStrings($accountNo),
            $dbConnect->makeSQLStrings($income),
            $dbConnect->makeSQLStrings($staffid),
            $dbConnect->makeSQLStrings($utilityBill),
            $dbConnect->makeSQLStrings($bvn)
        );

        $res = $dbConnect->insert_data($sql);

        return true;
    }
}

function curl_function($url, $param)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "BVNumber=$param");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $res = curl_exec($ch);

    curl_close($ch);
    return $res;
}

// Function to get the client IP address
function get_client_ip()
{
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if ($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (@$_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if ($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if ($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


// switch statement to decide which function to call based on the post action data
switch ($_POST['action']) {
    case 'get_state':
        echo get_state();
        break;

    case 'getBanks':
        echo getBanks();
        break;

    case 'getLGA':
        echo getLGA($_POST['lga']);
        break;

    case 'getInvestRating':
        echo getInvestRating($_POST['investamount'], $_POST['tenure']);
        break;

    case 'bvn_request':
        echo bvn_request($_POST['bvn']);
        break;

    case 'insert_personal':
        echo insert_personal(
            $_POST['title'],
            $_POST['lastname'],
            $_POST['firstname'],
            $_POST['middlename'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['dependents'],
            $_POST['maritalStatus'],
            $_POST['country'],
            $_POST['state'],
            $_POST['lga'],
            $_POST['education'],
            $_POST['referralCode'],
            $_POST['aboutPage'],
            $_POST['houseAddress'],
            $_POST['idtype'],
            $_POST['idnumber'],
            $_POST['issuedate'],
            $_POST['expdate'],
            $_POST['govID'],
            $_POST['nextKinName'],
            $_POST['nextKinRelationship'],
            $_POST['nextKinPhone'],
            $_POST['bvn']
        );
        break;

    case 'insert_investment':
        echo insert_investment(
            $_POST['employer'],
            $_POST['employmentdate'],
            $_POST['offical_email'],
            $_POST['employer_address'],
            $_POST['tenure'],
            $_POST['investment_amount'],
            $_POST['rate'],
            $_POST['investment_payment'],
            $_POST['bank'],
            $_POST['accttype'],
            $_POST['acctnumber'],
            $_POST['income'],
            $_POST['staffID'],
            $_POST['utilityBill'],
            $_POST['bvn']
        );
        break;

    default:

        break;
}
