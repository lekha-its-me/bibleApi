<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link href="http://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <title>Bible API</title>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            /*height: 100vh;*/
            margin: 0;
        }

        .full-height {
            /*height: 100vh;*/
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .m-b-md {
            margin-top: 30px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Bible API
            </div>
            <div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        You can use this API to get Bible verse.

                        <div class="panel panel-default">
                            <div class="panel-heading">Get one verse <span class="label label-success pull-right">GET</span> </div>
                            <div class="panel-body">
                                <div>
                                    <code>http://bible.lekha.pp.ua/?book=/*book-number*/&chapter=/*chapter-number*/&verse=/*verse-number*/</code>
                                    <div>
                                        <p>"book-number" - serial number of the book in the Bible and pointer of Old or New Testament, like "O" for Old Testament and "N" for New Testament</p>
                                        <p>"chapter-number" - serial number of the chapter in the book</p>
                                        <p>"verse-number" - serial number of the verse in the chapter</p>
                                        <p>Example:</p>
                                        <p>To get Genius chapter 5 verse 17 you need to send GET request</p>
                                        <code>http://bible.lekha.pp.ua/?book=01O&chapter=5&verse=17</code>
                                        <p>To get Matthew chapter 10 verse 20 you need to send GET request</p>
                                        <code>http://bible.lekha.pp.ua/?book=40N&chapter=10verse=20</code>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Get one chapter <span class="label label-success pull-right">GET</span> </div>
                            <div class="panel-body">
                                <div>
                                    <code>http://bible.lekha.pp.ua/?book=/*book-number*/&chapter=/*chapter-number*/</code>
                                    <div>
                                        <p>"book-number" - serial number of the book in the Bible and pointer of Old or New Testament, like "O" for Old Testament and "N" for New Testament</p>
                                        <p>"chapter-number" - serial number of the chapter in the book</p>
                                        <p>To get Genius chapter 10 you need to send GET request</p>
                                        <code>http://bible.lekha.pp.ua/?book=01O&chapter=10</code>
                                        <p>To get Acts chapter 5 you need to send GET request</p>
                                        <code>http://bible.lekha.pp.ua/?book=44N&chapter=5</code>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Get passage <span class="label label-success pull-right">GET</span> </div>
                            <div class="panel-body">
                                <div>
                                    <code>http://bible.lekha.pp.ua/?book=/*book-number*/&passage=/*passage*/</code>
                                    <div>
                                        <p>"book-number" - serial number of the book in the Bible and pointer of Old or New Testament, like "O" for Old Testament and "N" for New Testament</p>
                                        <p>"passage" - chapter, first and last verse: "5:1-10" Possible only in one chapter</p>
                                        <p>To get Genius chapter 10, verses 5 to 20 you need to send GET request</p>
                                        <code>http://bible.lekha.pp.ua/?book=01O&passage=10:5-20</code>
                                        <p>To get Acts chapter 5, verses 1 to 10 you need to send GET request</p>
                                        <code>http://bible.lekha.pp.ua/?book=44N&passage=5:1-10</code>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>