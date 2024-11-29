<nav class="side-menu">
    <ul class="nav">
        <li class="@if($type == 'profile'){{'active'}}@else{{''}}@endif"><a href="{{url('/account_home')}}"><span class="fa fa-user"></span> Profile</a></li>
        @if($user == 'band')
        <li class="@if($type == 'bandProfile'){{'active'}}@else{{''}}@endif"><a  href="{{url('/account_band_profile')}}"><span class="fa fa-clock-o"></span> Band Profile</a></li>
        @endif
        <li class="@if($type == 'orders'){{'active'}}@else{{''}}@endif"><a href="{{url('/account_orders')}}" ><span class="fa fa-cog"></span> Orders</a></li>
        <li class="@if($type == 'billing'){{'active'}}@else{{''}}@endif"><a href="{{url('/account_bill_info')}}"><span class="fa fa-credit-card"></span> Billing</a></li>
        <li class="@if($type == 'message'){{'active'}}@else{{''}}@endif"><a href="{{url('/account_sales')}}" ><span class="fa fa-envelope"></span> Messages</a></li>
        @if($user == 'band')
        <li class="@if($type == 'sales'){{'active'}}@else{{''}}@endif"><a  href="{{url('/account_sales')}}"><span class="fa fa-clock-o"></span>Band Sales</a></li>
        @endif
    </ul>
</nav>