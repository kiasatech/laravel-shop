<form action="{{route('home.index')}}" method="get">
    <input type="text" class="search-input" name="search" value="{{request()->query('search')}}"
           placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
    <button type="submit" class="button-search">
        <img src="{{ asset('/') }}assets/images/search.png">
    </button>
</form>
{{--<div class="search-result">
    <ul class="search-result-list mb-0">
        <li>
            <a href="#"><i class="mdi mdi-clock-outline"></i>
                فروشگاه ها
                <button class="btn btn-light btn-remove-search" type="submit">
                    <i class="fa-duotone fa-close"></i>
                </button>
            </a>
        </li>
        <li>
            <a href="#"><i class="mdi mdi-clock-outline"></i>
                محصولات
                <button class="btn btn-light btn-remove-search" type="submit">
                    <i class="fa-duotone fa-close"></i>
                </button>
            </a>
        </li>
        <li>
            <a href="#"><i class="mdi mdi-clock-outline"></i>
                کالای دیجیتال
                <button class="btn btn-light btn-remove-search" type="submit">
                    <i class="fa-duotone fa-close"></i>
                </button>
            </a>
        </li>
        <li>
            <a href="#"><i class="mdi mdi-clock-outline"></i>
                ثبت فروشگاه
                <button class="btn btn-light btn-remove-search" type="submit">
                    <i class="fa-duotone fa-close"></i>
                </button>
            </a>
        </li>
        <li>
            <a href="#"><i class="mdi mdi-clock-outline"></i>
                ظروف
                <button class="btn btn-light btn-remove-search" type="submit">
                    <i class="fa-duotone fa-close"></i>
                </button>
            </a>
        </li>
    </ul>
</div>--}}
