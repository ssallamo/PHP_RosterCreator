	
	function fnShowBtns(){
		if($("#ModifyWeeklyKey").val()!=''){
			$('#btnTmpSave').hide();
			$('#btnCfmSave').hide();
			$('#btnCreateTbl').hide();
		}
		else{
			$('#btnUpdateSave').hide();
		}
	}
	
	function fnShowEmps(dtSeq, tmSeq, inId) {
		
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
        
		/*
		//$('#Day').val(dtSeq);
		//$('#Seq').val(tmSeq);				
		var stTm = document.getElementById('st'+dtSeq+tmSeq+'tm').value+document.getElementById('st'+dtSeq+tmSeq+'mn').value;
		var fnTm = document.getElementById('fn'+dtSeq+tmSeq+'tm').value+document.getElementById('fn'+dtSeq+tmSeq+'mn').value;
		//$('#Stf').val(stTm);
		//$('#Fnt').val(fnTm);		
		
		var StrDt = $('#StDt').val();
		var ExpDt = $('#FnDt').val();
		
		//$('#temp').val(StrDt+' '+ExpDt);
		//var str = "Day="+dtSeq +"&Seq="+tmSeq+"&Stf="+stTm+"&Fnt="+fnTm+"&ModifyWeeklyKey="+$('#ModifyWeeklyKey').val();
		var str = "StrDt="+$('#StDt').val()+"&ExpDt="+$('#FnDt').val();
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