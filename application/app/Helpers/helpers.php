<?php

use Carbon\Carbon;
use App\Models\Admin\Page;
use App\Models\Front\Brand;
use App\Models\Front\Social;
use App\Models\Admin\Gallery;
use App\Models\Admin\MenuItem;
use App\Models\Front\SectionTitle;
use App\Models\Models\Appointment;
use App\User;
use Illuminate\Support\HtmlString;
use Intervention\Image\Facades\Image;

if(!function_exists('fileUpload')) {
    function fileUpload($new_file, $path, $old_file_name = null, $imgheight=null, $imgwidth=null)
    {

        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0777, true);
        }


        $file_name = time() . $new_file->getClientOriginalName();
        $destinationPath = $path;

        if (isset($old_file_name) && $old_file_name != "" && file_exists($path . $old_file_name)) {
            unlink($path . $old_file_name);
        }

        # resize image

            # resize image and upload
            if ($imgheight || $imgwidth) {

                $imageResize = Image::make($new_file)
                    ->resize($imgwidth, $imgheight)
                    ->save($destinationPath . $file_name);
            } else {

                #original image upload
                $new_file->move($destinationPath, $file_name);

            }

        return $file_name;
    }
}


if(!function_exists('removeImage')) {
    function removeImage($path, $old_file_name)
    {
        if (isset($old_file_name) && $old_file_name != "" && file_exists($path . $old_file_name)) {

            unlink($path . $old_file_name);
        }

        return true;
    }
}

if(!function_exists('setEnvValue')) {
    function setEnvValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n";
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }
}


//*************************************Image Path**************************
if(!function_exists('path_user_image')) {
    function path_user_image()
    {
        return 'uploaded_file/files/img/user/';
    }
}

if(!function_exists('path_site_logo_image')) {
    function path_site_logo_image()
    {
        return 'uploaded_file/files/img/site/';
    }
}

if(!function_exists('path_site_favicon_image')) {
    function path_site_favicon_image()
    {
        return 'uploaded_file/files/img/favicon/';
    }
}

if(!function_exists('path_site_while_logo_image')) {
    function path_site_while_logo_image()
    {
        return 'uploaded_file/files/img/whitelogo/';
    }
}

if(!function_exists('path_news_image')) {
    function path_news_image()
    {
        return 'uploaded_file/files/img/news/';
    }
}

if(!function_exists('path_slider_image')){
    function path_slider_image()
    {
        return 'uploaded_file/files/img/slider/';
    }
}

if(!function_exists('path_about_image')){
    function path_about_image()
    {
        return 'uploaded_file/files/img/about/';
    }
}

if(!function_exists('path_counter_image')) {
    function path_counter_image()
    {
        return 'uploaded_file/files/img/counter/';
    }
}

if(!function_exists('path_service_image')) {
    function path_service_image()
    {
        return 'uploaded_file/files/img/service/';
    }
}

if(!function_exists('path_gallery_image')){
    function path_gallery_image()
    {
        return 'uploaded_file/files/img/gallery/';
    }
}

if(!function_exists('path_testimonial_image')){
    function path_testimonial_image()
    {
        return 'uploaded_file/files/img/testimonial/';
    }
}

if(!function_exists('path_brand_image')) {
    function path_brand_image()
    {
        return 'uploaded_file/files/img/brand/';
    }
}

if(!function_exists('path_contact_image')) {
    function path_contact_image()
    {
        return 'uploaded_file/files/img/contact/';
    }
}

if(!function_exists('path_noimage_image')) {
    function path_noimage_image()
    {
        return 'uploaded_file/files/img/no-data/';
    }
}

//************************************* Section Title **************************
if(!function_exists('section_title')) {
    function section_title($name)
    {
        if (SectionTitle::where('name', $name)->first()) {
            return SectionTitle::where('name', $name)->first();
        } else {
            return null;
        }
    }
}


//************************************* Brand section **************************
if(!function_exists('brand_section')) {
    function brand_section()
    {
        return Brand::all();
    }
}


//************************************* Menus **************************
if(!function_exists('header_menu')) {
    function header_menu()
    {
        return MenuItem::where('position', 1)->get();
    }
}

if(!function_exists('quick_links_menu')) {
    function quick_links_menu()
    {
        return MenuItem::where('position', 2)->get();
    }
}

if(!function_exists('support_help_menu')) {
    function support_help_menu()
    {
        return MenuItem::where('position', 3)->get();
    }
}


//************************************* Footer Gallery **************************]
if(!function_exists('footer_gallery')) {
    function footer_gallery()
    {
        return Gallery::take(4)->get();
    }
}



//************************************* Page Info (SEO) **************************
if(!function_exists('page_info')) {
    function page_info($url)
    {
        $page_info = Page::where('url', $url)->first();
        if ($page_info) {
            return $page_info;
        } else {
            return null;
        }
    }
}

//************************************* Theme Socials **************************
if(!function_exists('Theme_socials')) {
    function Theme_socials()
    {
        return Social::all();
    }
}

if(!function_exists('past_appointment_count')) {
    function past_appointment_count()
    {
        return Appointment::where('user_id', auth()->user()->id)->where('appdate', '<', Carbon::now()->format('Y-m-d'))->orderBy('id', 'DESC')->count();
    }
}

if(!function_exists('patient_ongoing_count')) {
    function patient_ongoing_count()
    {
        return Appointment::where('appdate', Carbon::now()->format('Y-m-d'))->where('user_id', auth()->user()->id)->where('status', 1)->count();
    }
}

if(!function_exists('view_html')) {
    function view_html($text){
        return new HtmlString($text);
    }
}

if(!function_exists('resetPasswordToken'))
{
    function resetPasswordToken() {
        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $number = substr(str_shuffle($permitted_chars), 0, 8);

        if (passwordTokenExists($number)) {
            return resetPasswordToken();
        }

        return $number;
    }
}

if(!function_exists('passwordTokenExists'))
{
    function passwordTokenExists($number) {
        return User::where('reset_password', $number)->exists();
    }
}
