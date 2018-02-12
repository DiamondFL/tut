@extends('layouts.app')

@section('content')
    <div class="row">
        {{--<div class="form-group text-center" id="status">--}}
            {{--Status--}}
        {{--</div>--}}
        <div class="form-group">
            <canvas width="1000px" height="1000px" id="hayhay"></canvas>
        </div>
        {{--<div class="form-group">--}}
            {{--<button id="btn-left" class="btn btn-primary"><i class="fa fa-arrow-left"></i></button>--}}
            {{--<button id="btn-right" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button>--}}
            {{--<button id="btn-up" class="btn btn-primary"><i class="fa fa-arrow-up"></i></button>--}}
            {{--<button id="btn-down" class="btn btn-primary"><i class="fa fa-arrow-down"></i></button>--}}
            {{--<button id="btn-angle" class="btn btn-primary"><i class="fa fa-angle-double-down"></i></button>--}}
            {{--<button id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i></button>--}}
        {{--</div>--}}
        {{--<canvas id="c"></canvas>--}}
        {{--<select id="font-family"></select>--}}
        {{--<hr>--}}
        {{--<canvas id="cp"></canvas>--}}
        {{--<button onclick="Copy()" class="btn btn-primary" id="copy"><i class="fa fa-copy"></i></button>--}}
        {{--<button onclick="Paste()" class="btn btn-primary" id="paste"><i class="fa fa-paste"></i></button>--}}
    </div>
    <div id="capture" style="padding: 10px; background: #f5da55">
        <h4 style="color: #000; ">Hello world!</h4>
    </div>
@endsection

@push('js')
<script src="{{asset('bower_components/fabric-customise-controls/dist/customiseControls.min.js')}}"></script>
<script src="{{asset('bower_components/file-saver/FileSaver.min.js')}}"></script>
<script src="{{asset('build/canvas-toBlob.js')}}"></script>
<script src="{{asset('bower_components/fontfaceobserver/fontfaceobserver.js')}}"></script>
<script src="{{asset('bower_components/html2canvas/build/html2canvas.js')}}"></script>
<script>
    var canvas = new fabric.Canvas('hayhay');

//    var rect = new fabric.Rect({
////        left: 100,
////        top: 150,
//        fill: 'red',
//        width: 200,
//        height: 10,
//        angle: 45
//    });
//    canvas.add(rect);
//    $('#btn-right').click(function () {
//        rect.setLeft(rect.getLeft() + 10);
//        canvas.renderAll();
//    });
//    $('#btn-left').click(function () {
//        rect.setLeft(rect.getLeft() - 10);
//        canvas.renderAll();
//    });
//    $('#btn-up').click(function () {
//        rect.setTop(rect.getTop() - 10);
//        canvas.renderAll();
//    });
//    $('#btn-down').click(function () {
//        rect.setTop(rect.getTop() + 10);
//        canvas.renderAll();
//    });
//    $('#btn-angle').click(function () {
//        rect.setAngle(rect.getAngle() + 10);
//        canvas.renderAll();
//    });
//    $('#btn-save').click(function () {
//        $('#hayhay').get(0).toBlob(function (blob) {
//            saveAs(blob, 'new.png');
//        });
//    });

    fabric.Image.fromURL('{{asset('img/dog_bamboo.jpg')}}', function (img) {
        img.setHeight(img.getHeight()/1.5 );
        img.setWidth(img.getWidth()/1.5 );
        img.setLeft(img.getLeft() + 200);
        canvas.add(img);
        img.animate('left', '+=100', {
            onChange: canvas.renderAll.bind(canvas),
            duration: 1000,
            easing: fabric.util.ease.easeInBounce()
        });
//        img.animate('angle', '+=60', {
//            onChange: canvas.renderAll.bind(canvas),
//            duration: 1000,
//            easing: fabric.util.ease.easeInBack()
//        });

        img.on('selected', function () {
            console.log('selected');
            img.animate('top', '+=400  ', {
                onChange: canvas.renderAll.bind(canvas),
                duration: 1000
            });
            img.animate('left', '+=0', {
                onChange: canvas.renderAll.bind(canvas),
                duration: 2000
            });
            img.animate('angle', '+=360', {
                onChange: canvas.renderAll.bind(canvas),
                duration: 1000
            });
            img.animate('top', '+=0  ', {
                onChange: canvas.renderAll.bind(canvas),
                duration: 1000
            });
        });

        img.on('selected', function () {
            var audio = new Audio();
            audio.src = '{{asset('audio/tieng-cho-sua.mp3')}}';
            audio.play();
        });
        img.on('mousemove', function () {
            $('#status').html('Mouse move')
        });
        img.on('mouseup', function () {
            $('#status').html('Mouse up')
        });
        img.on('moving', function () {
            $('#status').html('Moving');
        });
    });
    fabric.Canvas.prototype.customiseControls({
        tl: {
            action: 'rotate',
            cursor: 'cow.png'
        },
        tr: {
            action: 'scale'
        },
        bl: {
            action: 'remove',
            cursor: 'pointer'
        },
        br: {
            action: 'moveUp',
            cursor: 'pointer'
        },
        mb: {
            action: 'moveDown',
            cursor: 'pointer'
        },
        mt: {
            action: {
                'rotateByDegrees': 45
            }
        },
        mr: {
            action: function( e, target ) {
                target.set( {
                    left: 200
                } );
                canvas.renderAll();
            }
        }
    }, function() {
        canvas.renderAll();
    } );

    canvas.renderAll();

