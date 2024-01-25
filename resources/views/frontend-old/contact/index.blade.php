@extends('frontend.layouts.default')

@section('content')
<main>
    <!-- contact-area-start -->
    <section class="contact-area contact-bg pt-200">
       <div class="container">
          <div class="row">
             <div class="col-xl-5 col-lg-6">
                <div class="contact-content mb-30">
                   <h4 class="contact-title">Hằng Nga Media</h4>
                   <p>Bạn đang quan tâm về những dịch vụ của Hằng Nga Media. <br> 
                    Liên hệ ngay với chúng tôi để được tư vấn miễn phí.!</p>
                   <div class="contact-info">
                      <a href="mailto:{{ setting('site.email') }}" class="contact-mail mb-15">
                         <span>
                            <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path opacity="0.5" d="M21 0.5L11 10.2778L1 0.5H21Z" fill="#9A9DB0"></path>
                               <path d="M21 0.5L11 10.2778L1 0.5" stroke="#565764" stroke-linecap="round" stroke-linejoin="round"></path>
                               <path d="M1 0.5H21V15.6111C21 15.8469 20.9122 16.073 20.7559 16.2397C20.5996 16.4064 20.3877 16.5 20.1667 16.5H1.83333C1.61232 16.5 1.40036 16.4064 1.24408 16.2397C1.0878 16.073 1 15.8469 1 15.6111V0.5Z" stroke="#565764" stroke-linecap="round" stroke-linejoin="round"></path>
                               <path d="M9.18229 8.5L1.26562 16.2444" stroke="#565764" stroke-linecap="round" stroke-linejoin="round"></path>
                               <path d="M20.7526 16.2444L12.8359 8.5" stroke="#565764" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                         </span>
                         {{ setting('site.email') }}
                         <i>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M1 7H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                               <path d="M7 1L13 7L7 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                         </i>
                      </a>
                      <a href="tel:{{ setting('site.phone') }}" class="contact-mail mb-20">
                         <span>
                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path opacity="0.5" d="M6.71695 10.5688C7.61339 12.4201 9.11031 13.9131 10.9638 14.8048C11.1005 14.8696 11.2518 14.8976 11.4026 14.8861C11.5535 14.8747 11.6987 14.8241 11.8241 14.7395L14.5464 12.921C14.6667 12.8394 14.8057 12.7896 14.9504 12.7763C15.0951 12.7629 15.2409 12.7865 15.374 12.8447L20.4703 15.0335C20.6445 15.106 20.79 15.2337 20.8844 15.3971C20.9789 15.5604 21.017 15.7502 20.993 15.9373C20.8315 17.198 20.2161 18.3567 19.2621 19.1965C18.308 20.0363 17.0806 20.4997 15.8096 20.5C11.8819 20.5 8.11498 18.9397 5.33764 16.1624C2.5603 13.385 1 9.61813 1 5.69038C1.00029 4.41936 1.46369 3.192 2.30349 2.23795C3.1433 1.2839 4.30196 0.668537 5.56267 0.507012C5.74979 0.482975 5.93963 0.521118 6.10294 0.615565C6.26626 0.710013 6.394 0.855529 6.46649 1.0297L8.65527 6.13685C8.71219 6.2679 8.736 6.41094 8.7246 6.55336C8.71321 6.69578 8.66696 6.83322 8.58993 6.95355L6.7714 9.71947C6.69043 9.84457 6.64292 9.98835 6.63338 10.1371C6.62385 10.2858 6.65262 10.4344 6.71695 10.5688Z" fill="#9A9DB0"></path>
                               <path d="M6.71695 10.5688C7.61339 12.4201 9.11031 13.9131 10.9638 14.8048C11.1005 14.8696 11.2518 14.8976 11.4026 14.8861C11.5535 14.8747 11.6987 14.8241 11.8241 14.7395L14.5464 12.921C14.6667 12.8394 14.8057 12.7896 14.9504 12.7763C15.0951 12.7629 15.2409 12.7865 15.374 12.8447L20.4703 15.0335C20.6445 15.106 20.79 15.2337 20.8844 15.3971C20.9789 15.5604 21.017 15.7502 20.993 15.9373C20.8315 17.198 20.2161 18.3567 19.2621 19.1965C18.308 20.0363 17.0806 20.4997 15.8096 20.5C11.8819 20.5 8.11498 18.9397 5.33764 16.1624C2.5603 13.385 1 9.61813 1 5.69038C1.00029 4.41936 1.46369 3.192 2.30349 2.23795C3.1433 1.2839 4.30196 0.668537 5.56267 0.507012C5.74979 0.482975 5.93963 0.521118 6.10294 0.615565C6.26626 0.710013 6.394 0.855529 6.46649 1.0297L8.65527 6.13685C8.71219 6.2679 8.736 6.41094 8.7246 6.55336C8.71321 6.69578 8.66696 6.83322 8.58993 6.95355L6.7714 9.71947C6.69043 9.84457 6.64292 9.98835 6.63338 10.1371C6.62385 10.2858 6.65262 10.4344 6.71695 10.5688Z" stroke="#565764" stroke-linecap="round" stroke-linejoin="round"></path>
                               <path d="M14 1.33203C15.4776 1.7286 16.825 2.50684 17.9068 3.58866C18.9886 4.67048 19.7669 6.01781 20.1634 7.49545" stroke="#565764" stroke-linecap="round" stroke-linejoin="round"></path>
                               <path d="M13.0859 4.70312C13.9746 4.93915 14.7852 5.40591 15.4354 6.05611C16.0856 6.7063 16.5523 7.51682 16.7883 8.40553" stroke="#565764" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                         </span>
                         +84 {{ setting('site.phone') }}
                         <i>
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M1 7H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                               <path d="M7 1L13 7L7 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                         </i>
                      </a>
                   </div>
                   <div class="contact-social">
                        <a target="_blank" href="{{ setting('social.link_page_facebook') }}"><i class="fa-brands fa-facebook-f"></i></a>
                        <a target="_blank" href="{{ setting('social.link_pinterest') }}"><i class="fa-brands fa-pinterest"></i></a>
                        <a target="_blank" href="{{ setting('social.link_behance') }}"><i class="fa-brands fa-behance"></i></a>
                   </div>
                </div>
             </div>
             <div class="offset-xl-1 col-xl-6 col-lg-6">
                <div class="contact-form">
                   <h4 class="contact-form-title">Để lại lời nhắn.!</h4>
                   <form action="{{ route('advises') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service" id="" value="Liên hệ">
                        <div class="contact-form-input">
                            <input name="name" type="text" placeholder="Họ tên" required>
                        </div>
                        <div class="contact-form-input">
                            <input name="email" type="email" placeholder="Email">
                        </div>
                        <div class="contact-form-input">
                            <input name="phone" type="text" placeholder="Số điện thoại" required>
                        </div>
                        <div class="contact-form-input">
                            <textarea name="content" placeholder="Nhập lời nhắn của bạn.."></textarea>
                        </div>
                        <div class="contact-form-btn">
                            <button type="submit" class="tp-btn">Gửi đi</button>
                        </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- contact-area-end -->

    <!-- map-area-start -->
    <section class="map-area map-wrapper">
       <div class="container">
          <div class="row">
             <div class="col-xl-6 col-lg-6">
                <div class="map-wrap">
                   <div class="map-content">
                      <span>VĂN PHÒNG CỦA CHÚNG TÔI</span>
                      <h4 class="map-title">Ghé thăm văn phòng của Hằng Nga Media ngay nào.!</h4>
                   </div>
                   <ul>
                      <li>
                         <div class="location">
                            <div class="location-icon">
                               <span>
                                  <svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path opacity="0.5" d="M10 1C7.61305 1 5.32387 1.92133 3.63604 3.56133C1.94821 5.20132 1 7.42564 1 9.74497C1 17.6154 10 23.7368 10 23.7368C10 23.7368 19 17.6154 19 9.74497C19 7.42564 18.0518 5.20132 16.3639 3.56133C14.6761 1.92133 12.387 1 10 1ZM10 13.2429C9.28799 13.2429 8.59196 13.0377 7.99994 12.6534C7.40793 12.269 6.94651 11.7227 6.67404 11.0836C6.40155 10.4444 6.33026 9.74108 6.46918 9.06248C6.60808 8.38398 6.95094 7.7607 7.45441 7.27149C7.95788 6.78229 8.59934 6.44915 9.29768 6.31418C9.99602 6.17921 10.7198 6.24848 11.3777 6.51323C12.0355 6.77798 12.5977 7.22633 12.9933 7.80157C13.3888 8.37681 13.6 9.0531 13.6 9.74497C13.6 10.6726 13.2207 11.5624 12.5456 12.2184C11.8705 12.8744 10.9548 13.2429 10 13.2429Z" fill="#9A9DB0"></path>
                                     <path d="M10.0004 13.2397C11.9887 13.2397 13.6004 11.6737 13.6004 9.74178C13.6004 7.80987 11.9887 6.24377 10.0004 6.24377C8.01217 6.24377 6.40039 7.80987 6.40039 9.74178C6.40039 11.6737 8.01217 13.2397 10.0004 13.2397Z" stroke="#565764" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                     <path d="M19 9.74497C19 17.6154 10 23.7368 10 23.7368C10 23.7368 1 17.6154 1 9.74497C1 7.42564 1.94821 5.20132 3.63604 3.56133C5.32387 1.92133 7.61305 1 10 1C12.387 1 14.6761 1.92133 16.3639 3.56133C18.0518 5.20132 19 7.42564 19 9.74497Z" stroke="#565764" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                  </svg>
                               </span>
                            </div>
                            <div class="location-content">
                               <h4 class="location-title">Hằng Nga Media</h4>
                               <p><a target="_blank" href="{{ setting('site.link_google_map') }}">{{ setting('site.address') }}</a></p>
                            </div>
                         </div>
                      </li>
                   </ul>
                </div>
             </div>
             <div class="col-xl-6 col-lg-6">
                <div class="map-bg">
                   {!! setting('site.code_google_map') !!}
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- map-area-end -->

 </main>
@endsection
