<div class="nav2">
		<header class="header_area">
			<div class="main_header_area animated">
				<div class="container-fluid">
					<nav id="navigation1" class="navigation">
						<div class="nav-header">
							<div class="icon-nav">
								<ul class="navbar-nav d-flex align-items-center justify-content-center icon-madya-2" style="flex-direction: initial; margin-top: 5px;">
									<li class="nav-item info-nav">
									@if (!empty(Auth::guard('client')->check()))
									<button class="navbar-toggler  d-flex align-items-center p-2 fs-6 border-0" type="button" data-bs-toggle="offcanvas"
											data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
											<img src="{{ asset('img/useravatar/' . Auth::guard('client')->user()->avatar) }}"	 style="width:40px; height:40px; border-radius:50%" alt="">
									   </button>
									   @include('website.layouts.includes.slider-response-client')
									</li>
									@elseif (!empty(Auth::guard('client')->check()))
									<button class="navbar-toggler  d-flex align-items-center p-2 fs-6 border-0" type="button" data-bs-toggle="offcanvas"
											data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
											<img src="{{ asset('img/useravatar/' . Auth::guard('seller')->user()->avatar) }}"	 style="width:40px; height:40px;border-radius:50%" alt="">
									   </button>
									   @include('website.layouts.includes.slider-response')
									@endif
									<li class="nav-item icon ms-5 info-nav-2" style="margin-top: 3px;">   
										<i class="fa-solid fa-heart"></i></a> <span>0</span> 
								</li>
								<li class="nav-item icon d-flex align-items-center info-nav-3"> <i class="fa-solid fa-cart-shopping"></i> <span>0</span> </li>
								<li><img src="image/logo.png" alt=""></li>
								</ul>
							</div>
							 <div class="nav-toggle"> </div>
						</div>
						<div class="nav-menus-wrapper">
							<div class = 'search-box'>
								<input class = "search-text" type="text" placeholder = "Search Anything">
							  <a href="#" class = "search-btn">
								<i class="fas fa-search"></i>
							  </a>
							</div> 
							<a class="float-start link-vendor color-text mt-3 fw-bold" href="{{ route('seller.register') }}"><img src="image/Group-1634.png" alt=""> ???????? ?????????? ???????? ?????? ?????????? ????????</a>
					
							<ul class="nav-menu align-to-right">

<li> <a href="{{ url('main/category/baby-stuff') }}">???????????????? ?????????????? <i class="fa-solid fa-angle-down me-1" style='font-size: 10px;'></i></a>
	<ul class="nav-dropdown">
		<li> <a href="{{ url('/sub/category/baby-care-products') }}">???????????? ?????????????? ???????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/medical-accessories') }}">???????????????? ????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/dental-care') }}">?????????????? ????????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/tooth-growth-accessories') }}">???????????? ?????? ??????????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/Bath-and-skin-care-essentials') }}">???????????????? ?????????????????? ?? ?????????????? ?????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/baby-bath-essentials') }}">???????????????? ?????????????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/cotton-earplug') }}">?????????? ?????? ??????????</a></li>
				<li><a href="{{ url('/sub/sub/category/baby-diapers-and-wet-wipes') }}">???????????? ?????????????? ?????????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/child-seat') }}">???????? ??????????</a></li>
				<li><a href="{{ url('/sub/sub/category/various-swimwear') }}">?????????? ?????????? ????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/bathing-and-baby-skin-care') }}">?????????????????? ???????????????? ???????? ??????????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/breastfeeding-essentials') }}">???????????????? ?????????????? ???????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/Kids-drinking-cups') }}">?????????? ?????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/bibs-and-gauze-for-children') }}">?????????????? ???????????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/bottles-and-nipples') }}">???????????? ????????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/pacifiers-and-more') }}">???????????????? ?? ??????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/Milk-and-baby-food') }}">?????? ?? ?????????? ?????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/baby-food') }}">?????????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/baby-milk') }}">?????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/kids-meals') }}">?????????? ??????????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/baby-gear') }}">?????????? ?????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/baby-carrier') }}">?????????? ??????????</a></li>
			</ul>
		</li>
	</ul>
</li>


