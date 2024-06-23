<?php

include "PHPMailer/src/SMTP.php";
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\Exception;


try{

  $db=new PDO("mysql:host=localhost;dbname=hazaryilmaz_sporsalonu;charset=utf8","hazaryilmaz_hazar","H.y32566941152");
  echo"basari" ,"<br>";
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
  if(isset($_POST["unutttum"]))
  {
    
    $Atc=$_POST["kayittc"];
    $Amail=$_POST["kayitmail"];

   $c=$db->query("Select * from admin_kayit where tc='".$Atc."'")->rowCount();
   if($c==0)
   {
    header("refresh:1; url=giriserror.html");
   }
   else
   {
    $c1=$db->query("Select * from admin_kayit where email='".$Amail."'")->rowCount();
    if($c1==0)
    {
        header("refresh:1; url=giriserror.html");
    }
    else
    {
      $code=uniqid();
    if($db->query("update admin_kayit set code='".$code."'where tc='".$Atc."'"))
    {
      header(header:"refresh:1 url=mailgonderdi.html");
      $mail=new PHPMailer();
      $mail->Host="smtp.outlook.com";
      $mail->Username="bilgisayarprogramciligi2022@outlook.com";
      $mail->Password="Deneme.123";
      $mail->Port=587;
      $mail->SMTPSecure="tls";
      $mail->isSMTP();
      $mail->SMTPAuth=true;
      $mail->isHTML(true);
      $mail->CharSet="UTF-8";
      $mail->setLanguage('tr','PHPMailer/Language/');
      $mail->SMTDebug=0;
      $mail->setFrom('bilgisayarprogramciligi2022@outlook.com',"Hazar Yılmaz");
      $mail->addAddress($Amail,"Spor Salonu");
      $mail->Subject="Şifremi Unuttum";
     
      $icerik="".$Atc."  Tc Kimlik Numaralı Yönetici"."<br>"."Şifrenizi değiştirmek için kodunuz:<b>  ".$code."</b><br>"."Aşağıdaki linke tıklayarak gidin"."<br>"."<a href='http://localhost/BBP221-Spor-Salonu-Yönetimi-Ve-Analiz-Sistemi-HazarYılmaz/adminsifredegistir.php'>Buraya tıklayın</a>"; 
       
      $mail->MsgHTML($icerik);

      $mail_gonder = $mail->send();
      if ($mail_gonder) {
          echo "Mail gönderimi başarılı";
      } else {
          echo "Mail gönderimi başarısız: " . $mail->ErrorInfo;
      }
    }
    else
    {
      echo"bir hata oluştu";
    }
    
    }
    

   }

  }

?>