$(document).ready(
    function () {
        $("#gridview").on("click",
            function () {
                $("#gridview i").css("color", "#00a651");
                $("#listview i").css("color", "#dadada");
                $("#gridview").addClass("active");
                $("#listview").removeClass("active");
                $(".listing-desc").addClass("d-none");
                document.getElementById('products').classList.add('grid-view');
                document.getElementById('products').classList.remove('list-view');
                document.getElementById('products').classList.remove('d-block')

                // $('.colwidth .card .card-body').css("padding-left", "0");


            }

        );

        $("#listview").on("click",

            function () {
                $("#gridview i").css("color", "#dadada");
                $("#listview i").css("color", "#00a651");
                $("#listview").addClass("active");
                $("#gridview").removeClass("active");
                // $(".listing-title").css({"display": "block", "-webkit-line-clamp": "none", "-webkit-box-orient": "none", "overflow": "none"});
                $(".listing-desc").removeClass("d-none");
                document.getElementById('products').classList.add('list-view');
                document.getElementById('products').classList.remove('grid-view');
                document.getElementById('products').classList.add('d-block')

            }

        );

        function removeListviewMobile(x) {
            if (x.matches) { // If media query matches
                document.getElementById('products').classList.add('grid-view');
                document.getElementById('products').classList.remove('list-view');
                document.getElementById('products').classList.remove('d-block')
                $("#gridview").addClass("active");
                $("#listview").removeClass("active");
            }
        }

        // Create a MediaQueryList object
        var x = window.matchMedia("(max-width: 480px)")

        // Call listener function at run time
        removeListviewMobile(x);

        // Attach listener function on state changes
        x.addEventListener("change", function () {
            removeListviewMobile(x);
        });
    }

)