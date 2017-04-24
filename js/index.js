$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
    var y = document.forms["myForm"]["pass"].value;
        
      
            if ( x == "admin" && y == "admin" )
            {
                return true ;
            }
            else
            {
                if ( x != "admin" && y != "admin" && x != "" && y != "")
                {   
                alert("Username or password incorrect");
                return false;
                }
            }
        
        
}

