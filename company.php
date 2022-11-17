<?php

include('config/db_connect.php');

if (isset($_GET['id'])) {
    $companyid = mysqli_real_escape_string($conn, $_GET['id']);
}

$query = "SELECT * FROM company WHERE id = $companyid";
$result = mysqli_query($conn, $query);
$company = mysqli_fetch_assoc($result);
mysqli_free_result($result);

$query = "SELECT * FROM employee WHERE companyid='$companyid'";
$result = mysqli_query($conn, $query);
$employees = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php if ($company == null) : ?>

    <h1 class="center">There is no company with that ID!</h1>
    <div class="center">
        <a href="index.php" class="btn center amber darken-2">Return</a>
    </div>

<?php else : ?>

    <div class="container center">
        <div class="card z-depth-0 radius-card" style="padding-bottom: 30px;">
            <img src="<?php echo $company['img']; ?>" alt="icon" class="icon-card">
            <h3><?php echo $company['name']; ?></h3>
            <h4>Industry: <?php echo $company['industry']; ?></h4>
            <h4>Headquarters: <?php echo $company['headquarters']; ?></h4>
            <h5>Founded by <?php echo $company['founder']; ?> in <?php echo $company['founded']; ?></h5>
            <h6>Number of employees: <?php echo $company['employees']; ?></h6>
        </div>
    </div>

    <?php if ($employees == null) { ?>

        <h6 class="center">No employees in database! </h6>

    <?php } else {; ?>

        <div class="container">
            <h5 class="center">Employees in database:</h5>
            <div class="row">
                <?php foreach ($employees as $employee) : ?>
                    <div class="col s12 m6 l4 xl3">
                        <div class="card z-depth-0 radius-card">
                            <img src="<?php echo $company['img']; ?>" alt="icon" class="icon-card">
                            <div class="card-content center">
                                <h5><?php echo htmlspecialchars($employee['name']); ?></h5>
                                <h6><?php echo htmlspecialchars($employee['position']); ?></h6>
                            </div>
                            <div class="card-action right-align radius-card">
                                <a href="employee.php?id=<?php echo $employee['id']; ?>" class="amber-text text-darken-2">
                                    More Info
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php }; ?>

<?php endif; ?>

<?php include('templates/footer.php'); ?>

</html>