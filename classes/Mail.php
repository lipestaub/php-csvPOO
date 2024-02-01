<?php    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Mail {
        public function sendEmail(string $recepientName, string $recipientEmail) : void {
            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'fstaub.imply@gmail.com';
                $mail->Password = 'iwmk lvgw tocj laqh';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                $mail->setFrom('fstaub.imply@gmail.com', 'Felipe Staub');
                $mail->addAddress($recipientEmail, $recepientName);

                $mail->addAttachment(__DIR__ . '/../report.csv');

                $mail->isHTML(true);
                $mail->Subject = 'Report';
                $mail->Body = 'Report attached.';
                $mail->AltBody = 'Report attached.';

                $mail->send();
                echo "Message has been sent\n";
            } catch (Exception $exception) {
                echo "Message could not be sent. Error: {$exception->getMessage()}\n";
            }
        }
    }
?>