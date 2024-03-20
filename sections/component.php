<?php
    function component($path,$lapname,$lapimg,$status,$price,$id) {
        $element ="
            <div class=\"col-md-3 col-sm-6 py-3 my-md-0\">
                <form action=\"$path\" method=\"POST\">
                    <div class=\"card text-center shadow\">
                        <div class=\"mt-mb-2\">
                            <img src=\"$lapimg\" width=\"100px\" height=\"250px\" class=\"card-img-top\" alt=\"image\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$lapname</h5>
                            <h6 class=\"card-title\"><label>Laptop Status:</label> $status</h6>
                            <h6 class=\"card-title\"><label>Rent Price NRS </label> $price /day</h6>
                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Book<i class=\"fal fa-shopping-cart\"></i></button>
                            <button type=\"submit\" class=\"btn btn-info ml-3\" name=\"detail\">Details</button>
                            <input type=\"hidden\" name=\"lap_id\" value=\"$id\">
                        </div>
                    </div>
                </form>
            </div>
        ";
        echo $element;
    }
    function cartElement($lapname,$lapimg,$price,$lap_id,$o_id){
        $element="
        <form class=\"cart-items\" action=\"index.php?m=cart&p=addcart&%id=$lap_id\" method=\"POST\">
            <div class=\"border rounded\">
                <div class=\"row bg-white\">
                    <div class=\"col-md-3 pl-0\">
                        <img src=\"$lapimg\" width=\"170px\" height=\"140px\" alt=\"image\">
                    </div>
                    <div class=\"col-md-4\">
                        <h5 class=\"pt-2\">$lapname</h5>
                        <small class=\"text-secondary\">Rentar ID: $o_id</small>
                        <h5 class=\"pt-2\">NPR $price /day</h5>
                        <button type=\"submit\" class=\"btn btn-info mx-0 mt-2 mb-1\" name=\"request\">Booked</button>
                        <button type=\"submit\" class=\"btn btn-danger mx-0 mt-2 mb-1\" name=\"remove\">Remove</button>
                    </div>
                    <div class=\"col-md-5\">
                        <h6>Booking Date</h6>
                        <div class=\"input-group\">
                            <div class=\"input-group-prepend\">
                                <span class=\"input-group-text\"><i class=\"fal fa-calendar-alt\"></i></span>
                            </div>
                            <input type=\"text\" size=\"20\" name=\"start\" class=\"form-control\" id =\"date1\" >
                        </div>        
                        <h6 class=\"mt-2\">End of Booking</h6>
                        <div class=\"input-group\">
                            <div class=\"input-group-prepend\">
                                <span class=\"input-group-text\"><i class=\"fal fa-calendar-alt\"></i></span>
                            </div>
                            <input type=\"text\" size=\"20\" name=\"end\" class=\"form-control\" id = \"date2\" >
                        </div>
                        <input type=\"hidden\" name=\"lap_id\" value=\"$lap_id\">
                        <input type=\"hidden\" name=\"own_id\" value=\"$o_id\">
                        <input type=\"hidden\" name=\"lap_name\" value=\"$lapname\">
                        <input type=\"hidden\" name=\"lap_price\" value=\"$price\">
                        <script>
                        $(function() {
                                     $( \"#date1\" ).datepicker({
                                        prevText:\"click for previous months\",
                                        nextText:\"click for next months\",
                                        dateFormat: 'dd-mm-yy',
                                        changeMonth: true,
                                        changeYear: true
                                     });
                                  
                                     $( \"#date2\" ).datepicker({
                                        prevText:\"click for previous months\",
                                        nextText:\"click for next months\",
                                        dateFormat: 'dd-mm-yy',
                                        changeMonth: true,
                                        changeYear: true
                                     });
                                  
                                  });
                       </script>
                    </div>
                </div>
            </div>
        </form>
        ";
        echo $element;
    }
    
?>