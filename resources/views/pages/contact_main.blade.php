@extends('layout')

@section('content')
<div class=" main-content-area">
    <div class="wrap-contacts ">
        <div class="col-md-7"


        >
            <div class="contact-box contact-form">
                <style>
                    #fcf-form {
    display:block;
}

.fcf-body {
    margin: 0;
    font-family: -apple-system, Arial, sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
    padding: 30px;
    padding-bottom: 10px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    max-width: 100%;
}

.fcf-form-group {
    margin-bottom: 1rem;
}

.fcf-input-group {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100%;
}

.fcf-form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    outline: none;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.fcf-form-control:focus {
    border: 1px solid #313131;
}

select.fcf-form-control[size], select.fcf-form-control[multiple] {
    height: auto;
}

textarea.fcf-form-control {
    font-family: -apple-system, Arial, sans-serif;
    height: auto;
}

label.fcf-label {
    display: inline-block;
    margin-bottom: 0.5rem;
}

.fcf-credit {
    padding-top: 10px;
    font-size: 0.9rem;
    color: #545b62;
}

.fcf-credit a {
    color: #545b62;
    text-decoration: underline;
}

.fcf-credit a:hover {
    color: #0056b3;
    text-decoration: underline;
}

.fcf-btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
    .fcf-btn {
        transition: none;
    }
}

.fcf-btn:hover {
    color: #212529;
    text-decoration: none;
}

.fcf-btn:focus, .fcf-btn.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.fcf-btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.fcf-btn-primary:hover {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
}

.fcf-btn-primary:focus, .fcf-btn-primary.focus {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
}

.fcf-btn-lg, .fcf-btn-group-lg>.fcf-btn {
    padding: 0.5rem 1rem;
    font-size: 1.25rem;
    line-height: 1.5;
    border-radius: 0.3rem;
}

.fcf-btn-block {
    display: block;
    width: 100%;
}

.fcf-btn-block+.fcf-btn-block {
    margin-top: 0.5rem;
}

input[type="submit"].fcf-btn-block, input[type="reset"].fcf-btn-block, input[type="button"].fcf-btn-block {
    width: 100%;
}
                </style>
                <h2 class="title text-center">Liên hệ khách hàng</h2>
                {{-- <form action="{{url('/send-mail')}}" method="post" name="frm-contact">
                @csrf
                    <label for="name" >Tên<span>*</span></label>
                    <input type="text" value="" id="name" name="name_mail" >
                    <br>
                    <label for="email">Email<span>*</span></label>
                    <input type="text" value="" id="email" name="email_mail" >
                    <br>
                    <label for="phone">Số điện thoại</label>
                    <input type="text" value="" id="phone" name="phone_mail" >
                    <br>
                    <label for="comment">Phản hồi</label>
                    <textarea name="comment_mail" id="comment"></textarea>
                    <br>
                    <input type="submit" name="ok" value="Submit" >

                </form> --}}
                <form id="fcf-form-id" class="fcf-form-class" method="post" action="{{url('/send-mail')}}" >
                    @csrf
                    <div class="fcf-form-group">
                        <label for="Name" class="fcf-label">Tên <span>*</span></label>
                        <div class="fcf-input-group" >
                            <input type="text" id="name" name="name_mail" class="fcf-form-control" required style="font-size: 15pt">
                        </div>
                    </div>

                    <div class="fcf-form-group">
                        <label for="Email" class="fcf-label">Email<span>*</span></label>
                        <div class="fcf-input-group">
                            <input type="email" id="email" name="email_mail" class="fcf-form-control" required style="font-size: 15pt">
                        </div>
                    </div>

                    <div class="fcf-form-group">
                        <label for="phone" class="fcf-label">Số điện thoại <span>*</span></label>
                        <div class="fcf-input-group">
                            <input type="text" id="phone" name="phone_mail" class="fcf-form-control" required style="font-size: 15pt">
                        </div>
                    </div>

                    <div class="fcf-form-group">
                        <label for="Message" class="fcf-label">Phản hồi</label>
                        <div class="fcf-input-group">
                            <textarea name="comment_mail" id="comment" class="fcf-form-control"   maxlength="3000" required rows="5" cols="30" style="font-size: 15pt"></textarea>
                        </div>
                    </div>

                    <input type="submit" name="ok" value="Gửi" >

                </form>
            </div>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span style="color: green">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
        </div>
        <div class="col-md-3">
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6913009721957!2d106.65878541474873!3d10.758257492333883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ef1e7cc6567%3A0xda544ab0b2d04471!2zTmd1eeG7hW4gQ2jDrSBUaGFuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1626611432934!5m2!1svi!2s" width="300" height="200" style="border:0;"   allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div>
                <h2 class="box-title"  >Chi tiết</h2>
                <div class="wrap-icon-box">

                    <div class="icon-box-item">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <div class="right-info">
                            <b>Email</b>
                            <p>thanhsang@gmail.com</p>
                        </div>
                    </div>

                    <div class="icon-box-item">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <div class="right-info">
                            <b>Phone</b>
                            <p>0986-208-514</p>
                        </div>
                    </div>

                    <div class="icon-box-item">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <div class="right-info">
                            <b>Mail Office</b>
                            <p>012/345 Thành phố Hồ Chí Minh</p>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div><!--end main products area-->

@endsection
