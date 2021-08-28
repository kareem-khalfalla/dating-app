
    (function($) {
      "use strict";

          // Add active state to sidbar nav links
          var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
              $("nav .nav-item a").each(function() {
                  if (this.href === path) {
                      $(this).addClass("active");
                  }
              });

          // Toggle the side navigation
          $("#sidebarToggle").on("click", function(e) {
              e.preventDefault();
              $("body").toggleClass("sb-sidenav-toggled");
          });
      })(jQuery);


      $(document).ready(function(){


        $('.select_one').on('change', function (e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            var h_element = document.getElementById(valueSelected);
            $(h_element).show(400).siblings().hide();
        });
      
          $("#change_password").hide();
          $("#Detailed_information").hide();
          $("#change_main_information").hide();
          $("#Personal_profile").hide();
          $("#Education_and_work").hide();
          $("#Marital_status").hide();
          $("#Social_status").hide();
          $("#Religious_status").hide();
          $("#their_lifestyle").hide();
          $("#the_shape").hide();
         
        });

        $(document).ready(function(){
            $('#action_menu_btn').click(function(){
              $('.action_menu').toggle();
            });
          });

