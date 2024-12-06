@extends('front-master')

@section('content')
<style>
/* .sideNav { text-align: left; color: 	#7D8085; padding: 20px 0 0 0px; width: 150px; }
.sideNav li { 
	font-weight: bold; 
	margin: 5px 0 5px 0px; 
	padding: 0px 0 0 0px; 
	border-bottom: 1px solid #ccc; 
	height: 25px; background: url(li.png) no-repeat left;
}
.sideNav li a { color: #546078; text-decoration: none;  padding: 5px 0 0 10px; display: block; height: 25px;}
.sideNav li a:hover { color: #FFF; text-decoration: none; background: #A90000; display: block; height: 25px;}

/* MAIN
---------------------------------------------------------------------------------------------------------------------------------------------------*/
/* #main { background: #FFF; width: 765px; margin: 0 10px 0 10px; color: #808080; }  
#main .left_side { 
	padding:0px 0 0 10px; margin:0;
	width: 180px; 
	background: url(mright.png) no-repeat right; 
	min-height: 505px;  
}

#main .left_side .hitems { margin: 0; 	padding: 0; }
#main .left_side .hitems ul { 
	margin: 5px 0 5px 0; 
	padding : 0; 
	color: #a90000;
	list-style-image: url(arrow.gif);
}
	
#main .left_side .hitems li { 
	margin: 0 0 2px 20px;
	padding: 0 0 0 0px;
	color: #555;
	 
}

#main .right_side { float: right; width: 550px; background: #FFF; padding:15px 15px 0 0; margin:0; }
#main h3 { font: 85% Arial, Sans-Serif; margin: 0 0 10px 0; padding: 0; color: #5f5f5f; background: inherit; 
			border-bottom: 1px solid #FEAB06;
}

#main .box  {	background: #efefef; padding: 5px; border: 1px solid #ccc;}

#main .right_side ul { 
	margin: 5px 0 5px 0; 
	padding : 0; 
	list-style : none; 
	border-bottom: 0px solid #eee; 
	list-style-type: square;
	color: #a90000;
}
	 */
/* #main .right_side li { 
	margin: 0 0 2px 15px;
	padding: 0 0 0 0px;
	color: #555;
} */


background:#f9f9fb;    
}
.view-account{
background:#FFFFFF; 
margin-top:20px;
}
.view-account .pro-label {
font-size: 13px;
padding: 4px 5px;
position: relative;
top: -5px;
margin-left: 10px;
display: inline-block
}

.view-account .side-bar {
padding-bottom: 30px
}

.view-account .side-bar .user-info {
text-align: center;
margin-bottom: 15px;
padding: 30px;
color: #616670;
border-bottom: 1px solid #f3f3f3
}

.view-account .side-bar .user-info .img-profile {
width: 120px;
height: 120px;
margin-bottom: 15px
}

.view-account .side-bar .user-info .meta li {
margin-bottom: 10px
}

.view-account .side-bar .user-info .meta li span {
display: inline-block;
width: 100px;
margin-right: 5px;
text-align: right
}

.view-account .side-bar .user-info .meta li a {
color: #616670
}

.view-account .side-bar .user-info .meta li.activity {
color: #a2a6af
}

.view-account .side-bar .side-menu {
text-align: center
}

.view-account .side-bar .side-menu .nav {
display: inline-block;
margin: 0 auto
}

.view-account .side-bar .side-menu .nav>li {
font-size: 14px;
margin-bottom: 0;
border-bottom: none;
display: inline-block;
float: left;
margin-right: 15px;
margin-bottom: 15px
}

.view-account .side-bar .side-menu .nav>li:last-child {
margin-right: 0
}

.view-account .side-bar .side-menu .nav>li>a {
display: inline-block;
color: #9499a3;
padding: 5px;
border-bottom: 2px solid transparent
}

.view-account .side-bar .side-menu .nav>li>a:hover {
color: #616670;
background: none
}

