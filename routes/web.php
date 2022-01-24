<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryPost;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\VideoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/404', [HomeController::class, 'error_page']);
Route::post('/tim-kiem', [HomeController::class, 'search']);
// tim kiem san pham Admin:
Route::post('/tim-kiem-admin', [AdminController::class, 'search_product_admin']);

//post
Route::get('/add-post', [PostController::class, 'add_post']);
Route::post('/save-post', [PostController::class, 'save_post']);
// Route::get('/list-post', [PostController::class, 'list_post']);
Route::get('/all-post',[PostController::class, 'all_post']);
Route::get('/edit-post/{post_id}', [PostController::class, 'edit_post']);
Route::post('/update-post/{post_id}', [PostController::class, 'update_post']);

Route::get('/delete-post/{post_id}', [PostController::class, 'delete_post']);

Route::get('/tin-tuc/{cate_post_slug}', [PostController::class, 'tintuc']);
Route::get('/tin-tuc', [CategoryProduct::class, 'tintuc']);

//Bai viet
Route::get('/danh-muc-bai-viet/{post_slug}',[PostController::class, 'danh_muc_bai_viet']);
Route::get('/bai-viet/{post_slug}',[PostController::class, 'bai_viet']);

////// post

// contact-us
Route::get('/contact-us', [HomeController::class, 'contact_us']);
Route::post('/send-mail', [HomeController::class, 'sendMail']);
// sau khi send mail và nhận được mail từ khách hàng thì sẽ lưu vào trong db: tên, mail, bình luận, sđt, phản hồi

// liên lạc ( dạng comment )
Route::post('/load-comment', [ProductController::class, 'load_comment']);
Route::post('/send-comment',[ProductController::class, 'send_comment']);
Route::get('/comment', [MailController::class, 'list_comment']);
Route::post('/reply-comment', [ProductController::class, 'reply_comment']);


// liên lạc ( dạng comment )


//Danh muc san pham trang chu
Route::get('/danh-muc/{slug_category_product}', [CategoryProduct::class, 'show_category_home']);
Route::get('/thuong-hieu/{brand_slug}', [BrandProduct::class, 'show_brand_home']);
Route::get('/chi-tiet/{product_slug}', [ProductController::class, 'details_product']);

//Backend
Route::get('/admin', [AuthController::class, 'login_auth']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);


//Category Product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);

Route::post('/export-csv', [CategoryProduct::class, 'export_csv']);
Route::post('/import-csv', [CategoryProduct::class, 'import_csv']);



Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']); //

//Send Mail
Route::get('/send-mail', [HomeController::class, 'send_mail']);

//Login facebook
Route::get('/login-facebook', [AdminController::class, 'login_facebook']);
Route::get('/admin/callback', [AdminController::class, 'callback_facebook']);

//Login google
Route::get('/login-google', [AdminController::class, 'login_google']);
Route::get('/google/callback', [AdminController::class, 'callback_google']);

Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product']);

//Brand Product
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product']);


Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);

Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);


//Product
// Route::group(['middleware' => 'auth.roles', 'auth.roles' => ['admin', 'author']], function () {
Route::group(['middleware' => 'auth.roles'], function () { // nếu mà có Middleware rồi thì xóa dòng này:'auth.roles' => ['admin', 'author']

    Route::get('/add-product', [ProductController::class, 'add_product']);
    Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
    Route::get('/all-product', [ProductController::class, 'all_product']);
}); // nếu 'auth.roles' có quyền admin/author thì có quyền thêm sp và edit sp và vào đc user -> index ở dưới
// --> cái ở trên là mình cho vào 1 cái group
// Còn này là mình cho từng cái: ->middleware('auth.roles')
Route::get('/users', [UserController::class, 'index']);
// Route::get('users',
// 		[
// 			'uses'=>'UserController@index',
// 			'as'=> 'Users',
// 			'middleware'=> 'roles'
// 			// 'roles' => ['admin','author']
// 		]);
// Route::get('add-users','UserController@add_users');
// Route::post('store-users','UserController@store_users');
// Route::post('assign-roles','UserController@assign_roles');  ->middleware('auth.roles')

Route::get('/add-users', [UserController::class, 'add_users']);
Route::get('/delete-user-roles/{admin_id}', [UserController::class, 'delete_user_roles']); //->middleware('auth.roles')
Route::post('/store-users', [UserController::class, 'store_users']);
Route::post('/assign-roles', [UserController::class, 'assign_roles']); //->middleware('auth.roles');
Route::get('/impersonate/{admin_id}', [UserController::class, 'impersonate']);
Route::get('/impersonate-destroy', [UserController::class, 'impersonate_destroy']);


Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);

