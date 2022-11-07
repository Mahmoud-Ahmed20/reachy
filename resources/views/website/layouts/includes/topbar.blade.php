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
							<a class="float-start link-vendor color-text mt-3 fw-bold" href="{{ route('seller.register') }}"><img src="image/Group-1634.png" alt=""> ابدأ البيع الان على ريتشي مارت</a>
					
							<ul class="nav-menu align-to-right">

<li> <a href="{{ url('main/category/baby-stuff') }}">مستلزمات الأطفال <i class="fa-solid fa-angle-down me-1" style='font-size: 10px;'></i></a>
	<ul class="nav-dropdown">
		<li> <a href="{{ url('/sub/category/baby-care-products') }}">منتجات العناية بالطفل <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/medical-accessories') }}">الملحقات الطبية</a></li>
				<li><a href="{{ url('/sub/sub/category/dental-care') }}">العناية بالأسنان</a></li>
				<li><a href="{{ url('/sub/sub/category/tooth-growth-accessories') }}">ملحقات نمو الأسنان</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/Bath-and-skin-care-essentials') }}">مستلزمات الاستحمام و العناية بالبشرة <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/baby-bath-essentials') }}">مستلزمات استحمام الأطفال</a></li>
				<li><a href="{{ url('/sub/sub/category/cotton-earplug') }}">سدادة أذن قطنية</a></li>
				<li><a href="{{ url('/sub/sub/category/baby-diapers-and-wet-wipes') }}">حفاضات ومناديل مبللة للأطفال</a></li>
				<li><a href="{{ url('/sub/sub/category/child-seat') }}">مقعد أطفال</a></li>
				<li><a href="{{ url('/sub/sub/category/various-swimwear') }}">ألبسة سباحة متنوعة</a></li>
				<li><a href="{{ url('/sub/sub/category/bathing-and-baby-skin-care') }}">الإستحمام والعناية بشرة الأطفال</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/breastfeeding-essentials') }}">مستلزمات الرضاعه الطبيعية <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/Kids-drinking-cups') }}">أكواب شرب للأطفال</a></li>
				<li><a href="{{ url('/sub/sub/category/bibs-and-gauze-for-children') }}">المرايل والشاش للأطفال</a></li>
				<li><a href="{{ url('/sub/sub/category/bottles-and-nipples') }}">زجاجات والحلمات</a></li>
				<li><a href="{{ url('/sub/sub/category/pacifiers-and-more') }}">اللهايات و غيرها</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/Milk-and-baby-food') }}">لبن و أغذية الأطفال <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/baby-food') }}">أغذية الأطفال</a></li>
				<li><a href="{{ url('/sub/sub/category/baby-milk') }}">لبن الأطفال</a></li>
				<li><a href="{{ url('/sub/sub/category/kids-meals') }}">وجبات الأطفال</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/baby-gear') }}">معدات أطفال <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/baby-carrier') }}">حاملة الطفل</a></li>
			</ul>
		</li>
	</ul>
</li>


<li> <a href="{{ url('main/category/drinks') }}">المشروبات <i class="fa-solid fa-angle-down me-1" style='font-size: 10px;'></i></a>
	<ul class="nav-dropdown">
		<li> <a href="{{ url('/sub/category/coffee') }}">قهوة <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/coffee-cartridges') }}">خراطيش قهوة</a></li>
				<li><a href="{{ url('/sub/sub/category/ground-and-regular-coffee') }}">البن المطحون والعادي</a></li>
				<li><a href="{{ url('/sub/sub/category/instant-coffee-bags') }}">أكياس قهوة فورية</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/juices') }}">العصائر <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/long-lasting-juices') }}">عصائر طويلة الأمد</a></li>
				<li><a href="{{ url('/sub/sub/category/syrups-and-sweeteners') }}">شرابات ومحليات</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/kids-drinks') }}">مشروبات الأطفال <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/kids-juices') }}">عصائر الاطفال</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/powder-drinks') }}">مشروبات بودرة <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/juice-powder') }}">بودرة عصائر</a></li>
				<li><a href="{{ url('/sub/sub/category/hot-chocolate') }}">الشوكولاته الساخنة</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/soft-drinks') }}">مشروبات غازية <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/energy-drinks') }}">مشروبات الطاقة</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/tea') }}">شاي <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/ice-tea') }}">شاي مثلج</a></li>
				<li><a href="{{ url('/sub/sub/category/tea-bags-and-loose-leaves') }}">أكياس الشاي و الأوراق السائبة</a></li>
				<li><a href="{{ url('/sub/sub/category/tea-bags') }}">أكياس الشاي</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/water') }}">ماء <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/flavored-water') }}">المياه المنكهة</a></li>
				<li><a href="{{ url('/sub/sub/category/sparkling-water') }}">مياه فوارة</a></li>
				<li><a href="{{ url('/sub/sub/category/mineral-water') }}">مياه معدنية</a></li>
				<li><a href="{{ url('/sub/sub/category/plain-water') }}">مياه عادية</a></li>
			</ul>
		</li>
	</ul>
