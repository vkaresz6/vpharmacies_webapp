$(document).ready(function () {
    console.log("JS betöltött");
    let oldal = 1;
    let elemekSzama = 5;
    let maxOldal = 1;
    let sortWay = true;
    let direction = "ASC";

    $.ajax({
        url: "./getBeosztas.php",
        method: 'POST',
        data: {elemekSzama: elemekSzama, oldal: oldal},
        success: function (result) {
            maxOldal = feldolgoz(result);
            console.log(maxOldal);
        },
        error: {}
    });
    $(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
    //Fejléc első oszlopra rendezés (többire nincs értelme jelenlegi adatokkal)
    $(document).click(function (event) {
        var headerText = event.target.id;
        if (headerText == "datum") {
            oldal = 1;
            sortWay = !sortWay;
            if (sortWay) {
                direction = "ASC";
            } else {
                direction = "DESC";
            }

            $.ajax({
                url: "./getBeosztas.php",
                method: 'POST',
                data: {elemekSzama: elemekSzama, oldal: oldal, rendezes: direction},
                success: function (result) {
                    feldolgoz(result);
                },
                error: {}
            });
        }
        console.log("id: " + headerText);
        console.log("irany " + direction);
    });

    //legördülő menübol egy oldalon megjelenő elemek számának kiválasztása
    $(".sel").change(function () {
        elemekSzama = this.value;
        oldal = 1;
        console.log("kiválasztottál egy elemet: " + this.value);
        $.ajax({
            url: "./getBeosztas.php",
            method: 'POST',
            data: {elemekSzama: elemekSzama, oldal: oldal, rendezes: direction},
            success: function (result) {
                maxOldal = feldolgoz(result);
            },
            error: function () {
            }
        });
    });

    //Egy oldal előre
    $("#next").click(function () {
        console.log("next");
        if (oldal < maxOldal) {
            oldal++;
            $.ajax({
                url: "./getBeosztas.php",
                method: 'POST',
                data: {elemekSzama: elemekSzama, oldal: oldal, rendezes: direction},
                success: function (result) {
                    feldolgoz(result);
                },
                error: function () {
                }
            });
        }
    });

    //Egy oldal hátra
    $("#prev").click(function () {
        console.log("prev");
        if (1 < oldal) {
            oldal--;
            $.ajax({
                url: "./getBeosztas.php",
                method: 'POST',
                data: {elemekSzama: elemekSzama, oldal: oldal, rendezes: direction},
                success: function (result) {
                    feldolgoz(result);
                },
                error: function () {
                }
            });
        }

    });

    //Első oldal
    $("#first").click(function () {
        console.log("first");
        oldal = 1;
        $.ajax({
            url: "./getBeosztas.php",
            method: 'POST',
            data: {elemekSzama: elemekSzama, oldal: oldal, rendezes: direction},
            success: function (result) {
                feldolgoz(result);
            },
            error: function () {
            }
        });
    });

    //Utolsó oldal
    $("#last").click(function () {
        console.log("last");
        oldal = maxOldal;
        $.ajax({
            url: "./getBeosztas.php",
            method: 'POST',
            data: {elemekSzama: elemekSzama, oldal: oldal, rendezes: direction},
            success: function (result) {
                feldolgoz(result);
            },
            error: function () {
            }
        });
    });

    function feldolgoz(result) {
        //console.log(result);
        var r = JSON.parse(result);
        $("#beosztasTarolo").html(r['content']);
        $("#label").html(oldal + "/" + r['maxOldal']);
        return r['maxOldal'];
    }
});