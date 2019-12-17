<?PHP
  $email = $_POST['email'] ; 
  $subject = $_POST['subject'] ;
  $message = $_POST['message'] ;
  mail("james.larner@peterborough.ac.uk", "Subject: $subject",$message, "From: $email" );
  echo "Thank you for using our mail form";
?>
