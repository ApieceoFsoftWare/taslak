<!-- Header Inner -->
<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">
                <div class="col-lg-3">
                    <div class="all-category">
                        <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>Kategoriler</h3>
                        
                        @php
                            $mainCategories = \App\Http\Controllers\HomeController::mainCategoryList();
                        @endphp
                        <ul class="main-category">
                            @foreach ($mainCategories as $item)
                                
                                    <li>
                                        <a href="{{ route('advertisements',['id'=>$item->id, 'slug'=>$item->title]) }}">{{ $item->title }} <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        @if (count($item->children))
                                            @include('home.categorySubTree', ['children'=>$item->children])
                                        @endif
                                    </li>
                                
                            @endforeach
                        </ul>
                            <!--
                            <li><a href="#">Yeni İlan Kategorileri <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                <ul class="sub-category">
                                    <li><a href="#">accessories</a></li>
                                    <li><a href="#">best selling</a></li>
                                    <li><a href="#">top 100 offer</a></li>
                                    <li><a href="#">sunglass</a></li>
                                    <li><a href="#">watch</a></li>
                                    <li><a href="#">man’s product</a></li>
                                    <li><a href="#">ladies</a></li>
                                    <li><a href="#">westrn dress</a></li>
                                    <li><a href="#">denim </a></li>
                                </ul>
                            </li>
                            <li class="main-mega"><a href="#">Son Eklenenler <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                <ul class="mega-menu">
                                    <li class="single-menu">
                                        <a href="#" class="title-link">Shop Kid's</a>
                                        <div class="image">
                                            <img src="https://via.placeholder.com/225x155" alt="#">
                                        </div>
                                        <div class="inner-link">
                                            <a href="#">Kids Toys</a>
                                            <a href="#">Kids Travel Car</a>
                                            <a href="#">Kids Color Shape</a>
                                            <a href="#">Kids Tent</a>
                                        </div>
                                    </li>
                                    <li class="single-menu">
                                        <a href="#" class="title-link">Shop Men's</a>
                                        <div class="image">
                                            <img src="https://via.placeholder.com/225x155" alt="#">
                                        </div>
                                        <div class="inner-link">
                                            <a href="#">Watch</a>
                                            <a href="#">T-shirt</a>
                                            <a href="#">Hoodies</a>
                                            <a href="#">Formal Pant</a>
                                        </div>
                                    </li>
                                    <li class="single-menu">
                                        <a href="#" class="title-link">Shop Women's</a>
                                        <div class="image">
                                            <img src="https://via.placeholder.com/225x155" alt="#">
                                        </div>
                                        <div class="inner-link">
                                            <a href="#">Ladies Shirt</a>
                                            <a href="#">Ladies Frog</a>
                                            <a href="#">Ladies Sun Glass</a>
                                            <a href="#">Ladies Watch</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            
                            <li><a href="#">accessories</a></li>
                            <li><a href="#">top 100 offer</a></li>
                            <li><a href="#">sunglass</a></li>
                            <li><a href="#">watch</a></li>
                            <li><a href="#">man’s product</a></li>
                            <li><a href="#">ladies</a></li>
                            <li><a href="#">westrn dress</a></li>
                            <li><a href="#">denim </a></li>
                            -->
                        
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse">
                                <div class="nav-inner">
                                    <ul class="nav main-menu menu navbar-nav">
                                        <li class="active"><a href="{{ route('home') }}">Teammate</a></li>
                                        <li><a href="{{ route('advertisements') }}">İlanlar</a></li>
                                        <li><a href="#">Neler Bulabilirsin?</a></li>
                                    <!-- 
                                        <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                            <ul class="dropdown">
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                            </ul>
                                        </li>
                                    
                                        <li><a href="#">Pages</a></li>
                                        <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    -->
                                    <li><a href="contact.html">İletişim</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ End Header Inner -->
