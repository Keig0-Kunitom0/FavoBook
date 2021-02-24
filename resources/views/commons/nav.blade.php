<nav class="navbar navbar-expand-sm navbar-dark bg-success">
    
	<a href="/" class="navbar-brand"><i class="fas fa-book-open mr-1"></i>FavoBook</a>	
	
	<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div id="navbarCollapse" class="navbar-collapse justify-content-start collapse" style="">
	    <div class="navbar-nav ml-auto">
	        <!--<search-form @pass-value="search"></search-form>-->
	        @guest
            <li class="nav-item">
                 <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a> 
            </li>
            @endguest
            
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
            </li>
             @endguest
             
             @auth
             <li class="nav-item">
                <a class="nav-link" href="/"><i class="fas fa-search"></i>検索する</a>
            </li>
             &nbsp;
             <!-- Dropdown -->
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle"> &nbsp;{{Auth::user()->nickname}}さん</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <button class="dropdown-item" type="button" onclick="location.href='{{ route("users.show", ["user" =>  Auth::id()]) }}'">
                      マイページ
                    </button>
                    <div class="dropdown-divider"></div>
                    <button form="logout-button" class="dropdown-item" type="submit">
                      ログアウト
                    </button>
                </div>
            </li>
            <form id="logout-button" method="POST" action="{{ route('logout') }}">
              @csrf
            </form>
             @endauth
        </div>
	</div>
</nav>