<li> <a href="{{ url('main/category/drinks') }}">?????????????????? <i class="fa-solid fa-angle-down me-1" style='font-size: 10px;'></i></a>
	<ul class="nav-dropdown">
		<li> <a href="{{ url('/sub/category/coffee') }}">???????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/coffee-cartridges') }}">???????????? ????????</a></li>
				<li><a href="{{ url('/sub/sub/category/ground-and-regular-coffee') }}">???????? ?????????????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/instant-coffee-bags') }}">?????????? ???????? ??????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/juices') }}">?????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/long-lasting-juices') }}">?????????? ?????????? ??????????</a></li>
				<li><a href="{{ url('/sub/sub/category/syrups-and-sweeteners') }}">???????????? ??????????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/kids-drinks') }}">?????????????? ?????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/kids-juices') }}">?????????? ??????????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/powder-drinks') }}">?????????????? ?????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/juice-powder') }}">?????????? ??????????</a></li>
				<li><a href="{{ url('/sub/sub/category/hot-chocolate') }}">???????????????????? ??????????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/soft-drinks') }}">?????????????? ?????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/energy-drinks') }}">?????????????? ????????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/tea') }}">?????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/ice-tea') }}">?????? ????????</a></li>
				<li><a href="{{ url('/sub/sub/category/tea-bags-and-loose-leaves') }}">?????????? ?????????? ?? ?????????????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/tea-bags') }}">?????????? ??????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/water') }}">?????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/flavored-water') }}">???????????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/sparkling-water') }}">???????? ??????????</a></li>
				<li><a href="{{ url('/sub/sub/category/mineral-water') }}">???????? ????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/plain-water') }}">???????? ??????????</a></li>
			</ul>
		</li>
	</ul>
</li>


<li><a href="{{ url('main/category/super-market') }}">???????????? ??????????<i class="fa-solid fa-angle-down me-1" style='font-size: 10px;'></i></a>
	<ul class="nav-dropdown">
		<li> <a href="{{ url('/sub/category/Rice-pasta-legumes') }}">?????????? ???????????????????? ???????????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/pasta') }}">????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/pulses-cereals-and-couscous') }}">???????????? ?????????????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/rice') }}">??????</a></li>

			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/sugar-and-baking-supplies') }}">?????????? ?? ???????????????? ?????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/baking-supplies') }}">?????????? ??????????</a></li>
				<li><a href="{{ url('/sub/sub/category/sugar-and-sweeteners') }}">?????????? ??????????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/precise') }}">????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/cake-biscuits-and-crackers') }}">?????? ?? ???????????? ?????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/cake-cupcake-and-muffin') }}">?????????? ?????? ?????? ?? ??????????</a></li>
				<li><a href="{{ url('/sub/sub/category/wafer-biscuits') }}">???????????? ????????</a></li>
				<li><a href="{{ url('/sub/sub/category/crackers') }}">????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/biscuit') }}">????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/stuffed-biscuit') }}">???????????? ????????</a></li>
				<li><a href="{{ url('/sub/sub/category/crisps') }}">??????????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/canned-and-packaged-food') }}">?????????????? ?????????????? ???????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/canned-vegetables') }}">???????????? ??????????'</a></li>
				<li><a href="{{ url('/sub/sub/category/coconut-milk') }}">?????? ?????? ??????</a></li>
				<li><a href="{{ url('/sub/sub/category/Coconut-cream') }}">?????????? ?????? ??????????</a></li>
				<li><a href="{{ url('/sub/sub/category/canned-fruits') }}">?????????????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/picklesp-and-olives') }}">???????????????? ????????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/canned-meat') }}">???????????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/powdered-milk') }}">?????? ??????????</a></li>
				<li><a href="{{ url('/sub/sub/category/instant-noodles-and-soup') }}">?????????? ???????????? ?????????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/tuna-and-seafood') }}">?????? ???????????? ???????????????????? ??????????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/breakfast-cereal-and-oats') }}">???????? ?????????????? ?? ?????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/puff-bread') }}">?????? ????</a></li>
				<li><a href="{{ url('/sub/sub/category/breakfast-cereal') }}">???????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/granola') }}">??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/oats') }}">??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/muesli-beans') }}">???????? ??????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/chips-and-appetizers') }}">???????? ?????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/chips-and-crackers') }}">???????? ?? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/chips') }}">????????</a></li>
				<li><a href="{{ url('/sub/sub/category/popcorn') }}">????????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/chocolates-and-sweets') }}">???????????????????? ?? ???????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/candies') }}">????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/chocolate') }}">????????????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/chewing-gum-and-mint') }}">???????? ?? ??????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/Oils-vinegar-and-salad-dressing') }}">???????????? ?????????? ???????? ???????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/different-flavors-of-sauce') }}">?????? ???????????? ????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/salad-dressing-and-vinegar') }}">?????? ???????????? ?? ????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/cooking-ingredients') }}">???????????? ?????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/cooking-sauces-and-pasta') }}">?????????? ?????????? ?? ????????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/herbs-spices-and-mixtures') }}">???????????????? ?????????????? ????????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/oils-and-ghee') }}">???????????? ????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/crushed-rusk') }}">???????????? ??????????</a></li>
				<li><a href="{{ url('/sub/sub/category/food-broths') }}">?????????? ????????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/Jam-honey-and-spreads') }}"> ???????????? ?? ?????????? ?? ?????????????? ?????????????? ?????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/spreadable-foods') }}">?????????? ?????????? ??????????</a></li>
				<li><a href="{{ url('/sub/sub/category/honey') }}">??????</a></li>
				<li><a href="{{ url('/sub/sub/category/jams') }}">??????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/nuts-dates-and-dried-fruits') }}">???????????????? ?????????????? ???????????????? ?????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/nuts-and-seeds') }}"> ???????????? ?? ????????</a></li>
				<li><a href="{{ url('/sub/sub/category/dried-fruits') }}">?????????????? ??????????????</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/products-from-all-over-the-world') }}">???????????? ???? ???? ?????????? ???????????? <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/egyptian-food') }}">?????????? ??????????</a></li>
				<li><a href="{{ url('/sub/sub/category/mexican-food') }}">?????????????? ??????????????</a></li>
				<li><a href="{{ url('/sub/sub/category/chinese-food') }}">?????????? ??????????</a></li>
			</ul>
		</li>
	</ul>
