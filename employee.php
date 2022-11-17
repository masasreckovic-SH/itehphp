<?php

include('config/db_connect.php');

if (isset($_GET['id'])) {
    $employeeid = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "SELECT * FROM employee WHERE id='$employeeid'";
    $result = mysqli_query($conn, $query);
    $employee = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    $query = "SELECT * FROM company WHERE id={$employee['companyid']}";
    $result = mysqli_query($conn, $query);
    $company = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
}

if (isset($_POST['delete'])) {
    $employeeid = mysqli_real_escape_string($conn, $_POST['employeeid']);
    $companyid = mysqli_real_escape_string($conn, $_POST['companyid']);

    $query = "DELETE FROM employee WHERE id = $employeeid AND companyid = $companyid";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php if ($employee == null) : ?>

    <h1 class="center">There is no such employee in database!</h1>
    <div class="center">
        <a href="index.php" class="btn center amber accent-2">Return</a>
    </div>

<?php else : ?>

    <div class="container center">
        <div class="card z-depth-0 radius-card" style="padding-bottom: 30px;">
            <img src="<?php echo $company['img']; ?>" alt="icon" class="icon-card">
            <h3><?php echo $employee['name']; ?></h3>
            <h4>Works at <?php echo $company['name']; ?></h4>
            <h4>as <?php echo $employee['position']; ?></h4>
            <h5>Born in <?php echo $employee['year']; ?></h5>
            <h5>From <?php echo $employee['nationality']; ?></h5>


            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="padding-top:20px">
                <input type="hidden" name="employeeid" value="<?php echo $employeeid; ?>">
                <input type="hidden" name="companyid" value="<?php echo $company['id']; ?>">
                <input type="submit" name="delete" value="delete" class="btn center amber darken-2">
            </form>

        </div>
    </div>

<?php endif; ?>

<?php include('templates/footer.php'); ?>

</html>