var _url = "";

$(document).ready( () => {

});


function shareSocial(id) {
	$("#share-" + id).jsSocials({
        shares: ["twitter", "facebook", "googleplus", "linkedin",  {
        	share:"pinterest",
		    label: "Pin it",
		    logo: "fa fa-pinterest",
		    media: ""
		}],
        url: "https://www.modpc.com.ar",
        text: "",
        showLabel: false,
    	showCount: false,
    	shareIn: "popup"
    });
}


