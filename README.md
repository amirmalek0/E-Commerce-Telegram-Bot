# E-Commerce-Telegram-Bot 🤖🛒
# سورس ربات فروش فایل تلگرام متصل به درگاه پرداخت زرین پال + پنل تحت وب
با استفاده از این سورس می توانید یک فروشگاه فایل در تلگرام راه اندازی کنید و با استفاده از درگاه زرین پال، فایل های خود را برای فروش در اختیار کاربران خود قرار دهید.
# ویژگی های سورس ربات فروش فایل

- امکان ایجاد دسته بندی و طبقه بندی محصولات
- پنل مدیریتی پیشرفته تحت وب
- امکان ایجاد اشتراک ویژه برای کاربران
- مدیریت سفارشات از طریق پنل تحت وب
- مدیریت کاربران از طریق پنل تحت وب
- سیستم پرسش و پاسخ (تیکت)
- امکان سفارشی سازی 100 درصد محتوای ربات از طریق پنل
- اتصای به درگاه پرداخت Zarinpal

# راه اندازی ربات
1. یک دیتابیس جدید بسازید و محتویات فایل دیتابیس `Database.sql` را بر روی دیتابیس ساخته شده آپلود(export) کنید.
2. اطلاعات دیتابیس ساخته شده , همچین تمامی اطلاعات خواسته شده را در فایل زیر جایگذاری کنید :
- `/config.php`
3. فایل `index.php` را برای ست کردن وبهوک انتخاب کنید.
- `https://api.telegram.org/bot{bot_token}/setWebhook?url={url_to_index.php}`

# راه اندازی پنل تحت وب
1. اطلاعات دیتابیس را در فایل زیر جایگذاری کنید :
- `/admin-panel/db.php`
2. توکن ربات خود را در فایل زیر جاگذاری کنید:
- `/admin-panel/src/func.php`

اطلاعات ورود به پنل به صورت پیشفرض به صورت زیر میباشد(اطلاعات ورود را حتما تغییر دهید):
- `Username : admin`
- `Password : Admin@admin`

آدرس ورود به پنل هم به صورت `www.yoursite.com/admin-panel` می باشد که برای امنیت بیشتر می توانید نام فولدر `admin-panel` را به مقدار دلخواه تغییر دهید.

# تصاویر ربات + پنل مدیریت
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/0.png)
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/1.png)
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/2.png)
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/3.png)
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/4.png)
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/5.png)
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/6.png)
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/7.png)
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/8.png)
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/b0.png)
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/b1.png)
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/b2.png)
![سورس ربات فروش فایل تلگرام PHP + MYSQL + TAILWIND](/Screenshots/b3.png)


