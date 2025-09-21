let boxes = document.querySelectorAll(".box");
let resetbtn = document.querySelector(".reset-btn");
let newGameBtn = document.querySelector(".newGame");
let message = document.querySelector(".msj");
let msjContainer = document.querySelector("#msg");
let count = 0;

let turnO = true;
const winPattern = [
    [0,1,2],
    [3,4,5],
    [6,7,8],
    [0,3,6],
    [1,4,7],
    [2,5,8],
    [0,4,8],
    [2,4,6]
];

const resetGame = () =>{
    turnO = true;
    count = 0;
    enable();
}
resetbtn.addEventListener("click", resetGame);


const anotherGame = () =>{
    turnO = true;
    count = 0;
    enable();
    message.classList.add("hide");
};
newGameBtn.addEventListener("click", anotherGame);

const disable = () =>{
    for (let box of boxes){
        box.disabled = true;
    }
}

const enable = () =>{
    for (let box of boxes){
        box.disabled = false;
        box.innerText = "";
    }
}

const showWinner = (winner) =>{
    msjContainer.innerText = `Congratutalions, winner is ${winner}`;
    message.classList.remove("hide");
    disable();
}

const drawMessage = () =>{
    msjContainer.innerText = "Match is draw, No one is Winner";
    message.classList.remove("hide");
    boxes.disabled = true;
    disable();
};

boxes.forEach((box) => {
    box.addEventListener("click", () => {
        if(turnO){
            turnO = false;
            box.innerText = "O";
            box.style.color = "black";
            count++;  
            box.disabled = true;
        }
        else{
            turnO = true;
            box.innerText = "X";
            box.style.color = "#8b786d"
            count++;
            box.disabled = true;
        }

        if(count === 9){
            drawMessage();
        }
        else{
            checkWinner();
        }
    });
});

const checkWinner = () =>{
    for(let pattern of winPattern){
        let pos1val = boxes[pattern[0]].innerText;
        let pos2val = boxes[pattern[1]].innerText;
        let pos3val = boxes[pattern[2]].innerText;

        if(pos1val != "" && pos2val != "" && pos3val != ""){
            if(pos1val === pos2val && pos2val === pos3val){
                showWinner(pos1val);
            }
        }
    }
};