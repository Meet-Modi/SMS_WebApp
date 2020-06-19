(function ($) {
    "use strict";
    
})(jQuery);

function showNavBar(userid, firstname, lastname){
				
    var html = `				
    <div class="container-menu-header">
        <div class="wrap_header">
            <a href="index.html" class="logo">
                <img src="images/icons/logo.png" alt="IMG-LOGO">
            </a>
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="../AMC/index.html">AMC</a>
                        </li>
                        <li>
                            <a href="../Customer/index.html">Customer</a>
                        </li>
                        <li>
                            <a href="../Complaint/index.html">Complaint</a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <div class="header-icons">
                <a href="../todo/index.html" class="header-wrapicon1 dis-block">
                    <img src="images/icons/todo.jpg" class="header-icon1" alt="ICON">
                </a>
                
                <span class="linedivide1"></span>
                
                <div class="header-wrapicon2">
                    <img src="images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <li class="header-cart-item">
                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Userid : ` + userid + `
                                    </a>
                                </div>
                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Name : `+ firstname + ` ` + lastname +` 
                                    </a>
                                </div>
                            </li>
                            
                            
                        </ul>
                        
                        <div class="header-cart-buttons">
                            <!-- Button -->
                            <a href="../Logout/logout.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `;
    
    $('#navbar').html(html);
}

