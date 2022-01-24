<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Models\Slider;
use App\Models\CatePost;
use Illuminate\Support\Facades\Redirect;

session_start();

class HomeController extends Controller
{

    public function  contact_us(Request $request)
    {
        // ffffffffffffffffffffffffffff     fffffffffff fffffffffffffffff ffffffffffff
        //category post
        $category_post = CatePost::orderBy('cate_post_id', 'DESC')->get();
        //slide
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(4)->get();
        //seo
        $meta_desc = "Chuyên bán những phụ kiện ,thiết bị game";
        $meta_keywords = "thiet bi game,phu kien game,game phu kien,game giai tri";
        $meta_title = "Phụ kiện,máy chơi game chính hãng";
        $url_canonical = $request->url();
        //--seo

        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status', '0')->orderby(DB::raw('RAND()'))->paginate(6);

        return view('pages.contact')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('slider', $slider)->with('category_post', $category_post); //1

        // return view('pages.contact')->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical);
    }

    public function sendMail(Request $request)
    {
        $to_name = $request->name_mail;
        $to_phone = $request->phone_mail;
        $to_comment = $request->comment_mail;
        $to_email = $request->email_mail; //send to this email
        $email = "python.flask.3012@gmail.com"; //send to this email

        // dd($to_email); // mail này là mail từ khách hàng

        // lưu trữ dữ liệu vào db :


        // lưu trữ dữ liệu vào db

        // dd();

        $data = array("name" => $to_name, "body" => $to_comment, "phone" => $to_phone, 'email' => $to_email); //body of mail.blade.php

        Mail::send('pages.sendmail', $data, function ($message) use ($to_email, $email) {
            // $message->from($to_email)->subject('Feedback'); //send this mail with subject
            // $message->to($email, $to_name); //send from this mail

            $message->to($email)->subject('Feedback'); //mail từ phía doanh nghiệp
            $message->from($to_email ); //mail này là khách hàng nhập
        });
        // dd($to_email);
        // dd($email);
        // dd($to_name);
        return redirect()->back()->with('message', 'Phản hồi đã được gửi đi');

    }


    public function error_page()
    {
        return view('errors.404');
    }
    public function send_mail()
    {
        //send mail
        $to_name = "Thành Sang Shopbangiay";
        $to_email = "dovuthanhsang@gmail.com"; //send to this email


        $data = array("name" => "Mail từ tài khoản Khách hàng", "body" => 'Mail gửi về vấn về hàng hóa'); //body of mail.blade.php

        // nó sẽ sử dụng form send_mail này thì từ python.flask sẽ gửi đến dovuthanhsang ( to_name và to_email ) với

        Mail::send('pages.send_mail', $data, function ($message) use ($to_name, $to_email) {

            $message->to($to_email)->subject('Test thử gửi mail google'); //send this mail with subject ( to_email là dovuthanhsang )
            $message->from($to_email, $to_name); //send from this mail ( $to_email là mail dovuthanhsang )
        });
        return redirect('/')->with('message', '');
        //--send mail
    }

    public function index(Request $request)
    {
        //category post
        $category_post = CatePost::orderBy('cate_post_id', 'DESC')->get();
        //slide
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(4)->get();
        //seo
        $meta_desc = "Chuyên bán những phụ kiện ,thiết bị game";
        $meta_keywords = "thiet bi game,phu kien game,game phu kien,game giai tri";
        $meta_title = "Phụ kiện,máy chơi game chính hãng";
        $url_canonical = $request->url();
        //--seo

        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status', '0')->orderby(DB::raw('RAND()'))->paginate(6);

        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('slider', $slider)->with('category_post', $category_post); //1
        // return view('pages.home')->with(compact('cate_product','brand_product','all_product')); //2
    }
    public function search(Request $request)
    {
        //category post
        $category_post = CatePost::orderBy('cate_post_id', 'DESC')->get();
        //slide
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(4)->get();

        //seo
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
        //--seo
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name', 'like', '%' . $keywords . '%')->get();


        return view('pages.sanpham.search')->with('category', $cate_product)->with('brand', $brand_product)->with('search_product', $search_product)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('slider', $slider)->with('category_post', $category_post);
    }
}
