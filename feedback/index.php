<?php include "inc/header.php" ?>

<?php
//declare variables
$name = $email = $body = "";
$nameErr = $emailErr = $bodyErr = "";

//form submit 
if(isset($_POST['submit'])){
    //validate name
    if(empty($_POST['name'])){
        $nameErr = "Name is required";
    } else {
        $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //check if name only contains letters and whitespace
        if(!preg_match("/^[a-zA-Z ]*$/", $name)){
            $nameErr = "Only letters and white space allowed";
        }
    }
    //validate email
    if(empty($_POST['email'])){
        $emailErr = "Email is required";
    } else {
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
        //check if email is valid
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invalid email format";
        }
    }
    //validate body
    if(empty($_POST['body'])){
        $bodyErr = "Feedback is required";
    } else {
        $body = filter_input(INPUT_POST,'body',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(empty($nameErr) && empty($emailErr) && empty($bodyErr)){
        //insert into database
        $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name','$email','$body')";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_query($conn, $sql)) {
          // success
          header('Location: feedback.php');
        } else {
          // error
          echo 'Error: ' . mysqli_error($conn);
    }
  }
}
?>
    <img src="img/PFP.png" class="w-25 mb-3" alt="">
    <h2>Feedback</h2>
    <p class="lead text-center">Leave feedback for Khan Media</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="mt-4 w-75" method = "POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo $nameErr ?
          'is-invalid' : null; ?>" id="name" name="name" placeholder="Enter your name">
        <div class="invalid-feedback">
          <?php echo $nameErr; ?>
        </div>

      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo $emailErr ?
          'is-invalid' : null; ?>" id="email" name="email" placeholder="Enter your email">
          <div class="invalid-feedback">
          <?php echo $emailErr; ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control <?php echo $emailErr ?
          'is-invalid' : null; ?>" id="body" name="body" placeholder="Enter your feedback"></textarea>
          <div class="invalid-feedback">
          <?php echo $bodyErr; ?>
        </div> 
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
    </div>
</main>

<?php include "inc/footer.php"?>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>