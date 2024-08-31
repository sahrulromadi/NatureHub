<h1 class="elegant-text"><span class="nature">Nature</span>Hub</h1>

<style>
    .elegant-text {
        font-size: 2rem;
        font-family: 'Georgia', serif;
        font-weight: bold;
        color: #266634;
        background: linear-gradient(45deg, #266634, #3ba74e);
        -webkit-background-clip: text;
        color: transparent;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2), 4px 4px 8px rgba(0, 0, 0, 0.15);
        letter-spacing: 0.15em;
        text-transform: uppercase;
        animation: glowing 6s infinite alternate;
        position: relative;
        padding: 10px 20px;
        margin-top: -20px;
        display: inline-block;
    }

    .nature {
        background: linear-gradient(45deg, #266634, #3ba74e, #FFD700, #FF8C00, #3ba74e);
        background-size: 300%;
        background-position: 0% 50%;
        -webkit-background-clip: text;
        color: transparent;
        animation: rainbow 5s infinite alternate, gradient-move 8s infinite alternate;
        display: inline-block;
    }

    @keyframes glowing {
        0% {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2), 4px 4px 8px rgba(0, 0, 0, 0.15), 0 0 5px #3ba74e, 0 0 15px #3ba74e;
        }

        100% {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2), 4px 4px 8px rgba(0, 0, 0, 0.15), 0 0 20px #3ba74e, 0 0 30px #3ba74e, 0 0 40px #266634;
        }
    }

    @keyframes rainbow {
        0% {
            background-position: 0% 50%;
        }

        100% {
            background-position: 100% 50%;
        }
    }

    @keyframes gradient-move {
        0% {
            background-position: 0% 0%;
        }

        100% {
            background-position: 100% 100%;
        }
    }
</style>
