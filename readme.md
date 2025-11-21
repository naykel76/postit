<p align="center"><a href="https://naykel.com.au" target="_blank"><img src="https://avatars0.githubusercontent.com/u/32632005?s=460&u=d1df6f6e0bf29668f8a4845271e9be8c9b96ed83&v=4" width="120"></a></p>

<a href="https://packagist.org/packages/naykel/postit"><img
src="https://img.shields.io/packagist/dt/naykel/postit" alt="Total Downloads"></a> <a
href="https://packagist.org/packages/naykel/postit"><img
src="https://img.shields.io/packagist/v/naykel/postit" alt="Latest Stable Version"></a> <a
href="https://packagist.org/packages/naykel/postit"><img
src="https://img.shields.io/packagist/l/naykel/postit" alt="License"></a>

# Naykel Postit


Add to `routes/web.php` at the **END** of your route file:

```php
/** ---------------------------------------------------------------------------
 *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
 * ------------------------------------------------------------------------- */
Route::get('/{post:slug}', ShowPostController::class)->name('posts.show');
 ```