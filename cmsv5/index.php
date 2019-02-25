<?php 
header("Location: public/");
//hosting içerisine cmsv5 klasörünün tamamını atacağız
//hostingden de site konumu olarak "httpdocs/" yerine "httpdocs/public/" olarak tanımlayacağız.
//istersek xampp için:
//  C:/xampp/apache/conf/extra/httpd-vhosts.conf
//  bunun içine alttaki gibi belirli porta siteyi ekleyebiliriz 
/*
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/CGN-CMSv5/cmsv5/public/"
    ServerName localhost
</VirtualHost>
*/
?>