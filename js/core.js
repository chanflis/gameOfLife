$board = $('#board-container');
$cells = $('.square-item');

$(document).on('click', ".square-item", function () {
    var $square  = $(this);

    $square.toggleClass('active');
    console.log(getCoordinate($square));

});

var getCoordinate = function($square){
    return $square.attr('id').split('-');
};

var runGame = function () {
    postCells();
};

function getActiveCells() {
    var $activeSquareCells = $board.find('.active');

    var activeCells = [];

    $activeSquareCells.each(function () {
        activeCells.push(getCoordinate($(this)));
    });

    return activeCells;
}

function postCells() {
    var activeCells = JSON.stringify(getActiveCells());

    $.ajax({
        url: 'Ajax.php',
        data: {'activeCells':activeCells},
        dataType: 'json',
        success: function(data) {
            if(data.status){
                $board.html(data.board);
            }
        },
        type: 'POST'
    });
}