//Coupon
Route::post('/check-coupon', [CartController::class, 'check_coupon']);

Route::get('/unset-coupon', [CouponController::class, 'unset_coupon']);
Route::get('/insert-coupon', [CouponController::class, 'insert_coupon']);
Route::get('/delete-coupon/{coupon_id}', [CouponController::class, 'delete_coupon']);
Route::get('/list-coupon', [CouponController::class, 'list_coupon']);
Route::post('/insert-coupon-code', [CouponController::class, 'insert_coupon_code']);

//Cart
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);  /////  sửa lại thành add_cart_ajax
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/gio-hang', [CartController::class, 'gio_hang']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::get('/del-product/{session_id}', [CartController::class, 'delete_product']);
Route::get('/del-all-product', [CartController::class, 'delete_all_product']); /////  sửa lại thành delete_all_product


Route::get('/show-cart-menu', [CartController::class, 'show_cart_menu']);

//Checkout
Route::get('/dang-nhap', [CheckoutController::class, 'login_checkout']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);

Route::get('/del-fee', [CheckoutController::class, 'del_fee']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);

Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
Route::post('/calculate-fee', [CheckoutController::class, 'calculate_fee']);
Route::post('/select-delivery-home', [CheckoutController::class, 'select_delivery_home']);
Route::post('/confirm-order', [CheckoutController::class, 'confirm_order']);


//Order
Route::get('/delete-order/{order_code}', [OrderController::class, 'order_code']);
Route::get('/print-order/{checkout_code}', [OrderController::class, 'print_order']);
Route::get('/manage-order', [OrderController::class, 'manage_order']);
Route::get('/view-order/{order_code}', [OrderController::class, 'view_order']);
Route::post('/update-order-qty', [OrderController::class, 'update_order_qty']);
Route::post('/update-qty', [OrderController::class, 'update_qty']);
Route::get('/history', [OrderController::class, 'history']);
Route::get('/view-history-order/{order_code}', [OrderController::class, 'view_history_order']);



//Delivery
Route::get('/delivery', [DeliveryController::class, 'delivery']);
Route::post('/select-delivery', [DeliveryController::class, 'select_delivery']);
Route::post('/insert-delivery', [DeliveryController::class, 'insert_delivery']);
Route::post('/select-feeship', [DeliveryController::class, 'select_feeship']);
Route::post('/update-delivery', [DeliveryController::class, 'update_delivery']);

//Banner
Route::get('/manage-slider', [SliderController::class, 'manage_slider']);
Route::get('/add-slider', [SliderController::class, 'add_slider']);
Route::get('/delete-slider/{slide_id}', [SliderController::class, 'delete_slider']);
Route::post('/insert-slider', [SliderController::class, 'insert_slider']);
Route::get('/unactive-slider/{slider_id}', [SliderController::class, 'unactive_slider']);
Route::get('/active-slider/{slider_id}', [SliderController::class, 'active_slider']); // category_product_id cái này nó không phải là biến nên kh có dấu $

// Authentication roles
Route::get('/register-auth', [AuthController::class, 'register_auth']);
Route::get('/login-auth', [AuthController::class, 'login_auth']);
Route::get('/logout-auth', [AuthController::class, 'logout_auth']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// Chart in Admin
Route::post('/filter-by-date',[AdminController::class, 'filter_by_date']);
Route::post('/days-order',[AdminController::class, 'days_order']);
Route::post('/dashboard-filter',[AdminController::class, 'dashboard_filter']);

//Send Mail
Route::get('/send-coupon-vip/{coupon_time}/{coupon_condition}/{coupon_number}/{coupon_code}',
[MailController::class, 'send_coupon_vip']);
Route::get('/send-coupon/{coupon_time}/{coupon_condition}/{coupon_number}/{coupon_code}',[MailController::class, 'send_coupon']);

Route::get('/send-coupon',[MailController::class, 'send_coupon']);


// Route::get('/quen-mat-khau',[MailController::class, 'quen_mat_khau']);
// Route::get('/update-new-pass',[MailController::class, 'update_new_pass']);
// Route::post('/recover-pass',[MailController::class, 'recover_pass']);
// Route::post('/reset-new-pass',[MailController::class, 'reset_new_pass']);


Route::get('/send-mail-example', [MailController::class, 'send_mail_example']);
Route::get('/send-mail',[MailController::class, 'send_mail']);
