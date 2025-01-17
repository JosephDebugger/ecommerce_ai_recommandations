<li class="dropdown menu__item">
    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true"
        aria-expanded="false">Men's <span class="caret"></span></a>
    <ul class="dropdown-menu multi-column columns-3">
        <div class="agile_inner_drop_nav_info">
            <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                <a href="{{ url('category/male/0') }}"><img src="{{ asset('web/images/top2.jpg') }}"
                        alt=" " /></a>
            </div>
            <div class="col-sm-3 multi-gd-img">
                <ul class="multi-column-dropdown">

                    @foreach ($categories as $key => $category)
                        @if ($category->type == 'male' && $key < 8)
                            <li><a
                                    href="{{ route('category', [$category->type, $category->id]) }}">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-3 multi-gd-img">
                <ul class="multi-column-dropdown">
                    @foreach ($categories as $key => $category)
                        @if ($category->type == 'male' && ($key < 15 && $key > 7))
                            <li><a
                                    href="{{ route('category', [$category->type, $category->id]) }}">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </ul>
</li>
<li class="dropdown menu__item">
    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true"
        aria-expanded="false">Women's<span class="caret"></span></a>
    <ul class="dropdown-menu multi-column columns-3">
        <div class="agile_inner_drop_nav_info">
            <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                <a href="{{ url('category/female/0') }}"><img src="{{ asset('web/images/top1.jpg') }}"
                        alt=" " /></a>
            </div>
            <div class="col-sm-3 multi-gd-img">
                <ul class="multi-column-dropdown">
                    @foreach ($categories as $key => $category)
                        @if ($category->type == 'female' && $key < 8)
                            <li><a
                                    href="{{ route('category', [$category->type, $category->id]) }}">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-3 multi-gd-img">
                <ul class="multi-column-dropdown">
                    @foreach ($categories as $key => $category)
                        @if ($category->type == 'female' && ($key < 15 && $key > 7))
                            <li><a
                                    href="{{ route('category', [$category->type, $category->id]) }}">{{ $category->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </ul>
</li>


<li class="dropdown menu__item">
    <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true"
        aria-expanded="false">Bands <span class="caret"></span></a>
    <ul class="dropdown-menu multi-column columns-3">
        <div class="agile_inner_drop_nav_info">
            <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                <a href="{{ url('/band/0') }}"><img src="{{ asset('uploads/band_banner.jpg') }}" alt=" " /></a>
            </div>
            <div class="col-sm-3 multi-gd-img">
                <ul class="multi-column-dropdown">
                    @php
                        foreach ($bands as $key => $band) {
                            if ($key < 8) {
                                echo '<li><a href="/band/' . $band->id . '">' . $band->name . '</a></li>';
                            }
                        }
                    @endphp
                </ul>
            </div>
            <div class="col-sm-3 multi-gd-img">
                <ul class="multi-column-dropdown">
                    @php
                        foreach ($bands as $key => $band) {
                            if ($key < 15 && $key > 7) {
                                echo '<li><a href="/band/' . $band->id . '">' . $band->name . '</a></li>';
                            }
                        }
                    @endphp
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </ul>
</li>
