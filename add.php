<?php

include('config/db_connect.php');
include('models/Employee.php');
include('models/Company.php');

$name = $company = $position = $year = $nationality = '';

$errors = [
    'name' => '', 'company' => '', 'position' => '',
    'year' => '', 'nationality' => ''
];

if (isset($_POST['add'])) {

    if (empty($_POST['name'])) {
        $errors['name'] = 'Employees name is required!';
    } else {
        $name = $_POST['name'];
    }

    include('ajax/companies.php');
    if (empty($_POST['company'])) {
        $errors['company'] = 'Company is required!';
    } else {
        $company = $_POST['company'];
        if (!in_array($company, $companies)) {
            $errors['company'] = 'No such company exists!';
            $company = '';
        }
    }

    if (empty($_POST['position'])) {
        $errors['position'] = 'Employees position is required!';
    } else {
        $position = $_POST['position'];
    }

    if (empty($_POST['year'])) {
        $errors['year'] = 'Year of birth is required!';
    } else {
        $yearStr = $_POST['year'];
        if (strlen($yearStr) != 4 || intval($yearStr) == 1) {
            $errors['year'] = 'Wrong input for year!';
        } else {
            $year = intval($yearStr);
            if ($year < 1900 || $year > date("Y")) {
                $errors['year'] = 'Wrong input for year!';
            }
        }
    }

    include('ajax/countries.php');
    if (empty($_POST['nationality'])) {
        $errors['nationality'] = 'Employees nationality is required!';
    } else {
        $nationality = $_POST['nationality'];
        if (!in_array($nationality, $countries)) {
            $errors['nationality'] = 'No such country exists!';
            $nationality = '';
        }
    }


    if (!array_filter($errors)) {
        $companyid = returnCompanyId($_POST['company']);
        $name = $_POST['name'];
        $position = $_POST['position'];
        $year = $_POST['year'];
        $nationality = $_POST['nationality'];


        $newEmployee = new Employee(
            null,
            $companyid,
            $name,
            $position,
            $year,
            $nationality,
        );

        $newEmployee->createEmployee();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container">

    <form style="margin-top:50px;" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="white form" method="POST">
        <label for="name">Employees name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
        <div class="red-text"><?php echo $errors['name']; ?></div>

        <label for="company">Company:</label>
        <input type="text" name="company" value="<?php echo htmlspecialchars($company) ?>" onkeyup="suggestCompany(this.value)">
        <div class="red-text"><?php echo $errors['company']; ?></div>
        <p><span id="companySuggest"></span></p>

        <label for="position">Position:</label>
        <input type="text" name="position" value="<?php echo htmlspecialchars($position) ?>" onkeyup="suggestPosition(this.value)">
        <div class="red-text"><?php echo $errors['position']; ?></div>
        <p><span id="positionSuggest"></span></p>

        <label for="year">Year of birth:</label>
        <input type="text" name="year" value="<?php echo htmlspecialchars($year) ?>">
        <div class="red-text"><?php echo $errors['year']; ?></div>

        <label for="nationality">Employees nationality:</label>
        <input type="text" name="nationality" value="<?php echo htmlspecialchars($nationality) ?>" onkeyup="suggestNationality(this.value)">
        <div class="red-text"><?php echo $errors['nationality']; ?></div>
        <p><span id="nationalitySuggest"></span></p>

        <div class="center">
            <input type="submit" name="add" value="Submit an employee" class="btn amber accent-2 z-depth-0">
        </div>
    </form>

</section>

<?php include('templates/footer.php'); ?>

<script>
    function suggestCompany(str = "") {
        if (str.length == 0) {
            document.getElementById("companySuggest").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("companySuggest").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/companies.php?query=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<script>
    function suggestPosition(str = "") {
        if (str.length == 0) {
            document.getElementById("positionSuggest").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("positionSuggest").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/positions.php?query=" + str, true);
            xmlhttp.send();
        }
    }
</script>

<script>
    function suggestNationality(str = "") {
        if (str.length == 0) {
            document.getElementById("nationalitySuggest").innerHTML = "";
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("nationalitySuggest").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "ajax/countries.php?query=" + str, true);
            xmlhttp.send();
        }
    }
</script>

</html>