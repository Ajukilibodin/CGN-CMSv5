# CGN-CMSv5
## Laravel Setup
İlk olarak [Composer](https://getcomposer.org/download/) kurulumu yaptım. Bu sayede terminali Laravel kurulumu yapabilecek hale getirdim.
Windows Power Shell (terminal) üzerinden 
`composer global require laravel/installer`
komut satırını çalıştırarak bilgisayara Laravel sistemini kurdum.
Yeni bir proje oluştururken Composer ile Laravel sistemini kullanmak için alttaki kod satırını kullanıdım; 
```php
composer create-project --prefer-dist laravel/laravel blog
```
Bu kod sayesinde içinde bulunduğumuz klasör (directory) içerisine "blog" klasörü oluşturarak buraya proje dosyaları ile beraber demo bir server.php dosyası oluşturuyor.