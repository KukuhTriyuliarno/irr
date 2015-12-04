$(document).ready(function() {
            var count = 0;
 
            $("#add_btn").click(function(){
                    count += 1;
                $('#container').append(
                             '<tr class="records">'
                         + '<td><div id="'+count+'">' + count + '</div></td>'
                        
                         + '<td><input id="kas_' + count + '" name="kas_' + count + '" type="text" ></td>'
                         
                         + '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden"></td></tr>'
                    );
                });
 
                $(".remove_item").live('click', function (ev) {
                if (ev.type == 'click') {
                $(this).parents(".records").fadeOut();
                        $(this).parents(".records").remove();
            }
            });
        });