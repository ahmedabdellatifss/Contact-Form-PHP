<?php
   
   // Check if user coming from a request
 
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Assign Variables
      $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
      $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $cell = filter_var($_POST['cellPhone'], FILTER_SANITIZE_NUMBER_INT);
      $msg  = filter_var($_POST['message'], FILTER_SANITIZE_STRING) ;
 
       // Creating Array of Errors 
         
       $formErrors = array();

       if (strlen($user) < 3 ){
        $formErrors[] = 'Username Must be larger than <strong>3</strong> characters';
       }
       if (strlen($msg) < 10 ){
        $formErrors[] = 'Message Can\'t be less than <strong>10</strong> characters';
       }

       // If No Error Send The Email [ mail(to, subject(3noan elrsala bt3tk) , Message , Headers, parameters) ]
        $headers = 'from: ' . $mail . '\r\n';
        $myEmail = 'ahmedmohmmed1992@gmail.com';
        $subject = 'Contact Form Roaa ';

        if (empty($formErrors)) {
          mail( $myEmail , $subject , $msg);
            $user = '';
            $mail = '';
            $cell = '';
            $msg = '';

            $success = '<div class="alert alert-success">We Have Recieved Your Message</div>';
            
           
        }
   }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Roaa-Contact-Form</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/contact.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700;900&display=swap">
</head>

<body>

  <!-- Start Form -->

  <div class="container">
    <h1 class="text-center">Contact Me</h1>
    <form class="contact-form" action=" <?Php echo $_SERVER['PHP_SELF'] ?> " method="POST">
          <?php if (! empty($formErrors)) { ?>
           <div class="alert alert-danger alert-dismissible" role="start">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <?php
                foreach($formErrors as $error) {
                    echo $error . '<br/>';
                  } 
                ?> 
            </div>  
          <?php } ?> 
          <?php if (isset( $success)) { echo  $success ;} ?>
        <div class="form-group">
          <input
                  class="form-control username"
                    type="text"
                    name="username"
                    placeholder="Type your name"
                    value="<?php if (isset($user)) { echo $user; } ?>" />
          <i class="fa fa-user fa-fw"></i>
          <span class="asterisx">*</span>
          <div class="alert alert-danger custom-alert">
                Username Must be larger than <strong>3</strong> characters
          </div>
        </div>
        <div class="form-group">
          <input
                class="email form-control" 
                type="email" 
                name="email"
                placeholder="please Type a valid email" 
                value="<?php if (isset($mail)) { echo $mail; } ?>" />
          <i class="fa fa-envelope fa-fw"></i>
          <span class="asterisx">*</span>
          <div class="alert alert-danger custom-alert">
                Email Can't Be <strong>Empty</strong>
          </div>
        </div>
        <input
              class="form-control" 
              type="text"
              name="cellPhone"
              placeholder="Type correct phone number" 
              value="<?php if (isset($cell)) { echo $cell;} ?>" />
       <i class="fa fa-phone fa-fw"></i>
       <div class="form-group">
        <textarea
              class="message form-control"
                name="message"
                  placeholder="Your Message!"> <?php if (isset($msg)) { echo $msg ;} ?></textarea>
        <span class="asterisx">*</span>
        <div class="alert alert-danger custom-alert">
            Message Can't be less than <strong>10</strong> characters
        </div>
      </div>
       <input
            class="btn btn-success " 
            type="submit"
             value="send-Message" />
      <i class="fa fa-send fa-fw send-icon"></i>

    </form>
  </div>
  <!-- End Form -->
  <script src="js/jquery-1.12.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom1.js"></script>
</body>
</html>