</li>


<li><a href="{{ url('main/category/super-market') }}">السوبر ماركت<i class="fa-solid fa-angle-down me-1" style='font-size: 10px;'></i></a>
	<ul class="nav-dropdown">
		<li> <a href="{{ url('/sub/category/Rice-pasta-legumes') }}">الأرز والمعكرونة والبقوليات <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/pasta') }}">مكرونة</a></li>
				<li><a href="{{ url('/sub/sub/category/pulses-cereals-and-couscous') }}">البقول والحبوب والكسكس</a></li>
				<li><a href="{{ url('/sub/sub/category/rice') }}">أرز</a></li>

			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/sugar-and-baking-supplies') }}">السكر و مستلزمات الخبز <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/baking-supplies') }}">لوازم الخبز</a></li>
				<li><a href="{{ url('/sub/sub/category/sugar-and-sweeteners') }}">السكر والمحليات</a></li>
				<li><a href="{{ url('/sub/sub/category/precise') }}">دقيق</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/cake-biscuits-and-crackers') }}">كيك و بسكويت وكراكرز <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/cake-cupcake-and-muffin') }}">الكيك وكب كيك و المفن</a></li>
				<li><a href="{{ url('/sub/sub/category/wafer-biscuits') }}">بسكويت ويفر</a></li>
				<li><a href="{{ url('/sub/sub/category/crackers') }}">كراكرز</a></li>
				<li><a href="{{ url('/sub/sub/category/biscuit') }}">بسكويت</a></li>
				<li><a href="{{ url('/sub/sub/category/stuffed-biscuit') }}">بسكويت محشي</a></li>
				<li><a href="{{ url('/sub/sub/category/crisps') }}">مقرمشات</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/canned-and-packaged-food') }}">الأغذية المعلبة والمغلفة <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/canned-vegetables') }}">خضروات معلبة'</a></li>
				<li><a href="{{ url('/sub/sub/category/coconut-milk') }}">لبن جوز هند</a></li>
				<li><a href="{{ url('/sub/sub/category/Coconut-cream') }}">كريمة جوز الهند</a></li>
				<li><a href="{{ url('/sub/sub/category/canned-fruits') }}">الفواكة المعلبة</a></li>
				<li><a href="{{ url('/sub/sub/category/picklesp-and-olives') }}">المخللات والزيتون</a></li>
				<li><a href="{{ url('/sub/sub/category/canned-meat') }}">اللحوم المعلبة</a></li>
				<li><a href="{{ url('/sub/sub/category/powdered-milk') }}">لبن بودرة</a></li>
				<li><a href="{{ url('/sub/sub/category/instant-noodles-and-soup') }}">شوربة ونودلز سريعة التحضير</a></li>
				<li><a href="{{ url('/sub/sub/category/tuna-and-seafood') }}">سمك التونة والمأكولات البحرية</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/breakfast-cereal-and-oats') }}">حبوب الإفطار و الشوفان <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/puff-bread') }}">خبز بف</a></li>
				<li><a href="{{ url('/sub/sub/category/breakfast-cereal') }}">حبوب الإفطار</a></li>
				<li><a href="{{ url('/sub/sub/category/granola') }}">جرانولا</a></li>
				<li><a href="{{ url('/sub/sub/category/oats') }}">الشوفان</a></li>
				<li><a href="{{ url('/sub/sub/category/muesli-beans') }}">حبوب موسلى</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/chips-and-appetizers') }}">شيبس ومقبلات <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/chips-and-crackers') }}">شيبس و مقرمشات</a></li>
				<li><a href="{{ url('/sub/sub/category/chips') }}">شيبس</a></li>
				<li><a href="{{ url('/sub/sub/category/popcorn') }}">الفشار</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/chocolates-and-sweets') }}">الشوكولاتة و حلويات <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/candies') }}">حلويات</a></li>
				<li><a href="{{ url('/sub/sub/category/chocolate') }}">الشوكولاتة</a></li>
				<li><a href="{{ url('/sub/sub/category/chewing-gum-and-mint') }}">علكة و نعناع</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/Oils-vinegar-and-salad-dressing') }}">الزيوت والخل وصوص السلطة <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/different-flavors-of-sauce') }}">صوص بنكهات مختلفة</a></li>
				<li><a href="{{ url('/sub/sub/category/salad-dressing-and-vinegar') }}">صوص السلطة و خل</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/cooking-ingredients') }}">مكونات الطبخ <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/cooking-sauces-and-pasta') }}">صلصات الطبخ و المكرونة</a></li>
				<li><a href="{{ url('/sub/sub/category/herbs-spices-and-mixtures') }}">الأعشاب، التوابل والخلطات</a></li>
				<li><a href="{{ url('/sub/sub/category/oils-and-ghee') }}">الزيوت والسمن</a></li>
				<li><a href="{{ url('/sub/sub/category/crushed-rusk') }}">بقسماط مطحون</a></li>
				<li><a href="{{ url('/sub/sub/category/food-broths') }}">مرقات غذائية</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/Jam-honey-and-spreads') }}"> المربي و العسل و الأطعمة القابلة للدهن <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/spreadable-foods') }}">أطعمة قابلة للدهن</a></li>
				<li><a href="{{ url('/sub/sub/category/honey') }}">عسل</a></li>
				<li><a href="{{ url('/sub/sub/category/jams') }}">مربات</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/nuts-dates-and-dried-fruits') }}">المكسرات والتمور والفواكه المجففة <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/nuts-and-seeds') }}"> مكسرات و بذور</a></li>
				<li><a href="{{ url('/sub/sub/category/dried-fruits') }}">الفواكه المجففة</a></li>
			</ul>
		</li>
		<li> <a href="{{ url('/sub/category/products-from-all-over-the-world') }}">منتجات من كل أنحاء العالم <i class="fa-solid fa-angle-left me-1"></i></a>
			<ul class="nav-dropdown">
				<li><a href="{{ url('/sub/sub/category/egyptian-food') }}">أغذيه مصرية</a></li>
				<li><a href="{{ url('/sub/sub/category/mexican-food') }}">مأكولات مكسيكية</a></li>
				<li><a href="{{ url('/sub/sub/category/chinese-food') }}">أغذيه صينية</a></li>
			</ul>
		</li>
	</ul>
