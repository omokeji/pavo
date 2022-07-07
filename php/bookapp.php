<?php 
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

        //import mail client
        require_once "../PHPMailer/PHPMailer.php";
        require_once "../PHPMailer/SMTP.php";
        require_once "../PHPMailer/Exception.php";

    // File name
    $mailer_name = $_POST['mailer_name'];
    $mailer_message = $_POST['mailer_message'];

            // Upload file
            if($mailer_name){

                $mailer_name = $mailer_name;
                $mailer_location = 'maxicarellc@maxicarerx.com';
                $mailer_link = "";
                $mailer_description = "success";

                $message = $mailer_message;

                echo $mailer_name;

                $mail = new PHPMailer(true);
              
                //mail settings
                $mail->isSMTP();
                $mail->Host = "sxb1plzcpnl490364.prod.sxb1.secureserver.net";
                $mail->SMTPAuth = true;
                $mail->Username = "maxicarellc@maxicarerx.com";
                $mail->Password = "Proper123@";
                $mail->Port = 465;
                $mail->SMTPSecure = "ssl";
                $mail->SMTPDebug = 1;
        
                $mail->isHTML(true);
                $mail->setFrom($mailer_name, $mailer_name);
                $mail->addAddress($mailer_location);
                $mail->Subject = ("Book Appointment");
              //  $mail -> addAttachment('upload/'.$filename );
                $mail->Body = $message;
        
                if($mail->send()){
                    header("Location: index.html");
                    $status = "success";
                    $response = "Email is sent";
                  
                }else {
                    $status = "failed";
                    $response = "Something is wrong: <br>"; $mail -> ErrorInfo;
                }
                
                exit(json_encode(array("status" => $status, "response" => $response)));
          
            } 
    echo "success";
    exit;
?>