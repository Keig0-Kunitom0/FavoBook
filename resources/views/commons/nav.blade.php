<nav class="navbar navbar-expand-sm navbar-dark bg-success">
    
	<a href="#" class="navbar-brand"><i class="fas fa-book-open mr-1"></i></i>FavoBook</a>	
	
	<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div id="navbarCollapse" class="navbar-collapse justify-content-start collapse" style="">
	    <div class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="">ユーザー登録</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">ログイン</a>
            </li>
             <!-- Dropdown -->
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <button class="dropdown-item" type="button"onclick="location.href=''">
                      マイページ
                    </button>
                    <div class="dropdown-divider"></div>
                    <button form="logout-button" class="dropdown-item" type="submit">
                      ログアウト
                    </button>
                </div>
            </li>
        </div>
    	<div class="navbar-nav ml-auto">
            <form>
            	<div class="input-group mr-5 pr-3">								
            		<input type="text" class="form-control" placeholder="検索...">
            		<div class="input-group-append ">
            			<button class="input-group-text"><i class="fas fa-search"></i></button>
            		</div>
            	</div>
            </form>
    	</div>
	</div>
</nav>