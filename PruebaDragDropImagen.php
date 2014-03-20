<!DOCTYPE HTML>
<html>
    <head>
        <style>
            body {
                margin: 0px;
                padding: 0px;
            }
        </style>
    </head>
    <body>
        <div id="container"></div>
        <script src="http://d3lp1msu2r81bx.cloudfront.net/kjs/js/lib/kinetic-v4.7.4.min.js"></script>
        <script defer="defer">
            // Stage -> rectangulo donde se cargan los elementos y es el lienzo donde se puede realizar
            // el drag and drop de las piezas
            var stage = new Kinetic.Stage({
                container: "container",
                width: (window.innerWidth / 100) * 90,  // 90% del ancho de la pantalla,
                height: (window.innerWidth / 100) * 40
            });

            // Las variables Kinect.Image donde se cargarán las imagenes de las piezas
            var casa1Img, casa2Img, casa3Img, casa4Img, casa5Img;
            // Array donde se guardan las variables Image donde se cargarán las imagenes de las piezas
            // para facilitar el trabajo
            var arrayPlayersCasaImg = new Array(casa1Img, casa2Img, casa3Img, casa4Img, casa5Img);

            // Los objetos Image que se utilizan para crear los Kinect.Image
            var casa1Obj = new Image();
            var casa2Obj = new Image();
            var casa3Obj = new Image();
            var casa4Obj = new Image();
            var casa5Obj = new Image();
            // Array donde se guardan los objetos que se utilizan para crear los Kinect.Image para facilitar el trabajo
            var arrayPlayersObj = new Array(casa1Obj, casa2Obj, casa3Obj, casa4Obj, casa5Obj);
            var arrayPlayersCasaImgPng = new Array('images/players/casa1.png', 'images/players/casa2.png', 
                    'images/players/casa3.png', 'images/players/casa4.png', 'images/players/casa5.png');
        
            // Width y Height de las piezas que representas a los jugadores
            var intPlayerImgWidth = 38;
            var intPlayerImgHeight = 38;
            // Padding de la colocación de las piezas en la pantalla
            var intPlayerImgTopPadding = 5;
            var intPlayerImgLeftPadding = 5;

            // función que crea y añade el fondo de pantalla (pista) en el stage
            function drawBackGroundImage(imageObj) { 
                
                var layer = new Kinetic.Layer();        

                // background
                var backgroundImg = new Kinetic.Image({
                    image: backgroundObj,
                    x: 0,
                    y: 0,
                    width: (window.innerWidth / 100) * 90,  // 90% width of the window.,
                    height: (window.innerWidth / 100) * 40,
                    draggable: false
                });

                layer.add(backgroundImg);

                stage.add(layer);
            }

            // función que crea y añade una imagen en el stage
            function drawImage(imageObj, intPosArray) { 
                
                var layer = new Kinetic.Layer();        

                arrayPlayersCasaImg[intPosArray] = new Kinetic.Image({
                    image: arrayPlayersObj[intPosArray],
                    x: (intPlayerImgLeftPadding + (intPlayerImgLeftPadding * intPosArray) + (intPlayerImgWidth * intPosArray)),
                    y: intPlayerImgTopPadding,
                    width: intPlayerImgWidth,
                    height: intPlayerImgHeight,
                    draggable: true
                });

                // add cursor styling
                arrayPlayersCasaImg[intPosArray].on('mouseover', function() {
                    document.body.style.cursor = 'pointer';
                });
                arrayPlayersCasaImg[intPosArray].on('mouseout', function() {
                    document.body.style.cursor = 'default';
                });

                layer.add(arrayPlayersCasaImg[intPosArray]);                  

                stage.add(layer);
            }

            var backgroundObj = new Image();
            backgroundObj.onload = function() {
                drawBackGroundImage(this);
            };
            backgroundObj.src = 'images/fields/pistaBaloncesto.png';
            
            
            // casa1Obj
            arrayPlayersObj[0].onload = function() {                    
                drawImage(this, 0);
            };
            // casa2Obj
            arrayPlayersObj[1].onload = function() {                    
                drawImage(this, 1);
            };
            // casa3Obj
            arrayPlayersObj[2].onload = function() {                    
                drawImage(this, 2);
            };
            // casa4Obj
            arrayPlayersObj[3].onload = function() {                    
                drawImage(this, 3);
            };
            // casa5Obj
            arrayPlayersObj[4].onload = function() {                    
                drawImage(this, 4);
            };
            // Carga de las imagenes .png en los objetos Image()
            for (var i=0 ; i<arrayPlayersObj.length ; i++) {                
                arrayPlayersObj[i].src = arrayPlayersCasaImgPng[i];
            }            

        </script>
        </br>
    </body>
</html>