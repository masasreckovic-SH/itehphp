<?php

include('config/db_connect.php');

$query = "SELECT * FROM company ORDER BY name ASC";
$result = mysqli_query($conn, $query);
$companies = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);


?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container">
    <div class="row">
        <?php foreach ($companies as $company) : ?>
            <div class="col s12 m6 l4">
                <div class="card z-depth-0 radius-card">
                    <img src="<?php echo $company['img']; ?>" alt="company" class="icon-card">
                    <div class="card-content center">
                        <h5><?php echo htmlspecialchars($company['name']); ?></h5>
                    </div>
                    <div class="card-action right-align radius-card">
                        <a href="company.php?id=<?php echo $company['id']; ?>" class="amber-text text-darken-2">
                            More Info
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php include('templates/footer.php'); ?>

</html>