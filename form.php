<html>
    <head>
        <title>Form</title>
        <style>
            *{
                box-sizing:border-box;
                margin:0;
                padding:0;
            }
            form{
                width:350px;
                margin:40px auto;
                border-radius:8px;
                background-color:skyblue;
                padding:35px 25px;
            }
            h2{
                text-align:center;
            }
            div{
                margin:25px 0;
            }
            
            input{
                width:72%;
                padding:8px 5px;
                border:none;
                border-radius:5px;
                margin-left:33px;
            }
            .buttons{
                display:flex;
                justify-content:center;
            }
            button{
                width:105px;
                padding:8px 0;
                margin:0 10px;
                border-radius:5px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <form>
            <h2>Registration Form</h2>
            <div>
                <label for="name">Name : </label>
                <input type="text" name="name" placeholder="Enter Your Name" />
            </div>
            <div>
                <label for="email">Email : </label>
                <input type="email" name="email" placeholder="Enter Your Email" />
            </div>
            <div class="buttons">
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </body>
</html>