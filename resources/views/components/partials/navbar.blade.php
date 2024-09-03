<div id="loader" class="fixed inset-0 flex items-center justify-center bg-white z-50" x-show="loading">
    <div class="loader border-t-transparent border-solid animate-spin rounded-full border-blue-400 border-4 h-12 w-12">
    </div>
</div>

<div class="navigation" x-show="!loading" x-cloak>
    <ul>
        <li class="list {{ Request::is('/') ? 'active' : '' }}">
            <a href="#">
                <a href="#" class="delayed-link" data-href="/">
                    <span class="icon"><ion-icon name="home-outline" title="Home"></ion-icon></span>
                    <span class="text">Home</span>
                </a>
            </a>
        </li>


        <li class="list {{ Request::is('transaction') ? 'active' : '' }}">
            <a href="#">
                <a href="#" class="delayed-link" data-href="/transaction">
                    <span class="icon"><ion-icon name="receipt-outline"></ion-icon></span>
                    <span class="text">Transaction</span>
                </a>
            </a>
        </li>

        <li class="list {{ Request::is('profile') ? 'active' : '' }}">
            <a href="#">
                <a href="#" class="delayed-link" data-href="/profile">
                    <span class="icon"><ion-icon name="person-outline" title="Profile"></ion-icon></span>
                    <span class="text">Profile</span>
                </a>
            </a>
        </li>

        <div class="indicator"></div>
    </ul>
</div>


{{-- {{ Request::is('category/seragam') ? 'active' : 'text-[#C9C9C9]' }} --}}
