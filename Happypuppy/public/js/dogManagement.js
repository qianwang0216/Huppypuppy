
$(document).ready(function () {
    
    $( ".DOB" ).datepicker({ 
        dateFormat: "yy-mm-dd"
    });
    
    $(".saveEditIcon").click(function () {
        console.log("save edit");
        if (validateForm($(this).parent().parent()))
        {
            $(this).parent().parent().submit();
        }        
    });
    $(".saveAddIcon").click(function () {
        console.log("save add");
        if (validateForm($(this).parent().parent()))
        {
            $(this).parent().parent().submit();
        }  
    });
    
    $(".dogAddIcon img").click(function () {
        $(".dogAddIcon").hide();
        $(".dogAddForm").show();
    });
    $(".cancelAddIcon").click(function () {
        $(".dogAddForm").hide();
        $(".dogAddIcon").show();
    });
    $(".editIcon").click(function () {
        $(this).parent().parent().hide();
        $(this).parent().parent().siblings(".dogEditForm").show();
    });    
    $(".cancelEditIcon").click(function () {
        $(this).parent().parent().parent().hide();
        $(this).parent().parent().parent().siblings(".dogInfoShow").show();
    });  
    
});

function validateForm(form)
{
    name = $(form).find('input[name="name"]').val();
    if (name == '')
    {
        alert ('Please enter the name.');
        $(form).find('input[name="name"]').focus();
        return false;
    }
    breed = $(form).find('input[name="breed"]').val();
    if (breed == '')
    {
        alert ('Please enter the breed.');
        $(form).find('input[name="breed"]').focus();
        return false;
    }    
    DOB = $(form).find('input[name="DOB"]').val();
    if (DOB == '')
    {
        alert ('Please enter the date of birth.');
        $(form).find('input[name="DOB"]').focus();
        return false;
    }
    if (!isValidDate(DOB))
    {
        alert ('Please enter the valid date of birth (YYYY-MM-DD).');
        $(form).find('input[name="DOB"]').focus();
        return false;        
    }
    color = $(form).find('input[name="color"]').val();
    if (color == '')
    {
        alert ('Please enter the color.');
        $(form).find('input[name="color"]').focus();
        return false;
    }
    weight = $(form).find('input[name="weight"]').val();
    if (weight == '')
    {
        alert ('Please enter the weight.');
        $(form).find('input[name="weight"]').focus();
        return false;
    }
    if (isNaN(weight))
    {
        alert ('Please enter valid weight.');
        $(form).find('input[name="weight"]').focus();
        return false;
    }
    return true;
}

function isValidDate(str){
	// STRING FORMAT yyyy-mm-dd
	if(str=="" || str==null){return false;}	
        
        var re = /^\d{4}-\d{2}-\d{2}$/;
        if (!re.test(str)) return false;
	
	// m[1] is year 'YYYY' * m[2] is month 'MM' * m[3] is day 'DD'					
	var m = str.match(/(\d{4})-(\d{2})-(\d{2})/);
	
	// STR IS NOT FIT m IS NOT OBJECT
	if( m === null || typeof m !== 'object'){return false;}				
	
	// CHECK m TYPE
	if (typeof m !== 'object' && m !== null && m.size!==3){return false;}
				
	var ret = true; //RETURN VALUE						
	var thisYear = new Date().getFullYear(); //YEAR NOW
	var minYear = 1900; //MIN YEAR
	
	// YEAR CHECK
	if( (m[1].length < 4) || m[1] < minYear || m[1] > thisYear){ret = false;}
	// MONTH CHECK			
	if( (m[1].length < 2) || m[2] < 1 || m[2] > 12){ret = false;}
	// DAY CHECK
	if( (m[1].length < 2) || m[3] < 1 || m[3] > 31){ret = false;}
	
	return ret;			
}