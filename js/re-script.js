jQuery(function(){function o(o){jQuery.ajax({type:"POST",dataType:"json",url:"http://www.hhs.co.uk/wp-admin/admin-ajax.php",data:{action:"get_dataJary",n:mgips.noce},success:function(r){n(o,r)},error:function(o,n,r){alert("Error: "+r)}})}function n(o,n){var e=jQuery.parseJSON(n.res2);jQuery.each(e,function(n,e){e.cid.toLowerCase().indexOf(o)>-1||r(e.pid)})}function r(o){jQuery(".product-"+o)&&jQuery(".product-"+o).hide(),jQuery(".post-"+o)&&jQuery(".post-"+o).hide()}var e=function(){var n=function(o,n){if("com"==o){var e=window.location.href,t=window.location.pathname,i=e.search("www.hhs.com");if("-1"==i?i="f":(i="t",jQuery(document).ready(r(n))),"f"==i){var c="http://www.hhs.com"+t;window.location=c}}if("co.uk"==o){var e=window.location.href,t=window.location.pathname,i=e.search("www.hhs.co.uk");if("-1"==i?i="f":(i="t",jQuery(document).ready(r(n))),"f"==i){var a="http://www.hhs.co.uk"+t;window.location=a}}},r=function(n){o(n)},e={ae:!0,at:!0,au:!0,be:!0,bg:!0,by:!0,ca:!0,ch:!0,cz:!0,de:!0,dk:!0,ee:!0,es:!0,fi:!0,fr:!0,gb:!0,gg:!0,gr:!0,hr:!0,hu:!0,ie:!0,is:!0,it:!0,je:!0,lt:!0,lu:!0,lv:!0,mc:!0,mt:!0,nl:!0,no:!0,nz:!0,pl:!0,pt:!0,ro:!0,ru:!0,se:!0,si:!0,sk:!0,tr:!0,ua:!0,us:!0},t=function(o){if(!o.country.iso_code)return void n("co.uk","gb");var r=o.country.iso_code.toLowerCase();e[r]?"gb"==r?n("co.uk",r):n("com",r):n("co.uk",r)},i=function(){n("co.uk","gb")};return function(){geoip2.country(t,i)}}();e()});

// jQuery(function(){
	
// var redirect = (function () {
	
// 	/*lets redirect users to the appropriate site by figureing out where there IP is located in the world. 
// 	/*uk users got to www.hhs.co.uk
// 	/*rest of the world goes to the .com site*/

// 	var redirectBrowser = function (site,code1) {
// 	 // Here we will redirect the user to the appropriate page depending on what country they are from. 
// 	 // Also It will try to take them to a page that matches 	the page they landded on initally eg.. user from france Landing page:
// 	 // www.hhs.co.uk/p/ will be redirected to    www.hhs.com/p/
	
// 		if (site == "com") {
// 			var href = window.location.href; var path = window.location.pathname; var n = href.search("www.hhs.com");
// 			if(n == "-1"){ n = "f";}else{n= "t"; jQuery(document).ready(hideproducts(code1));}
// 			if (n=="f") { var Rd = "http://www.hhs.com"+path; window.location = Rd;};
// 		};
	
// 		if (site == "co.uk") {
// 			var href = window.location.href; var path = window.location.pathname; var n = href.search("www.hhs.co.uk");
// 			if(n == "-1"){ n = "f";}else{n= "t";jQuery(document).ready(hideproducts(code1));}
// 			if (n=="f") { var Rdirect = "http://www.hhs.co.uk"+path; window.location = Rdirect;};
// 		};
// 	};//	end redirectBrowser function
	
// 	/*
// 	Here we will be hideing all the products by default unless they are give premission on the seetings page on the back of wordpress site. 
// 	!important all products by default will be hidden
// 	*/
// 	var hideproducts = function (C_ID) {
// 		getdata_array(C_ID);

		
// 	};

// 	var sites = { "ae": true,"at": true,"au": true,"be": true,"bg": true,"by": true,"ca": true,"ch": true,"cz": true,"de": true,"dk": true,"ee": true,"es": true,"fi": true,"fr": true,"gb": true,"gg": true,"gr": true,"hr": true,"hu": true,"ie": true,"is": true,"it": true,"je": true,"lt": true,"lu": true,"lv": true,"mc": true,"mt": true,"nl": true,"no": true,"nz": true,"pl": true,"pt": true,"ro": true,"ru": true,"se": true,"si": true,"sk": true,"tr": true,"ua": true,"us": true}
//     var defaultSite = "rotw";
//     var onSuccess = function (geoipResponse) {
//         /* 	If there is no valid response from Maxmind then we 
// 			redirect them to the co.uk (should help increase the SEO) */
//         if (!geoipResponse.country.iso_code) {
//             redirectBrowser("co.uk","gb");
//             return;
//         }

//     /* ISO country codes are in upper case. */
// 	var code = geoipResponse.country.iso_code.toLowerCase();

//         if ( sites[code] ) {
//             if (code == "gb") {	
// 				redirectBrowser("co.uk",code);
// 				//alert("redirect gb"+ "- "+code);
// 				//jQuery(document).ready(hideproducts(code));
// 			}else { 			
// 				redirectBrowser("com",code);
// 				//alert("redirect other"+ "- "+code);
//             	//jQuery(document).ready(hideproducts(code));
//             }
//         }
//         else {
//             redirectBrowser("co.uk",code);
// 			//alert("redirect unknown"+ "- "+code);
//             //jQuery(document).ready(hideproducts(code));
//         }
//     };

//     /* We don't really care what the error is, we'll send them
//      * to the default site. */
//     var onError = function (error) {
//         redirectBrowser("co.uk","gb");
//         //jQuery(document).ready(hideproducts(code));
//     };

//     return function () {
//         geoip2.country( onSuccess, onError );
//     };
	
// 	}());redirect();// end redirct function
	
// function getdata_array(C_ID){
// 	//alert("In Ajax call");
// 	jQuery.ajax({
//   		type: 'POST',
// 		dataType : "json",
//   		url: 'http://www.hhs.co.uk/wp-admin/admin-ajax.php',
//   		data: {	action: 'get_dataJary',n:mgips.noce},
// 		success: function(data){
// 			processProducts(C_ID,data);
// 			},
// 		error: function(MLHttpRequest, textStatus, errorThrown){
// 			alert("Error: "+errorThrown);
// 			}
// 	});
	
// }
 
// function processProducts(C_ID,data){
// 	var obj = jQuery.parseJSON(data.res2);
// 		jQuery.each(obj, function(key,value) {
// 			if(value.cid.toLowerCase().indexOf(C_ID) > -1){
// 			}else{
// 			HideIndvidualProduct(value.pid);
// 			   	 }
// 		}); 
	
// 	}

// function HideIndvidualProduct(id){
// 	if(jQuery(".product-"+id)){
// 		jQuery(".product-"+id).hide();
// 	}
// 	if(jQuery(".post-"+id)){
// 		jQuery(".post-"+id).hide();
// 		}
// 	}
// });//end jQuery