</li>
<li>
	<li> <a href="{{ url('main/category/vegetables-and-fruits') }}">الخضار والفواكة <i class="fa-solid fa-angle-down me-1" style='font-size: 10px;'></i></a>
		<ul class="nav-dropdown">
			<li> <a href="{{ url('/sub/category/fruit') }}">الفاكهة <i class="fa-solid fa-angle-left me-1"></i></a>
				<ul class="nav-dropdown">
					<li><a href="{{ url('/sub/sub/category/banana') }}">موز</a></li>
					<li><a href="{{ url('/sub/sub/category/orange') }}">البرتقال</a></li>
					<li><a href="{{ url('/sub/sub/category/') }}">ليمون حامض</a></li>
					<li><a href="{{ url('/sub/sub/category/lemon') }}">عنب</a></li>
					<li><a href="{{ url('/sub/sub/category/apple') }}">تفاح </a></li>
					<li><a href="{{ url('/sub/sub/category/pear') }}">إجاص</a></li>
					<li><a href="{{ url('/sub/sub/category/apricot-and-peach') }}">المشمش والخوخ</a></li>
					<li><a href="{{ url('/sub/sub/category/peach-and-nectarine') }}">خوخ ونكتارين</a></li>
					<li><a href="{{ url('/sub/sub/category/kiwi') }}">كيوي</a></li>
					<li><a href="{{ url('/sub/sub/category/mango') }}">مانجو</a></li>
					<li><a href="{{ url('/sub/sub/category/melon') }}">شمام</a></li>
					<li><a href="{{ url('/sub/sub/category/pass') }}">تمر</a></li>
					<li><a href="{{ url('/sub/sub/category/seed-fruit') }}">فاكهة البذور</a></li>
				</ul>
			</li>
			<li> <a href="{{ url('/sub/category/vegetables') }}">خضروات <i class="fa-solid fa-angle-left me-1"></i></a>
				<ul class="nav-dropdown">
					<li><a href="{{ url('/sub/sub/category/capsicum-and-hot-pepper') }}"> الفليفلة والفلفل الحار </a></li>
					<li><a href="{{ url('/sub/sub/category/eggplant') }}">الباذنجان </a></li>
					<li><a href="{{ url('/sub/sub/category/tomatoes') }}"> طماطم </a></li>
					<li><a href="{{ url('/sub/sub/category/salad') }}">سلطة </a></li>
					<li><a href="{{ url('/sub/sub/category/cabbage-and-other-cooking') }}">الملفوف وغيرها من الطهي  </a></li>
					<li><a href="{{ url('/sub/sub/category/pea-beans') }}">  حبوب البازلاء   </a></li>
					<li><a href="{{ url('/sub/sub/category/potato') }}">البطاطس </a></li>
					<li><a href="{{ url('/sub/sub/category/onions-and-shallots') }}">البصل والشالوت</a></li>
					<li><a href="{{ url('/sub/sub/category/asian-vegetables') }}">الخضروات الآسيوية</a></li>
					<li><a href="{{ url('/sub/sub/category/mushroom') }}">الفطر</a></li>
					<li><a href="{{ url('/sub/sub/category/zucchini') }}">كوسا</a></li>
					<li><a href="{{ url('/sub/sub/category/carrots') }}">جزر</a></li>
					<li><a href="{{ url('/sub/sub/category/cucumber') }}">خيار</a></li>
					<li><a href="{{ url('/sub/sub/category/Garlic-and-ginger') }}">الثوم و الزنجبيل</a></li>
				</ul>
			</li>
			<li> <a href="{{ url('/sub/category/herbs') }}">اعشاب <i class="fa-solid fa-angle-left me-1"></i></a>
				<ul class="nav-dropdown">
					<li><a href="{{ url('/sub/sub/category/fresh-herbs') }}">اعشاب طازجة</a></li>

				</ul>
			</li>
		</ul>
	</li>
	<li>
		<li>  <a href="{{ url('main/category/fresh-foods') }}"> أطعمة طازجة <i class="fa-solid fa-angle-down me-1" style='font-size: 10px;'></i></a>
			<ul class="nav-dropdown">
				 <li>
		<a href="{{ url('/sub/category/cold-meats-and-appetizers') }}">لحوم باردة و مقبلات <i class="fa-solid fa-angle-left me-1"></i></a>
		<ul class="nav-dropdown">
			<li><a href="{{ url('/sub/sub/category/cold-meat') }}">لحوم باردة</a></li>
			<li><a href="{{ url('/sub/sub/category/olives-and-appetizers') }}"> زيتون و مقبلات</a></li>
			<li><a href="{{ url('/sub/sub/category/seafood-and-caviar') }}">المأكولات البحرية والكافيار</a></li>
		</ul>
	</li>
	<li>
		<a href="{{ url('/sub/category/dairy-products-and-eggs') }}">منتجات الألبان والبيض <i class="fa-solid fa-angle-left me-1"></i></a>
		<ul class="nav-dropdown">
			<li><a href="{{ url('/sub/sub/category/Butter-and-ghee') }}">الزبدة و السمن</a></li>
			<li><a href="{{ url('/sub/sub/category/Cheese-and-Labneh') }}">جبنة و لبنة</a></li>
			<li><a href="{{ url('/sub/sub/category/generous') }}">كريم</a></li>
			<li><a href="{{ url('/sub/sub/category/egg') }}"> بيض</a></li>
			<li><a href="{{ url('/sub/sub/category/milk-and-yogurt') }}"> حليب ولبن</a></li>
			<li><a href="{{ url('/sub/sub/category/yogurt') }}"> الزبادي</a></li>
			<li><a href="{{ url('/sub/sub/category/chilled-sweets') }}">الحلويات المبردة</a></li>
		</ul>
	</li>

	<li>
		<a href="{{ url('/sub/category/fish-seafood') }}">السمك و المأكولات البحرية <i class="fa-solid fa-angle-left me-1"></i></a>
		<ul class="nav-dropdown">
			<li><a href="{{ url('/sub/sub/category/fish') }}">سمك</a></li>
			<li><a href="{{ url('/sub/sub/category/seafood') }}">مأكولات بحرية</a></li>
		</ul>
	</li>
	<li>
		<a href="{{ url('/sub/category/prepared-foods') }}">مأكولات جاهزة<i class="fa-solid fa-angle-left me-1"></i></a>
		<ul class="nav-dropdown">
			<li><a href="{{ url('/sub/sub/category/ready-meals') }}">وجبات جاهزة</a></li>
			<li><a href="{{ url('/sub/sub/category/appetizers-and-more') }}">المقبلات وغيرها</a></li>

		</ul>
	</li>
	 <li>
		<a href="{{ url('/sub/category/poultry-meat') }}"> دواجن و لحوم <i class="fa-solid fa-angle-left me-1"></i></a>
		<ul class="nav-dropdown">
			<li><a href="{{ url('/sub/sub/category/beef') }}"> لحم بقري</a></li>
			<li><a href="{{ url('/sub/sub/category/chicken') }}">دجاج </a></li>
			<li><a href="{{ url('/sub/sub/category/sheep-meat') }}"> لحم ضأن</a></li>
			<li><a href="{{ url('/sub/sub/category/turkey') }}"> ديك رومي</a></li>
			<li><a href="{{ url('/sub/sub/category/edible-offal') }}"> أحشاء صالحة للأكل</a></li>
			<li><a href="{{ url('/sub/sub/category/bbq-meat-and-poultry') }}"> لحوم ودواجن للشواء </a></li>
		</ul>
	</li>
			</ul>
		</li>
		<li> <a href="#">كل الفئات <i class="fa-solid fa-angle-down me-1" style='font-size: 10px;'></i></a>
			 <div class="megamenu-panel">
	<div class="megamenu-lists">
		<ul class="megamenu-list list-col-4">
			<li class="megamenu-list-title"><a href="#">Title Name</a></li>
			<li><a href="{{ url('main/category/fresh-foods') }}">أطعمة طازجة</a></li>
			<li><a href="{{ url('main/category/vegetables-and-fruits') }}" >الخضار والفواكه</a></li>
			<li><a href="{{ url('main/category/super-market') }}"> السوبر ماركت</a></li>
			<li><a href="{{ url('main/category/drinks') }}" > المشروبات </a></li>
			<li><a href="{{ url('main/category/baby-stuff') }}" >مستلزمات الأطفال</a></li>
			<li><a href="{{ url('main/category/office-and-school-supplies') }}"> دوات مكتبية و مدرسية</a></li>
			<li><a href="{{ url('main/category/auto-accessories') }}" >مستلزمات السيارات</a></li>
		</ul>
		<ul class="megamenu-list list-col-4">
			<li class="megamenu-list-title"><a href="#">Title Name</a></li>
			<li><a href="{{ url('main/category/frozen-foods') }}" >أطعمة مجمّدة</a></li>
			<li><a href="{{ url('main/category/organic') }}"> أورجانيك</a></li>
			<li><a href="{{ url('main/category/pies-and-pastries') }}">فطائر و مخبوزات</a></li>
			<li><a href="{{ url('main/category/pet-food-and-supplies') }}" >أطعمة ومستلزمات الحيوانات
					الأليفة</a></li>
			<li><a href="{{ url('main/category/electronics-and-home-appliances') }}" > الإلكترونيات والأجهزة المنزلية</a>
			</li>
			<li><a href="{{ url('main/category/paper-products-newspapers-etc') }}" >  منتجات ورقية، صحف وغيرها </a>
			<li><a href="{{ url('main/category/other-sections') }}" >     اقسام اخري </a>
			</li>
		</ul>
		<ul class="megamenu-list list-col-4">
			<li class="megamenu-list-title"><a href="#">Title Name</a></li>
			<li><a href="{{ url('main/category/mobiles-tablets-and-smart-hands') }}">موبايلات، تابلت وأجهزة اليد
					الذكية</a></li>
			<li><a href="{{ url('main/category/health-and-beauty') }}" >الصحة و الجمال</a></li>
			<li><a href="{{ url('main/category/sports-and-fitness-products') }}" >منتجات الرياضة و اللياقة البدنية</a>
			</li>
			<li><a href="{{ url('main/category/cleaning-and-household-supplies') }}" >التنظيف و المستلزمات المنزلية</a>
			</li>
			<li><a href="{{ url('main/category/home-garden-products') }}" >منتجات المنزل والحدائق</a></li>
			<li><a href="{{ url('main/category/clothes-accessories-and-bags') }}">  ملابس، أكسسوارات وحقائب</a></li>
		</ul>
		<ul class="megamenu-list list-col-4">
			<li><img src="{{ asset('image/full-length-portrait-cheerful-man-jumping.jpg') }}"
					width="150px" height="250px" alt=""></li>
		</ul>
	</div>
</div>
		</li>
		<li><a href="{{ route('landing') }}" target="">الرئيسية</a></li>
</ul>



						</div>
					</nav>
				</div>
			</div>
		</header>
	</div>
