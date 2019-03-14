
# CGN-CMSv5

- [Proje Dokümantasyon](http://www.berkedundar.com/book.php?project=boo_Dq56i3E4XuOr7VExV)
- [Laravel ingiliççe tanım](http://www.berkedundar.com/book.php?id=3)
- [Trello Sayfası](https://trello.com/b/CJ5XMcgy/cmsv5)

> ---------------------

## Projeyi ilk indirdiğimizde yapılacaklar:

- Proje dosyalarını xampp gibi bir sanal sunucu içerisine at. Bu sayede **/cmsv5/public/index.php** ile sitemize erişimini sağla.
- Projenin kullanacağı **cmsv5_demo** adında bir veritabanı oluştur. Bu veritabanı adı **/cmsv5/.env** dosyasında tanımlanmıştır.
- Bilgisayarında **NodeJS** kurulu ise (ki bir çok işlem için gerekecek) terminal ile **/cmsv5/** klasörü içerisinde iken aşağıdaki kodu çalıştır:
      npm install
- Bu komut sayesinde sadece senin kullanacabileceğın npm tool'larını kendi proje klasörüne indirmiş olacaksın. Bu dosyalar **/cmsv5/node_modules/** altında birikecek. Ve bu klasör bizim web yazılımımız için gerekli değildir.
- Bir sonraki aşama olarak projemizdeki migration'lar ile veritabanı tablolarımızı oluşturacağız:
      php artisan migrate
- eğer zaten oluşturulmuş veritabanı tabloları var ise ve güncellemek istiyorsak sonuna **:reflesh** ekleyeceğiz. Bu sayede eski migrate edilmiş tablolar kaldırılıp yerine yeni tablolar ve kayıtlar yerleştirilecektir.

## Dikkat edilecekler:

- Yapılmış modüller ve yapılacak olanlar [Trello Sayfası](https://trello.com/b/CJ5XMcgy/cmsv5) üzerinden takip edilecektir.
- Projedeki her bir href için (src değil) verilecek **site içi** url'ler düz string olarak değil, **{{url('LİNK')}}** biçiminde verilecektir. Bu sayede bilgisayarımızın xampp ayarlarını değiştirmemize de gerek kalmayacaktır. Ya da ileride yaşayabileceğimiz birden fazla alt dallı web route'larında sıkıntı yaşamamızı engelleyecektir. direkt de link verebilirsiniz, hata ile karşılaşırsak düzeltiriz artık :D
