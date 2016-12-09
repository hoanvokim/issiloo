
(function () {
    "use strict";

    var Core = {

        initialized: false,

        initialize: function () {
            if (this.initialized) return;
            this.initialized = true;

            this.v_HeaderSearch();
        },

        //HeaderSearch
        v_HeaderSearch: function () {

            var searchEl = $("#headerSearch .search-input"),
				searchSubmit = searchEl.find("button");

            $(document).on("click", function (e) {
                if ($(e.target).closest("#headerSearch").length === 0) {
                    searchEl.removeClass("active");
                    setTimeout(function () {
                        searchEl.hide();
                    }, 250);
                }
            });

            $("#headerSearchOpen").on("click", function (e) {
                e.preventDefault();

                searchEl.show();

                setTimeout(function () {
                    searchEl.addClass("active");
                }, 50);

                setTimeout(function () {
                    searchEl.find("input").focus();
                }, 250);
            });

            $("#headerSearchForm").validate({
                rules: {
                    q: {
                        required: true
                    }
                },
                errorPlacement: function (error, element) {

                },
                highlight: function (element) {
                    $(element)
						.closest(".control-group")
						.removeClass("success")
						.addClass("error");
                },
                success: function (element) {
                    $(element)
						.closest(".control-group")
						.removeClass("error")
						.addClass("success");
                }
            });

            searchSubmit.on("click", function (e) {
                $("#headerSearchForm").submit();
            });

        },
        //End HeaderSearch
    };
    //End Core

    Core.initialize();

})();
