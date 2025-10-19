<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>    
    <title>Home Page</title>
</head>
<style>
    /* Background: rgba(32, 26, 80); */ 
    /* Foreground: rgba(66, 70, 158); */ 
    /* Forefround2: rgba(93, 94, 168); */ 
    /* Text: rgba(251, 252, 255); */ 
    /* Lines: rgba(120, 233, 209); */
    .title {
        margin-top: 15vh;
        display: inline-block;        
        opacity: 0;
        pointer-events: none;
        animation: popUp 0.4s ease-in forwards, float 4s ease-in-out 0.4s infinite;
    }

    .title h2 {
        color: rgba(120, 233, 209);
        font-size: 2.5rem;
        font-weight: bold;
        transform: skewY(-10deg);
        margin: 0;
    }

    .title h2:nth-child(1){
        text-align: left; 
        margin-bottom: 3vh;
        margin-left: 3vw;
    }

    .title h2:nth-child(3){
        text-align: right;
        margin-right: 1vw;
    }

    .title .mobile {
        display: none;
    }

    .title .desktop {
        display: block;
        position: relative;
        transform: rotateZ(-10deg);
        width: 42vw;        
    }

    .btnWrap {
        position: relative;
        display: flex;
        flex-direction: row;
        align-items: center;
        animation: float 4s ease-in-out infinite;
    }

    .spark {
        position: absolute;
        top: 0vh;
        left: 19.5vw; 
        width: 3.5vw;
        pointer-events: none;        
        transform: scale(0);
        transform-origin: bottom left;
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .startBtn:hover + .spark {
        transform: scale(1);
    }

    .startBtn {
        margin-top: 10vh;
        padding: 0.8rem 4rem;
        font-size: 3.5rem;
        font-weight: bold;
        z-index: 100;
        cursor: pointer;
        background-color: rgb(60, 46, 165);
        box-shadow: -1vw 2vh 0 rgb(21, 19, 46);
        border: none;
        border-radius: 1rem;
        opacity: 0;
        transform: skewY(-10deg);
        animation: popUp2 0.4s ease-in 0.3s;
        transition: all 0.2s ease;
    }

    .startBtn.visible {
        opacity: 1;
        transform: skewY(-10deg);
    }

    .startBtn:hover {
        background-color: rgba(120, 233, 209);
        transform: skewY(-10deg) scale(1.1);
    }

    @keyframes popUp {
        0% {
            transform: scale(0);
            opacity: 1;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes popUp2 {
        0% {
            transform: scale(0) skewY(-10deg);
            opacity: 1;
        }
        100% {
            transform: scale(1) skewY(-10deg);
            opacity: 1;
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-2vh);
        }
    }

    @media screen and (max-width: 768px) { /* Mobile Screen*/
        .title h2 {
            font-size: 1.6rem;
            font-weight: bold;
        }

        .title h2:nth-child(1){
            margin-bottom: 3vh;
            margin-left: 7vw;
        }

        .title h2:nth-child(3){
            margin-top: 1vh;
            margin-right: 1vw;
        }

        .title .mobile {
            display: block;
            transform: rotateZ(-10deg);
            position: relative;
            width: 80vw;
        }

        .title .desktop {
            display: none;
        }       
        
        .tiles .mobile {
            display: block;            
            width: 100vw;
            opacity: 0.2;
        }

        .tiles .desktop {
            display: none;
        }

        .spark {
            display: none;
        }

        .startBtn {
            margin-top: 7vh;
            padding: 0.8rem 4rem;
            font-size: 2.5rem;
            font-weight: bold;
            z-index: 100;
            cursor: pointer;
            background-color: rgb(60, 46, 165);
            box-shadow: -1vw 2vh 0 rgb(21, 19, 46);
            border: none;
            border-radius: 1rem;
            opacity: 0;
            transform: skewY(-10deg);
            animation: popUp2 0.4s ease-in 0.3s;
            transition: all 0.2s ease;
            -webkit-tap-highlight-color: transparent;
        }

        .startBtn:hover {
            background-color: rgb(60, 46, 165);
            transform: skewY(-10deg) scale(1);
        }

    }
</style>

<body>
<?php include 'tiles.php'; ?>

<div class="title">
    <h2>Can you...</h2>
    <div>
        <img class="mobile" src="img/title1.png">
        <img class="desktop" src="img/title2.png">
    </div>
    <h2>...to the conversation?</h2>
</div>

<div class="btnWrap">    
    <button class="startBtn" onclick="window.location.href='packs.php'">
        Start ▶
    </button>
    <img class="spark" src="img/spark.png">
</div>

</body>
<script>
let wordle;
    getRandomWord()
    .then(randomWord => {
        wordle = randomWord;
        console.log(wordle); 
    })
    .catch(error => {
        console.error('Error getting random word:', error);
    });

    function getRandomWord() {
    var filepath = 'SFW/Phrases1.txt';

    return fetch(filepath)
        .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
        })
        .then(data => {
        var words = data.split(',');
        var randomIndex = Math.floor(Math.random() * words.length);
        var randomWord = words[randomIndex].trim();
        return randomWord; 
        })
        .catch(error => {
        console.error('Error fetching the file:', error);
        throw error; 
        });
    }
</script>
<script>
    const startBtn = document.querySelector('.startBtn');
    
    startBtn.addEventListener('animationend', () => {
        startBtn.classList.add('visible');
    });
</script>
</html>