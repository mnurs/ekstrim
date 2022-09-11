<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BrandController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\NoticeController;
use App\Http\Controllers\Front\SliderController;
use App\Http\Controllers\Front\SocialController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\CounterController;
use App\Http\Controllers\Front\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Front\TestimonialController;
use App\Http\Controllers\Front\SectionTitleController;
use App\Http\Controllers\Front\GallerySectionController;

Route::group(['middleware' => 'auth'], function () {

    // Section Title;
    Route::post('/section-title/{name}', [SectionTitleController::class, 'store'])->name('section.title.store');

    // Section Title View;
    Route::get('/gallery-section', [SectionTitleController::class, 'gallery'])->name('gallery.section');
    Route::get('/doctor-section', [SectionTitleController::class, 'doctor'])->name('doctor.section');

    // Slider Section;
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/{id}/update', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/slider/{id}/delete', [SliderController::class, 'delete'])->name('slider.delete');

    // Notice Section;
    Route::get('/notice', [NoticeController::class, 'index'])->name('notice.index');
    Route::get('/notice/{id}/edit', [NoticeController::class, 'edit'])->name('notice.edit');
    Route::post('/notice/{id}/update', [NoticeController::class, 'update'])->name('notice.update');


    // About Section;
    Route::get('/about-section', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about-section/store', [AboutController::class, 'store'])->name('about.store');
    Route::post('/about-section/{id}/update', [AboutController::class, 'update'])->name('about.update');

    // Counter Section;
    Route::get('/counter', [CounterController::class, 'index'])->name('counter.index');
    Route::post('/counter/store', [CounterController::class, 'store'])->name('counter.store');
    Route::post('/counter/{id}/update', [CounterController::class, 'update'])->name('counter.update');

    // Gallery Section;
    Route::get('/gallery/section/all', [GallerySectionController::class, 'index'])->name('gallery_section.index');
    Route::post('/gallery/section/store', [GallerySectionController::class, 'store'])->name('gallery_section.store');
    Route::post('/gallery/section/update', [GallerySectionController::class, 'update'])->name('gallery_section.update');

    // Testimonial Section;
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('/testimonial/{id}/update', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::get('/testimonial/{id}/delete', [TestimonialController::class, 'delete'])->name('testimonial.delete');

    // Brand Section;
    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/{id}/update', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/{id}/delete', [BrandController::class, 'delete'])->name('brand.delete');

    // Menu;
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');

    Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('/menu/{id}/update', [MenuController::class, 'update'])->name('menu.update');
    Route::get('/menu/{id}/delete', [MenuController::class, 'delete'])->name('menu.delete');

    // Menu Item;
    Route::post('/menu-item/store', [MenuItemController::class, 'store'])->name('menu_item.store');

    // News;
	Route::get('/news/all', [NewsController::class, 'index'])->name('news.index');
	Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
	Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
	Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
	Route::post('/news/update/{id}', [NewsController::class, 'update'])->name('news.update');
	Route::get('/news/delete/{id}', [NewsController::class, 'delete'])->name('news.delete');

	// Category;
	Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
	Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
	Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
	Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
	Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
	Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    // Comment;
    Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
    Route::get('/comment/{id}/approved', [CommentController::class, 'approved'])->name('comment.approved');
    Route::get('/comment/{id}/unapproved', [CommentController::class, 'unapproved'])->name('comment.unapproved');
    Route::get('/comment/{id}/delete', [CommentController::class, 'delete'])->name('comment.delete');

    // Service;
    Route::get('/service/all', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('/service/{id}/update', [ServiceController::class, 'update'])->name('service.update');
    Route::get('/service/{id}/delete', [ServiceController::class, 'delete'])->name('service.delete');

    // Gallery;
    Route::get('/gallery/section', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/gallery/{id}/update', [GalleryController::class, 'update'])->name('gallery.update');
    Route::get('/gallery/{id}/delete', [GalleryController::class, 'delete'])->name('gallery.delete');

    // Contact;
    Route::get('/contact/all', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/image/update', [ContactController::class, 'contactImageUpdate'])->name('contact.image.update');
    Route::get('/contact/{id}/delete', [ContactController::class, 'delete'])->name('contact.delete');

    // FAQ;
    Route::get('/faq/all', [FaqController::class, 'index'])->name('faq.index');
    Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq/store', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/faq/{id}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::post('/faq/{id}/update', [FaqController::class, 'update'])->name('faq.update');
    Route::get('/faq/{id}/delete', [FaqController::class, 'delete'])->name('faq.delete');

    // Page;
    Route::get('/pages', [PageController::class, 'index'])->name('page.index');
    Route::get('/pages/{id}', [PageController::class, 'edit'])->name('page.edit');
    Route::post('/pages/{id}/update', [PageController::class, 'update'])->name('page.update');

    // Site Socials;
    Route::get('/socials/all', [SocialController::class, 'index'])->name('site.social.index');
    Route::get('/socials/create', [SocialController::class, 'create'])->name('site.social.create');
    Route::post('/socials/store', [SocialController::class, 'store'])->name('site.social.store');
    Route::get('/socials/{id}/edit', [SocialController::class, 'edit'])->name('site.social.edit');
    Route::post('/socials/{id}/update', [SocialController::class, 'update'])->name('site.social.update');
    Route::get('/socials/{id}/delete', [SocialController::class, 'delete'])->name('site.social.delete');

});

    // ******************************** Front Pages ***************************************
    Route::get('/', [FrontController::class, 'index'])->name('front.index')->middleware('check.install');
    Route::get('/about-us', [FrontController::class, 'about'])->name('front.about');
    Route::get('/service', [FrontController::class, 'service'])->name('front.service');
    Route::get('/news', [FrontController::class, 'news'])->name('front.news');
    Route::get('/news-category/{slug}', [FrontController::class, 'category'])->name('front.category');
    Route::get('/news-tag/{tag}', [FrontController::class, 'tag'])->name('front.tag');
    Route::get('/news-details/{slug}', [FrontController::class, 'single_news'])->name('front.single.news');
    Route::get('/service-details/{slug}', [FrontController::class, 'single_service'])->name('front.single.service');
    Route::get('/gallery', [FrontController::class, 'galleries'])->name('front.galleries');
    Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
    Route::get('/faq', [FrontController::class, 'faq'])->name('front.faq');
    Route::get('/doctor-profile/{doctor}', [FrontController::class, 'doctorprofile'])->name('front.doctorprofile');
    Route::get('/doctors', [FrontController::class, 'doctor'])->name('front.doctor');

    // Contact;
    Route::post('/contact/store', [ContactController::class, 'store'])->name('front.contact.store');

    // Comment;
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');

?>


