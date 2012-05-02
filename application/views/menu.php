<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <ul class="nav">
      	<a class="brand" href="#">Babyblog Back Office</a>
		  <? if (@$this->session->userdata["flags"] & U_COURIER) { echo "<li><a href=/courier>Курьер</a></li>"; } ?>
		  <li><a href="/booking/">Букинги</a></li>
		  <li class="divider-vertical"></li>
		  <li class="dropdown">
   		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          	Справочники
          	<b class="caret"></b>
    	  </a>
    		<ul class="dropdown-menu">
                <li><a href="/companys/">Компании-контрагенты</a></li>
                <li><a href="/agreement/">Договора / приложения / акты</a></li>
                <li><a href="#">Типы размещений</a></li>
                <li class="divider"></li>
                <li><a href="/users/">Пользователи</a></li>

              </ul>
          </li>  
            
          
          
          
 		
	  </ul>
	  <ul class="nav pull-right">
	  <li><a href="/sessions/logout/">Выйти <i class="icon-share icon-white"></i></a></li>
	  </ul>
    </div>
  </div>
</div>