.view-account .side-bar .side-menu .nav>li.active a {
color: #40babd;
border-bottom: 2px solid #40babd;
background: none;
border-right: none
}

.theme-2 .view-account .side-bar .side-menu .nav>li.active a {
color: #6dbd63;
border-bottom-color: #6dbd63
}

.theme-3 .view-account .side-bar .side-menu .nav>li.active a {
color: #497cb1;
border-bottom-color: #497cb1
}

.theme-4 .view-account .side-bar .side-menu .nav>li.active a {
color: #ec6952;
border-bottom-color: #ec6952
}

.view-account .side-bar .side-menu .nav>li .icon {
display: block;
font-size: 24px;
margin-bottom: 5px
}

.view-account .content-panel {
padding: 30px
}

.view-account .content-panel .title {
margin-bottom: 15px;
margin-top: 0;
font-size: 18px
}

.view-account .content-panel .fieldset-title {
padding-bottom: 15px;
border-bottom: 1px solid #eaeaf1;
margin-bottom: 30px;
color: #616670;
font-size: 16px
}

.view-account .content-panel .avatar .figure img {
float: right;
width: 64px
}

.view-account .content-panel .content-header-wrapper {
position: relative;
margin-bottom: 30px
}

.view-account .content-panel .content-header-wrapper .actions {
position: absolute;
right: 0;
top: 0
}

.view-account .content-panel .content-utilities {
position: relative;
margin-bottom: 30px
}

.view-account .content-panel .content-utilities .btn-group {
margin-right: 5px;
margin-bottom: 15px
}

.view-account .content-panel .content-utilities .fa {
font-size: 16px;
margin-right: 0
}

.view-account .content-panel .content-utilities .page-nav {
position: absolute;
right: 0;
top: 0
}

.view-account .content-panel .content-utilities .page-nav .btn-group {
margin-bottom: 0
}

.view-account .content-panel .content-utilities .page-nav .indicator {
color: #a2a6af;
margin-right: 5px;
display: inline-block
}

.view-account .content-panel .mails-wrapper .mail-item {
position: relative;
padding: 10px;
border-bottom: 1px solid #f3f3f3;
color: #616670;
overflow: hidden
}

.view-account .content-panel .mails-wrapper .mail-item>div {
float: left
}

.view-account .content-panel .mails-wrapper .mail-item .icheck {
background-color: #fff
}

.view-account .content-panel .mails-wrapper .mail-item:hover {
background: #f9f9fb
}

.view-account .content-panel .mails-wrapper .mail-item:nth-child(even) {
background: #fcfcfd
}

.view-account .content-panel .mails-wrapper .mail-item:nth-child(even):hover {
background: #f9f9fb
}

.view-account .content-panel .mails-wrapper .mail-item a {
color: #616670
}

.view-account .content-panel .mails-wrapper .mail-item a:hover {
color: #494d55;
text-decoration: none
}

.view-account .content-panel .mails-wrapper .mail-item .checkbox-container,
.view-account .content-panel .mails-wrapper .mail-item .star-container {
display: inline-block;
margin-right: 5px
}

.view-account .content-panel .mails-wrapper .mail-item .star-container .fa {
color: #a2a6af;
font-size: 16px;
vertical-align: middle
}

.view-account .content-panel .mails-wrapper .mail-item .star-container .fa.fa-star {
color: #f2b542
}

.view-account .content-panel .mails-wrapper .mail-item .star-container .fa:hover {
color: #868c97
}

.view-account .content-panel .mails-wrapper .mail-item .mail-to {
display: inline-block;
margin-right: 5px;
min-width: 120px
}

.view-account .content-panel .mails-wrapper .mail-item .mail-subject {
display: inline-block;
margin-right: 5px
}

.view-account .content-panel .mails-wrapper .mail-item .mail-subject .label {
margin-right: 5px
}

.view-account .content-panel .mails-wrapper .mail-item .mail-subject .label:last-child {
margin-right: 10px
}

