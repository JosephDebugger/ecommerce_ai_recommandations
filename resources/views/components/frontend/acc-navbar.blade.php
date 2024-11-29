<nav class="side-menu">
    <ul class="nav">
        <li class="@if($type == 'profile'){{'active'}}@else{{''}}@endif"><a href="{{url('/account_home')}}"><span class="fa fa-user"></span> Profile</a></li>
        <li class="@if($type == 'setting'){{'active'}}@else{{''}}@endif"><a href="#"><span class="fa fa-cog"></span> Settings</a></li>
        <li class="@if($type == 'billing'){{'active'}}@else{{''}}@endif"><a href="{{url('/account_bill_info')}}"><span class="fa fa-credit-card"></span> Billing</a></li>
        <li class="@if($type == 'message'){{'active'}}@else{{''}}@endif"><a href="{{url('/account_sales')}}" ><span class="fa fa-envelope"></span> Messages</a></li>
        @if($user == 'band')
        <li class="@if($type == 'sales'){{'active'}}@else{{''}}@endif"><a  href="{{url('/account_sales')}}"><span class="fa fa-clock-o"></span> Sales</a></li>
        @endif
    </ul>
</nav>