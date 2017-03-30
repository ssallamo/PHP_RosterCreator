function setDate(FORM, year, month, date) {
	var current, year, month, date, dates, i, j;
	current = new Date();
	year = (year) ? year : current.getFullYear();
	
	for (i=0, j=year-1; i < 5; i++, j++) FORM.year.options[i] = new Option(j, j);
	month = (month) ? month : current.getMonth()+1;
	
	for (i=0; i < 12; i++) {
		j = (i < 9) ? '0'+(i+1) : i+1;
		FORM.month.options[i] = new Option(j, j);
	}
	date = (date) ? date: current.getDate();
	dates = new Date(new Date(year, month, 1)-86400000).getDate();
	FORM.date.length = 0;
	
	for (i=0, j; i < dates; i++) {
		j = (i < 9) ? '0'+(i+1) : i+1;
		FORM.date.options[i] = new Option(j, j);
	}
	FORM.year.value = year;
	FORM.month.options[month-1].selected = true;
	FORM.date.options[date-1].selected = true;
}

//addPost.php => add new category
function addCategory(count) {
	var selectedOption = document.getElementById("category").value;
	if(selectedOption == 'addCategory') {
		//location.href="addCategory.php?mode=write";
		var category = prompt("Please enter new category", "");
		if (category != null) {
			location.href="addCategory.php?mode=write&category="+category+"&count="+count;
		}
	}
}

//freeBoard.php => go to detail of the selected post
function goPostDetail(number, name, secret, sessionName, sessionId){
	if(secret==1) {
		if(name == sessionName || sessionId == '0001') {
			location.href="../freeBoard/vwPostDetail.php?number="+number;
		} else {
			alert("Only Admin and Writer can Access!");
		}
	} else {
		location.href="../freeBoard/vwPostDetail.php?number="+number;
	}
	
	
}

//freeBoard.php => go to "add new post" page
function addPost() {
	location.href="vwAddPost.php";
}

//tradingRecord.php => go to detail of the selected record
function goRecordDetail(target, number){
	location.href="vwRecordDetail.php?target="+target+"&number="+number;
}

//tradingRecord.php =>go to "add new Record" page
function addRecord(target) {
	location.href="vwAddRecord.php?record="+target;
}

//tradingRecord.php => select the option of status and call the function about select data with status
function changeStatus(target) {
	var selectedOption = "";
	if(target=="loan") {
		selectedOption = document.getElementById("loanStatus").value;
	} else if(target=="borrow") {
		selectedOption = document.getElementById("borrowStatus").value;
	}
	location.href="getSelectedStatus.php?target="+target+"&status="+selectedOption;
}