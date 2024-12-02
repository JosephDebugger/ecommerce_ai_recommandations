@extends('front-master')

@section('content')

<div class="banner_bottom_agile_info">
    <div class="container">
      <div class="contact-grid-agile-w3s">
            <div class="col-md-4 contact-grid-agile-w3">
                    <div class="contact-grid-agile-w31">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h4>Address</h4>
                        <p>Ln 11 Street, 45 Building Road <span>Agrabadh, CTG.</span></p>
                    </div>
                </div>
                <div class="col-md-4 contact-grid-agile-w3">
                    <div class="contact-grid-agile-w32">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h4>Call Us</h4>
                        <p>+8801829151173</p>
                    </div>
                </div>
                <div class="col-md-4 contact-grid-agile-w3">
                    <div class="contact-grid-agile-w33">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <h4>Email</h4>
                        <p><a href="mailto:info@example.com">info@example1.com</a><span><a href="mailto:info@example.com">info@example2.com</a></span></p>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
   </div>
 </div>
   <div class="contact-w3-agile1 map" data-aos="flip-right">
        
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7497568.715992224!2d85.04596142271285!3d23.427176529853078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adaaed80e18ba7%3A0xf2d28e0c4e1fc6b!2sBangladesh!5e0!3m2!1sen!2sbd!4v1722100289203!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   </div>

   <div class="container">
    <div class="agile-contact-grids">
             <div class="agile-contact-left">
                 <div class="col-md-6 address-grid">
                     <h4>For More <span>Information</span></h4>
                         <div class="mail-agileits-w3layouts">
                             <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                             <div class="contact-right">
                                 <p>Phne </p><span>+8801829151173</span>
                             </div>
                             <div class="clearfix"> </div>
                         </div>
                         <div class="mail-agileits-w3layouts">
                             <i class="fa fa-envelope-o" aria-hidden="true"></i>
                             <div class="contact-right">
                                 <p>Mail </p><a href="mailto:info@example.com">info@example.com</a>
                             </div>
                             <div class="clearfix"> </div>
                         </div>
                         <div class="mail-agileits-w3layouts">
                             <i class="fa fa-map-marker" aria-hidden="true"></i>
                             <div class="contact-right">
                                 <p>Location</p><span>Ln 11 Street, 45 Building Road, Agrabadh, CTG.</span>
                             </div>
                             <div class="clearfix"> </div>
                         </div>
                         <ul class="social-nav model-3d-0 footer-social w3_agile_social two contact">
                                                       <li class="share">SHARE ON : </li>
                                                         <li><a href="#" class="facebook">
                                                               <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                                               <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                                                         <li><a href="#" class="twitter"> 
                                                               <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                                               <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                                                         <li><a href="#" class="instagram">
                                                               <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                                               <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                                                         <li><a href="#" class="pinterest">
                                                               <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                                               <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
                                                     </ul>
                 </div>
                 <div class="col-md-6 contact-form">
                     <h4 class="white-w3ls">Contact <span>Form</span></h4>
                     <form action="{{route('save-user-msg')}}" method="post">
                        @csrf
                         <div class="styled-input agile-styled-input-top">
                             <input type="text" name="name" required="">
                             <label>Name</label>
                             <span></span>
                         </div>
                         <div class="styled-input">
                             <input type="email" name="email" required=""> 
                             <label>Email</label>
                             <span></span>
                         </div> 
                         <div class="styled-input">
                             <input type="text" name="subject" required="">
                             <label>Subject</label>
                             <span></span>
                         </div>
                         <div class="styled-input">
                             <textarea name="message" required=""></textarea>
                             <label>Message</label>
                             <span></span>
                         </div>	 
                         <input type="submit" value="SEND">
                     </form>
                 </div>
             </div>
             <div class="clearfix"> </div>
         </div>
    </div>
 </div>
    @endsection