.view-account .content-panel .mails-wrapper .mail-item .mail-subject .label a,
.view-account .content-panel .mails-wrapper .mail-item .mail-subject .label a:hover {
color: #fff
}

.view-account .content-panel .mails-wrapper .mail-item .mail-subject .label-color-1 {
background: #f77b6b
}

.view-account .content-panel .mails-wrapper .mail-item .mail-subject .label-color-2 {
background: #58bbee
}

.view-account .content-panel .mails-wrapper .mail-item .mail-subject .label-color-3 {
background: #f8a13f
}

.view-account .content-panel .mails-wrapper .mail-item .mail-subject .label-color-4 {
background: #ea5395
}

.view-account .content-panel .mails-wrapper .mail-item .mail-subject .label-color-5 {
background: #8a40a7
}

.view-account .content-panel .mails-wrapper .mail-item .time-container {
display: inline-block;
position: absolute;
right: 10px;
top: 10px;
color: #a2a6af;
text-align: left
}

.view-account .content-panel .mails-wrapper .mail-item .time-container .attachment-container {
display: inline-block;
color: #a2a6af;
margin-right: 5px
}

.view-account .content-panel .mails-wrapper .mail-item .time-container .time {
display: inline-block;
text-align: right
}

.view-account .content-panel .mails-wrapper .mail-item .time-container .time.today {
font-weight: 700;
color: #494d55
}

.drive-wrapper {
padding: 15px;
background: #f5f5f5;
overflow: hidden
}

.drive-wrapper .drive-item {
width: 130px;
margin-right: 15px;
display: inline-block;
float: left
}

.drive-wrapper .drive-item:hover {
box-shadow: 0 1px 5px rgba(0, 0, 0, .1);
z-index: 1
}

.drive-wrapper .drive-item-inner {
padding: 15px
}

.drive-wrapper .drive-item-title {
margin-bottom: 15px;
max-width: 100px;
white-space: nowrap;
overflow: hidden;
text-overflow: ellipsis
}

.drive-wrapper .drive-item-title a {
color: #494d55
}

.drive-wrapper .drive-item-title a:hover {
color: #40babd
}

.theme-2 .drive-wrapper .drive-item-title a:hover {
color: #6dbd63
}

.theme-3 .drive-wrapper .drive-item-title a:hover {
color: #497cb1
}

.theme-4 .drive-wrapper .drive-item-title a:hover {
color: #ec6952
}

.drive-wrapper .drive-item-thumb {
width: 100px;
height: 80px;
margin: 0 auto;
color: #616670
}

.drive-wrapper .drive-item-thumb a {
-webkit-opacity: .8;
-moz-opacity: .8;
opacity: .8
}

.drive-wrapper .drive-item-thumb a:hover {
-webkit-opacity: 1;
-moz-opacity: 1;
opacity: 1
}

.drive-wrapper .drive-item-thumb .fa {
display: inline-block;
font-size: 36px;
margin: 0 auto;
margin-top: 20px
}

.drive-wrapper .drive-item-footer .utilities {
margin-bottom: 0
}

.drive-wrapper .drive-item-footer .utilities li:last-child {
padding-right: 0
}

.drive-list-view .name {
width: 60%
}

.drive-list-view .name.truncate {
max-width: 100px;
white-space: nowrap;
overflow: hidden;
text-overflow: ellipsis
}

.drive-list-view .type {
width: 15px
}

.drive-list-view .date,
.drive-list-view .size {
max-width: 60px;
white-space: nowrap;
overflow: hidden;
text-overflow: ellipsis
}

.drive-list-view a {
color: #494d55
}

.drive-list-view a:hover {
color: #40babd
}

.theme-2 .drive-list-view a:hover {
color: #6dbd63
}

.theme-3 .drive-list-view a:hover {
color: #497cb1
}

.theme-4 .drive-list-view a:hover {
color: #ec6952
}

.drive-list-view td.date,
.drive-list-view td.size {
color: #a2a6af
}

