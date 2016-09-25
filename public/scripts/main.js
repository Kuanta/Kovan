function prepareEventHandlers(){

	var searchButton=document.getElementById('searchButton');
	searchButton.onclick=function(){
		var form=document.getElementById('searchForm');
		var keyword=document.getElementById('keyword').value;
	
		form.action='/Kovan/public/display/search/'.concat(keyword);
	};
}

window.onload=function(){
	prepareEventHandlers();
}