$board = $('#board-container');
$cells = $('.square-item');

var playGameStatus = 0;
setInterval(autoPlay,500);

$(document).on('click', ".square-item", function () {
    var $square  = $(this);

    $square.toggleClass('active');
    //console.log(getCoordinate($square));

});

var getCoordinate = function($square){
    return $square.attr('id').split('-');
};

function getActiveCells() {
    var $activeSquareCells = $board.find('.active');

    var activeCells = [];

    $activeSquareCells.each(function () {
        activeCells.push(getCoordinate($(this)));
    });

    return activeCells;
}

function postBoard() {
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

function runGame() {
    playGameStatus = 1;
}

function pauseGame() {
    playGameStatus = 0;
}

function nextMove() {
    postBoard();
}

function autoPlay() {
    if (playGameStatus){
        postBoard();
    }
}

