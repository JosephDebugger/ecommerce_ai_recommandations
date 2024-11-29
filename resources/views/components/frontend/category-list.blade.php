<div class="css-treeview">
    <h4>Categories</h4>
    <ul class="tree-list-pad">
        <li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> @if($type == 'male'){{'Men'}}@else{{'Women'}}@endif's Wear</label>
            <ul>

                @foreach($categories as $categorie)

                <li><input type="checkbox" id="item-0-0" /><label for="item-0-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>{{$categorie->name}}</label>
                </li>
                    @endforeach
                   
                   
               
                {{-- <li><input type="checkbox"  id="item-0-1" /><label for="item-0-1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Party Wear</label>
                    <ul>
                        <li><a href="mens.html">Shirts</a></li>
                        <li><a href="mens.html">Caps</a></li>
                        <li><a href="mens.html">Shoes</a></li>
                        <li><a href="mens.html">Pants</a></li>
                        <li><a href="mens.html">SunGlasses</a></li>
                        <li><a href="mens.html">Trousers</a></li>
                    </ul>
                </li>
                <li><input type="checkbox"  id="item-0-2" /><label for="item-0-2"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Casual Wear</label>
                    <ul>
                        <li><a href="mens.html">Shirts</a></li>
                        <li><a href="mens.html">Caps</a></li>
                        <li><a href="mens.html">Shoes</a></li>
                        <li><a href="mens.html">Pants</a></li>
                        <li><a href="mens.html">SunGlasses</a></li>
                        <li><a href="mens.html">Trousers</a></li>
                    </ul>
                </li> --}}
            </ul>
        </li>
        {{-- <li><input type="checkbox" id="item-1" checked="checked" /><label for="item-1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Best Collections</label>
            <ul>
                <li><input type="checkbox" checked="checked" id="item-1-0" /><label for="item-1-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> New Arrivals</label>
                    <ul>
                        <li><a href="mens.html">Shirts</a></li>
                        <li><a href="mens.html">Shoes</a></li>
                        <li><a href="mens.html">Pants</a></li>
                        <li><a href="mens.html">SunGlasses</a></li>
                    </ul>
                </li>
                
            </ul>
        </li>
        <li><input type="checkbox" checked="checked" id="item-2" /><label for="item-2"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Best Offers</label>
            <ul>
                <li><input type="checkbox"  id="item-2-0" /><label for="item-2-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Summer Discount Sales</label>
                    <ul>
                        <li><a href="mens.html">Shirts</a></li>
                        <li><a href="mens.html">Shoes</a></li>
                        <li><a href="mens.html">Pants</a></li>
                        <li><a href="mens.html">SunGlasses</a></li>
                    </ul>
                </li>
                <li><input type="checkbox" id="item-2-1" /><label for="item-2-1"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Exciting Offers</label>
                    <ul>
                        <li><a href="mens.html">Shirts</a></li>
                        <li><a href="mens.html">Shoes</a></li>
                        <li><a href="mens.html">Pants</a></li>
                        <li><a href="mens.html">SunGlasses</a></li>
                    </ul>
                </li>
                <li><input type="checkbox" id="item-2-2" /><label for="item-2-2"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Flat Discounts</label>
                    <ul>
                        <li><a href="mens.html">Shirts</a></li>
                        <li><a href="mens.html">Shoes</a></li>
                        <li><a href="mens.html">Pants</a></li>
                        <li><a href="mens.html">SunGlasses</a></li>
                    </ul>
                </li>
            </ul>
        </li> --}}
    </ul>
</div>