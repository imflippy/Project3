$(document).ready(function () {

    $("#btnComment").click(addComment);
    $("#btnComment2").click(addCommentReplay);

    // getallComments();
    $(document).on('click', '.replay', function () {
        let hiddenId = $(this).data('idparent');
        console.log(hiddenId);
        $('#hiddenId2').val(hiddenId);
        console.log($("#hiddenId2").val())
        $('.popup').removeClass("no-display");
        $('.popup').removeClass("no-display-animate");
        $('.popup').addClass("amimate-drop");

    });
    $(document).on('click', '.cancel', function () {
        $('.popup').removeClass("amimate-drop");
        $('.popup').addClass("no-display-animate");
    });

    // $(document).on('click', '#btnComment2', function () {
    //     $('.popup').addClass("no-display");
    // });
    $("#ddlCategories").change(getallComments);

});

function addComment() {
    var idCategory = $("#ddlCategories").val();
    var comment = $("#comment").val().trim();
    var hiddenId = $('#hiddenId').val();

    var errors = [];

    if (idCategory == 0) {
        errors.push('error category');
        toastr.error("Please choose category");
    }

    if (comment == "") {
        errors.push("error commnet");
        toastr.error("Please fill the comment");
    }

    if (errors.length == 0) {
        $.ajax({
           url: "index.php?page=addComment",
           method: 'post',
           data: {
               idCategory,
               comment,
               hiddenId
           },
            success: function () {
                // alert("success");
                getallComments();
                $('#comment').val('');
                toastr.success('Comment Added');
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
}

function addCommentReplay() {
    var idCategory = $("#ddlCategories").val();
    var comment = $("#comment2").val().trim();
    var hiddenId = $('#hiddenId2').val();

    var errors = [];

    if (idCategory == 0) {
        errors.push('error category');
        toastr.error("Please choose category");
    }

    if (comment == "") {
        errors.push("error commnet");
        toastr.error("Please fill the comment");
    }

    if (errors.length == 0) {
        $.ajax({
            url: "index.php?page=addComment",
            method: 'post',
            data: {
                idCategory,
                comment,
                hiddenId
            },
            success: function () {
                $('.popup').addClass("no-display");
                getallComments();
                $('#comment2').val('');
                toastr.success('Comment Added');

            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    }
}

function getallComments() {
    var idCategory = $("#ddlCategories").val();


    $.ajax({
        url: 'index.php?page=getAllComm',
        method: 'get',
        data: {
            idCategory
        },
        success (data) {
            if (!data.length){
                $("#allComms").html("<div class='no-cat-content'>There aren't comments for selected category.</div>");
            } else {
                printComments(data);
            }

        },
        error (xhr, status, error) {
            console.log(error);
        }
    })
}

function printComments(data) {
    let html = '<div class="">';

    data.forEach(d => {
        html += `
            <div class="main-comm">
                <div class="content-parent">
                    ${d.comment} ${d.id_comment}
                </div>
                <div class="details-comm">
                    <div class="details-comm-top">
                        ${formatDateTime(d.created_at)}
                    </div>
                    <div class="details-comm-bot">
                        <span class="user-info">by: ${d.first_name} ${d.last_name}</span>
                        <button class="replay" data-idparent="${d.id_comment}">Replay</button>
                    </div>                   
                </div>
            </div>
            ${checkForChilds(d)}
        `
    });
    html += '</div>';

    $("#allComms").html(html);
}

function checkForChilds(d) {
    if(d.child == 1) {
        return printChilds(d.arrayReplays)
    } else {
        return '';
    }
}

function printChilds(child) {
    let html = '<div class="child-wrapper">';

    child.forEach(c => {
        // console.log(c);

        if(c.child == 1) {
            // console.log(br)
            html += `
        <div class="child-comm">
            <div class="content-parent">
                ${c.comment}          
            </div>
            <div class="details-comm">
                <div class="details-comm-top">
                    ${formatDateTime(c.created_at)}
                </div>
                <div class="details-comm-bot">
                    <span class="user-info">by: ${c.first_name} ${c.last_name}</span>
                    <button class="replay" data-idparent="${c.id_comment}">Replay</button>
                </div>                   
            </div>          
         </div>
         ${checkForChilds(c)}          
        `
        } else {
            html += printChildsWithOutChildren(c);
        }

    });
    html += '</div>'
    return html;
}

function printChildsWithOutChildren(c) {
    let html2 = '';
    html2 += `
            <div class="child-comm">
                <div class="content-parent">
                    ${c.comment}          
                </div>
                <div class="details-comm">
                    <div class="details-comm-top">
                        ${formatDateTime(c.created_at)}
                    </div>
                    <div class="details-comm-bot">
                        <span class="user-info">by: ${c.first_name} ${c.last_name}</span>
                        <button class="replay" data-idparent="${c.id_comment}">Replay</button>
                    </div>                   
                </div>          
            </div>
            `
    return html2;
}




function formatDateTime(data) {
    let timestampData = new Date(data);
    var monthNames = [
        "JAN", "FEB", "MAR",
        "APR", "MAY", "JUN", "JUL",
        "AUG", "SEP", "OCT",
        "NOV", "DEC"
    ];

    var minutes = timestampData.getMinutes();
    var hours = timestampData.getHours();
    var day = timestampData.getDate();
    var monthIndex = timestampData.getMonth();
    var year = timestampData.getFullYear();


    return monthNames[monthIndex] + ', ' + day + '. ' + year + " " + hours + ": " + minutes;
}