@media (max-width:767px) {
.view-account .content-panel .title {
    text-align: center
}
.view-account .side-bar .user-info {
    padding: 0
}
.view-account .side-bar .user-info .img-profile {
    width: 60px;
    height: 60px
}
.view-account .side-bar .user-info .meta li {
    margin-bottom: 5px
}
.view-account .content-panel .content-header-wrapper .actions {
    position: static;
    margin-bottom: 30px
}
.view-account .content-panel {
    padding: 0
}
.view-account .content-panel .content-utilities .page-nav {
    position: static;
    margin-bottom: 15px
}
.drive-wrapper .drive-item {
    width: 100px;
    margin-right: 5px;
    float: none
}
.drive-wrapper .drive-item-thumb {
    width: auto;
    height: 54px
}
.drive-wrapper .drive-item-thumb .fa {
    font-size: 24px;
    padding-top: 0
}
.view-account .content-panel .avatar .figure img {
    float: none;
    margin-bottom: 15px
}
.view-account .file-uploader {
    margin-bottom: 15px
}
.view-account .mail-subject {
    max-width: 100px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
}
.view-account .content-panel .mails-wrapper .mail-item .time-container {
    position: static
}
.view-account .content-panel .mails-wrapper .mail-item .time-container .time {
    width: auto;
    text-align: left
}
}

@media (min-width:768px) {
.view-account .side-bar .user-info {
    padding: 0;
    padding-bottom: 15px
}
.view-account .mail-subject .subject {
    max-width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
}
}

@media (min-width:992px) {
.view-account .content-panel {
    min-height: 800px;
    border-left: 1px solid #f3f3f7;
    margin-left: 200px
}
.view-account .mail-subject .subject {
    max-width: 280px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
}
.view-account .side-bar {
    position: absolute;
    width: 200px;
    min-height: 600px
}
.view-account .side-bar .user-info {
    margin-bottom: 0;
    border-bottom: none;
    padding: 30px
}
.view-account .side-bar .user-info .img-profile {
    width: 120px;
    height: 120px
}
.view-account .side-bar .side-menu {
    text-align: left
}
.view-account .side-bar .side-menu .nav {
    display: block
}
.view-account .side-bar .side-menu .nav>li {
    display: block;
    float: none;
    font-size: 14px;
    border-bottom: 1px solid #f3f3f7;
    margin-right: 0;
    margin-bottom: 0
}
.view-account .side-bar .side-menu .nav>li>a {
    display: block;
    color: #9499a3;
    padding: 10px 15px;
    padding-left: 30px
}
.view-account .side-bar .side-menu .nav>li>a:hover {
    background: #f9f9fb
}
.view-account .side-bar .side-menu .nav>li.active a {
    background: #f9f9fb;
    border-right: 4px solid #40babd;
    border-bottom: none
}
.theme-2 .view-account .side-bar .side-menu .nav>li.active a {
    border-right-color: #6dbd63
}
.theme-3 .view-account .side-bar .side-menu .nav>li.active a {
    border-right-color: #497cb1
}
.theme-4 .view-account .side-bar .side-menu .nav>li.active a {
    border-right-color: #ec6952
}
.view-account .side-bar .side-menu .nav>li .icon {
    font-size: 24px;
    vertical-align: middle;
    text-align: center;
    width: 40px;
    display: inline-block
}
}

    </style>

    {{-- <div class="container">

   
<div id="main">
    <div class="right_side">
      <h2><a href="#">sNews 1.5 !</a></h2>
      <h3>TRY THIS TEMPLATE WITH SNEWS 1.5</h3>
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer euismod ante non diam. Sed eleifend odio sed quam. Sed vulputate, turpis at tincidunt porttitor, est elit consequat metus, non dignissim augue mauris quis arcu. Phasellus faucibus blandit eros. Curabitur porttitor ante non est. Maecenas dolor. Aenean egestas sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Sed suscipit, nisi sit amet pharetra malesuada, sem velit laoreet sem, vitae iaculis diam neque consequat est. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque tincidunt eros non quam. Mauris a magna sit amet libero accumsan auctor. Aenean nec urna non dui lobortis viverra...
      <p class="date">Posted by David <img src="images/more.gif" alt="" /> <a href="#">Read more</a> <img src="images/comment.gif" alt="" /> <a href="#">Comments (3)</a> <img src="images/timeicon.gif" alt="" /> 21.02.</p>
      <br />
      <h2><a href="#">Free Css Templates</a></h2>
      <h3>FREE CSS / XHTML TEMPLATES</h3>
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer euismod ante non diam. Sed eleifend odio sed quam. Sed vulputate, turpis at tincidunt porttitor, est elit consequat metus, non dignissim augue mauris quis arcu. Phasellus <a href="#">faucibus blandit</a> eros. Curabitur porttitor ante non est. Maecenas dolor. Aenean egestas sem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Sed suscipit, nisi sit amet pharetra malesuada, sem velit laoreet sem, vitae iaculis diam neque consequat est. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque tincidunt eros non quam. Mauris a magna sit amet libero accumsan auctor. Aenean nec urna non dui lobortis viverra...
      <p class="date">Posted by Jack <img src="images/more.gif" alt="" /> <a href="#">Read more</a> <img src="images/comment.gif" alt="" /> <a href="#">Comments (15)</a> <img src="images/timeicon.gif" alt="" /> 17.01.</p>
      <br />
    </div>
    <div class="left_side">
      <div class="sideNav">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Articles</a></li>
          <li><a href="#">Gallery</a></li>
          <li><a href="#">Affiliates</a></li>
          <li><a href="#">Archives</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <br />
    
    </div>
  </div>
</div> --}}

