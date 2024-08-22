<div class="navigation">
    <ul>
        <li class="list {{ Request::is('/') ? 'active' : '' }}">
            <a href="#">
                <a href="#" class="delayed-link" data-href="/">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
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
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="text">Profile</span>
                </a>
            </a>
        </li>

        <div class="indicator"></div>
    </ul>
</div>


{{-- {{ Request::is('category/seragam') ? 'active' : 'text-[#C9C9C9]' }} --}}
