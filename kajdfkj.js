/**
 * Created by ME on 6/15/15.
 */
$(".column").each(function(){alert( $(this).children("#user_name").html() ) });

$(".column").each(function(){
    alert($(this).find("h2").text());
});
