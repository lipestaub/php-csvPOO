<?php    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Mail {
        public function sendEmail() : void {
            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'lipestaub.senac@gmail.com';
                $mail->Password = 'wjhj xcnv lelk wguv';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                $mail->setFrom('lipestaub.senac@gmail.com', 'Felipe');
                $mail->addAddress('lipestaub.senac@gmail.com', 'Felipe');

                $mail->addAttachment(__DIR__ . '/../report.csv');

                $mail->isHTML(true);
                $mail->Subject = 'Report';
                $mail->Body = 'Report:';
                $mail->AltBody = 'Report:';

                $mail->send();
                echo "Message has been sent\n";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}\n";
            }
        }
    }
?>