//---------------------------------------Font------------------------------------------------
//    var canvasS = new fabric.Canvas('cp');
//    // Define an array with all fonts
//    var fonts = ["Arial.ttf", "Raanana.ttc", "Athelas.ttc", "STIXGeneral.otf"];
//
//    var textbox = new fabric.Textbox('Lorum ipsum dolor sit amet', {
//        left: 50,
//        top: 50,
//        width: 150,
//        fontSize: 20
//    });
//    canvasS.add(textbox).setActiveObject(textbox);
//    fonts.unshift('Times New Roman');
//    // Populate the fontFamily select
//    var select = document.getElementById("font-family");
//    fonts.forEach(function(font) {
//        var option = document.createElement('option');
//        option.innerHTML = font;
//        option.value = font;
//        select.appendChild(option);
//    });
//
//    // Apply selected font on change
//    document.getElementById('font-family').onchange = function() {
//        if (this.value !== 'Times New Roman') {
//            loadAndUse(this.value);
//        } else {
//            canvasS.getActiveObject().set("fontFamily", this.value);
//            canvasS.requestRenderAll();
//        }
//    };
//
//    function loadAndUse(font) {
//        var myfont = new FontFaceObserver(font)
//        myfont.load()
//                .then(function() {
//                    // when font is loaded, use it.
//                    canvasS.getActiveObject().set("fontFamily", font);
//                    canvasS.requestRenderAll();
//                }).catch(function(e) {
//            console.log(e);
//            alert('font loading failed ' + font);
//        });
//    }
////-------------------------------Copy paste------------------------------
//    function Copy() {
//        // clone what are you copying since you
//        // may want copy and paste on different moment.
//        // and you do not want the changes happened
//        // later to reflect on the copy.
//        canvasr.getActiveObject().clone(function(cloned) {
//            _clipboard = cloned;
//        });
//    }
//
//    function Paste() {
//        // clone again, so you can do multiple copies.
//        _clipboard.clone(function(clonedObj) {
//            canvasr.discardActiveObject();
//            clonedObj.set({
//                left: clonedObj.left + 10,
//                top: clonedObj.top + 10,
//                evented: true,
//            });
//            if (clonedObj.type === 'activeSelection') {
//                // active selection needs a reference to the canvas.
//                clonedObj.canvas = canvasr;
//                clonedObj.forEachObject(function(obj) {
//                    canvasr.add(obj);
//                });
//                // this should solve the unselectability
//                clonedObj.setCoords();
//            } else {
//                canvasr.add(clonedObj);
//            }
//            _clipboard.top += 10;
//            _clipboard.left += 10;
//            canvasr.setActiveObject(clonedObj);
//            canvasr.requestRenderAll();
//        });
//    }
//    var canvasr = this.__canvas = new fabric.Canvas('c');
//    // create a rectangle object
//    var rectt = new fabric.Rect({
//        left: 100,
//        top: 50,
//        fill: '#D81B60',
//        width: 100,
//        height: 100,
//        strokeWidth: 2,
//        stroke: "#880E4F",
//        rx: 10,
//        ry: 10,
//        angle: 45,
//        hasControls: true
//    });
//
//    canvasr.add(rectt);


    html2canvas(document.body).then(function(canvas) {
        document.body.appendChild(canvas);
    });

</script>
@endpush