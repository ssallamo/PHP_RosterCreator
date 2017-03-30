
 	function fnAjaxFetchInfo(){
 		
 		var str = "EmpID="+$('#nm').val();		
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            	var str= xmlhttp.responseText.split('|');
                document.getElementById("ajaxID").innerHTML = "<input type='text' class='form-control' id='idval' value='"+str[0]+"' readOnly>";
                document.getElementById("ajaxPhone").innerHTML ="<input type='text' class='form-control' id='phone' value='"+str[1]+"'>";
                document.getElementById("dispEmpInfo").innerHTML =str[2];
                $('#myInfo').hide();
            }
        };
        xmlhttp.open("GET","dbSelectEmpInfo.php?"+str,true);
        xmlhttp.send();        
 	}
 	
 	
	function fnSetWork(cd, nm, idVal){
		var str="";
		if(cd=="1")      str="On Monday";
		else if(cd=="2") str="On Tuesday";
		else if(cd=="3") str="On Wendsday";
		else if(cd=="4") str="On Thursday";
		else if(cd=="5") str="On Friday";
		else if(cd=="6") str="On Saturday";
		else if(cd=="7") str="On Sunday";
		$('#idStr').html(str);
		$('#nm3').val(nm);
		$('#idm').val(idVal);
		$("#avblYn option:eq(1)").attr("selected", "selected");	
	}
	
	
	function fnNewEmp(){
    	$("#flag").val('N'); 
    	$("#id").val(''); 
    	$("#nm2").val('');
    	$("#phn").val('');
    	$("#lvl").val('E');
    	$("#pw").val('');
        $("#myModal").modal();
	}
	
	function fnUpdateEmp(){
    	$("#flag").val('U'); 
    	$("#id").val($("#empId").val()); 
    	$("input[name=id]").attr("readonly",true);
    	$("#nm2").val($("#empNm").val());
    	$("#phn").val($("#empPhn").val());
    	$("#lvl").val($("#empLvl").val());
    	$("#pw").val('');
        $("#myModal").modal(); 
	}
	
	function fnShowLevel() {
		/*
		$('#Day').val(dtSeq);
		$('#Seq').val(tmSeq);				
		var stTm = document.getElementById('st'+dtSeq+tmSeq+'tm').value+document.getElementById('st'+dtSeq+tmSeq+'mn').value;
		var fnTm = document.getElementById('fn'+dtSeq+tmSeq+'tm').value+document.getElementById('fn'+dtSeq+tmSeq+'mn').value;
		$('#Stf').val(stTm);
		$('#Fnt').val(fnTm);		
		var str = "Day="+dtSeq +"&Seq="+tmSeq+"&Stf="+stTm+"&Fnt="+fnTm+"&ModifyWeeklyKey="+$('#ModifyWeeklyKey').val();
		
		if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("wk"+dtSeq+tmSeq+"nm").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","dbAjaxSelectTmMatch.php?"+str,true);
        xmlhttp.send();
        */
        		
	}
	