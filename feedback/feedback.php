<?php include "inc/header.php" ?>

<?php
$sql = 'SELECT * FROM feedback';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
   
    <h2>Past Feedback</h2>

    <?php if(empty($feedback)): ?>
        <p class="lead mt-3">No feedback found.</p>
    <?php endif; ?>

   <?php foreach($feedback as $feedback): ?>
    <div class="card my-3 w-75">
      <div class="card-body text-center">
        <?php echo $feedback['body']; ?>
        <div class="text-secondary mt-2">
          <?php echo "By: " . $feedback['name']; ?>
          <br>
          <?php echo "Date Published: " . $feedback['date']; ?>
          <br>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</main>

<?php include "inc/footer.php"?>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>