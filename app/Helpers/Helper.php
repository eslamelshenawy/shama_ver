<?php
// This class file to define all general functions
namespace App\Helpers;
use App\AnalyticsPage;
use App\AnalyticsVisitor;
use App\Country;
use App\Event;
use App\product;
use App\PromoCode;
use App\Section;
use App\subcategory;
use App\Topic;
use App\Setting;
use App\category;
use App\Size;
use App\StandardGold;
use App\Price;
use App\Webmail;
use App\OrderDetails;
use App\WebmasterSection;
use App\WebmasterSetting;
use Auth;
class Helper
{

    static function formatNumber($number, $currency = 'IDR')
{
   if($currency == 'USD') {
        return number_format($number, 2, '.', ',');
   }
   return number_format($number, 0, '.', '.');
}

    static function GeneralWebmasterSetting()
    {
        $WebmasterSettings = WebmasterSetting::find(1);
        return $WebmasterSettings;
    }
    static function GeneralWebmasterSettings($var)
    {
        $WebmasterSetting = WebmasterSetting::find(1);
        return $WebmasterSetting->$var;
    }
    static function GeneralSiteSettings($var)
    {
        $Setting = Setting::find(1);
        return $Setting->$var;
    }
    static function Taxes()
    {
        $taxes = Topic::find(64);
        return $taxes->number_tax;
    }

    static function price_product($id)
    {
        $price=Price::where("product_id",$id)->select('price')->get();
            return  $price;
    }
    static function date_special_product($id)
    {
        $price=Price::where("product_id",$id)->select('date_end_price')->first();
            return  $price;
    }
    static function price_product_cart($id,$stand,$size)
    {
        dump($id,$stand,$size);
        $price=Price::where("product_id",$id)->where("standard_id",$stand)->where("size_id",$size)->select('price','special_price','date_end_price')->first();
//        dd($price);
        return  $price;
    }
    static function order_details_product_cart($id,$stand,$size)
    {
        $OrderDetails=OrderDetails::where("product_id",$id)->where("standard_gold_id",$stand)->where("size_id",$size)->select('price_sp')->first();
        return  $OrderDetails;
    }
    static function number_rate($id)
    {
        $product=product::where("id",$id)->count();
            return  $product;
    }
    static function price_stand($id)
    {
        $price=Price::where("standard_id",$id)->select("price")->first();
            return  $price;
    }
    static function standard_gold($id)
    {
        $standard = StandardGold::where("product_id",$id)->select('standard_gold_id')->get();
        return  $standard;
    }
    static function standard_gold_name($id)
    {
        if(\App::getLocale()  == 'en'){
            $standard = StandardGold::where("product_id",$id)->join('topics','topics.id','=','standard_golds.standard_gold_id')
                ->select('standard_golds.standard_gold_id','topics.title_en','topics.color_stand')->get();
        }else{
            $standard = StandardGold::where("product_id",$id)->join('topics','topics.id','=','standard_golds.standard_gold_id')
                ->select('standard_golds.standard_gold_id','topics.color_stand','topics.title_il')->get();
        }
        return  $standard;
    }
    static function standard_gold_name_to($id)
    {
        if(\App::getLocale()  == 'en'){
       return     $standard = Topic::where('id',$id)->select("title_en")->first()->title_en;
        }else{
            return  $standard = Topic::where('id',$id)->select("title_il")->first()->title_li;
        }
//        return  $standard;
    }

    static function size_topic($id)
    {
       return     $standard = Topic::where('id',$id)->select("size")->first()->size;
    }
    static function size_number($id)
    {
        if(\App::getLocale()  == 'en'){
            $standard = Size::where("product_id",$id)->join('topics','topics.id','=','sizes.size_id')
                ->select('sizes.size_id','topics.size')->get();
        }else{
            $standard = Size::where("product_id",$id)->join('topics','topics.id','=','sizes.size_id')
                ->select('sizes.size_id','topics.size')->get();
        }
        return  $standard;
    }

