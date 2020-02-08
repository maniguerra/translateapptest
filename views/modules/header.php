
            
            
             <div class="navbar-custom-menu float-right">
                    <ul class="nav topBotomBordersOut navbar-nav text-center">
                        <li class="nav-item pt-1 mb-0 pb-0">
                            
                                    
                                    <span><?php
                                    if($_SESSION["premium"] == "yes"){
                                        echo '<a href="logout" class="nav-link"><i class="fa fa-star"></i> You\'re Premium - '.$_SESSION["username"].' - Logout</a>';
                                    }else{
                                        echo '<a href="logout" class="nav-link"id="user-button">Logout</a>';
                                    }
                                    ?></span>
                            
                            
                        
                        </li>
                    </ul>
            </div>
            <div class="navbar-custom-menu float-left">
                    <ul class="nav topBotomBordersOut navbar-nav text-center">
                        <li class="nav-item pt-1 mb-0 pb-0">
                           
                                   
                                    <span><?php 
                                    if($_SESSION["premium"] == "yes"){
                                        echo '<a href="premium" class="nav-link" ><i class="fa fa-star"></i> Premium Zone</a>';
                                        
                                    }else{
                                        echo '<a href="get-premium" class="nav-link" ><i class="fa fa-star"></i> Get Premium</a>';
                                        
                                    }?></span>
                            
                           
                        
                        </li>
                    </ul>
            </div>
            
            <nav class="navbar navbar-light navbar-expand-md justify-content-center pt-0 w-100 " id="navigation-bar">
                <div class="container">

                    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2" style="max-height:6vh;">
                        <ul class="topBotomBordersOut navbar-nav mx-auto text-center">
                            
                             <li class="nav-item pt-1">
                                <a class="nav-link" href="all-glossaries">All Glossaries</a>
                            </li>
                            <li class="nav-item pt-1">
                                <a class="nav-link" href="my-glossaries">My Glossaries</a>
                            </li>
                            
                        </ul>
                    </div>
                    
                </div>
               
            </nav>
           
        


 