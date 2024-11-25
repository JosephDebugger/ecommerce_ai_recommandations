<li class="dropdown menu__item">
    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown"
        role="button" aria-haspopup="true" aria-expanded="false">Men's wear <span
            class="caret"></span></a>
    <ul class="dropdown-menu multi-column columns-3">
        <div class="agile_inner_drop_nav_info">
            <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                <a href="{{ url('/mens') }}"><img src="{{ asset('web/images/top2.jpg') }}"
                        alt=" " /></a>
            </div>
            <div class="col-sm-3 multi-gd-img">
                <ul class="multi-column-dropdown">
                    @php
                        foreach ($categories as $key => $category) {
                            if ($category->type == 'male' && $key < 8) {
                                echo '<li><a href="/mens">' . $category->name . '</a></li>';
                            }
                        }
                    @endphp
                   
                </ul>
            </div>
            <div class="col-sm-3 multi-gd-img">
                <ul class="multi-column-dropdown">
                    @php
                    foreach ($categories as $key => $category) {
                        if ($category->type == 'male' && ($key < 15 && $key > 7)) {
                            echo '<li><a href="/mens">' . $category->name . '</a></li>';
                        }
                    }
                @endphp
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </ul>
</li>
<li class="dropdown menu__item">
    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown"
        role="button" aria-haspopup="true" aria-expanded="false">Women's wear <span
            class="caret"></span></a>
    <ul class="dropdown-menu multi-column columns-3">
        <div class="agile_inner_drop_nav_info">
            <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                <a href="{{ url('/womens') }}"><img
                        src="{{ asset('web/images/top1.jpg') }}" alt=" " /></a>
            </div>
            <div class="col-sm-3 multi-gd-img">
                <ul class="multi-column-dropdown">
                    @php
                    foreach ($categories as $key => $category) {
                        if ($category->type == 'female' && $key < 8) {
                            echo '<li><a href="/womens">' . $category->name . '</a></li>';
                        }
                    }
                @endphp
                </ul>
            </div>
            <div class="col-sm-3 multi-gd-img">
                <ul class="multi-column-dropdown">
                    @php
                    foreach ($categories as $key => $category) {
                        if ($category->type == 'female' && ($key < 15 && $key > 7)) {
                            echo '<li><a href="/womens">' . $category->name . '</a></li>';
                        }
                    }
                @endphp
                </ul>
            </div>
            <div class="col-sm-6 multi-gd-img multi-gd-text ">
                <a href="{{ url('/womens') }}"><img src="images/top1.jpg"
                        alt=" " /></a>
            </div>
            <div class="clearfix"></div>
        </div>
    </ul>
</li>



