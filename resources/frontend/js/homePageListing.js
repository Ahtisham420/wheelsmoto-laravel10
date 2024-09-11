function HomePageFeatureListing() {
    let section =$("#homePageFeatureListing");
    section.html('<div class="loading-container m-auto">\n' +
        '<div class="loading-progress"></div>\n' +
        '</div>');
    let _url = 'api/home/featureListing';
    var appUrl = document.querySelector('meta[name="app_url"]').getAttribute('content');
    let urlMerge  = appUrl + _url
    let curl  = '';
    axios.get(urlMerge).then(function(response) {
        console.log(response);
        if (response.data.code === 200){
            section.html(response.data.data);
            // if (response.data.btn === "Ended"){
            //     $(curl).html(response.data.btn);
            // } else {
            //     $(curl).html(response.data.btn + '<div class="loader m-auto" id="loda-more-tile-loader"></div>');
            // }
        } else {
       //     $(curl).html(response.data.btn);
        }
        $("#loda-more-tile-loader").hide();
    }).catch(function(error) {
        console.error(error);
        $(curl).html("Error");
        $("#loda-more-tile-loader").hide();
    });
}
function loadMore(ele,url,btn) {
    const loaderId = $(ele).data("loader-id");
    const $loader = $("#" + loaderId);  // Select the loader element using the loader ID
    const $button = $(ele);
    $loader.show();
    axios.get(url).then(function(response) {
        if (response.data.code === 200){
            $button.remove();
            console.log('response.data.data',response.data.data);
            $("#homePageFeatureListing").append(response.data.data);
        } else {
            //     $(curl).html(response.data.btn);
        }
        $loader.hide();
    }).catch(function(error) {
        console.error(error);
        $loader.html("Error");
        $loader.hide();
    });
}
HomePageFeatureListing();

function NearByFeatureListing() {
    let section =$("#featureListing");
    section.html('<div class="loading-container m-auto">\n' +
        '<div class="loading-progress"></div>\n' +
        '</div>');
    let _url = 'api/home/nearByListing';
    var appUrl = document.querySelector('meta[name="app_url"]').getAttribute('content');
    let urlMerge  = appUrl + _url
    let curl  = '';
    axios.get(urlMerge).then(function(response) {
        console.log(response);
        if (response.data.code === 200){
            section.html(response.data.data);
            // if (response.data.btn === "Ended"){
            //     $(curl).html(response.data.btn);
            // } else {
            //     $(curl).html(response.data.btn + '<div class="loader m-auto" id="loda-more-tile-loader"></div>');
            // }
        } else {
       //     $(curl).html(response.data.btn);
        }
        $("#loda-more-tile-loader").hide();
    }).catch(function(error) {
        console.error(error);
        $(curl).html("Error");
        $("#loda-more-tile-loader").hide();
    });
}

function loadMoreNearby(ele,url,btn) {
    const loaderId = $(ele).data("loader-id");
    const $loader = $("#" + loaderId);
    const $button = $(ele);
    $loader.show();
    axios.get(url).then(function(response) {
        if (response.data.code === 200){
            $button.remove();
            console.log('response.data.data',response.data.data);
            $("#featureListing").append(response.data.data);
        } else {
            //     $(curl).html(response.data.btn);
        }
        $loader.hide();
    }).catch(function(error) {
        console.error(error);
        $loader.html("Error");
        $loader.hide();
    });
}
NearByFeatureListing();