</li>
<li>
	<li> <a href="{{ url('main/category/vegetables-and-fruits') }}">???????????? ???????????????? <i class="fa-solid fa-angle-down me-1" style='font-size: 10px;'></i></a>
		<ul class="nav-dropdown">
			<li> <a href="{{ url('/sub/category/fruit') }}">?????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
				<ul class="nav-dropdown">
					<li><a href="{{ url('/sub/sub/category/banana') }}">??????</a></li>
					<li><a href="{{ url('/sub/sub/category/orange') }}">????????????????</a></li>
					<li><a href="{{ url('/sub/sub/category/') }}">?????????? ????????</a></li>
					<li><a href="{{ url('/sub/sub/category/lemon') }}">??????</a></li>
					<li><a href="{{ url('/sub/sub/category/apple') }}">???????? </a></li>
					<li><a href="{{ url('/sub/sub/category/pear') }}">????????</a></li>
					<li><a href="{{ url('/sub/sub/category/apricot-and-peach') }}">???????????? ????????????</a></li>
					<li><a href="{{ url('/sub/sub/category/peach-and-nectarine') }}">?????? ????????????????</a></li>
					<li><a href="{{ url('/sub/sub/category/kiwi') }}">????????</a></li>
					<li><a href="{{ url('/sub/sub/category/mango') }}">??????????</a></li>
					<li><a href="{{ url('/sub/sub/category/melon') }}">????????</a></li>
					<li><a href="{{ url('/sub/sub/category/pass') }}">??????</a></li>
					<li><a href="{{ url('/sub/sub/category/seed-fruit') }}">?????????? ????????????</a></li>
				</ul>
			</li>
			<li> <a href="{{ url('/sub/category/vegetables') }}">???????????? <i class="fa-solid fa-angle-left me-1"></i></a>
				<ul class="nav-dropdown">
					<li><a href="{{ url('/sub/sub/category/capsicum-and-hot-pepper') }}"> ???????????????? ?????????????? ?????????? </a></li>
					<li><a href="{{ url('/sub/sub/category/eggplant') }}">?????????????????? </a></li>
					<li><a href="{{ url('/sub/sub/category/tomatoes') }}"> ?????????? </a></li>
					<li><a href="{{ url('/sub/sub/category/salad') }}">???????? </a></li>
					<li><a href="{{ url('/sub/sub/category/cabbage-and-other-cooking') }}">?????????????? ???????????? ???? ??????????  </a></li>
					<li><a href="{{ url('/sub/sub/category/pea-beans') }}">  ???????? ????????????????   </a></li>
					<li><a href="{{ url('/sub/sub/category/potato') }}">?????????????? </a></li>
					<li><a href="{{ url('/sub/sub/category/onions-and-shallots') }}">?????????? ????????????????</a></li>
					<li><a href="{{ url('/sub/sub/category/asian-vegetables') }}">???????????????? ????????????????</a></li>
					<li><a href="{{ url('/sub/sub/category/mushroom') }}">??????????</a></li>
					<li><a href="{{ url('/sub/sub/category/zucchini') }}">????????</a></li>
					<li><a href="{{ url('/sub/sub/category/carrots') }}">??????</a></li>
					<li><a href="{{ url('/sub/sub/category/cucumber') }}">????????</a></li>
					<li><a href="{{ url('/sub/sub/category/Garlic-and-ginger') }}">?????????? ?? ????????????????</a></li>
				</ul>
			</li>
			<li> <a href="{{ url('/sub/category/herbs') }}">?????????? <i class="fa-solid fa-angle-left me-1"></i></a>
				<ul class="nav-dropdown">
					<li><a href="{{ url('/sub/sub/category/fresh-herbs') }}">?????????? ??????????</a></li>

				</ul>
			</li>
		</ul>
	</li>
	<li>
		<li>  <a href="{{ url('main/category/fresh-foods') }}"> ?????????? ?????????? <i class="fa-solid fa-angle-down me-1" style='font-size: 10px;'></i></a>
			<ul class="nav-dropdown">
				 <li>
		<a href="{{ url('/sub/category/cold-meats-and-appetizers') }}">???????? ?????????? ?? ???????????? <i class="fa-solid fa-angle-left me-1"></i></a>
		<ul class="nav-dropdown">
			<li><a href="{{ url('/sub/sub/category/cold-meat') }}">???????? ??????????</a></li>
			<li><a href="{{ url('/sub/sub/category/olives-and-appetizers') }}"> ?????????? ?? ????????????</a></li>
			<li><a href="{{ url('/sub/sub/category/seafood-and-caviar') }}">?????????????????? ?????????????? ??????????????????</a></li>
		</ul>
	</li>
	<li>
		<a href="{{ url('/sub/category/dairy-products-and-eggs') }}">???????????? ?????????????? ???????????? <i class="fa-solid fa-angle-left me-1"></i></a>
		<ul class="nav-dropdown">
			<li><a href="{{ url('/sub/sub/category/Butter-and-ghee') }}">???????????? ?? ??????????</a></li>
			<li><a href="{{ url('/sub/sub/category/Cheese-and-Labneh') }}">???????? ?? ????????</a></li>
			<li><a href="{{ url('/sub/sub/category/generous') }}">????????</a></li>
			<li><a href="{{ url('/sub/sub/category/egg') }}"> ??????</a></li>
			<li><a href="{{ url('/sub/sub/category/milk-and-yogurt') }}"> ???????? ????????</a></li>
			<li><a href="{{ url('/sub/sub/category/yogurt') }}"> ??????????????</a></li>
			<li><a href="{{ url('/sub/sub/category/chilled-sweets') }}">???????????????? ??????????????</a></li>
		</ul>
	</li>

	<li>
		<a href="{{ url('/sub/category/fish-seafood') }}">?????????? ?? ?????????????????? ?????????????? <i class="fa-solid fa-angle-left me-1"></i></a>
		<ul class="nav-dropdown">
			<li><a href="{{ url('/sub/sub/category/fish') }}">??????</a></li>
			<li><a href="{{ url('/sub/sub/category/seafood') }}">?????????????? ??????????</a></li>
		</ul>
	</li>
	<li>
		<a href="{{ url('/sub/category/prepared-foods') }}">?????????????? ??????????<i class="fa-solid fa-angle-left me-1"></i></a>
		<ul class="nav-dropdown">
			<li><a href="{{ url('/sub/sub/category/ready-meals') }}">?????????? ??????????</a></li>
			<li><a href="{{ url('/sub/sub/category/appetizers-and-more') }}">???????????????? ????????????</a></li>

		</ul>
	</li>
	 <li>
		<a href="{{ url('/sub/category/poultry-meat') }}"> ?????????? ?? ???????? <i class="fa-solid fa-angle-left me-1"></i></a>
		<ul class="nav-dropdown">
			<li><a href="{{ url('/sub/sub/category/beef') }}"> ?????? ????????</a></li>
			<li><a href="{{ url('/sub/sub/category/chicken') }}">???????? </a></li>
			<li><a href="{{ url('/sub/sub/category/sheep-meat') }}"> ?????? ??????</a></li>
			<li><a href="{{ url('/sub/sub/category/turkey') }}"> ?????? ????????</a></li>
			<li><a href="{{ url('/sub/sub/category/edible-offal') }}"> ?????????? ?????????? ??????????</a></li>
			<li><a href="{{ url('/sub/sub/category/bbq-meat-and-poultry') }}"> ???????? ???????????? ???????????? </a></li>
		</ul>
	</li>
			</ul>
		</li>
		<li> <a href="#">???? ???????????? <i class="fa-solid fa-angle-down me-1" style='font-size: 10px;'></i></a>
			 <div class="megamenu-panel">
	<div class="megamenu-lists">
		<ul class="megamenu-list list-col-4">
			<li class="megamenu-list-title"><a href="#">Title Name</a></li>
			<li><a href="{{ url('main/category/fresh-foods') }}">?????????? ??????????</a></li>
			<li><a href="{{ url('main/category/vegetables-and-fruits') }}" >???????????? ????????????????</a></li>
			<li><a href="{{ url('main/category/super-market') }}"> ???????????? ??????????</a></li>
			<li><a href="{{ url('main/category/drinks') }}" > ?????????????????? </a></li>
			<li><a href="{{ url('main/category/baby-stuff') }}" >???????????????? ??????????????</a></li>
			<li><a href="{{ url('main/category/office-and-school-supplies') }}"> ???????? ???????????? ?? ????????????</a></li>
			<li><a href="{{ url('main/category/auto-accessories') }}" >???????????????? ????????????????</a></li>
		</ul>
		<ul class="megamenu-list list-col-4">
			<li class="megamenu-list-title"><a href="#">Title Name</a></li>
			<li><a href="{{ url('main/category/frozen-foods') }}" >?????????? ????????????</a></li>
			<li><a href="{{ url('main/category/organic') }}"> ????????????????</a></li>
			<li><a href="{{ url('main/category/pies-and-pastries') }}">?????????? ?? ??????????????</a></li>
			<li><a href="{{ url('main/category/pet-food-and-supplies') }}" >?????????? ?????????????????? ??????????????????
					??????????????</a></li>
			<li><a href="{{ url('main/category/electronics-and-home-appliances') }}" > ???????????????????????? ???????????????? ????????????????</a>
			</li>
			<li><a href="{{ url('main/category/paper-products-newspapers-etc') }}" >  ???????????? ???????????? ?????? ???????????? </a>
			<li><a href="{{ url('main/category/other-sections') }}" >     ?????????? ???????? </a>
			</li>
		</ul>
		<ul class="megamenu-list list-col-4">
			<li class="megamenu-list-title"><a href="#">Title Name</a></li>
			<li><a href="{{ url('main/category/mobiles-tablets-and-smart-hands') }}">?????????????????? ?????????? ???????????? ????????
					????????????</a></li>
			<li><a href="{{ url('main/category/health-and-beauty') }}" >?????????? ?? ????????????</a></li>
			<li><a href="{{ url('main/category/sports-and-fitness-products') }}" >???????????? ?????????????? ?? ?????????????? ??????????????</a>
			</li>
			<li><a href="{{ url('main/category/cleaning-and-household-supplies') }}" >?????????????? ?? ???????????????????? ????????????????</a>
			</li>
			<li><a href="{{ url('main/category/home-garden-products') }}" >???????????? ???????????? ????????????????</a></li>
			<li><a href="{{ url('main/category/clothes-accessories-and-bags') }}">  ???????????? ?????????????????? ????????????</a></li>
		</ul>
		<ul class="megamenu-list list-col-4">
			<li><img src="{{ asset('image/full-length-portrait-cheerful-man-jumping.jpg') }}"
					width="150px" height="250px" alt=""></li>
		</ul>
	</div>
</div>
		</li>
		<li><a href="{{ route('landing') }}" target="">????????????????</a></li>
</ul>



						</div>
					</nav>
				</div>
			</div>
		</header>
	</div>