    static function size($id)
    {
        $Size=Size::where("product_id",$id)->select('size_id')->get();
            return  $Size;
    }
    static function promocode($id)
    {
        $promocode=PromoCode::where("product_id",$id)->select('amount')->get();
            return  $promocode->amount;
    }

    static function name_section($id)
    {
        $taxes=Topic::where("webmaster_id","13")->where("id",$id)->first();

        if(\App::getLocale()  == 'en'){
            return  $taxes->title_en;
        }
          else{
              return  $taxes->title_il;
          }
    }
    static function name_category($id)
    {
        $taxes = category::where("status","1")
            ->orderBy('id', 'asc')->where("type_id",$id)->first();

        if(\App::getLocale()  == 'en'){
            return  $taxes->name_en;
        }
          else{
              return   $taxes->name_heb;
          }
    }
    static function name_categories($id)
    {
        $taxes = category::find($id);
        if(\App::getLocale()  == 'en'){
            return  $taxes->name_en;
        }
          else{
              return   $taxes->name_heb;
          }
    }
    static function name_sub_category($id)
    {
        $taxes = subcategory::where("id",$id)->first();
        if(\App::getLocale()  == 'en'){
            return  $taxes->name_en;
        }
          else{
              return   $taxes->name_heb;
          }
    }
    static function name_product($id)
    {
        $taxes = product::where("id",$id)->first();
        if(\App::getLocale()  == 'en'){
            return  $taxes->name_en;
        }
          else{
              return   $taxes->name_heb;
          }
    }
    static function id_cat_sub($id)
    {
        $taxes = product::where("id",$id)->select("category_id","subcategory_id")->first();
              return   $taxes;

    }
    static function id_cat($id)
    {
        $taxes = subcategory::where("id",$id)->select("category_id")->first();
              return   $taxes;

    }
    static function price($id)
    {
        $order_deils = \App\OrderDetails::where("order_id", $id)->get();
        $price=0;
        for ($i=0;$i<count($order_deils) ;++$i ){
            $product_deils=\App\product::where("id",$order_deils[$i]->product_id)->first();
            if($product_deils->special_price){
                $price +=$product_deils->special_price;
            }else{
                $price +=$product_deils->price;
            }
        }
        return   $price;

    }
    static function shipping()
    {
        $taxes = Topic::select("percent_org","percent_delivery")->find(65);
        return $taxes;
    }
    // Get Events Alerts
    static function eventsAlerts()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $Events = Event::where('created_by', '=', Auth::user()->id)->where('start_date', '>=',
                "'" . date('Y-m-d H:i:s') . "'")->orderby('start_date', 'asc')->limit(10)->get();
        } else {
            $Events = Event::where('start_date', '>=',
                "'" . date('Y-m-d H:i:s') . "'")->orderby('start_date', 'asc')->limit(10)->get();
        }
        return $Events;
    }
    // Get Webmails Alerts
    static function webmailsAlerts()
    {
        //List of all Webmails
        if (@Auth::user()->permissionsGroup->view_status) {
            $Webmails = Webmail::where('created_by', '=', Auth::user()->id)->orderby('id', 'desc')->where('status', '=',
                0)
                ->where('cat_id', '=', 0)->limit(4)->get();
        } else {
            $Webmails = Webmail::orderby('id', 'desc')->where('status', '=', 0)
                ->where('cat_id', '=', 0)->limit(4)->get();
        }
        return $Webmails;
    }
    // Get Webmails Alerts
    static function webmailsNewCount()
    {
        //List of all Webmails
        if (@Auth::user()->permissionsGroup->view_status) {
            $Webmails = Webmail::where('created_by', '=', Auth::user()->id)->orderby('id', 'desc')->where('status', '=',
                0)->where('cat_id', '=', 0)->get();
        } else {
            $Webmails = Webmail::orderby('id', 'desc')->where('status', '=', 0)->where('cat_id', '=', 0)->get();
        }
        return count($Webmails);
    }
    // Visitors Data
    static function SaveVisitorInfo($PageTitle)
    {
        function getBrowser()
        {
            // check if IE 8 - 11+
            preg_match('/Trident\/(.*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
            if ($matches) {
                $version = intval($matches[1]) + 4;     // Trident 4 for IE8, 5 for IE9, etc
                return 'Internet Explorer ' . ($version < 11 ? $version : $version);
            }
            preg_match('/MSIE (.*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
            if ($matches) {
                return 'Internet Explorer ' . intval($matches[1]);
            }
            // check if Firefox, Opera, Chrome, Safari
            foreach (array('Firefox', 'OPR', 'Chrome', 'Safari') as $browser) {
                preg_match('/' . $browser . '/', $_SERVER['HTTP_USER_AGENT'], $matches);
                if ($matches) {
                    return str_replace('OPR', 'Opera',
                        $browser);   // we don't care about the version, because this is a modern browser that updates itself unlike IE
                }
            }
        }
        function getOS()
        {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            $os_platform = "unknown";
            $os_array = array(
                '/windows nt 6.3/i' => 'Windows 8.1',
                '/windows nt 6.2/i' => 'Windows 8',
                '/windows nt 6.1/i' => 'Windows 7',
                '/windows nt 6.0/i' => 'Windows Vista',
                '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
                '/windows nt 5.1/i' => 'Windows XP',
                '/windows xp/i' => 'Windows XP',
                '/windows nt 5.0/i' => 'Windows 2000',
                '/windows me/i' => 'Windows ME',
                '/win98/i' => 'Windows 98',
                '/win95/i' => 'Windows 95',
                '/win16/i' => 'Windows 3.11',
                '/macintosh|mac os x/i' => 'Mac OS X',
                '/mac_powerpc/i' => 'Mac OS 9',
                '/linux/i' => 'Linux',
                '/ubuntu/i' => 'Ubuntu',
                '/iphone/i' => 'iPhone',
                '/ipod/i' => 'iPod',
                '/ipad/i' => 'iPad',
                '/android/i' => 'Android',
                '/blackberry/i' => 'BlackBerry',
                '/webos/i' => 'Mobile'
            );
            foreach ($os_array as $regex => $value) {
                if (preg_match($regex, $user_agent)) {
                    $os_platform = $value;
                }
            }
            return $os_platform;
        }
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        $current_page_full_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $page_load_time = round((microtime(true) - LARAVEL_START), 8);
        // Check is it already saved today to visitors?
        $SavedVisitor = AnalyticsVisitor::where('ip', '=', $visitor_ip)->where('date', '=', date('Y-m-d'))->first();
        $stack = array();
        array_push($stack,$SavedVisitor);
        if (count($stack) == 0) {
            // New to analyticsVisitors
            try {
                $visitor_ip_details = json_decode(@file_get_contents("http://ipinfo.io/{$visitor_ip}/json"));
                $visitor_city = @$visitor_ip_details->city;
                if ($visitor_city == "") {
                    $visitor_city = "unknown";
                }
                $visitor_region = @$visitor_ip_details->region;
                if ($visitor_region == "") {
                    $visitor_region = "unknown";
                }
                $visitor_country_code = @$visitor_ip_details->country;
                if ($visitor_country_code == "") {
                    $visitor_country_code = "unknown";
                    $visitor_country = "unknown";
                } else {
                    $v_country = Country::where('code', '=', $visitor_country_code)->first();
                    $visitor_country = $v_country->title_en;
                }
                $visitor_address = "$visitor_region, $visitor_city, $visitor_country";
                $visitor_loc = explode(',', @$visitor_ip_details->loc);
                $visitor_loc_0 = @$visitor_loc[0];
                if ($visitor_loc_0 == "") {
                    $visitor_loc_0 = "unknown";
                }
                $visitor_loc_1 = @$visitor_loc[1];
                if ($visitor_loc_1 == "") {
                    $visitor_loc_1 = "unknown";
                }
                $visitor_org = @$visitor_ip_details->org;
                if ($visitor_org == "") {
                    $visitor_org = "unknown";
                }
                $visitor_hostname = @$visitor_ip_details->hostname;
                if ($visitor_hostname == "") {
                    $visitor_hostname = "No Hostname";
                }
            } catch (Exception $e) {
                $visitor_city = "unknown";
                $visitor_region = "unknown";
                $visitor_country_code = "unknown";
                $visitor_country = "unknown";
                $visitor_loc_0 = "unknown";
                $visitor_loc_1 = "unknown";
                $visitor_org = "unknown";
                $visitor_hostname = "No Hostname";
            }
            $visitor_referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "unknown";
            $visitor_browser = getBrowser();
            $visitor_os = getOS();
            $visitor_screen_res = "unknown";
            // Start saving to database
            $Visitor = new AnalyticsVisitor;
            $Visitor->ip = $visitor_ip;
            $Visitor->city = $visitor_city;
            $Visitor->country_code = $visitor_country_code;
            $Visitor->country = $visitor_country;
            $Visitor->region = $visitor_region;
            $Visitor->full_address = $visitor_address;
            $Visitor->location_cor1 = $visitor_loc_0;
            $Visitor->location_cor2 = $visitor_loc_1;
            $Visitor->os = $visitor_os;
            $Visitor->browser = $visitor_browser;
            $Visitor->resolution = $visitor_screen_res;
            $Visitor->referrer = $visitor_referrer;
            $Visitor->hostname = $visitor_hostname;
            $Visitor->org = $visitor_org;
            $Visitor->date = date('Y-m-d');
            $Visitor->time = date('H:i:s');
            $Visitor->save();
            // Start saving page info to database
            $VisitedPage = new AnalyticsPage;
            $VisitedPage->visitor_id = $Visitor->id;
            $VisitedPage->ip = $visitor_ip;
            $VisitedPage->title = $PageTitle;
            $VisitedPage->name = "unknown";
            $VisitedPage->query = $current_page_full_link;
            $VisitedPage->load_time = $page_load_time;
            $VisitedPage->date = date('Y-m-d');
            $VisitedPage->time = date('H:i:s');
            $VisitedPage->save();
        } else {
            // Already Saved to analyticsVisitors
            // Check if page saved
            // $Savedpage = AnalyticsPage::where('visitor_id', '=', $SavedVisitor->id)->where('ip', '=',
            //     $visitor_ip)->where('date', '=', date('Y-m-d'))->where('query', '=', $current_page_full_link)->first();
            // $stack = array();
            //        array_push($stack,$Savedpage);
            // if (count($stack) == 0) {
            //     $VisitedPage = new AnalyticsPage;
            //     $VisitedPage->visitor_id = $SavedVisitor->id;
            //     $VisitedPage->ip = $visitor_ip;
            //     $VisitedPage->title = $PageTitle;
            //     $VisitedPage->name = "unknown";
            //     $VisitedPage->query = $current_page_full_link;
            //     $VisitedPage->load_time = $page_load_time;
            //     $VisitedPage->date = date('Y-m-d');
            //     $VisitedPage->time = date('H:i:s');
            //     $VisitedPage->save();
            // }
        }
    }
    // Videos Check Functions
    static function Get_youtube_video_id($url)
    {
        if (preg_match('/youtu\.be/i', $url) || preg_match('/youtube\.com\/watch/i', $url)) {
            $pattern = '/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/';
            preg_match($pattern, $url, $matches);
            if (count($matches) && strlen($matches[7]) == 11) {
                return $matches[7];
            }
        }
        return '';
    }
    static function Get_vimeo_video_id($url)
    {
        if (preg_match('/vimeo\.com/i', $url)) {
            $pattern = '/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/';
            preg_match($pattern, $url, $matches);
            if (count($matches)) {
                return $matches[2];
            }
        }
        return '';
    }
    // Social Share links
    static function SocialShare($social, $title)
    {
        $shareLink = "";
        $URL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        switch ($social) {
            case "facebook":
                $shareLink = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($URL);
                break;
            case "twitter":
                $shareLink = "https://twitter.com/intent/tweet?text=$title&url=" . urlencode($URL);
                break;
            case "google":
                $shareLink = "https://plus.google.com/share?url=" . urlencode($URL);
                break;
            case "linkedin":
                $shareLink = "http://www.linkedin.com/shareArticle?mini=true&url=" . urlencode($URL) . "&title=$title";
                break;
            case "tumblr":
                $shareLink = "http://www.tumblr.com/share/link?url=" . urlencode($URL);
                break;
        }
        Return $shareLink;
    }
    static function GetIcon($path, $file)
    {
        $ext = strrchr($file, ".");
        $ext = strtolower($ext);
        $icon = "<i class=\"fa fa-file-o\"></i>";
        if ($ext == ".pdf") {
            $icon = "<i class=\"fa fa-file-pdf-o\" style='color: red;font-size: 20px'></i>";
        }
        if ($ext == '.png' or $ext == '.jpg' or $ext == '.jpeg' or $ext == '.gif') {
            $icon = "<img src='$path/$file' style='width: auto;height: 20px' title=''>";
        }
        if ($ext == ".xls" or $ext == '.xlsx') {
            $icon = "<i class=\"fa fa-file-excel-o\" style='color: green;font-size: 20px'></i>";
        }
        if ($ext == ".ppt" or $ext == '.pptx' or $ext == '.pptm') {
            $icon = "<i class=\"fa fa-file-powerpoint-o\" style='color: #1066E7;font-size: 20px'></i>";
        }
        if ($ext == ".doc" or $ext == '.docx') {
            $icon = "<i class=\"fa fa-file-word-o\" style='color: #0EA8DD;font-size: 20px'></i>";
        }
        if ($ext == ".zip" or $ext == '.rar') {
            $icon = "<i class=\"fa fa-file-zip-o\" style='color: #C8841D;font-size: 20px'></i>";
        }
        if ($ext == ".txt" or $ext == '.rtf') {
            $icon = "<i class=\"fa fa-file-text-o\" style='color: #7573AA;font-size: 20px'></i>";
        }
        if ($ext == ".mp3" or $ext == '.wav') {
            $icon = "<i class=\"fa fa-file-audio-o\" style='color: #8EA657;font-size: 20px'></i>";
        }
        if ($ext == ".mp4" or $ext == '.avi') {
            $icon = "<i class=\"fa fa-file-video-o\" style='color: #D30789;font-size: 20px'></i>";
        }
        return $icon;
    }
    static function URLSlug($url_ar, $url_en, $type = "", $id = 0)
    {
        $Check_SEO_st_ar = true;
        $Check_SEO_st_en = true;
        $seo_url_slug_ar = str_slug($url_ar, '-');
        $seo_url_slug_en = str_slug($url_en, '-');
        $ReservedURLs = array(
            "home",
            "about",
            "privacy",
            "terms",
            "contact",
            "search",
            "comment",
            "order",
            "sitemap"
        );
        if ($type == "section" && $id > 0) {
            // .. ..  Webmaster Sections
            $check_WebmasterSection = WebmasterSection::where([['seo_url_slug_ar', $seo_url_slug_ar], ['id', '!=', $id]])->orWhere([['seo_url_slug_en', $seo_url_slug_ar], ['id', '!=', $id]])->get();
            if (count($check_WebmasterSection) > 0) {
                $Check_SEO_st_ar = false;
            }
            $check_WebmasterSection = WebmasterSection::where([['seo_url_slug_ar', $seo_url_slug_en], ['id', '!=', $id]])->orWhere([['seo_url_slug_en', $seo_url_slug_en], ['id', '!=', $id]])->get();
            if (count($check_WebmasterSection) > 0) {
                $Check_SEO_st_en = false;
            }
        } else {
            // .. ..  Webmaster Sections
            $check_WebmasterSection = WebmasterSection::where('seo_url_slug_ar', $seo_url_slug_ar)->orWhere('seo_url_slug_en', $seo_url_slug_ar)->get();
            if (count($check_WebmasterSection) > 0) {
                $Check_SEO_st_ar = false;
            }
            $check_WebmasterSection = WebmasterSection::where('seo_url_slug_ar', $seo_url_slug_en)->orWhere('seo_url_slug_en', $seo_url_slug_en)->get();
            if (count($check_WebmasterSection) > 0) {
                $Check_SEO_st_en = false;
            }
        }
        if ($type == "category" && $id > 0) {
            // .. ..  Sections
            $check_Section = Section::where([['seo_url_slug_ar', $seo_url_slug_ar], ['id', '!=', $id]])->orWhere([['seo_url_slug_en', $seo_url_slug_ar], ['id', '!=', $id]])->get();
            if (count($check_Section) > 0) {
                $Check_SEO_st_ar = false;
            }
            $check_Section = Section::where([['seo_url_slug_ar', $seo_url_slug_en], ['id', '!=', $id]])->orWhere([['seo_url_slug_en', $seo_url_slug_en], ['id', '!=', $id]])->get();
            if (count($check_Section) > 0) {
                $Check_SEO_st_en = false;
            }
        } else {
            // .. ..  Sections
            $check_Section = Section::where('seo_url_slug_ar', $seo_url_slug_ar)->orWhere('seo_url_slug_en', $seo_url_slug_ar)->get();
            if (count($check_Section) > 0) {
                $Check_SEO_st_ar = false;
            }
            $check_Section = Section::where('seo_url_slug_ar', $seo_url_slug_en)->orWhere('seo_url_slug_en', $seo_url_slug_en)->get();
            if (count($check_Section) > 0) {
                $Check_SEO_st_en = false;
            }
        }
        if ($type == "topic" && $id > 0) {
            // .. ..  Topics
            $check_Topic = Topic::where([['seo_url_slug_ar', $seo_url_slug_ar], ['id', '!=', $id]])->orWhere([['seo_url_slug_en', $seo_url_slug_ar], ['id', '!=', $id]])->get();
            if (count($check_Topic) > 0) {
                $Check_SEO_st_ar = false;
            }
            $check_Topic = Topic::where([['seo_url_slug_ar', $seo_url_slug_en], ['id', '!=', $id]])->orWhere([['seo_url_slug_en', $seo_url_slug_en], ['id', '!=', $id]])->get();
            if (count($check_Topic) > 0) {
                $Check_SEO_st_en = false;
            }
        } else {
            // .. ..  Topics
            $check_Topic = Topic::where('seo_url_slug_ar', $seo_url_slug_ar)->orWhere('seo_url_slug_en', $seo_url_slug_ar)->get();
            if (count($check_Topic) > 0) {
                $Check_SEO_st_ar = false;
            }
            $check_Topic = Topic::where('seo_url_slug_ar', $seo_url_slug_en)->orWhere('seo_url_slug_en', $seo_url_slug_en)->get();
            if (count($check_Topic) > 0) {
                $Check_SEO_st_en = false;
            }
        }
        if (in_array($seo_url_slug_ar, $ReservedURLs)) {
            $Check_SEO_st_ar = false;
        }
        if (in_array($seo_url_slug_en, $ReservedURLs)) {
            $Check_SEO_st_en = false;
        }
        if ($seo_url_slug_ar == "") {
            $Check_SEO_st_ar = true;
        }
        if ($seo_url_slug_en == "") {
            $Check_SEO_st_en = true;
        }
        $ar_slug = "";
        if ($Check_SEO_st_ar) {
            $ar_slug = $seo_url_slug_ar;
        }
        $en_slug = "";
        if ($Check_SEO_st_en) {
            $en_slug = $seo_url_slug_en;
        }
        return array("slug_ar" => $ar_slug, "slug_en" => $en_slug);
    }
}
?>