<div class="container">
    <div class="view-account">
        <section class="module">
            <div class="module-inner">
                <div class="side-bar">
                    <div class="user-info">
                        <img class="img-profile img-circle img-responsive center-block" src="@if ($customerInfo->image) {{ asset($customerInfo->image) }}@else{{ asset('uploads/avatar1.png') }} @endif" alt="">
                        <ul class="meta list list-unstyled">
                            <li class="name">{{ $customerInfo->name}}
                                <label class="label label-info">Silver</label>
                            </li>
                           
                        </ul>
                    </div>
                    <x-frontend.accNavbar  type="profile" user="{{ $customerInfo->type}}"/>
                </div>
                <div class="content-panel">
                    <h2 class="title">Profile<span class="pro-label label label-warning">PRO</span></h2>
                    <form class="form-horizontal" action="{{ route('account_update_profile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Personal Info</h3>
                            <div class="form-group avatar">
                                <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                    <img class="img-rounded img-responsive" src="@if ($customerInfo->image) {{ asset($customerInfo->image) }}@else{{ asset('uploads/avatar1.png') }} @endif" alt="">
                                </figure>
                                <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                    <input type="file" name="user_image" class="file-uploader pull-left">
                                    <button type="submit" class="btn btn-sm btn-default-alt pull-left">Update Image</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="user_id" name="user_id" value="{{$customerInfo->id}}">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">User Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="user_name" value="{{ $customerInfo->user_name}}">
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Full Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control"  name="name" value="{{ $customerInfo->name}}">
                                </div>
                            </div>
                            
                        </fieldset>
                        <fieldset class="fieldset">
                            <h3 class="fieldset-title">Contact Info</h3>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Email</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="email" name="email" class="form-control" value="{{ $customerInfo->email}}">
                                    <p class="help-block">This is the email </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Address</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="address" class="form-control"  value="{{ $customerInfo->address}}">
                                    <p class="help-block"></p>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">State</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="state" class="form-control"  value="{{ $customerInfo->state}}">
                                    <p class="help-block"></p>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">City</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" name="city" class="form-control" value="{{ $customerInfo->city}}">
                                    <p class="help-block"></p>
                                </div>
                                
                            </div>
                          
                        </fieldset>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                <input class="btn btn-primary" type="submit" value="Update Profile">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
    @endsection

