 // use jquery to build a dynamic add/ remove form 
 $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML ='';
    fieldHTML +='<div class="row"><input type="text" class="form-control col mb-2 mr-2" placeholder="Sku" name="sku[]" value=""/>';
    fieldHTML +='<input type="text" class="form-control col mb-2 mr-2" placeholder="Size" name="size[]" value=""/>';
    fieldHTML +='<input type="text" class="form-control col mb-2 mr-2" placeholder="Price" name="price[]" value=""/>';
    fieldHTML +='<input type="text" class="form-control col mb-2 mr-2" placeholder="Discount" name="discount[]" value=""/>';
    fieldHTML +='<input type="text" class="form-control col mb-2 mr-2" placeholder="Quantity" name="quantity[]" value=""/>';
    fieldHTML +=' <a href="javascript:void(0);" class="remove_button col mb-2 mr-2"><img src=""/>Xóa</a></div>';
                                  
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});