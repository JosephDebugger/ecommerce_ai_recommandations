@extends('front-master')

@section('content')
    <style>
        .view-account {
            background: #FFFFFF;
            margin-top: 20px;
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

        .card {
            background: #fff;
            transition: .5s;
            border: 0;
            margin-bottom: 30px;
            border-radius: .55rem;
            position: relative;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
        }

        .chat-app .people-list {
            width: 100%;
            position: absolute;
            left: 0;
            top: 0;
            padding: 20px;
            z-index: 7
        }


        .people-list {
            -moz-transition: .5s;
            -o-transition: .5s;
            -webkit-transition: .5s;
            transition: .5s
        }





        .people-list img {
            float: left;
            border-radius: 50%
        }

        .people-list .about {
            float: left;
            padding-left: 8px
        }

        .people-list .status {
            color: #999;
            font-size: 13px
        }

        .chat .chat-header {
            padding: 15px 20px;
            border-bottom: 2px solid #f4f7f6
        }

        .chat .chat-header img {
            float: left;
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-header .chat-about {
            float: left;
            padding-left: 10px
        }

        .chat .chat-history {
            padding: 20px;
            border-bottom: 2px solid #fff
        }

        .chat .chat-history ul {
            padding: 0
        }

        .chat .chat-history ul li {
            list-style: none;
            margin-bottom: 30px
        }

        .chat .chat-history ul li:last-child {
            margin-bottom: 0px
        }

        .chat .chat-history .message-data {
            margin-bottom: 15px
        }

        .chat .chat-history .message-data img {
            border-radius: 40px;
            width: 40px
        }

        .chat .chat-history .message-data-time {
            color: #434651;
            padding-left: 6px
        }

        .chat .chat-history .message {
            color: #444;
            padding: 18px 20px;
            line-height: 26px;
            font-size: 16px;
            border-radius: 7px;
            display: inline-block;
            position: relative
        }

        .chat .chat-history .message:after {
            bottom: 100%;
            left: 7%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .my-message {
            background: #efefef
        }

        .chat .chat-history .my-message:after {
            bottom: 100%;
            left: 30px;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-bottom-color: #efefef;
            border-width: 10px;
            margin-left: -10px
        }

        .chat .chat-history .other-message {
            background: #e8f1f3;
            text-align: right
        }

        .chat .chat-history .other-message:after {
            border-bottom-color: #e8f1f3;
            left: 93%
        }

        .chat .chat-message {
            padding: 20px
        }

        .online,
        .offline,
        .me {
            margin-right: 2px;
            font-size: 8px;
            vertical-align: middle
        }

        .online {
            color: #86c541
        }

        .offline {
            color: #e47297
        }

        .me {
            color: #1d8ecd
        }

        .float-right {
            float: right
        }

        .clearfix:after {
            visibility: hidden;
            display: block;
            font-size: 0;
            content: " ";
            clear: both;
            height: 0
        }

        @media only screen and (max-width: 767px) {
            .chat-app .people-list {
                height: 465px;
                width: 100%;
                overflow-x: auto;
                background: #fff;
                left: -400px;
                display: none
            }

            .chat-app .people-list.open {
                left: 0
            }

            .chat-app .chat {
                margin: 0
            }

            .chat-app .chat .chat-header {
                border-radius: 0.55rem 0.55rem 0 0
            }

            .chat-app .chat-history {
                height: 300px;
                overflow-x: auto
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {


            .chat-app .chat-history {
                height: 600px;
                overflow-x: auto
            }
        }

        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {

            .chat-app .chat-history {
                height: calc(100vh - 350px);
                overflow-x: auto
            }
        }
    </style>



    <div class="container">
        <div class="view-account">
            <section class="module">
                <div class="module-inner">
                    <div class="side-bar">
                        <div class="user-info">
                            <img class="img-profile img-circle img-responsive center-block"
                                src="@if ($customerInfo->image) {{ asset($customerInfo->image) }}@else{{ asset('uploads/avatar1.png') }} @endif"
                                alt="">
                            <ul class="meta list list-unstyled">
                                <li class="name">{{ $customerInfo->name }}
                                    <label class="label label-info">Silver</label>
                                </li>

                            </ul>
                        </div>
                        <x-frontend.accNavbar type="message" user="{{ $customerInfo->type }}" />
                    </div>
                    <div class="content-panel">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="card chat-app">

                                    <div class="chat">
                                        <div class="chat-header clearfix">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <a href="javascript:void(0);" data-toggle="modal"
                                                        data-target="#view_info">
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                                            alt="avatar">
                                                    </a>
                                                    <div class="chat-about">
                                                        <h6 class="m-b-0">{{ $customerInfo->name }}</h6>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 hidden-sm text-right">

                                                    <a href="javascript:void(0);" class="btn btn-outline-info"><i
                                                            class="fa fa-cogs"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-outline-warning"><i
                                                            class="fa fa-question"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-history">
                                            <ul class="m-b-0" id="messages">
                                                @foreach ($chats as $chat)
                                                    @if ($chat->type == 'admin')
                                                        <li class="clearfix">
                                                            <div class="message-data">
                                                                <span
                                                                    class="message-data-time">{{ $chat->created_at }}</span>

                                                            </div>
                                                            <div class="message other-message float-right">
                                                                {{ $chat->message }}</div>
                                                        </li>
                                                    @else
                                                        <li class="clearfix">
                                                            <div class="message-data text-right">
                                                                <span
                                                                    class="message-data-time">{{ $chat->created_at }}</span>

                                                            </div>
                                                            <div class="message my-message">{{ $chat->message }}</div>
                                                        </li>
                                                    @endif
                                                @endforeach

                                            </ul>
                                        </div>
                                        <div class="chat-message clearfix">
                                            <div class="input-group mb-0 d-flex row">
                                                <div class="input-group-prepend col-1">
                                                    <button onclick="sendMessage()"> <span class="input-group-text"><i
                                                                class="fa fa-send"></i></span></button>

                                                </div>
                                                <input type="text" class="form-control col-6" id="message"
                                                    placeholder="Enter text here...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
        <script>
            function sendMessage() {
                var message = $('#message').val();

                //alert(message)
                var data = {
                    message: message,
                    _token: "{{ csrf_token() }}"
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('accountSendMsg') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        //alert(JSON.stringify(response));
                        if (response == 'success') {
                            $('#message').val('');

                            var currentdate = new Date();
                            var time =
                                currentdate.getDate() + "/" +
                                (currentdate.getHours()) + ":" +
                                currentdate.getMinutes();
                            if (response == 'success') {
                                $('#messages').append(`<li class="clearfix">
                                                            <div class="message-data">
                                                                <span
                                                                    class="message-data-time">${time}</span>
                                                            </div>
                                                            <div class="message my-message">${message}</div>
                                                        </li>`)
                            }
                        } else {
                            alert(JSON.stringify(response));
                        }
                    },
                    error: function(error) {
                        alert(JSON.stringify(error));
                    }
                });
            }
        </script>
    </div>
@endsection
@section('scripts')


@endsection
