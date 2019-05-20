<?php
if ($_POST || isset($_FILES['file'])) 
{
    $recipient_email = $_POST['requester_email']; 
    $from_email = "mediaiq@emailautonomy.com"; 
    $subject = "MiQ data with Attachment email"; 

    $sender_email = filter_var($_POST["requester_email"], FILTER_SANITIZE_STRING); 
    $sender_message = filter_var($_POST["special_instruction"], FILTER_SANITIZE_STRING); 
    $attachments = $_FILES['file'];

    $file_count = count($attachments['name']); 

    $boundary = md5("specialToken$4332"); 

    if($_POST['geo_target_yes']!="")
    {
        $geo_target_yes = '-'.$_POST['geo_target_yes'];
    }  
    else
    {
        $geo_target_yes = '';
    }

    if($_POST['content_target_yes']!="")
    {
        $content_target_yes = '-'.$_POST['content_target_yes'];
    }  
    else
    {
        $content_target_yes = '';
    }
    $body1 .= '<p>Please find attached data and files you submitted</p></br>';

    $body1 .= '<p></p></br>';

    $body1 .= '<li><b>Requester email address:</b><a href="mailto:'.$_POST['requester_email'].'" target="_blank">'.$_POST['requester_email'].'</a></li></br>';
    $body1 .= '<li><b>Additional screenshot recipients:</b><a href="mailto:'.$_POST['additional_screenshot'].'" target="_blank">'.$_POST['requester_email'].'</a> </li></br>';
    $body1 .= '<li><b>Screenshot Due Date:</b>'.$_POST['screenshot_due_date'].'</li></br>';
    $body1 .= '<li><b>Advertiser:</b>'.$_POST['advertiser'].'</li></br>';
    $body1 .= '<li><b>JIRA Ticket Number:</b>'.$_POST['jira_id'].'</li></br>';
    $body1 .= '<li><b>Creative ID(s):</b><p>'.$_POST['campaign_id'].'</p></li></br>';
    $body1 .= '<ul><li><b>Sites/Publishers:</b>'.$_POST['sites_publishers'].'</li></br>';
    $body1 .= '<ul><li><b>Geo-targeting:</b>'.$_POST['geo_target'].' '.$geo_target_yes.'</li></br>';
    $body1 .= '<li><b>Content targeting:</b>'.$_POST['content_target'].' '.$content_target_yes.'</li></br>';
    $body1 .= '<li><b>Any special instructions:</b><p>'.$_POST['special_instruction'].'</p></li></br>';
    $body1 .= '</ul>';

    if ($file_count > 0) 
    {   
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "From:" . $from_email . "\r\n";
        $headers .= "Reply-To: " . $sender_email . "" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n";
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n";

        $body .= chunk_split(base64_encode($body1));

        for ($x = 0; $x < $file_count; $x++) 
        {
            if (!empty($attachments['name'][$x])) 
            {
                if ($attachments['error'][$x] > 0) 
                { 
                    $mymsg = array(
                        1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
                        2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
                        3 => "The uploaded file was only partially uploaded",
                        4 => "No file was uploaded",
                        6 => "Missing a temporary folder");
                    die($mymsg[$attachments['error'][$x]]);
                }

                $file_name = $attachments['name'][$x];
                $file_size = $attachments['size'][$x];
                $file_type = $attachments['type'][$x];

                $handle = fopen($attachments['tmp_name'][$x], "r");
                $content = fread($handle, $file_size);
                fclose($handle);
                $encoded_content = chunk_split(base64_encode($content));

                $body .= "--$boundary\r\n";
                $body .= "Content-Type: $file_type; name=" . $file_name . "\r\n";
                $body .= "Content-Disposition: attachment; filename=" . $file_name . "\r\n";
                $body .= "Content-Transfer-Encoding: base64\r\n";
                $body .= "X-Attachment-Id: " . rand(1000, 99999) . "\r\n\r\n";
                $body .= $encoded_content;
            }
        }
    } 
    else 
    { 
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $headers .= "From:" . $from_email . "\r\n" .
                "Reply-To: " . $sender_email . "\n" .
                "X-Mailer: PHP/" . phpversion();
                
        $body = $body1;
    }

    $sentMail = @mail($recipient_email, $subject, $body, $headers);
    if ($sentMail) { //output success or failure messages
        header('Location:miq.php');
    } else {
        die('Could not send mail! Please check your PHP mail configuration.');
    }
}
?>