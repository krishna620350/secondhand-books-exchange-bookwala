$(document).ready(function () {
    $(".add-admin").hide();
    $(".view").hide();
    $("#admin").on("click", function (e) {
        e.preventDefault();
        $(".add-admin").show();
    });
    $("#close").on("click", function (e) {
        $(".add-admin").hide();
    });
    $(".close-button").on("click", function (e) {
        $(".view").hide();
    });
    // search contant
    $("#submit").on("click", function (e) {
        let val = $("#search").val();
        $.post(
            "php/search.php",
            { id: val },
            function (data) {
                $("#table-head").hide();
                $("#tables").html(data);
            }
        );
    });
    $(document).on("click", "#sedit", function (e) {
        let id = $(this).data("eid");
        $.post(
            "php/edit.php",
            { id: id },
            function (data) {
                $(".view").show();
                $(".view-data").html(data);
            }
        );
    });
    $(document).on("click", "#sdelete", function (e) {
        let id = $(this).data("did");
        $.post(
            "php/delete.php",
            { id: id },
            function (data) {
                alert(`${id} is deleted successfully`);
            }
        );
    });
    // end search
    let degination = () => {
        $.ajax({
            url: "php/degination.php",
            success: function (data) {
                $("#degination").html(data);
            },
        });
    };
    degination();

    // customber tables all function and property
    let customertable = (page) => {
        $.post(
            "php/tables.php",
            {
                id: "customer",
                page: page,
            },
            function (data) {
                $("#tables").html(data);
            }
        );
    };
    $("#customer").on("click", function (e) {
        $("#table-head").hide();
        customertable(1);
    });
    $(document).on("click", "#cview", function (e) {
        let customer_id = $(this).data("cid");
        $.post(
            "php/view.php",
            {
                id: customer_id,
            },
            function (data) {
                $(".view").show();
                $(".view-data").html(data);
            }
        );
    });
    $(document).on("click", "#cedit", function (e) {
        let customer_id = $(this).data("eid");
        $.post(
            "php/edit.php",
            {
                id: customer_id,
            },
            function (data) {
                $(".view").show();
                $(".view-data").html(data);
            }
        );
    });
    $(document).on("click", "#csubmit", function (e) {
        e.preventDefault();
        let cid = $("#cid").val();
        let cfname = $("#cfname").val();
        let clname = $("#clname").val();
        let cemail = $("#cemail").val();
        let cphone = $("#cphone").val();
        let ccountry = $("#ccountry").val();
        let cstate = $("#cstate").val();
        let ccity = $("#ccity").val();
        let caddress = $("#caddress").val();
        let cpin = $("#cpin").val();
        $.post(
            "php/update.php",
            {
                id: cid,
                cfname: cfname,
                clname: clname,
                cemail: cemail,
                cphone: cphone,
                ccountry: ccountry,
                cstate: cstate,
                ccity: ccity,
                caddress: caddress,
                cpin: cpin,
            },
            function (data) {
                $(".view").hide();
                customertable();
            }
        );
    });
    $(document).on("click", "#cdelete", function (e) {
        let customer_id = $(this).data("did");
        $.post(
            "php/delete.php",
            {
                id: customer_id,
            },
            function (data) {
                custombertable();
            }
        );
    });
    $(document).on("click", "#page-c a", function (e) {
        e.preventDefault();
        let page_id = $(this).attr("id");
        customertable(page_id);
    });
    //end of customber
    // admin tables all function and property
    $("#add-admin").on("click", function (e) {
        e.preventDefault();
        let fname = $("#fname").val();
        let lname = $("#lname").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let country = $("#country").val();
        let dob = $("#dob").val();
        let deg = $("#deg").val();
        let password = $("#password").val();
        let cpassword = $("#cpassword").val();
        let re = /^(?=.*\d)(?=.[a-zA-Z])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,20}$/;
        let rep = /^[6-9][0-9]{9}$/;
        if (rep.test(phone)) {
            if (password.length > 8 && password.length < 20) {
                if (re.test(password)) {
                    if (password === cpassword) {
                        $.post(
                            "php/addadmin.php",
                            {
                                fname: fname,
                                lname: lname,
                                email: email,
                                phone: phone,
                                country: country,
                                dob: dob,
                                deg: deg,
                                password: password,
                            },
                            function (data) {
                                if (data == 1) {
                                    $(".add-admin").hide();
                                } else {
                                    alert("admin details not added");
                                }
                            }
                        );
                    } else {
                        alert("confirm password and password not match");
                    }
                } else {
                    alert(
                        "password should contain atleast one capital letter or numeric value or spacial charecter"
                    );
                }
            } else {
                alert("password is too short or long");
            }
        } else {
            alert("phone number is not valid");
        }
    });
    let admintable = (page) => {
        $("#table-head").hide();
        $.post(
            "php/tables.php",
            {
                id: "admin",
                page: page,
            },
            function (data) {
                $("#tables").html(data);
            }
        );
    };
    $("#admin-profile").on("click", function (e) {
        admintable(1);
    });
    $(document).on("click", "#aview", function (e) {
        let admin_id = $(this).data("aid");
        $.post(
            "php/view.php",
            {
                id: admin_id,
            },
            function (data) {
                $(".view").show();
                $(".view-data").html(data);
            }
        );
    });
    $(document).on("click", "#aedit", function (e) {
        let admin_id = $(this).data("eid");
        $.post(
            "php/edit.php",
            {
                id: admin_id,
            },
            function (data) {
                $(".view").show();
                $(".view-data").html(data);
            }
        );
    });
    $(document).on("click", "#asubmit", function (e) {
        e.preventDefault();
        let aid = $("#aid").val();
        let fname = $("#afname").val();
        let lname = $("#alname").val();
        let email = $("#aemail").val();
        let phone = $("#aphone").val();
        let country = $("#acountry").val();
        let dob = $("#adob").val();
        let deg = $("#adeg").val();
        $.post(
            "php/update.php",
            {
                id: aid,
                afname: fname,
                alname: lname,
                aemail: email,
                aphone: phone,
                acountry: country,
                adob: dob,
                adeg: deg,
            },
            function (data) {
                $(".view").hide();
                admintable();
            }
        );
    });
    $(document).on("click", "#adelete", function (e) {
        let customber_id = $(this).data("did");
        $.post(
            "php/delete.php",
            {
                id: customber_id,
            },
            function (data) {
                admintable();
            }
        );
    });
    $(document).on("click", "#page-a a", function (e) {
        e.preventDefault();
        let page_id = $(this).attr("id");
        admintable(page_id);
    });
    //end of admin
    // book in store
    let booktable = (page) => {
        $("#table-head").hide();
        $.post(
            "php/tables.php",
            {
                id: "store",
                page: page,
            },
            function (data) {
                $("#tables").html(data);
            }
        );
    };
    $("#add-book").on("click", function (e) {
        $.post(
            "php/addbook.php",
            {
                id: "addbook",
            },
            function (data) {
                $(".add-admin").show().html(data);
            }
        );
    });
    $(document).on("click", "#close", function (e) {
        $(".add-admin").hide();
    });
    $(document).on("submit", "#submit-form", function (e) {
        e.preventDefault();
        let formdata = new FormData(this);
        $.ajax({
            url: "php/addbook.php",
            type: "POST",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".add-admin").hide();
                booktable();
            },
        });
    });
    $("#book-store").on("click", function (e) {
        booktable(1);
    });
    $(document).on("click", "#bview", function (e) {
        let book_id = $(this).data("bid");
        $.post(
            "php/view.php",
            {
                id: book_id,
            },
            function (data) {
                $(".view").show();
                $(".view-data").html(data);
            }
        );
    });
    $(document).on("click", "#bedit", function (e) {
        let book_id = $(this).data("eid");
        $.post(
            "php/edit.php",
            {
                id: book_id,
            },
            function (data) {
                $(".view").show();
                $(".view-data").html(data);
            }
        );
    });
    $(document).on("submit", "#update-book", function (e) {
        e.preventDefault();
        let formdata = new FormData(this);
        $.ajax({
            url: "php/update.php",
            type: "POST",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (data) {
                $(".view").hide();
                booktable();
            },
        });
    });
    $(document).on("click", "#bdelete", function (e) {
        let book_id = $(this).data("did");
        $.post("php/delete.php", { id: book_id }, function (data) {
            // $(".view").show().html(data);
            booktable();
        });
    });
    $(document).on("click", "#page-b a", function (e) {
        e.preventDefault();
        let page_id = $(this).attr("id");
        booktable(page_id);
    });
    //end of book store
    // order start
    let ordertable = (page) => {
        $.post(
            "php/tables.php",
            {
                id: "order",
                page: page,
            },
            function (data) {
                $("#tables").html(data);
            }
        );
    }
    $("#order").on("click", function (e) {
        $("#table-head").hide();
        ordertable();
    });
    $(document).on("click", "#oview", function (e) {
        let order_id = $(this).data("vid");
        $.post(
            "php/view.php",
            { id: order_id },
            function (data) {
                $(".view").show();
                $(".view-data").html(data);
            }
        );
    });
    $(document).on("click", "#oedit", function (e) {
        let order_id = $(this).data("eid");
        $.post(
            "php/edit.php",
            { id: order_id },
            function (data) {
                $(".view").show();
                $(".view-data").html(data);
            }
        );
    });
    $(document).on("click", "#update", function (e) {
        e.preventDefault();
        let oid = $("#oid").val();
        let delivery = $("#delivery").val();
        let dodelivery = $("#dodelivery").val();
        let status = $("#status").val();
        $.post(
            "php/update.php",
            { id: oid, delivery: delivery, dodelivery: dodelivery, status: status },
            function (data) {
                $(".view").hide();
                ordertable();
            }
        );
    });
    $(document).on("click", "#odelete", function (e) {
        let did = $(this).data("did");
        $.post(
            "php/delete.php",
            { id: did },
            function (data) {
                ordertable();
            }
        );
    });
    $(document).on("click", "#page-o a", function (e) {
        e.preventDefault();
        let page_id = $(this).attr("id");
        booktable(page_id);
    });
    // end order

    $("#payment").on("click", function (e) {
        $("#table-head").hide();
        $.post(
            "php/tables.php",
            {
                id: "payment",
            },
            function (data) {
                $("#tables").html(data);
            }
        );
    });
    $("#hide").on("click", function (e) {
        $.ajax({
            url: "php/logout.php",
            success: function (data) {
                if (data) {
                    window.location.href = data;
                }
            },
        });
    });
});