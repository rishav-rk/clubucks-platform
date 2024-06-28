<?php
include('../includes/header.php');
//2024
require('../includes/database.php');

if(!isset($_SESSION['loggedInStatus'])){

    $_SESSION['message'] = "Login to continue...";
    header('Location: ../login-system/index.php?req-page='.$_SERVER['PHP_SELF']);
    exit();
}
if (isset($_SESSION['message'])) {
  echo '<script>alert("' . $_SESSION['message'] . '");</script>';
  unset($_SESSION['message']);
}
?>
<main>
  <section id="years">
    <div class="container-md my-5">
      <h2>Event Calendar for Professional Studies</h2>
        <p class="lead text-muted">Fests for 2024</p>
    </div>
<div class="container">
  <div class="accordion" id="itfestsfor2024">
    <div class="accordion-item">
      <h2 class="accordion-header" id="2024">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#year-2024" aria-expanded="true" aria-controls="year-2024">2024</button></h2>
        <div id="year-2024" class="accordion-collapse collapse show" aria-labelledby="year-2024" data-bs-parent="itfestfor2024">
          <div class="accordion-body">
<?php
$stmt = $conn->prepare("SELECT * FROM events_2024");
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
    echo '            
    <div class="container table-container border-bottom border-warning py-2">
        <table class="table">
            <tr>
                <th class="w-50">FEST</th>
                <td>'.$row['fest_name'].'</td>
            </tr>
            <tr>
                <th class="w-50">VENUE</th>
                <td>'.$row['venue'].'</td>
            </tr>
            <tr>
              <th class="w-50">DATE</th>
              <td>'.$row['last_date'].'</td>
            </tr>
            <tr>
                <th class="w-50">Download Brochure here</th>
                <td><a href="'.$row['brochure_path'].'" download="'.$row['fest_name'].'2024">'.$row['fest_name'].'</a></td>
            </tr>
        </table>
    </div>';
}
?>

          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
</main>

</div>
<?php
include('../includes/footer.php');
?>