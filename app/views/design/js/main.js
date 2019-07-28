
$(document).ready(function () {



    $("#cartstatus").load("http://localhost:8080/PHP-MVC-Ecommerce-from-scratch/app/task/checkoutcontrol");



    $("#mainform").hide();
    $("#panelresult").hide();
    $("#addcomment").click(function (e) {

        $("#mainform").show();

    });



    $("#sendcomment").click(function (e) {



        var formdata = $("#commentform").serializeArray();
        var data = {};
        $(formdata).each(function (index, obj) {
            data[obj.name] = obj.value;
            console.log(obj.name + obj.value);
        });

        $.post("http://localhost:8080/PHP-MVC-Ecommerce-from-scratch/app/task/commentcontrol", data,
            function (data, textStatus, jqXHR) {

                $("#commentform").trigger("reset");

                $('#commentresult').html(data);

                if ($('#ok').html() == "Your comment is successfully added") {
                    $("#mainform").fadeOut();
                }

            },

        );

    });

    $("[type='number']").keypress(function (evt) {
        evt.preventDefault();


    });


    $("#newsletterbtn").click(function (e) {

        $.ajax({
            type: "POST",
            url: 'http://localhost:8080/PHP-MVC-Ecommerce-from-scratch/app/task/newslettercontrol',
            data: $('#newsletterform').serialize(),

            success: function (response) {
                $("#newsletterform").trigger("reset");

                $('#newsletterresult').html(response);

                if ($('#newsletterok').html() == "You have been succesfully registered our newsletter") {
                    $(".join").fadeOut();
                }
            },

        });
        e.preventDefault();

    });
    $("#contactsubmit").click(function (e) {

        $.ajax({
            type: "POST",
            url: 'http://localhost:8080/PHP-MVC-Ecommerce-from-scratch/app/task/contact',
            data: $('#contactform').serialize(),

            success: function (response) {
                $("#contactform").trigger("reset");

                $('#contactresult').html(response);

                if ($('#contactok').html() == "Your message has been sent") {
                    $("#contactform").fadeOut();
                }
            },

        });
        e.preventDefault();

    });

    $("#cartbtn").click(function (e) {

        $.ajax({
            type: "POST",
            url: 'http://localhost:8080/PHP-MVC-Ecommerce-from-scratch/app/task/AddtoCart',
            data: $('#cartform').serialize(),

            success: function (response) {

                $("html,body").animate({ scrollTop: 0 }, "slow");

                $("#cartstatus").load("http://localhost:8080/PHP-MVC-Ecommerce-from-scratch/app/task/checkoutcontrol");
                $("#cartform").trigger("reset");

                $('#cartresult').html(response);

                $('#avaiable').html('<div class="alert alert-success">Added to Cart</div>');



            },

        });
        e.preventDefault();

    });

    $('#itemsform input[type="button"]').click(function (e) {

        var id = $(this).attr('data-value');

        var number = $('#itemsform input[name="number' + id + '"]').val();


        $.post("http://localhost:8080/PHP-MVC-Ecommerce-from-scratch/app/task/updatecart", { "productid": id, "number": number }, () => {
            window.location.reload();
        })

    });


    //------------------------Subscirbers panel updates--------------------------------------------------


    $('#mainupdatebtn input[type="button"]').click(function () {

        var id = $(this).attr('data-value');


        var textArea = $("<textarea id='" + id + "' name='comment' style='width:100%; height:200px;' />");


        textArea.val($(".sp" + id).html());
        $(".sp" + id).parent().append(textArea);
        $(".sp" + id).remove();
        input.focus();





    });


    $(document).on('blur', 'textarea[name=comment]', function () {

        $(this).parent().append($('<span/>').html($(this).val()));
        var id = $(this).attr("id");
        $(this).remove();




        $.post("http://localhost:8080/PHP-MVC-Ecommerce-from-scratch/app/subscriber/updatecomment", { "commentid": id, "comment": $(this).val() }, function (data) {

            //alert(donen);

            window.location.reload();

        });





    });
 
 //------------------------Subscirbers panel updates--------------end

    //----------------------Subscirbers panel updates Address-----------------------------------------------------

    $('#addressupdatebtn input[type="button"]').click(function () {

        var id = $(this).attr('data-value');


        var textArea = $("<textarea id='" + id + "' name='address' style='width:100%; height:100%;' />");


        textArea.val($(".addressSp" + id).html());
        $(".addressSp" + id).parent().append(textArea);
        $(".addressSp" + id).remove();
        input.focus();




    });


    $(document).on('blur', 'textarea[name=address]', function () {

        $(this).parent().append($('<span/>').html($(this).val()));
        var id = $(this).attr("id");
        $(this).remove();




        $.post("http://localhost:8080/PHP-MVC-Ecommerce-from-scratch/app/subscriber/updateaddress", { "addressid": id, "address": $(this).val() }, function (data) {

        

            window.location.reload();

        });





    });

    //----------------------Subscirbers panel updates Address-----------------------------------------------------end





});

function Remove(value, criteria) {
    switch (criteria) {
        case "removeproduct":

            $.post("http://localhost:8080/PHP-MVC-Ecommerce-from-scratch/app/task/removeproduct", { "productid": value }, () => {
                window.location.reload();
            });

            break;

        case "deletecomment":



            $.post("http://localhost:8080/PHP-MVC-Ecommerce-from-scratch/app/subscriber/deletecomment", { "commentid": value },
                function (data, textStatus, jqXHR) {

                    if (data) {
                        $("#panelresult").html("The Comment has been successfully removed");
                    } else {
                        $("#panelresult").html("An error occurken while removing");
                    }
                    $("#panelresult").fadeIn("1000", () => {
                        $("#panelresult").fadeOut("1000", () => {
                            window.location.reload();
                        })
                    });

                },

            );


            break;

        case "deleteaddress":

            $.post("http://localhost:8080/PHP-MVC-Ecommerce-from-scratch/app/subscriber/deleteaddress", { "addressid": value }, (data) => {
                console.log(data);
                if (data) {
                    $("#panelresult").html("The Comment has been successfully removed");
                } else {
                    $("#panelresult").html("An error occurken while removing");
                }
                $("#panelresult").fadeIn("1000", () => {
                    $("#panelresult").fadeOut("1000", () => {
                        window.location.reload();
                    })
                });
            });

            break;
    }



}

