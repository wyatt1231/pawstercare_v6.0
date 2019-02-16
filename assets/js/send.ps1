$smtpserver = "smtp.gmail.com"
$msg=new-object Net.Main.MailMessage
$smtp=new-object Net.Mail.SmtpClient($smtpServer)
$smtp.Enablessl=$true
$smtp.Credentials=New-Object System.Net.NetworkCredential("user","eiijii21");
$msg.To.Add("edwardjosephfernandez@gmail.com")
$msg.Subject="Test"
$msg.Body="test"
$smtp.Send(msg)